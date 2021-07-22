<?php

// Adding WP Functions & Theme Support
function acbase_theme_support() {

	// Add WP Thumbnail Support
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'card-thumbnail size', 400, 300, true );

	add_image_size( 'blog-thumbnail size', 300, 300, true );

	// Default thumbnail size

	add_action('init', 'remove_plugin_image_sizes');

function remove_plugin_image_sizes() {
	remove_image_size('medium_large');
}

	// Add RSS Support
	add_theme_support( 'automatic-feed-links' );

	// Add Support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );

	function ac_base_meta_description() {
    global $post;
    if ( is_singular() && !is_front_page() ) {
        $des_post = strip_tags($post->post_content);
        // $des_post = strip_shortcodes( $post->post_content );
        $des_post = str_replace( array("\n", "\r", "\t"), ' ', $des_post );
        $des_post = mb_substr( $des_post, 0, 310, 'utf8' );
				$des_post = normalize_whitespace($des_post);
        echo '<meta name="description" content="' . $des_post . '" />' . "\n";
    }
		if ( is_home() ) {
				$desc = get_field("news_page_description", "options");
				$desc_news = strip_tags($desc);
				$des_news = normalize_whitespace($des_news);
        echo '<meta name="description" content="' . $desc_news . '" />' . "\n";
    }
    if ( is_front_page() ) {
        echo '<meta name="description" content="' . get_bloginfo( "description" ) . '" />' . "\n";
    }
    if ( is_category() ) {
        $des_cat = strip_tags(category_description());
				$des_cat = normalize_whitespace($des_cat);
        echo '<meta name="description" content="' . $des_cat . '" />' . "\n";
    }

		if ( is_tax() ) {
        $des_term = strip_tags(term_description());
				$des_term = normalize_whitespace($des_term);
        echo '<meta name="description" content="' . $des_term . '" />' . "\n";
    }

		if ( is_post_type_archive('library') ) {
				$desc = get_field("library_page_description", "options");
				$desc_lib = strip_tags($desc);
				$des_lib = normalize_whitespace($des_lib);
        echo '<meta name="description" content="' . $desc_lib . '" />' . "\n";
    }

		if ( is_post_type_archive('workstreams') ) {
				$desc = get_field("workstreams_page_description", "options");
				$desc_workstreams = strip_tags($desc);
				$des_workstreams = normalize_whitespace($des_workstreams);
        echo '<meta name="description" content="' . $desc_workstreams . '" />' . "\n";
    }
}
add_action( 'wp_head', 'ac_base_meta_description');

	// Add HTML5 Support
	add_theme_support( 'html5',
					[ 'script', 'style' ],
	         array(
	         	'comment-list',
	         	'comment-form',
	         	'search-form',
	         )
	);

	/**
	 * Add SVG capabilities
	 */
	 add_filter( 'upload_mimes', 'maertens_svgs_upload_mimes' );

	function maertens_svgs_upload_mimes($mimes = array()) {
			$mimes['svg'] = 'image/svg+xml';
			$mimes['svgz'] = 'image/svg+xml';
			return $mimes;

	}

}

// theme support for gutenberg block editor styles / slimmed down version of the main stylesheet
add_theme_support( 'editor-styles' );
add_editor_style( 'assets/css/block-editor.css' );

/* end theme support */


// limits search to locations custom post type

// function searchfilter($query) {
//
//     if ($query->is_search && !is_admin() ) {
//         $query->set('post_type',array('locations'));
//     }
//
// return $query;
// }
//
// add_filter('pre_get_posts','searchfilter');


add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

    } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

    } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

    } elseif ( is_post_type_archive() ) {

						$title = post_type_archive_title( '', false );
		}

    return $title;

});

function accessible_thumbnail($class=null) {

	$img_id = get_post_thumbnail_id(get_the_ID());
	$alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
	if(!$alt_text) {
		$alt_text = get_the_title() . ' featured image';
	}
	$caption = get_the_post_thumbnail_caption();
	$img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
	if($class) {
		$class = 'class="' . $class . '"';
	}

	echo
	'<figure ' . $class . '>
	 	<img alt="' . $alt_text . '" src="' . $img_url . '">
		<figcaption>'
			. $caption .
		'</figcaption>
	</figure>';
}

function custom_post_archive($query) {
    if (!is_admin() && is_tax('publications_categories') && $query->is_tax)
        $query->set( 'post_type', array('publications') );
    remove_action( 'pre_get_posts', 'custom_post_archive' );
}
add_action('pre_get_posts', 'custom_post_archive');

function acbase_change_search_url() {
    if ( is_search() && ! empty( $_GET['s'] ) ) {
        wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
        exit();
    }
}
add_action( 'template_redirect', 'acbase_change_search_url' );

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if( is_category() ) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('nav_menu_item', 'post', 'publications'); // don't forget nav_menu_item to allow menus to work!
    $query->set('post_type',$post_type);
    return $query;
    }
}

add_filter( 'post_type_labels_post', 'change_post_labels' );

function change_post_labels( $args ) {
        foreach( $args as $key => $label ){
            $args->{$key} = str_replace( [ __( 'Posts' ), __( 'Post' ) ], __( 'Archive' ), $label );
        }

        return $args;
}

function acbase_admin_bar_remove_logo() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'wp-logo' );
}
add_action( 'wp_before_admin_bar_render', 'acbase_admin_bar_remove_logo', 0 );

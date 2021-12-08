<?php
// Theme support options

require_once(get_template_directory().'/assets/functions/theme-support.php');

// Customizer options
require_once(get_template_directory().'/assets/functions/customizer.php');

// WP Head and other cleanup functions
require_once(get_template_directory().'/assets/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/assets/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/assets/functions/menu.php');
require_once(get_template_directory().'/assets/functions/menu-walkers.php');

// Register sidebars/widget areas
require_once(get_template_directory().'/assets/functions/sidebar.php');

// Makes WordPress comments suck less
require_once(get_template_directory().'/assets/functions/comments.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/assets/functions/page-navi.php');

// Setup initial pages and assign to main menu
//require_once(get_template_directory().'/assets/functions/setup-pages.php');


// Adds support for multiple languages
require_once(get_template_directory().'/assets/translation/translation.php');

// Adds site styles to the WordPress editor
//require_once(get_template_directory().'/assets/functions/editor-styles.php');

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/assets/functions/related-posts.php');

// Use this as a template for custom post types

// Customize the WordPress login
require_once(get_template_directory().'/assets/functions/login.php');

// Customize the WordPress admin
require_once(get_template_directory().'/assets/functions/admin.php');

require_once(get_template_directory().'/assets/functions/blocks.php');

//$publications = get_field('enable_publications', 'option');

require_once(get_template_directory().'/assets/functions/projects-cpt.php');

require_once(get_template_directory().'/assets/functions/publications-cpt.php');

require_once(get_template_directory().'/assets/functions/lectures-cpt.php');

require_once(get_template_directory().'/assets/functions/news-cpt.php');

require_once(get_template_directory().'/assets/functions/books-cpt.php');

function include_cpt_search( $query ) {

    if ( $query->is_search && !is_admin() ) { // added !is_admin() so admin filters don't break
		$query->set( 'post_type', array( 'post', 'page', 'projects', 'articles', 'news', 'lectures' ) );
    }

    return $query;

}
add_filter( 'pre_get_posts', 'include_cpt_search' );

add_action('init', 'ac_author_base');
function ac_author_base() {
    global $wp_rewrite;
    $author_slug = 'about/our-people'; // change slug name
    $wp_rewrite->author_base = $author_slug;
}


add_action('admin_head', 'my_custom_admin_css');

function my_custom_admin_css() {
  echo '<style>
  #your-profile .user-description-wrap, #your-profile .user-profile-picture, #your-profile h2:nth-of-type(4) {
      display: none;
  }
  </style>';
}

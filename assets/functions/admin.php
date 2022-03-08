<?php
// This file handles the admin area and functions - You can use this file to make changes to the dashboard.

/************* DASHBOARD WIDGETS *****************/
// Disable default dashboard widgets
function disable_default_dashboard_widgets() {
	// Remove_meta_box('dashboard_right_now', 'dashboard', 'core');    // Right Now Widget
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // Comments Widget
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  // Incoming Links Widget
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');         // Plugins Widget

	// Remove_meta_box('dashboard_quick_press', 'dashboard', 'core');  // Quick Press Widget
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');   // Recent Drafts Widget
	remove_meta_box('dashboard_primary', 'dashboard', 'core');         //
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');       //
	remove_meta_box('dashboard_right_now', 'dashboard', 'core');
	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	remove_meta_box('dashboard_activity', 'dashboard', 'core');

	// Removing plugin dashboard boxes
	remove_meta_box('yoast_db_widget', 'dashboard', 'normal');         // Yoast's SEO Plugin Widget

}

remove_action( 'welcome_panel', 'wp_welcome_panel' );

/*
For more information on creating Dashboard Widgets, view:
http://digwp.com/2010/10/customize-wordpress-dashboard/
*/

/**
 * Add a widget to the dashboard.


*/
// Custom Backend Footer
function acbase_custom_admin_footer() {
	_e('<span id="footer-thankyou">Developed by <a href="https://alastaircox.com" target="_blank">Alastair Cox</a></span>.', 'acbase');
}

// adding it to the admin area
add_filter('admin_footer_text', 'acbase_custom_admin_footer');


/**
* Disable the emoji's
*/
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}

add_action( 'init', 'disable_emojis' );

/**
* Filter function used to remove the tinymce emoji plugin.
*
* @param array $plugins
* @return array Difference betwen the two arrays
*/
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
	return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
	return array();
	}
}

/**
* Remove emoji CDN hostname from DNS prefetching hints.
*
* @param array $urls URLs to print for resource hints.
* @param string $relation_type The relation type the URLs are printed for.
* @return array Difference betwen the two arrays.
*/
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
	/** This filter is documented in wp-includes/formatting.php */
	$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
	$urls = array_diff( $urls, array( $emoji_svg_url ) );
	}

	return $urls;
}


function my_acf_init() {
	$api_key = get_field('api_key', 'option');
	acf_update_setting('google_api_key', $api_key);
}
add_action('acf/init', 'my_acf_init');


function my_acf_google_map_api( $api ){

	$api['key'] = get_field('api_key', 'option');

	return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Options',
		'menu_title'	=> 'Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url' => '',
		'update_button' => __('Update Settings', 'acf'),
	));

	// acf_add_options_page(array(
	// 	'page_title' 	=> 'Privacy Settings',
	// 	'menu_title'	=> 'Privacy',
	// 	'menu_slug' 	=> 'theme-privacy-settings',
	// 	'capability'	=> 'edit_posts',
	// 	'redirect'		=> false,
	// 	'icon_url' => 'dashicons-admin-network',
	// 	'update_button' => __('Update Privacy Settings', 'acf'),
	// ));

	// acf_add_options_page(array(
	// 	'page_title' 	=> 'SEO Settings',
	// 	'menu_title'	=> 'SEO',
	// 	'menu_slug' 	=> 'theme-SEO-settings',
	// 	'capability'	=> 'edit_posts',
	// 	'redirect'		=> false,
	// 	'icon_url' => 'dashicons-megaphone',
	// 	'update_button' => __('Update SEO Settings', 'acf'),
	// ));

}

function remove_logo() { ?>
<style type="text/css">
    #login h1 a {display: none; }
</style>
<?php }

add_action( 'login_enqueue_scripts', 'remove_logo' );

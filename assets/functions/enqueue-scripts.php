<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

	// Removes WP version of jQuery
	wp_deregister_script('jquery');

	// Load jQuery files in header - load in header to avoid issues with plugins
  wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), '', false );



    // Load What-Input files in footer
    //wp_enqueue_script( 'what-input', get_template_directory_uri() . '/vendor/what-input/what-input.min.js', array(), '', true );

    // Adding Materialize scripts file in the footer
  wp_enqueue_script( 'materialize-js', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js', array( 'jquery' ), '', true );

    // Adding Cookie Consent scripts file in the footer
    $cookies_set = get_field('cookies_set', 'option');

    if($cookies_set) {
      wp_enqueue_script( 'cookie-js', 'https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js', array(), '', true );
      wp_enqueue_script( 'cookie-init-js', get_template_directory_uri() . '/assets/js/cookieinit.js', array( 'jquery' ), '', true );

      // wp_enqueue_style( 'cookie-style', 'https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css', array(), '', 'all' );
    }




    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true );

    // Register Slick stylesheet




    wp_enqueue_style( 'icons-style', 'https://fonts.googleapis.com/icon?family=Material+Icons', array(), '', 'all' );

    // Register main stylesheet
    wp_enqueue_style( 'fonts-style', 'https://fonts.googleapis.com/css?family=Lato:100,300,400|Gruppo&display=swap', array(), '', 'all' );

    // wp_enqueue_style( 'slick-style', 'https:////cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '', 'all' );



    // Register main stylesheet
    wp_enqueue_style( 'site-style', get_template_directory_uri() . '/assets/css/style.css', array(), '', 'all' );



    // Deregister admin stylesheet so that it doesn't load on the front-end form

    wp_deregister_style( 'wp-admin' );



    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);

/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 *

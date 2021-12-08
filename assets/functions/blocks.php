<?php
function register_acf_block_types() {

    acf_register_block_type(array(
        'name'              => 'call_to_action',
        'title'             => __('Call to Action'),
        'description'       => __('Add a call to action statement with optional page link'),
        'render_template' => get_template_directory() . '/blocks/layouts/cta.php',
        'category'          => 'custom-blocks',
        'icon' => array(
        // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
          'foreground' => '#ff005d',
        // Specifying a dashicon for the block
          'src' => 'megaphone',
        ),

        //'enqueue_style' => get_template_directory_uri() . '/assets/css/style.css',
        'keywords'          => array( 'call to action', 'cta' ),

    ));

    acf_register_block_type(array(
        'name'              => 'featured_pages',
        'title'             => __('Featured Pages'),
        'description'       => __('Showcase your main pages in a grid layout'),
        'render_template' => get_template_directory() . '/blocks/layouts/featured_pages.php',
        'category'          => 'custom-blocks',
        'icon' => array(
        // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
          'foreground' => '#ff005d',
        // Specifying a dashicon for the block
          'src' => 'admin-post',
        ),
        //'enqueue_style' => get_template_directory_uri() . '/assets/css/style.css',
        'keywords'          => array( 'featured', 'pages' ),
    ));

    acf_register_block_type(array(
        'name'              => 'hero',
        'title'             => __('Hero Image'),
        'description'       => __('Full width banner image for your page'),
        'render_template' => get_template_directory() . '/blocks/layouts/hero.php',
        'category'          => 'custom-blocks',
        'icon' => array(
        // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
          'foreground' => '#ff005d',
        // Specifying a dashicon for the block
          'src' => 'cover-image',
        ),
        //'enqueue_style' => get_template_directory_uri() . '/assets/css/style.css',
        'keywords'          => array( 'hero image', 'image' ),
        //'post_types' => array('page', 'post')
    ));

    acf_register_block_type(array(
        'name'              => 'latest_news',
        'title'             => __('Latest News'),
        'description'       => __('Display your latest posts in a list layout'),
        'render_template' => get_template_directory() . '/blocks/layouts/latest.php',
        'category'          => 'custom-blocks',
        'icon' => array(
        // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
          'foreground' => '#ff005d',
        // Specifying a dashicon for the block
          'src' => 'media-document',
        ),
        //'enqueue_style' => get_template_directory_uri() . '/assets/css/style.css',
        'keywords'          => array( 'latest', 'news' ),
    ));

    acf_register_block_type(array(
        'name'              => 'featured_book',
        'title'             => __('Featured book'),
        'description'       => __('Display your featured library outputs in a list layout'),
        'render_template' => get_template_directory() . '/blocks/layouts/featured_book.php',
        'category'          => 'custom-blocks',
        'icon' => array(
        // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
          'foreground' => '#ff005d',
        // Specifying a dashicon for the block
          'src' => 'book',
        ),
        //'enqueue_style' => get_template_directory_uri() . '/assets/css/style.css',
        'keywords'          => array( 'featured', 'book' ),
    ));

    acf_register_block_type(array(
        'name'              => 'media_coverage',
        'title'             => __('Media coverage'),
        'description'       => __('Add a media coverage with link'),
        'render_template' => get_template_directory() . '/blocks/layouts/media_coverage.php',
        'category'          => 'custom-blocks',
        'icon' => array(
        // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
          'foreground' => '#ff005d',
        // Specifying a dashicon for the block
          'src' => 'images-alt2',
        ),
        //'enqueue_style' => get_template_directory_uri() . '/assets/css/style.css',
        'keywords'          => array( 'media coverage','image' ),
    ));

    // acf_register_block_type(array(
    //     'name'              => 'projects',
    //     'title'             => __('Priority areas'),
    //     'description'       => __('Showcase featured priority areas in a carousel'),
    //     'render_template' => get_template_directory() . '/blocks/layouts/projects.php',
    //     'category'          => 'custom-blocks',
    //     'icon' => array(
    //     // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
    //       'foreground' => '#ff005d',
    //     // Specifying a dashicon for the block
    //       'src' => 'clipboard',
    //     ),
    //     //'enqueue_style' => get_template_directory_uri() . '/assets/css/style.css',
    //     'keywords'          => array( 'featured', 'priority areas' ),
    //     // 'example'  => array(
    //     //     'attributes' => array(
    //     //     'mode' => 'preview',
    //     //     )
    //     // ),
    //     'enqueue_assets' 	=> function(){
    //
		// 		wp_enqueue_script( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );
    //     wp_enqueue_script( 'slick-init-block', get_template_directory_uri() . '/assets/js/slick_block.js', array( 'jquery' ), '1.0.0', true );
		// 	  },
    // ));

    acf_register_block_type(array(
        'name'              => 'profile_card',
        'title'             => __('Profile Cards'),
        'description'       => __('Add user profiles with a card layout'),
        'render_template' => get_template_directory() . '/blocks/layouts/profile.php',
        'category'          => 'custom-blocks',
        'icon' => array(
        // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
          'foreground' => '#ff005d',
        // Specifying a dashicon for the block
          'src' => 'admin-users',
        ),
        //'enqueue_style' => get_template_directory_uri() . '/assets/css/style.css',
        'keywords'          => array( 'profile', 'card' ),
    ));

    // acf_register_block_type(array(
    //     'name'              => 'project_gallery',
    //     'title'             => __('Project Gallery'),
    //     'description'       => __('Add a gallery of images'),
    //     'render_template' => get_template_directory() . '/blocks/layouts/gallery.php',
    //     'category'          => 'custom-blocks',
    //     'icon' => array(
    //     // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
    //       'foreground' => '#ff005d',
    //     // Specifying a dashicon for the block
    //       'src' => 'format-gallery',
    //     ),
    //     //'enqueue_style' => get_template_directory_uri() . '/assets/css/style.css',
    //     'keywords'          => array( 'image', 'gallery' ),
    // ));


    acf_register_block_type(array(
        'name'              => 'related_info',
        'title'             => __('Related content'),
        'description'       => __('Shows links to related site content'),
        'render_template' => get_template_directory() . '/blocks/layouts/related_info.php',
        'category'          => 'custom-blocks',
        'icon' => array(
        // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
          'foreground' => '#ff005d',
        // Specifying a dashicon for the block
          'src' => 'admin-links',
        ),
        //'enqueue_style' => get_template_directory_uri() . '/assets/css/style.css',
        'keywords'          => array( 'related', 'resources' ),
    ));

    acf_register_block_type(array(
        'name'              => 'social_call_to_action',
        'title'             => __('Connect with us'),
        'description'       => __('Add a block with links to your Twitter profile, newsletter signup etc'),
        'render_template' => get_template_directory() . '/blocks/layouts/social_cta.php',
        'category'          => 'custom-blocks',
        'icon' => array(
        // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
          'foreground' => '#ff005d',
        // Specifying a dashicon for the block
          'src' => 'megaphone',
        ),

        //'enqueue_style' => get_template_directory_uri() . '/assets/css/style.css',
        'keywords'          => array( 'connect', 'social media' ),

    ));

    // acf_register_block_type(array(
    //     'name'              => 'standard_image',
    //     'title'             => __('Standard Image'),
    //     'description'       => __('Standard image layout'),
    //     'render_template' => get_template_directory() . '/blocks/layouts/image.php',
    //     'category'          => 'custom-blocks',
    //     'icon' => array(
    //     // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
    //       'foreground' => '#ff005d',
    //     // Specifying a dashicon for the block
    //       'src' => 'format-image',
    //     ),
    //     //'enqueue_style' => get_template_directory_uri() . '/assets/css/style.css',
    //     'keywords'          => array( 'image' ),
    //     'mode' => 'auto'
    // ));

    acf_register_block_type(array(
      'name'              => 'slider',
      'title'             => __('Slider Header'),
      'description'       => __('Add a statement header image and title'),
      'render_template' => get_template_directory() . '/blocks/layouts/slider.php',
      'category'          => 'custom-blocks',
      'icon' => array(
      // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
        'foreground' => '#ff005d',
      // Specifying a dashicon for the block
        'src' => 'cover-image',
      ),
      //'enqueue_style' => get_template_directory_uri() . '/assets/css/style.css',
      'keywords'          => array( 'statement block', 'header' ),
  ));

    acf_register_block_type(array(
        'name'              => 'statement',
        'title'             => __('Statement Header'),
        'description'       => __('Add a statement header image and title'),
        'render_template' => get_template_directory() . '/blocks/layouts/statement.php',
        'category'          => 'custom-blocks',
        'icon' => array(
        // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
          'foreground' => '#ff005d',
        // Specifying a dashicon for the block
          'src' => 'cover-image',
        ),
        //'enqueue_style' => get_template_directory_uri() . '/assets/css/style.css',
        'keywords'          => array( 'statement block', 'header' ),
    ));

    acf_register_block_type(array(
        'name'              => 'workstreams-list',
        'title'             => __('Workstreams grid'),
        'description'       => __('Add a list of workstreams in grid format'),
        'render_template' => get_template_directory() . '/blocks/layouts/workstreams.php',
        'category'          => 'custom-blocks',
        'icon' => array(
        // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
          'foreground' => '#ff005d',
        // Specifying a dashicon for the block
          'src' => 'clipboard',
        ),
        //'enqueue_style' => get_template_directory_uri() . '/assets/css/style.css',
        'keywords'          => array( 'workstreams block' ),
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}

<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">

		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Google site verification tag -->
    <?php if ( is_front_page() ) :
      $verification_code = get_field("verification_code", "options");
      if($verification_code):
      ?>

    <meta name="google-site-verification" content="<?php echo $verification_code;?>" />

    <?php endif;
    endif;?>

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">

		<!-- Icons & Favicons -->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() . '/favicon.ico';?>" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri() . '/apple-touch-icon.png';?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri() . '/favicon-32x32.png';?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri() . '/favicon-16x16.png';?>">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri() . '/site.webmanifest';?>">

    <meta name="theme-color" content="#ffffff">

    <?php if(is_singular()):
      $twitter = get_field("twitter", "options");
      $page_id = $wp_query->get_queried_object_id();
      $post_thumbnail = get_the_post_thumbnail_url($page_id, 'full');
      $thumbnail_id = get_post_thumbnail_id($page_id);
      $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
      $excerpt = wp_trim_words(get_the_content($page_id), 30);
      if(!$post_thumbnail) {
        $post_thumbnail = get_field("og_image", "options");
        $post_thumbnail = $post_thumbnail['url'];
      }
    ?>

		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:site" content="@<?php echo $twitter;?>" />
		<meta name="twitter:creator" content="@<?php echo $twitter;?>" />
    <meta property="twitter:image" content="<?php echo $post_thumbnail;?>" />
    <meta property="twitter:image:alt" content="UK Pandemic Ethics Accelerator logo" />
		<meta property="og:url" content="<?php echo get_permalink($page_id);?>" />
		<meta property="og:title" content="<?php echo esc_html( get_the_title($page_id) );?>" />
		<meta property="og:description" content="<?php echo $excerpt;?>" />
		<meta property="og:image" content="<?php echo $post_thumbnail;?>" />

		<?php endif;?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <style id="inverter" media="none">
    html { background-color: #eee; filter: invert(100%); }
    .drag-target {background: transparent;}
    * { background-color: inherit; }
    #map div {background-color: transparent;}
    img:not([src*=".svg"]), [style*="url("] { filter: invert(100%);
    }
    </style>

		<?php wp_head(); ?>

	</head>

	<!-- Uncomment this line if using the Off-Canvas Menu -->

  <body <?php body_class('white'); ?>>

    <header class="header navbar-fixed valign-wrapper" role="banner">

  		<?php get_template_part( 'parts/nav', 'topbar' ); ?>

  	</header> <!-- end .header -->

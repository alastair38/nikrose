<?php

/**
 * Front Page Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'profile-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'profile';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.

if( have_rows('profile_details') ):

  $count = count(get_field('profile_details'));
  $cols = 12 / $count;
  $section_title = get_field('section_title');


  echo '<div id="' . $id . '" class="block profiles">';

  if($section_title) {
    echo '<div class="section-title"><h2 class="h5">' . $section_title . '</h2></div>';
  }

    // loop through the rows of data
      while ( have_rows('profile_details') ) : the_row();

      $profileName = get_sub_field('details_name');
      $profileText = get_sub_field('details_text');
      $profileUser = get_sub_field('details_user');
      $profileImage = get_field('user_image', 'user_'. $profileUser['ID'] );
      $profileTitle = get_field('user_title', 'user_'. $profileUser['ID'] );

      echo '<div class="' . $className . ' col s12">';
      if($profileImage) {
        echo '<img class="col m2 s12 no-pad" src="' . $profileImage['sizes']['blog-thumbnail size'] . '" alt="Photo of ' . $profileName . '" />
        <div class="content col m10 s12">
        <h3 class="h5">' . $profileName . '</h3>';
        if($profileTitle) {
          echo '<p class="thin profile-title">' . $profileTitle . '</p>';
        }
        // if($profileText) {
        //   echo '<p class="thin">' . $profileText . '</p>';
        // }
        // if($profileContact) {
        // echo '<a href="mailto:' . $profileContact . '" rel="bookmark"><svg class="icon icon-mail left"><use xlink:href="' . get_stylesheet_directory_uri() . '/assets/icons/symbol-defs.svg#icon-mail"></use></svg>Contact ' . $profileName . '</a>';
        // }
        if($profileUser) {
        echo '<a href="' . esc_url( get_author_posts_url( $profileUser['ID'] ) ) . '" rel="bookmark"> View profile for ' . $profileName . '</a>';
        }
        echo '</div>';
      } else {
        echo '<div class="content">
        <h2 class="h6">' . $profileName . '</h2>
        <p class="thin">' . $profileTitle . '</p>';

        if($profileUser) {
        echo '<a href="' . esc_url( get_author_posts_url( $profileUser['ID'] ) ) . '" rel="bookmark"> View profile for ' . $profileName . '</a>';
        }

        echo '</div>';
      }


      echo '</div>';

    endwhile;

    echo '</div>';

endif;
?>

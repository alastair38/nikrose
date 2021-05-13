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
$id = 'latest-pubs-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'latest-pubs';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$section_title = get_field('library_block_title');

$args = array(
  'post_type' => 'library',
  'posts_per_page' => -1,
  // 'orderby' => 'title',
  // 'order' => 'ASC',
  'meta_query' => array(
    array(
      'key' => 'featured_output',
      'value' => '1',
      'compare' => '==' // not really needed, this is the default
    )
  )
);

$latest_posts = get_posts( $args );

if($latest_posts) {
  echo '<div id="' . $id . '" class="row block library-latest"><div class="container">';
    if($section_title) {
      echo '<h2 class="col s12 h5">' . $section_title . '</h2><div class="col s12 library-list">';
    }


foreach($latest_posts as $post) {
  setup_postdata( $post );?>
  <article class="blog-card">

    <?php
    $post_date = get_the_date( 'F j, Y', $post->ID );

    if ( has_post_thumbnail($post->ID) ) {
    echo get_the_post_thumbnail($post->ID, array(300, 300) );
  } else {
    $image = get_field("default_image", "options");
    //var_dump($image);
    //print_r($image);
    echo '<img src="' . $image['url'] . '" width="'. $image['sizes']['blog-thumbnail size-width'] . '" height="' . $image['sizes']['blog-thumbnail size-height'] . '" alt="' . $image['alt'] . '" />';

  }

    if( has_excerpt($post->ID) ) {
    $excerpt = get_the_excerpt($post->ID);
    } else {
    $excerpt = wp_trim_words( get_the_excerpt($post->ID), 20, '...' );
    }
    ?>

    <div class="card-content">

      <div class="card-title">
        <h3 class="h6"><a href="<?php the_permalink($post->ID) ?>" rel="bookmark"><?php echo get_the_title($post->ID); ?></a></h3>

      </div>

      <?php

      echo '<span class="card-excerpt">' . $excerpt . '</span>';

      ?>

    </div>

  </article>
<?php }

echo '</div></div></div>';
}
wp_reset_postdata();
?>

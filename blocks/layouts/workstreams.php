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
$id = 'workstreams-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'latest-activities';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$args = array(
  'numberposts' => -1,
  'post_type' => 'workstreams',
  'order'          => 'ASC',
  'orderby'        => 'title'
);

$workstream_title = get_field('workstream_section_title');
$latest_posts = get_posts( $args );

echo '<div id="' . $id . '" class="block workstreams">';

if($workstream_title):
echo '<h2 class="h4">' . $workstream_title . '</h2>';
endif;

foreach($latest_posts as $post) {

  setup_postdata( $post );
  $title = get_the_title($post->ID);
  $excerpt = get_the_excerpt($post->ID);
  ?>

  <article id="workstream-<?php echo $post->ID;?>" class="<?php echo $post->post_name;?>">

    <div class="feat">
    <?php

    if ( has_post_thumbnail($post->ID) ) {
    echo get_the_post_thumbnail($post->ID, array(300, 300) );
    } else {
    $image = get_field("default_image", "options");
    //var_dump($image);
    //print_r($image);
    echo '<img src="' . $image['url'] . '" width="'. $image['sizes']['blog-thumbnail size-width'] . '" height="' . $image['sizes']['blog-thumbnail size-height'] . '" />';

    }?>

    <div class="feat-content">
      <h3 class="thin"><a href="<?php the_permalink($post->ID) ?>" rel="bookmark"><?php echo $title; ?></a></h3>
      <?php if($excerpt){?>
        <span><?php echo $excerpt; ?></span>
      <?php } ?>
    </div>

    </div>
  </article>
<?php }

echo '</div>';

wp_reset_postdata();
?>

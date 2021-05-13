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
$className = 'priority-areas';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$numberposts = get_field('number_of_items');
$bg = get_field('background');

$args = array(
  'numberposts' => -1,
  'post_type' => 'priority_areas',
  'meta_key'  => 'featured_project',
  'orderby'   => 'meta_value',
  'order'     => 'DESC'
);

$latest_posts = get_posts( $args );
$newArr = array_splice($latest_posts, 0, $numberposts);

echo '<div class="row block"><div class="slick-container container">
<h2 class="col s12 h4">Priority Areas</h2>
<div class="slider">';

foreach($newArr as $post) {
  setup_postdata( $post );?>
  <article id="post-<?php the_ID(); ?>" class="slides" >
    <div class="feat">
    <?php

    if ( has_post_thumbnail($post->ID) ) {
    echo get_the_post_thumbnail($post->ID, array(300, 300) );
    } else {
    $image = get_field("default_image", "options");
    //var_dump($image);
    //print_r($image);
    echo '<img src="' . $image['url'] . '" width="'. $image['sizes']['blog-thumbnail size-width'] . '" height="' . $image['sizes']['blog-thumbnail size-height'] . '" alt=""/>';

    }?>
  		<h3 class="thin"><a href="<?php the_permalink($post->ID) ?>" rel="bookmark"><?php echo get_the_title($post->ID); ?></a></h3>

    </div>
  </article>
<?php }

echo '</div><div class="slider-nav"><button onclick="prevSlide()" class="slick-arrow btn orange" aria-label="Previous" type="button" >❮</button><button onclick="nextSlide()" class="slick-arrow btn orange" aria-label="Next" type="button">❯</button></div></div></div>';

wp_reset_postdata();
?>

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
$id = 'hero-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.

$image = get_field('hero_image');
$img_srcset = wp_get_attachment_image_srcset( $image['id'], 'full' );
?>

<div id="<?php echo esc_attr($id); ?>" class="row hero block no-margin-bot grey lighten-4">
    <figure class="hero">
      <img src="<?php echo $image['url']; ?>" srcset="<?php echo esc_attr( $img_srcset ); ?>" sizes="100vw" alt="<?php echo $image['alt']; ?>"/>
    </figure>
</div>

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
$id = 'media-coverage-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'media-coverage';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.

$link = get_field('media_link');
$date = get_field('media_date');

?>
<div id="<?php echo esc_attr($id); ?>" class="media-coverage-block">
    <?php 
        
    echo '<h2 class="media-title">' . get_field('title') . '</h2>';
    

    if($date) {
        echo '<span class="media-date"><svg class="icon left" aria-hidden="true"><use xlink:href="' . get_stylesheet_directory_uri() . '/assets/icons/symbol-defs.svg#icon-clock"></use></svg>' . $date . '</span>';
    }

    the_field('paragraph_text');

    if($link) {
        echo '<div class="article-link"><a href="' . $link . '">View coverage</a></div>';
    }
    //print_R($image);?>

</div>

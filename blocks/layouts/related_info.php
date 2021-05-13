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
 $id = 'related-' . $block['id'];
 if( !empty($block['anchor']) ) {
     $id = $block['anchor'];
 }

 // Create class attribute allowing for custom "className" and "align" values.
 $className = 'related-info';
 if( !empty($block['className']) ) {
     $className .= ' ' . $block['className'];
 }

 // Load values and assing defaults.

 if( have_rows('links') ):

   $related_title = get_field('section_title');
   $bg = get_field('background');

   echo '<div id="' . $id . '" class="row related-info-block">';

   if($related_title) {
     echo '<h2 class="h5">' . $related_title . '</h2>';
   }

     // loop through the rows of data
       while ( have_rows('links') ) : the_row();

       $related_object = get_sub_field('related_link');
       $thumbnail_id = get_post_thumbnail_id($related_object->ID);
       $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

       echo '<div class="related-info">';
       if($thumbnail_id):
       echo '<img src="' . get_the_post_thumbnail_url($related_object->ID, array(80, 80)) . '" alt="' . $alt_text . '" width="80" height="80" />';
       endif;
       echo '<h3><a href="' . get_the_permalink($related_object->ID) . '" rel="bookmark">' . get_the_title($related_object->ID) . '</a></h3>
       </div>';

     endwhile;

     echo '</div>';

 endif;
 ?>

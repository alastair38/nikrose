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
$id = 'featured-book-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'featured-book';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
} ?>

<section id="<?php echo $id;?>" class="row block featured-book grey lighten-4">

<?php 
// Load values and assing defaults.
$section_title = get_field('book_block_title');
$featured = get_field('featured_book');

  echo '<div class="book-block-details">';

    $post_title = get_the_title( $featured );

    echo '<div class="book-block-content">';

    if( have_rows('book_quotes', $featured) ):

      // Loop through rows.
      while( have_rows('book_quotes', $featured) ) : the_row();
      $text = get_sub_field('quote_text', $featured);
      $author = get_sub_field('quote_author', $featured);

          // Load sub field value.
          echo '<figure class="quote">';
          echo '<h2><a href="' . get_the_permalink($featured) . '">' . $section_title . ' - ' . $post_title . '</a></h2>';
          if($text):
            echo '<blockquote>' . $text . '</blockquote>';
          endif;

          if($author):
            echo '<figcaption>' . $author . '</figcaption>';
          endif;
          
          // Do something...
          echo '</figure>';
          break;
      // End loop.
      endwhile;

    // No value.
    else :
      // Do something...
    endif;

    echo '</div>';
  
?>

</div>
  </section>
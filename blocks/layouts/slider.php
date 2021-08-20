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
$id = 'slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'statement';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$statement = get_field('slider_header');
$byline = get_field('slider_byline');
$byline = explode(" ", $byline);
$bg_images = get_field('slider_background');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
?>

<div id="<?php echo $id;?>" class="row block slider-wrapper">

<?php if($bg_images) :?>
  <div class="slider">
 <?php foreach( $bg_images as $bg_image ): 
   ?>
   <img src="<?php echo esc_url($bg_image['sizes']['large']); ?>" alt="<?php echo $bg_image['alt']; ?>"/>
         
 <?php endforeach; ?>

 </div>

<?php endif; ?>
  

<?php if($statement){?>
  <div class="heading-wrapper">
      <h1 class="display-type"><?php echo $statement;?></h1>
      <ul class="statement-byline">
        <?php foreach($byline as $word) {
        echo '<li>' . $word . '</li>';
        } ?>
      </ul>
  </div>
<?php }?>
  
</div>

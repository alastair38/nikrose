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
$id = 'statement-' . $block['id'];
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
$statement = get_field('statement_header');
$text = get_field('statement_text');
$link = get_field('statement_link');

$bg_image = get_field('statement_background');
?>

<div id="<?php echo $id;?>" class="row block statement">


<?php if($statement){?>
  <div class="heading-wrapper">
  <?php if($bg_image) {?>
  <img src="<?php echo $bg_image['url'];?>" alt="<?php echo $bg_image['alt'];?>" width="300" height="300"/>
<?php }?>
<div class="statement-text">
  <h1 class="display-type"><?php echo $statement;?></h1>
      <?php if($text) {?>
  <p><?php echo $text;?></p>
<?php }?>
<?php if($link) {?>
  <a href="<?php echo $link;?>">Read Nikolas' full biography</a>
<?php }?>

</div>
      
  </div>
<?php }?>

</div>

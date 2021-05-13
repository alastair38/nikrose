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
$bg_image = get_field('statement_background');
?>

<div id="<?php echo $id;?>" class="row block statement"
<?php if($bg_image) {?>
  style='background-image: url("<?php echo $bg_image;?>");'
<?php }?>>

<?php if($statement){?>
  <div>
      <h1 class="h3"><?php echo $statement;?></h1>
  </div>
<?php }?>
</div>
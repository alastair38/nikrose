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
$id = 'cta-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$headerText = get_field('cta_header_text');
$cta = get_field('call_to_action');
$link = get_field('cta_link');
$linkText = get_field('cta_link_text');
$image = get_field('cta_image');
$image_alt = $image['alt'];

$bg = get_field('background');
?>


<div id="<?php echo $id;?>" class="row block cta-wrapper <?php echo $bg;?> lighten-4">
  <div class="cta container">
    <article class="col s12 center">

      <?php if($image):?>

        <div class="cta-image">
          <img src="<?php echo $image['sizes']['card-thumbnail size'];?>" width="200px" alt="<?php echo $image_alt;?>" />
        </div>

      <?php endif; ?>

      <h2 id="skip-target" class="cta-header-text h5 block"><?php echo $headerText;?></h2>

      <p class="cta-text"><?php echo $cta;?></p>

      <?php if($link):?>
      <p class="cta-action">
          <a href="<?php echo $link;?>" class="btn-flat"><?php echo $linkText;?></a>
      </p>
      <?php endif;?>
    </article>
  </div>
</div>

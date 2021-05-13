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

$cta = get_field('social_call_to_action');
$link = get_field('social_cta_link');
$linkText = get_field('social_cta_link_text');
$newsletterLink = get_field('newsletter_cta_link');
$newsletterLinkText = get_field('newsletter_cta_link_text');
?>

<div id="<?php echo $id;?>" class="row block social-cta">
  <div class="cta container">
    <article class="col s12 h5 center">
      <span class="bold"><?php echo $cta;?></span>

      <p>
        <?php if($link):?>
          <a href="<?php echo $link;?>" class="btn-flat social-cta">
            <svg class="icon icon-twitter"><use xlink:href="<?php echo get_stylesheet_directory_uri();?>/assets/icons/symbol-defs.svg#icon-twitter"></use></svg>
            <?php echo $linkText;?>
          </a>
        <?php endif;?>
        <?php if($newsletterLink):?>
          <a href="<?php echo $newsletterLink;?>" class="btn-flat newsletter-cta">
            <?php echo $newsletterLinkText;?>
          </a>
        <?php endif;?>
      </p>
    </article>
  </div>
</div>

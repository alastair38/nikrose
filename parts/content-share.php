<?php  $share_buttons = get_field('share_buttons', 'option');

if($share_buttons):?>

<ul class="share-links center columns">
  <li><a href="https://twitter.com/intent/tweet?url=<?php echo wp_get_shortlink(); ?>&via=<?php the_field("twitter", "options");?>&text=<?php the_title(); ?>" target="_blank" aria-label="Share this content on Twitter"><svg class="icon icon-twitter right" aria-hidden="true"><use xlink:href="<?php echo get_stylesheet_directory_uri();?>/assets/icons/symbol-defs.svg#icon-twitter"></use></svg></a></li>


	<li><a href="mailto:?subject=I wanted to share this post with you from <?php bloginfo('name'); ?>&body=<?php the_title('','',true); ?>&#32;&#32;<?php echo wp_get_shortlink() ?>" target="_blank" aria-label="Share this content by email"><svg class="icon icon-email right" aria-hidden="true"><use xlink:href="<?php echo get_stylesheet_directory_uri();?>/assets/icons/symbol-defs.svg#icon-mail"></use></svg></a> </li>
</ul>
<?php endif;?>

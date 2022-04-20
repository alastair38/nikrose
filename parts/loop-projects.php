<article>

<div class="projects-grid z-depth-1">
<?php

$excerpt = get_the_excerpt();

if ( has_post_thumbnail($post->ID) ) {
echo get_the_post_thumbnail($post->ID, array(600, 600) );
} else {
$image = get_field("default_image", "options");
//var_dump($image);
//print_r($image);
echo '<img src="' . $image['url'] . '" width="'. $image['sizes']['blog-thumbnail size-width'] . '" height="' . $image['sizes']['blog-thumbnail size-height'] . '" />';

}?>

<div class="content">
  <h2 class="h4"><?php the_title(); ?></h2>
  <?php if($excerpt){?>
	<p><?php echo $excerpt; ?></p>
  <?php } ?>
  <a aria-label="Read more about <?php the_title(); ?>" href="<?php the_permalink($post->ID) ?>" rel="bookmark">Read more</a>
</div>

</div>
</article>
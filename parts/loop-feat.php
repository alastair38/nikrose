<article id="post-<?php the_ID(); ?>" class="feat">

  <?php
  if ( has_post_thumbnail() ) {
  the_post_thumbnail( array(300, 300) );
} else {
  $image = get_field("default_image", "options");
  //var_dump($image);
  //print_r($image);
  echo '<img src="' . $image['url'] . '" width="'. $image['sizes']['card-thumbnail size-width'] . '" height="' . $image['sizes']['card-thumbnail size-height'] . '" />';

}?>

	<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

</article>

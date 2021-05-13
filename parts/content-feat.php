<article id="post-<?php the_ID(); ?>" class="feat">

  <?php

  $image = get_field('feat_image');

  //print_r($image);
  echo '<img src="' . $image['url'] . '" width="'. $image['sizes']['card-thumbnail size-width'] . '" height="' . $image['sizes']['card-thumbnail size-height'] . '" />';

}?>

	<h2><a href="<?php the_field('feat_link') ;?>" rel="bookmark"><?php the_field('feat_title') ;?></a></h2>

</article>

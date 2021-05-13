<article id="post-<?php the_ID(); ?>" class="blog-card">

  <?php
  if ( has_post_thumbnail() ) {
  the_post_thumbnail( array(300, 300) );
} else {
  $image = get_field("default_image", "options");
  //var_dump($image);
  //print_r($image);
  echo '<img src="' . $image['url'] . '" width="'. $image['sizes']['blog-thumbnail size-width'] . '" height="' . $image['sizes']['blog-thumbnail size-height'] . '" alt="' . $image['alt'] . '" />';

}?>

  <div class="card-content">

		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
  	<!-- <span class="date"><?php the_time('F j, Y');?></span> -->



  </div>

</article>

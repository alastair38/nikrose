<article id="post-<?php the_ID(); ?>" class="blog-post-card">


  <div class="card-content">

		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
  	<em class="date"><?php the_time('F j, Y');?></em>

    <?php
    
    if(has_excerpt()):
      the_excerpt();
    endif;
  	?>
    

  </div>

</article>

<hr/>

<article id="post-<?php the_ID(); ?>" class="article-list">

	<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

	<?php echo '<p>' . wp_trim_words( get_the_content($post->ID), 50, '...' ) . '</p>'; ?>

</article>

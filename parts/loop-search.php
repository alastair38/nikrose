<article id="post-<?php the_ID(); ?>" class="article-list">

	<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

	<?php
	$post_type = get_post_type();
	$post_type_obj = get_post_type_object($post_type);
	if($post_type === 'page') {
		echo '<p class="post-type">Page</p>';
	} elseif ($post_type === 'post') {
		echo '<p class="post-type">News</p>';
	} else {
		echo '<p class="post-type">' . $post_type_obj->labels->singular_name . '</p>';
	};?>

	<?php echo '<p>' . wp_trim_words( get_the_excerpt($post->ID), 50, '...' ) . '</p>'; ?>

</article>

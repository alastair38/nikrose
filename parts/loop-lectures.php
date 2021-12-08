<article id="post-<?php the_ID(); ?>" class="article-list">

	<h2><?php the_title(); ?></h2>
	<div class="lecture-details">
	<?php

	$date = get_field("lecture_date");
	$link = get_field("links");
	$desc = get_field("lecture_description");
	$video = get_field("video_link");

	if( $desc ): 
		echo $desc;
	endif;

	// if( $date['year'] ): 
	// 	if( $date['month']):
	// 	echo	$date['month'] . ' ';
	// 	endif;
	// 	echo $date['year'] . '.';
	// endif;

	if( $video ): 
		echo '<div class="article-link"><a href="' . get_the_permalink() . '" rel="bookmark">Go to video <svg class="icon right" aria-hidden="true"><use xlink:href="' . get_stylesheet_directory_uri() . '/assets/icons/symbol-defs.svg#icon-video"></use></svg></a></div>';
	endif;

	if( $link['Lecture_link'] ): 
		echo '<div class="article-link"><a href="' . $link['Lecture_link'] . '">Go to ' . $link['type_of_link'] . ' (external)<svg class="icon right" aria-hidden="true"><use xlink:href="' . get_stylesheet_directory_uri() . '/assets/icons/symbol-defs.svg#icon-' . $link['type_of_link'] . '"></use></svg></a></div>';
	endif;

	echo '</div>';

	?>
	<!-- <?php
	if( strtotime( $post->post_date ) > strtotime('-7 day') ) {
			echo '<span class="new badge"></span>';
	}
	?> -->

</article>

<article id="post-<?php the_ID(); ?>" class="article-list">

	<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	<?php



	$desc = get_field("publication_description");
	if( $desc ): 
		echo $desc;
	 endif;
	$library_tags = get_the_terms( get_the_ID(), 'publications_categories' );
	//print_R($library_tags);
	if($library_tags) {
		echo '<span class="library-tags">';
	
		foreach ($library_tags as $tag) {
			$tag_link = get_term_link( $tag );
			echo '<a href="' . $tag_link . '" class="chip tag">' . $tag->name . '</a>';
		}
	
		echo '</span>';
	}

	?>
	<?php
	if( strtotime( $post->post_date ) > strtotime('-7 day') ) {
			echo '<span class="new badge"></span>';
	}
	?>

</article>

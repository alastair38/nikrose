<article id="post-<?php the_ID(); ?>" class="article-list">

	<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	<?php

	$workstreams = get_field("workstream_outputs");
	if( $workstreams ): ?>
		<span class="library-tags">
				<?php foreach( $workstreams as $workstream ):?>
				<a class="chip tag<?php echo ' ' . $workstream->post_name;?>" href="<?php echo get_the_permalink($workstream->ID); ?>" rel="bookmark"> <?php echo get_the_title($workstream->ID) . ' workstream' ; ?> </a>
				<?php endforeach; ?>
		</span>
	<?php endif;
	// $library_tags = get_the_terms( get_the_ID(), 'library_categories' );
	// //print_R($library_tags);
	// if($library_tags) {
	// 	echo '<span class="library-tags">';
	//
	// 	foreach ($library_tags as $tag) {
	// 		$tag_link = get_term_link( $tag );
	// 		echo '<a href="' . $tag_link . '" class="chip tag">' . $tag->name . '</a>';
	// 	}
	//
	// 	echo '</span>';
	// }

	?>
	<?php
	if( strtotime( $post->post_date ) > strtotime('-7 day') ) {
			echo '<span class="new badge"></span>';
	}
	?>

</article>

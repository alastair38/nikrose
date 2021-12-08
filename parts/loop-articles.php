<article itemscope itemtype="https://schema.org/ScholarlyArticle" id="post-<?php the_ID(); ?>" class="article-list">

	<h2 itemprop="name"><?php the_title(); ?></h2>
	<div class="article-details">
	<?php


	$editors = get_field("editors");
	$pubTitle = get_field("publication_title");
	$volumeDetails = get_field("volume_details");
	$publisher = get_field("publisher");
	$pubDate = get_field("publication_date");
	$pubLink = get_field("publication_link");
	$authors = get_field("other_authors");
	$doi = get_field("doi");

	if( $editors ): 
		echo $editors;
	endif;

	if( $pubTitle ): 
		echo ' <em itemprop="publication">' . $pubTitle . '</em>, ';
	endif;

	if( $volumeDetails ): 
		echo $volumeDetails . ', ';
	endif;

	if( $publisher ): 
		echo '<span itemprop="publisher">' . $publisher . '</span>, ';
	endif;

	if( $pubDate['year'] ): 
		if( $pubDate['month']):
		echo	$pubDate['month'] . ' ';
		endif;
		echo '<span itemprop="datePublished">' .  $pubDate['year'] . '</span>.';
	endif;

	if( $doi ): 
		echo '<span class="block">DOI: ' . $doi . '</span>';
	endif;

	if( $authors ): 
		echo '<span class="block">' . $authors . '</span>';
	endif;

	if( $pubLink ): 
		echo '<div class="article-link"><a itemprop="sameAs" href="' . $pubLink . '">View Publication</a></div>';
	endif;

	echo '</div>';

	$library_tags = get_the_terms( get_the_ID(), 'articles_categories' );
	//print_R($library_tags);
	if($library_tags) {
		echo '<span class="article-tags">';
	
		foreach ($library_tags as $tag) {
			$tag_link = get_term_link( $tag );
			echo '<span class="tag">' . $tag->name . '</span>';
		}
	
		echo '</span>';
	}

	?>

</article>

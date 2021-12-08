<?php //get_template_part( 'parts/content', 'breadcrumbs' ); ?>

<article id="post-<?php the_ID(); ?>" class="<?php echo $post->post_name;?>" role="article" itemscope itemtype="https://schema.org/ScholarlyArticle">

		<header class="article-header">

			<?php get_template_part( 'parts/content', 'breadcrumbs' ); ?>

			<h1 id="skip-target" class="entry-title single-title h4" itemprop="name"><?php the_title();?></h1>
			<?php 

			get_template_part( 'parts/content', 'share' ); ?>

		</header> <!-- end article header -->

    <div class="entry-content" itemprop="articleBody">
			
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

	the_content();

	if( $pubLink ): 
		echo '<div class="article-link"><a itemprop="sameAs" href="' . $pubLink . '">View Publication</a></div>';
	endif;

	echo '</div>';

			// Check rows exists.
			if( have_rows('documents') ):
				echo '<div class="documents"><ul class="resources-list">';
			// Loop through rows.
			while( have_rows('documents') ) : the_row();

				// Load sub field value.
			
				$file = get_sub_field('file_link');
				$file_type = substr($file['url'], strrpos($file['url'], ".") + 1);
				$file_type = strtoupper($file_type);
				$file_size = round(($file['filesize']/1000), 2);
						
						echo '<li class="resource-item"><a href="' . $file['url'] . '">Download: ' . $file['title'] . '</a>';
						if ($file_type):
							echo '<span class="chip file-type">' . $file_type . ' / ' . $file_size . 'kb</span>';
						endif;
						echo '</li>';
						//echo $file['subtype'];
						//print_r($file);
				// Do something...

			// End loop.
			endwhile;
				echo '</ul></div>';
		// No value.
		else :
			// Do something...
		endif;

	    	wp_link_pages(); ?>

		</div> <!-- end article section -->

		<footer class="article-footer center">

			<?php if(current_user_can( 'edit_post', $post->ID )) {
					edit_post_link( __( 'Edit', 'textdomain' ), '<p>', '</p>', null, 'btn-flat btn-edit-post-link' );
				}?>

		</footer> <!-- end article footer -->

</article> <!-- end article -->

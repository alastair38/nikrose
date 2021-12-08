<?php //get_template_part( 'parts/content', 'breadcrumbs' ); ?>

<article id="post-<?php the_ID(); ?>" class="<?php echo $post->post_name;?>" role="article" iitemscope itemtype="https://schema.org/Book">

		<header class="article-header">

			<?php get_template_part( 'parts/content', 'breadcrumbs' ); ?>

			<h1 id="skip-target" class="entry-title single-title h4" itemprop="name"><?php the_title();?></h1>
			<?php 

			get_template_part( 'parts/content', 'share' ); ?>

		</header> <!-- end article header -->

    <div class="entry-content" itemprop="articleBody">

			
			<?php

					$thumbnail = get_the_post_thumbnail_url(); 
					$editors = get_field("editors");
					$pubTitle = get_field("publication");
					$volumeDetails = get_field("volume");
					$pages = get_field("pages");
					$publisher = get_field("publisher");
					$pubDate = get_field("publication_date");
					$isbn = get_field("isbn");
					$pubLink = get_field("publication_link");
					$authors = get_field("other_authors");
					$doi = get_field("doi");
					?>

				<div class="book-details <?php if($thumbnail): echo 'grid'; endif ;?>">

				<?php

					if($thumbnail):
						$alt_text = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
						echo '<img itemprop="image" src="' . $thumbnail . '" alt="' . $alt_text . '" width="100" height="100"/>';
					endif;

					echo '<div class="book-content">';

					if( $authors ): 
						echo $authors . '. ';
					endif;

					if( $pages ): 
						echo '<span itemprop="numberOfPages">' . $pages . '</span>pp. ';
					endif;
					
					if( $editors ): 
						echo $editors . '. ';
					endif;

					if( $pubTitle ): 
						echo ' <em itemprop="publication">' . $pubTitle . '</em>, ';
					endif;

					if( $volumeDetails ): 
						echo $volumeDetails . ', ';
					endif;

					if( $publisher ): 
						echo '<span itemprop="publisher">' . $publisher . '</span> ';
					endif;

					if( $pubDate['year'] ): 
						
						echo '(' . $pubDate['year'] . ').';

						if( $pubDate['reprinted']):
							echo	$pubDate['reprinted'] . ' ';
							endif;
					endif;

					if( $isbn): 
		
						echo '<div class="isbn">';
				
						if( $isbn['issn']):
							echo '<span class="isbn">ISSN: ' .	$isbn['issn'] . '</span> ';
						endif;
				
						if( $isbn['paperback']):
							echo '<span class="isbn"><strong>Pb</strong> ISBN:<span itemprop="isbn"> ' .	$isbn['paperback'] . '</span></span> ';
						endif;
				
						if( $isbn['hardback']):
							echo '<span class="isbn"><strong>Hb</strong> ISBN:<span itemprop="isbn"> ' .	$isbn['hardback'] . '</span></span> ';
						endif;
				
						if( $isbn['ebook']):
							echo '<span class="isbn"><strong>E</strong> ISBN:<span itemprop="isbn"> ' .	$isbn['ebook'] . '</span></span> ';
						endif;
				
						echo '</div>';
				
					endif;

					echo '</div>';

					echo '</div>';

			the_content();

			// Check book_quotes rows exists.
			if( have_rows('book_quotes') ):

				// Loop through rows.
				while( have_rows('book_quotes') ) : the_row();
				$text = get_sub_field('quote_text');
				$author = get_sub_field('quote_author');

						// Load sub field value.
						echo '<figure class="quote" itemprop="review" itemscope itemtype="https://schema.org/Review">';
						if($text):
							echo '<blockquote itemprop="reviewBody">' . $text . '</blockquote>';
						endif;

						if($author):
							echo '<figcaption itemprop="author">' . $author . '</figcaption>';
						endif;
						
						// Do something...
						echo '</figure>';
				// End loop.
				endwhile;

			// No value.
			else :
				// Do something...
			endif;

			if( $pubLink ): 
				echo '<div class="article-link"><a itemprop="sameAs" href="' . $pubLink . '">View Publication</a></div>';
			endif;

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

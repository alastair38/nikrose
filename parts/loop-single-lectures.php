<?php //get_template_part( 'parts/content', 'breadcrumbs' ); ?>

<article id="post-<?php the_ID(); ?>" class="<?php echo $post->post_name;?>" role="article" itemscope itemtype="http://schema.org/webPage">

		<header class="article-header">

			<?php get_template_part( 'parts/content', 'breadcrumbs' ); ?>

			<h1 id="skip-target" class="entry-title single-title h4" itemprop="name"><?php the_title();?></h1>
			<?php 
		
			get_template_part( 'parts/content', 'share' ); ?>

		</header> <!-- end article header -->

    <div class="entry-content">

			
			<?php

				echo '<div class="article-details">';
			
				$date = get_field("lecture_date");
				$link = get_field("links");
				$desc = get_field("lecture_description");
				$video = get_field("video_link");
			
				if( $desc ): 
					echo '<div itemprop="description">' . $desc . '</div>';
				endif;
			
				// if( $date['year'] ): 
				// 	if( $date['month']):
				// 	echo	$date['month'] . ' ';
				// 	endif;
				// 	echo $date['year'] . '.';
				// endif;
			
				if( $video ): 
					echo '<figure class="video-wrapper" itemprop="videoObject">' . $video . '<figcaption>Watch the video of the <em>' . get_the_title() . '</em> lecture</figcaption></figure>';
				endif;
			
				if( $link['Lecture_link'] ): 
					echo '<div class="article-link"><a itemprop="sameAs" href="' . $link['Lecture_link'] . '">Go to ' . $link['type_of_link'] . ' (external)<svg class="icon right" aria-hidden="true"><use xlink:href="' . get_stylesheet_directory_uri() . '/assets/icons/symbol-defs.svg#icon-' . $link['type_of_link'] . '"></use></svg></a></div>';
				endif;
			
				echo '</div>';

			the_content();

			if( $pubLink ): 
				echo '<div class="article-link"><a href="' . $pubLink . '">View Publication</a></div>';
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

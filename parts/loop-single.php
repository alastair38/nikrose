<?php //get_template_part( 'parts/content', 'breadcrumbs' ); ?>

<article id="post-<?php the_ID(); ?>" class="<?php echo $post->post_name;?>" role="article" itemscope itemtype="http://schema.org/blogPost">

		<header class="article-header">

			<?php get_template_part( 'parts/content', 'breadcrumbs' ); ?>

			<h1 id="skip-target" class="entry-title single-title h4" itemprop="headline"><?php the_title();?></h1>
			<?php 
			// if(is_singular( 'post' )):

			// get_template_part( 'parts/content', 'byline' );

			// endif;


			get_template_part( 'parts/content', 'share' ); ?>

		</header> <!-- end article header -->

    <div class="entry-content" itemprop="articleBody">

			
			<?php

			if(is_singular( 'publications' )):
			
			$desc = get_field("publication_description");

				if( $desc ): 
					echo '<div class="publication-desc">' . $desc . '</div>';
				endif;

			endif;

			if(is_singular('projects' )):

				if ( has_post_thumbnail() ) :
					echo '<figure>';
					the_post_thumbnail('medium', ['class' => 'alignleft']);
					echo '</figure>';
				endif;

			endif;

			the_content();

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

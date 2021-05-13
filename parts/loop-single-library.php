<?php //get_template_part( 'parts/content', 'breadcrumbs' ); ?>

<article id="post-<?php the_ID(); ?>" class="<?php echo $post->post_name;?>" role="article" itemscope itemtype="http://schema.org/WebPage">

		<header class="article-header">

				<?php get_template_part( 'parts/content', 'breadcrumbs' ); ?>

			<h1 id="skip-target" class="entry-title single-title h5" itemprop="headline"><?php the_title();?></h1>

			<?php get_template_part( 'parts/content', 'byline' );

			$workstreams = get_field("workstream_outputs");
			if( $workstreams ): ?>
				<span class="library-tags small"><svg class="icon icon-arrow-right-circle small"><use xlink:href="<?php echo get_stylesheet_directory_uri();?>/assets/icons/symbol-defs.svg#icon-arrow-right-circle"></use></svg>
						<?php foreach( $workstreams as $workstream ):?>
						<a href="<?php echo get_the_permalink($workstream->ID); ?>" rel="bookmark"> <?php echo get_the_title($workstream->ID) . ' workstream' ; ?> </a>
						<?php endforeach; ?>
				</span>
			<?php endif;

			//$library_tags = get_the_terms( get_the_ID(), 'library_categories' );
			// //print_R($library_tags);
			//if($library_tags) {
			// 	echo '<span class="library-tags small"> in ';
			// echo '</span>'; }
			//
			// 	foreach ($library_tags as $tag) {
			// 		$tag_link = get_term_link( $tag );
			// 		echo '<a href="' . $tag_link . '" class="chiptag">' . $tag->name . '</a>, ';
			// 	}

			//}
			get_template_part( 'parts/content', 'share' ); ?>

		</header> <!-- end article header -->

    <div class="entry-library-content" itemprop="articleBody">

			<?php the_content();

			$primary_link = get_field('primary_link');

			if($primary_link) {
				echo '<a aria-labelledby="skip-target" class="btn-flat primary-link" href="' . $primary_link . '">View source<i class="material-icons">launch</i></a>';
			}

			// Check rows exists.
			if( have_rows('files') ):
					echo '<aside><h2 class="h5">Downloads</h2><ul class="resources-list">';
			    // Loop through rows.
			    while( have_rows('files') ) : the_row();

			        // Load sub field value.
			        $file_title = get_sub_field('file_title');
							$file = get_sub_field('file_selected');
							$file_type = get_sub_field('file_type');
							echo '<li><a href="' . $file['url'] . '">' . $file_title . '</a>';
							if ($file_type):
								echo '<span class="chip file-type">' . $file_type . '</span>';
							endif;
							echo '</li>';
							//echo $file['subtype'];
							//print_r($file);
			        // Do something...

			    // End loop.
			    endwhile;
					echo '</ul></aside>';
			// No value.
			else :
			    // Do something...
			endif;

			if( have_rows('additional_links') ):
					echo '<aside><h2 class="h5">Links</h2><ul class="resources-list">';
					// Loop through rows.
					while( have_rows('additional_links') ) : the_row();

							// Load sub field value.
							$link_url = get_sub_field('url');
							$link_text = get_sub_field('secondary_link_text');

							echo '<li><a href="' . $link_url . '">' . $link_text . '</a>';
							echo '</li>';
							//echo $file['subtype'];
							//print_r($file);
							// Do something...

					// End loop.
					endwhile;
					echo '</ul></aside>';
			// No value.
			else :
					// Do something...
			endif;

			/*
						*  Query posts for a relationship value.
						*  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
						*/

		?>


	</div> <!-- end article section -->

		<footer class="article-footer center">

			<?php
			if(current_user_can( 'edit_post', $post->ID )) {
					edit_post_link( __( 'Edit', 'textdomain' ), '<p>', '</p>', null, 'btn-flat btn-edit-post-link' );
				}?>

		</footer> <!-- end article footer -->

</article> <!-- end article -->

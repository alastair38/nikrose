<?php //get_template_part( 'parts/content', 'breadcrumbs' ); ?>

<article id="post-<?php the_ID(); ?>" class="article-list" role="article" itemscope itemtype="http://schema.org/WebPage">

		<header>

				<?php
				$primary_link = get_field('primary_link');

				?>

			<h2 class="entry-title" itemprop="headline">
				<?php
				if($primary_link) {
					echo '<a href="' . $primary_link . '">' . get_the_title() . '<i class="material-icons">launch</i></a>';
				} else {
					echo get_the_title();
				} ?>
			</h2>

	<?php
	if( strtotime( $post->post_date ) > strtotime('-7 day') ) {
			echo '<span class="new badge"></span>';
	}
			//get_template_part( 'parts/content', 'byline' );
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
		//	get_template_part( 'parts/content', 'share' ); ?>

		</header> <!-- end article header -->

    <div class="entry-library-content" itemprop="articleBody">

			<?php the_content();

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

		<footer class="article-footer">
			<span class="byline small"><?php the_time('F j, Y');?></span>
			<?php //get_template_part( 'parts/content', 'byline' );

			$workstreams = get_field("workstream_outputs");
			if( $workstreams ): ?>
				<span class="library-tags small"><svg class="icon icon-arrow-right-circle small"><use xlink:href="<?php echo get_stylesheet_directory_uri();?>/assets/icons/symbol-defs.svg#icon-arrow-right-circle"></use></svg>
						<?php foreach( $workstreams as $workstream ):?>
						<a href="<?php echo get_the_permalink($workstream->ID); ?>" rel="bookmark"> <?php echo get_the_title($workstream->ID) . ' workstream' ; ?> </a>
						<?php endforeach; ?>
				</span>
			<?php endif;?>

		</footer> <!-- end article footer -->

</article> <!-- end article -->

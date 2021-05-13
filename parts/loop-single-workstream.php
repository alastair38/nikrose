<?php //get_template_part( 'parts/content', 'breadcrumbs' ); ?>

<article id="post-<?php the_ID(); ?>" class="<?php echo $post->post_name;?>" role="article" itemscope itemtype="http://schema.org/WebPage">

		<header class="article-header">
				<?php get_template_part( 'parts/content', 'breadcrumbs' ); ?>
			<h1 id="skip-target" class="entry-title single-title h3" itemprop="headline"><?php the_title();?></h1>
			<?php //get_template_part( 'parts/content', 'byline' ); ?>
		</header> <!-- end article header -->

    <div class="entry-content" itemprop="articleBody">

			<?php
		?>

			<?php the_content();

$users = get_field("workstream_staff");
if( $users ): ?>
<div class="key-people">
	<h2 class="h5">Key people</h2>
	<ul class="team-list">
	    <?php foreach( $users as $user ):
				$userImage = get_field('user_image', 'user_'. $user['ID'] );
				?>
	        <li>
						<a href="<?php echo esc_url( get_author_posts_url( $user['ID'] ) );?>" rel="bookmark">
							<img src="<?php echo $userImage['sizes']['blog-thumbnail size'];?>" alt="<?php echo $userImage['alt'];?>" width="200" height="200" />
	            <span class="member-name"><?php echo $user['display_name']; ?></span>
						</a>
	        </li>
	    <?php endforeach; ?>
	</ul>
</div>
<?php endif;

// Loop for getting library outputs assigned to this workstream
// $activities = get_posts(array(
// 	'post_type' => 'library',
// 	'meta_query' => array(
// 		array(
// 			'key' => 'workstream_outputs', // name of custom field
// 			'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
// 			'compare' => 'LIKE'
// 		)
// 	)
// ));

?>


<?php
			// Check rows exists.
			if( have_rows('workstream_files') ):
					echo '<div><h2 class="h5">Downloads</h2><ul class="resources-list">';
			    // Loop through rows.
			    while( have_rows('workstream_files') ) : the_row();

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
					echo '</ul></div>';
			// No value.
			else :
			    // Do something...
			endif;
		?>

	    <?php wp_link_pages(); ?>

		</div> <!-- end article section -->

		<footer class="article-footer center">

			<?php if(current_user_can( 'edit_post', $post->ID )) {
					edit_post_link( __( 'Edit', 'textdomain' ), '<p>', '</p>', null, 'btn-flat btn-edit-post-link' );
				}?>

		</footer> <!-- end article footer -->

</article> <!-- end article -->

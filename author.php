<?php get_header();
	$current_author = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) );
	$author_biog = get_field('biography', 'user_'. $current_author->ID );
	$author_image = get_field('user_image', 'user_'. $current_author->ID );
	$author_title = get_field('user_title', 'user_'. $current_author->ID );
	$author_twitter = get_field('twitter_handle', 'user_'. $current_author->ID );
?>

	<main class="container" itemscope itemtype="https://schema.org/Person">

		<div class="row">

			<article class="col s12">

				<header class="archive-header">
					<?php get_template_part( 'parts/content', 'breadcrumbs' ); ?>
					<h1 class="page-title h3" itemprop="name"><?php echo $current_author->display_name; ?></h1>
				</header>

				<div class="entry-content">

				<?php

						if ($author_image) {
							//print_R($author_image);
							echo '<img class="profile-picture responsive-img" src="' . $author_image['sizes']['medium'] . '" alt="' . $author_image['alt'] . '" itemprop="image"/>';
						}

						if ($author_title) {
							echo '<p class="user-title bold" itemprop="jobTitle">' . $author_title . '</p>';
						}

						if ($author_biog) {
							echo '<div itemprop="description">' . $author_biog . '</div>';
						}

						if ($author_twitter) {
							echo '<a class="twitter-handle btn-flat" href="https://twitter.com/' . $author_twitter . '" itemprop="sameAs">
							<svg class="icon icon-twitter"><use xlink:href="' . get_stylesheet_directory_uri() . '/assets/icons/symbol-defs.svg#icon-twitter1"></use></svg>
							Follow ' . $current_author->display_name . '</a>';
						}

					?>

					<?php if (have_posts()) : while (have_posts()) : the_post();

						get_template_part( 'parts/loop', 'blog' ); ?>

					<?php endwhile; ?>

					<?php joints_page_navi(); ?>

					<?php else : ?>

					<?php endif; ?>

				</div>

			</article> <!-- end #main -->

		</div>

	</main> <!-- end main -->

<?php get_footer(); ?>

<?php get_header();
?>

<main class="container">

		<div class="row">

		    <div class="col s12">

					<header class="archive-header">
						<?php get_template_part( 'parts/content', 'breadcrumbs' ); ?>
						<h1 id="skip-target" class="page-title h3"><?php echo get_the_archive_title();?></h1>
					</header>

					<div class="entry-content archive-<?php echo get_post_type(); ?>">
					<?php 
					$lectDesc = get_field("lectures_page_description", "options");
					$projDesc = get_field("projects_page_description", "options");
					$pubDesc = get_field("publications_page_description", "options");
					$booksDesc = get_field("books_page_description", "options");
					if(is_post_type_archive( 'articles' )) {
							echo '<div class="entry-content archive-desc">' . $pubDesc . '</div>';
						} else if (is_post_type_archive( 'projects' )) {
							echo '<div class="entry-content archive-desc">' . $projDesc . '</div>';
						} else if (is_post_type_archive( 'lectures' )) {
							echo '<div class="entry-content archive-desc">' . $lectDesc . '</div>';
						} else if (is_post_type_archive( 'books' )) {
							echo '<div class="entry-content archive-desc">' . $booksDesc . '</div>';
						}
						
					?>
					<div class="search-wrapper">
						<?php get_search_form();?>
					</div>
					

			    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', get_post_type() ); ?>

				<?php endwhile; ?>

					<?php joints_page_navi(); ?>

				<?php else : ?>

					<?php // get_template_part( 'parts/content', 'missing' ); ?>

				<?php endif; ?>
				</div>
			</div>


			</div> <!-- end #main -->

		</main> <!-- end main -->


<?php get_footer(); ?>

<?php get_header(); ?>

	<main class="container" role="main">

		<div id="inner-content" class="row">

			<div class="col s12">

				<header class="article-header">
					<h1 id="skip-target"  class="page-title h3"><?php _e('Search results for:', 'jointstheme'); ?> <span class="search-query"><?php echo esc_attr(get_search_query()); ?></span></h1>
				</header>

				<div id="main-form">
					<?php get_search_form();?>
				</div>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'search' ); ?>

				<?php endwhile; ?>

					<?php joints_page_navi(); ?>

				<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

			    <?php endif; ?>

		    <?php // get_sidebar(); ?>

			</div>

		</div> <!-- end #inner-content -->

	</main> <!-- end #content -->

<?php get_footer(); ?>

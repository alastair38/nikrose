<?php get_header();
?>

<main class="container">

		<div class="row">

			<div class="col s12">

					<header class="archive-header">
						<?php get_template_part( 'parts/content', 'breadcrumbs' ); ?>
						<h1 id="skip-target" class="page-title h3"><?php single_post_title();?></h1>
					</header>

					<?php $desc = get_field("news_page_description", "options");
						if($desc) {
							echo '<div class="entry-content archive-desc">' . $desc . '</div>';
						}
					?>
			    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'blog' ); ?>

				<?php endwhile; ?>

					<?php joints_page_navi(); ?>

				<?php else : ?>

					<?php //get_template_part( 'parts/content', 'missing' ); ?>

				<?php endif; ?>

			</div>

		</div> <!-- end #main -->

</main> <!-- end main -->

<?php get_footer(); ?>

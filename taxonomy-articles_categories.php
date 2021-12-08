<?php get_header();
?>

<main class="container">

		<div class="row" role="main">

		    <div class="col s12">

					<header class="archive-header">
						<h1 class="page-title h3"><?php single_term_title();?></h1>
					</header>

					<div class="entry-content">

			    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'articles' ); ?>

				<?php endwhile; ?>

					<?php joints_page_navi(); ?>

				<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

				<?php endif; ?>
				</div>
				
			</div>


			</div> <!-- end #main -->

		</main> <!-- end main -->


<?php get_footer(); ?>

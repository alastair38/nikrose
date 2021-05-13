<?php get_header();
$title = single_cat_title("", false);
?>

	<main class="container">

		<div class="row">

		    <div class="col s12">

					<header class="archive-header">
						<h1 id="skip-target" class="page-title h3"><?php echo $title ;?></h1>
					</header>

					<?php
					$cat_desc = category_description();
					
					if($cat_desc) {
						echo '<div class="entry-content">' . $cat_desc . '</div>';
					}
					?>

					<div class="entry-content">

			    <?php if (have_posts()) : while (have_posts()) : the_post();

					get_template_part( 'parts/loop', 'blog' );

					?>

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

<?php
/*
Template Name: Home Page
*/
get_header();
?>

<main>

	<div class="row no-margin-bot">

		<?php if (have_posts()) : while (have_posts()) : the_post();

			get_template_part( 'parts/loop', 'page-home' );

			endwhile; endif;

		?>

	</div> <!-- end row -->

</main> <!-- end main -->


<?php


get_footer(); ?>

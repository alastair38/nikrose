<?php

get_header(); ?>

<main class="container">
	<div class="row">

		<?php if (have_posts()) : while (have_posts()) : the_post();




			get_template_part( 'parts/loop', 'single-library' );


		endwhile; endif;

		?>
	</div>
</main> <!-- end main -->

<?php get_footer(); ?>

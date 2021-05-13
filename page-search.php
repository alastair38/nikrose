<?php

/*
Template Name: Search Page
*/

get_header(); ?>

<main class="container">
	
	<div class="row">

		<div class="col s12">

			<?php if (have_posts()) : while (have_posts()) : the_post();

				get_template_part( 'parts/loop', 'page-search' );

				endwhile; endif;

			?>

		</div>

	</div> <!-- end row -->

</main> <!-- end main -->

<?php

get_footer(); ?>

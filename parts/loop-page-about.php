<article id="post-<?php the_ID(); ?>" class="<?php echo $post->post_name;?> col s12" role="article" itemscope itemprop="Person" itemtype="http://schema.org/Person">

	<header class="article-header">
		
		<?php get_template_part( 'parts/content', 'breadcrumbs' ); ?>
		<h1 id="skip-target" class="entry-title single-title h3"><?php the_title();?></h1>

	</header> <!-- end article header -->

    <div class="entry-content" itemprop="articleBody">

		<?php the_content(); ?>

	    <?php wp_link_pages(); ?>

	</div>

</article>

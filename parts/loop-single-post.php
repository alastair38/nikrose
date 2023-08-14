<article id="post-<?php the_ID(); ?>" class="<?php echo $post->post_name;?> col s12" role="article" itemscope itemtype="http://schema.org/WebPage">

	<header class="article-header">
		
		<?php get_template_part( 'parts/content', 'breadcrumbs' ); ?>
		<h1 id="skip-target" class="entry-title single-title h3" itemprop="headline"><?php the_title();?></h1>
		
		<div class="post-meta"><?php echo '<span class="author">' . get_the_author() . '</span>'; ?><?php blockhaus_posted_on();?></div>
		

	</header> <!-- end article header -->

    <div class="entry-content" itemprop="articleBody">

		<?php the_content(); ?>

	    <?php wp_link_pages(); ?>

	</div>
<?php get_template_part( 'components/share-buttons' );?>
</article>

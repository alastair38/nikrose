<?php  $breadcrumbs = get_field('breadcrumbs', 'option');

if($breadcrumbs):?>
<nav class="breadcrumb-nav" aria-label="Breadcrumb">
<ol class="col s12 breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
  <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
		<a itemprop="item" class="breadcrumb-item" href="<?php echo get_option('home')?>">Home</a>
	</li>
	<?php
	$home = get_site_url();
	$post_type = get_post_type();
	$pt = get_post_type_object( $post_type );
	$archive_slug = $pt->rewrite['slug'];
	if($archive_slug) {
		$archive_link = $home . '/' .  $archive_slug . '/';
	}

//var_dump($pt);


	if($post_type === 'post') {
		if(is_singular()) {
		echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
			<a itemprop="item" class="breadcrumb-item" href="' . get_post_type_archive_link( $post_type ) . '">' . $pt->labels->singular_name . '</a>
		</li>';
	}
	} elseif ($post_type === 'page') {
		if($post->post_parent){
		echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
			<a itemprop="item" class="breadcrumb-item" href="' . get_the_permalink($post->post_parent) . '">' . get_the_title($post->post_parent) . '</a>
		</li>';
		}
	} elseif ($post_type === 'workstreams') {
		if(is_singular()) {
			if($archive_slug) {
				echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
					<a itemprop="item" class="breadcrumb-item" href="' . get_permalink( get_page_by_path( $archive_slug ) ) . '">' . get_the_title(get_page_by_path( $archive_slug )) . '</a>
				</li>';
			}
	}
  } elseif ($post_type === 'library') {
		if(is_singular()) {
			echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
				<a itemprop="item" class="breadcrumb-item" href="' . $archive_link . '">' . $pt->label . '</a>
			</li>';
		}
	}
	?>
	<?php if(is_author()){
		$author = get_queried_object();
    $title = $author->display_name;
		?>
	<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
		<a itemprop="item" class="breadcrumb-item" href="<?php echo get_permalink( get_page_by_path( 'about' ) ) ?>"><?php echo ' ' . get_the_title(get_page_by_path( 'about' )); ?></a>
	</li>
	<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
		<a itemprop="item" class="breadcrumb-item" href="<?php echo get_permalink( get_page_by_path( 'about/our-people' ) ) ?>"><?php echo ' ' . get_the_title(get_page_by_path( 'about/our-people' )); ?></a>
	</li>
	<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
		<span itemprop="name" class="breadcrumb-item" aria-current="page"><?php echo $title; ?></span>
	</li>
<?php } elseif (is_archive()) {
	echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
			<span itemprop="name" class="breadcrumb-item" aria-current="page">' . get_the_archive_title() . '</span>
		</li>';
 } elseif(is_home()) {
	 echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
			 <span itemprop="name" class="breadcrumb-item" aria-current="page">' . $pt->label . '</span>
		 </li>';
 } else {
	echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
		<span itemprop="name" class="breadcrumb-item" aria-current="page">' . get_the_title() . '</span>
	</li>';
}?>
</ol>
</nav>

<?php endif;?>

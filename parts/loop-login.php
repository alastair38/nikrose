<?php //get_template_part( 'parts/content', 'breadcrumbs' ); ?>

<article id="post-<?php the_ID(); ?>" class="<?php echo $post->post_name;?>" role="article" itemscope itemtype="http://schema.org/WebPage">


		<header class="article-header">

			<?php	if( !is_user_logged_in() ) {
				echo '<h1 id="skip-target" class="entry-title h3 single-title" itemprop="headline">';
				the_title();
			} else {
			 echo '<h1 id="skip-target" class="sr-only h5">You are logged in';
		 } ;
		 ?>
		 </h1>

		</header> <!-- end article header -->

    <div class="entry-content" itemprop="articleBody">
	    <?php the_content();
			?>
			<?php
$args = array(

'id_username' => 'user',
'id_password' => 'pass',
)
;?>

<?php
if( !is_user_logged_in() ) {

	wp_login_form( $args );
	echo '<div class="password-reset"><a href="' . wp_lostpassword_url( ) . '" title="Lost Password">Click this link to reset your password</a></div>';

} else {
	echo '<div id="admin-buttons" class="center"><h2 class="h5">Add content</h2>';
	echo '<a class="btn-flat admin" href="' . admin_url() . 'post-new.php"><i aria-hidden="true" class="material-icons left">article</i>Add project</a>';
	echo '<a class="btn-flat admin" href="' . admin_url() . 'post-new.php?post_type=workshops"><i aria-hidden="true" class="material-icons left">alt_route</i>Add workshop</a>';
	echo '<a class="btn-flat admin" href="' . admin_url() . 'post-new.php?post_type=publications"><i aria-hidden="true" class="material-icons left">assignment</i>Add publication</a>';
	echo '<h2 class="h5">Admin</h2>';
	if(current_user_can('administrator')) {
	echo '<a class="btn-flat admin" href="' . admin_url() . '"><i aria-hidden="true" class="material-icons left">settings</i>Admin area</a>';
	}

	echo '<a class="btn-flat admin" href="' . get_edit_user_link() . '"><i aria-hidden="true" class="material-icons left">
account_circle</i>Edit your profile</a>';
echo '<a class="btn-flat admin logout" href="' . home_url() . '/wp-login.php?action=logout"><i aria-hidden="true" class="material-icons left">logout</i>Logout</a>
	</div></div>';
}

?>
</div> <!-- end article section -->



</article> <!-- end article -->

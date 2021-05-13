<article id="post-<?php the_ID(); ?>" class="<?php echo $post->post_name;?>" role="article" itemscope itemtype="http://schema.org/WebPage">

	<header class="article-header">
		<h1 class="entry-title single-title h3" itemprop="headline"><?php the_title();?></h1>
	</header> <!-- end article header -->

  <div class="entry-content" itemprop="articleBody">

			<?php
			// setting vars from options page fields
			$privacy = get_field('information_collected', 'option');
			$siteName = get_field('text_sitename', 'option');
			if(!$siteName) {
				$siteName = get_option( 'blogname' );
			}
			$cookies_set = $privacy['cookies_set'];
			$cookies_text =  $privacy['use_of_cookies'];
			$controlling_cookies = $privacy['user_control_cookies'];
			$cookies_used = $privacy['cookies_used_text'];
			$wp_cookies = $privacy['wp_cookies_text'];
			$analytics_cookies = $privacy['analytics_cookies_text'];

			// the_content() gives option to contextualise cookies policy more

			the_content();

		  if(!$cookies_set) {
			 echo $siteName . ' ' . $privacy['no_cookies_set'];
		  } else {
			 echo '<h2 class="h4">';
			 _e( 'What are cookies?', 'acbase' );
			 echo '</h2>';
			 echo $privacy['use_of_cookies'];

		  if($controlling_cookies) {
			 echo '<h2 class="h4">';
			 _e( 'Controlling cookies', 'acbase' );
			 echo '</h2>';
			 echo $controlling_cookies;
		  }

		  if($cookies_used) {
			 echo '<h2 class="h4">';
			 _e( 'Cookies used by this site', 'acbase' );
			 echo '</h2>';
			 echo $cookies_used;
			 echo '<button type="button" class="btn" id="btn-revokeChoice">';
			 _e( 'Revoke Cookie Choice', 'acbase' );
			 echo '</button>';
		  }

		  if($wp_cookies) {
			 echo '<h2 class="h4">';
			 _e( 'Cookies set for registered users', 'acbase' );
			 echo '</h2>';
			 echo $wp_cookies;
		  }

		  if($analytics_cookies) {
			 echo '<h2 class="h4">';
		   _e( 'Cookies set by analytics', 'acbase' );
		   echo '</h2>';
			 echo $analytics_cookies;
		  }
		}
	 ?>

 </div> <!-- end article section -->

	<footer class="article-footer">
	</footer> <!-- end article footer -->

</article> <!-- end article -->

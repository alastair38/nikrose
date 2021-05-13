<article id="post-<?php the_ID(); ?>" class="<?php echo $post->post_name;?>" role="article" itemscope itemtype="http://schema.org/WebPage">

		<header class="article-header">
			<h1 id="skip-target" class="entry-title single-title h3" itemprop="headline"><?php the_title();?></h1>
		</header> <!-- end article header -->

		<?php
		// vars from options page fields

		$privacy = get_field('information_collected', 'option');
		$siteName = get_field('text_sitename', 'option');
		if(!$siteName) {
			$siteName = get_option( 'blogname' );
		}
		$privacyContact = get_field('text_contact', 'option');
		if(!$privacyContact) {
			$privacyContact = get_option( 'admin_email' );
		}
		?>

    <div class="entry-content" itemprop="articleBody">
			<?php
			echo '<p>'. get_field('privacy_general', 'option') . ' ' . $privacyContact . '.</p>';
// vars


		if( $privacy ):
		$no_info = $privacy['no_information_collected'];
		$user_info = $privacy['user_information_collected'];
		$subscriber_info = $privacy['subscriber_information_collected'];

  		if(!$no_info) {
				echo '<p>'. $siteName . ' ' . $privacy['no_information_text'] . '</p>';
			} else {
				echo '<h2 class="h4">';
			 _e( 'Why do you collect personal information?', 'acbase' );
			 echo '</h2>';
				echo '<p>'. $privacy['information_text_intro'] . '</p>';
			}
			if($user_info && $no_info) {
				echo '<p><i class="material-icons left">arrow_forward</i>'. $privacy['user_information_text'] . '</p>';
			}
			if($subscriber_info && $no_info) {
				echo '<p><i class="material-icons left">arrow_forward</i>'. $privacy['mailing_list_text'] . '</p>';
			}

			if(($subscriber_info && $no_info) || ($user_info && $no_info)) {
				if( have_rows('information_collected', 'option') ):

    			while( have_rows('information_collected', 'option') ) : the_row();

        	$info_use = get_sub_field('information_use');

    			endwhile;

				endif;

				echo '<h2 class="h4">';
				_e( 'How is your information used?', 'acbase' );
				echo '</h2>';

				if($user_info) {
					echo '<p>' . $info_use['user_information_use'] . '</p>';
				}
				if($subscriber_info) {
					echo '<p>' . $info_use['subscriber_information_use'] . '</p>';
				}

				echo '<h2 class="h4">';
				_e( 'Who has access to your information?', 'acbase' );
				echo '</h2>';

				echo '<p>' . $privacy['privacy_access'] . '</p>';
				}

				if($user_info) {
				echo '<h2 class="h4">';
				_e( 'How we protect your information?', 'acbase' );
				echo '</h2>';

				echo '<p>' . $privacy['how_we_protect_your_information'] . '</p>';
				}

				echo '<h2 class="h4">';
				_e( 'Cookies', 'acbase' );
				echo '</h2>';

				$cookies_set = $privacy['cookies_set'];
				if(!$cookies_set) {
					echo '<p>' . $siteName . ' ' . $privacy['no_cookies_set'] . '</p>';
				} else {
					echo '<p>' . $privacy['use_of_cookies'];
						if($privacy['cookies_page_link']) {
							echo '<a class="btn-large" href="' . $privacy['cookies_page_link'] . '">View Full Cookies Policy</a>';
						}
					 echo '</p>';
				}

				echo '<h2 class="h4">';
				_e( 'Links', 'acbase' );
				echo '</h2>';

				echo '<p>' . $privacy['links_to_other_sites'] . '</p>';

 			endif; ?>

	</div> <!-- end article section -->

	<footer class="article-footer">
	</footer> <!-- end article footer -->

</article> <!-- end article -->

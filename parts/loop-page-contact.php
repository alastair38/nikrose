<?php //vars from options page fields
$name = get_field('contact_name', 'options');
$email = get_field('contact_email', 'options');
$phone = get_field('contact_phone', 'options');
$town = get_field('town', 'options');
$street = get_field('street', 'options');
$zip = get_field('zip', 'options');
$photo = get_field('contact_photo', 'options');
$contact_map = get_field('contact_map', 'option');
$place = $contact_map['address'];
$place = (explode(" ",$place));
$place = (implode ('+', $place));
$map_key = get_field('api_key', 'option');
$contact_form = get_field('contact_form', 'option');
?>

<article id="post-<?php the_ID(); ?>" class="<?php echo $post->post_name;?>" role="article" itemscope itemtype="http://schema.org/WebPage">

		<header class="article-header">

			<h1 class="entry-title single-title h3" itemprop="headline"><?php the_title();?></h1>

		</header> <!-- end article header -->

    <div class="entry-content row" itemprop="articleBody">

			<?php the_content();

			if($photo) {

				echo

				'<div class="col s12 no-pad">

					<div class="contact-card">

						<div class="cc-content col s12 no-pad">
							<p class="title h5 light">Contact Details</p>';
							if($name) {
								echo '<p>' . $name . '</p>';
							}

							if($street) {
								echo '<p>' . $street;
								if($town) {
								echo '<br />' . $town;
								}
								if($zip) {
								echo '<br />' . $zip;
								}
								echo '</p>';
							}

							if($email):
							echo '<p><a href="mailto:' . $email . '">' . $email . '<svg class="icon icon-mail left"><use xlink:href="' . get_stylesheet_directory_uri() . '/assets/icons/symbol-defs.svg#icon-mail"></use></svg></a></p>';
							endif;

							if($phone):
							echo '<p>' . $phone . '<svg class="icon icon-phone left"><use xlink:href="' . get_stylesheet_directory_uri() . '/assets/icons/symbol-defs.svg#icon-phone"></use></svg></p>';
							endif;

							if ($contact_map) {
							$map_image = 'https://maps.googleapis.com/maps/api/staticmap?center=' . $contact_map['lat'] . ',' . $contact_map['lng'] . '&zoom=16&size=800x385&scale2
							&markers=color:0x01a89e%7Csize:mid%7C' . $contact_map['lat'] . ',' . $contact_map['lng'] . '&key=' . $map_key;

							echo '<img alt="Map showing ' . $street . ', ' . $town . ', ' . $zip . '" class="responsive-img" src="' . $map_image . '">';
							}

						echo '</div>

					</div>

				</div>';
				} else {

				echo

				'<div class="col s6 no-pad">

					<div class="row contact-card">

						<div class="cc-content col s12 no-pad">
							<p class="title h5 light">Contact Details</p>
							<p>' . $name . '</p>';

							if($street) {
								echo '<p>' . $street;
								if($town) {
								echo '<br />' . $town;
								}
								if($zip) {
								echo '<br />' . $zip;
								}
								echo '</p>';
							}

							if($email):
							echo '<p><a href="mailto:' . $email . '">' . $email . '<svg class="icon icon-mail left"><use xlink:href="' . get_stylesheet_directory_uri() . '/assets/icons/symbol-defs.svg#icon-mail"></use></svg></a></p>';
							endif;

							if($phone):
							echo '<p>' . $phone . '<svg class="icon icon-phone left"><use xlink:href="' . get_stylesheet_directory_uri() . '/assets/icons/symbol-defs.svg#icon-phone"></use></svg></p>';
							endif;

						echo '</div>

					</div>

				</div>';

				}

			wp_link_pages(); ?>

			<?php

			if($contact_form) {
				echo do_shortcode("[wpforms id='" . $contact_form . "']");
			}?>

		</div> <!-- end article section -->

		<footer class="article-footer center">

		</footer> <!-- end article footer -->

</article> <!-- end article -->

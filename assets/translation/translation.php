<?php
/*
Thanks to the awesome work by acbase users, there
are many languages you can use to translate your theme.
*/

// Adding Translation Option
add_action('after_setup_theme', 'load_translations');
function load_translations(){
	load_theme_textdomain( 'acbase', get_template_directory() .'/assets/translation' );
}
?>
<form id="search-input" role="search" method="get" class="search search-form toggle-search" action="<?php echo home_url( '/' ); ?>">
	<input onkeydown="return toggleTabSearch()" aria-label="Enter keywords then hit enter" type="search" id="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Type your keywords...then click search', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'jointstheme' ) ?>" />
	<input type="submit" class="search-submit btn" value="<?php echo esc_attr_x( 'Search', 'jointstheme' ) ?>" />
</form>

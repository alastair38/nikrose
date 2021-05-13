<!-- By default, this menu will use off-canvas for small
	 and a topbar for medium-up -->
	 <?php
	 $access = get_field('accessibility_plus', 'option');
	 if ($access){
	 $theme_switcher = get_field('theme_switcher', 'option');
	 $increase_text = get_field('increase_text', 'option');
	 $decrease_text = get_field('decrease_text', 'option');
	 $toolbar_pos = get_field('access_bar_position', 'option');
 }
	 ?>
	 <a id=skip_lnk href="#skip-target">Skip to content</a>
	 <nav aria-label="Main site navigation">
	 	<div class="nav-wrapper ">
			<!-- <?php $logo_image = get_field( "site_logo", "option" );
			if ($logo_image){?>
			<img id="logo" class="brand-logo left" src="<?php echo $logo_image['sizes']['blog-thumbnail size'];?>" alt="<?php bloginfo('name'); ?> logo"/>
			<?php
			} else {?>

			<?php }?> -->

			<?php if ( is_front_page() ) :?>
				<h1 class="brand-logo">
					<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
				</h1>
			<?php else : ?>
				<span class="brand-logo">
					<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
				</span>
			<?php endif;?>

			<div class="hide-on-med-and-down right">
				<?php joints_top_nav(); ?>
			</div>


			<a href="#" data-target="slide-out" class="sidenav-trigger right"><span class="material-icons">menu</span></a>

			<div id="slide-out" class="sidenav show-on-medium-and-down">
<a href="<?php bloginfo('url'); ?>" class="mobile-brand-logo bold"><?php bloginfo('name'); ?></a>

    <?php joints_off_canvas_nav(); ?>
		<?php if ($logo_image){?>
		<img class="mobile-brand-logo" src="<?php echo $logo_image['sizes']['blog-thumbnail size'];?>" width="200" height="200" alt="<?php bloginfo('name'); ?> logo"/>
		<?php
		} else {?>

		<?php }?>
	</div>




	  </div>

		<?php

	if ($access){

	?>
		<div id="access-<?php echo $toolbar_pos;?>" class="grey lighten-4 col s12  hide-on-med-and-down" aria-label="Accessibility Settings">

			<button id="themeContrast" class="btn-flat waves-effect waves-light" type="button" aria-pressed="false"><?php echo $theme_switcher;?></button>

			<button class="btn-flat waves-effect waves-light" id="plustext"><?php echo $increase_text;?><span class="material-icons right">
add_circle_outline
</span></button>
		<button class="btn-flat waves-effect waves-light" id="minustext"><?php echo $decrease_text;?><span class="material-icons right">
remove_circle_outline
</span></button>
		</div>
	<?php }
	?>

	 </nav>

<?php
/**
 *this is the part which will have the logo and nav bar 
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _displayfly
 */

?>

<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
            ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', '_displayfly' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
                    'menu_class'     =>'nav',
				)
			);
			?>
        <div class="search-container">
				<form class="search-bar" action="/action_page.php">
					<input type="text" class="search-bar-input" placeholder="Search.." name="search">
					<div class="submit__button">
						<button type="submit"><i class="fa fa-search" id="fa-ser"></i></button>
					</div>
				</form>
			</div>
		</nav><!-- #site-navigation -->
</header><!-- #masthead -->

<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package indvatx
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header id="masthead" class="site-header" role="banner">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'indvatx' ); ?></a>
		<!-- site navigation block -->
		<div class="main-navigation-wrap">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button type="button" class="btn btn-default menu-btn" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'indvatx' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
		</div>

		<div class="site-branding row">

			<div class="col-md-12">
				<?php
				if ( is_front_page() ) : // && is_home() ?>
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->

			<div class="social-icons container">
			<?php
				// Social Media Icons

				// Facebook
				if (get_theme_mod('fb_link')) {
					echo '<a target="_blank" href="' . get_theme_mod('fb_link') .'"<i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>';
				}
				// Twitter
				if (get_theme_mod('twitter_link')) {
					echo '<a target="_blank" href="' . get_theme_mod('twitter_link') .'"<i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>';
				}

				// Instagram
				if (get_theme_mod('instagram_link')) {
					echo '<a target="_blank" href="' . get_theme_mod('instagram_link') .'"<i class="fa fa-instagram fa-3x" aria-hidden="true"></i></i></a>';
				}

				// YouTube
				if (get_theme_mod('yt_link')) {
					echo '<a target="_blank" href="' . get_theme_mod('yt_link') .'"<i class="fa fa-youtube-square fa-3x" aria-hidden="true"></i></i></a>';
				}

			?>
			</div>

		</div>


	</header><!-- #masthead -->

<div id="page" class="site container">

	<div id="content" class="site-content">

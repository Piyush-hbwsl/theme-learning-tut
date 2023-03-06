<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _displayfly
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://kit.fontawesome.com/bb89e3c55a.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lightbox.css">
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lightbox-plus-jquery.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lightbox.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', '_displayfly' ); ?></a>
	<?php get_template_part('template-parts/header-part')?>
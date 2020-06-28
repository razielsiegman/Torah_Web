<?php
/**
* The header for PureMag theme.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package PureMag WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class('puremag-animated puremag-fadein'); ?> id="puremag-site-body">
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#puremag-posts-wrapper"><?php esc_html_e( 'Skip to content', 'puremag' ); ?></a>

<div class="puremag-container" id="puremag-header" role="banner">
<div class="clearfix" id="puremag-head-content">

<?php if ( get_header_image() ) : ?>
<div class="puremag-header-image clearfix">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="display: block;">
    <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="" class="puremag-header-img"/>
</a>
</div>
<?php endif; ?>

<div class="puremag-header-inside clearfix">
<div id="puremag-logo">
<?php if ( has_custom_logo() ) : ?>
    <div class="site-branding">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="display: block;">
        <img src="<?php echo esc_url( puremag_custom_logo() ); ?>" alt="" class="puremag-logo-image"/>
    </a>
    </div>
<?php else: ?>
    <div class="site-branding">
      <h1 class="puremag-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <p class="puremag-site-description"><?php bloginfo( 'description' ); ?></p>
    </div>
<?php endif; ?>
</div><!--/#puremag-logo -->

<div id="puremag-header-banner">
<?php dynamic_sidebar( 'puremag-header-banner' ); ?>
</div><!--/#puremag-header-banner -->
</div>

</div><!--/#puremag-head-content -->
</div><!--/#puremag-header -->

<div class="puremag-container clearfix" id="puremag-puremag-wrapper">

<div class="puremag-primary-menu-container clearfix">
<div class="puremag-primary-menu-container-inside clearfix">
<nav class="puremag-nav-primary" id="puremag-primary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'puremag' ); ?>">
<button class="puremag-primary-responsive-menu-icon" aria-controls="puremag-menu-primary-navigation" aria-expanded="false"><?php esc_html_e( 'Menu', 'puremag' ); ?></button>
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'puremag-menu-primary-navigation', 'menu_class' => 'puremag-primary-nav-menu puremag-menu-primary', 'fallback_cb' => 'puremag_fallback_menu', 'container' => '', ) ); ?>
</nav>
</div>
</div>

<div class="clearfix" id="puremag-content-wrapper">
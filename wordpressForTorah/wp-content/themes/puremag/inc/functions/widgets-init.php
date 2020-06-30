<?php
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*
* @package PureMag WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function puremag_widgets_init() {

register_sidebar(array(
    'id' => 'puremag-header-banner',
    'name' => esc_html__( 'Header Banner', 'puremag' ),
    'description' => esc_html__( 'This sidebar is located on the header of the web page.', 'puremag' ),
    'before_widget' => '<div id="%1$s" class="puremag-header-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="puremag-widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'puremag-main-sidebar',
    'name' => esc_html__( 'Main Sidebar', 'puremag' ),
    'description' => esc_html__( 'This sidebar is located on the right-hand side of web page.', 'puremag' ),
    'before_widget' => '<div id="%1$s" class="puremag-side-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="puremag-widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'puremag-home-top-widgets',
    'name' => esc_html__( 'Top Widgets (Home Page Only)', 'puremag' ),
    'description' => esc_html__( 'This widget area is located at the top of homepage.', 'puremag' ),
    'before_widget' => '<div id="%1$s" class="puremag-main-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="puremag-widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'puremag-top-widgets',
    'name' => esc_html__( 'Top Widgets (Every Page)', 'puremag' ),
    'description' => esc_html__( 'This widget area is located at the top of every page.', 'puremag' ),
    'before_widget' => '<div id="%1$s" class="puremag-main-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="puremag-widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'puremag-home-bottom-widgets',
    'name' => esc_html__( 'Bottom Widgets (Home Page Only)', 'puremag' ),
    'description' => esc_html__( 'This widget area is located at the bottom of homepage.', 'puremag' ),
    'before_widget' => '<div id="%1$s" class="puremag-main-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="puremag-widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'puremag-bottom-widgets',
    'name' => esc_html__( 'Bottom Widgets (Every Page)', 'puremag' ),
    'description' => esc_html__( 'This widget area is located at the bottom of every page.', 'puremag' ),
    'before_widget' => '<div id="%1$s" class="puremag-main-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="puremag-widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'puremag-footer-1',
    'name' => esc_html__( 'Footer 1', 'puremag' ),
    'description' => esc_html__( 'This sidebar is located on the left bottom of web page.', 'puremag' ),
    'before_widget' => '<div id="%1$s" class="puremag-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="puremag-widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'puremag-footer-2',
    'name' => esc_html__( 'Footer 2', 'puremag' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'puremag' ),
    'before_widget' => '<div id="%1$s" class="puremag-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="puremag-widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'puremag-footer-3',
    'name' => esc_html__( 'Footer 3', 'puremag' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'puremag' ),
    'before_widget' => '<div id="%1$s" class="puremag-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="puremag-widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'puremag-footer-4',
    'name' => esc_html__( 'Footer 4', 'puremag' ),
    'description' => esc_html__( 'This sidebar is located on the right bottom of web page.', 'puremag' ),
    'before_widget' => '<div id="%1$s" class="puremag-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="puremag-widget-title">',
    'after_title' => '</h2>'));

}
add_action( 'widgets_init', 'puremag_widgets_init' );
<?php
/*
Plugin Name: Widget Post Slider
Plugin https://shapedplugin.com/plugin/widget-post-slider-pro/
Author: ShapedPlugin
Author URI: http://shapedplugin.com
Description: Widget Post Slider to display posts image in a slider from category.
Version: 1.3
*/

// Don't call the file directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'Widget_Post_Slider_URL', plugins_url( '/' ) . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'Widget_Post_Slider_PATH', plugin_dir_path( __FILE__ ) );

require_once Widget_Post_Slider_PATH . 'inc/scripts.php';
require_once Widget_Post_Slider_PATH . 'inc/functions.php';

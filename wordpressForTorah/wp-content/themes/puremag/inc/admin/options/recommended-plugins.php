<?php
/**
* Recommended plugins options
*
* @package PureMag WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function puremag_recomm_plugin_options($wp_customize) {

    $wp_customize->add_section( 'sc_recommended_plugins', array( 'title' => esc_html__( 'Recommended Plugins', 'puremag' ), 'panel' => 'puremag_main_options_panel', 'priority' => 880 ));

    $wp_customize->add_setting( 'puremag_options[recommended_plugins]', array( 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'puremag_sanitize_recommended_plugins' ) );

    $wp_customize->add_control( new PureMag_Customize_Recommended_Plugins( $wp_customize, 'puremag_recommended_plugins_control', array( 'label' => esc_html__( 'Recommended Plugins', 'puremag' ), 'section' => 'sc_recommended_plugins', 'settings' => 'puremag_options[recommended_plugins]', 'type' => 'tdna-recommended-wpplugins' ) ) );

}
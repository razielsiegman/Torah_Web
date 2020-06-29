<?php
/**
* Enqueue scripts and styles
*
* @package PureMag WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function puremag_scripts() {
    wp_enqueue_style('puremag-maincss', get_stylesheet_uri(), array(), NULL);
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), NULL );
    wp_enqueue_style('puremag-webfont', '//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Domine:400,700|Oswald:400,700', array(), NULL);
    wp_enqueue_script('fitvids', get_template_directory_uri() .'/assets/js/jquery.fitvids.js', array( 'jquery' ), NULL, true);

    $puremag_sticky_menu = FALSE;

    wp_enqueue_script('resizesensor', get_template_directory_uri() .'/assets/js/ResizeSensor.js', array( 'jquery' ), NULL, true);
    wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() .'/assets/js/theia-sticky-sidebar.js', array( 'jquery' ), NULL, true);
    wp_enqueue_script('puremag-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), NULL, true );
    wp_enqueue_script('puremag-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), NULL, true );
    wp_enqueue_script('puremag-customjs', get_template_directory_uri() .'/assets/js/custom.js', array( 'jquery' ), NULL, true);
    wp_localize_script( 'puremag-customjs', 'puremag_ajax_object',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'sticky_menu' => $puremag_sticky_menu,
        )
    );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'puremag_scripts' );

/**
 * Enqueue IE compatible scripts and styles.
 */
function puremag_ie_scripts() {
    wp_enqueue_script( 'puremag-html5shiv', get_template_directory_uri(). '/assets/js/html5shiv.js', array(), NULL, false);
    wp_script_add_data( 'puremag-html5shiv', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'puremag-respond', get_template_directory_uri(). '/assets/js/respond.js', array(), NULL, false );
    wp_script_add_data( 'puremag-respond', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'puremag_ie_scripts' );

/**
 * Enqueue customizer styles.
 */
function puremag_enqueue_customizer_styles() {
    wp_enqueue_style( 'puremag-customizer-styles', get_template_directory_uri() . '/inc/admin/css/customizer-style.css', array(), NULL );
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), NULL );
}
add_action( 'customize_controls_enqueue_scripts', 'puremag_enqueue_customizer_styles' );
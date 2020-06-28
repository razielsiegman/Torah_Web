<?php
/**
* Posts navigation functions
*
* @package PureMag WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'puremag_wp_pagenavi' ) ) :
function puremag_wp_pagenavi() {
    ?>
    <nav class="navigation posts-navigation clearfix" role="navigation">
        <?php wp_pagenavi(); ?>
    </nav><!-- .navigation -->
    <?php
}
endif;

if ( ! function_exists( 'puremag_posts_navigation' ) ) :
function puremag_posts_navigation() {
    if ( function_exists( 'wp_pagenavi' ) ) {
        puremag_wp_pagenavi();
    } else {
        the_posts_navigation(array('prev_text' => esc_html__( '&larr; Older posts', 'puremag' ), 'next_text' => esc_html__( 'Newer posts &rarr;', 'puremag' )));
    }
}
endif;
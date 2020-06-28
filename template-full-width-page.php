<?php
/**
* The template for displaying full-width page.
*
* @package PureMag WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*
* Template Name: Full Width, no sidebar
* Template Post Type: page
*/

get_header(); ?>

<div class="puremag-main-wrapper clearfix" id="puremag-main-wrapper" role="main">
<div class="theiaStickySidebar">

<div class="puremag-posts-wrapper" id="puremag-posts-wrapper">

<?php while (have_posts()) : the_post(); ?>

    <?php get_template_part( 'template-parts/content', 'page' ); ?>

    <?php
    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || get_comments_number() ) :
            comments_template();
    endif;
    ?>

<?php endwhile; ?>
<div class="clear"></div>

</div><!--/#puremag-posts-wrapper -->

</div>
</div><!-- /#puremag-main-wrapper -->

<?php get_footer(); ?>
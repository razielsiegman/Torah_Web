<?php
/**
* The template for displaying archive pages.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package PureMag WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class="puremag-main-wrapper clearfix" id="puremag-main-wrapper" role="main">
<div class="theiaStickySidebar">

<div class="puremag-featured-posts-area clearfix">
<?php dynamic_sidebar( 'puremag-top-widgets' ); ?>
</div>

<div class="puremag-posts-wrapper" id="puremag-posts-wrapper">

<div class="puremag-posts">

<header class="page-header">
<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
</header>

<div class="puremag-posts-content">

<?php if (have_posts()) : ?>

    <div class="puremag-posts-container">
    <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
    <?php if ( function_exists('wpp_get_mostpopular') ) {
	    $args = array('author' => 'author_name');
		wpp_get_mostpopular($args );
	} ?>
    <?php while (have_posts()) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', puremag_post_style() ); ?>

    <?php endwhile; ?>
    </div>
    <div class="clear"></div>

    <?php puremag_posts_navigation(); ?>

<?php else : ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

</div>
</div>

</div><!--/#puremag-posts-wrapper -->

<div class='puremag-featured-posts-area clearfix'>
<?php dynamic_sidebar( 'puremag-bottom-widgets' ); ?>
</div>

</div>
</div><!-- /#puremag-main-wrapper -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
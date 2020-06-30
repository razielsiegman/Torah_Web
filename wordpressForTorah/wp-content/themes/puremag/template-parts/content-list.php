<?php
/**
* Template part for displaying posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package PureMag WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<div id="post-<?php the_ID(); ?>" class="puremag-list-post">

    <?php if ( has_post_thumbnail() ) { ?>
    <?php if ( !(puremag_get_option('hide_thumbnail')) ) { ?>
    <div class="puremag-list-post-thumbnail">
        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( /* translators: %s: post title */ sprintf( __( 'Permanent Link to %s', 'puremag' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="puremag-list-post-thumbnail-link"><?php the_post_thumbnail('puremag-medium-image', array('class' => 'puremag-list-post-thumbnail-img')); ?></a>
    </div>
    <?php } ?>
    <?php } ?>

    <?php if((has_post_thumbnail()) && !(puremag_get_option('hide_thumbnail'))) { ?><div class="puremag-list-post-details"><?php } ?>
    <?php if(!(has_post_thumbnail()) || (puremag_get_option('hide_thumbnail'))) { ?><div class="puremag-list-post-details-full"><?php } ?>

    <?php if ( !(puremag_get_option('hide_post_categories')) ) { ?><?php puremag_list_cats(); ?><?php } ?>

    <?php the_title( sprintf( '<h3 class="puremag-list-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

    <?php puremag_list_postmeta(); ?>

    <?php if ( !(puremag_get_option('hide_post_snippet')) ) { ?><div class="puremag-list-post-snippet"><?php the_excerpt(); ?></div><?php } ?>

    <?php if ( !(puremag_get_option('hide_read_more_button')) ) { ?><div class='puremag-list-post-read-more'><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( puremag_read_more_text() ); ?><span class="screen-reader-text"> <?php the_title(); ?></span></a></div><?php } ?>

    <?php if(!(has_post_thumbnail()) || (puremag_get_option('hide_thumbnail'))) { ?></div><?php } ?>
    <?php if((has_post_thumbnail()) && !(puremag_get_option('hide_thumbnail'))) { ?></div><?php } ?>

</div>
<?php
/**
* Post meta functions
*
* @package PureMag WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'puremag_post_tags' ) ) :
/**
 * Prints HTML with meta information for the tags.
 */
function puremag_post_tags() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'puremag' ) );
        if ( $tags_list ) {
            /* translators: 1: list of tags. */
            printf( '<span class="tags-links"><i class="fa fa-tags" aria-hidden="true"></i> ' . esc_html__( 'Tagged %1$s', 'puremag' ) . '</span>', $tags_list ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
        }
    }
}
endif;


if ( ! function_exists( 'puremag_full_cats' ) ) :
function puremag_full_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( '&nbsp;', 'puremag' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="puremag-full-post-categories">' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'puremag' ) . '</div>', $categories_list ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
        }
    }
}
endif;


if ( ! function_exists( 'puremag_full_postmeta' ) ) :
function puremag_full_postmeta() { ?>
    <?php if ( !(puremag_get_option('hide_post_author')) || !(puremag_get_option('hide_posted_date')) || !(puremag_get_option('hide_comments_link')) ) { ?>
    <div class="puremag-full-post-footer">
    <?php if ( !(puremag_get_option('hide_post_author')) ) { ?><span class="puremag-full-post-author puremag-full-post-meta"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="screen-reader-text"><?php esc_html_e('Author: ', 'puremag'); ?></span><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?>
    <?php if ( !(puremag_get_option('hide_posted_date')) ) { ?><span class="puremag-full-post-date puremag-full-post-meta"><span class="screen-reader-text"><?php esc_html_e('Published Date: ', 'puremag'); ?></span><?php echo esc_html(get_the_date()); ?></span><?php } ?>
    <?php if ( !(puremag_get_option('hide_comments_link')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="puremag-full-post-comment puremag-full-post-meta"><?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'puremag' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;


if ( ! function_exists( 'puremag_list_cats' ) ) :
function puremag_list_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( '&nbsp;', 'puremag' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="puremag-list-post-categories">' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'puremag' ) . '</div>', $categories_list ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
        }
    }
}
endif;


if ( ! function_exists( 'puremag_list_postmeta' ) ) :
function puremag_list_postmeta() { ?>
    <?php if ( !(puremag_get_option('hide_post_author')) || !(puremag_get_option('hide_posted_date')) || !(puremag_get_option('hide_comments_link')) ) { ?>
    <div class="puremag-list-post-footer">
    <?php if ( !(puremag_get_option('hide_post_author')) ) { ?><span class="puremag-list-post-author puremag-list-post-meta"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="screen-reader-text"><?php esc_html_e('Author: ', 'puremag'); ?></span><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?>
    <?php if ( !(puremag_get_option('hide_posted_date')) ) { ?><span class="puremag-list-post-date puremag-list-post-meta"><span class="screen-reader-text"><?php esc_html_e('Published Date: ', 'puremag'); ?></span><?php echo esc_html(get_the_date()); ?></span><?php } ?>
    <?php if ( !(puremag_get_option('hide_comments_link')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="puremag-list-post-comment puremag-list-post-meta"><?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'puremag' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;


if ( ! function_exists( 'puremag_single_cats' ) ) :
function puremag_single_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list( esc_html__( ', ', 'puremag' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="puremag-entry-meta-single puremag-entry-meta-single-top"><span class="puremag-entry-meta-single-cats"><i class="fa fa-folder-open-o" aria-hidden="true"></i>&nbsp;' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'puremag' ) . '</span></div>', $categories_list ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
        }
    }
}
endif;


if ( ! function_exists( 'puremag_single_postmeta' ) ) :
function puremag_single_postmeta() { ?>
    <?php if ( !(puremag_get_option('hide_post_author')) || !(puremag_get_option('hide_posted_date')) || !(puremag_get_option('hide_comments_link')) || !(puremag_get_option('hide_post_edit')) ) { ?>
    <div class="puremag-entry-meta-single">
    <?php if ( !(puremag_get_option('hide_post_author')) ) { ?><span class="puremag-entry-meta-single-author"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="screen-reader-text"><?php esc_html_e('Author: ', 'puremag'); ?></span><?php echo esc_html( get_the_author() ); ?></a></span></span><?php } ?>
    <?php if ( !(puremag_get_option('hide_posted_date')) ) { ?><span class="puremag-entry-meta-single-date"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<span class="screen-reader-text"><?php esc_html_e('Published Date: ', 'puremag'); ?></span><?php echo esc_html(get_the_date()); ?></span><?php } ?>
    <?php if ( !(puremag_get_option('hide_comments_link')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="puremag-entry-meta-single-comments"><i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'puremag' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ) ); ?></span>
    <?php } ?><?php } ?>
    <?php if ( !(puremag_get_option('hide_post_edit')) ) { ?><?php edit_post_link( sprintf( wp_kses( /* translators: %s: Name of current post. Only visible to screen readers */ __( 'Edit<span class="screen-reader-text"> %s</span>', 'puremag' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ), '<span class="edit-link">&nbsp;&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> ', '</span>' ); ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;
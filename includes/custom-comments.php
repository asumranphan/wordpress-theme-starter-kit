<?php
/**
 * Custom displaying comments for this theme
 *
 * @package WordPress
 * @subpackage WordPress_Theme_Starter_Kit
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'wordpress_theme_starter_kit_comment_form_default_fields' ) ) {

    function wordpress_theme_starter_kit_comment_form_default_fields( $feilds ) {

        $commenter = wp_get_current_commenter();
        $req       = get_option( 'require_name_email' );
        $html_req  = ( $req ? ' required="required" ' : '' );
        $html5     = current_theme_supports( 'html5', 'comment-form' );

        $feilds['author'] = '<div class="form-group comment-form-author"><label for="author">' . __( 'Name', 'wordpress-theme-starter-kit' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input type="text" class="form-control" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $html_req . '/></div>';

        $feilds['email'] = '<div class="form-group comment-form-email"><label for="email">' . __( 'Email', 'wordpress-theme-starter-kit' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $html_req . '/></div>';

        $feilds['url'] = '<div class="form-group comment-form-url"><label for="url">' . __( 'Website', 'wordpress-theme-starter-kit' ) . '</label><input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200"/></div>';

        if ( has_action( 'set_comment_cookies', 'wp_set_comment_cookies' ) && get_option( 'show_comments_cookies_opt_in' ) ) {
            $consent           = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
            $feilds['cookies'] = '<div class="form-group"><div class="form-check comment-form-cookies-consent"><input type="checkbox" class= "form-check-input" id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" value="yes"' . $consent . ' /> <label class="form-check-label" for="wp-comment-cookies-consent">' . __( 'Save my name, email, and website in this browser for the next time I comment.', 'wordpress-theme-starter-kit' ) . '</label></div></div>';
        }

        return $feilds;
    }
}

add_filter( 'comment_form_default_fields', 'wordpress_theme_starter_kit_comment_form_default_fields' );

if ( ! function_exists( 'wordpress_theme_starter_kit_comment_form_defaults' ) ) {

    function wordpress_theme_starter_kit_comment_form_defaults( $args ) {

        $args['comment_field'] = '<div class="form-group comment-form-comment"><label for="comment">' . _x( 'Comment', 'wordpress-theme-starter-kit' ) . '</label> <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></div>';

        $args['class_submit'] = 'btn btn-dark';

        return $args;
    }
}

add_filter( 'comment_form_defaults', 'wordpress_theme_starter_kit_comment_form_defaults' );

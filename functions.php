<?php
/**
 * WordPress Theme Starter Kit functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress_Theme_Starter_Kit
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'wordpress_theme_starter_kit_setup' ) ) {

    /**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
    function wordpress_theme_starter_kit_setup() {
        /*
         * This feature enables Theme Logo support for a theme.
         */
        add_theme_support( 'custom-logo' );

        /*
         * This feature enables Post Thumbnails support for a theme.
         *
         * Note that you can optionally pass a second argument, $args, with an array of the Post Types
         * for which you want to enable this feature.
         */
        add_theme_support( 'post-thumbnails' );

        /*
         * This feature allows the use of HTML5 markup for the search forms, comment forms,
         * comment lists, gallery, and caption.
         */
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

        /*
         * This feature enables plugins and themes to manage the document title tag
         * that should be used in place of wp_title() function.
         */
        add_theme_support( 'title-tag' );

        /*
         * This feature enables Selective Refresh for Widgets being managed within the Customizer.
         */
        add_theme_support( 'customize-selective-refresh-widgets' );

        /*
         * This feature enables some blocks such as the image block have the possibility
         * to define a “wide” or “full” alignment.
         */
        add_theme_support( 'align-wide' );

        /*
         * This feature automatically apply styles to embedded content to reflect
         * the aspect ratio of content.
         */
        add_theme_support( 'responsive-embeds' );
    }
}

add_action( 'after_setup_theme', 'wordpress_theme_starter_kit_setup' );
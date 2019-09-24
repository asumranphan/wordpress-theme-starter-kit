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

/**
 * Register navigation menu location.
 *
 * @link https://developer.wordpress.org/themes/functionality/navigation-menus/
 */
function wordpress_theme_starter_kit_menus() {
    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu', 'wordpress-theme-starter-kit' ),
        )
    );
}

add_action( 'init', 'wordpress_theme_starter_kit_menus' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wordpress_theme_starter_kit_sidebar() {
    register_sidebar(
        array(
            'name'          => __( 'Sidebar', 'wordpress-theme-starter-kit' ),
            'id'            => 'sidebar',
            'description'   => __( 'Add widgets here to appear in your sidebar.', 'wordpress-theme-starter-kit' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}

add_action( 'widgets_init', 'wordpress_theme_starter_kit_sidebar' );

/**
 * Enqueue scripts and styles.
 */
function wordpress_theme_starter_kit_scripts() {

    wp_enqueue_script( 'wordpress-theme-starter-kit-scripts', get_template_directory_uri() . '/assets/js/theme.min.js', array( 'jquery' ), '1.0.0', true );

    wp_enqueue_style( 'wordpress-theme-starter-kit-styles', get_template_directory_uri() . '/assets/css/theme.min.css', array(), '1.0.0' );
}

add_action( 'wp_enqueue_scripts', 'wordpress_theme_starter_kit_scripts' );

/**
 * Remove width and height attribute out of an image.
 *
 * @param string $html The post thumbnail HTML.
 */
function remove_image_attribute( $html ) {

    $html = preg_replace( '/(width|height)="\d*"\s/', '', $html );
    return $html;
}

add_filter( 'post_thumbnail_html', 'remove_image_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_image_attribute', 10 );

/**
 * Add an additional post class.
 *
 * @param array $classes An array of post class names.
 */
function add_post_classes( $classes ) {

    if ( ! is_singular() ) {
        $classes[] = 'post-item mb-3';
    }

    return $classes;
}

add_filter( 'post_class', 'add_post_classes' );

/**
 * Register Custom Navigation Walker
 */
require_once get_template_directory() . '/classes/class-wp-bootstrap-walker-nav-menu.php';

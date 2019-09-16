<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress_Theme_Starter_Kit
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="profile" href="https://gmpg.org/xfn/11" />
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <?php echo bloginfo( 'name' ); ?>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="bs-navbar-collapse">
                    <?php
                    if ( has_nav_menu( 'primary' ) ) {
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'container'      => '',
                                'menu_class'     => 'navbar-nav mr-auto',
                                'fallback_cb'    => 'WP_Bootstrap_Walker_Nav_Menu::fallback',
                                'walker'         => new WP_Bootstrap_Walker_Nav_Menu(),
                            )
                        );
                    }
                    ?>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">

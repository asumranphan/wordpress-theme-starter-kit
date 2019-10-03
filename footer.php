<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress_Theme_Starter_Kit
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
            </div>
        </div>

        <footer class="site-footer">
            <?php if ( is_active_sidebar( 'footer' ) ) : ?>
                <aside class="container widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'wordpress-theme-stater-kit' ); ?>">
                    <?php dynamic_sidebar( 'footer' ); ?>
                </aside>
            <?php endif; ?>

            <div class="container site-info">
                <a class="footer-brand" href="<?php echo esc_url( home_url() ); ?>">
                    <?php echo bloginfo( 'name' ); ?>
                </a>

                <nav class="footer-navigation">
                    <?php
                    if ( has_nav_menu( 'footer' ) ) {
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer',
                                'container'      => '',
                                'menu_class'     => 'nav',
                                'fallback_cb'    => 'WP_Bootstrap_Walker_Nav_Menu::fallback',
                                'walker'         => new WP_Bootstrap_Walker_Nav_Menu(),
                            )
                        );
                    }
                    ?>
                </nav>
            </div>

            <div class="container site-copyright">
                <?php esc_html_e( 'Copyright © 2019 WordPress Theme Starter Kit.', 'wordpress-theme-starter-kit' ); ?>
            </div>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>

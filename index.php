<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress_Theme_Starter_Kit
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

    <div id="primary" class="col-md-8 content-area">
        <main id="main" class="<?php echo esc_attr( is_singular() ? 'site-main' : 'site-main posts-list' ); ?>" role="main">

            <?php
            while ( have_posts() ) {
                the_post();

                if ( is_singular() ) {
                    get_template_part( 'template-parts/content', 'single' );
                } else {
                    get_template_part( 'template-parts/content' );
                }
            }

            the_posts_pagination(
                array(
                    'mid_size'  => 2,
                    'prev_text' => sprintf(
                        '%s <span class="nav-prev-text">%s</span>',
                        '<i class="fas fa-chevron-left mr-1"></i>',
                        __( 'Newer posts', 'wordpress-theme-starter-kit' )
                    ),
                    'next_text' => sprintf(
                        '<span class="nav-next-text">%s</span> %s',
                        __( 'Older posts', 'wordpress-theme-starter-kit' ),
                        '<i class="fas fa-chevron-right ml-1"></i>'
                    ),
                )
            );
            ?>

        </main>
    </div>

<?php
get_sidebar();
get_footer();
?>

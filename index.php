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

    <div id="primary" class="content-area">
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
            ?>

        </main>
    </div>

<?php
get_footer();
?>

<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress_Theme_Starter_Kit
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

    <div id="primary" class="col-md-8 content-area">
        <main id="main" class="site-main" role="main">

            <?php
            while ( have_posts() ) {
                the_post();

                get_template_part( 'template-parts/content', 'single' );
            }
            ?>

        </main>
    </div>

<?php
get_sidebar();
get_footer();
?>

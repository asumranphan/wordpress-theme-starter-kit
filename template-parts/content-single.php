<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress_Theme_Starter_Kit
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header>

    <div class="entry-meta mb-4">
        <?php wordpress_theme_starter_kit_posted_by(); ?>
        <?php wordpress_theme_starter_kit_posted_on(); ?>
    </div>

    <?php if ( has_post_thumbnail() ) : ?>
        <figure class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
        </figure>
    <?php endif; ?>

    <div class="entry-content">
        <?php the_content(); ?>
    </div>
</article>


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
    <?php if ( has_post_thumbnail() ) : ?>
        <figure class="post-thumbnail mb-0 mr-3">
            <a class="post-thumbnail__link d-inline-block" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php the_post_thumbnail(); ?>
            </a>
        </figure>
    <?php endif; ?>

    <div class="post-item__content">
        <header class="entry-header">
            <?php
            the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h>' );
            ?>
        </header>

        <div class="entry-meta mb-2">
            <?php wordpress_theme_starter_kit_posted_by(); ?>
            <?php wordpress_theme_starter_kit_posted_on(); ?>
        </div>

        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div>
    </div>
</article>

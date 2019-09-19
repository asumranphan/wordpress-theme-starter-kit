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
            <span class="byline">
                <i class="fas fa-user-circle"></i>
                <span class="screen-reader-text">
                    <?php esc_html_e( 'Posted by', 'wordpress-theme-starter-kit' ); ?>
                </span>
                <span class="author vcard">
                    <a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                        <?php echo esc_html( get_the_author() ); ?>
                    </a>
                </span>
            </span>

            <span class="posted-on">
                <i class="far fa-clock"></i>
                <a class="posted-on__link" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                    <time class="entry-date published updated" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
                        <?php echo esc_html( get_the_date() ); ?>
                    </time>
                </a>
            </span>
        </div>

        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div>
    </div>
</article>

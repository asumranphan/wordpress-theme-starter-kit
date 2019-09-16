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
        <?php
        if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
        endif;
        ?>
    </header>

    <?php if ( has_post_thumbnail() ) : ?>
        <figure class="post-thumbnail">
            <?php
            if ( is_singular() ) :
                the_post_thumbnail();
            else :
                ?>
                <a class="post-thumbnail-inner" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                    <?php the_post_thumbnail( 'thumbnail' ); ?>
                </a>
                <?php
            endif;
            ?>
        </figure>
    <?php endif; ?>

    <div class="entry-content">
        <?php the_content(); ?>
    </div>
</article>

<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress_Theme_Starter_Kit
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
}

?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>

        <?php comment_form(); ?>

        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();

            if ( 1 === (int) $comments_number ) {
                printf(
                    /* translators: %s: post title */
                    esc_html_x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'wordpress-theme-starter-kit' ),
                    '<span>' . get_the_title() . '</span>'
                ); // WPCS: XSS OK.
            } else {
                printf(
                    esc_html(
                        /* translators: 1: number of comments, 2: post title */
                        _nx(
                            '%1$s reply on &ldquo;%2$s&rdquo;',
                            '%1$s replies on &ldquo;%2$s&rdquo;',
                            $comments_number,
                            'comments title',
                            'wordpress-theme-starter-kit'
                        )
                    ),
                    number_format_i18n( $comments_number ),
                    '<span>' . get_the_title() . '</span>'
                ); // WPCS: XSS OK.
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'       => 'ol',
                    'avatar_size' => 70,
                    'short_ping'  => true,
                )
            );
            ?>
        </ol>

        <?php
        the_comments_navigation(
            array(
                'prev_text' => sprintf( '%s <span class="nav-previous-text">%s</span>', '<i class="fas fa-chevron-left mr-1"></i>', __( 'Previous Comment', 'wordpress-theme-starter-kit' ) ),
                'next_text' => sprintf( '<span class="nav-next-text">%s</span> %s', __( 'Next Comment', 'wordpress-theme-starter-kit' ), '<i class="fas fa-chevron-right ml-1"></i>' ),
            )
        );
        ?>

        <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments">
				<?php esc_html_e( 'Comments are closed.', 'wordpress-theme-starter-kit' ); ?>
			</p>
		<?php endif; ?>

    <?php else : ?>

        <?php comment_form(); ?>

    <?php endif; ?>
</div>

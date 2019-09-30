<?php
/**
 * Custom template tags for this theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-tags/
 *
 * @package WordPress_Theme_Starter_Kit
 */

if ( ! function_exists( 'wordpress_theme_starter_kit_posted_on' ) ) {

    /**
	 * Prints HTML with meta information for the current post-date/time.
	 */
    function wordpress_theme_starter_kit_posted_on() {

        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated d-none" datetime="%3$s"> (%4$s) </time>';
		}

        $time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
			'<i class="far fa-clock mr-2"></i>',
			esc_url( get_permalink() ),
			$time_string
		); // WPCS: XSS ok.
    }
}

if ( ! function_exists( 'wordpress_theme_starter_kit_posted_by' ) ) {

	/**
	 * Prints HTML with meta information about theme author.
	 */
	function wordpress_theme_starter_kit_posted_by() {

		printf(
			'<span class="byline">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>',
			'<i class="fas fa-user-circle mr-2"></i>',
			esc_html__( 'Posted by', 'wordpress-theme-starter-kit' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
}

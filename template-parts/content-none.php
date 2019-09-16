<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress_Theme_Stater_Kit
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title">
            <?php esc_html_e( 'Nothing Found', 'wordpress-theme-starter-kit' ); ?>
        </h1>
	</header>

	<div class="page-content">
        <p>
            <?php esc_html_e( 'Oops! It seems we can&rsquo;t find what you\'re looking for. Perhaps searching can help.', 'wordpress-theme-starter-kit' ); ?>
        </p>

        <?php get_search_form(); ?>
	</div>
</section>

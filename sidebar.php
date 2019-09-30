<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<aside class="col-md-4 widget-area" id="secondary" role="complementary">
	<?php dynamic_sidebar( 'sidebar' ); ?>
</aside>

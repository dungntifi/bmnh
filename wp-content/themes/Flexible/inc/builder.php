<?php
/**
 * Page builder custom functions.
 *
 * @package    SuperNews
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2014, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Setup the mobile width number for the page buidler.
 *
 * @since  1.0.0
 * @param  array $settings
 * @return array
 */

/**
 * Custom widgets for page builder.
 * 
 * @since  1.0.0
 */
function flexible_builder_init() {

	// Register ad builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/ads.php';
	register_widget( 'SuperNews_Ads_Builder' );

	// Register slider builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/slider.php';
	register_widget( 'SuperNews_Slider_Builder' );

	// Register headlines builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/headlines.php';
	register_widget( 'SuperNews_Headlines_Builder' );

	// Register posts list builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/posts-varian-1.php';
	register_widget( 'SuperNews_Posts_Varian1_Builder' );

	// Register posts list builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/posts-varian-2.php';
	register_widget( 'SuperNews_Posts_Varian2_Builder' );

	// Register posts list builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/posts-varian-3.php';
	register_widget( 'SuperNews_Posts_Varian3_Builder' );

	// Register posts list builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/posts-varian-4.php';
	register_widget( 'SuperNews_Posts_Varian4_Builder' );

}
add_action( 'widgets_init', 'flexible_builder_init' );
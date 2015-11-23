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
	require trailingslashit( get_template_directory() ) . 'inc/builder/contact-form.php';
	register_widget( 'SuperNews_Contact_Builder' );

	// Register slider builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/slider.php';
	register_widget( 'SuperNews_Slider_Builder' );

	// Register headlines builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/paragraph.php';
	register_widget( 'SuperNews_Paragraph_Builder' );

	// Register posts list builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/community_lunches.php';
	register_widget( 'SuperNews_Community_Lunches_Builder' );

	// Register posts list builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/sponsor.php';
	register_widget( 'SuperNews_Sponsor_Builder' );

	// Register posts list builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/list_category.php';
	register_widget( 'SuperNews_List_Category_Builder' );

	// Register posts list builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/posts-detail.php';
	register_widget( 'SuperNews_Posts_Builder' );
	// Register posts list builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/course.php';
	register_widget( 'SuperNews_Course_Builder' );
	// Register posts list builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/newsletter.php';
	register_widget( 'SuperNews_NewsLetter_Builder' );
// Register posts list builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/footer-widget.php';
	register_widget( 'SuperNews_Footer_Widget_Builder' );

}
add_action( 'widgets_init', 'flexible_builder_init' );

<?php
/**
 * Posts List Varian 2 builder.
 *
 * @package    SuperNews
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2014, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class SuperNews_Posts_Varian2_Builder extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'     => 'builder-supernews-posts-varian-2',
			'description'   => __( 'Display posts list based on user selected category.', 'supernews' ),
			'panels_groups' => array( 'panels' ),
		);

		// Create the widget.
		$this->WP_Widget(
			'supernews-builder-posts-varian-2',                 // $this->id_base
			__( 'Builder - Posts List Varian 2', 'supernews' ), // $this->name
			$widget_options                                     // $this->widget_options
		);
	}

	/**
	 * Outputs the widget based on the arguments input through the widget controls.
	 *
	 * @since 1.0.0
	 */
	function widget( $args, $instance ) {
		extract( $args );

		// Output the theme's $before_widget wrapper.
		echo $before_widget;

			// Pull the selected category.
			$cat_id = (int) $instance['cat'];

			// Get the category.
			$category = get_category( $cat_id );

			// Get the category archive link.
			$cat_link = get_category_link( $cat_id );

			// Posts query arguments.
			$args = array(
				'posts_per_page' => 5,
				'post_type'      => 'post',
			);

			// Limit to category based on user selected tag.
			if ( ! empty( $instance['cat'] ) ) {
				$args['cat'] = (int) $instance['cat'];
			}

			// Allow dev to filter the post arguments.
			$query = apply_filters( 'supernews_posts_varian2_builder', $args );

			// The post query.
			$posts = new WP_Query( $query );

			if ( $posts->have_posts() ) : ?>
				<section class="content-block-2 category-box clearfix">

					<h3 class="section-title">
						<a href="<?php echo esc_url( $cat_link ); ?>"><?php echo $category->name; ?></a>
					</h3>
					
					<ul>
						<?php $i = 0; ?>
						<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

							<?php if ( ++$i == 1 ) : ?>

								<li class="article-first">
									<?php if ( has_post_thumbnail() ) : ?>
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'supernews-grid-1', array( 'class' => 'entry-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?></a>
									<?php endif; ?>
									<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
									
									<div class="entry-summary">
										<?php echo apply_filters( 'truenews_posts_1col', wp_trim_words( get_the_excerpt(), 55 ) ); ?>
									</div><!-- .entry-summary -->
									
								</li>

							<?php else : ?>

								<li class="article-list">
									<?php if ( has_post_thumbnail() ) : ?>
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'supernews-widget-thumb', array( 'class' => 'entry-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?></a>
									<?php endif; ?>
									<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
									
								</li>
							
							<?php endif; ?>

						<?php endwhile; ?>
					</ul>

				</section>
			<?php endif;

			// Restore original Post Data.
			wp_reset_postdata();

		// Close the theme's widget wrapper.
		echo $after_widget;

	}

	/**
	 * Updates the widget control options for the particular instance of the widget.
	 *
	 * @since 1.0.0
	 */
	function update( $new_instance, $old_instance ) {

		$instance = $new_instance;
		$instance['cat'] = $new_instance['cat'];

		return $instance;
	}

	/**
	 * Displays the widget control options in the Widgets admin screen.
	 *
	 * @since 1.0.0
	 */
	function form( $instance ) {

		// Default value.
		$defaults = array(
			'cat' => '',
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php _e( 'Choose Category:', 'supernews' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'cat' ); ?>" name="<?php echo $this->get_field_name( 'cat' ); ?>" style="width:100%;">
				<?php $categories = get_terms( 'category' ); ?>
				<?php foreach( $categories as $category ) { ?>
					<option value="<?php echo esc_attr( $category->term_id ); ?>" <?php selected( $instance['cat'], $category->term_id ); ?>><?php echo esc_html( $category->name ); ?></option>
				<?php } ?>
			</select>
		</p>

	<?php

	}

}
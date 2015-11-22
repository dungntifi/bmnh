<?php

/**
 * Posts List Varian 4 builder.
 *
 * @package    SuperNews
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2014, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class SuperNews_Posts_Builder extends WP_Widget
{

    /**
     * Sets up the widgets.
     *
     * @since 1.0.0
     */
    function __construct()
    {

        // Set up the widget options.
        $widget_options = array(
            'classname' => 'builder-supernews-posts-varian-4',
            'description' => __('Display posts based on user selected.', 'Flexible'),
            'panels_groups' => array('panels'),
        );

        // Create the widget.
        $this->WP_Widget(
            'supernews-builder-posts-varian-4',                 // $this->id_base
            __('Builder - Posts', 'Flexible'), // $this->name
            $widget_options                                     // $this->widget_options
        );
    }

    /**
     * Outputs the widget based on the arguments input through the widget controls.
     *
     * @since 1.0.0
     */
    function widget($args, $instance)
    {
        extract($args);
        echo '<div class="post_content">';
        echo wpautop(get_post_field('post_content', $instance['post']));
        echo '</div>';
    }

    /**
     * Updates the widget control options for the particular instance of the widget.
     *
     * @since 1.0.0
     */
    function update($new_instance, $old_instance)
    {

        $instance = $new_instance;
        $instance['post'] = $new_instance['post'];

        return $instance;
    }

    /**
     * Displays the widget control options in the Widgets admin screen.
     *
     * @since 1.0.0
     */
    function form($instance)
    {

        // Default value.
        $defaults = array(
            'post' => '',
        );

        $instance = wp_parse_args((array)$instance, $defaults);
        wp_reset_query();
        $args = array('post_type' => 'post',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'operator' => '='
                ),
            ),
        );

        $loop = new WP_Query($args);

        ?>

        <p>
            <label
                for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('Choose Post to show:', 'Flexible'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('post'); ?>"
                    name="<?php echo $this->get_field_name('post'); ?>" style="width:100%;">
                <?php
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        ?>
                        <option
                            value="<?php echo esc_attr(get_the_ID()); ?>" <?php selected($instance['post'], get_the_ID()); ?>><?php echo esc_html(get_the_title()); ?></option>
                    <?php endwhile;
                }
                ?>
                <?php $categories = get_terms('category'); ?>
                <?php foreach ($categories as $category) { ?>
                <?php } ?>
            </select>
        </p>

        <?php

    }

}
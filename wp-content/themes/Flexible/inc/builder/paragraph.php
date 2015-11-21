<?php

/**
 * Slider builder.
 *
 * @package    SuperNews
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2014, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class SuperNews_Paragraph_Builder extends WP_Widget
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
            'classname' => 'builder-supernews-headlines',
            'description' => __('Display a paragraph ', 'Flexible'),
            'panels_groups' => array('panels'),
        );

        // Create the widget.
        $this->WP_Widget(
            'supernews-builder-headlines',            // $this->id_base
            __('Builder - Paragraph', 'Flexible'), // $this->name
            $widget_options                           // $this->widget_options
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
        echo stripslashes($instance['text']);
        // Restore original Post Data.
        wp_reset_postdata();
    }

    /**
     * Updates the widget control options for the particular instance of the widget.
     *
     * @since 1.0.0
     */
    function update($new_instance, $old_instance)
    {

        $instance = $new_instance;
        $instance['text'] = $new_instance['text'];
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
            'text' => '',
        );

        $instance = wp_parse_args((array)$instance, $defaults);
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>">
                <?php _e('Text to show:', 'Flexible'); ?>
            </label>
            <textarea class="widefat" name="<?php echo $this->get_field_name('text'); ?>"
                      id="<?php echo $this->get_field_id('text'); ?>" cols="30"
                      rows="6"><?php echo stripslashes($instance['text']); ?></textarea>
        </p>

        <?php

    }

}
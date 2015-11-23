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
class SuperNews_Slider_Builder extends WP_Widget
{

    /**
     * Sets up the widgets.
     *
     * @since 1.0.0
     */
    var $image_field = 'image';  // the image field ID

    function __construct()
    {

        // Set up the widget options.
        $widget_options = array(
            'classname' => 'builder-supernews-slider',
            'description' => __('Display posts slider.', 'Flexible'),
            'panels_groups' => array('panels'),
        );

        // Create the widget.
        $this->WP_Widget(
            'supernews-builder-slider',            // $this->id_base
            __('Builder - Slider', 'Flexible'), // $this->name
            $widget_options                        // $this->widget_options
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
        $image_id = $instance[$this->image_field];
        $image = new WidgetImageField($this, $image_id);
        ?>

        <session id="sliderCat">
            <?php
            //        View widget
            if ($instance['slider_shortcode']) { ?>
                <?php echo do_shortcode(stripslashes($instance['slider_shortcode']));
            } ?>
            <?php if (!empty($image_id)) : ?>
                <img class="love" src="<?php echo $image->get_image_src('full'); ?>"/>
            <?php endif; ?>
        </session>
        <style type="text/css">
            .jssor_slider_outer_container {
                margin: 0px auto !important;
            }
        </style>
        <?php
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
        $instance['slider_shortcode'] = stripslashes($new_instance['slider_shortcode']);
        $instance[$this->image_field] = intval(strip_tags($new_instance[$this->image_field]));
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
            'slider_shortcode' => '',
        );

        $instance = wp_parse_args((array)$instance, $defaults);
        $image_id = esc_attr(isset($instance[$this->image_field]) ? $instance[$this->image_field] : 0);
        $image = new WidgetImageField($this, $image_id);
        ?>
        <div>
            <label><?php _e('Image in the left of slideshow:'); ?></label>
            <?php echo $image->get_widget_field(); ?>
        </div>
        <p>
            <label for="<?php echo $this->get_field_id('slider_shortcode'); ?>">
                <?php _e('Shortcode for slide:', 'Flexible'); ?>
            </label>
            <textarea class="widefat" name="<?php echo $this->get_field_name('slider_shortcode'); ?>"
                      id="<?php echo $this->get_field_id('slider_shortcode'); ?>" cols="30"
                      rows="6"><?php echo stripslashes($instance['slider_shortcode']); ?></textarea>
        </p>

        <?php

    }

}
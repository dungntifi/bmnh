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
class SuperNews_Donate_Builder extends WP_Widget
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
            'classname' => 'builder-supernews-donate',
            'description' => __('Display donate.', 'Flexible'),
            'panels_groups' => array('panels'),
        );

        // Create the widget.
        $this->WP_Widget(
            'supernews-builder-donate',            // $this->id_base
            __('Builder - Donate', 'Flexible'), // $this->name
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
        echo '<a  href="'.$instance['slider_shortcode'].'">';
            if (($phone_num = et_get_option('flexible_phone_num')) && '' != $phone_num) echo '<span id="phone">' . $phone_num . '</span></a>';
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
?>
            <label for="<?php echo $this->get_field_id('slider_shortcode'); ?>">
                <?php _e('Link donate page:', 'Flexible'); ?>
            </label>
            <textarea class="widefat" name="<?php echo $this->get_field_name('slider_shortcode'); ?>"
                      id="<?php echo $this->get_field_id('slider_shortcode'); ?>" cols="30"
                      rows="6"><?php echo stripslashes($instance['slider_shortcode']); ?></textarea>
        </p>

        <?php

    }

}
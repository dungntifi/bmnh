<?php

/**
 * Ads builder.
 *
 * @package    SuperNews
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2014, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class SuperNews_Contact_Builder extends WP_Widget
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
            'classname' => 'builder-supernews-ad',
            'description' => __('Easily to display Contact form by short code contact form 7 in sidebar', 'Flexible'),
            'panels_groups' => array('panels'),
        );

        // Create the widget.
        $this->WP_Widget(
            'supernews-builder-ads',                      // $this->id_base
            __('Builder - Contact form sidebar', 'Flexible'), // $this->name
            $widget_options                               // $this->widget_options
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
        // Display the ad banner.
        if ($instance['form_code']) {
            echo '<div class="formSubcribe">';
            echo '<h3>eNewsletter</h3>';
            echo do_shortcode(stripslashes($instance['form_code']));
            echo '</div>';
        }
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
        $instance['form_code'] = stripslashes($new_instance['form_code']);

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
            'form_code' => '',
        );

        $instance = wp_parse_args((array)$instance, $defaults);
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('form_code'); ?>">
                <?php _e('Contact form Code:', 'Flexible'); ?>
            </label>
            <textarea class="widefat" name="<?php echo $this->get_field_name('form_code'); ?>"
                      id="<?php echo $this->get_field_id('form_code'); ?>" cols="30"
                      rows="6"><?php echo stripslashes($instance['form_code']); ?></textarea>
        </p>

        <?php

    }

}
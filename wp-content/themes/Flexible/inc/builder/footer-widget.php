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
class SuperNews_Footer_Widget_Builder extends WP_Widget
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
            'classname' => 'builder-supernews-posts-varian-6',
            'description' => __('Setting for footer', 'Flexible'),
            'panels_groups' => array('panels'),
        );

        // Create the widget.
        $this->WP_Widget(
            'supernews-builder-posts-varian-6',                 // $this->id_base
            __('Builder - Footer.', 'Flexible'), // $this->name
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
        $image_id = $instance[$this->image_field];
        $image = new WidgetImageField($this, $image_id);
        ?>
        <div class="wrapper">
            <div class="contact">
                <p>Contact us:</p>
                <ul>
                    <li><?php echo $instance['address']; ?></li>
                    <li>Phone:<?php echo $instance['phone'] ?></li>
                    <li>Email: <?php echo $instance['email'] ?></li>
                    <li>ABN <?php echo $instance['abn'] ?></li>
                </ul>
            </div>
            <div class="openHour">
                <p>open hour:</p>
                <ul>
                    <li><?php echo $instance['open_time'] ?></li>
                </ul>
            </div>
            <div class="social">
                <p>Follow Us on</p>
                <a target="_blank" href="<?php echo $instance['link_facebook'] ?>"><img
                        src="<?php echo get_template_directory_uri(); ?>/img/icon-face.png" alt="Facebook"
                        title="Facebook"></a>
                <a target="_blank" href="<?php echo $instance['link_twiter'] ?>"><img
                        src="<?php echo get_template_directory_uri(); ?>/img/icon-twitter.png" alt="Twitter"
                        title="Twitter"></a>
                <a target="_blank" href="<?php echo $instance['link_google'] ?>"><img
                        src="<?php echo get_template_directory_uri(); ?>/img/icon-g+.png" alt="Google+"
                        title="Google+"></a>
            </div>
        </div>
        <div class="copyright">
            <div>
                <p class="left"><?php echo $instance['copyright']; ?></p>

                <p class="right"><a href="http://silkmedia.com.au/" target="_blank">Power by <img src="<?php echo $image->get_image_src('full'); ?>" alt=""
                                               title=""></a></p>
            </div>
        </div>
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
        $instance['address'] = $new_instance['address'];
        $instance['phone'] = $new_instance['phone'];
        $instance['email'] = $new_instance['email'];
        $instance['abn'] = $new_instance['abn'];
        $instance['link_facebook'] = $new_instance['link_facebook'];
        $instance['link_twiter'] = $new_instance['link_twiter'];
        $instance['link_google'] = $new_instance['link_google'];
        $instance['open_time'] = $new_instance['open_time'];
        $instance['copyright'] = $new_instance['copyright'];
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
            'address' => '',
            'phone' => '',
            'email' => '',
            'abn' => '',
            'open_time' => '',
            'link_facebook' => '',
            'link_twiter' => '',
            'link_google' => '',
            'copyright' => ''
        );
        $instance = wp_parse_args((array)$instance, $defaults);
        $image_id = esc_attr(isset($instance[$this->image_field]) ? $instance[$this->image_field] : 0);
        $image = new WidgetImageField($this, $image_id);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('address'); ?>">
                <?php _e('Address text in footer:', 'Flexible'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('address'); ?>"
                   name="<?php echo $this->get_field_name('address'); ?>" type="text"
                   value="<?php echo $instance['address']; ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('phone'); ?>">
                <?php _e('Phone text in footer:', 'Flexible'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>"
                   name="<?php echo $this->get_field_name('phone'); ?>" type="text"
                   value="<?php echo $instance['phone']; ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('email'); ?>">
                <?php _e('Email text in footer:', 'Flexible'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>"
                   name="<?php echo $this->get_field_name('email'); ?>" type="text"
                   value="<?php echo $instance['email']; ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('abn'); ?>">
                <?php _e('ABN text in footer:', 'Flexible'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('abn'); ?>"
                   name="<?php echo $this->get_field_name('abn'); ?>" type="text"
                   value="<?php echo $instance['abn']; ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('open_time'); ?>">
                <?php _e('Open time text in footer:', 'Flexible'); ?>
            </label>
            <textarea class="widefat" name="<?php echo $this->get_field_name('open_time'); ?>"
                      id="<?php echo $this->get_field_id('open_time'); ?>" cols="30"
                      rows="6"><?php echo stripslashes($instance['open_time']); ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('link_facebook'); ?>">
                <?php _e('Link Facebook:', 'Flexible'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_facebook'); ?>"
                   name="<?php echo $this->get_field_name('link_facebook'); ?>" type="text"
                   value="<?php echo $instance['link_facebook']; ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('link_twiter'); ?>">
                <?php _e('Link Twitter:', 'Flexible'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_twiter'); ?>"
                   name="<?php echo $this->get_field_name('link_twiter'); ?>" type="text"
                   value="<?php echo $instance['link_twiter']; ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('link_google'); ?>">
                <?php _e('Link Google+:', 'Flexible'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('link_google'); ?>"
                   name="<?php echo $this->get_field_name('link_google'); ?>" type="text"
                   value="<?php echo $instance['link_google']; ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('copyright'); ?>">
                <?php _e('Copyright text in footer:', 'Flexible'); ?>
            </label>
            <textarea class="widefat" name="<?php echo $this->get_field_name('copyright'); ?>"
                      id="<?php echo $this->get_field_id('copyright'); ?>" cols="30"
                      rows="6"><?php echo stripslashes($instance['copyright']); ?></textarea>
        </p>

        <div>
            <label><?php _e('Image for power by:'); ?></label>
            <?php echo $image->get_widget_field(); ?>
        </div>
        <?php

    }
}
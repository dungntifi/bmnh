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
class SuperNews_NewsLetter_Builder extends WP_Widget
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
            'description' => __('Display NewsLetter by User selected.', 'Flexible'),
            'panels_groups' => array('panels'),
        );

        // Create the widget.
        $this->WP_Widget(
            'supernews-builder-posts-varian-4',                 // $this->id_base
            __('Builder - Display NewsLetter', 'Flexible'), // $this->name
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
        extract($args); ?>
        <session class="newsletter">
            <div>
                <ul class="tabs">
                    <li style="z-index: 5" class="active" rel="tab1"><span>THE BRAYSTONE</span><i></i></li>
                    <li style="z-index: 4" rel="tab2"><span>B.M.N.H TRAINING</span><i></i></li>
                    <li style="z-index: 3" rel="tab3"><span>B.M.N.H COURSES</span><i></i></li>
                    <li style="z-index: 2" rel="tab4"><span>B.M.N.H SERVICES</span><i></i></li>
                    <!-- <li style="z-index: 1" rel="tab4"><span>B</span><i></i></li> -->
                </ul>
                <div class="tab_container">
                    <h3 class="d_active tab_drawer_heading" rel="tab1">Tab 1</h3>

                    <div class="main-content-tab">
                        <?php echo get_the_post_thumbnail($instance['post_1'], 'full', array('id' => 'tab1', 'alt' => 'braystone', 'title' => 'braystone')); ?>

                        <?php echo get_the_post_thumbnail($instance['post_2'], 'full', array('id' => 'tab2', 'alt' => 'training', 'title' => 'training')); ?>

                        <?php echo get_the_post_thumbnail($instance['post_3'], 'full', array('id' => 'tab3', 'alt' => 'courses', 'title' => 'courses')); ?>

                        <?php echo get_the_post_thumbnail($instance['post_4'], 'full', array('id' => 'tab4', 'alt' => 'services', 'title' => 'services')); ?>

                    </div>
                </div>
            </div>

            <!-- .tab_container -->
<!--            <p class="download">-->
<!--                <button type="button"><img src="img/download.png" alt="download" title="download"></button>-->
<!--            </p>-->
            <div class="clear"></div>
        </session>

    <?php }

    /**
     * Updates the widget control options for the particular instance of the widget.
     *
     * @since 1.0.0
     */
    function update($new_instance, $old_instance)
    {

        $instance = $new_instance;
        $instance['post_1'] = $new_instance['post_1'];
        $instance['post_2'] = $new_instance['post_2'];
        $instance['post_3'] = $new_instance['post_3'];
        $instance['post_4'] = $new_instance['post_4'];

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
            'post_1' => '',
            'post_2' => '',
            'post_3' => '',
            'post_4' => '',
        );

        $instance = wp_parse_args((array)$instance, $defaults);
        wp_reset_query();
        $args = array('post_type' => 'newsletter',
            'tax_query' => array(
                array(
                    'taxonomy' => 'newsletter_category',
                    'field' => 'slug',
                    'operator' => '='
                ),
            ),
        );

        $loop = new WP_Query($args);
        ?>
        <!--    THE BRAYSTONE -->
        <p>
            <label
                for="<?php echo $this->get_field_id('post_1'); ?>"><?php _e('Choose Post to show THE BRAYSTONE:', 'Flexible'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('post_1'); ?>"
                    name="<?php echo $this->get_field_name('post_1'); ?>" style="width:100%;">
                <?php
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        ?>
                        <option
                            value="<?php echo esc_attr(get_the_ID()); ?>" <?php selected($instance['post_1'], get_the_ID()); ?>><?php echo esc_html(get_the_title()); ?></option>
                    <?php endwhile;
                }
                ?>
            </select>
        </p>
        <!--B.M.N.H TRAINING-->
        <p>
            <label
                for="<?php echo $this->get_field_id('post_2'); ?>"><?php _e('Choose Post to show B.M.N.H TRAINING:', 'Flexible'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('post_2'); ?>"
                    name="<?php echo $this->get_field_name('post_2'); ?>" style="width:100%;">
                <?php
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        ?>
                        <option
                            value="<?php echo esc_attr(get_the_ID()); ?>" <?php selected($instance['post_2'], get_the_ID()); ?>><?php echo esc_html(get_the_title()); ?></option>
                    <?php endwhile;
                }
                ?>
            </select>
        </p>
        <!--        B.M.N.H COURSES -->
        <p>
            <label
                for="<?php echo $this->get_field_id('post_3'); ?>"><?php _e('Choose Post to show B.M.N.H COURSES :', 'Flexible'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('post_3'); ?>"
                    name="<?php echo $this->get_field_name('post_3'); ?>" style="width:100%;">
                <?php
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        ?>
                        <option
                            value="<?php echo esc_attr(get_the_ID()); ?>" <?php selected($instance['post_3'], get_the_ID()); ?>><?php echo esc_html(get_the_title()); ?></option>
                    <?php endwhile;
                }
                ?>
            </select>
        </p>
        <!--        B.M.N.H SERVICES -->
        <p>
            <label
                for="<?php echo $this->get_field_id('post_4'); ?>"><?php _e('Choose Post to show B.M.N.H SERVICES:', 'Flexible'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('post_4'); ?>"
                    name="<?php echo $this->get_field_name('post_4'); ?>" style="width:100%;">
                <?php
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        ?>
                        <option
                            value="<?php echo esc_attr(get_the_ID()); ?>" <?php selected($instance['post_4'], get_the_ID()); ?>><?php echo esc_html(get_the_title()); ?></option>
                    <?php endwhile;
                }
                ?>
            </select>
        </p>
        <?php

    }

}
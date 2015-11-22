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
class SuperNews_Course_Builder extends WP_Widget
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
            'description' => __('Display course by day of the week ', 'Flexible'),
            'panels_groups' => array('panels'),
        );

        // Create the widget.
        $this->WP_Widget(
            'supernews-builder-posts-varian-4',                 // $this->id_base
            __('Builder - Course', 'Flexible'), // $this->name
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
        ?>
        <div class="col col1">
            <article class="monday grey">
                <div>
                    <p class="dayWeek">monday</p>
                    <?php echo wpautop(get_post_field('post_content', $instance['post_monday'])); ?>
                </div>
            </article>
            <article class="wednesday blue">
                <div>
                    <p class="dayWeek">wednesday</p>
                    <?php echo wpautop(get_post_field('post_content', $instance['post_wednesday'])); ?>
                </div>
            </article>
            <article class="friday grey">
                <div>
                    <p class="dayWeek">friday</p>
                    <?php echo wpautop(get_post_field('post_content', $instance['post_friday'])); ?>
                </div>
            </article>
        </div>
        <div class="col col2">
            <article class="tuesday grey">
                <div>
                    <p class="dayWeek">tuesday</p>
                    <?php echo wpautop(get_post_field('post_content', $instance['post_tuesday'])); ?>
                </div>
            </article>
            <article class="blue">
                <div>
                    <p class="dayWeek thursday">thursday</p>
                    <?php echo wpautop(get_post_field('post_content', $instance['post_thursday'])); ?>
                </div>
            </article>
            <article class="blue">
                <div>
                    <p class="dayWeek saturday">saturday</p>
                    <?php echo wpautop(get_post_field('post_content', $instance['post_saturday'])); ?>
                </div>
            </article>
        </div>
        <?php
    }

    /**
     * Updates the widget control options for the particular instance of the widget.
     *
     * @since 1.0.0
     */
    function update($new_instance, $old_instance)
    {

        $instance = $new_instance;
        $instance['post_monday'] = $new_instance['post_monday'];
        $instance['post_tuesday'] = $new_instance['post_tuesday'];
        $instance['post_wednesday'] = $new_instance['post_wednesday'];
        $instance['post_thursday'] = $new_instance['post_thursday'];
        $instance['post_friday'] = $new_instance['post_friday'];
        $instance['post_saturday'] = $new_instance['post_saturday'];
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
            'post_monday' => '',
            'post_tuesday' => '',
            'post_wednesday' => '',
            'post_thursday' => '',
            'post_friday' => '',
            'post_saturday' => '',
        );

        $instance = wp_parse_args((array)$instance, $defaults);
        wp_reset_query();
        $args = array('post_type' => 'course',
            'tax_query' => array(
                array(
                    'taxonomy' => 'course_category',
                    'field' => 'slug',
                    'operator' => '='
                ),
            ),
        );

        $loop = new WP_Query($args);

        ?>
        <!--MONDAY-->
        <p>
            <label
                for="<?php echo $this->get_field_id('post_monday'); ?>"><?php _e('Choose Post to show in monday:', 'Flexible'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('post_monday'); ?>"
                    name="<?php echo $this->get_field_name('post_monday'); ?>" style="width:100%;">
                <?php
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        ?>
                        <option
                            value="<?php echo esc_attr(get_the_ID()); ?>" <?php selected($instance['post_monday'], get_the_ID()); ?>><?php echo esc_html(get_the_title()); ?></option>
                    <?php endwhile;
                }
                ?>
            </select>
        </p>
        <!--TUESDAY-->
        <p>
            <label
                for="<?php echo $this->get_field_id('post_tuesday'); ?>"><?php _e('Choose Post to show in tuesday:', 'Flexible'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('post_tuesday'); ?>"
                    name="<?php echo $this->get_field_name('post_tuesday'); ?>" style="width:100%;">
                <?php
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        ?>
                        <option
                            value="<?php echo esc_attr(get_the_ID()); ?>" <?php selected($instance['post_tuesday'], get_the_ID()); ?>><?php echo esc_html(get_the_title()); ?></option>
                    <?php endwhile;
                }
                ?>
            </select>
        </p>
        <!--        WEDNESDAY-->
        <p>
            <label
                for="<?php echo $this->get_field_id('post_wednesday'); ?>"><?php _e('Choose Post to show in wednesday:', 'Flexible'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('post_wednesday'); ?>"
                    name="<?php echo $this->get_field_name('post_wednesday'); ?>" style="width:100%;">
                <?php
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        ?>
                        <option
                            value="<?php echo esc_attr(get_the_ID()); ?>" <?php selected($instance['post_wednesday'], get_the_ID()); ?>><?php echo esc_html(get_the_title()); ?></option>
                    <?php endwhile;
                }
                ?>
            </select>
        </p>
        <!--        THURSDAY-->
        <p>
            <label
                for="<?php echo $this->get_field_id('post_thursday'); ?>"><?php _e('Choose Post to show in thursday:', 'Flexible'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('post_thursday'); ?>"
                    name="<?php echo $this->get_field_name('post_thursday'); ?>" style="width:100%;">
                <?php
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        ?>
                        <option
                            value="<?php echo esc_attr(get_the_ID()); ?>" <?php selected($instance['post_thursday'], get_the_ID()); ?>><?php echo esc_html(get_the_title()); ?></option>
                    <?php endwhile;
                }
                ?>
            </select>
        </p>
        <!--        FRIDAY-->
        <p>
            <label
                for="<?php echo $this->get_field_id('post_friday'); ?>"><?php _e('Choose Post to show in friday:', 'Flexible'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('post_friday'); ?>"
                    name="<?php echo $this->get_field_name('post_friday'); ?>" style="width:100%;">
                <?php
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        ?>
                        <option
                            value="<?php echo esc_attr(get_the_ID()); ?>" <?php selected($instance['post_friday'], get_the_ID()); ?>><?php echo esc_html(get_the_title()); ?></option>
                    <?php endwhile;
                }
                ?>
            </select>
        </p>
        <!--        SATURDAY-->
        <p>
            <label
                for="<?php echo $this->get_field_id('post_saturday'); ?>"><?php _e('Choose Post to show in saturday:', 'Flexible'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('post_saturday'); ?>"
                    name="<?php echo $this->get_field_name('post_saturday'); ?>" style="width:100%;">
                <?php
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        ?>
                        <option
                            value="<?php echo esc_attr(get_the_ID()); ?>" <?php selected($instance['post_saturday'], get_the_ID()); ?>><?php echo esc_html(get_the_title()); ?></option>
                    <?php endwhile;
                }
                ?>
            </select>
        </p>
        <?php

    }

}
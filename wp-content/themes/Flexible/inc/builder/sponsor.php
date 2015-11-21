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
class SuperNews_Sponsor_Builder extends WP_Widget
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
            'classname' => 'builder-supernews-posts-varian-2',
            'description' => __('Display posts list based on user selected category.', 'Flexible'),
            'panels_groups' => array('panels'),
        );

        // Create the widget.
        $this->WP_Widget(
            'supernews-builder-posts-varian-2',                 // $this->id_base
            __('Builder - List Sponsor.', 'Flexible'), // $this->name
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
        $args = array(
            'post_type' => 'sponsor',
            'orderby' => 'post_date',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'sponsor_category',
                    'field' => 'slug',
                    'operator' => '='
                )
            )
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
            echo '<div class="sponsor">';
            echo '<h3>'.$instance['title_widget'].'</h3>';
            while ($the_query->have_posts()) : $the_query->the_post();
                ?>
                    <article>
                        <div>
                            <header>
                                <h2><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h2>
                            </header>
                            <p class="des"><?php echo self::getSubTitleTab(get_the_excerpt(),50); ?><a href="<?php echo the_permalink(); ?>" class="readmore">More</a>
                            </p>
                        </div>
                        <a href="<?php echo the_permalink(); ?>"><?php echo the_post_thumbnail('small') ?></a>
                    </article>
                </div>
                <?php
            endwhile;
        endif;
        echo '</div>';

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
        $instance['num'] = (int)($new_instance['num']);
        $instance['title_widget'] = $new_instance['title_widget'];

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
            'cat' => '',
            'title_widget' => ''
        );

        $instance = wp_parse_args((array)$instance, $defaults);
        ?>
        <p>

            <label for="<?php echo $this->get_field_id('title_widget'); ?>">
                <?php _e('Title for widget: ', 'Flexible'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title_widget'); ?>"
                   name="<?php echo $this->get_field_name('title_widget'); ?>" type="text"
                   value="<?php echo $instance['title_widget']; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('Choose Category:', 'supernews'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('cat'); ?>"
                    name="<?php echo $this->get_field_name('cat'); ?>" style="width:100%;">
                <?php $categories = get_terms('category'); ?>
                <?php foreach ($categories as $category) { ?>
                    <option
                        value="<?php echo esc_attr($category->term_id); ?>" <?php selected($instance['cat'], $category->term_id); ?>><?php echo esc_html($category->name); ?></option>
                <?php } ?>
            </select>
        </p>

        <?php

    }

   protected function getLastChar($title, $lenght = 250)
    {
        $char = substr($title, $lenght - 1, 1);
        if ($char === ' ') {
            return $lenght - 1;
        } else {
            return self::getLastChar($title, $lenght - 1);
        }
    }

    protected function getSubTitleTab($title, $length = 100)
    {
        if (strlen($title) > $length) {
            $subLength = self::getLastChar($title, $length);
            $title = substr($title, 0, $subLength) . '...';
        }
        return $title;
    }

}
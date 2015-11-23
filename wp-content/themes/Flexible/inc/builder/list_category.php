<?php

/**
 * Posts List Varian 3 builder.
 *
 * @package    SuperNews
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2014, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class SuperNews_List_Category_Builder extends WP_Widget
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
            'classname' => 'builder-supernews-posts-varian-3',
            'description' => __('Display list category:', 'Flexible'),
            'panels_groups' => array('panels'),
        );

        // Create the widget.
        $this->WP_Widget(
            'supernews-builder-posts-varian-3',                 // $this->id_base
            __('Builder - List category', 'Flexible'), // $this->name
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
            'type' => 'post',
            'orderby' => 'name',
            'order' => 'ASC',
            'taxonomy' => 'category',
        );
        if (isset($instance['num']) && (int)$instance['num'] > 0) {
            $args['number'] = $instance['num'];
        }
        $categories = get_categories($args);
        echo '<div class="wrapCol">';
        foreach ($categories as $category) {
            $category_link = get_category_link(esc_attr($category->term_id));
            ?>
            <article class="postStyle4 effect-4 effects">
                <div class="img"><a href="<?php echo esc_url($category_link); ?>"><img
                            src="<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url($category->term_id); ?>"
                            alt="" title=""></a>

                    <div class="overlay"><a href="<?php echo esc_url($category_link); ?>" class="expand"></a></div>
                </div>
                <header>
                    <h2><a href="<?php echo esc_url($category_link); ?>"><?php echo esc_html($category->name); ?></a>
                    </h2>
                </header>
                <p class="des"><?php echo self::getSubTitleTab(esc_attr($category->description),220); ?></p>
                <a href="<?php echo esc_url($category_link); ?>" class="readmore">Read More</a>
            </article>
        <?php }
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
        $instance['num'] = (int)($new_instance['num']);
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
            'num' => 7,
        );

        $instance = wp_parse_args((array)$instance, $defaults);
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('num'); ?>">
                <?php _e('Number of posts to show', 'supernews'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('num'); ?>"
                   name="<?php echo $this->get_field_name('num'); ?>" type="number" step="1" min="-1"
                   value="<?php echo (int)($instance['num']); ?>"/>
        </p>

        <?php

    }

    public static function getLastChar($title, $lenght = 250)
    {
        $char = substr($title, $lenght - 1, 1);
        if ($char === ' ') {
            return $lenght - 1;
        } else {
            return self::getLastChar($title, $lenght - 1);
        }
    }

    public static function getSubTitleTab($title, $length = 100)
    {
        if (strlen($title) > $length) {
            $subLength = self::getLastChar($title, $length);
            $title = substr($title, 0, $subLength) . '...';
        }
        return $title;
    }
}
<?php

/**
 * Posts List Varian 1 builder.
 *
 * @package    SuperNews
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2014, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class SuperNews_Community_Lunches_Builder extends WP_Widget
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
            'classname' => 'builder-supernews-posts-varian-1',
            'description' => __('Display posts list B.M.S.P.T.A COMMUNITY LUNCHES', 'Flexible'),
            'panels_groups' => array('panels'),
        );

        // Create the widget.
        $this->WP_Widget(
            'supernews-builder-posts-varian-1',                 // $this->id_base
            __('Builder - Posts List B.M.S.P.T.A COMMUNITY LUNCHES', 'Flexible'), // $this->name
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
        <div class="communnityLunch">
            <h3>
                <?php if (isset($instance['title_widget']) && $instance['title_widget'] != ''):
                    echo $instance['title_widget'];
                endif;
                ?>
            </h3>
            <!--            HTML GROUP 1-->
            <?php if (isset($instance['title_group_1']) && $instance['title_group_1'] != ''):
                echo '<p><span>' . $instance['title_group_1'] . '</span></p>';
            endif;
            ?>
            <?php if (isset($instance['content_group_1']) && $instance['content_group_1'] != ''):
                $listAct1 = explode('||', $instance['content_group_1']);
                if (count($listAct1) > 0) {
                    echo '<ul>';
                    foreach ($listAct1 as $actGr1) {
                        echo '<li>' . $actGr1 . '</li>';
                    }
                    echo '</ul>';
                }
            endif;
            ?>
            <!--            END GROUP 1 -->
            <!--            HTML GROUP 2-->
            <?php if (isset($instance['title_group_2']) && $instance['title_group_2'] != ''):
                echo '<p><span>' . $instance['title_group_2'] . '</span></p>';
            endif;
            ?>
            <?php if (isset($instance['content_group_2']) && $instance['content_group_2'] != ''):
                $listAct2 = explode('||', $instance['content_group_2']);
                if (count($listAct2) > 0) {
                    echo '<ul>';
                    foreach ($listAct2 as $actGr2) {
                        echo '<li>' . $actGr2 . '</li>';
                    }
                    echo '</ul>';
                }
            endif;
            ?>
            <!--            END GROUP 2 -->
            <!--            HTML GROUP 3-->
            <?php if (isset($instance['title_group_3']) && $instance['title_group_3'] != ''):
                echo '<p><span>' . $instance['title_group_3'] . '</span></p>';
            endif;
            ?>
            <?php if (isset($instance['content_group_3']) && $instance['content_group_3'] != ''):
                $listAct3 = explode('||', $instance['content_group_3']);
                if (count($listAct3) > 0) {
                    echo '<ul>';
                    foreach ($listAct3 as $actGr3) {
                        echo '<li>' . $actGr3 . '</li>';
                    }
                    echo '</ul>';
                }
            endif;
            ?>
            <!--            END GROUP 3 -->
        </div>
        <?php // Restore original Post Data.
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
        $instance['title_widget'] = $new_instance['title_widget'];
//        Title
        $instance['title_group_1'] = $new_instance['title_group_1'];
        $instance['title_group_2'] = $new_instance['title_group_2'];
        $instance['title_group_3'] = $new_instance['title_group_3'];
//        Content
        $instance['content_group_1'] = $new_instance['content_group_1'];
        $instance['content_group_2'] = $new_instance['content_group_2'];
        $instance['content_group_3'] = $new_instance['content_group_3'];

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
            'title_widget' => '',
            'title_group_1' => '',
            'title_group_2' => '',
            'title_group_3' => '',
            'content_group_1' => '',
            'content_group_2' => '',
            'content_group_3' => '',
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
        <!--        GROUP 1 -->
        <p>
            <label for="<?php echo $this->get_field_id('title_group_1'); ?>">
                <?php _e('Title for group one: ', 'Flexible'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title_group_1'); ?>"
                   name="<?php echo $this->get_field_name('title_group_1'); ?>" type="text"
                   value="<?php echo $instance['title_group_1']; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('content_group_1'); ?>">
                <?php _e('List activity to show in group:', 'Flexible'); ?>
            </label>
            <textarea class="widefat" name="<?php echo $this->get_field_name('content_group_1'); ?>"
                      id="<?php echo $this->get_field_id('content_group_1'); ?>" cols="30"
                      rows="6"><?php echo stripslashes($instance['content_group_1']); ?></textarea>
        </p>
        <!--        END GROUP 1 -->
        <!--        GROUP 2 -->
        <p>
            <label for="<?php echo $this->get_field_id('title_group_2'); ?>">
                <?php _e('Title for group two: ', 'Flexible'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title_group_2'); ?>"
                   name="<?php echo $this->get_field_name('title_group_2'); ?>" type="text"
                   value="<?php echo $instance['title_group_2']; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('content_group_2'); ?>">
                <?php _e('List activity to show in group:', 'Flexible'); ?>
            </label>
            <textarea class="widefat" name="<?php echo $this->get_field_name('content_group_2'); ?>"
                      id="<?php echo $this->get_field_id('content_group_2'); ?>" cols="30"
                      rows="6"><?php echo stripslashes($instance['content_group_2']); ?></textarea>
        </p>
        <!--        END GROUP 2-->
        <!--        GROUP 3 -->
        <p>
            <label for="<?php echo $this->get_field_id('title_group_3'); ?>">
                <?php _e('Title for group three: ', 'Flexible'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title_group_3'); ?>"
                   name="<?php echo $this->get_field_name('title_group_3'); ?>" type="text"
                   value="<?php echo $instance['title_group_3']; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('content_group_3'); ?>">
                <?php _e('List activity to show in group:', 'Flexible'); ?>
            </label>
            <textarea class="widefat" name="<?php echo $this->get_field_name('content_group_3'); ?>"
                      id="<?php echo $this->get_field_id('content_group_3'); ?>" cols="30"
                      rows="6"><?php echo stripslashes($instance['content_group_3']); ?></textarea>
        </p>
        <p style="color: #ff0000"> For each activity in each group, you must type "||".</p>
        <!--        END GROUP 3-->
        <?php

    }

}
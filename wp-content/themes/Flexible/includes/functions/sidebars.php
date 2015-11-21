<?php
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div> <!-- end .widget -->',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => 'Slider Home',
        'id' => 'slider-home',
    ));
    register_sidebar(array(
        'name' => 'Second sidebar',
        'id' => 'second-sidebar',
    ));
    register_sidebar(array(
        'name' => 'Content Home',
        'id' => 'content-home',
    ));
}
?>
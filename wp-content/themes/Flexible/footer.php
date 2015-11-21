<footer>
    <nav id="bottomNav">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'primary-menu',
                'container' => '',
                'menu_class' => 'slimmenu2',
            )
        );
        ?>
    </nav>
    <div class="wrapper">
        <div class="contact">
            <p>Contact us:</p>
            <ul>
                <li>113 Melon Street, Braybrook 3019</li>
                <li>Phone: 03 9317 5610</li>
                <li>Email: office@bmnh.org.au</li>
                <li>ABN 73 967 833 454</li>
            </ul>
        </div>
        <div class="openHour">
            <p>open hour:</p>
            <ul>
                <li>Monday to Thursday 9:00 am - 4:00 pm</li>
            </ul>
        </div>
        <div class="social">
            <p>Follow Us on</p>
            <a href=""><img src="<?php echo get_template_directory_uri(); ?>/img/icon-face.png" alt="Facebook"
                            title="Facebook"></a>
            <a href=""><img src="<?php echo get_template_directory_uri(); ?>/img/icon-twitter.png" alt="Twitter"
                            title="Twitter"></a>
            <a href=""><img src="<?php echo get_template_directory_uri(); ?>/img/icon-g+.png" alt="Google+"
                            title="Google+"></a>
        </div>
    </div>
    <div class="copyright">
        <div>
            <p class="left">Copyright 2015 @ 2015 B.M.N.H. All Rights Reserved</p>

            <p class="right">Power by <img src="<?php echo get_template_directory_uri(); ?>/img/silk.png" alt=""
                                           title=""></p>
        </div>
    </div>
    <img id="toTop" src="<?php echo get_template_directory_uri(); ?>/img/icon-scroll.png" alt="Scroll to top"
         title="Scroll to top" class="desktop">
</footer>
<!--<footer id="main_footer" class="clearfix">-->
<!--    <p id="copyright">--><?php //printf(__('Designed by %s | Powered by %s', 'Flexible'), '<a href="http://www.elegantthemes.com" title="Premium WordPress Themes">Elegant Themes</a>', '<a href="http://www.wordpress.org">WordPress</a>'); ?><!--</p>-->
<!--</footer> <!-- end #main_footer -->
<?php wp_footer(); ?>
</body>
</html>
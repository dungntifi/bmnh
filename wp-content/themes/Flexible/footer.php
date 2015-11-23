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
    <?php wp_footer(); ?>
</footer>
<script type="text/javascript">
    $(document).ready(function () {
//        jQuery('ul.slimmenu').slimmenu({
//            resizeWidth: '1024',
//            collapserTitle: 'Menu',
//            easingEffect: null,
//            animSpeed: 'medium',
//            indentChildren: false,
//            childrenIndenter: 'Menu;',
//        });
        $(".main-content-tab img").hide();
        $(".main-content-tab img:first").show();

        /* if in tab mode */

        $("ul.tabs li").click(function () {

            $(".main-content-tab img").hide();
            var activeTab = $(this).attr("rel");
            $("#" + activeTab).fadeIn();

            $("ul.tabs li").removeClass("active");
            $(this).addClass("active");

            $(".tab_drawer_heading").removeClass("d_active");
            $(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");

        });
        /* if in drawer mode */
        $(".tab_drawer_heading").click(function () {

            $(".main-content-tab").hide();
            var d_activeTab = $(this).attr("rel");
            $("#" + d_activeTab).fadeIn();

            $(".tab_drawer_heading").removeClass("d_active");
            $(this).addClass("d_active");

            $("ul.tabs li").removeClass("active");
            $("ul.tabs li[rel^='" + d_activeTab + "']").addClass("active");
        });


        /* Extra class "tab_last"
         to add border to right side
         of last tab */
        $('ul.tabs li').last().addClass("tab_last");


        $("#toTop").css("display", "none");
        $(window).scroll(function () {
            if ($(window).scrollTop() > 0) {
                $("#toTop").fadeIn("slow");
            }
            else {
                $("#toTop").fadeOut("slow");
            }
        });
        $("#toTop").click(function () {
            event.preventDefault();
            $("html, body").animate({
                scrollTop: 0
            }, "slow");
        });
    });
</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/less.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.slimmenu.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
</body>
</html>
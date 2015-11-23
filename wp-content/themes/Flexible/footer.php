<footer>
    <nav id="bottomNav">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'footer',
                'container' => '',
                'menu_class' => 'slimmenu2',
            )
        );
        ?>
    </nav>
    <?php if (is_active_sidebar('footer')) { ?>
        <?php dynamic_sidebar('footer'); ?>
    <?php } ?>
    <img id="toTop" src="<?php echo get_template_directory_uri(); ?>/img/icon-scroll.png" alt="Scroll to top"
         title="Scroll to top" class="desktop">
    <?php wp_footer(); ?>
</footer>
<script type="text/javascript">
    $(document).ready(function () {
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
<?php get_header(); ?>
    <div class="wrapper index">
        <?php if (is_active_sidebar('slider-home')) { ?>
            <?php dynamic_sidebar('slider-home'); ?>
        <?php } ?>
        <session class="mainContent">
            <?php if (is_active_sidebar('content-home')) { ?>
                <?php dynamic_sidebar('content-home'); ?>
            <?php } ?>
        </session>
        <?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>
<?php get_header(); ?>
    <div class="wrapper">
        <?php get_template_part('includes/breadcrumbs', 'index'); ?>
        <?php while (have_posts()) : the_post(); ?>
            <session class="mainContent about">
                <?php get_template_part('content', 'single'); ?>
            </session>
            <?php get_sidebar(); ?>
            <div class="clear"></div>
        <?php endwhile; ?>
    </div>
<?php get_footer(); ?>
<?php get_header(); ?>
<div class="wrapper">
    <?php get_template_part('includes/breadcrumbs', 'page'); ?>
    <session class="mainContent category">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('content', 'blog'); ?>
        <?php endwhile; ?>
    </session>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

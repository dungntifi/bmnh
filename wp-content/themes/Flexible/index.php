<?php get_header(); ?>
    <div class="wrapper">
        <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>
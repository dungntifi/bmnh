<?php get_header(); ?>
    <div class="wrapper">
        <p class="breadcumb"><a href="">Home</a><span>B.M.N.H About</span></p>
        <?php while (have_posts()) :
            the_post(); ?>
            <?php $post_id = get_the_ID(); ?>
            <div class="banner"><?php echo the_post_thumbnail('full'); ?></div>
            <session class="mainContent about">
                <?php the_content(); ?>
            </session>
            <?php
            $check = get_field('is_active_second_sidebar', $post_id);
            if ((int)$check = 1) {
                if (is_active_sidebar('second-sidebar')) {
                    dynamic_sidebar('second-sidebar');
                }
            }
            ?>
        <?php endwhile; ?>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>
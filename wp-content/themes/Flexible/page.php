<?php get_header(); ?>
    <div class="wrapper">
        <?php get_template_part('includes/breadcrumbs', 'page'); ?>
        <?php while (have_posts()) :
            the_post(); ?>
            <?php $post_id = get_the_ID(); ?>
            <div class="banner">
                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post_id)) ?>"
                     alt="<?php echo the_title() ?>" title="<?php echo the_title() ?>">
                <h2><?php echo the_title() ?></h2>
            </div>
            <?php $class = get_field('class', $post_id); ?>
            <session class="mainContent <?php echo $class ?>">
                <?php the_content(); ?>
            </session>
            <?php get_sidebar(); ?>
            <div class="clear"></div>
            <?php
            $check = get_field('is_active_second_sidebar', $post_id);
            if ((int)$check == 1) {
                if (is_active_sidebar('second-sidebar')) {
                    dynamic_sidebar('second-sidebar');
                }
            }
            ?>
        <?php endwhile; ?>

    </div>
<?php get_footer(); ?>
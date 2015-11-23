<?php get_header(); ?>
<div class="wrapper">
	<?php get_template_part('includes/breadcrumbs', 'page'); ?>
	<session class="mainContent category">
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('content', 'blog'); ?>
			<?php endwhile; ?><?php else:
			?>
			<img src="<?php echo get_bloginfo('stylesheet_directory')  ?>/img/website_updates.jpg" title="updating website"/>
		<?php endif; ?>
	</session>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

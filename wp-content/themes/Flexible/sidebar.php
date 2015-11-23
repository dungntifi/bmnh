<?php if ( is_active_sidebar( 'sidebar' ) ){ ?>
	<aside class="sidebar order2">
		<?php dynamic_sidebar( 'sidebar' ); ?>
		<img id="toTop" src="<?php echo get_template_directory_uri(); ?>/img/icon-scroll.png" alt="Scroll to top" title="Scroll to top" class="mobile">
	</aside><!-- end #sidebar -->
<?php } ?>
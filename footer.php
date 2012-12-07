
	</div><!-- #main -->

</div><!-- #page -->

<footer id="colophon" role="contentinfo">

		<?php
			/* A sidebar in the footer? Yep. You can can customize
			 * your footer with three columns of widgets.
			 */
			if ( ! is_404() )
				get_sidebar( 'footer' );
		?>

		<div id="site-generator">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"> &copy; Spuul <?php echo strftime('%Y',time()); ?></a>
		</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
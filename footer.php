
	</div><!-- #main -->

</div><!-- #page -->
<div style="clear: both;"></div>
<div id="movieExtras" style="display:none;">
	<div class="extraLimit">
		<div id="extraContainer">
			<!--<ul style="display:none;" id="movieContainer">
				<?php
			/* A sidebar in the footer? Yep. You can can customize
			 * your footer with three columns of widgets.
			 */
			if ( ! is_404() )
				get_sidebar( 'footer' );
				?>
			</ul> -->
			<?php //echo do_shortcode('[html5video id=3]'); ?>
		</div>
	</div>
</div>	
<footer id="colophon" role="contentinfo">

		
			<div id="site-generator">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"> Copyright <?php echo strftime('%Y',time()); ?> &copy; Spuul Pte. Ltd.</a>
			</div>


</footer><!-- #colophon -->

<?php wp_footer(); ?>


</body>
</html>
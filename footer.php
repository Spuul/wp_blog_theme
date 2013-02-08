
	</div><!-- #main -->

</div><!-- #page -->
<div style="clear: both;"></div>
<div id="movieExtras">
	<div class="extraLimit">
		<div id="extraButton">
			<img src="http://development.static.spuul.com/wordpress/wp-content/uploads/2013/02/extrasup.jpg" />
		</div>
		<div id="extraContainer">
			<ul id="movieContainer">
				<?php
			/* A sidebar in the footer? Yep. You can can customize
			 * your footer with three columns of widgets.
			 */
			if ( ! is_404() )
				get_sidebar( 'footer' );
		?>
			</ul>
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
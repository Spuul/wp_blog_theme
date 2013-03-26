<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 */

get_header(); ?>

	<div id="primary">
		<div id="content" role="main">

			<article id="post-0" class="content_padding">
				<header class="entry-header">
					<h1 class="entry-title">Oops 404!</h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'We&rsquo;re sorry, the requested URL was not found. Try searching for something else.', 'twentyeleven' ); ?></p>

					<div id="404rip" style="position: relative; height:auto;">
						<img src="<?php bloginfo('stylesheet_directory');?>/images/404rip.png" class="404Paper" style="width:100%; position:absolute; z-index:1"/>
						<img src="<?php bloginfo('stylesheet_directory');?>/images/404animate.gif" class="404Paper" style="width:100%; position:absolute"/>
						<img src="<?php bloginfo('stylesheet_directory');?>/images/404rip.png" class="404Paper" style="width:100%;"/>
					</div>
					<div style="clear:both"></div>
					<?php get_search_form(); ?>

				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
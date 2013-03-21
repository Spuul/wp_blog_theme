<?php

get_header(); ?>
		<div id="primary">
			<div id="content" role="main">
				<div class="content_padding">
					<?php while ( have_posts() ) : the_post(); ?>

						<nav id="nav-single">
							<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
							<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav"></span> Previous', 'twentyeleven' ) ); ?></span>
							<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav"></span>', 'twentyeleven' ) ); ?></span>
						</nav><!-- #nav-single -->

						<?php get_template_part( 'content', 'single' ); ?>

						<?php comments_template( '', true ); ?>

					<?php endwhile; // end of the loop. ?>
				</div><!-- content padding -->	
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
<?php
/**
 */

get_header(); ?>
	
		<div id="primary">
			<div id="content" role="main">

				<div class="content_padding" style="display:none;">
					<div id="recent_movies">
						<h1 class="titlePost">Recent Movies</h1>
						<?php
						global $post;
						//cat staging 25, local 5
						$args = array( 'numberposts' => 5, 'offset'=> 0, 'category' => 25, 'post_status' => draft );
						$myposts = get_posts( $args );
		
						foreach( $myposts as $post ) :	setup_postdata($post); ?>
							<div style="display:none;"><?php the_content(); // recent movie container ?>
							</div>
							<script type="text/javascript">
								$('.movieCol').each(function(){
									$('#movielist')
										.append('<li class="movieCol"><img src="'+$(this).children('img').attr('src')+'"/><div class="desc"><ul><li><h1>'+$(this).find('h1').text()+'</h1></li><li><a href="'+$(this).find('a').attr('href')+'">'+$(this).find('a').text()+'</a></li><li><p>'+$(this).find('p').text()+'</p></li></ul></div></li>');
								});
							</script>
							<ul id="movielist">
							</ul>
						<?php endforeach; ?>
					</div>
					<div style="clear:both;"></div>
				</div>


					<?php if ( have_posts() ) : ?>

						<?php twentyeleven_content_nav( 'nav-above' ); ?>
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', get_post_format() ); ?>

						<?php endwhile; ?>

						<?php twentyeleven_content_nav( 'nav-below' ); ?>

					<?php else : ?>

						<article id="post-0" class="post no-results not-found">

								<header class="entry-header">
									<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
								</header><!-- .entry-header -->

								<div class="entry-content">
									<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
									<?php get_search_form(); ?>
								</div><!-- .entry-content -->

						</article><!-- #post-0 -->

					<?php endif; ?>
				
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
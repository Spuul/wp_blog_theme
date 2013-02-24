<?php
/**
 */

get_header(); ?>
	
		<div id="primary">
			<div id="content" role="main">

					<!-- count number of draft post -->
					<?php
					$count_posts = wp_count_posts();
					$draft_posts = $count_posts->draft;

					for($d=0; $d<$draft_posts; $d++){

					}
					?>

					<div class="content_padding">
						<ul id="recent_movies">
							<h1 class="titlePost">Recent Movies</h1>
							<?php
							global $post;
							$args = array( 'numberposts' => 5, 'offset'=> 0, 'category' => 5, 'post_status' => draft );
							$myposts = get_posts( $args );
			
							foreach( $myposts as $post ) :	setup_postdata($post); ?>
								<?php
									the_content(); // output the post text
									$pos[] = strpos( get_the_content(), "Lorem" );

									if (!(FALSE === $pos) ) {  // the === is important; see php docs
									    echo $pos;
									}
								?>
								<li><?php// the_content(); ?></li>
							<?php endforeach; ?>
						</ul>
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
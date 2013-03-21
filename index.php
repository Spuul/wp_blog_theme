<?php
/**
 */

get_header(); ?>
</div>
</div>

	<div id="headerFull">
	<div class="max-width">	
	<header id="branding" role="banner">
	<?php
$query_images_args = array(
    'post_type' => 'attachment', 'post_mime_type' =>'image', 'post_status' => 'inherit', 'posts_per_page' => -1
);

$query_images = new WP_Query( $query_images_args );
$images = array(); 
$header_thumb = array();
$image_names = array();
$imagelink1 = array();
$imagelink2 = array();
foreach ( $query_images->posts as $image) {
    $alt = get_post_meta($image->ID, '_wp_attachment_image_alt', true);
    if( strpos($alt, "/?slide") !== FALSE ){
       $images[]= wp_get_attachment_url( $image->ID );
       $imagelink1[] = $alt;
    }elseif(strpos($alt, "/?thumb") !== FALSE ){
       $header_thumb[]= wp_get_attachment_url( $image->ID );
       $imagelink2[] = $alt;
    }
}
?>

<script type='text/javascript'>
  var slideShow = <?php echo json_encode($images); ?>;
  var slideShowURL = <?php echo json_encode($imagelink1); ?>;
  var slideShowIndex = 0;

	window.slideShowIndex++;
	if(window.slideShowIndex >= window.slideShow.length){
	  window.slideShowIndex = 0;
	}
	$('#slideShowImg').attr('src', window.slideShow[window.slideShowIndex]);
	$('#slideshow_1 .slideshowLink').attr('href', window.slideShowURL[window.slideShowIndex]);


</script>

		<div id="headerContent">
			<div id="headerLeft">
				<div id="left">
					<div class="padding30">
						<h1>Movies This Week on Spuul</h1>
						<!-- slideshow -->
			        	<div id="slideshow_1" class="ngg-slideshow">
			        		<div id="imageContainer">
			        			
			             		<a class="slideshowLink" href="<?php echo $imagelink1[0]; ?>" target="_blank"><?php echo "<img id='slideShowImg' src='$images[0]' style='height:135px;width:578px;position:relative;top:0px;left:0px;display:block;z-index:0'>" ?>
		          			</div>
		          		</div>

					
						<!--<div id="movieThumbWeek" style="display:none;">
							<a href="<?php echo $imagelink2[0]; ?>" target="_blank"><img src="<?php echo $header_thumb[0]; ?>" class="header_thumb"/></a>
							<a href="<?php echo $imagelink2[1]; ?>" target="_blank"><img src="<?php echo $header_thumb[1]; ?>" class="header_thumb gap"/></a>
						</div> -->
					</div>
				</div>
				<div style="clear:both;"></div>
			</div>

			<div id="headerRight" style="display:none;">
				<div class="padding_header">
					<div class="padding_header_left">
					
					<?php
						$idNum = 162;//838 blog staging //162 localhost 
						$my_postid = $idNum;//This is page id or post id
						$content_post = get_post($my_postid);
						$content = $content_post->post_content;
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]&gt;', $content);
					?>
					<h1><?php echo get_the_title($idNum); ?></h2>
					<?php
						echo $content; 
					?>	

					</div>
				</div>
			</div>
		<div style="clear:both;"></div>
		</div>

	</header><!-- #branding -->
	</div><!-- max-width -->
	</div><!-- headerFull-->
	<div id="page" class="hfeed">

	<div id="main">
	
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
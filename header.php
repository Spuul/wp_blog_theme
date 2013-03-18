<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>
<link rel="profile" href="http://gmpg.org/xfn/11" />

 <!-- REQUIRED FOR PARALLAX -->
<script type="text/javascript" language="JavaScript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-1.6.4.min.js" ></script>
<script type="text/javascript" language="JavaScript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js" ></script>
<script type="text/javascript" language="JavaScript" src="<?php bloginfo('stylesheet_directory'); ?>/js/manual.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.flexslider-min.js"></script>
<script>
$(window).load(function() {
    $(".flexslider").flexslider({
        animation: "slide", 
    });
});
</script> 

<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/plugincss/flexslider-default.css"/>
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
	<div id="headerFull">
	<div class="max-width">	
	<header id="branding" role="banner">
	<div id="header1">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('stylesheet_directory');?>/images/logo.png ?>" class="logo" /></a>

		<div class="only-search<?php if ( $header_image ) : ?> with-image<?php endif; ?>">
			<?php get_search_form(); ?>
		</div>

			<hgroup>
				<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
				<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>

			<?php
				// Check to see if the header image has been removed
				$header_image = get_header_image();
				if ( $header_image ) :
					// Compatibility with versions of WordPress prior to 3.4.
					if ( function_exists( 'get_custom_header' ) ) {
						// We need to figure out what the minimum width should be for our featured image.
						// This result would be the suggested width if the theme were to implement flexible widths.
						$header_image_width = get_theme_support( 'custom-header', 'width' );
					} else {
						$header_image_width = HEADER_IMAGE_WIDTH;
					}
					?>
			<a href="<?php echo esc_url( home_url( '/' ) );?>">
				<?php
					// The header image
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					if ( is_singular() && has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( $header_image_width, $header_image_width ) ) ) &&
							$image[1] >= $header_image_width ) :
						// Houston, we have a new header image!
						echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
					else :
						// Compatibility with versions of WordPress prior to 3.4.
						if ( function_exists( 'get_custom_header' ) ) {
							$header_image_width  = get_custom_header()->width;
							$header_image_height = get_custom_header()->height;
						} else {
							$header_image_width  = HEADER_IMAGE_WIDTH;
							$header_image_height = HEADER_IMAGE_HEIGHT;
						}
						?>
					<img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="" id="bannerImg"/>
				<?php endif; // end check for featured image or standard header ?>
			</a>
			<?php endif; // end check for removed header image ?>

			<?php
				// Has the text been hidden?
				if ( 'blank' == get_header_textcolor() ) :
			?>
				
			<?php
				else :
			?>
				<?php get_search_form(); ?>
			<?php endif; ?>

			<nav id="access" role="navigation">
				<h3 class="assistive-text"><?php _e( 'Main menu', 'twentyeleven' ); ?></h3>
				<?php /* Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
				<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>
				<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>
				<?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assigned to the primary location is the one used. If one isn't assigned, the menu with the lowest ID is used. */ ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #access -->
	</div><!-- header1 -->

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

  //$('#slideshow_1').append('<img src="http://development.static.spuul.com/wordpress/wp-content/uploads/2013/03/large_0428d5f54a_dirtypicture.jpg">');

  


  setInterval(function(){
                window.slideShowIndex++;
                if(window.slideShowIndex >= window.slideShow.length){
                  window.slideShowIndex = 0;
                }
				$('#slideShowImg').attr('src', window.slideShow[window.slideShowIndex]);
				$('#slideshow_1 .slideshowLink').attr('href', window.slideShowURL[window.slideShowIndex]);
  }, 3000); 

</script>

		<div id="headerContent">
			<div id="headerLeft">
				<div id="left">
					<h1>Movies This Week on Spuul</h1>
					<!-- slideshow -->
		        	<div id="slideshow_1" class="ngg-slideshow">
		             	<a class="slideshowLink" href="<?php echo $imagelink1[0]; ?>" target="_blank"><?php echo "<img id='slideShowImg' src='$images[0]' style='height:135px;width:578px;position:relative;top:0px;left:0px;display:block;z-index:4'>" ?></a>
	          		</div>

				
					<div id="movieThumbWeek">
						<a href="<?php echo $imagelink2[0]; ?>" target="_blank"><img src="<?php echo $header_thumb[0]; ?>" class="header_thumb"/></a>
						<a href="<?php echo $imagelink2[1]; ?>" target="_blank"><img src="<?php echo $header_thumb[1]; ?>" class="header_thumb gap"/></a>
					</div>
				</div>
			</div>

			<div id="headerRight">
				<div class="padding_header">
					<div class="padding_header_left">
					<?php
						$idNum = 838;//838 blog staging //162 localhost 
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

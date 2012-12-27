<?php
/**
 * Spuul functions and definitions
 */
if ( ! function_exists( 'twentyeleven_posted_on' ) ) {
    function twentyeleven_posted_on() {
        printf( __( '<span class="sep"></span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep" style="display:none; "> by </span> <span class="author vcard" style="display:none;><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'twentyeleven' ),
            esc_url( get_permalink() ),
            esc_attr( get_the_time() ),
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() ),
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            esc_attr( sprintf( __( 'View all posts by %s', 'twentyeleven' ), get_the_author() ) ),
            get_the_author()
        );
    }
}

if ( ! function_exists( 'twentyeleven_posted_on' ) ) {
    
}

// disable theme switching
add_action( 'admin_init', 'wplg_lock_theme' );  
function wplg_lock_theme() {
    global $submenu, $userdata;
    get_currentuserinfo();
    if ( $userdata->ID != 1 ) {
        unset( $submenu['themes.php'][5] );
        unset( $submenu['themes.php'][15] );
    }
}




<?php

add_action( 'wp_enqueue_scripts', 'bootstrap_wp_enqueue_scripts', 9 );

function bootstrap_wp_enqueue_scripts() {

	global $wp_scripts;

	if ( ! function_exists( 'wp_check_browser_version' ) )
    include_once( ABSPATH . 'wp-admin/includes/dashboard.php' );


  ## Scripts in the head
	wp_enqueue_script( 'modernizr', THEME_URL .'/js/dist/modernizr.min.js', array(), '2.7.1' );

  # IE version conditional enqueue
  $response = wp_check_browser_version();
	if ( 0 > version_compare( intval( $response['version'] ) , 9 ) ) {
		wp_enqueue_script( 'html5shiv', THEME_URL .'/js/dist/html5shiv.min.js', array(), '3.7.0' );
		wp_enqueue_script( 'respond' );
	}

	## Scripts in the footer
	wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'bootstrap', THEME_URL .'/js/dist/bootstrap.min.js', array('jquery'), '3.1.1' , true );
  wp_enqueue_script( 'main', THEME_URL .'/js/main.js', array('jquery','bootstrap'), '1.0' , true );
 // echo '<pre>'. print_r($wp_scripts, 1 ). '</pre>';
}

?>
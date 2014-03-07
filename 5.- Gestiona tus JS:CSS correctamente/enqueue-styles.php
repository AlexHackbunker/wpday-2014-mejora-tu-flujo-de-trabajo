<?php

add_action( 'wp_enqueue_scripts', 'bootstrap_wp_enqueue_styles' );

function bootstrap_wp_enqueue_styles() {

	global $wp_styles;

	wp_enqueue_style( 'bootstrap' , THEME_URL .'/css/dist/bootstrap.min.css', array() , true, '1.0' );
	wp_enqueue_style( 'main' , THEME_URL .'/css/main.css', array() , true , '1.0');

	# CHECK IE H
	if ( ! function_exists( 'wp_check_browser_version' ) )
    include_once( ABSPATH . 'wp-admin/includes/dashboard.php' );

	$response = wp_check_browser_version();
	if ( 0 > version_compare( intval( $response['version'] ) , 9 ) ) {
		wp_enqueue_style( 'ie', THEME_URL .'/css/dist/ie.min.js', array(), true, '1.0');
	}

}

?>
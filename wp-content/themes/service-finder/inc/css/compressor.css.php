<?php
global $wp_customize, $service_finder_options, $wp_filesystem, $wpdb;
$root = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} else {
    $root = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))));
    if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
    }
}
if ( empty( $wp_filesystem ) ) {
	require_once ABSPATH . '/wp-admin/includes/file.php';
	WP_Filesystem();
}
$writabledir=get_template_directory().'/inc/caches/';
$md5_dir = get_template_directory().'/inc/css/';
global $options_data;
function compress( $minify ) {
    $minify = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $minify );
    $minify = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    ','(inc/'), array('','', '', '', '', '', '', '(../'), $minify );
    return $minify;
}
header('Content-type: text/css');
header('Expires: '.gmdate("D, d M Y H:i:s", time() + 3600*24*365).' GMT');
$name = service_finder_scan_dir($md5_dir).'.css';
if( !file_exists($writabledir.$name) ){
	ob_start("compress");
	if(is_rtl()){  
	include(get_template_directory().'/inc/css/bootstrap-arabic.min.css');
	}else{
	include(get_template_directory().'/inc/css/bootstrap.min.css');
	}
	include(get_template_directory().'/inc/css/animate.css');
	include(get_template_directory().'/inc/css/owl.carousel.css');
	include(get_template_directory().'/inc/css/fileinput.min.css');
	include(get_template_directory().'/inc/css/magnific-popup.css');
	include(get_template_directory().'/inc/css/bootstrap-slider.min.css');
	include(get_template_directory().'/style.css');
	
	if(service_finder_themestyle_fortheme() == 'style-2'){
	include(get_template_directory().'/inc/css/rounded.css');
	}
	
	if ( is_customize_preview() && isset( $wp_customize )) {
	include(get_template_directory().'/inc/css/preview.css');
	}
	
	if(is_rtl()){  
		include(get_template_directory().'/inc/css/rtl.css');
		
		if(service_finder_themestyle_fortheme() == 'style-2'){
		include(get_template_directory().'/inc/css/rounded-rtl.css');
		}
	}
	
	if(!class_exists('service_finder_booking_plugin')) {
	include(get_template_directory().'/inc/css/validator/bootstrapValidator.css');
	}

	$wp_filesystem->put_contents($writabledir.$name, compress(ob_get_contents()), FS_CHMOD_FILE); // Save it
	
	service_finder_delete_old_cache($writabledir);
	ob_end_flush();
} else {
	$wp_filesystem->get_contents($writabledir.$name);
}
?>
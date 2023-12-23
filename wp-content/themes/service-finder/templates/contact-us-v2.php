<?php
/*
Template Name: Contact Us - Version 2
*/
/*****************************************************************************
*
*	copyright(c) - aonetheme.com - Service Finder Team
*	More Info: http://aonetheme.com/
*	Coder: Service Finder Team
*	Email: contact@aonetheme.com
*
******************************************************************************/
get_header();
?>

<div class="page-content">
<!-- inner page banner -->
<?php if(service_finder_theme_get_data($service_finder_options,'hide-contact-page-map') == false && service_finder_show_map_on_site_fortheme()){ ?>
<div class="banner-map">
<!-- Location map start-->
<div class='gmap-outer contact-area-bx sf-rouned-box'>
<?php
		$address = (!empty($service_finder_options['address'])) ? $service_finder_options['address'] : '';
		if(!empty($address)){
		$lat = get_option('contactmap_lat','28.6430536');
		$lng = get_option('contactmap_lng','77.2223442');
		
		$zoom_level = (!empty($service_finder_options['zoom-level'])) ? $service_finder_options['zoom-level'] : 14;
		
		$src  = '';
		
		$icon = (!empty($service_finder_options['default-map-marker-icon']['url'])) ? $service_finder_options['default-map-marker-icon']['url'] : '';
		
		$markeraddress = $address;
		
		$marker = '[\"'.get_bloginfo('name').'\",\"'.esc_html($lat).'\",\"'.esc_html($lng).'\",\"'.esc_url($src).'\",\"'.esc_url($icon).'\",\"\",\"\",\"\",\"'.esc_html($markeraddress).'\",\"\"]';
		
		}else{
		$lat = '28.6430536';
		$lng = '77.2223442';
		$zoom_level = 2;
		$marker = '';
		}
		
		
		wp_add_inline_script( 'service_finder-js-theme-gmapfunctions', '/*Define global variable*/
var googlecode_regular_vars = {"general_latitude":"'.esc_js($lat).'", "general_longitude":"'.esc_js($lng).'","path":"","markers":"['.$marker.']","idx_status":"0","page_custom_zoom":"'.esc_js($zoom_level).'","generated_pins":"0","scrollwheel":false}; jQuery(document).ready(function($) {
						initializeSearchMap("no");
						});', 'before' );		

		echo service_finder_contactmap($lat,$lng,'350px','100%',$address);
		?>
</div>
<!-- Location map end-->
</div>
<?php } ?>
<!-- inner page banner END -->
<?php require get_template_directory() . '/lib/breadcrumb.php';//Breadcrumb ?>
<!-- contact area -->
<div class="container">
<div class="section-content">
<div class="row">
<!-- contact form start -->
<div class="col-md-9">
<h4>
<?php echo get_the_title(); ?>
</h4>
<div class="padding-30 bg-white clearfix margin-b-30 sf-rouned-box">
<?php while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; ?>
<?php echo do_shortcode('[service-finder-contactus]');?>
</div>
</div>
<!-- contact form end -->
<!-- contact info start -->
<div class="col-md-3">
<?php
echo '<h4>'.esc_html__('Contact Info','service-finder').'</h4>';
?>

<div class="padding-30 bg-white margin-b-30 sf-rouned-box">
<ul class="contact-info no-margin">
  <li> <i class="fa fa-map-marker"></i>
	<h6>
	  <?php esc_html_e('Address', 'service-finder'); ?>
	</h6>
	<p><?php echo (!empty($service_finder_options['address'])) ? $service_finder_options['address'] : ''; ?></p>
  </li>
  <li> <i class="fa fa-envelope"></i>
	<h6>
	  <?php esc_html_e('EMAIL', 'service-finder'); ?>
	</h6>
	<p><?php echo (!empty($service_finder_options['email'])) ? $service_finder_options['email'] : ''; ?></p>
  </li>
  <li> <i class="fa fa-phone"></i>
	<h6>
	  <?php esc_html_e('PHONE', 'service-finder'); ?>
	</h6>
	<p><?php echo (!empty($service_finder_options['phone'])) ? $service_finder_options['phone'] : ''; ?></p>
  </li>
</ul>
<br>
</div>
</div>
<!-- contact info end -->
</div>
</div>
</div>
<!-- contact area  END -->
</div>
<?php get_footer(); ?>

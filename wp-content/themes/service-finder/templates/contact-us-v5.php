<?php
/*
Template Name: Contact Us - Version 5
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
    <?php 
	$subheader = service_finder_sub_header();
	$pagesubheader = get_post_meta(get_the_id(), '_display_banner', true);
	$service_finder_options = get_option('service_finder_options');
	if($subheader):
	if($pagesubheader){ 
	?>
	<?php
	$image_name = 'banner-image';
	if (class_exists('SERVICE_FINDER_MultiPostThumbnails')) {
	if (SERVICE_FINDER_MultiPostThumbnails::has_post_thumbnail('page', $image_name)) { 
	$image_id = SERVICE_FINDER_MultiPostThumbnails::get_post_thumbnail_id( 'page', $image_name, get_the_id() );
	$banner_image_url = wp_get_attachment_image_src( $image_id,'full' );
	}   
	}
	if(empty($banner_image_url[0])){
	$bannerimg = service_finder_contactus_banner();  
	}else{
	$bannerimg = (!empty($banner_image_url[0])) ? $banner_image_url[0] : '';
	}
	?>
	<?php 
	if(!empty($bannerimg)){ 
	$bgcolor = (!empty($service_finder_options['inner-banner-bg-color'])) ? $service_finder_options['inner-banner-bg-color'] : '';
	$bgopacity = (!empty($service_finder_options['inner-banner-opacity'])) ? $service_finder_options['inner-banner-opacity'] : '';
	?>
    <div class="sf-search-benner sf-overlay-wrapper">
      <div class="banner-inner-row provider-cover-img provider-cover-img" style="background-image:url(<?php echo esc_url($bannerimg); ?>)">
        <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?>;"></div>
        <div class="sf-banner-heading-wrap">
          <div class="sf-banner-heading-area">
            <div class="sf-banner-heading-large"><?php esc_html_e('Contact Us', 'service-finder'); ?></div>
            <div class="sf-banner-breadcrumbs-nav">
              <ul class="list-inline">
                <li><a href="<?php echo esc_url(home_url('/')); ?>"> <?php esc_html_e('Home', 'service-finder'); ?> </a></li>
                <li><?php esc_html_e('Contact Us', 'service-finder'); ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>        
    <?php 
	}
	}
	?>   
    <?php endif; ?>

    <!-- Contact Us-->
    <div class="section-full p-t80 p-b50">
      <div class="container">
        
        <div class="section-head text-center">
            <h2 class="sf-title"><?php esc_html_e('Contact Information', 'service-finder'); ?></h2>
            <?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
            <?php endwhile; ?>
        </div>

        <div class="section-content">
       
          <div class="sf-contact-info-wrap">  
            <div class="row">
            
            	<?php
                $addressicon = (!empty($service_finder_options['contact-address-icon']['url'])) ? $service_finder_options['contact-address-icon']['url'] : get_template_directory_uri().'/inc/images/contact-us/1.png';
				$emailicon = (!empty($service_finder_options['contact-email-icon']['url'])) ? $service_finder_options['contact-email-icon']['url'] : get_template_directory_uri().'/inc/images/contact-us/2.png';
				$phoneicon = (!empty($service_finder_options['contact-phone-icon']['url'])) ? $service_finder_options['contact-phone-icon']['url'] : get_template_directory_uri().'/inc/images/contact-us/1.png';
				?>
    
                <!-- COLUMNS 1 -->
                <div class="col-md-4">
                <div class="sf-contact-info-box">
                    <div class="sf-contact-icon">
                    <span><img src="<?php echo esc_url($addressicon);?>"></span>
                    </div>
                    <div class="sf-contact-info">
                    <h4 class="sf-title"><?php esc_html_e('Mailing Address', 'service-finder'); ?></h4>
                    <p><?php echo (!empty($service_finder_options['address'])) ? $service_finder_options['address'] : ''; ?></p>
                    </div>
                </div>
                </div>
                <!-- COLUMNS 2 -->
                <div class="col-md-4">
                <div class="sf-contact-info-box">
                    <div class="sf-contact-icon">
                    <span><img src="<?php echo esc_url($emailicon);?>"></span>
                    </div>
                    <div class="sf-contact-info">
                    <h4 class="sf-title"><?php esc_html_e('Email Info', 'service-finder'); ?></h4>
                    <p><?php echo (!empty($service_finder_options['email'])) ? $service_finder_options['email'] : ''; ?></p>
                    </div>
                </div>
                </div>
                <!-- COLUMNS 3 -->
                <div class="col-md-4">
                <div class="sf-contact-info-box">
                    <div class="sf-contact-icon">
                    <span><img src="<?php echo esc_url($phoneicon);?>"></span>
                    </div>
                    <div class="sf-contact-info">
                    <h4 class="sf-title"><?php esc_html_e('Phone Number', 'service-finder'); ?></h4>
                    <p><?php echo (!empty($service_finder_options['phone'])) ? $service_finder_options['phone'] : ''; ?></p>
                    </div>
                </div>
                </div>
    
            </div>
          </div>

          <div class="sf-contact-form-wrap">
              
            <div class="sf-contact-form">
                <div class="sf-con-form-title text-center">
                    <h2 class="margin-b-30"><?php esc_html_e('Contact Information', 'service-finder'); ?></h2>
                </div>
                <?php echo do_shortcode('[service-finder-contactus version="v5"]');?>
            </div>
          </div>              
        </div>

      </div>
    </div>
      
    <!-- Contact Us-->
    <div class="section-full p-t80">
        <div class="container">
          
            <div class="sf-map-social-block text-center">
                <h2><?php esc_html_e('Trusted by thousands of people all over the world', 'service-finder'); ?></h2>
                <ul class="sf-con-social">
                	<?php if(service_finder_theme_get_data($service_finder_options,'contact-facebook') != ''){ ?>
                    <li><a href="<?php echo esc_url(service_finder_theme_get_data($service_finder_options,'contact-facebook')); ?>" class="sf-fb"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/images/contact-us/facebook.png');?>"><?php esc_html_e('Facebook', 'service-finder'); ?></a></li>
                    <?php } ?>
                    <?php if(service_finder_theme_get_data($service_finder_options,'contact-twitter') != ''){ ?>
                    <li><a href="<?php echo esc_url(service_finder_theme_get_data($service_finder_options,'contact-twitter')); ?>" class="sf-twitter"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/images/contact-us/twitter.png');?>"><?php esc_html_e('Twitter', 'service-finder'); ?></a></li>
                    <?php } ?>
                    <?php if(service_finder_theme_get_data($service_finder_options,'contact-pinterest') != ''){ ?>
                    <li><a href="<?php echo esc_url(service_finder_theme_get_data($service_finder_options,'contact-pinterest')); ?>" class="sf-pinterest"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/images/contact-us/pinterest.png');?>"><?php esc_html_e('Pinterest', 'service-finder'); ?></a></li>
                    <?php } ?>
                </ul>

                <div class="sf-con-social-pic">
                    <span class="img-pos-1"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/images/contact-us/img1.png');?>"></span>
                    <span class="img-pos-2"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/images/contact-us/img2.png');?>"></span>
                    <span class="img-pos-3"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/images/contact-us/img3.png');?>"></span>
                    <span class="img-pos-4"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/images/contact-us/r-img1.png');?>"></span>
                    <span class="img-pos-5"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/images/contact-us/r-img2.png');?>"></span>
                    <span class="img-pos-6"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/images/contact-us/r-img3.png');?>"></span>
                </div>
            </div>
  
        </div>
        <?php if(service_finder_theme_get_data($service_finder_options,'hide-contact-page-map') == false && service_finder_show_map_on_site_fortheme()){ ?>
        <div class="sf-map-wrap">
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
		
			echo service_finder_contactmap($lat,$lng,'439px','100%',$address);
			?>
        </div>
        <?php } ?>
      </div>
        
    </div>
    <!-- Left & right section  END -->


</div>
<?php get_footer(); ?>

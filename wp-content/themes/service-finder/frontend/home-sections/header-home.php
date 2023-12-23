<?php
/*****************************************************************************
*
*	copyright(c) - aonetheme.com - Service Finder Team
*	More Info: http://aonetheme.com/
*	Coder: Service Finder Team
*	Email: contact@aonetheme.com
*
******************************************************************************/

$service_finder_ThemeParams = service_finder_global_params('service_finder_ThemeParams');
?>
<?php
$headerstyle = service_finder_header_style();
/*Home page header style for map format*/
if($headerstyle == 'map'){

		$imagepath = get_template_directory_uri().'/inc/images/markers';
		
		$defaultcity = (!empty($service_finder_options['default-city'])) ? $service_finder_options['default-city'] : '';
		$defaultcountry = (!empty($service_finder_options['default-country'])) ? $service_finder_options['default-country'] : '';
		
		
		$add = str_replace(" ","+",$defaultcity).'+'.str_replace(" ","+",$defaultcountry);
		
		$default = service_finder_getLatLong($add);
		$defaultlat = (!empty($default['lat'])) ? $default['lat'] : '28.6430536';
		$defaultlng = (!empty($default['lng'])) ? $default['lng'] : '77.2223442';
		
		if($defaultcity != ""){
			$zoomlevel = (!empty($service_finder_options['zoom-level-city'])) ? $service_finder_options['zoom-level-city'] : 12;
		}elseif($defaultcountry != ""){
			$zoomlevel = (!empty($service_finder_options['zoom-level-country'])) ? $service_finder_options['zoom-level-country'] : 5;
		}else{
			$zoomlevel = 2;
		}
		
		
		$zoom_level_address = (!empty($service_finder_options['zoom-level-address'])) ? $service_finder_options['zoom-level-address'] : 14;
		$zoom_level_city = (!empty($service_finder_options['zoom-level-city'])) ? $service_finder_options['zoom-level-city'] : 12;
		$zoom_level_country = (!empty($service_finder_options['zoom-level-country'])) ? $service_finder_options['zoom-level-country'] : 5;

		?>
<!-- banner -->

<div class="sf-map-row">
  <div class="sf-bnr-pic" id="dynamic_map">
  <?php
  wp_add_inline_script( 'service_finder-load-home-map', '/*Define global variable*/
			var googlecode_regular_vars = {"general_latitude":"'.esc_js($defaultlat).'", "general_longitude":"'.esc_js($defaultlng).'","path":"'.esc_js($imagepath).'","markers":"[]","idx_status":"0","page_custom_zoom":"12","generated_pins":"0"}; var zoom_level_address = "'.$zoom_level_address.'"; var zoom_level_city = "'.$zoom_level_city.'"; var zoom_level_country = "'.$zoom_level_country.'"; var zoomlevel = "'.$zoomlevel.'"; var defaultlat = "'.$defaultlat.'"; var defaultlng = "'.$defaultlng.'"; ', 'before' );

	if(class_exists('service_finder_booking_plugin')) { 
	/*Call the map shortcode*/
	echo do_shortcode('[service_finder_map_search general_latitude="'.$defaultlat.'" general_longitude="'.$defaultlng.'"]');
	}

?>
  </div>
  <!--Tempalte for no result found-->
  <div class="sf-find-bar wow fadeInDown default-hidden" id="no-result">
    <div class="container">
      <div class="no-result-bx">
        <?php esc_html_e('No Result Found', 'service-finder'); ?>
      </div>
    </div>
  </div>
  <?php if(class_exists('service_finder_booking_plugin')) { ?>
  <!--Tempalte for Search form-->
  <?php if(!$service_finder_options['home-search-bar']){ 
   $srhposition = (!empty($service_finder_options['search-bar-position'])) ? $service_finder_options['search-bar-position'] : 'bottom';
   if($srhposition == 'middle'){
   	$positionclass = 'pos-v-center';
   }else{
   	$positionclass = 'pos-v-bottom';
   }
   $classes = (service_finder_themestyle_fortheme() == 'style-2') ? 'sf-search-result' : '';
  ?>
  <div class="sf-find-bar <?php echo sanitize_html_class($classes); ?> <?php echo sanitize_html_class($positionclass); ?>">
    <div class="container">
      <?php if(service_finder_themestyle_fortheme() == 'style-2'){ ?>
      <ul class="sf-search-title clearfix">
            <li><?php echo esc_html__('Search Provider', 'service-finder'); ?></li>
        </ul>
       <?php } ?> 
      <?php $advanceclass = (service_finder_check_advance_search()) ? '' : 'sf-empty-radius'; ?>
      <div class="search-form <?php echo sanitize_html_class($advanceclass); ?>">
        <?php echo do_shortcode('[service_finder_search_form]'); ?>
      </div>
    </div>
  </div>
  <?php } ?>
  <div class="loading-map"><i class="fa fa-spinner fa-pulse"></i></div>
  <?php } ?>
</div>
<!-- banner END -->
<?php
}elseif($headerstyle == 'slider'){
/*Home page header style in banner format*/
service_finder_header_slider(); 
}else{
	/*Home page header style in banner format*/
	if(service_finder_themestyle_fortheme() == 'style-4'){
	
		$homepagestyle = service_finder_get_home_page_style();
		
		if( $homepagestyle == '1' ) {
			$bannerstyle = service_finder_banner_style();
			if($bannerstyle == 'old'){
				service_finder_header_banner(); 
			}elseif($bannerstyle == 'new2'){
				service_finder_header_banner_style_4_2();
			}else{
				service_finder_header_banner_style_4();
			}		
		} else {
			$bannerstyle = service_finder_banner_style();
			if($bannerstyle == 'old'){
				service_finder_header_banner(); 
			}elseif($bannerstyle == 'new'){
				service_finder_header_banner_style_4();
			}else{
				service_finder_header_banner_style_4_2();
			}
		}
		
	}else{
		service_finder_header_banner(); 
	}
}
<?php
/**
 * Content shown after job listings in `[jobs]` shortcode.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-listings-end.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @version     1.15.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

    
<?php
global $service_finder_options;
$jobview = service_finder_theme_get_data($service_finder_options,'job-listing-style');
if(is_home() || is_front_page()){
if($jobview == 'list'){

if(service_finder_get_home_page_style() != '2'){
echo '</ul>';
}


}else{
echo '</div>';
}

}else{
if($jobview == 'listview'){
echo '</ul>';
}elseif($jobview == 'grid'){
echo '</div>';
}
echo '</div>';
} ?>

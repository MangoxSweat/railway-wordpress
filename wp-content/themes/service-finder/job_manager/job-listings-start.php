<?php
/**
 * Content shown before job listings in `[jobs]` shortcode.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-listings-start.php.
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
global $service_finder_options;
$jobview = service_finder_theme_get_data($service_finder_options,'job-listing-style');
?>
<?php if(is_home() || is_front_page() || is_page('home-2')){
if($jobview == 'list'){

echo '<ul class="job_listings job_listings-two joblisting-home 2">';

}else{
echo '<div class="row job_listings">';
}
}else{
?>
<div class="col-md-8">
<?php
if($jobview == 'list'){
echo '<ul class="job_listings job_listings-two 1">';
}elseif($jobview == 'grid'){
echo '<div class="row job_listings">';
}
} ?>  


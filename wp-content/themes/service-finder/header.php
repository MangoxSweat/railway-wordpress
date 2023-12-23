<?php
ob_start();
/*****************************************************************************
*
*	copyright(c) - aonetheme.com - Service Finder Team
*	More Info: http://aonetheme.com/
*	Coder: Service Finder Team
*	Email: contact@aonetheme.com
*
******************************************************************************/

$service_finder_ThemeParams = service_finder_global_params('service_finder_ThemeParams');
$service_finder_options = get_option('service_finder_options');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<!--[if IE 7 ]>  <html class="isie ie7 oldie no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>  <html class="isie ie8 oldie no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>  <html class="isie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!-- Favicons Icon -->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
$registerErrors = service_finder_global_params('registerErrors');
$bookingcompleted = (isset($_GET['bookingcompleted'])) ? esc_html($_GET['bookingcompleted']) : '';
$invoicepaidcompleted = (isset($_GET['invoicepaidcompleted'])) ? esc_html($_GET['invoicepaidcompleted']) : '';
$upgrade = (isset($_GET['upgrade'])) ? esc_html($_GET['upgrade']) : '';
$cancelsubscription = (isset($_GET['cancelsubscription'])) ? esc_html($_GET['cancelsubscription']) : '';
$cancelfeatured = (isset($_GET['cancelfeatured'])) ? esc_html($_GET['cancelfeatured']) : '';
$featured = (isset($_GET['featured'])) ? esc_html($_GET['featured']) : '';
$created = (isset($_GET['created'])) ? esc_html($_GET['created']) : '';
$signup = (isset($_GET['signup'])) ? esc_html($_GET['signup']) : '';
$joblimitplanupdate = (isset($_GET['joblimitplanupdate'])) ? esc_html($_GET['joblimitplanupdate']) : '';
$walletpaymentupdate = (isset($_GET['walletpaymentupdate'])) ? esc_html($_GET['walletpaymentupdate']) : '';
$registration = (isset($_GET['registration'])) ? esc_html($_GET['registration']) : '';
$cancel_membership_id = (isset($_GET['cancel_membership_id'])) ? esc_html($_GET['cancel_membership_id']) : 0;
$gcalconnected = (isset($_GET['gcal'])) ? esc_html($_GET['gcal']) : '';
$woocheckout = (isset($_GET['woocheckout'])) ? esc_html($_GET['woocheckout']) : '';
$allowedhtml = array(
	'div' => array(
		'class' => array(),
	),
);
if( is_wp_error( $registerErrors ) ) {
	echo '<div class="alert text-center alert-danger sf-error-top"><strong>'.$registerErrors->get_error_message().'</strong></div>';
}
if($registration == 'cancelled') {

	echo '<div class="alert text-center alert-danger sf-success-top"><strong>'.esc_html__("You cancelled payment. Your account wasn't created","service-finder").'</strong></div>';
}
$checkpae = service_finder_get_id_by_shortcodefortheme('[service_finder_thank_you]');
if($bookingcompleted == 'success' && (!is_page(service_finder_get_id_by_shortcodefortheme('[service_finder_thank_you]')) || empty($checkpae))) {

$msg = (!empty($service_finder_options['provider-booked'])) ? $service_finder_options['provider-booked'] : esc_html__('Booking made successfully.', 'service-finder');

	echo '<div class="alert text-center alert-success sf-success-top"><strong>'.esc_html($msg).'</strong></div>';
}elseif($invoicepaidcompleted == 'success' && (!is_page(service_finder_get_id_by_shortcodefortheme('[service_finder_thank_you]')) || empty($checkpae))) {
$msg = (!empty($service_finder_options['pay-invoice'])) ? $service_finder_options['pay-invoice'] : esc_html__('Invoice paid successfully', 'service-finder');
	echo '<div class="alert text-center alert-success sf-success-top"><strong>'.esc_html($msg).'</strong></div>';
}elseif($upgrade == 'success'){
	$msg = (!empty($service_finder_options['provider-upgrade-successfull'])) ? $service_finder_options['provider-upgrade-successfull'] : esc_html__('Your account has been upgraded succssfully', 'service-finder');
	echo '<div class="alert text-center alert-success sf-success-top"><strong>'.esc_html($msg).'</strong></div>';
}elseif($upgrade == 'failed'){
	$msg = (!empty($service_finder_options['provider-upgrade-failed'])) ? $service_finder_options['provider-upgrade-failed'] : esc_html__('Your account upgrade failed.', 'service-finder');
	echo '<div class="alert text-center alert-danger sf-success-top"><strong>'.esc_html($msg).'</strong></div>';
}elseif($upgrade == 'pending'){
	$msg = (!empty($service_finder_options['provider-upgrade-pending'])) ? $service_finder_options['provider-upgrade-pending'] : esc_html__('Payment via wire transfer is pending for package upgrade', 'service-finder');
	echo '<div class="alert text-center alert-success sf-success-top"><strong>'.esc_html($msg).'</strong></div>';
}elseif($cancelsubscription == 'success'){
	$msg = (!empty($service_finder_options['subscription-cancel'])) ? $service_finder_options['subscription-cancel'] : esc_html__('Subscription Cancelled successfully.', 'service-finder');
	echo '<div class="alert text-center alert-success sf-success-top"><strong>'.esc_html($msg).'</strong></div>';
}elseif($cancelfeatured == 'success'){
	$msg = (!empty($service_finder_options['featured-cancel'])) ? $service_finder_options['featured-cancel'] : esc_html__('Featured/Featured Request Cancelled successfully.', 'service-finder');
	echo '<div class="alert text-center alert-success sf-success-top"><strong>'.esc_html($msg).'</strong></div>';
}elseif($featured == 'success'){
	$msg = (!empty($service_finder_options['feature-payment'])) ? $service_finder_options['feature-payment'] : esc_html__('Your profile is featured now', 'service-finder');
	echo '<div class="alert text-center alert-success sf-success-top"><strong>'.esc_html($msg).'</strong></div>';
}elseif($featured == 'wired'){
	$msg = (!empty($service_finder_options['feature-wiretransfer'])) ? $service_finder_options['feature-wiretransfer'] : esc_html__('You paid via wire transfer. Please wait for approval.', 'service-finder');
	echo '<div class="alert text-center alert-success sf-success-top"><strong>'.esc_html($msg).'</strong></div>';	
}elseif($created == 'success'){
	$msg = (!empty($service_finder_options['provider-signup-successfull'])) ? $service_finder_options['provider-signup-successfull'] : esc_html__('Your account has been created', 'service-finder');
	echo '<div class="alert text-center alert-success sf-success-top"><strong>'.esc_html($msg).'</strong></div>';
}elseif($signup == 'success'){
	$msg = (!empty($service_finder_options['customer-signup-successfull'])) ? $service_finder_options['customer-signup-successfull'] : esc_html__('Your account has been created', 'service-finder');
	echo '<div class="alert text-center alert-success sf-success-top"><strong>'.esc_html($msg).'</strong></div>';
}elseif($joblimitplanupdate == 'success'){
	$msg = (!empty($service_finder_options['jobapply-limit-successfull'])) ? $service_finder_options['jobapply-limit-successfull'] : esc_html__('Your  plan updated succssfully', 'service-finder');
	echo '<div class="alert text-center alert-success sf-success-top"><strong>'.esc_html($msg).'</strong></div>';
}elseif($walletpaymentupdate == 'success'){
	$msg = (!empty($service_finder_options['update-wallet-amount-successfull'])) ? $service_finder_options['update-wallet-amount-successfull'] : esc_html__('Amount has been added to wallet successfully', 'service-finder');
}elseif($joblimitplanupdate == 'wired'){
	$msg = (!empty($service_finder_options['jobapply-limit-wiretransfer'])) ? $service_finder_options['jobapply-limit-wiretransfer'] : esc_html__('You paid via wire transfer. Please wait for approval.', 'service-finder');
	echo '<div class="alert text-center alert-success sf-success-top"><strong>'.esc_html($msg).'</strong></div>';	
}elseif($walletpaymentupdate == 'wired'){
	$msg = (!empty($service_finder_options['update-wallet-amount-wiretransfer'])) ? $service_finder_options['update-wallet-amount-wiretransfer'] : esc_html__('You paid via wire transfer. Please wait for approval.', 'service-finder');
	echo '<div class="alert text-center alert-success sf-success-top"><strong>'.esc_html($msg).'</strong></div>';	
}elseif($invoicepaidcompleted == 'wired'){
	$msg = (!empty($service_finder_options['invoice-pay-wiretransfer'])) ? $service_finder_options['invoice-pay-wiretransfer'] : esc_html__('You paid via wire transfer. Please wait for approval.', 'service-finder');
	echo '<div class="alert text-center alert-success sf-success-top"><strong>'.esc_html($msg).'</strong></div>';	
}elseif($cancel_membership_id > 0){
	if(service_finder_check_provider_membership_status($cancel_membership_id) == 'draft'){
	$msg = esc_html__('Your membership has been cancelled.', 'service-finder');
	echo '<div class="alert text-center alert-danger sf-success-top"><strong>'.esc_html($msg).'</strong></div>';	
	}
}elseif($gcalconnected == 'connected'){
	echo '<div class="alert text-center alert-success sf-success-top"><strong>'.esc_html__('Google calendar connected successfully.', 'service-finder').'</strong></div>';	
}elseif($woocheckout == 'success'){
	echo '<div class="alert text-center alert-success sf-success-top"><strong>'.esc_html__('Thank you. Your order has been received.', 'service-finder').'</strong></div>';	
}
?>

<div class="page-wraper">
<?php
if(class_exists('aonesms')){
	global $aonesmsredirect;
	$aonesmsredirect->display();
}
?>
<!-- header -->
<?php
if(in_array(get_the_ID(),service_finder_get_id_by_shortcodefortheme('[service_finder_my_account')) ){
	if ( function_exists( 'service_finder_jamming_rules' ) ) {
		if(service_finder_transient_rule()){ 
			service_finder_myaccount_layout();	
		}
	}
}else{
	
	$headertemplates = (!empty($service_finder_options['header-templates'])) ? $service_finder_options['header-templates'] : '';
	if(!in_array(get_the_ID(),service_finder_get_id_by_shortcodefortheme('[aone_verification')) ){
		if(service_finder_header_style() == 'banner' && $headertemplates == 'header8'){
			service_finder_header_template8();
		}else{
			if(is_search() && ($_GET['s'] == "" && (isset($_GET['keyword']) || isset($_GET['searchAddress']) || isset($_GET['catid']) || isset($_GET['country']) || isset($_GET['city']))) && $service_finder_options['search-template'] == 'style-2' && service_finder_show_map_on_site_fortheme()){
				service_finder_header_layout_searchmapstyle();		
			}else{
				service_finder_header_layout();		
			}
		}
	}


}
?>
<!-- header END -->

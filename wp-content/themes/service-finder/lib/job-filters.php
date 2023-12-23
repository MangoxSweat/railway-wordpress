<?php
/*****************************************************************************
*
*	copyright(c) - aonetheme.com - Service Finder Team
*	More Info: http://aonetheme.com/
*	Coder: Service Finder Team
*	Email: contact@aonetheme.com
*
******************************************************************************/
/*Post job from frontend*/
add_filter( 'submit_job_form_fields', 'service_finder_add_cost_field' );
if ( !function_exists( 'service_finder_add_cost_field' ) ){
function service_finder_add_cost_field( $fields ) {
  $fields['job']['job_cost'] = array(
    'label'       => esc_html__( 'Cost', 'service-finder' ).'('.service_finder_currencysymbol().')',
    'type'        => 'text',
    'placeholder' => esc_html__( 'e.g. 5000', 'service-finder' ),
    'priority'    => 4
  );
  $fields['job']['job_hours'] = array(
    'label'       => esc_html__( 'Hours', 'service-finder' ),
    'type'        => 'text',
    'placeholder' => esc_html__( 'e.g. 5', 'service-finder' ),
    'priority'    => 5
  );
  $fields['company']['company_name'] = array(
    'label'       => esc_html__( 'Company name', 'service-finder' ),
	'type'        => 'text',
	'required'    => false,
	'placeholder' => esc_html__( 'Enter the name of the company', 'service-finder' ),
	'priority'    => 1
  );
  
  unset($fields['job']['remote_position']);
  unset($fields['company']['company_website']);
  unset($fields['company']['company_tagline']);
  unset($fields['company']['company_twitter']);
  return $fields;
}
}

/*Post job from backend*/
add_filter( 'job_manager_job_listing_data_fields', 'service_finder_admin_add_cost_field' );
if ( !function_exists( 'service_finder_admin_add_cost_field' ) ){
function service_finder_admin_add_cost_field( $fields ) {
  $fields['_job_cost'] = array(
    'label'       => esc_html__( 'Cost', 'service-finder' ).'('.service_finder_currencysymbol().')',
    'type'        => 'text',
    'placeholder' => 'e.g. 5000',
    'description' => ''
  );
  $fields['_job_hours'] = array(
    'label'       => esc_html__( 'Hours', 'service-finder' ),
    'type'        => 'text',
    'placeholder' => 'e.g. 5',
    'description' => ''
  );
  unset($fields['_company_website']);
  unset($fields['_company_tagline']);
  unset($fields['_company_video']);
  unset($fields['_company_twitter']);
  return $fields;
}
}

/*Add new application method*/
add_filter( 'job_manager_settings', 'service_finder_filter_job_manager_settings', 10, 2 );
if ( !function_exists( 'service_finder_filter_job_manager_settings' )){
function service_finder_filter_job_manager_settings( $fields ) {
	if(!empty($fields['job_submission'][1])){
		foreach($fields['job_submission'][1] as $key => $customfields){
			if($customfields['name'] == 'job_manager_allowed_application_method'){
				$fields['job_submission'][1][$key] = array(
					'name'       => 'job_manager_allowed_application_method',
					'std'        => 'custom',
					'label'      => esc_html__( 'Application Method', 'service-finder' ),
					'desc'       => esc_html__( 'Choose the contact method for listings.', 'service-finder' ),
					'type'       => 'select',
					'options'    => array(
						''      => esc_html__( 'Email address or website URL', 'service-finder' ),
						'email' => esc_html__( 'Email addresses only', 'service-finder' ),
						'url'   => esc_html__( 'Website URLs only', 'service-finder' ),
						'custom'   => esc_html__( 'Service Finder Method', 'service-finder' ),
					),
				);
			}
			if($customfields['name'] == 'job_manager_registration_role'){
				$account_roles = $customfields['options'];
				$fields['job_submission'][1][$key] = array(
					'name'       => 'job_manager_registration_role',
					'std'        => 'Customer',
					'label'      => esc_html__( 'Account Role', 'service-finder' ),
					'desc'       => esc_html__( 'Any new accounts created during submission will have this role. If you haven\'t enabled account creation during submission in the options above, your own method of assigning roles will apply.', 'service-finder' ),
					'type'       => 'select',
					'options'    => $account_roles
				);
			}
		}
	}

	return $fields;
}
}

/*Add new application method*/
add_filter( 'job_manager_job_dashboard_columns', 'service_finder_job_dashboard_columns', 10, 2 );
if ( !function_exists( 'service_finder_job_dashboard_columns' )){
function service_finder_job_dashboard_columns( $fields ) {

	 $fields['number_of_applicants'] = esc_html__( 'Number of Applicants', 'service-finder' );
	 $fields['action'] = esc_html__( 'Action', 'service-finder' );
	 
	return $fields;
}
}

/*Add new application method*/
add_filter( 'job_manager_admin_actions', 'service_finder_job_admin_actions', 10, 2 );
if ( !function_exists( 'service_finder_job_admin_actions' )){
function service_finder_job_admin_actions( $fields ) {
global $post,$service_finder_Tables,$wpdb;
	 $bookinginfo = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$service_finder_Tables->bookings.' WHERE `id` = %d',get_post_meta($post->ID,'_bookingid',true)));

	 $bookinginfo_type = (!empty($bookinginfo->type)) ? esc_html($bookinginfo->type) : '';
	 $bookinginfo_status = (!empty($bookinginfo->status)) ? esc_html($bookinginfo->status) : '';
	 $bookinginfo_payment_to = (!empty($bookinginfo->payment_to)) ? esc_html($bookinginfo->payment_to) : '';

	 if($bookinginfo_type == 'wired' && $bookinginfo_payment_to == 'admin' && $bookinginfo_status == 'Need-Approval'){
	 	$fields['approve'] = array(
								'action'  => 'approve',
								'name'    => esc_html__( 'Approve', 'service-finder' ),
								'url'     => add_query_arg( array( 'post_type' => 'job_listing', 'post' => absint($bookinginfo->id), 'approve' => 'yes' ), admin_url('edit.php') )
							);
	 }
	 
	return $fields;
}
}

add_filter( 'manage_edit-job_listing_columns', 'service_finder_columns', 2 );
add_action( 'manage_job_listing_posts_custom_column', 'service_finder_custom_columns', 2 );
if ( !function_exists( 'service_finder_columns' )){
function service_finder_columns( $columns ) {
	if ( ! is_array( $columns ) ) {
		$columns = array();
	}

	$columns['job_invoice_id'] = esc_html__( "Invoice ID", 'service-finder' );
	$columns['job_payment_status'] = esc_html__( "Payment Status", 'service-finder' );
	$columns['job_number_of_applicants'] = esc_html__( 'Number of Applicants', 'service-finder' );
	return $columns;
}
}

if ( !function_exists( 'service_finder_custom_columns' )){
function service_finder_custom_columns( $column ) {
global $post,$service_finder_Tables,$wpdb;

$jobauthorid = get_post($post->ID);

$availablelimit = service_finder_get_avl_job_limits($jobauthorid->post_author);

$bookinginfo = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$service_finder_Tables->bookings.' WHERE `id` = %d',get_post_meta($post->ID,'_bookingid',true)));
$invoiceid = '';

$bookinginfo_type = (!empty($bookinginfo->type)) ? esc_html($bookinginfo->type) : '';
$bookinginfo_payment_to = (!empty($bookinginfo->payment_to)) ? esc_html($bookinginfo->payment_to) : '';

if($bookinginfo_type == 'wired' && $bookinginfo_payment_to == 'admin'){
$bookinginfo_wired_invoiceid = (!empty($bookinginfo->wired_invoiceid)) ? esc_html($bookinginfo->wired_invoiceid) : '';
$invoiceid = esc_html($bookinginfo_wired_invoiceid);
}

$bookinginfo_status = (!empty($bookinginfo->status)) ? esc_html($bookinginfo->status) : '';

if($bookinginfo_status == 'Pending' || $bookinginfo_status == 'Cancel' || $bookinginfo_status == 'Completed'){
	$paymentstatus = 'Paid';
}else{
	$paymentstatus = 'Pending';
}

switch ( $column ) {
	case "job_invoice_id" :
			if($invoiceid != ""){
			echo '<span class="job-invoice-id">' . $invoiceid . '</span>';
			}else{
			echo '-';
			}
	break;
	case "job_payment_status" :
		echo esc_html($paymentstatus);
		break;
	case "job_number_of_applicants" :
		if(service_finder_get_number_of_applicants($post->ID) > 0){
		echo '<a href="javascript:;" class="admin_show_applicants" data-toggle="modal" data-target="#job-applicants-listing" data-jobid="'.esc_attr($post->ID).'">' . service_finder_get_number_of_applicants($post->ID) . '</a>'; 
		}else{
		echo '<a href="javascript:;">' . service_finder_get_number_of_applicants($post->ID) . '</a>'; 						
		}
		break;	
}
}
}

add_action('load-edit.php', 'service_finder_approve_admin_job');
if ( !function_exists( 'service_finder_approve_admin_job' )){
function service_finder_approve_admin_job() {
global $post,$service_finder_Tables,$wpdb;
$post_type = (isset($_GET['post_type'])) ? esc_html($_GET['post_type']) : '';
$approve = (isset($_GET['approve'])) ? esc_html($_GET['approve']) : '';
if($post_type == 'job_listing' && $approve == 'yes'){
	$bookingid = (!empty($_GET['post'])) ? esc_html($_GET['post']) : '';

	$data = array(
			'status' => 'Pending',
			);
	
	$where = array(
			'id' => $bookingid,
			);

	$booking_id = $wpdb->update($service_finder_Tables->bookings,wp_unslash($data),$where);		
}
}
}

/*Change signin link*/
add_filter( 'job_manager_job_dashboard_login_url', 'service_finder_custom_redirect_url' );
add_filter( 'submit_job_form_login_url', 'service_finder_custom_redirect_url' );
if ( !function_exists( 'service_finder_custom_redirect_url' ) ){
function service_finder_custom_redirect_url($link) {
	if(service_finder_get_url_by_shortcode('[service_finder_login]') != ""){
		return service_finder_get_url_by_shortcode('[service_finder_login]');
	}else{
		return $link;
	}
  
}
}

/*cache result false*/
add_filter( 'get_job_listings_cache_results', 'service_finder_job_listings_cache_results' );
if ( !function_exists( 'service_finder_job_listings_cache_results' ) ){
function service_finder_job_listings_cache_results() {
	
	return false;
  
}
}
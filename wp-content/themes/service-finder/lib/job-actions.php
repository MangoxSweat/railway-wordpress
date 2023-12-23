<?php
/*****************************************************************************
*
*	copyright(c) - aonetheme.com - Service Finder Team
*	More Info: http://aonetheme.com/
*	Coder: Service Finder Team
*	Email: contact@aonetheme.com
*
******************************************************************************/

/* Apply to job form */
add_action('wp_ajax_applyjobform', 'service_finder_applyjobform');
if ( !function_exists( 'service_finder_applyjobform' )){
function service_finder_applyjobform(){
	global $wpdb, $service_finder_options, $service_finder_Tables;
	$current_user = wp_get_current_user(); 
	
	$jobid = (!empty($_POST['jobid'])) ? $_POST['jobid']  : '';
	$costing = (!empty($_POST['costing'])) ? $_POST['costing']  : '';
	$description = (!empty($_POST['description'])) ? $_POST['description']  : '';
	
	$userCap = array();
	if(class_exists('service_finder_booking_plugin')) {
	$userCap = service_finder_get_capability($current_user->ID);
	}
	
	if(!empty($userCap)){
	if(!in_array('apply-for-job',$userCap)){
		$msg = esc_html__( 'You do not have capability to apply for job. Please upgrade your package.', 'service-finder' );
		$success = array(
				'status' =>'error',
				'err_message' => $msg
				);
		echo json_encode($success);
		exit;
	}else{
		$availablelimit = service_finder_get_avl_job_limits($current_user->ID);
		if($availablelimit < 1){
		$msg = esc_html__( 'You do not have available connects. Please upgrade you plan.', 'service-finder' );
		$success = array(
				'status' =>'error',
				'err_message' => $msg
				);
		echo json_encode($success);
		exit;
		}
	}
	}
	
	$jobinfo = get_post($jobid);
	$customerid = $jobinfo->post_author;
	$customer = get_user_by( 'id', $customerid );
	$customer_email = $customer->user_email;
	
	$jobtitle = '<a href="'.esc_url(get_post_permalink($jobid)).'" target="_blank">'.esc_html($jobinfo->post_title).'</a>';
	
	$applications_cost = get_user_meta($current_user->ID,'job_applications_cost',true);
	if($applications_cost != ""){
		
		$costdata = $applications_cost.','.esc_html($jobid).'-'.esc_html($costing);
		
		update_user_meta($current_user->ID,'job_applications_cost',$costdata);
	}else{
		add_user_meta($current_user->ID,'job_applications_cost',esc_html($jobid).'-'.esc_html($costing));
	}
	
	$applications_desc = get_user_meta($current_user->ID,'job_applications_description',true);
	if($applications_desc != ""){
		
		$descdata = $applications_desc.'%NEXT%'.esc_html($jobid).'%SEP%'.esc_html($description);
		
		update_user_meta($current_user->ID,'job_applications_description',$descdata);
	}else{
		add_user_meta($current_user->ID,'job_applications_description',esc_html($jobid).'%SEP%'.esc_html($description));
	}
	
	$itemarr = get_user_meta($current_user->ID,'job_applications');
	if(!empty($itemarr)){

		$itemarr = implode(',',$itemarr);
		$jobitems = $itemarr.','.esc_html($jobid);
		
		update_user_meta($current_user->ID,'job_applications',$jobitems);
	}else{
	add_user_meta($current_user->ID,'job_applications',esc_html($jobid));
	}
	
	$itemarr = get_post_meta($jobid,'job_applications');
	if(!empty($itemarr)){

		$itemarr = implode(',',$itemarr);
		$providers = $itemarr.','.$current_user->ID;
		
		update_post_meta($jobid,'job_applications',$providers);
	}else{
	add_post_meta($jobid,'job_applications',$current_user->ID);
	}
	
	if(!empty($service_finder_options['applyjob-to-customer'])){
		$message = $service_finder_options['applyjob-to-customer'];
	}else{
		$message = 'Job Application from provider

Job Title: %JOBTITLE%

Full Name: %FULLNAME%

Email: %EMAIL%

Phone: %PHONE%

Cost: %COST%

Description: %DESCRIPTION%
';
	}
	
	if(!empty($service_finder_options['applyjob-to-admin'])){
		$adminmessage = $service_finder_options['applyjob-to-admin'];
	}else{
		$adminmessage = 'Job Application from provider

Job Title: %JOBTITLE%

Full Name: %FULLNAME%

Email: %EMAIL%

Phone: %PHONE%

Cost: %COST%

Description: %DESCRIPTION%
';
	}
			
			$tokens = array('%JOBTITLE%','%FULLNAME%','%EMAIL%','%PHONE%','%COST%','%DESCRIPTION%','%JOBAPPLICATIONSPAGELINK%');
			
			$providerInfo = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$service_finder_Tables->providers.' WHERE `wp_user_id` = %d',$current_user->ID));
			
			$jobapplicantspage = service_finder_get_url_by_shortcode('service_finder_job_applicants');
			$jobapplicantspage = add_query_arg( array('jobid' => $jobid ),$jobapplicantspage );
			$pagelink = '<a href="'.esc_url($jobapplicantspage).'" class="btn-linking" target="_blank">' . esc_html__('See Job Application', 'service-finder') . '</a>';
			
			$replacements = array($jobtitle,service_finder_get_providername_with_link($providerInfo->wp_user_id),esc_html($providerInfo->email),esc_html($providerInfo->mobile),service_finder_money_format($costing),$description,$pagelink);
			$msg_body = str_replace($tokens,$replacements,$message);
			
			if($service_finder_options['applyjob-to-customer-subject'] != ""){
				$msg_subject = $service_finder_options['applyjob-to-customer-subject'];
			}else{
				$msg_subject = esc_html__('Job Application', 'service-finder');
			}
			
			$adminmsg_body = str_replace($tokens,$replacements,$adminmessage);
			
			if($service_finder_options['applyjob-to-admin-subject'] != ""){
				$adminmsg_subject = $service_finder_options['applyjob-to-admin-subject'];
			}else{
				$adminmsg_subject = esc_html__('Job Application', 'service-finder');
			}
			
			
			
			$adminemail = get_option( 'admin_email' );
			
			$applymail = (!empty($service_finder_options['job-apply-mail-to-admin'])) ? $service_finder_options['job-apply-mail-to-admin'] : '';
			
			$row = $wpdb->get_row('SELECT * FROM '.$service_finder_Tables->job_limits.' WHERE `provider_id` = "'.$current_user->ID.'"');

			if(!empty($row)){
			$available_limits = $row->available_limits - 1;
			$data = array(
					'available_limits' => $available_limits,
					);
			$where = array(
					'provider_id' => $current_user->ID,
					);		
			
			$wpdb->update($service_finder_Tables->job_limits,wp_unslash($data),$where);
			}
			
			if(function_exists('service_finder_add_notices')) {
		
				$providerreplacestring = (!empty($service_finder_options['provider-replace-string'])) ? $service_finder_options['provider-replace-string'] : esc_html__('Provider', 'service-finder');
					
				$noticedata = array(
						'customer_id' => $customerid,
						'target_id' => $jobid, 
						'topic' => 'Job Application',
						'title' => esc_html__('Job Application', 'service-finder'),
						'notice' => sprintf( esc_html__('%s has applied for Job. Job title is %s', 'service-finder'), $providerreplacestring,$jobinfo->post_title ),
						);
				service_finder_add_notices($noticedata);
				
			}
			
			if($applymail){
				service_finder_wpmailer($customer_email,$msg_subject,$msg_body);
				service_finder_wpmailer($adminemail,$adminmsg_subject,$adminmsg_body);
				
				$msg = (!empty($service_finder_options['apply-job'])) ? $service_finder_options['apply-job'] : esc_html__('Applied to this job successfully', 'service-finder');
				$success = array(
						'status' =>'success',
						'suc_message' => $msg
						);
				echo json_encode($success);
				
			}else{
				service_finder_wpmailer($customer_email,$msg_subject,$msg_body);
				$msg = (!empty($service_finder_options['apply-job'])) ? $service_finder_options['apply-job'] : esc_html__('Applied to this job successfully', 'service-finder');
				$success = array(
						'status' =>'success',
						'suc_message' => $msg
						);
				echo json_encode($success);

			}

	exit;

}
}

/*Get number of applicants*/
if ( !function_exists( 'service_finder_get_number_of_applicants' )){
function service_finder_get_number_of_applicants($jobid){
	$job_applications = get_post_meta($jobid,'job_applications',true);
	if($job_applications != ""){
	$applicants = explode(',',$job_applications);
	$number_of_applicants = count(array_unique($applicants));
	}else{
	$number_of_applicants = 0;
	}
	return $number_of_applicants;
}
}

/* Display applicants listing */
add_action('wp_ajax_applicants_listing', 'service_finder_applicants_listing');
if ( !function_exists( 'service_finder_applicants_listing' )){
function service_finder_applicants_listing(){
	global $wpdb, $service_finder_options, $service_finder_Tables;
	$current_user = wp_get_current_user(); 
	
	$jobid = (!empty($_POST['jobid'])) ? $_POST['jobid']  : '';
	
	$job_applications = get_post_meta($jobid,'job_applications',true);
	$applicants = array();
	$job_cost = get_post_meta($jobid,'_job_cost',true);
	if($job_applications != ""){
	$applicants = explode(',',$job_applications);
	$applicants = array_unique($applicants);
	}
	if(!empty($applicants)){
	$html = '';
		foreach($applicants as $applicant){
		
		$provider = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$service_finder_Tables->providers.' WHERE `admin_moderation` = "approved" AND `account_blocked` != "yes" AND `wp_user_id` = %d',$applicant));
		
		$link = service_finder_get_author_url($applicant);
		$settings = service_finder_getProviderSettings($provider->wp_user_id);

		if(!empty($provider->avatar_id) && $provider->avatar_id > 0){
			$src  = wp_get_attachment_image_src( $provider->avatar_id, 'service_finder-provider-thumb' );
			$src  = $src[0];
		}else{
			$src  = service_finder_get_default_avatar();
		}
		
		if($src != ''){
			$imgtag = '<img src="'.esc_url($src).'" width="358" height="259">';
		}else{
			$imgtag = '';
		}
		
		if(service_finder_is_featured($provider->wp_user_id)){
		$featured = '<strong class="sf-featured-label"><span>'.esc_html__( 'Featured', 'service-finder' ).'</span></strong>';
		}else{
		$featured = '';
		}
		
		$hired = '';
		$hireurl = add_query_arg( array( 'jobid' => absint( $jobid ) . '#book-now-section' ), $link );
		$jobexpire = get_post_meta($jobid,'_job_expires',true);
		
			if(get_post_meta($jobid,'_filled',true)){
				if(get_post_meta($jobid,'_assignto',true) == $provider->wp_user_id){
					$hireme = '<a href="javascript:;" class="btn btn-primary">'.esc_html__( 'Hired', 'service-finder' ).' <i class="fa fa-user"></i></a>';
					$hired = '<strong class="sf-hired-label"><span>'.esc_html__( 'Hired', 'service-finder' ).'</span></strong>';
				}else{
					$hireme = '<a href="javascript:;" class="btn btn-primary">'.esc_html__( 'Job Filled', 'service-finder' ).' <i class="fa fa-user"></i></a>';
				}
			}else{
				if(strtotime(date('Y-m-d')) > strtotime( $jobexpire )){
					$hireme = '<a href="javascript:;" class="btn btn-primary">'.esc_html__( 'Job Expired', 'service-finder' ).' <i class="fa fa-times"></i></a>';
				}else{
					if(service_finder_UserRole($current_user->ID) == 'Customer'){
					if($settings['booking_process'] == 'on'){
					$hireme = '<a href="'.esc_url($hireurl).'" target="_blank" class="btn btn-primary">'.esc_html__( 'Hire Me', 'service-finder' ).' <i class="fa fa-user"></i></a>';
					}else{
					$hireme = '<a href="javascript:;" class="btn btn-primary hire_if_booking_off" data-providerid="'.$provider->wp_user_id.'" data-jobid="'.$jobid.'">'.esc_html__( 'Hire Me', 'service-finder' ).' <i class="fa fa-user"></i></a>';
					}
					}else{
					$hireme = '<a href="javascript:;" target="_blank" class="btn btn-primary">'.esc_html__( 'Not Hired', 'service-finder' ).' <i class="fa fa-user"></i></a>';				
					}
				}
			}
		
		$applications_cost = get_user_meta($provider->wp_user_id,'job_applications_cost',true);
		
		$tempdata = explode(',',$applications_cost);
		if(!empty($tempdata)){
			foreach($tempdata as $temp){
				$tmp = explode('-',$temp);
				if($tmp[0] == $jobid){
					$quotecost = $tmp[1];
				}
			}
		}
		
		$applications_desc = get_user_meta($provider->wp_user_id,'job_applications_description',true);
		
		$tempdata = explode('%NEXT%',$applications_desc);
		
		if(!empty($tempdata)){
			foreach($tempdata as $temp){
				$tmp = explode('%SEP%',$temp);
				if($tmp[0] == $jobid){
					$quotedesc = $tmp[1];
				}
			}
		}
		
		if($quotedesc != ""){
		$quotation_desc = '<div class="btn-group sf-provider-tooltip" role="group"><button type="button" class="btn btn-border provider_description" data-toggle="tooltip" data-placement="top" title="'.esc_html__('Provider Description','service-finder').'" data-providerid="'.$provider->wp_user_id.'" data-jobid="'.$jobid.'"><i class="fa fa-commenting-o"></i></button></div>';
		}
		
		if($quotecost != ""){
		$quotation = '<div class="provider-quotation">
                          '.esc_html__('Quotation','service-finder').': '.service_finder_money_format($quotecost).'
                        </div>';
		}
		$addressbox = '';
		$showaddressinfo = (isset($service_finder_options['show-address-info'])) ? esc_attr($service_finder_options['show-address-info']) : '';
		if($showaddressinfo && $service_finder_options['show-postal-address'] && service_finder_check_address_info_access()){
			$addressbox = '<div class="overlay-text">
									<div class="sf-address-bx">
										<i class="fa fa-map-marker"></i>
										'.service_finder_getshortAddress($provider->wp_user_id).'
									</div>
								</div>';
		}
			
		$html .= '<div class="col-md-4 col-sm-6 equal-col">

                <div class="sf-provider-bx item">
                    <div class="sf-element-bx">
                    
                        <div class="sf-thum-bx sf-listing-thum img-effect2" style="background-image:url('.esc_url($src).');"> <a href="'.esc_url($link).'" class="sf-listing-link"></a>
                            
							<div class="overlay-bx">
								'.$addressbox.'
							</div>
                            
                            '.service_finder_get_primary_category_tag($provider->wp_user_id).'
							'.$featured.'
                            '.$hired.'
                        </div>
                        
                        <div class="padding-20 bg-white">
                            <h4 class="sf-title">'.service_finder_getExcerpts(service_finder_getCompanyName($provider->wp_user_id),0,20).'</h4>
                            <strong class="sf-company-name"><a href="'.esc_url($link).'">'.service_finder_getExcerpts($provider->full_name,0,35).'</a></strong>
							'.service_finder_displayRating(service_finder_getAverageRating($provider->wp_user_id)).'
                            
                        </div>
                        '.$quotation.' '.$quotation_desc.'
                        <div class="btn-group-justified" id="proid-'.$provider->wp_user_id.'">
                          <a href="'.esc_url($link).'" target="_blank" class="btn btn-custom mark-fullview">'.esc_html__('Full View','service-finder').' <i class="fa fa-arrow-circle-o-right"></i></a>
                          '.$hireme.'
                        </div>
						
                        
                    </div>
                </div>

            </div>';
		}
		
		$success = array(
				'status' =>'success',
				'applicants' => $html,
				);
		echo json_encode($success);
	}else{
		$error = array(
				'status' => 'error',
				'err_message' => esc_html__('No Applicants Found.', 'service-finder'),
				);
		echo json_encode($error);
	}
	exit;
}
}	

/* Display applicants listing */
add_action('wp_ajax_hire_if_booking_off', 'service_finder_hire_if_booking_off');
if ( !function_exists( 'service_finder_hire_if_booking_off' )){
function service_finder_hire_if_booking_off(){
	global $wpdb, $service_finder_options, $service_finder_Tables;
	$current_user = wp_get_current_user(); 
	
	$jobid = (!empty($_POST['jobid'])) ? $_POST['jobid']  : '';
	$providerid = (!empty($_POST['providerid'])) ? $_POST['providerid']  : '';
	
	update_post_meta($jobid,'_filled',1);
	update_post_meta($jobid,'_assignto',$providerid);
	update_post_meta($jobid,'_hire_when_booking_is_off','yes');
	
	$customerid = get_post_field( 'post_author', $jobid );
	$customername = get_user_meta($customerid,'first_name',true).' '.get_user_meta($customerid,'last_name',true);
	$customeremail = get_post_meta($jobid,'_application',true);
		
	if(function_exists('service_finder_add_notices')) {
	
		$noticedata = array(
				'provider_id' => $providerid,
				'target_id' => $jobid, 
				'topic' => 'Hire for job',
				'title' => esc_html__('Hire for job', 'service-finder'),
				'notice' => sprintf( esc_html__('You have been hired for applied job by %s (%s).', 'service-finder'), $customername,$customeremail ),
				);
		service_finder_add_notices($noticedata);
	
	}
	
	if($service_finder_options['booking-hire-mail-to-provider-subject'] != ""){
		$msg_subject = $service_finder_options['booking-hire-mail-to-provider-subject'];
	}else{
		$msg_subject = esc_html__('Hire for job', 'service-finder');
	}
	
	
	if(!empty($service_finder_options['booking-hire-mail-to-provider'])){
		$message = $service_finder_options['booking-hire-mail-to-provider'];
	}else{
		$message = 'You have been hired for applied job. <br/><br/>
		
		Customer Name: %CUSTOMERNAME% <br/>
		
		Customer Email: %CUSTOMEREMAIL%';
	}
	
	$tokens = array('%CUSTOMERNAME%','%CUSTOMEREMAIL%');
			
	$replacements = array($customername,$customeremail);

	$msg_body = str_replace($tokens,$replacements,$message);
	
	$provideremail = service_finder_getProviderEmailId($providerid);
			
	service_finder_wpmailer($provideremail,$msg_subject,$msg_body);
	
	$providerprofilelink = service_finder_get_author_url($providerid);
	
	$success = array(
				'status' => 'success',
				'link' => $providerprofilelink,
				'suc_message' => esc_html__('The provider has been notified you have accepted their offer. Click continue to view providers contact information.', 'service-finder'),
				);
	echo json_encode($success);
	exit;
}
}	

/* get quoteation description */
add_action('wp_ajax_get_quote_description', 'service_finder_get_quote_description');
if ( !function_exists( 'service_finder_get_quote_description' )){
function service_finder_get_quote_description(){
	global $wpdb, $service_finder_options, $service_finder_Tables;
	$current_user = wp_get_current_user(); 
	
	$jobid = (!empty($_POST['jobid'])) ? $_POST['jobid']  : '';
	$providerid = (!empty($_POST['providerid'])) ? $_POST['providerid']  : '';
	
	$applications_desc = get_user_meta($providerid,'job_applications_description',true);
	
		
	$tempdata = explode('%NEXT%',$applications_desc);
	if(!empty($tempdata)){
		foreach($tempdata as $temp){
			$tmp = explode('%SEP%',$temp);
			if($tmp[0] == $jobid){
				$quotedesc = $tmp[1];
			}
		}
	}

	echo wp_kses_post($quotedesc);
	exit;

}
}

add_action('wp_insert_post', 'service_finder_insert_job_post');
if ( !function_exists( 'service_finder_insert_job_post' )){
function service_finder_insert_job_post($post_id){
global $wpdb, $service_finder_options, $service_finder_Tables, $current_user;

	$postdata = get_post( $post_id ); 
	$post_status = $postdata->post_status;
	$post_type = $postdata->post_type;
	
	if($post_type == 'job_listing' && ($post_status == 'publish' || $post_status == 'pending')){
	
	$jobpostingtype = (!empty($service_finder_options['job-posting-type'])) ? esc_html($service_finder_options['job-posting-type']) : '';
	if($jobpostingtype == 'paid'){
				
	$availablelimit = service_finder_get_avl_job_limits($current_user->ID);
	
	if($availablelimit > 0){
	$available_limits = $availablelimit - 1;
	$data = array(
			'available_limits' => $available_limits,
			);
	$where = array(
			'provider_id' => $current_user->ID,
			);		
	
	$wpdb->update($service_finder_Tables->job_limits,wp_unslash($data),$where);
	}else{
	$account_url = service_finder_get_url_by_shortcode('[service_finder_my_account]');	
	$redirect_uri = add_query_arg( array('action' => 'job-post-plans'), $account_url );
	wp_redirect($redirect_uri);
	}
	}
	}

}
}

add_action('admin_footer', 'service_finder_admin_footer');
if ( !function_exists( 'service_finder_admin_footer' )){
function service_finder_admin_footer() {
$screen = get_current_screen();
if($screen->base == 'edit' && $screen->post_type == 'job_listing'){
?>
<!--Load Applicants Listing in job manager-->
<div class="modal fade" id="job-applicants-listing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">
          <?php esc_html_e('Job Applicants', 'service-finder'); ?>
        </h3>
      </div>
      <div class="modal-body"> 
      <div class="listing-grid-box sf-listing-grid-4 equal-col-outer clearfix">
      <div class="row">
      </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
        <?php esc_html_e('Close', 'service-finder'); ?>
        </button>
      </div>
    </div>
  </div>
</div>
<div class="loading-area default-hidden">
  <div class="loading-box"></div>
  <div class="loading-pic"></div>
</div>
<?php
}
}
}

/*Send notification on job published*/
function service_finder_job_listing_published_notification( $ID, $post ) {
	global $wpdb, $service_finder_Tables, $service_finder_options;
	
	service_finder_job_published_customer_mail($ID);

	$jobnotification = (!empty($service_finder_options['job-notification'])) ? $service_finder_options['job-notification'] : '';
	if($jobnotification == 'job-publish'){
	$jobid =  $ID;
	$taxonomy = 'job_listing_category';
	$terms = wp_get_post_terms( $jobid, $taxonomy );
	$provider_categotyid = array();
	if(!empty($terms)){
		foreach($terms as $term){
			$termname = $term->name;
			$providercategory = get_term_by('name', $termname, 'providers-category');
			$provider_categotyid[] = $providercategory->term_id;
		}
	}
	
	$totalcat = count($provider_categotyid);
	
	$sql = 'SELECT * FROM '.$service_finder_Tables->providers.' WHERE admin_moderation = "approved" AND account_blocked != "yes"';
	
	if(!empty($provider_categotyid)){
	$sql .= ' AND (';
			$i = 1;
			foreach($provider_categotyid as $catid) {
				if($totalcat == $i){	
					$sql .= ' FIND_IN_SET("'.$catid.'", category_id) ';
				}else{
					$sql .= ' FIND_IN_SET("'.$catid.'", category_id) OR ';
				}
				$i++;
				
			}
	$sql .= ' ) ';	
	}	
	
	$results = $wpdb->get_results($sql);
	
	if(!empty($results)){
		foreach($results as $row){
			$providerid = $row->wp_user_id;
			service_finder_job_published_mail($providerid,$jobid);
		}
	}
	}
}
add_action( 'publish_job_listing', 'service_finder_job_listing_published_notification', 10, 2 );

function service_finder_job_published_mail($providerid,$jobid){
	global $service_finder_options;
	if($service_finder_options['job-published-mail-to-provider-subject'] != ""){
		$msg_subject = $service_finder_options['job-published-mail-to-provider-subject'];
	}else{
		$msg_subject = esc_html__('Job Published', 'service-finder');
	}
	
	
	if(!empty($service_finder_options['job-published-mail-to-provider'])){
		$message = $service_finder_options['job-published-mail-to-provider'];
	}else{
		$message = 'New job published. <br/><br/>
		
		Job Title: %JOBTITLE% <br/>
		
		Job Link: %JOBLINK%';
	}
	
	$tokens = array('%JOBTITLE%','%JOBLINK%');
			
	$jobtitle = get_the_title( $jobid );
	$joblink = get_permalink( $jobid );		
	$replacements = array($jobtitle,$joblink);

	$msg_body = str_replace($tokens,$replacements,$message);
	
	$provideremail = service_finder_getProviderEmailId($providerid);
	
	if(class_exists('aonesms'))
	{
	if(service_finder_theme_get_data($service_finder_options,'is-active-provider-job-publish-sms') == true)
	{
	$smsbody = service_finder_theme_get_data($service_finder_options,'template-provider-job-publish-sms');
	if($smsbody != '')
	{
	$providerInfo = service_finder_get_provier_info($providerid);
	
	$smsreplacements = array($jobtitle,$joblink);
	
	$smsbody = str_replace($tokens,$smsreplacements,$smsbody);
	
	aonesms_send_sms_notifications($providerInfo->mobile,$smsbody);
	}
	}
	}
	
	if(function_exists('service_finder_add_notices')) {
		$noticedata = array(
				'provider_id' => $providerid,
				'target_id' => $jobid, 
				'topic' => 'Job Published',
				'title' => esc_html__('Job Published', 'service-finder'),
				'notice' => sprintf( esc_html__('Job published. Job title is %s', 'service-finder'), get_the_title( $jobid ) ),
				);
		service_finder_add_notices($noticedata);
		
	}
	
	if(service_finder_wpmailer($provideremail,$msg_subject,$msg_body)) {
		
		service_finder_update_custom_meta($jobid,$providerid,'notification_mail_sent','yes');
	}
}

function service_finder_job_published_customer_mail($jobid){
	global $service_finder_options;
	if($service_finder_options['job-published-mail-to-customer-subject'] != ""){
		$msg_subject = $service_finder_options['job-published-mail-to-customer-subject'];
	}else{
		$msg_subject = esc_html__('Job Published', 'service-finder');
	}
	
	if(!empty($service_finder_options['job-published-mail-to-customer'])){
		$message = $service_finder_options['job-published-mail-to-customer'];
	}else{
		$message = 'Your job has been published. <br/><br/>
		
		Job Title: %JOBTITLE% <br/>
		
		Job Link: %JOBLINK%
		
		Recommended Providers: %RECOMMENDED_PROVIDERS_LINK%';
	}
	
	$tokens = array('%JOBTITLE%','%JOBLINK%','%RECOMMENDED_PROVIDERS_LINK%');
			
	$jobtitle = get_the_title( $jobid );
	$joblink = get_permalink( $jobid );		
	$jobapplicantspage = service_finder_get_url_by_shortcode('service_finder_job_applicants');
	$jobapplicantsurl = add_query_arg( array('jobid' => $jobid ),$jobapplicantspage );
	
	$replacements = array($jobtitle,$joblink,$jobapplicantsurl);

	$msg_body = str_replace($tokens,$replacements,$message);
	
	$jobauthor = get_post_field( 'post_author', $jobid );
	
	$customeremail = service_finder_getCustomerEmailId($jobauthor);
	
	if(function_exists('service_finder_add_notices')) {
		
		$noticedata = array(
				'customer_id' => $jobauthor,
				'target_id' => $jobid, 
				'topic' => 'Job Published',
				'title' => esc_html__('Job Published', 'service-finder'),
				'notice' => sprintf( esc_html__('Job published. Job title is %s', 'service-finder'), get_the_title( $jobid ) ),
				);
		service_finder_add_notices($noticedata);
		
	}
	
	service_finder_wpmailer($customeremail,$msg_subject,$msg_body);
}

function service_finder_related_jobs($post){

	$jobid = $post->ID;
	$jobmetas=get_post_meta( $jobid);
    $contactname = (isset($jobmetas['_company_name'][0])!='') ? $jobmetas['_company_name'][0] : '';
    
    $types = wp_get_post_terms( $jobid, 'job_listing_type', array("fields" => "ids") );
	$categories = wp_get_post_terms( $jobid, 'job_listing_category', array("fields" => "ids") );
	
    $args = array(
        'post_type' => 'job_listing',
        'post_status' => 'publish',
        'posts_per_page' => 5,
        'orderby' => 'rand',
        'meta_or_tax' => true,
        'tax_query' => array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'job_listing_type',
                'field' => 'term_id',
                'terms' => $types
			),
			array(
				'taxonomy' => 'job_listing_category',
                'field' => 'term_id',
                'terms' => $categories
			),
		),
        'meta_query' => array(
            array(
                'key'     => '_company_name',
                'value'   => $contactname,
                'compare' => 'LIKE',
            ),
        ),
        'post__not_in' => array ($jobid),
    );
	
    if($contactname == ''){
        unset($args['meta_query']);
	}	
	
	ob_start();

    $relatedjobs = new WP_Query( $args );
    $num_of_jobs = $relatedjobs->post_count;
	
	if($num_of_jobs > 0)
    {
		echo '<div class="owl-carousel sf-jobrelated-carousel sf-owl-arrow">';

        while($relatedjobs->have_posts()) : $relatedjobs->the_post(); 

            $metas = get_post_meta( get_the_ID() );
            $types = wp_get_post_terms( get_the_ID(), 'job_listing_type', array("fields" => "names") );
            $company=(isset($metas['_company_name'][0])!='') ? $metas['_company_name'][0]:'';
            $location=(isset($metas['_job_location'][0])!='') ? $metas['_job_location'][0]:'';
			$postdata = get_post(get_the_ID());
			$postauthorid = $postdata->post_author;
			$authorsrc = service_finder_get_avatar_by_userid($postauthorid);
			?>
            <div class="item">
              <div class="sf-jobs-section">
                <div class="sf-jobs-head"> <a href="<?php the_job_permalink(); ?>" class="sf-jobs-media"><?php the_company_logo(); ?></a> <span class="sf-jobs-position">
					<?php if ( get_option( 'job_manager_enable_types' ) ) { ?>
						<?php $types = wpjm_get_the_job_types(); ?>
                        <?php if ( ! empty( $types ) ) : foreach ( $types as $type ) : ?>
                            <?php echo esc_html( $type->name ); ?>
                        <?php endforeach; endif; ?>
                    <?php } ?>
                </span> </div>
                <div class="sf-jobs-info">
                  <?php the_company_name( '<div class="sf-job-company">', '</div> ' ); ?>
                  <h4 class="sf-title"><a href="<?php the_job_permalink(); ?>"><?php the_title(); ?></a></h4>
                  <p><?php echo get_the_excerpt();?></p>
                </div>
                <div class="sf-jobs-footer">
                  <div class="sf-job-location"><i class="fa fa-map-marker"></i><?php the_job_location( false ); ?></div>
                  <div class="sf-jobs-cost">
                    <span>
                    <?php
                     $cost = get_post_meta( $post->ID, '_job_cost', true );
                     echo service_finder_money_format( $cost );
                    ?>
                    </span>
                    </div>
                </div>
              </div>
            </div>
			<?php
        endwhile;
        wp_reset_postdata();

        echo '</div>';
    }
	
	$html = ob_get_clean();

    return $html;
	
}

function service_finder_is_related_jobs($post){

	$jobid = $post->ID;
	$jobmetas=get_post_meta( $jobid);
    $contactname = (isset($jobmetas['_company_name'][0])!='') ? $jobmetas['_company_name'][0] : '';
    
    $types = wp_get_post_terms( $jobid, 'job_listing_type', array("fields" => "ids") );
	$categories = wp_get_post_terms( $jobid, 'job_listing_category', array("fields" => "ids") );
	
    $args = array(
        'post_type' => 'job_listing',
        'post_status' => 'publish',
        'posts_per_page' => 5,
        'orderby' => 'rand',
        'meta_or_tax' => true,
         'tax_query' => array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'job_listing_type',
                'field' => 'term_id',
                'terms' => $types
			),
			array(
				'taxonomy' => 'job_listing_category',
                'field' => 'term_id',
                'terms' => $categories
			),
		),
        'meta_query' => array(
            array(
                'key'     => '_company_name',
                'value'   => $contactname,
                'compare' => 'LIKE',
            ),
        ),
        'post__not_in' => array ($jobid),
    );

    if($contactname == ''){
        unset($args['meta_query']);
	}	

    $html = '';
    
    $relatedjobs = new WP_Query( $args );
    $num_of_jobs = $relatedjobs->post_count;
	
	if($num_of_jobs > 0)
    {
	return true;
	}else{
	return false;
	}

}

function service_finder_share_jobs($post){
global $service_finder_options;	
$jobid = $post->ID;
	?>
	<?php if($service_finder_options['enable-social-shares']){ ?>
	<ul class="sf-con-social">
	  <?php if($service_finder_options['facebook']){ ?>
      <li><a class="sf-fb" onclick="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(esc_url(get_permalink($jobid))) ?>', '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="javascript:;"> <i class="fa fa-facebook"></i>
        <?php esc_html_e('Share', 'service-finder'); ?>
        </a></li>
      <?php } ?>
      <?php if($service_finder_options['twitter']){ ?>
      <li><a class="sf-twitter" onclick="javascript:window.open('https://twitter.com/intent/tweet?text=<?php echo get_the_title($jobid); ?>&url=<?php echo urlencode(esc_url(get_permalink($jobid))) ?>', '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="javascript:;"> <i class="fa fa-twitter"></i>
        <?php esc_html_e('Share', 'service-finder'); ?>
        </a></li>
      <?php } ?>
      <?php if($service_finder_options['linkedin']){ ?>
      <li><a class="sf-linkedin" onclick="javascript:window.open('http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(esc_url(get_permalink($jobid))) ?>', '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="javascript:;"> <i class="fa fa-linkedin"></i>
        <?php esc_html_e('Share', 'service-finder'); ?>
        </a></li>
      <?php } ?>
      <?php if($service_finder_options['pinterest']){ ?>
      <li><a class="sf-pinterest" href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','<?php echo get_bloginfo( 'charset' ) ?>');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"> <i class="fa fa-pinterest"></i>
        <?php esc_html_e('Share', 'service-finder'); ?>
        </a></li>
      <?php } ?>
      <?php if($service_finder_options['digg']){ ?>
      <li><a class="sf-digg" onclick="javascript:window.open('http://www.digg.com/submit?url=<?php echo urlencode(esc_url(get_permalink($jobid))) ?>', '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="javascript:;"> <i class="fa fa-digg"></i>
        <?php esc_html_e('Share', 'service-finder'); ?>
        </a></li>
      <?php } ?>
    </ul>
  	<?php } ?>
	<?php
}

function service_finder_get_direction($post){
$jobid = $post->ID;
$location = get_post_meta($jobid,'_job_location',true);

if(!empty($location)){
echo '<a class="sf-btn-large2" href="https://maps.google.com/maps?saddr=&daddr='.esc_attr($location).'" target="_blank">'.esc_html__('Get Directions', 'service-finder').' <i class="feather-map-pin"></i></a>';
}

}

/*Send notification on job published*/
function service_finder_fn_save_post_job_listing( $ID, $post ) {
	global $wpdb, $service_finder_Tables, $service_finder_options;
	
	// bail out if this is an autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
 
    // bail out if this is not an event item
    if ( 'job_listing' !== $post->post_type ) {
        return;
    }
	
	if(!empty($_POST['jobgalleryattachmentid'])){
		$gallery_ids = implode(',',$_POST['jobgalleryattachmentid']);
		update_post_meta($ID,'gallery_ids',$gallery_ids);
	}
}
add_action( 'save_post', 'service_finder_fn_save_post_job_listing', 10, 2 );
<?php
/**
 * Job Submission Form
 */
if ( ! defined( 'ABSPATH' ) ) exit;

global $job_manager, $service_finder_Params;
$current_user = wp_get_current_user(); 
$service_finder_options = get_option('service_finder_options');
$url = str_replace('/','\/',$service_finder_Params['homeUrl']);
$adminajaxurl = str_replace('/','\/',admin_url('admin-ajax.php'));
$availablelimit = '';
if(class_exists('service_finder_booking_plugin')) {
$availablelimit = service_finder_get_avl_job_limits($current_user->ID);
}

$jobpostingtype = (!empty($service_finder_options['job-posting-type'])) ? esc_html($service_finder_options['job-posting-type']) : '';

if(service_finder_UserRole($current_user->ID) == 'Customer' || service_finder_UserRole($current_user->ID) == 'administrator' || !is_user_logged_in()){
if($jobpostingtype == 'free' || ($jobpostingtype == 'paid' && $availablelimit > 0 && is_user_logged_in()) || ($jobpostingtype == 'paid' && !is_user_logged_in())){
?>
<form action="<?php echo esc_url( $action ); ?>" method="post" id="submit-job-form" class="job-manager-form" enctype="multipart/form-data">

	<?php do_action( 'submit_job_form_start' ); ?>

	<?php if ( apply_filters( 'submit_job_form_show_signin', true ) ) : ?>

		<?php get_job_manager_template( 'account-signin.php' ); ?>

	<?php endif; ?>

	<?php if ( job_manager_user_can_post_job() || job_manager_user_can_edit_job( $job_id ) ) : ?>

		<!-- Job Information Fields -->
		<?php do_action( 'submit_job_form_job_fields_start' ); ?>

		<?php foreach ( $job_fields as $key => $field ) : 
		$fieldreq = (isset($field['required'])) ? $field['required'] : '';
		$fieldtype = (isset($field['type'])) ? $field['type'] : '';
		?>
			<fieldset class="fieldset-<?php echo esc_attr( $key ); ?>">
				<label for="<?php echo esc_attr( $key ); ?>"><?php echo esc_html($field['label']) . apply_filters( 'submit_job_form_required_label', $fieldreq ? '' : ' <small>' . __( '(optional)', 'service-finder' ) . '</small>', $field ); ?></label>
				<div class="field <?php echo sanitize_html_class(($fieldreq) ? 'required-field' : ''); ?>">
					<?php get_job_manager_template( 'form-fields/' . $fieldtype . '-field.php', array( 'key' => $key, 'field' => $field ) ); ?>
				</div>
			</fieldset>
		<?php endforeach; ?>

		<?php do_action( 'submit_job_form_job_fields_end' ); ?>

		<!-- Company Information Fields -->
		<?php if ( $company_fields ) : ?>
			<h2><?php _e( 'Company Details', 'service-finder' ); ?></h2>

			<?php do_action( 'submit_job_form_company_fields_start' ); ?>

			<?php foreach ( $company_fields as $key => $field ) : 
			$fieldreq = (isset($field['required'])) ? $field['required'] : '';
			$fieldtype = (isset($field['type'])) ? $field['type'] : '';
			?>
				<fieldset class="fieldset-<?php echo esc_attr( $key ); ?>">
					<label for="<?php echo esc_attr( $key ); ?>"><?php echo esc_html($field['label']) . apply_filters( 'submit_job_form_required_label', $fieldreq ? '' : ' <small>' . __( '(optional)', 'service-finder' ) . '</small>', $field ); ?></label>
					<div class="field <?php echo sanitize_html_class($fieldreq ? 'required-field' : ''); ?>">
						<?php get_job_manager_template( 'form-fields/' . $fieldtype . '-field.php', array( 'key' => $key, 'field' => $field ) ); ?>
					</div>
				</fieldset>
			<?php endforeach; ?>

			<?php do_action( 'submit_job_form_company_fields_end' ); ?>
		<?php endif; ?>
        
        <?php
        if(class_exists('service_finder_booking_plugin')) {
		$maxupload = 10;
		?>
		<div class="col-md-12 job-gallery-wrap">
          <div class="rwmb-field rwmb-plupload_image-wrapper">
            <div class="rwmb-input">
              <ul class="rwmb-images rwmb-uploaded" data-field_id="jobgallery" data-delete_nonce="" data-reorder_nonce="" data-force_delete="0" data-max_file_uploads="<?php echo esc_attr($maxupload); ?>">
              <?php
               $jobaction = service_finder_get_data($_REQUEST,'action');
			  $edit_job_id = service_finder_get_data($_REQUEST,'job_id');
			  if(($jobaction == 'edit' || isset($_REQUEST['edit_job'])) && $edit_job_id > 0){
			 		  $gallery_ids = get_post_meta($edit_job_id,'gallery_ids',true);
					  if(!empty($gallery_ids)){
						$gallery_ids = explode(',',$gallery_ids);
						
						$totalimages = count($gallery_ids);
						if($totalimages >= $maxupload){
						$hiddenclass = 'hidden';
						}else{
						$hiddenclass = '';
						}
						
						if(!empty($gallery_ids)){
								foreach($gallery_ids as $imageid){
									$src  = wp_get_attachment_image_src( $imageid, 'thumbnail' );
									$src  = $src[0];
									$i18n_delete = apply_filters( 'rwmb_image_delete_string', _x( 'Delete', 'image upload', 'service-finder' ) );
									
									$html = sprintf('<li id="item_%s">
									<img src="%s" />
									<div class="rwmb-image-bar">
										<a title="%s" class="rwmb-delete-file" href="javascript:;" data-attachment_id="%s">&times;</a>
										<input type="hidden" name="jobgalleryattachmentid[]" value="%s">
									</div>
								</li>',
								esc_attr($imageid),
								esc_url($src),
								esc_attr($i18n_delete), esc_attr($imageid),
								esc_attr($imageid)
								);
									print_r($html);	
							}
						}
					  }
			  }
			  ?>
              </ul>
              <div id="jobgallery-dragdrop" class="RWMB-drag-drop drag-drop hide-if-no-js new-files <?php echo esc_attr($hiddenclass); ?>" data-upload_nonce="1f7575f6fa" data-js_options="{&quot;runtimes&quot;:&quot;html5,silverlight,flash,html4&quot;,&quot;file_data_name&quot;:&quot;async-upload&quot;,&quot;browse_button&quot;:&quot;jobgallery-browse-button&quot;,&quot;drop_element&quot;:&quot;jobgallery-dragdrop&quot;,&quot;multiple_queues&quot;:true,&quot;max_file_size&quot;:&quot;8388608b&quot;,&quot;url&quot;:&quot;<?php echo esc_url($adminajaxurl); ?>&quot;,&quot;flash_swf_url&quot;:&quot;<?php echo esc_url($url); ?>wp-includes\/js\/plupload\/plupload.flash.swf&quot;,&quot;silverlight_xap_url&quot;:&quot;<?php echo esc_url($url); ?>wp-includes\/js\/plupload\/plupload.silverlight.xap&quot;,&quot;multipart&quot;:true,&quot;urlstream_upload&quot;:true,&quot;filters&quot;:[{&quot;title&quot;:&quot;Allowed Image Files&quot;,&quot;extensions&quot;:&quot;jpg,jpeg,gif,png&quot;}],&quot;multipart_params&quot;:{&quot;field_id&quot;:&quot;jobgallery&quot;,&quot;action&quot;:&quot;jobgallery_upload&quot;}}">
                <div class = "drag-drop-inside text-center">
                  <p class="drag-drop-info">
                    <?php esc_html_e('Drop images here', 'service-finder'); ?>
                  </p>
                  <p><?php esc_html_e('or', 'service-finder'); ?></p>
                  <p class="drag-drop-buttons">
                    <input id="jobgallery-browse-button" type="button" value="<?php esc_attr_e('Select Files', 'service-finder'); ?>" class="button btn btn-default" />
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
		<?php
		}
		?>

		<?php do_action( 'submit_job_form_end' ); ?>

		<p>
			<input type="hidden" name="job_manager_form" value="<?php echo esc_attr($form); ?>" />
			<input type="hidden" name="job_id" value="<?php echo esc_attr( $job_id ); ?>" />
			<input type="hidden" name="step" value="<?php echo esc_attr( $step ); ?>" />
			<input type="submit" name="submit_job" class="button" value="<?php echo esc_attr( $submit_button_text ); ?>" />
		</p>

	<?php else : ?>

		<?php do_action( 'submit_job_form_disabled' ); ?>

	<?php endif; ?>
</form>
<?php }else{
$account_url = '';
if(class_exists('service_finder_booking_plugin')) {
$account_url = service_finder_get_url_by_shortcode('[service_finder_my_account]');
}
$planpage = add_query_arg( array('action' => 'job-post-plans'), $account_url );

echo esc_html__('You do not have available connects.', 'service-finder'); 
echo esc_html__(' Please ', 'service-finder'); 
echo '<a href="'.esc_url($planpage).'" target="_blank"><u>'.esc_html__('click here ', 'service-finder').'</u></a>'; 
echo esc_html__('to upgrade your plan.', 'service-finder'); 
}
}else{
echo esc_html__('You are not allowed to post a job.', 'service-finder'); 
}
?>

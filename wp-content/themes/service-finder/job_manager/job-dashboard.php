<?php global $current_user, $wpdb, $service_finder_Tables, $service_finder_options; ?>
<?php
wp_add_inline_script( 'service_finder-js-job-apply', '/*Declare global variable*/
var user_id = "'.$current_user->ID.'";', 'after' );
?>
<div class="profile-form-bx">
<div id="job-manager-job-dashboard">
    <?php if(is_user_logged_in() && service_finder_getUserRole($current_user->ID) == 'Customer'){ ?>
    <p><?php esc_html_e( 'Your listings are shown in the table below.', 'service-finder' ); ?></p>
	<table class="job-manager-jobs table table-striped">
		<thead>
			<tr>
				<?php foreach ( $job_dashboard_columns as $key => $column ) : ?>
					<th class="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $column ); ?></th>
				<?php endforeach; ?>
			</tr>
		</thead>
		<tbody>
			<?php if ( ! $jobs ) : ?>
				<tr>
					<td colspan="6"><?php _e( 'You do not have any active listings.', 'service-finder' ); ?></td>
				</tr>
			<?php else : ?>
				<?php foreach ( $jobs as $job ) : ?>
					<tr>
						<?php foreach ( $job_dashboard_columns as $key => $column ) : ?>
							<td class="<?php echo esc_attr( $key ); ?>">
								<?php if ('job_title' === $key ) : ?>
									<?php if ( $job->post_status == 'publish' ) : ?>
										<a href="<?php echo get_permalink( $job->ID ); ?>"><?php echo esc_html($job->post_title); ?></a>
									<?php else : ?>
										<?php echo esc_html($job->post_title); ?> <small>(<?php the_job_status( $job ); ?>)</small>
									<?php endif; ?>
									<ul class="job-dashboard-actions">
										<?php
											$actions = array();
											switch ( $job->post_status ) {
												case 'publish' :
													$actions['edit'] = array( 'label' => __( 'Edit', 'service-finder' ), 'nonce' => false );
													break;
												case 'expired' :
													if ( job_manager_get_permalink( 'submit_job_form' ) ) {
														$actions['relist'] = array( 'label' => __( 'Relist', 'service-finder' ), 'nonce' => true );
													}
													break;
												case 'pending_payment' :
												case 'pending' :
													if ( job_manager_user_can_edit_pending_submissions() ) {
														$actions['edit'] = array( 'label' => __( 'Edit', 'service-finder' ), 'nonce' => false );
													}
												break;
											}

											$actions['delete'] = array( 'label' => __( 'Delete', 'service-finder' ), 'nonce' => true );
											$actions           = apply_filters( 'job_manager_my_job_actions', $actions, $job );

											foreach ( $actions as $action => $value ) {
												$action_url = add_query_arg( array( 'action' => $action, 'job_id' => $job->ID ) );
												if ( $value['nonce'] ) {
													$action_url = wp_nonce_url( $action_url, 'job_manager_my_job_actions' );
												}
												echo '<li><a href="' . esc_url( $action_url ) . '" class="job-dashboard-action-' . esc_attr( $action ) . '">' . esc_html( $value['label'] ) . '</a></li>';
											}
										?>
									</ul>
								<?php elseif ('date' === $key ) : ?>
									<?php echo date_i18n( get_option( 'date_format' ), strtotime( $job->post_date ) ); ?>
								<?php elseif ('expires' === $key ) : ?>
									<?php echo esc_html($job->_job_expires ? date_i18n( get_option( 'date_format' ), strtotime( $job->_job_expires ) ) : '&ndash;'); ?>
                                <?php elseif ('number_of_applicants' === $key ) : ?>
									<?php 
									if(service_finder_get_number_of_applicants($job->ID) > 0){
									$jobapplicantspage = service_finder_get_url_by_shortcode('service_finder_job_applicants');
									$jobapplicantspage = add_query_arg( array('jobid' => $job->ID ),$jobapplicantspage );
									echo '<a href="'.esc_url($jobapplicantspage).'" class="btn-linking" target="_blank">' . service_finder_get_number_of_applicants($job->ID) . '</a>'; 
									}else{
									echo '<a href="javascript:;">' . service_finder_get_number_of_applicants($job->ID) . '</a>'; 						
									}
									?>   
                                <?php elseif ('action' === $key ) : ?>
									<?php
									$option = '';
									$bookingamount = '';
									$bookingproviderid = '';
									$bookingid = '';
									$bookingpaypal_paykey = '';
									
									$bookingrow = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$service_finder_Tables->bookings.' WHERE `jobid` = %d',$job->ID));
									if(!empty($bookingrow)){
									$payment_methods = (!empty($service_finder_options['payment-methods'])) ? $service_finder_options['payment-methods'] : '';
									$feedback = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$service_finder_Tables->feedback.' WHERE `booking_id` = %d',$bookingrow->id));
									
									if($bookingrow->charge_admin_fee_from == 'provider'){
										$bookingamount = $bookingrow->total - $bookingrow->adminfee;
									}elseif($bookingrow->charge_admin_fee_from == 'customer'){
										$bookingamount = $bookingrow->total;
									}else{
										$bookingamount = $bookingrow->total;
									}
									
									if($bookingrow->status != "Cancel" && $bookingrow->status != "Completed"){
									if($bookingrow->paid_to_provider == 'pending' && $bookingrow->paypal_paykey != "" && $payment_methods['paypal-adaptive']){
										//$option .= '<option value="completebookingandpay">'.esc_html__('Mark as Complete', 'service-finder').'</option>';
										$option .= '<option value="completebooking">'.esc_html__('Mark as Complete', 'service-finder').'</option>';
									}elseif($bookingrow->paid_to_provider == 'pending' && $bookingrow->stripe_token != "" && $payment_methods['stripe']){
										//$option .= '<option value="completebookingandpayviastripe">'.esc_html__('Mark as Complete', 'service-finder').'</option>';
										$option .= '<option value="completebooking">'.esc_html__('Mark as Complete', 'service-finder').'</option>';
									}else{
										$option .= '<option value="completebooking">'.esc_html__('Mark as Complete', 'service-finder').'</option>';									
									}
									
									}
									
									if($service_finder_options['review-system'] && $bookingrow->status == 'Completed'){
									if(!empty($feedback)){
									$option .= '<option value="viewfeedback">'.esc_html__('View Feedback', 'service-finder').'</option>';
									}else{
									$option .= '<option value="addfeedback">'.esc_html__('Add Feedback', 'service-finder').'</option>';
									}
									} 
									
									$bookingproviderid = $bookingrow->provider_id;
									$bookingid = $bookingrow->id;
									$bookingpaypal_paykey = $bookingrow->paypal_paykey;
									}
									
									$providerreplacestring = (!empty($service_finder_options['provider-replace-string'])) ? $service_finder_options['provider-replace-string'] : esc_html__('Provider', 'service-finder');
									$jobapplicantspage = service_finder_get_url_by_shortcode('service_finder_job_applicants');
									$jobapplicantsurl = add_query_arg( array('jobid' => $job->ID ),$jobapplicantspage );
									
									if($job->post_status == 'publish'){
									$option .= '<option value="recommendedproviders">'.esc_html__('Recommended', 'service-finder').' '.$providerreplacestring.'</option>';
									}
									
									if($option != ""){
									echo '<select title="'.esc_html__('Select Option', 'service-finder').'" class="jobOptionSelect sf-select-box form-control sf-form-control" data-bid="'.esc_attr($bookingid).'" data-paykey="'.esc_attr($bookingpaypal_paykey).'" data-providerid="'.esc_attr($bookingproviderid).'" data-amount="'.esc_attr($bookingamount).'" data-recommendedproviders="'.esc_attr($jobapplicantsurl).'" >
											<option value="">'.esc_html__('Select Option', 'service-finder').'</option>
											'.$option.'
										  </select>';
									}else{
									echo '-';
									}	  
									?>        
								<?php elseif ('filled' === $key ) : ?>
									<?php echo is_position_filled( $job ) ? '&#10004;' : '&ndash;'; ?>
								<?php else : ?>
									<?php do_action( 'job_manager_job_dashboard_column_' . $key, $job ); ?>
								<?php endif; ?>
							</td>
						<?php endforeach; ?>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	<?php get_job_manager_template( 'pagination.php', array( 'max_num_pages' => $max_num_pages ) ); ?>
    <?php }else{ ?>
    <p><?php esc_html_e( 'Sorry you do not have access to this page.', 'service-finder' ); ?></p>
    <?php } ?>
</div>
<div id="job-manager-job-applicants" style="display:none">
<div class="listing-grid-box sf-listing-grid-4 equal-col-outer">
<div class="row">
<div class="col-md-12">
<a href="javascript:;" class="gotodashboard btn btn-primary"><?php esc_html_e('Back','service-finder')?></a>
</div>
</div>
<div class="row" id="applicants-listing">
</div>            
<br class="clear">
</div>            
</div>
</div>
<!--Add feedback form for bookings-->
<form method="post" class="add-feedback default-hidden" id="addFeedback">
  <div class="clearfix row input_fields_wrap">
    <?php 
	$ratingstyle = (!empty($service_finder_options['rating-style'])) ? $service_finder_options['rating-style'] : '';
		
	if($ratingstyle == 'custom-rating'){ 
	echo '<div id="customrating">';
	echo '</div>';
	}else{
	echo '<div class="col-md-12">
		  <div class="form-group rating_bx">
			<input id="comment-rating" name="comment-rating" value="" type="number" class="rating" min=0 max=5 step=0.5 data-size="sm">
		  </div>
		</div>';
	}
	?>
    <div class="col-md-12">
      <div class="form-group">
        <textarea name="comment" id="comment" class="form-control" rows="" cols="4" placeholder="<?php esc_attr_e('Enter Some Comments', 'service-finder'); ?>"></textarea>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">
    <?php esc_html_e('Cancel', 'service-finder'); ?>
    </button>
    <input type="submit" class="btn btn-primary" name="add-feedback" value="<?php esc_attr_e('Submit', 'service-finder'); ?>" />
  </div>
</form>
<!--View feedback for bookings-->
<form method="post" class="view-feedback default-hidden" id="viewFeedback">
  <div class="clearfix row input_fields_wrap">
    <?php 
	$ratingstyle = (!empty($service_finder_options['rating-style'])) ? $service_finder_options['rating-style'] : '';
		
	if($ratingstyle == 'custom-rating'){ 
	echo '<div id="displaycustomrating">';
	echo '</div>';
	}else{
	echo '<div class="col-md-12">
		  <div class="form-group">
			<input id="show-comment-rating" value="" type="number" class="rating" min=0 max=5 step=0.5 data-size="sm" disabled="disabled">
		  </div>
		</div>';
	}
	?>
    <div class="col-md-12">
      <div class="form-group">
        <p id="showcomment"></p>
      </div>
    </div>
  </div>
</form>

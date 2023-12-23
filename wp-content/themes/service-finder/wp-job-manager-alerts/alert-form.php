<?php global $current_user; ?>
<?php if(is_user_logged_in() && service_finder_getUserRole($current_user->ID) == 'Provider'){ 
$userCap = service_finder_get_capability($current_user->ID);
if(!empty($userCap)){
if(in_array('job-alerts',$userCap)){
?>
<form method="post" class="job-manager-form">
	<fieldset>
		<label for="alert_name"><?php _e( 'Alert Name', 'service-finder' ); ?></label>
		<div class="field">
			<input type="text" name="alert_name" value="<?php echo esc_attr( $alert_name ); ?>" id="alert_name" class="input-text" placeholder="<?php _e( 'Enter a name for your alert', 'service-finder' ); ?>" />
		</div>
	</fieldset>
	<fieldset>
		<label for="alert_keyword"><?php _e( 'Keyword', 'service-finder' ); ?></label>
		<div class="field">
			<input type="text" name="alert_keyword" value="<?php echo esc_attr( $alert_keyword ); ?>" id="alert_keyword" class="input-text" placeholder="<?php _e( 'Optionally add a keyword to match jobs against', 'service-finder' ); ?>" />
		</div>
	</fieldset>
	<?php if ( taxonomy_exists( 'job_listing_region' ) && wp_count_terms( 'job_listing_region' ) > 0 ) : ?>
		<fieldset>
			<label for="alert_regions"><?php _e( 'Job Region', 'service-finder' ); ?></label>
			<div class="field">
				<?php
					job_manager_dropdown_categories( array(
						'show_option_all' => false,
						'hierarchical'    => true,
						'orderby'         => 'name',
						'taxonomy'        => 'job_listing_region',
						'name'            => 'alert_regions',
						'class'           => 'alert_regions job-manager-chosen-select',
						'hide_empty'      => 0,
						'selected'        => $alert_id ? wp_get_post_terms( $alert_id, 'job_listing_region', array( 'fields' => 'ids' ) ) : $alert_region,
						'placeholder'     => __( 'Any region', 'service-finder' )
					) );
				?>
			</div>
		</fieldset>
	<?php else : ?>
		<fieldset>
			<label for="alert_location"><?php _e( 'Location', 'service-finder' ); ?></label>
			<div class="field">
				<input type="text" name="alert_location" value="<?php echo esc_attr( $alert_location ); ?>" id="alert_location" class="input-text" placeholder="<?php _e( 'Optionally define a location to search against', 'service-finder' ); ?>" />
			</div>
		</fieldset>
	<?php endif; ?>
	<?php if ( get_option( 'job_manager_enable_categories' ) && wp_count_terms( 'job_listing_category' ) > 0 ) : ?>
		<fieldset>
			<label for="alert_cats"><?php _e( 'Categories', 'service-finder' ); ?></label>
			<div class="field">
				<?php
					wp_enqueue_script( 'wp-job-manager-term-multiselect' );

					job_manager_dropdown_categories( array(
						'taxonomy'     => 'job_listing_category',
						'hierarchical' => 1,
						'name'         => 'alert_cats',
						'orderby'      => 'name',
						'selected'     => $alert_cats,
						'hide_empty'   => false,
						'placeholder'  => __( 'Any category', 'service-finder' )
					) );
				?>
			</div>
		</fieldset>
	<?php endif; ?>
	
	<fieldset>
		<label for="alert_job_type"><?php _e( 'Job Type', 'service-finder' ); ?></label>
		<div class="field">
			<select name="alert_job_type[]" data-placeholder="<?php _e( 'Any job type', 'service-finder' ); ?>" id="alert_job_type" multiple="multiple" class="job-manager-chosen-select">
				<?php
					$terms = get_job_listing_types();
					foreach ( $terms as $term )
						echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( in_array( $term->slug, $alert_job_type ), true, false ) . '>' . esc_html( $term->name ) . '</option>';
				?>
			</select>
		</div>
	</fieldset>
	<fieldset>
		<label for="alert_frequency"><?php _e( 'Email Frequency', 'service-finder' ); ?></label>
		<div class="field">
			<select name="alert_frequency" id="alert_frequency" class="sf-select-box form-control sf-form-control">
				<?php foreach ( WP_Job_Manager_Alerts_Notifier::get_alert_schedules() as $key => $schedule ) : ?>
					<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $alert_frequency, $key ); ?>><?php echo esc_html( $schedule['display'] ); ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</fieldset>
	<p>
		<?php wp_nonce_field( 'job_manager_alert_actions' ); ?>
		<input type="hidden" name="alert_id" value="<?php echo absint( $alert_id ); ?>" />
		<input type="submit" name="submit-job-alert" value="<?php _e( 'Save alert', 'service-finder' ); ?>" />
	</p>
</form>
<?php }else{ ?>
<div class="alert alert-danger"><?php esc_html_e( 'Sorry you do not have access to this page.', 'service-finder' ); ?></div>
<?php } ?>
<?php }else{ ?>
<div class="alert alert-danger"><?php esc_html_e( 'Sorry you do not have access to this page.', 'service-finder' ); ?></div>
<?php } ?>
<?php }else{ ?>
<div class="alert alert-danger"><?php esc_html_e( 'Sorry you do not have access to this page.', 'service-finder' ); ?></div>
<?php } ?>


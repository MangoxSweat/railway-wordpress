<?php global $current_user; ?>
<?php 
if(get_option('timezone_string') != ""){
date_default_timezone_set(get_option('timezone_string'));
}
?>
<?php if(is_user_logged_in() && service_finder_getUserRole($current_user->ID) == 'Provider'){ 
$userCap = service_finder_get_capability($current_user->ID);
if(!empty($userCap)){
if(in_array('job-alerts',$userCap)){
?>
<div id="job-manager-alerts">
	<p><?php printf( __( 'Your job alerts are shown in the table below and will be emailed to %s.', 'service-finder' ), $user->user_email ); ?></p>
	<table class="job-manager-alerts">
		<thead>
			<tr>
				<th><?php esc_html_e( 'Alert Name', 'service-finder' ); ?></th>
				<th><?php esc_html_e( 'Keywords', 'service-finder' ); ?></th>
				<?php if ( get_option( 'job_manager_enable_categories' ) && wp_count_terms( 'job_listing_category' ) > 0 ) : ?>
					<th><?php esc_html_e( 'Categories', 'service-finder' ); ?></th>
				<?php endif; ?>
				<?php if ( taxonomy_exists( 'job_listing_tag' ) ) : ?>
					<th><?php esc_html_e( 'Tags', 'service-finder' ); ?></th>
				<?php endif; ?>
				<th><?php esc_html_e( 'Location', 'service-finder' ); ?></th>
				<th><?php esc_html_e( 'Frequency', 'service-finder' ); ?></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="6">
					<a href="<?php echo remove_query_arg( 'updated', add_query_arg( 'action', 'add_alert' ) ); ?>"><?php _e( 'Add alert', 'service-finder' ); ?></a>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php foreach ( $alerts as $alert ) : ?>
				<tr class="alert-<?php echo sanitize_html_class(($alert->post_status === 'draft') ? 'disabled' : 'enabled'); ?>">
					<td>
						<?php echo esc_html( $alert->post_title ); ?>
						<ul class="job-alert-actions">
							<?php
								$actions = apply_filters( 'job_manager_alert_actions', array(
									'view' => array(
										'label' => esc_html__( 'Results', 'service-finder' ),
										'nonce' => false
									),
									'email' => array(
										'label' => esc_html__( 'Send&nbsp;Now', 'service-finder' ),
										'nonce' => true
									),
									'edit' => array(
										'label' => esc_html__( 'Edit', 'service-finder' ),
										'nonce' => false
									),
									'toggle_status' => array(
										'label' => $alert->post_status == 'draft' ? __( 'Enable', 'service-finder' ) : __( 'Disable', 'service-finder' ),
										'nonce' => true
									),
									'delete' => array(
										'label' => esc_html__( 'Delete', 'service-finder' ),
										'nonce' => true
									)
								), $alert );

								foreach ( $actions as $action => $value ) {
									$action_url = remove_query_arg( 'updated', add_query_arg( array( 'action' => $action, 'alert_id' => $alert->ID ) ) );

									if ( $value['nonce'] )
										$action_url = wp_nonce_url( $action_url, 'job_manager_alert_actions' );

									echo '<li><a href="' . $action_url . '" class="job-alerts-action-' . $action . '">' . $value['label'] . '</a></li>';
								}
							?>
						</ul>
					</td>
					<td class="alert_keyword"><?php
						if ( $value = get_post_meta( $alert->ID, 'alert_keyword', true ) )
							echo esc_html( $value );
						else
							echo '&ndash;';
					?></td>
					<?php if ( get_option( 'job_manager_enable_categories' ) && wp_count_terms( 'job_listing_category' ) > 0 ) : ?>
						<td class="alert_category"><?php
							$terms = wp_get_post_terms( $alert->ID, 'job_listing_category', array( 'fields' => 'names' ) );
							echo esc_html($terms ? implode( ', ', $terms ) : '&ndash;');
						?></td>
					<?php endif; ?>
					<?php if ( taxonomy_exists( 'job_listing_tag' ) ) : ?>
						<td class="alert_tag"><?php
							$terms = wp_get_post_terms( $alert->ID, 'job_listing_tag', array( 'fields' => 'names' ) );
							echo esc_html($terms ? implode( ', ', $terms ) : '&ndash;');
						?></td>
					<?php endif; ?>
					<td class="alert_location"><?php
						if ( taxonomy_exists( 'job_listing_region' ) && wp_count_terms( 'job_listing_region' ) > 0 ) {
							$terms = wp_get_post_terms( $alert->ID, 'job_listing_region', array( 'fields' => 'names' ) );
							echo esc_html($terms ? implode( ', ', $terms )  : '&ndash;');
						} else {
							$value = get_post_meta( $alert->ID, 'alert_location', true );
							echo esc_html($value ? $value : '&ndash;');
						}
					?></td>
					<td class="alert_frequency"><?php
						$schedules = WP_Job_Manager_Alerts_Notifier::get_alert_schedules();
						$freq      = get_post_meta( $alert->ID, 'alert_frequency', true );

						if ( ! empty( $schedules[ $freq ] ) ) {
							echo esc_html( $schedules[ $freq ]['display'] );
						}

						echo '<small>' . sprintf( __( 'Next: %s at %s', 'service-finder' ), date_i18n( get_option( 'date_format' ), wp_next_scheduled( 'job-manager-alert', array( $alert->ID ) ) ),  date_i18n( get_option( 'time_format' ), wp_next_scheduled( 'job-manager-alert', array( $alert->ID ) ) ) ) . '</small>';
					?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php }else{ ?>
<div class="alert alert-danger"><?php esc_html_e( 'Sorry you do not have access to this page.', 'service-finder' ); ?></div>
<?php } ?>
<?php }else{ ?>
<div class="alert alert-danger"><?php esc_html_e( 'Sorry you do not have access to this page.', 'service-finder' ); ?></div>
<?php } ?>
<?php }else{ ?>
<div class="alert alert-danger"><?php esc_html_e( 'Sorry you do not have access to this page.', 'service-finder' ); ?></div>
<?php } ?>
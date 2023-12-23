<form method="post" id="job_preview" action="<?php echo esc_url( $form->get_action() ); ?>">
    <?php
	/**
	 * Fires at the top of the preview job form.
	 *
	 * @since 1.32.2
	 */
	do_action( 'preview_job_form_start' );
	?>
    <div class="job_listing_preview_title clearfix">
        <input type="submit" name="continue" id="job_preview_submit_button" class="button btn btn-primary job-manager-button-submit-listing" value="<?php echo apply_filters( 'submit_job_step_preview_submit_text', __( 'Submit Listing', 'service-finder' ) ); ?>" />
        <input type="submit" name="edit_job" class="button job-manager-button-edit-listing btn btn-warning" value="<?php _e( 'Edit listing', 'service-finder' ); ?>" />
        <h2><?php _e( 'Preview', 'service-finder' ); ?></h2>
    </div>
    <div class="job_listing_preview">

        <?php get_job_manager_template_part( 'content-single', 'job_listing' ); ?>

        <input type="hidden" name="job_id" value="<?php echo esc_attr( $form->get_job_id() ); ?>" />
        <input type="hidden" name="step" value="<?php echo esc_attr( $form->get_step() ); ?>" />
        <input type="hidden" name="job_manager_form" value="<?php echo esc_attr($form->get_form_name()); ?>" />
    </div>
    <?php
	/**
	 * Fires at the bottom of the preview job form.
	 *
	 * @since 1.32.2
	 */
	do_action( 'preview_job_form_end' );
	?>
</form>

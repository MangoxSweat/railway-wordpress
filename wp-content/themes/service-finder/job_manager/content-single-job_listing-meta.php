<?php

/**

 * Single view Job meta box

 *

 * Hooked into single_job_listing_start priority 20

 *

 * @since  1.14.0

 */

global $post;

if(get_option('timezone_string') != ""){

date_default_timezone_set(get_option('timezone_string'));

}

do_action( 'single_job_listing_meta_before' ); ?>



<?php if ( is_position_filled() ) : ?>

<div class="job-position-field"><strong><?php _e( 'This position has been filled', 'service-finder' ); ?></strong></div>

<?php elseif ( ! candidates_can_apply() && 'preview' !== $post->post_status ) : ?>

<div class="job-position-field"><strong class="listing-expired"><?php _e( 'Applications have closed', 'service-finder' ); ?></strong></div>

<?php endif; ?>



<ul class="job-listing-meta meta">

	<?php do_action( 'single_job_listing_meta_start' ); ?>



	<?php if ( get_option( 'job_manager_enable_types' ) ) { ?>

		<?php if ( function_exists( 'wpjm_get_the_job_types' ) ){ ?>

		<?php $types = wpjm_get_the_job_types(); ?>

		<?php if ( ! empty( $types ) ) : foreach ( $types as $type ) : ?>



			<li class="job-type <?php echo esc_attr( sanitize_title( $type->slug ) ); ?>" itemprop="employmentType"><span><?php echo esc_html__( 'Job Type', 'service-finder' ); ?>:</span> <span><?php echo esc_html( $type->name ); ?></span></li>



		<?php endforeach; endif; ?>

        <?php } ?>

	<?php } ?>

	<?php $categories = wp_get_post_terms( $post->ID, 'job_listing_category'); ?>

    <?php if(!empty($categories)){

		foreach($categories as $category){

			$catname[] = (!empty($category->name)) ? $category->name : '';

		}

	?>

	<li class="location" itemprop="jobLocation"><span><?php echo esc_html__( 'Categories', 'service-finder' ); ?>:</span> <span><?php echo implode(',', $catname ); ?></span></li>

    <?php } ?>

    

    <li class="location" itemprop="jobLocation"><span><?php echo esc_html__( 'Location', 'service-finder' ); ?>:</span> <span><?php the_job_location(); ?></span></li>



	<li class="date-posted" itemprop="datePosted"><span><?php echo esc_html__( 'Posted On', 'service-finder' ); ?>:</span> <span><?php printf( __( '%s ago', 'service-finder' ), human_time_diff( get_post_time( 'U' ), current_time('timestamp')) ); ?></span></li>



	<?php do_action( 'single_job_listing_meta_end' ); ?>

</ul>



<?php do_action( 'single_job_listing_meta_after' ); ?>


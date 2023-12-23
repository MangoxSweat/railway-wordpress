<?php
/**
 * Filters in `[jobs]` shortcode.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-filters.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @version     1.21.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wp_enqueue_script( 'wp-job-manager-ajax-filters' );

do_action( 'job_manager_job_filters_before', $atts );
?>
<div class="col-md-4">
    <form class="job_filters">
    <?php do_action( 'job_manager_job_filters_start', $atts ); ?>
    <aside  class="side-bar sf-rounded-sidebar">
    
        <div class="sf-job-sidebar-blocks">
            <h4 class="sf-title"><?php esc_html_e('Find a Job', 'service-finder') ?></h4>
            <div class="form-group">
                <input type="text" name="search_keywords" class="form-control" id="search_keywords" placeholder="<?php esc_attr_e( 'Search Keywords', 'service-finder' ); ?>" value="<?php echo esc_attr( $keywords ); ?>" />
            </div>
        </div>

        <div class="sf-job-sidebar-blocks">
            <h4 class="sf-title"><?php esc_html_e('Location', 'service-finder') ?></h4>
            <div class="form-group sf-location-ring-wrap">
                <input type="text" name="search_location" id="search_location" class="form-control" placeholder="<?php esc_attr_e( 'Location', 'service-finder' ); ?>" value="<?php echo esc_attr( $location ); ?>" />
                <a href="javascript:;" class="sf-location-ring"></a>
            </div>

        </div>
        
        <?php if ( $categories ) : ?>
			<?php foreach ( $categories as $category ) : ?>
                <input type="hidden" name="search_categories[]" value="<?php echo sanitize_title( $category ); ?>" />
            <?php endforeach; ?>
        <?php elseif ( $show_categories && ! is_tax( 'job_listing_category' ) && get_terms( 'job_listing_category' ) ) : ?>
            <div class="sf-job-sidebar-blocks">
                <h4 class="sf-title"><?php esc_html_e('Category', 'service-finder') ?></h4>
                
                <div class="category-select">
                    <?php if ( $show_category_multiselect ) : ?>
                    <?php job_manager_dropdown_categories( array( 'taxonomy' => 'job_listing_category', 'hierarchical' => 1, 'name' => 'search_categories', 'orderby' => 'name', 'selected' => $selected_category, 'hide_empty' => false ) ); ?>
                <?php else : ?>
                    <?php job_manager_dropdown_categories( array( 'taxonomy' => 'job_listing_category', 'hierarchical' => 1, 'show_option_all' => esc_html__( 'Any category', 'service-finder' ), 'name' => 'search_categories', 'orderby' => 'name', 'selected' => $selected_category, 'multiple' => false ) ); ?>
                <?php endif; ?>
                </div>
                
            </div>
        <?php endif; ?>
        
        <?php do_action( 'job_manager_job_filters_search_jobs_end', $atts ); ?>
        
        <?php do_action( 'job_manager_job_filters_end', $atts ); ?>

    </aside>
    </form>
    <?php do_action( 'job_manager_job_filters_after', $atts ); ?>
</div>
<?php
/*****************************************************************************
*
*	copyright(c) - aonetheme.com - Service Finder Team
*	More Info: http://aonetheme.com/
*	Coder: Service Finder Team
*	Email: contact@aonetheme.com
*
******************************************************************************/

get_header(); 

global $post, $service_finder_options;
if(get_option('timezone_string') != ""){
date_default_timezone_set(get_option('timezone_string'));
}

$url = str_replace('/','\/',$service_finder_Params['homeUrl']);
$adminajaxurl = str_replace('/','\/',admin_url('admin-ajax.php'));

/*For SF Uploader*/
wp_enqueue_style('image-upload', plugins_url('/sf-booking/') . '/assets/manage-uploads/image-upload.css','',null);
wp_enqueue_style('image-manager', plugins_url('/sf-booking/') . '/assets/manage-uploads/image-manager.css','',null);
wp_enqueue_script('image-manager', plugins_url('/sf-booking/') . '/assets/manage-uploads/image-manager.js', array('jquery') , null, true);
wp_enqueue_script('managefiles', plugins_url('/sf-booking/') . '/assets/manage-uploads/managefiles.js', array('jquery') , null, true);

wp_enqueue_script('plupload', SERVICE_FINDER_ASSESTS_ADMINURL . '/load-scripts.php?c=1&load=plupload&ver=4.3.1', array('jquery') , '4.5.1', true);
?>

<div class="page-content bg-white">
  <div class="sf-job-benner sf-overlay-wrapper">
    <div class="banner-job-row">
      <div class="sf-overlay-main" style="opacity:0;"></div>
      <div class="sf-banner-job-heading-wrap">
        <div class="sf-banner-job-heading-area">
          <div class="sf-banner-job-logo-pic"><?php the_company_logo(); ?></div>
          <h2 class="sf-banner-job-heading-large"><?php the_title(); ?></h2>
          <ul class="sf-banner-job-dutation">
            <li><i class="fa fa-clock-o"></i> <?php echo esc_html__( 'Posted date', 'service-finder' ); ?>: <span class="jobs-timing"><?php printf( __( '%s ago', 'service-finder' ), human_time_diff( get_post_time( 'U' ), current_time('timestamp') ) ); ?></span></li>
            <li><i class="fa fa-hourglass-o"></i> <?php echo esc_html__( 'Expires in', 'service-finder' ); ?>: <span class="jobs-date-label"><?php echo wp_date('F j, Y',strtotime(get_post_meta( $post->ID,'_job_expires',true ))); ?></span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="section-content ">
    <!-- Left & right section start -->
    <div class="container">
      <div class="sf-job-details-fileds sf-job-details-fileds-two">
        <?php do_action( 'single_job_listing_meta_before' ); ?>

		<?php if ( is_position_filled() ) : ?>
        <div class="job-position-field"><strong><?php _e( 'This position has been filled', 'service-finder' ); ?></strong></div>
        <?php elseif ( ! candidates_can_apply() && 'preview' !== $post->post_status ) : ?>
        <div class="job-position-field"><strong class="listing-expired"><?php _e( 'Applications have closed', 'service-finder' ); ?></strong></div>
        <?php endif; ?>
        <ul class="job-listing-meta meta">
          
		  <?php do_action( 'single_job_listing_meta_start' ); ?>
          
		  <?php if(get_post_meta($post->ID,'_job_location',true) != ''){ ?>	
          <li class="location" itemprop="jobLocation"> <span class="job-meta-icon"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/images/job-cin/location.png'); ?>" alt=""/></span>
            <div class="sf-job-meta-info">
              <h5 class="job-meta-title"><?php echo esc_html__( 'Location', 'service-finder' ); ?>:</h5>
              <span class="job-meta-text"><a class="google_map_link" href="https://maps.google.com/maps?saddr=&daddr=<?php echo get_post_meta($post->ID,'_job_location',true) ?>" target="_blank"><?php the_job_location(); ?></a></span> </div>
          </li>
          <?php } ?>
          <?php $cost = get_post_meta( $post->ID, '_job_cost', true ); ?> 	
          <?php if($cost > 0){ ?>
          <li> <span class="job-meta-icon"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/images/job-cin/money.png'); ?>" alt=""/></span>
            <div class="sf-job-meta-info">
              <h5 class="job-meta-title"><?php echo esc_html__( 'Price', 'service-finder' ); ?>:</h5>
              <span class="job-meta-text text-red"><?php echo service_finder_money_format( $cost ); ?></span> </div>
          </li>
          <?php } ?>
          
          <?php if ( get_option( 'job_manager_enable_types' ) ) { ?>
		  <?php if ( function_exists( 'wpjm_get_the_job_types' ) ){ ?>
          <?php $types = wpjm_get_the_job_types(); ?>
          <?php if ( ! empty( $types ) ) : foreach ( $types as $type ) : ?>
    
          <li class="job-type hourly" itemprop="employmentType"> <span class="job-meta-icon"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/images/job-cin/brifcase.png'); ?>" alt=""/></span>
            <div class="sf-job-meta-info">
              <h5 class="job-meta-title"><?php echo esc_html__( 'Job Type', 'service-finder' ); ?>:</h5>
              <span class="job-meta-text"><?php echo esc_html( $type->name ); ?></span> </div>
          </li>
          <?php endforeach; endif; ?>
          <?php } ?>
          <?php } ?>
          
          <?php $categories = wp_get_post_terms( $post->ID, 'job_listing_category'); ?>
		  <?php 
		  $catnamearr = array();
		  if(!empty($categories)){
                foreach($categories as $category){
					$catname = (!empty($category->name)) ? $category->name : '';
					if($catname != ''){
                    $catnamearr[] = (!empty($category->name)) ? $category->name : '';
					}
                }
          if(!empty($catnamearr)){
		  ?>
          <li class="location" itemprop="jobLocation"> <span class="job-meta-icon"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/images/job-cin/tag.png'); ?>" alt=""/></span>
            <div class="sf-job-meta-info">
              <h5 class="job-meta-title"><?php echo esc_html__( 'Categories', 'service-finder' ); ?>:</h5>
              <span class="job-meta-text"><?php echo implode(', ', $catnamearr ); ?></span> </div>
          </li>
          <?php 
		  }
		  } ?>
          
          <?php $hours = get_post_meta( $post->ID, '_job_hours', true ); ?> 	
          <?php if($hours > 0){ ?>
          <li> <span class="job-meta-icon"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/images/job-cin/clock.png'); ?>" alt=""/></span>
            <div class="sf-job-meta-info">
              <h5 class="job-meta-title"><?php echo esc_html__( 'Hours', 'service-finder' ); ?>:</h5>
  			  <span class="job-meta-text"><?php echo esc_html( $hours ); ?></span> </div>
          </li>
          <?php } ?>
          <li class="date-posted" itemprop="datePosted"> <span class="job-meta-icon"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/images/job-cin/user.png'); ?>" alt=""/></span>
            <div class="sf-job-meta-info">
              <h5 class="job-meta-title"><?php echo esc_html__( 'Posted On', 'service-finder' ); ?>:</h5>
              <span class="job-meta-text"><?php printf( esc_html__( '%s ago', 'service-finder' ), human_time_diff( get_post_time( 'U' ), current_time('timestamp')) ); ?></span> </div>
          </li>
          <?php do_action( 'single_job_listing_meta_end' ); ?>
        </ul>
        <?php do_action( 'single_job_listing_meta_after' ); ?>
      </div>
      <div class="row">
        <!-- Left part start -->
        <div class="col-md-8">
          <h3><?php echo esc_html__( 'Job Description', 'service-finder' ); ?></h3>

		  <div class="sf-job-description"><?php echo apply_filters( 'the_job_description', get_the_content() ); ?></div>
          
          <?php
		  $gallery_ids = get_post_meta($post->ID,'gallery_ids',true);
		  if(!empty($gallery_ids)){
			$gallery_ids = explode(',',$gallery_ids);
			$totalimages = count($gallery_ids);
			if(!empty($gallery_ids)){
				echo '<h3>'.esc_html__( 'Photos', 'service-finder' ).'</h3>';
				echo '<ul class="job-gallery clearfix mfp-gallery">';
					$cnt = 0;
					foreach($gallery_ids as $imageid){
					$src  = wp_get_attachment_image_src( $imageid, 'service_finder-gallery-thumb-v1' );
					$fullsrc  = wp_get_attachment_image_src( $imageid, 'full' );
					$src  = $src[0];
					$fullsrc  = $fullsrc[0];
					$picdisplay = ($cnt >= 4) ? 'none' : 'block';
					if($cnt == 3 && $totalimages > 4){
					?>
					<li>
                        <div class="job-gallery-pic" style="background-image:url(<?php echo esc_url($src); ?>)">
                            <a href="<?php echo esc_url($fullsrc); ?>" class="mfp-link job-gallery-link"><?php echo esc_html(($totalimages - 3)).'+';?></a>
                        </div>
                    </li>
					<?php
					$picdisplay = ($cnt >= 3) ? 'none' : 'block';
					}
					?>
                    <li style="display:<?php echo esc_html($picdisplay); ?>">
                        <div class="job-gallery-pic" style="background-image:url(<?php echo esc_url($src); ?>)">
                            <a href="<?php echo esc_url($fullsrc); ?>" class="mfp-link job-gallery-link"></a>
                        </div>
                    </li>
					<?php	
					$cnt++;
				}
				echo '</ul>';
			}
		  }
		  ?>
          
          <?php if(get_post_meta($post->ID,'_company_video',true) != ''){ ?>	
          <h3><?php echo esc_html__( 'Video', 'service-finder' ); ?></h3>
          <div class="sf-pres-video">
            <?php the_company_video(); ?>
          </div>
          <?php } ?>
        </div>
        <!-- Left part END -->
        <!-- Side bar start -->
        <div class="col-md-4">
          <aside  class="sf-jobdetail-sidebar">
            <?php if ( candidates_can_apply() ) : ?>
			<?php get_job_manager_template( 'job-application.php' ); ?>
            <?php endif; ?> 
            
            <?php if($service_finder_options['enable-social-shares']){ ?>
            <div class="sf-jobdetail-blocks">
              <h4 class="sf-title"><?php esc_html_e( 'Share this Job', 'service-finder' ) ?></h4>
              <?php echo service_finder_share_jobs($post); ?>
            </div>
            <?php } ?>
            <?php if(get_post_meta($post->ID,'_job_location',true) != ''){ ?>	
            <div class="sf-jobdetail-blocks">
              <h4 class="sf-title"><?php esc_html_e( 'Location', 'service-finder' ) ?></h4>
              <?php echo service_finder_get_direction($post); ?>
            </div>
            <?php } ?>
            <?php if(service_finder_is_related_jobs($post)){ ?>
            <div class="sf-jobdetail-blocks">
              <h4 class="sf-title"><?php esc_html_e( 'Related Jobs', 'service-finder' ) ?></h4>
              <?php echo service_finder_related_jobs($post); ?>
            </div>
            <?php } ?>
          </aside>
        </div>
        <!-- Side bar END -->
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>

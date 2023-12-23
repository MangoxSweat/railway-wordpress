<?php
/*
Template Name: Blog - Right Sidebar
*/
/*****************************************************************************
*
*	copyright(c) - aonetheme.com - Service Finder Team
*	More Info: http://aonetheme.com/
*	Coder: Service Finder Team
*	Email: contact@aonetheme.com
*
******************************************************************************/
get_header();
$current_template = basename(get_page_template());
$service_finder_options = get_option('service_finder_options');
?>
<!-- Blog with right sidebar Start -->

<div class="page-content">
<?php
$image_name = 'banner-image';
if (class_exists('SERVICE_FINDER_MultiPostThumbnails')) {
if (SERVICE_FINDER_MultiPostThumbnails::has_post_thumbnail('page', $image_name)) { 
	$image_id = SERVICE_FINDER_MultiPostThumbnails::get_post_thumbnail_id( 'page', $image_name, get_the_id() );
	$banner_image_url = wp_get_attachment_image_src( $image_id,'full' );
}   
}
if(empty($banner_image_url[0])){
$bannerimg = service_finder_innerpage_banner(); 
}else{
$bannerimg = (!empty($banner_image_url[0])) ? $banner_image_url[0] : '';
}
?>
<!-- inner page banner -->
   <?php 
   $subheader = service_finder_sub_header();
   $pagesubheader = get_post_meta(get_the_id(), '_display_banner', true);
   if($subheader && (!empty($bannerimg))){ 
   if($pagesubheader){ 
   $bgcolor = (!empty($service_finder_options['inner-banner-bg-color'])) ? $service_finder_options['inner-banner-bg-color'] : '';
   $bgopacity = (!empty($service_finder_options['inner-banner-opacity'])) ? $service_finder_options['inner-banner-opacity'] : '';
   ?>
  <div class="banner-inner-row banner-contact-row sf-overlay-wrapper" style="background-image:url(<?php echo esc_url($bannerimg); ?>);">
  <div class="container text-white">
    <h1>
    <?php echo get_the_title(); ?>
    </h1>
    </div>
  <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?>;"></div>
  </div>
  <?php 
  }
  }
  ?>
	
	<?php require get_template_directory() . '/lib/breadcrumb.php';//Breadcrumb ?>
  <!-- Left & right section start -->
  <div class="container">
    <div class="section-content blog-content" >
      <div class="row">
        <!-- Blog part start -->
        <div class="col-md-9">
          <?php
			$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
			
		   $args = array(
						'post_type'=> 'post',
						'post_status' => 'publish',
						'orderby' => 'post_date',
						'order' => 'DESC',
						'paged' => $page,
					);
			query_posts( $args );
			
			while ( have_posts() ) : the_post(); ?>
              <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="post">
                  <?php get_template_part('templates/content'); ?>
                </div>
              </div>
          <?php endwhile; ?>
          <!-- Pagination start -->
          <?php
					the_posts_pagination( array(
						'prev_text'          => "<i class='fa fa-angle-left'></i>".esc_html__(' Prev', 'service-finder' ),
						'next_text'          => esc_html__('Next ', 'service-finder' )."<i class='fa fa-angle-right'></i>",
						'before_page_number' => '',
					) );
        ?>
          <!-- Pagination END -->
        </div>
        <!-- Blog part END -->
        <!-- Side bar start -->
        <div class="col-md-3">
          <?php get_sidebar(); ?>
        </div>
        <!-- Side bar END -->
      </div>
    </div>
  </div>
  <!-- Left & right section  END -->
</div>
<!-- Blog with right sidebar End -->
<?php get_footer(); ?>

<?php
/*
Template Name: Fullwidth
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
$service_finder_options = get_option('service_finder_options');
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="page-content sf-doken-shop">
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
  <div class="banner-inner-row sf-overlay-wrapper" style="background-image:url(<?php echo esc_html($bannerimg); ?>);">
  <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?>;"></div>
  </div>
  <?php 
  }
  }
  ?>
  <?php require get_template_directory() . '/lib/breadcrumb.php';//Breadcrumb ?>
  <!-- Left & right section start -->
  
 <div class="section-content profiles-content" >
    <div class="container">
      <div class="row">
      <?php $display_sidebar = get_post_meta(get_the_id(), '_display_sidebar', true); ?>
	  <?php 
	  if($service_finder_options['page-sidebar'] && $display_sidebar){ 
	  	$class = 'col-md-9';
	  }else{
	  	$class = 'col-md-12';
	  }
	  ?>
        <?php if($service_finder_options['page-sidebar'] && $display_sidebar){ ?>
        <!-- Side bar start -->
        <div class="col-md-3 sidebar-postion">
          <?php get_sidebar(); ?>
        </div>
        <!-- Side bar END -->
        <?php } ?>
        <!-- Left part start -->
        <div class="<?php echo sanitize_html_class($class); ?>">
        
        <?php 
		if(service_finder_UserRole($current_user->ID) == 'Provider'){
		if(get_user_meta( $current_user->ID, 'is_vendor', true ) == 'yes'){  ?>
          <?php
			$display_title = get_post_meta(get_the_id(), '_display_title', true);
			if(class_exists( 'ReduxFrameworkPlugin' )){
			if($service_finder_options['show-page-title']){
			if($display_title){ 
				echo '<h2>'.get_the_title().'</h2>';
			}
			}
			}else{
				echo '<h2>'.get_the_title().'</h2>';
			}
			?>
          <?php the_content(); ?>
          
		  <?php }else{ ?>
          <div class="alert alert-warning"><?php echo esc_html__('Complete your first step from my account to continue.', 'service-finder' ); ?></div>
          <?php } ?>
          <?php }else{
		  ?>
		  <div class="alert alert-warning"><?php echo esc_html__('Please login with provider to continue.', 'service-finder' ); ?></div>
		  <?php
		  } ?>
        </div>
        <!-- Left part END -->
        
      </div>
    </div>
  </div>
  <!-- Left & right section  END -->
</div>
<?php endwhile; ?>

<?php get_footer(); ?>

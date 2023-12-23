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

$service_finder_options = get_option('service_finder_options');

$enablestickyfooter = (!empty($service_finder_options['enable-sticky-footer'])) ? $service_finder_options['enable-sticky-footer'] : ''; 

?>

<?php if(is_home() || is_front_page()){ ?>

<?php

if ($enablestickyfooter) {

echo '<div class="sf-home-wrapper">';

}

?>

<?php if(class_exists('service_finder_booking_plugin')) { ?>

<?php require get_template_directory() . '/frontend/home-sections/header-home.php'; //Home page header ?>

<?php } ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<?php the_content();  ?>

<?php endwhile; ?>

<?php

if ($enablestickyfooter) {

echo '</div>';

}



?>

<?php }elseif(in_array(get_the_ID(),service_finder_get_id_by_shortcodefortheme('[service_finder_my_account')) ){ ?>

<?php 
if ( function_exists( 'service_finder_transient_rule' ) ) {
if(service_finder_transient_rule()){ 
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<?php the_content(); ?>

<?php endwhile; ?>

<?php 
}
}
?>

<?php }elseif(in_array(get_the_ID(),service_finder_get_id_by_shortcodefortheme('[wcv_shop_settings')) ){ ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="page-content sf-mangopay-dashboard">

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

  if(service_finder_themestyle_fortheme() == 'style-4'){
  ?>
	
  <div class="sf-search-benner sf-overlay-wrapper">
      <div class="banner-inner-row provider-cover-img provider-cover-img" style="background-image:url(<?php echo esc_url($bannerimg); ?>)">
        <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?>;"></div>
        <div class="sf-banner-heading-wrap">
          <div class="sf-banner-heading-area">
            <div class="sf-banner-heading-large"><?php echo get_the_title(); ?></div>
            <div class="sf-banner-breadcrumbs-nav">
              <ul class="list-inline">
                <li><a href="<?php echo esc_url(home_url('/')); ?>"> <?php esc_html_e('Home', 'service-finder'); ?> </a></li>
                <li><?php echo get_the_title(); ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php 
  }else{
  ?>
	
  <div class="banner-inner-row banner-contact-row sf-overlay-wrapper" style="background-image:url(<?php echo esc_html($bannerimg); ?>);">

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

		if(service_finder_UserRole($current_user->ID) == 'Provider' || service_finder_UserRole($current_user->ID) == 'Provider'){

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

<?php }else{ ?>

<!-- Template for default pages -->

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<!-- Content -->



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
  
  if(service_finder_themestyle_fortheme() == 'style-4'){
  ?>
	
  <div class="sf-search-benner sf-overlay-wrapper">
      <div class="banner-inner-row provider-cover-img provider-cover-img" style="background-image:url(<?php echo esc_url($bannerimg); ?>)">
        <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?>;"></div>
        <div class="sf-banner-heading-wrap">
          <div class="sf-banner-heading-area">
            <div class="sf-banner-heading-large"><?php echo get_the_title(); ?></div>
            <div class="sf-banner-breadcrumbs-nav">
              <ul class="list-inline">
                <li><a href="<?php echo esc_url(home_url('/')); ?>"> <?php esc_html_e('Home', 'service-finder'); ?> </a></li>
                <li><?php echo get_the_title(); ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php 
  }else{
  ?>
	
  <div class="banner-inner-row banner-contact-row sf-overlay-wrapper" style="background-image:url(<?php echo esc_html($bannerimg); ?>);">

  	<div class="container text-white">

    <?php

			$display_title = get_post_meta(get_the_id(), '_display_title', true);

			if(class_exists( 'ReduxFrameworkPlugin' )){

			if($service_finder_options['show-page-title']){

			if($display_title){ 

				echo '<h1>'.get_the_title().'</h1>';

			}

			}

			}else{

				echo '<h1>'.get_the_title().'</h1>';

			}

			?>
    </div>

  <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?>;"></div>

  </div>

  <?php 
  }
  

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

			$display_title = get_post_meta(get_the_id(), '_display_title', true);

			if(!in_array(get_the_ID(),service_finder_get_id_by_shortcodefortheme('[service_finder_job_applicants')) && !in_array(get_the_ID(),service_finder_get_id_by_shortcodefortheme('[service_finder_quotation_replies')))

			{

			if(class_exists( 'ReduxFrameworkPlugin' )){

			if($service_finder_options['show-page-title']){

			if($display_title){ 

				echo '<h2>'.get_the_title().'</h2>';

			}

			}

			}else{

				echo '<h2>'.get_the_title().'</h2>';

			}

			}

			?>

          <?php the_content(); ?>

          <?php

			  $defaults = array(

					'before'           => '<div class="sf-link-pages">' . esc_html__('Pages:', 'service-finder' ),

					'after'            => '</div>',

					'link_before'      => '',

					'link_after'       => '',

					'next_or_number'   => 'number',

					'separator'        => ' ',

					'nextpagelink'     => esc_html__('<i class="fa fa-angle-right"></i>', 'service-finder' ),

					'previouspagelink' => esc_html__('<i class="fa fa-angle-left"></i>', 'service-finder' ),

					'pagelink'         => '%',

					'echo'             => 1

				);

			 

			wp_link_pages( $defaults );

		  ?>

          

          <?php if ( current_user_can( 'administrator' ) ) { ?>

		  <?php edit_post_link( esc_html__( 'Edit', 'service-finder' ), '<div class="entry-footer"><span class="edit-link">', '</span></div><!-- .entry-footer -->' ); ?>

          <?php } ?>

		  <?php $display_comment = get_post_meta(get_the_id(), '_display_comment', true); ?>

          <?php if(class_exists('service_finder_booking_plugin')){ ?>

		  <?php if ( (comments_open() || get_comments_number()) && $display_comment ) { ?>

          <div class="clear" id="comment-list">

            <div class="comments-area" id="comments">

              <h2 class="comments-title"> <?php printf( esc_html__('%d Comments', 'service-finder' ), get_comments_number( get_the_id() ) ); ?> </h2>

              <div class="padding-30 bg-white">

                <!-- comment list END -->

                <ol class="comment-list">

                  <?php comments_template(); ?>

                </ol>

                <!-- comment list END -->

              </div>

            </div>

          </div>

          <?php } ?>

		  

		  <?php }else{ ?>

		  <?php if ( (comments_open() || get_comments_number()) ) { ?>

          <div class="clear" id="comment-list">

            <div class="comments-area" id="comments">

              <h2 class="comments-title"> <?php printf( esc_html__('%d Comments', 'service-finder' ), get_comments_number( get_the_id() ) ); ?> </h2>

              <div class="padding-30 bg-white">

                <!-- comment list END -->

                <ol class="comment-list">

                  <?php comments_template(); ?>

                </ol>

                <!-- comment list END -->

              </div>

            </div>

          </div>

          <?php } ?>

		  <?php } ?>

		  

        </div>

        <!-- Left part END -->

        

      </div>

    </div>

  </div>

  <!-- Left & right section  END -->

</div>

<!-- Left & right section END -->

<?php endwhile; ?>

<?php } ?>

<?php get_footer(); ?>


<?php

defined('ABSPATH') or die();

/*****************************************************************************

*

*	copyright(c) - aonetheme.com - Service Finder Team

*	More Info: http://aonetheme.com/

*	Coder: Service Finder Team

*	Email: contact@aonetheme.com

*

******************************************************************************/



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

$bannerimg = (!empty($banner_image_url[0])) ? esc_url($banner_image_url[0]) : '';

}

?>



<div class="page-content">

  <?php 

   $subheader = service_finder_sub_header();

   $pagesubheader = get_post_meta(get_the_id(), '_display_banner', true);

   if($subheader && (!empty($bannerimg))){ 

   if($pagesubheader){ 

   $bgcolor = (!empty($service_finder_options['inner-banner-bg-color'])) ? $service_finder_options['inner-banner-bg-color'] : '';

   $bgopacity = (!empty($service_finder_options['inner-banner-opacity'])) ? $service_finder_options['inner-banner-opacity'] : '';

   ?>

  <div class="sf-search-benner sf-overlay-wrapper">

    <div class="banner-inner-row provider-cover-img provider-cover-img" <?php echo (!empty($bannerimg)) ? 'style="background-image:url('.esc_url($bannerimg).')"' : ''; ?>>

      <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?>;"></div>

      <div class="sf-banner-heading-wrap">

        <div class="sf-banner-heading-area">

          <div class="sf-banner-heading-large"><?php echo get_the_title(); ?></div>

          <div class="sf-banner-breadcrumbs-nav">

            <ul class="list-inline">

              <li><a href="<?php echo esc_url(home_url('/')); ?>"> <?php echo esc_html__('Home', 'service-finder' ); ?> </a></li>

              <li><?php echo get_the_title(); ?></li>

            </ul>

          </div>

        </div>

      </div>

    </div>

  </div>

  <?php 

  }

  }

  ?>

  <div class="section-content">

    <!-- Left & right section start -->

    <div class="container">

      <div class="row">

        <!-- Left part start -->

        <div class="col-md-8">

          <div id="grid">

            <div class="row">

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

				  <?php

                  if ( has_post_thumbnail() ) { 

				  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'service_finder-blog-thumbimage' );

				  }

				  ?>

                  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <div class="post-bx">

                      <!-- Content section for blogs start -->

                      <?php if(!empty($imgsrc[0])) {?><div class="post-thum"> <a href="<?php esc_url(the_permalink()) ?>"><img title="<?php esc_attr(the_title()); ?>" src="<?php echo esc_url($imgsrc[0]); ?>"></a> </div><?php } ?>

                      <div class="post-info">

                        <div class="post-categories"><?php the_category(', '); ?></div>

                        <div class="post-meta">

                          <ul>

                            <li class="post-date"><span><?php echo get_the_date(); ?></span></li>

                            <li class="post-author"><?php esc_html_e('By', 'service-finder'); ?> <?php the_author_posts_link() ?> </li>

                          </ul>

                        </div>

                        <div class="post-text">

                          <h4 class="post-title"> <a href="<?php esc_url(the_permalink()) ?>"><?php the_title(); ?></a> </h4>

                          <?php

							$mode = get_option('rss_use_excerpt');

							if($mode){

								the_excerpt(); 

							}else{

								the_content();

							}

							 ?>

                        </div>

                      </div>

                      <!-- Content section for blogs end -->

                    </div>

                  </div>

			  <?php endwhile; ?>

            </div>

          </div>

          <div class="pagination-two pagination-center clearfix">

            <?php

			the_posts_pagination( array(

				'prev_text'          => "<i class='fa fa-chevron-left'></i>".esc_html__(' Prev', 'service-finder' ),

				'next_text'          => esc_html__('Next ', 'service-finder' )."<i class='fa fa-chevron-right'></i>",

				'before_page_number' => '',

			) );

        	?>

          </div>

        </div>

        <!-- Left part END -->

        <!-- Side bar start -->

        <div class="col-md-4">

          <?php get_sidebar(); ?>

        </div>

        <!-- Side bar END -->

      </div>

    </div>

  </div>

</div>


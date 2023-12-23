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
?>
<!-- Content -->

<div class="page-content">
  <?php
		if(class_exists('service_finder_booking_plugin') && class_exists( 'ReduxFrameworkPlugin' )) {
		/*Home page header*/
		require get_template_directory() . '/frontend/home-sections/header-home.php';
		}

		?>
  <!-- Left & right section start -->
  <div class="container">
    <div class="section-content profiles-content" >
      <div class="row">
        <!-- Left part start -->
        <div class="col-md-9">
          <?php
			if ( have_posts() ) : 
			while ( have_posts() ) : the_post(); ?>
              <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="post">
                  <?php get_template_part('templates/content'); ?>
                </div>
              </div>
          <?php
			endwhile;
					the_posts_pagination( array(
						'prev_text'          => "<i class='fa fa-angle-left'></i>".esc_html__(' Prev', 'service-finder' ),
						'next_text'          => esc_html__('Next ', 'service-finder' )."<i class='fa fa-angle-right'></i>",
						'before_page_number' => '',
					) );
			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'content', 'none' );
			endif;
		?>
          <!-- Pagination END -->
        </div>
        <!-- Left part END -->
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
<!-- Content END-->
<?php get_footer();


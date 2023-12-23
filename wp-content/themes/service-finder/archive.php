<?php
/*****************************************************************************
*
*	copyright(c) - aonetheme.com - Service Finder Team
*	More Info: http://aonetheme.com/
*	Coder: Service Finder Team
*	Email: contact@aonetheme.com
*
******************************************************************************/
get_header(); ?>

<?php
$themestyle = service_finder_themestyle_fortheme();

if($themestyle == 'style-4')
{
?>
<div class="section-content">

    <!-- Left & right section start -->

    <div class="container">

      <div class="row">
      
      	<div class="sf-archive-title">

        <h2 class="result-title"><?php printf( esc_html__('Search Results for: %s', 'service-finder' ), get_search_query() ); ?></h2>
    
      </div>

        <!-- Left part start -->

        <div class="col-md-8">

          <?php  if ( have_posts() ) : ?>
          <div id="grid">

            <div class="row">

              <?php

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
          <?php endif; ?>

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
<?php
}else{
?>
<div class="container">
  <div class="col-md-6">
    <h2 class="result-title">
      <?php the_archive_title(); ?>
    </h2>
  </div>
  <div class="section-content blog-content" >
    <div class="row">
      <!-- Blog part start -->
      <div class="col-md-9">
        <?php
								if ( have_posts() ) : 
								while ( have_posts() ) : the_post(); ?>
                                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                      <div class="post">
                                        <?php get_template_part( 'content', 'author' ); ?>
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
<?php
}
?>

<?php get_footer(); ?>

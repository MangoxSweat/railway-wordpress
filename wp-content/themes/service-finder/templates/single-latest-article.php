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
$bgcolor = (!empty($service_finder_options['inner-banner-bg-color'])) ? $service_finder_options['inner-banner-bg-color'] : '';
$bgopacity = (!empty($service_finder_options['inner-banner-opacity'])) ? $service_finder_options['inner-banner-opacity'] : '';
?>


<div class="page-content">
  <?php if ( have_posts() ) : the_post();
	$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false );
	$bannerimg = (!empty($imgsrc[0])) ? $imgsrc[0] : '';
  ?>
  
  
  <div class="section-content">
    <!-- Left & right section start -->
    <div class="container">
      <div class="row">
        <!-- Left part start -->
        <div class="col-md-8">
          
          <div class="sf-post-detail" id="post-<?php the_ID(); ?>">
            <div <?php post_class(); ?>>
              <div class="post-bx">
                <!-- Content section for blogs start -->
                <div class="post-thum"> <img src="<?php echo esc_url($imgsrc[0]); ?>" alt="<?php esc_attr(the_title()); ?>"> </div>
                <div class="post-info">
                  <div class="post-meta sf-icon-post-meta">
                    <ul>
                      <?php
						$allowedhtml = array(
							'a' => array(
								'href' => array(),
								'title' => array()
							),
						);
					  ?>
                      <?php
                      $format = get_post_format();
                    if ( current_theme_supports( 'post-formats', $format ) ) {
                        echo '<li class="post-format"><i class="fa fa-file-text"></i>';
                        printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
                            sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'service-finder' ) ),
                            esc_url( get_post_format_link( $format ) ),
                            get_post_format_string( $format )
                        );
                        echo '</li>';
                    }
                      ?>	
                      <li class="post-author"><i class="feather-user"></i> <?php esc_html_e('By', 'service-finder'); ?> <?php the_author_posts_link() ?> </li>
                      <li class="post-comment"><i class="feather-message-square"></i> <?php printf( wp_kses('<a href="%s">%d %s</a>', $allowedhtml ),esc_url(get_comments_link()), get_comments_number( get_the_id() ),esc_html__('Comments', 'service-finder') ); ?> </li>
                      <?php if ( has_term( '', 'category' ) ) { ?>
                      <li class="post-categories-single"><i class="fa fa-folder-open"></i>
						<?php
                        $terms = get_the_terms( get_the_id() , 'sf_article_category' );
						$categories = array();
						if(!empty($terms))
						{
							foreach($terms as $term)
							{
								$termlink = get_term_link($term,'sf_article_category');
								$termname = $term->name;
								$categories[] = '<a href="'.esc_url($termlink).'">'.esc_html($termname).'</a>';
							}
						}
						echo implode(', ',$categories);
						?>
                      </li>
                      <?php } ?>
					  
                    </ul>
                  </div>
                  <div class="post-text">
                    <h4 class="post-title"> <?php the_title(); ?> </h4>
                    <?php the_content(); ?>
                    <?php
						$allowedpaginatehtml = array(
							'i' => array(
								'class' => array(),
							),
						);
					  ?>
								  <?php
					  $defaults = array(
							'before'           => '<div class="sf-link-pages">' . esc_html__('Pages:', 'service-finder' ),
							'after'            => '</div>',
							'link_before'      => '',
							'link_after'       => '',
							'next_or_number'   => 'number',
							'separator'        => ' ',
							'nextpagelink'     => wp_kses('<i class="fa fa-angle-right"></i>', $allowedpaginatehtml ),
							'previouspagelink' => wp_kses('<i class="fa fa-angle-left"></i>', $allowedpaginatehtml ),
							'pagelink'         => '%',
							'echo'             => 1
						);
					 
					wp_link_pages( $defaults );
				  ?>
                  <?php if ( has_tag() ) { ?>
                      <div class="sf-post-tags">
                                            <h4><?php echo esc_html__('Tags', 'service-finder' ); ?></h4>
                                            <ul>
                                            <?php the_tags('<li>','','</li>'); ?>
                                            </ul>
                                         </div>
                      <?php } ?>
                   
                </div>
                <?php if ( current_user_can( 'administrator' ) ) { ?>
				<?php edit_post_link( esc_html__( 'Edit', 'service-finder' ), '<div class="entry-footer"><span class="edit-link">', '</span></div><!-- .entry-footer -->' ); ?>
                <?php } ?>
                </div>
                <!-- Content section for blogs end -->
              </div>
            </div>
            <div class="clear sf-blog-comment-wrap" id="comment-list">
              <?php
			  if ( comments_open() || get_comments_number() ) {
			  ?>
			  <div class="clear">
				<?php comments_template(); ?>
			  </div>
			  <?php } ?>
            </div>
            <!-- BLOG END -->
          </div>
          <div class="pagination-two pagination-center clearfix">
		  <?php
			the_post_navigation( array(
				'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'service-finder' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'service-finder' ) . '</span> ' .
					'<span class="post-title">%title</span>',
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
  <?php endif; ?>
</div>

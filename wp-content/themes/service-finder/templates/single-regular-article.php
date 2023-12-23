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
?>
<div class="page-content">
  <!-- Left & right section start -->
  <div class="container">
    <div class="section-content  blog-content" >
      <div class="row">
        <!-- Left part start -->
        <div class="col-md-9">
          <?php if ( have_posts() ) : the_post();
				$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'service_finder-blog-thumbimage', false );
		  ?>
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post">
              <div class="post-thum"> <img src="<?php echo esc_url($imgsrc[0]); ?>" alt="<?php esc_attr(the_title()); ?>"> </div>
              <div class="post-info clearfix">
                <div class="post-meta">
                  <ul>
                    <li>
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
                      </li>
                    <li class="post-author"><i class="fa fa-user"></i>
                      <?php esc_html_e('By', 'service-finder'); ?>
                      <?php the_author_posts_link() ?>
                    </li>
                    <?php
						$allowedhtml = array(
							'a' => array(
								'href' => array(),
								'title' => array()
							),
						);
					  ?>
                    <li class="post-comment"><i class="fa fa-comments"></i><?php printf( wp_kses('<a href="%s">%d %s</a>', $allowedhtml ),esc_url(get_comments_link()), get_comments_number( get_the_id() ),esc_html__('Comments', 'service-finder') ); ?></li>
                    <li class="post-categories"><i class="fa fa-folder-open"></i>
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
                    <li class="post-tags"><i class="fa fa-tags"></i>
                      <?php the_tags(); ?>
                    </li>
                  </ul>
                </div>
                <div class="post-date"> <strong><a href="<?php esc_url(the_permalink()) ?>"><?php echo date('d',strtotime(get_the_date())); ?></a></strong> <span><?php echo date('M',strtotime(get_the_date())); ?></span> </div>
                <div class="post-text">
                  <h4 class="post-title">
                   <?php the_title(); ?>
                  </h4>
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
                </div>
                <?php if ( current_user_can( 'administrator' ) ) { ?>
				<?php edit_post_link( esc_html__( 'Edit', 'service-finder' ), '<div class="entry-footer"><span class="edit-link">', '</span></div><!-- .entry-footer -->' ); ?>
                <?php } ?>
              </div>
            </div>
          </div>
          
          <div class="pagination-bx col-lg-12 clearfix">
         
        </div>
        <?php
        // Previous/next post navigation.
			the_post_navigation( array(
				'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'service-finder' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'service-finder' ) . '</span> ' .
					'<span class="post-title">%title</span>',
			) );
		?>
          <?php
		  if ( comments_open() || get_comments_number() ) {
			$allowedhtml = array(
				'a' => array(
					'href' => array(),
					'title' => array()
				),
			);
		  ?>
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
          <?php endif; ?>
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
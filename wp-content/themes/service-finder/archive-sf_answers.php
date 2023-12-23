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
<!-- Blog Detail page layout -->
<div class="page-content">
  <!-- Left & right section start -->
  <div class="container">
    <div class="section-content  blog-content" >
      <div class="row">
        <!-- Left part start -->
        <div class="col-md-9">
          <?php if ( have_posts() ) : the_post();
		  		global $post;
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
						<?php the_category(', '); ?>
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
                  $args = array( 'post_type' => 'sf_answers', 'posts_per_page' => -1, 'post_status' =>'publish', 'post_parent' => $post->ID ); 
					$answers = get_posts( $args );
					if ( $answers ) {
						foreach ( $answers as $answer ) {
							?>
							<div class="answer-panel" id="<?php echo esc_attr($answer->ID); ?>">
								<div class="ans-author"><?php echo service_finder_get_providername_with_link($answer->post_author); ?></div>
								<div class="ans-description"><?php print_r($answer->post_content); ?></div>
								<ul>
									<li>
									<?php
									$totalvotes = get_post_meta($answer->ID,'_totalvotes',true); 
									$voted_users = get_post_meta($answer->ID,'_voted_users',true);
									$activeclass = '';
									$vitekey = 'up';
									
									if(!empty($voted_users) && is_array($voted_users)){
										if(in_array($current_user->ID,$voted_users)){
											$activeclass = 'active';
											$vitekey = 'down';
										}
									}
									
									$totalvotes = (!empty($totalvotes)) ? $totalvotes : 0;
									
									echo esc_html__('Total Votes', 'service-finder'); ?>: <span id="totalvotes-<?php echo esc_attr($answer->ID); ?>"><?php echo esc_html($totalvotes); ?></span>
									<li><?php echo esc_html__('Is this helpfull', 'service-finder'); ?></li>
									<li><a href="javascript:;" class="dovote" data-postid="<?php echo esc_attr($answer->ID); ?>" data-vote="<?php echo esc_attr($vitekey);?>"><i class="fa fa-thumbs-up <?php echo sanitize_html_class($activeclass);?>"></i></a></li>
								</ul>
                                <?php
								  if ( comments_open() || get_comments_number() ) {
								  service_finder_comment_nav();
								  ?>
								  <div class="clear" id="comments">
									<?php 
										$args = array(
											'post_id' => $answer->ID
										);
										$comments = get_comments($args);
										echo '<ol class="comment-list">';
										wp_list_comments('',$comments);
										echo '</ol>';
										comment_form( '', $answer->ID );
										?>
								  </div>
								  <?php 
								  service_finder_comment_nav();
								  } 
								  ?>
							</div>
							<?php
						}
					}
				  ?>
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
<?php get_footer(); ?>

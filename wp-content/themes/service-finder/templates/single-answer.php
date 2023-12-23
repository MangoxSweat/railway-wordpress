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
          <?php 
		  $post = get_post($ansid);
		  $content = $post->post_content;
		  ?>
          <div id="post-<?php $ansid; ?>" <?php post_class(); ?>>
            <div class="post">
              <div class="post-info clearfix">
                <div class="post-meta">
                  <ul>
                    <li class="post-author"><i class="fa fa-user"></i>
                      <?php esc_html_e('By', 'service-finder'); ?>
                      <?php echo service_finder_getProviderFullName($post->post_author) ?>
                    </li>
                    <?php
						$allowedhtml = array(
							'a' => array(
								'href' => array(),
								'title' => array()
							),
						);
					  ?>
                    <li class="post-comment"><i class="fa fa-comments"></i><?php printf( wp_kses('<a href="%s">%d %s</a>', $allowedhtml ),esc_url(get_comments_link()), get_comments_number( $ansid ),esc_html__('Comments', 'service-finder') ); ?></li>
                  </ul>
                </div>
                <div class="post-text">
                  <?php echo apply_filters('the_content', $content); ?>
                </div>
                <?php if ( current_user_can( 'administrator' ) ) { ?>
				<?php edit_post_link( esc_html__( 'Edit', 'service-finder' ), '<div class="entry-footer"><span class="edit-link">', '</span></div><!-- .entry-footer -->' ); ?>
                <?php } ?>
                <?php
			  	if ( comments_open($ansid) || get_comments_number($ansid) ) {
			  ?>
			  <div class="clear sf-questions-norating" id="comments">
				<?php comments_template(); ?>
			  </div>
			  <?php 
			  } 
			  	?>
              </div>
            </div>
          </div>
          
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

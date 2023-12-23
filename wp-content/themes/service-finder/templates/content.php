<?php 
/*****************************************************************************
*
*	copyright(c) - aonetheme.com - Service Finder Team
*	More Info: http://aonetheme.com/
*	Coder: Service Finder Team
*	Email: contact@aonetheme.com
*
******************************************************************************/
//Get Global variable
$current_template = service_finder_global_params('current_template');
/*Get thumbnail for author post according to their sizes*/
switch($current_template){
	case 'blog-grid-2.php':
			if ( has_post_thumbnail() ) { 
			$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'service_finder-blog-2-coloum' );
			}
			break;
	case 'blog-grid-3.php':
			if ( has_post_thumbnail() ) { 
			$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'service_finder-blog-3-coloum' );
			}
			break;
	case 'blog-left-sidebar.php':
			if ( has_post_thumbnail() ) { 
			$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'service_finder-blog-left-sidebar' );
			}
			break;
	case 'blog-no-sidebar.php':
			if ( has_post_thumbnail() ) { 
			$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'service_finder-blog-no-sidebar' );
			}
			break;
	case 'blog-right-sidebar.php':
			if ( has_post_thumbnail() ) { 
			$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'service_finder-blog-right-sidebar' );
			}
			break;
	case 'blog-standard.php':
			if ( has_post_thumbnail() ) { 
			$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'service_finder-blog-thumbimage' );
			}
			break;
	default:
			if ( has_post_thumbnail() ) { 
			$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'service_finder-blog-right-sidebar' );
			}
			break;						
}
?>
<!-- Content section for blogs start -->

<div class="post-thum"> <?php if(!empty($imgsrc[0])) {?><img title="<?php esc_attr(the_title()); ?>" src="<?php echo esc_url($imgsrc[0]); ?>"><?php } ?> </div>
<div class="post-info">
  <div class="post-date"> <strong><a href="<?php esc_url(the_permalink()) ?>"><?php echo date('d',strtotime(get_the_date())); ?></a></strong> <span><?php echo service_finder_translate_monthname(date('n',strtotime(get_the_date()))); ?></span> </div>
  <div class="post-text">
    <h4 class="post-title">
     <a href="<?php esc_url(the_permalink()) ?>"><?php the_title(); ?></a>
    </h4>
    <p><?php
	$mode = get_option('rss_use_excerpt');
	if($mode){
		the_excerpt(); 
	}else{
		the_content();
	}
	 ?></p>
    <?php
  		$allowedhtml = array(
			'a' => array(
				'href' => array(),
				'title' => array()
			),
		);
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
  <?php
  if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<span class="sticky-post">%s</span>', esc_html__( 'Featured', 'service-finder' ) );
	}
  ?>
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
    <a href="<?php esc_url(the_permalink()) ?>" class="read-more">
    <?php esc_html_e('Read More', 'service-finder'); ?>
    </a> </div>
</div>
<!-- Content section for blogs end -->

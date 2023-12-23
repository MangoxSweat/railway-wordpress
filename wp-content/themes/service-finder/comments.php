<?php
/*****************************************************************************
*
*	copyright(c) - aonetheme.com - Service Finder Team
*	More Info: http://aonetheme.com/
*	Coder: Service Finder Team
*	Email: contact@aonetheme.com
*
******************************************************************************/
global $current_user, $service_finder_options;
$post_type = get_post_type(get_the_id());
if ( post_password_required() ) {
	return;
}

?>
<div id='mycontent'>
 <div id='contentInner'>
<div id="comments" class="comments-area">
  <?php if ( have_comments() ) : ?>
  <h2 class="comments-title">
    <?php
				if($post_type == 'sf_comment_rating'){
				printf( _nx( 'One review on &ldquo;%2$s&rdquo;', '%1$s reviews on &ldquo;%2$s&rdquo;', get_comments_number(), 'review title', 'service-finder' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
				}else{
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'service-finder' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
				}	
			?>
  </h2>
  <?php service_finder_comment_nav(); ?>
  <ol class="comment-list">
    <?php
				if($post_type == 'sf_comment_rating'){
					wp_list_comments( array(
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 56,
						'max_depth' => 1,
					) );
				}else{
					wp_list_comments( array(
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 56,
					) );
				}
			?>
  </ol>
  <!-- .comment-list -->
  <?php service_finder_comment_nav(); ?>
  <?php endif; ?>
  <?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
  <p class="no-comments">
    <?php esc_html_e( 'Comments are closed.', 'service-finder' ); ?>
  </p>
  <?php endif; ?>
  <?php 
  if($post_type == 'sf_comment_rating'){
	  if(is_user_logged_in() && $post_type == 'sf_comment_rating'){ 
		  $flag = 0;	
		  $providersreview = (!empty($service_finder_options['providers-review'])) ? $service_finder_options['providers-review'] : false;
		  if($providersreview){
		  		if(service_finder_getUserRole($current_user->ID) == 'Customer' || service_finder_getUserRole($current_user->ID) == 'Provider'){
					$flag = 1;
				}
		  }else{
		  		if(service_finder_getUserRole($current_user->ID) == 'Customer'){
					$flag = 1;
				}
		  }			
		  if($flag == 1){
			$usercomment = get_comments(array('user_id' => $current_user->ID, 'post_id' => get_the_id()) );
			if($usercomment) { 
				echo '<div class="alert alert-info">'.esc_html__('You have already posted your review for this profile', 'service-finder').'.</div>';
			} else { 
				comment_form(array('title_reply' => esc_html__( 'Leave a Review', 'service-finder' )));
			} 
			
		  }
	  } 
  }else{
  	  comment_form();
  }
  ?>
</div>
 </div>
</div> 
<!-- .comments-area -->

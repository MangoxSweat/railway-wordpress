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

$current_user = wp_get_current_user();

$ansid = (!empty($_GET['ansid'])) ? esc_attr($_GET['ansid']) : '';
$quesid = (!empty($_GET['quesid'])) ? esc_attr($_GET['quesid']) : '';

if($ansid != "" && $ansid > 0 && $quesid != "" && $quesid > 0){

$row = $wpdb->get_row($wpdb->prepare('SELECT * FROM '.$wpdb->prefix.'posts WHERE `ID` = %d AND `post_parent` = %d',$ansid,$quesid));
if(!empty($row)){
require get_template_directory() . '/templates/single-answer.php';
return;
}

}

?>
<!-- Blog Detail page layout -->
<div class="page-content">
  <!-- Left & right section start -->
  <div class="container">
    <div class="section-content  blog-content" >
      <div class="row">
        <!-- Left part start -->
        <div class="col-md-12">
          <?php if ( have_posts() ) : the_post();
		  		global $post;
				$category_id = get_post_meta($post->ID, '_question_category_id', true);
				$iconsrc = service_finder_getTermIcon($category_id);
		  ?>
          <div class="margin-b-30  bg-white">
            <ul class="sf-ques-ans-area clearfix">
                <li>
                    <?php if($category_id > 0){ ?>
                    <div class="sf-ques-header clearfix">
                        <?php if($iconsrc != ""){ ?>
                        <div class="sf-ques-header-pic"><img src="<?php echo esc_url($iconsrc); ?>"></div>
                        <?php } ?>
                        <div class="sf-ques-header-body"><div class="sf-ques-header-title"><a href="javascript:;"><?php echo service_finder_getCategoryName($category_id,'sf_question_category') ?></a></div>
                        <span class="sf-ques-meta-col sf-qa-answers"><?php echo service_finder_getCategoryDescription($category_id,'sf_question_category') ?></span></div>
                    </div>
                    <?php } ?>
                    <div class="sf-ques-body">
                        <div class="sf-ques-body-title"><?php the_title(); ?></div>
                        <div class="sf-ques-ans-author"><img src="<?php echo service_finder_get_avatar_by_userid($post->post_author); ?>"></div>
                        <div class="sf-ques-title-meta">
                        	<div class="sf-quesans-title"><?php the_content(); ?></div>
                            <div class="sf-quesans-meta">
                                <span class="sf-ques-meta-col sf-qa-answers" data-toggle="modal" data-target="#answers-modal"><i class="fa fa-commenting-o"></i> <?php printf(esc_html__('%d Answers', 'service-finder'),service_finder_get_total_answers($post->ID)); ?></span>
                                <span class="sf-ques-meta-col sf-qa-vote"><i class="fa fa-calendar-o"></i> <?php echo get_the_date( 'M j, Y', $post->ID ); ?></span>
                                <span class="sf-ques-meta-col sf-qa-hour"><i class="fa fa-clock-o"></i> <?php printf( __( '%s ago', 'service-finder' ), human_time_diff( get_post_time( 'U' ), time() ) ); ?></span>
                            </div>
                            <?php 
							if(is_user_logged_in()){
								if($current_user->ID == get_post_meta($post->ID,'_question_for_provider_id',true)){
									service_finder_answer_button_html($post->ID);
								} 
							}
							?>
                        </div>
                        <?php
						if(is_user_logged_in()){
							if($current_user->ID == get_post_meta($post->ID,'_question_for_provider_id',true)){
								service_finder_answer_html($post->ID);
							} 
						}
						?>
						<?php
						$args = array( 'post_type' => 'sf_answers', 'posts_per_page' => -1, 'post_status' =>'publish', 'post_parent' => $post->ID ); 
						$answers = get_posts( $args );
						if ( $answers ) {
							foreach ( $answers as $answer ) {
								?>
								<div class="sf-anstext-body">
                                    <div class="sf-answer-icon"><img src="<?php echo esc_url(get_template_directory_uri().'/inc/images/qapic.jpg'); ?>"></div>
                                    <?php printf($answer->post_content); ?>
                                    <div class="sf-quesans-meta">
                                        <?php echo service_finder_voting_layout($answer->ID); ?>
                                        <span class="sf-ques-meta-col sf-qa-vote"><i class="fa fa-calendar-o"></i> <?php echo get_the_date( 'M j, Y', $answer->ID ); ?></span>
                                        <span class="sf-ques-meta-col sf-qa-hour"><i class="fa fa-clock-o"></i> <?php printf( __( '%s ago', 'service-finder' ), human_time_diff( get_post_time( 'U',false, $answer->ID), time() ) ); ?></span>
                                        <span class="sf-ques-meta-col sf-qa-comments"><i class="fa fa-comment"></i> 
                                        <?php
										$url = add_query_arg( array('quesid' => $post->ID, 'ansid' => $answer->ID), get_permalink() );
										?>
										<a href="<?php echo esc_url($url); ?>"><?php esc_html_e('View Comments', 'service-finder' ) ?></a>
                                        </span>
                                    </div>
                                </div>
								<?php
							}
						}
						  ?>
                    </div>
                </li>
            </ul>
       	  </div> 
        <?php endif; ?>
        </div>
        <!-- Left part END -->
      </div>
    </div>
  </div>
  <!-- Left & right section  END -->
</div>
<?php get_footer(); ?>

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
<?php $pid = (!empty($_GET['pid'])) ? esc_attr($_GET['pid']) : ''; ?>
<div class="container">
  <div class="section-content provider-content">
  	<div class="row">
	  <div class="col-md-8">
	  <?php 
      if($pid != "" && $pid > 0){
      do_action('service_finder_question_answer',$pid); 
      }else{
      echo esc_html__( 'No Results Found', 'service-finder' );
      }
      ?>
	  </div>	
      <!-- Right part start -->
   	  <div class="col-md-3">
        
            <?php get_sidebar(); ?>

        </div>
      <!-- Right part END -->	                                
	</div>	                            
  </div>
</div>
<?php get_footer(); ?>

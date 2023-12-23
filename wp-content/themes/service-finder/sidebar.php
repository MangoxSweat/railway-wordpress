<?php
/*****************************************************************************
*
*	copyright(c) - aonetheme.com - Service Finder Team
*	More Info: http://aonetheme.com/
*	Coder: Service Finder Team
*	Email: contact@aonetheme.com
*
******************************************************************************/

$themestyle = service_finder_themestyle_fortheme();
?>
<!-- Default Sidebar -->
<aside class="side-bar">
  <?php 
  if ( is_active_sidebar( 'sf-sidebar-primary' ) ) {
	dynamic_sidebar('sf-sidebar-primary');
  }
  ?>
</aside>

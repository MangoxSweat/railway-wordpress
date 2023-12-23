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

$themestyle = service_finder_themestyle_fortheme();

if($themestyle == 'style-4')
{
	get_template_part( 'templates/single', 'latest-article' );
}else{
	get_template_part( 'templates/single', 'regular-article' );
}

get_footer(); ?>

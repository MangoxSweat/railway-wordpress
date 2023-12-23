<?php
/*
Template Name: Blog - 2 Coloum
*/
/*****************************************************************************
*
*	copyright(c) - aonetheme.com - Service Finder Team
*	More Info: http://aonetheme.com/
*	Coder: Service Finder Team
*	Email: contact@aonetheme.com
*
******************************************************************************/
get_header();
$current_template = basename(get_page_template());
$service_finder_options = get_option('service_finder_options');

$themestyle = service_finder_themestyle_fortheme();

if($themestyle == 'style-4')
{
	get_template_part( 'templates/blog', 'grid-2-latest' );
}else{
	get_template_part( 'templates/blog', 'grid-2-regular' );
}
?>
<?php get_footer(); ?>

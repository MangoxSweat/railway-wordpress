<?php
/*****************************************************************************
*
*	copyright(c) - aonetheme.com - Service Finder Team
*	More Info: http://aonetheme.com/
*	Coder: Service Finder Team
*	Email: contact@aonetheme.com
*
******************************************************************************/

//Return global variable $service_finder_ThemeParams
function service_finder_global_params($global_var)
{
	global $service_finder_ThemeParams, $current_template, $registerErrors;
	switch($global_var){
	case 'service_finder_ThemeParams':
		return $service_finder_ThemeParams;
		break;
	case 'current_template':
		return $current_template;
		break;	
	case 'registerErrors':
		return $registerErrors;
		break;	
	default:
		break;		
	}
}

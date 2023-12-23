<?php
/*****************************************************************************
*
*	copyright(c) - aonetheme.com - Service Finder Team
*	More Info: http://aonetheme.com/
*	Coder: Service Finder Team
*	Email: contact@aonetheme.com
*
******************************************************************************/
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */
global $service_finder_options;
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "service_finder_options";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * -->

Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
    *
    */
    global $wpdb, $service_finder_Tables;
	
	/*Create object for table name access in theme*/
	$service_finder_Tables = (object) array(
								'providers' =>  'service_finder_providers',
								'services' =>  'service_finder_services',
								'team_members' =>  'service_finder_team_members',
								'bookings' =>  'service_finder_bookings',
								'customers' =>  'service_finder_customers',
								'customers_data' =>  'service_finder_customers_data',
								'booked_services' =>  'service_finder_booked_services',
								'timeslots' =>  'service_finder_timeslots',
								'service_area' =>  'service_finder_service_area',
								'regions' => 'service_finder_regions',
								'attachments' =>  'service_finder_attachments',
								'invoice' =>  'service_finder_invoice',
								'feedback' =>  'service_finder_feedback',
								'feature' =>  'service_finder_feature',
								'favorites' =>  'service_finder_favorites',
								'newsletter' =>  'service_finder_newsletter',
								'unavailability' =>  'service_finder_unavailability',
								'business_hours' =>  'service_finder_business_hours',
					);
	
    $sampleHTML = '';
    if ( file_exists( plugin_dir_path( __FILE__ ) . '/info-html.html' ) ) {
    Redux_Functions::initWpFilesystem();
    
    global $wp_filesystem;
    
    $sampleHTML = $wp_filesystem->get_contents( plugin_dir_path( __FILE__ ) . '/info-html.html' );
    }
    
    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {
    
    if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
    $sample_patterns = array();
    
    while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {
    
    if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
    $name              = explode( '.', $sample_patterns_file );
    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
    $sample_patterns[] = array(
    'alt' => $name,
    'img' => $sample_patterns_url . $sample_patterns_file
    );
    }
    }
    }
    }
    
    /**
    * ---> SET ARGUMENTS
    * All the possible arguments for Redux.
    * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
    * */
    
    $theme = wp_get_theme(); // For use with some settings. Not necessary.
    
    $args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__( 'Theme Options', 'service-finder' ),
    'page_title'           => esc_html__( 'Theme Options', 'service-finder' ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => 'service_finder_globals',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    
    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.
    
    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
    
    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
    
    // HINTS
    'hints'                => array(
    'icon'          => 'el el-question-sign',
    'icon_position' => 'right',
    'icon_color'    => 'lightgray',
    'icon_size'     => 'normal',
    'tip_style'     => array(
    'color'   => 'red',
    'shadow'  => true,
    'rounded' => false,
    'style'   => '',
    ),
    'tip_position'  => array(
    'my' => 'top left',
    'at' => 'bottom right',
    ),
    'tip_effect'    => array(
    'show' => array(
    'effect'   => 'slide',
    'duration' => '500',
    'event'    => 'mouseover',
    ),
    'hide' => array(
    'effect'   => 'slide',
    'duration' => '500',
    'event'    => 'click mouseleave',
    ),
    ),
    )
    );
    
    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
    if ( ! empty( $args['global_variable'] ) ) {
    $v = $args['global_variable'];
    } else {
    $v = str_replace( '-', '_', $args['opt_name'] );
    }
    
    } else {
    
    }
    
    // Add content after the form.
    
    
    Redux::setArgs( $opt_name, $args );
    
    /*
    * ---> END ARGUMENTS
    */
    
    
    /*
    * ---> START HELP TABS
    */
    
    $tabs = array(
    array(
    'id'      => 'redux-help-tab-1',
    'title'   => esc_html__( 'Theme Information 1', 'service-finder' ),
    'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'service-finder' )
    ),
    array(
    'id'      => 'redux-help-tab-2',
    'title'   => esc_html__( 'Theme Information 2', 'service-finder' ),
    'content' => esc_html__( '
<p>This is the tab content, HTML is allowed.</p>
', 'service-finder' )
    )
    );
    Redux::set_help_tab( $opt_name, $tabs );
    
    // Set the help sidebar
    $content = esc_html__( '
<p>This is the sidebar content, HTML is allowed.</p>
', 'service-finder' );
    Redux::set_help_sidebar( $opt_name, $content );
    
    
    /*
    * <--- END HELP TABS
    */
    
    
    /*
    *
    * ---> START SECTIONS
    *
    */
    
    /*
    
    As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
    
    
    */
    $service_finder_options = get_option('service_finder_options');
	$providerreplacestring = (!empty($service_finder_options['provider-replace-string'])) ? $service_finder_options['provider-replace-string'] : esc_html__('Provider', 'service-finder');
	$customerreplacestring = (!empty($service_finder_options['customer-replace-string'])) ? $service_finder_options['customer-replace-string'] : esc_html__('Customers', 'service-finder');
    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'General Settings', 'service-finder' ),
    'id'               => 'general',
    'desc'             => esc_html__( 'Site General Settings', 'service-finder' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-home'
    ) );
    
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Theme Layout', 'service-finder' ),
    'id'               => 'theme-layout-settings',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'theme-style',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Theme Style', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'style-1' => esc_html__( 'Style 1', 'service-finder' ),
    'style-2' => esc_html__( 'Style 2', 'service-finder' ),
	'style-3' => esc_html__( 'Style 3', 'service-finder' ),
	'style-4' => esc_html__( 'Style 4', 'service-finder' ),
    ),
	'default'  => 'style-1',
    ),
	array(
    'id'       => 'home-page-style',
    'type'     => 'image_select',
    'title'    => esc_html__( 'Home Page Style', 'service-finder' ),
    'subtitle' => '',
    'desc'     => 'This will work only for theme style 4',
    'options'  => array(
    '1' => array(
    'alt' => '1',
     'img' => get_template_directory_uri().'/inc/images/redux/banner4.jpg'
    ),
    '2' => array(
    'alt' => '2',
    'img' => get_template_directory_uri().'/inc/images/redux/banner4-3.jpg'
    ),
    ),
    'default'  => '2',
	'required' => array( 'theme-style', '=', 'style-4' ),
    ),
	array(
    'id'       => 'grid-view-style',
    'type'     => 'image_select',
    'title'    => esc_html__( 'Grid View Style', 'service-finder' ),
    'subtitle' => '',
    'desc'     => 'This will work only for theme style 4',
    'options'  => array(
    '1' => array(
    'alt' => '1',
    'img' => get_template_directory_uri().'/inc/images/redux/banner-defult.jpg'
    ),
    '2' => array(
    'alt' => '2',
    'img' => get_template_directory_uri().'/inc/images/redux/banner4.jpg'
    ),
    ),
    'default'  => '2',
	'required' => array( 'theme-style', '=', 'style-4' ),
    ),
    )
    ) );
	
	$allsliders = service_finder_get_rev_sliders();
    if(!empty($allsliders)){
    foreach($allsliders as $key => $value){
    $sliderarr[$key] = $value;
    }
    }else{
    $sliderarr[] = esc_html__( 'Select a slider', 'service-finder' );
    }
	
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Header Settings', 'service-finder' ),
    'id'               => 'header-settings',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'site-logo',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Site Logo', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => '',
    'subtitle' => esc_html__( 'Upload site logo', 'service-finder' ),
    ),
	array(
    'id'       => 'sticky-logo',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Sticky Logo', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => esc_html__( 'It works only for theme style 4 and header style 8', 'service-finder' ),
    'subtitle' => esc_html__( 'Upload sticky logo', 'service-finder' ),
    ),
	array(
    'id'       => 'email-logo',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Logo for Email Template', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => '',
    'subtitle' => esc_html__( 'Upload logo for email tempalte', 'service-finder' ),
    ),
    array(
    'id'             => 'logo-dimensions',
    'type'           => 'dimensions',
    'units'          => array( 'px', '%' ),    // You can specify a unit value. Possible: px, em, %
    'units_extended' => 'true',  // Allow users to select any type of unit
    'title'          => esc_html__( 'Logo Dimensions', 'service-finder' ),
    'subtitle'       => esc_html__( '(Width/Height)', 'service-finder' ),
    'desc'           => '',
    'default'        => array(
    'width'  => '',
    'height' => '30px',
    )
    ),
    array(
    'id'             => 'logo-margin',
    'type'           => 'spacing',
    'mode'           => 'margin',
    'all'            => false,
    'units'          => array( 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
    'units_extended' => 'true',    // Allow users to select any type of unit
    'title'          => esc_html__( 'Logo Margin', 'service-finder' ),
    'subtitle'       => '',
    'desc'           => '',
    'default'        => array(
    'margin-top'    => '30px',
    'margin-right'  => '0px',
    'margin-bottom' => '30px',
    'margin-left'   => '0px'
    )
    ),
	array(
    'id'            => 'header-logo-title-fontsize',
    'type'          => 'slider',
    'title'         => esc_html__( 'Header Logo Title Font Size', 'service-finder' ),
    'subtitle'      => '(In px)',
    'desc'          => 'Works when logo image is missing',
    'default'       => 20,
    'min'           => 12,
    'step'          => 1,
    'max'           => 40,
    'resolution'    => 1,
    'display_value' => 'text'
    ),
	array(
    'id'            => 'header-top-bar-fontsize',
    'type'          => 'slider',
    'title'         => esc_html__( 'Header Top Bar Font Size', 'service-finder' ),
    'subtitle'      => '(In px)',
    'desc'          => '',
    'default'       => 12,
    'min'           => 12,
    'step'          => 1,
    'max'           => 40,
    'resolution'    => 1,
    'display_value' => 'text'
    ),
	array(
    'id'             => 'logo-dimensions-mobile',
    'type'           => 'dimensions',
    'units'          => array( 'px', '%' ),    // You can specify a unit value. Possible: px, em, %
    'units_extended' => 'true',  // Allow users to select any type of unit
    'title'          => esc_html__( 'Logo Dimensions for Mobile', 'service-finder' ),
    'subtitle'       => esc_html__( '(Width/Height)', 'service-finder' ),
    'desc'           => 'Works only for mobile',
    'default'        => array(
    'width'  => '',
    'height' => '30px',
    )
    ),
    array(
    'id'             => 'logo-margin-mobile',
    'type'           => 'spacing',
    'mode'           => 'margin',
    'all'            => false,
    'units'          => array( 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
    'units_extended' => 'true',    // Allow users to select any type of unit
    'title'          => esc_html__( 'Logo Margin for Mobile', 'service-finder' ),
    'subtitle'       => '',
    'desc'           => 'Works only for mobile',
    'default'        => array(
    'margin-top'    => '30px',
    'margin-right'  => '0px',
    'margin-bottom' => '30px',
    'margin-left'   => '0px'
    )
    ),
	array(
    'id'            => 'header-logo-title-fontsize-mobile',
    'type'          => 'slider',
    'title'         => esc_html__( 'Header Logo Title Font Size for Mobile', 'service-finder' ),
    'subtitle'      => '(In px)',
    'desc'          => 'Works when logo image is missing for mobile',
    'default'       => 20,
    'min'           => 12,
    'step'          => 1,
    'max'           => 40,
    'resolution'    => 1,
    'display_value' => 'text'
    ),
    array(
    'id'       => 'header-style',
    'type'     => 'select',
    'title'    => esc_html__( 'Header Style', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'In case of slider Revolution Slider settings will work. You need to add/edit slider in Revolution Slider section and choose desire slider from following sliders dropdown', 'service-finder' ),
    //Must provide key => value pairs for select options
    'options'  => array(
    'banner' => 'Banner Image',
    'map' => 'Map',
	'slider' => 'Slider',
    ),
    'default'  => 'banner'
    ),
	array(
    'id'       => 'banner-style',
    'type'     => 'image_select',
    'title'    => esc_html__( 'Banner Style', 'service-finder' ),
    'subtitle' => '',
    'desc'     => 'This will work only for theme style 4',
    'options'  => array(
    'old' => array(
    'alt' => 'old',
    'img' => get_template_directory_uri().'/inc/images/redux/banner-defult.jpg'
    ),
    'new' => array(
    'alt' => 'new',
    'img' => get_template_directory_uri().'/inc/images/redux/banner4.jpg'
    ),
	'new2' => array(
    'alt' => 'new',
    'img' => get_template_directory_uri().'/inc/images/redux/banner4-2.jpg'
    ),
    ),
    'default'  => 'new',
	'required' => array( 'header-style', '=', 'banner' ),
    ),
	array(
    'id'       => 'default-rev-slider',
    'type'     => 'select',
    'title'    => esc_html__( 'Select Slider', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => $sliderarr,
	'required' => array( 'header-style', '=', 'slider' ),
    ),
	array(
    'id'       => 'header-full-width',
    'type'     => 'switch',
    'title'    => esc_html__( 'Header Full Width', 'service-finder' ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'search-bar-position',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Search Bar Position', 'service-finder' ),
    'subtitle' => '',
    'desc'     => 'Only works for home page',
    'options'  => array(
    'middle' => esc_html__( 'In Middle', 'service-finder' ),
    'bottom' => esc_html__( 'In Bottom', 'service-finder' ),
    ),
    'default'  => 'bottom'
    ),
	array(
    'id'       => 'home-search-bar',
    'type'     => 'switch',
    'title'    => esc_html__( 'Hide Search Bar', 'service-finder' ),
    'subtitle' => '',
    'default'  => false,
    ),
    array(
    'id'       => 'header-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Banner Image', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => 'Only for home page (1920 x 840 px)',
    'subtitle' => '',
    ),
	array(
    'id'            => 'banner-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Banner Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => 0.3,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'banner-bg-color',
    'type'     => 'color',
    'title'    => esc_html__('Banner BG Color', 'service-finder'),
    'subtitle' => '',
    'default'  => '#000000',
    'validate' => 'color',
    ),
	array(
    'id'      => 'banner-heading',
    'type'    => 'editor',
    'title'    => esc_html__( 'Banner Heading', 'service-finder' ),
    'desc' => esc_html__( 'Enter text for banner heading', 'service-finder' ),
	'default'  => 'We find Services For You',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'      => 'banner-subheading',
    'type'    => 'editor',
    'title'    => esc_html__( 'Banner Sub Heading', 'service-finder' ),
    'desc' => esc_html__( 'Enter text for banner sub heading', 'service-finder' ),
	'default'  => 'Help around the home is just a few clicks away',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'            => 'header-bg-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Header BG Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => 'Only works with header white overlay and header black overlay style',
    'default'       => 0,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'top-bar',
    'type'     => 'switch',
    'title'    => esc_html__( 'Top Bar', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'show-page-title',
    'type'     => 'switch',
    'title'    => esc_html__( 'Show Page Title', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'header-menu-slide-position',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Header Menu Slide in Mobile', 'service-finder' ),
    'subtitle' => '',
    'options'  => array(
    'top' => esc_html__( 'From Top', 'service-finder' ),
    'left' => esc_html__( 'From Left', 'service-finder' ),
    ),
    'default'  => 'top'
    ),
	array(
    'id'         => 'header-menu-preview',
    'type'       => 'raw',
    'full_width' => false,
    'title'      => esc_html__( 'Header Menu Slide in Mobile Preview', 'service-finder' ),
    'subtitle'   => '',
    'desc'       => '',
    'content'    => '<img src="'.get_template_directory_uri().'/inc/images/redux/menu-top-slide.gif" style="margin-right:10px;"><img src="'.get_template_directory_uri().'/inc/images/redux/menu-left-slide.gif">',
    ),
    array(
    'id'       => 'header-templates',
    'type'     => 'image_select',
    'title'    => esc_html__( 'Header Styles', 'service-finder' ),
    'subtitle' => '',
    'desc'     => 'First five header styles will work only if top bar is on',
    'options'  => array(
    'classic' => array(
    'alt' => 'classic',
    'img' => get_template_directory_uri().'/inc/images/redux/classic.jpg'
    ),
    'center-mode' => array(
    'alt' => 'center-mode',
    'img' => get_template_directory_uri().'/inc/images/redux/center-mode.jpg'
    ),
    'transperent' => array(
    'alt' => 'transperent',
    'img' => get_template_directory_uri().'/inc/images/redux/transperent.jpg'
    ),
    'overlay-white' => array(
    'alt' => 'overlay-white',
    'img' => get_template_directory_uri().'/inc/images/redux/overlay-white.jpg'
    ),
    'overlay-black' => array(
    'alt' => 'overlay-black',
    'img' => get_template_directory_uri().'/inc/images/redux/overlay-black.jpg'
    ),
    'no-top-bar' => array(
    'alt' => 'fixed',
    'img' => get_template_directory_uri().'/inc/images/redux/fixed.jpg'
    ),
	'transperent-no-top-bar' => array(
    'alt' => 'transperent-no-top-bar',
    'img' => get_template_directory_uri().'/inc/images/redux/transperent-no-top-bar.jpg'
    ),
	'header8' => array(
    'alt' => 'Header 8',
    'img' => get_template_directory_uri().'/inc/images/redux/header-stye-8.jpg'
    ),
    ),
    'default'  => 'classic'
    ),
    )
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Navigation Settings', 'service-finder' ),
    'id'               => 'navigation-settings',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'login-signup-popup',
    'type'     => 'switch',
    'title'    => esc_html__( 'Login/Signup via Popup', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
    array(
    'id'       => 'top-bar-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Top Bar Background Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#3396d1',
    'validate' => 'color',
    ),
    array(
    'id'       => 'top-bar-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Top Bar Text Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffffff',
    'validate' => 'color',
    ),
    array(
    'id'       => 'enable-sticky',
    'type'     => 'switch',
    'title'    => esc_html__( 'Enable Sticky Header', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
    array(
    'id'       => 'breadcrumbs',
    'type'     => 'switch',
    'title'    => esc_html__( 'Breadcrumbs', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
    )
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Navigation Styling for Home Page', 'service-finder' ),
    'id'               => 'navigation-styling',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'            => 'parent-navigation-menu-fontsize',
    'type'          => 'slider',
    'title'         => esc_html__( 'Font Size of Parent Navigation Menu', 'service-finder' ),
    'subtitle'      => '(In px)',
    'desc'          => '',
    'default'       => 12,
    'min'           => 10,
    'step'          => 1,
    'max'           => 40,
    'resolution'    => 1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'parent-navigation-menu-fontweight',
    'type'     => 'select',
    'title'    => esc_html__( 'Font Weight of Parent Navigation Menu', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'normal' => 'Normal',
    'bold' => 'Bold',
    ),
    'default'  => 'normal'
    ),
	array(
    'id'            => 'child-navigation-menu-fontsize',
    'type'          => 'slider',
    'title'         => esc_html__( 'Font Size of Child Navigation Menu', 'service-finder' ),
    'subtitle'      => '(In px)',
    'desc'          => '',
    'default'       => 11,
    'min'           => 10,
    'step'          => 1,
    'max'           => 40,
    'resolution'    => 1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'child-navigation-menu-fontweight',
    'type'     => 'select',
    'title'    => esc_html__( 'Font Weight of Child Navigation Menu', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'normal' => 'Normal',
    'bold' => 'Bold',
    ),
    'default'  => 'normal'
    ),
	array(
    'id'       => 'navigation-bg-color-sticky',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Sticky Background Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffffff',
    'validate' => 'color',
    ),
	array(
    'id'       => 'navigation-text-color-sticky',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Sticky Text Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
	array(
    'id'       => 'navigation-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Background Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffffff',
    'validate' => 'color',
    ),
	array(
    'id'       => 'navigation-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Text Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
    array(
    'id'       => 'navigation-text-hover-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Text Hover Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#3396d1',
    'validate' => 'color',
    ),
    array(
    'id'       => 'navigation-dropdown-bg',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Dropdown BG', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffffff',
    'validate' => 'color',
    ),
	array(
    'id'       => 'navigation-dropdown-hover-bg',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Dropdown Hover BG', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ebebeb',
    'validate' => 'color',
    ),
    array(
    'id'       => 'navigation-dropdown-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Dropdown Text Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
    array(
    'id'       => 'navigation-dropdown-text-hover',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Dropdown Text Hover', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#3396D1',
    'validate' => 'color',
    ),
	array(
    'id'       => 'navigation-button-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Button Text Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
	array(
    'id'       => 'navigation-button-border-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Button Border Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffb600',
    'validate' => 'color',
    ),
	array(
    'id'       => 'navigation-button-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Button Background Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
	array(
    'id'       => 'sticky-navigation-button-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Button Background Color (Sticky)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
	array(
    'id'       => 'sticky-navigation-button-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Button Text Color (Sticky)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#FFFFFF',
    'validate' => 'color',
    ),
	array(
    'id'       => 'sticky-navigation-button-border-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Button Border Color (Sticky)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#FFFFFF',
    'validate' => 'color',
    ),
	array(
    'id'       => 'mobile-navigation-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Background Color (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffffff',
    'validate' => 'color',
    ),
	array(
    'id'       => 'mobile-navigation-bg-hover-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Background Hover Color (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
    'validate' => 'color',
    ),
	array(
    'id'       => 'mobile-navigation-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Text Color (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
    array(
    'id'       => 'mobile-navigation-text-hover-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Text Hover/Active Color (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#3396d1',
    'validate' => 'color',
    ),
    array(
    'id'       => 'mobile-navigation-dropdown-bg',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Dropdown BG (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffffff',
    'validate' => 'color',
    ),
	array(
    'id'       => 'mobile-navigation-dropdown-hover-bg',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Dropdown Hover BG (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ebebeb',
    'validate' => 'color',
    ),
    array(
    'id'       => 'mobile-navigation-dropdown-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Dropdown Text Color (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
    array(
    'id'       => 'mobile-navigation-dropdown-text-hover',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Dropdown Text Hover (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#3396D1',
    'validate' => 'color',
    ),
	array(
    'id'       => 'mobile-navigation-button-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Button Text Color (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
	array(
    'id'       => 'mobile-navigation-button-border-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Button Border Color (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
	array(
    'id'       => 'mobile-navigation-button-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Button Background Color (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffb600',
    'validate' => 'color',
    ),
	array(
    'id'       => 'mobile-menu-button-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Menu Button Color (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#666666',
    'validate' => 'color',
    ),
	array(
    'id'       => 'mobile-menu-button-color-sticky',
    'type'     => 'color',
    'title'    => esc_html__( 'Sticky Menu Button Color (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#666666',
    'validate' => 'color',
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Navigation Styling for Inner Page', 'service-finder' ),
    'id'               => 'inner-navigation-styling',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'            => 'inner-parent-navigation-menu-fontsize',
    'type'          => 'slider',
    'title'         => esc_html__( 'Font Size of Parent Navigation Menu', 'service-finder' ),
    'subtitle'      => '(In px)',
    'desc'          => '',
    'default'       => 12,
    'min'           => 10,
    'step'          => 1,
    'max'           => 40,
    'resolution'    => 1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'inner-parent-navigation-menu-fontweight',
    'type'     => 'select',
    'title'    => esc_html__( 'Font Weight of Parent Navigation Menu', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'normal' => 'Normal',
    'bold' => 'Bold',
    ),
    'default'  => 'normal'
    ),
	array(
    'id'            => 'inner-child-navigation-menu-fontsize',
    'type'          => 'slider',
    'title'         => esc_html__( 'Font Size of Child Navigation Menu', 'service-finder' ),
    'subtitle'      => '(In px)',
    'desc'          => '',
    'default'       => 11,
    'min'           => 10,
    'step'          => 1,
    'max'           => 40,
    'resolution'    => 1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'inner-child-navigation-menu-fontweight',
    'type'     => 'select',
    'title'    => esc_html__( 'Font Weight of Child Navigation Menu', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'normal' => 'Normal',
    'bold' => 'Bold',
    ),
    'default'  => 'normal'
    ),
	array(
    'id'       => 'inner-navigation-bg-color-sticky',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Sticky Background Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffffff',
    'validate' => 'color',
    ),
	array(
    'id'       => 'inner-navigation-text-color-sticky',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Sticky Text Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
	array(
    'id'       => 'inner-navigation-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Background Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffffff',
    'validate' => 'color',
    ),
	array(
    'id'       => 'inner-navigation-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Text Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
    array(
    'id'       => 'inner-navigation-text-hover-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Text Hover/Active Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#3396d1',
    'validate' => 'color',
    ),
    array(
    'id'       => 'inner-navigation-dropdown-bg',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Dropdown BG', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffffff',
    'validate' => 'color',
    ),
	array(
    'id'       => 'inner-navigation-dropdown-hover-bg',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Dropdown Hover BG', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ebebeb',
    'validate' => 'color',
    ),
    array(
    'id'       => 'inner-navigation-dropdown-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Dropdown Text Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
    array(
    'id'       => 'inner-navigation-dropdown-text-hover',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Dropdown Text Hover', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#3396D1',
    'validate' => 'color',
    ),
	array(
    'id'       => 'inner-navigation-button-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Button Text Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
	array(
    'id'       => 'inner-navigation-button-border-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Button border Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
	array(
    'id'       => 'inner-navigation-button-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Button Background Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffb600',
    'validate' => 'color',
    ),
	array(
    'id'       => 'sticky-inner-navigation-button-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Button Background Color (Sticky)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
	array(
    'id'       => 'sticky-inner-navigation-button-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Button Text Color (Sticky)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#FFFFFF',
    'validate' => 'color',
    ),
	array(
    'id'       => 'sticky-inner-navigation-button-border-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Button border Color (Sticky)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#FFFFFF',
    'validate' => 'color',
    ),
	array(
    'id'       => 'mobile-inner-navigation-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Text Color (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
    array(
    'id'       => 'mobile-inner-navigation-text-hover-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Text Hover Color (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#3396d1',
    'validate' => 'color',
    ),
    array(
    'id'       => 'mobile-inner-navigation-dropdown-bg',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Dropdown BG (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffffff',
    'validate' => 'color',
    ),
	array(
    'id'       => 'mobile-inner-navigation-dropdown-hover-bg',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Dropdown Hover BG (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ebebeb',
    'validate' => 'color',
    ),
    array(
    'id'       => 'mobile-inner-navigation-dropdown-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Dropdown Text Color (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
    array(
    'id'       => 'mobile-inner-navigation-dropdown-text-hover',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Dropdown Text Hover (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#3396D1',
    'validate' => 'color',
    ),
	array(
    'id'       => 'mobile-inner-navigation-button-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Button Text Color (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
	array(
    'id'       => 'mobile-inner-navigation-button-border-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Button border Color (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#555555',
    'validate' => 'color',
    ),
	array(
    'id'       => 'mobile-inner-navigation-button-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Navigation Button Background Color (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffb600',
    'validate' => 'color',
    ),
	array(
    'id'       => 'mobile-inner-menu-button-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Menu Button Color (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#666666',
    'validate' => 'color',
    ),
	array(
    'id'       => 'mobile-inner-menu-button-color-sticky',
    'type'     => 'color',
    'title'    => esc_html__( 'Sticky Menu Button Color (Mobile)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#666666',
    'validate' => 'color',
    ),
    )
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Styling & Layout', 'service-finder' ),
    'id'               => 'styling-and-layout',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'color-scheme',
    'type'     => 'color',
    'title'    => esc_html__( 'Theme Primary Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#3396d1',
    'validate' => 'color',
    ),
	array(
    'id'       => 'seconday-color-scheme',
    'type'     => 'color',
    'title'    => esc_html__( 'Theme Secondary Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#77c04b',
    'validate' => 'color',
    ),
	array(
    'id'       => 'header-logo-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Header Logo Text Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#3396d1',
    'validate' => 'color',
    ),
	array(
    'id'       => 'footer-logo-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Footer Logo Text Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#3396d1',
    'validate' => 'color',
    ),
    array(
    'id'       => 'button-primary-background-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Button Primary Background Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#77c04b',
    'validate' => 'color',
    ),
    array(
    'id'       => 'button-primary-border-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Button Primary Border Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#62a643',
    'validate' => 'color',
    ),
    array(

    'id'       => 'button-primary-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Button Text Primary Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffffff',
    'validate' => 'color',
    ),
    array(
    'id'       => 'button-primary-hover-background-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Button Primary Hover Background Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#6ab33e',
    'validate' => 'color',
    ),
    array(
    'id'       => 'button-primary-hover-border-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Button Primary Hover Border Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#5a9e2f',
    'validate' => 'color',
    ),
    array(
    'id'       => 'button-primary-hover-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Button Primary Text Hover Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffffff',
    'validate' => 'color',
    ),
    array(
    'id'       => 'button-secondary-background-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Button Secondary Background Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#3396d1',
    'validate' => 'color',
    ),
    array(
    'id'       => 'button-secondary-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Button Secondary Text Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffffff',
    'validate' => 'color',
    ),
    array(
    'id'       => 'button-secondary-hover-background-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Button Secondary Hover Background Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#1f82bd',
    'validate' => 'color',
    ),
    array(
    'id'       => 'button-secondary-hover-border-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Button Secondary Hover Border Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#0c6faa',
    'validate' => 'color',
    ),
    array(
    'id'       => 'button-secondary-hover-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Button Secondary Text Hover Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffffff',
    'validate' => 'color',
    ),
	array(
    'id'       => 'link-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Link Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#3396d1',
    'validate' => 'color',
    ),
	array(
    'id'       => 'link-hover-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Link Hover Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#2C65A0',
    'validate' => 'color',
    ),
	array(
    'id'       => 'bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
    'validate' => 'color',
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'My Account Styling', 'service-finder' ),
    'id'               => 'myaccount-styling',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
     array(
    'id'       => 'myaccount-logo',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Logo for My Account', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => '',
    'subtitle' => esc_html__( 'Upload site logo for my account page', 'service-finder' ),
    ),
	array(
    'id'       => 'left-menu-bgcolor',
    'type'     => 'color',
    'title'    => esc_html__( 'Left Menu Background Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#3396d1',
    'validate' => 'color',
    ),
	array(
    'id'       => 'left-menu-font-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Left Menu Font Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#fff',
    'validate' => 'color',
    ),
    )
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Footer Setting', 'service-finder' ),
    'id'               => 'footer-setting',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'enable-sticky-footer',
    'type'     => 'switch',
    'title'    => esc_html__( 'Enable Sticky Footer', 'service-finder' ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'show-footer',
    'type'     => 'switch',
    'title'    => esc_html__( 'Show Top Footer', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
    array(
    'id'       => 'footer-background-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Footer Background Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#202020',
    'validate' => 'color',
    ),
	array(
    'id'       => 'top-footer-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Top Footer Text Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffffff',
    'validate' => 'color',
    ),
	array(
    'id'       => 'top-footer-text-bottom-border-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Top Footer Text Bottom Border Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#313131',
    'validate' => 'color',
    ),
	array(
    'id'       => 'top-footer-link-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Top Footer Link Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffffff',
    'validate' => 'color',
    ),
	array(
    'id'       => 'top-footer-link-hover-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Top Footer Link Hover Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffffff',
    'validate' => 'color',
    ),
    array(
    'id'            => 'footer-bg-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Footer Top Overlay', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => 'Only works with footer background image',
    'default'       => 0,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'            => 'footer-fontsize',
    'type'          => 'slider',
    'title'         => esc_html__( 'Footer Font Size', 'service-finder' ),
    'subtitle'      => '(In px)',
    'desc'          => '',
    'default'       => 13,
    'min'           => 12,
    'step'          => 1,
    'max'           => 40,
    'resolution'    => 1,
    'display_value' => 'text'
    ),
    array(
    'id'       => 'footer-layout',
    'type'     => 'image_select',
    'title'    => esc_html__( 'Footer Layout', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    //Must provide key => value(array:title|img) pairs for radio options
    'options'  => array(
    'col-4' => array(
    'alt' => '4 Column',
    'img' => get_template_directory_uri().'/inc/images/redux/f-col-4.jpg'
    ),
    'col-3' => array(
    'alt' => '3 Column',
    'img' => get_template_directory_uri().'/inc/images/redux/f-col-3.jpg'
    ),
    'col-2-1' => array(
    'alt' => '2-1 Column',
    'img' => get_template_directory_uri().'/inc/images/redux/f-col-2-1.jpg'
    ),
    'col-2' => array(
    'alt' => '2 Column',
    'img' => get_template_directory_uri().'/inc/images/redux/f-col-2.jpg'
    ),
    'col-1' => array(
    'alt' => '1-1 Column',
    'img' => get_template_directory_uri().'/inc/images/redux/f-col-1-4.jpg'
    ),
    'col-1-3' => array(
    'alt' => '1-3 Column',
    'img' => get_template_directory_uri().'/inc/images/redux/f-col-1-3.jpg'
    )
    ),
    'default'  => 'col-4'
    ),
    array(
    'id'       => 'show-bottom-footer',
    'type'     => 'switch',
    'title'    => esc_html__( 'Show Bottom Footer', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'footer-logo',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Footer Logo', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => '',
	'required' => array( 'theme-style', '=', 'style-4' ),
    'subtitle' => esc_html__( 'Upload footer logo', 'service-finder' ),
    ),
	array(
    'id'             => 'footer-logo-dimensions',
    'type'           => 'dimensions',
    'units'          => array( 'px', '%' ),    // You can specify a unit value. Possible: px, em, %
    'units_extended' => 'true',  // Allow users to select any type of unit
    'title'          => esc_html__( 'Logo Dimensions', 'service-finder' ),
    'subtitle'       => esc_html__( '(Width/Height)', 'service-finder' ),
    'desc'           => '',
	'required' => array( 'theme-style', '=', 'style-4' ),
    'default'        => array(
    'width'  => '',
    'height' => '30px',
    )
    ),
    array(
    'id'             => 'footer-logo-margin',
    'type'           => 'spacing',
    'mode'           => 'margin',
    'all'            => false,
    'units'          => array( 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
    'units_extended' => 'true',    // Allow users to select any type of unit
    'title'          => esc_html__( 'Logo Margin', 'service-finder' ),
    'subtitle'       => '',
    'desc'           => '',
	'required' => array( 'theme-style', '=', 'style-4' ),
    'default'        => array(
    'margin-top'    => '30px',
    'margin-right'  => '0px',
    'margin-bottom' => '30px',
    'margin-left'   => '0px'
    )
    ),
    array(
    'id'       => 'footer-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Footer BG Image', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => '',
    'subtitle' => '',
    ),
    array(
    'id'       => 'bottom-footer-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Bottom Footer BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#3396d1',
    'validate' => 'color',
    ),
    array(
    'id'       => 'bottom-footer-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Bottom Footer Text Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffffff',
    'validate' => 'color',
    ),
	array(
    'id'       => 'bottom-footer-social-line-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Bottom Footer Social Icon/Line Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
    'validate' => 'color',
    ),
    array(
    'id'            => 'bottom-footer-bg-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Footer Bottom Overlay', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => 'Only works with footer background image',
    'default'       => 0,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
    array(
    'id'       => 'show-copyright',
    'type'     => 'switch',
    'title'    => esc_html__( 'Show Copyright', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
    array(
    'id'      => 'copyright',
    'type'    => 'editor',
    'title'   => esc_html__( 'Copyright', 'service-finder' ),
    'desc' => "Enter Copyright Text Here",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Inner Page Banner Settings', 'service-finder' ),
    'id'               => 'sub-header-setting',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'sub-header',
    'type'     => 'switch',
    'title'    => esc_html__( 'Sub Header', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
    array(
    'id'       => 'contact-sub-header-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Contact Us Banner Image', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => esc_html__( '1920 x 345 px', 'service-finder' ),
    'subtitle' => esc_html__( 'For Contact Page', 'service-finder' ),
    ),
    array(
    'id'       => 'inner-sub-header-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Inner Page Banner Image', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => esc_html__( '2000 x 1280 px', 'service-finder' ),
    'subtitle' => '',
    ),
    array(
    'id'       => 'provider-sub-header-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => sprintf( esc_html__('%s Page Banner Image', 'service-finder'), $providerreplacestring ),
    'compiler' => 'true',
    'desc'     => esc_html__( '2000 x 1280 px', 'service-finder' ),
    'subtitle' => sprintf( esc_html__('For %s Page', 'service-finder'), $providerreplacestring ),
    ),
	array(
    'id'            => 'inner-banner-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Inner Banner Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => 0.3,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'inner-banner-bg-color',
    'type'     => 'color',
    'title'    => esc_html__('Inner Banner BG Color', 'service-finder'),
    'subtitle' => '',
    'default'  => '#000000',
    'validate' => 'color',
    ),
    )
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Background Images/Colors', 'service-finder' ),
    'id'               => 'background-images',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'         => 'left-right-curve-preview',
    'type'       => 'raw',
    'full_width' => false,
    'title'      => esc_html__( 'Preview for Left and Right Curve', 'service-finder' ),
    'subtitle'   => '',
    'desc'       => '',
    'content'    => '<img src="'.get_template_directory_uri().'/inc/images/redux/left-right-curve.jpg">',
    ),
	array(
    'id'       => 'left-right-curve',
    'type'     => 'switch',
    'title'    => esc_html__( 'Left Right Curve', 'service-finder' ),
	'desc'     => esc_html__( 'It will toggle left and right curve on theme style 3 for home page', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'how-works-left-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'How it Works Left Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#7754f4',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'how-works-right-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'How it Works Right Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#62b815',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'how-works-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'How it Works BG Image', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => esc_html__( '2000 x 1200 px', 'service-finder' ),
    'subtitle' => esc_html__( 'For Home Page', 'service-finder' ),
    ),
	array(
    'id'       => 'how-works-background-attachment',
    'type'     => 'button_set',
    'title'    => esc_html__( 'How it Works Background Attachment', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'scroll' => esc_html__( 'Scroll', 'service-finder' ),
    'fixed' => esc_html__( 'Fixed', 'service-finder' ),
    ),
	'default'  => 'fixed',
    ),
	array(
    'id'            => 'how-works-bg-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'How it Works BG Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => .8,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'how-works-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'How it Works BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
    'validate' => 'color',
    ),
	array(
    'id'       => 'city-left-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'City Left Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#7754f4',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'city-right-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'City Right Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#62b815',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'city-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'City BG Image', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => esc_html__( '2000 x 1200 px', 'service-finder' ),
    'subtitle' => esc_html__( 'For Home Page', 'service-finder' ),
    ),
	array(
    'id'       => 'city-background-attachment',
    'type'     => 'button_set',
    'title'    => esc_html__( 'City Background Attachment', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'scroll' => esc_html__( 'Scroll', 'service-finder' ),
    'fixed' => esc_html__( 'Fixed', 'service-finder' ),
    ),
	'default'  => 'fixed',
    ),
	array(
    'id'            => 'city-bg-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'City BG Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => .8,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'city-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'City BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
    'validate' => 'color',
    ),
	array(
    'id'       => 'statistics-left-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Statistics Left Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#7754f4',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'statistics-right-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Statistics Right Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#62b815',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'statistics-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Statistics BG Image', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => esc_html__( '2000 x 1200 px', 'service-finder' ),
    'subtitle' => esc_html__( 'For Home Page', 'service-finder' ),
    ),
	array(
    'id'       => 'statistics-background-attachment',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Statistics Background Attachment', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'scroll' => esc_html__( 'Scroll', 'service-finder' ),
    'fixed' => esc_html__( 'Fixed', 'service-finder' ),
    ),
	'default'  => 'fixed',
    ),
	array(
    'id'            => 'statistics-bg-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Statistics BG Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => .8,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'statistics-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Statistics BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
    'validate' => 'color',
    ),
	array(
    'id'       => 'pricing-plans-left-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Pricing Plans Left Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#7754f4',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'pricing-plans-right-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Pricing Plans Right Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#62b815',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'pricing-plans-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Pricing Plans BG Image', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => esc_html__( '2000 x 1200 px', 'service-finder' ),
    'subtitle' => esc_html__( 'For Home Page', 'service-finder' ),
    ),
	array(
    'id'       => 'pricing-plans-background-attachment',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Pricing Plans Background Attachment', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'scroll' => esc_html__( 'Scroll', 'service-finder' ),
    'fixed' => esc_html__( 'Fixed', 'service-finder' ),
    ),
	'default'  => 'fixed',
    ),
	array(
    'id'            => 'pricing-plans-bg-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Pricing Plans BG Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => .8,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'pricing-plans-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Pricing Plans BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
    'validate' => 'color',
    ),
	array(
    'id'       => 'testimonials-left-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Testimonials Left Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#7754f4',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'testimonials-right-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Testimonials Right Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#62b815',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'testimonials-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Testimonials BG Image', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => esc_html__( '2000 x 1200 px', 'service-finder' ),
    'subtitle' => esc_html__( 'For Home Page', 'service-finder' ),
    ),
	array(
    'id'       => 'testimonials-background-attachment',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Testimonials Background Attachment', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'scroll' => esc_html__( 'Scroll', 'service-finder' ),
    'fixed' => esc_html__( 'Fixed', 'service-finder' ),
    ),
	'default'  => 'fixed',
    ),
	array(
    'id'            => 'testimonials-bg-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Testimonials BG Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => .8,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'testimonials-upper-half-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Testimonials BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
    'validate' => 'color',
	'required' => array( 'home-page-style', '=', '2' ),
    ),
	array(
    'id'       => 'testimonials-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Testimonials Upper Half BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
    'validate' => 'color',
    ),
	array(
    'id'       => 'latest-blogs-left-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Latest Blogs Left Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#7754f4',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'latest-blogs-right-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Latest Blogs Right Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#62b815',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'latest-blogs-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Latest Blogs BG Image', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => esc_html__( '2000 x 1200 px', 'service-finder' ),
    'subtitle' => esc_html__( 'For Home Page', 'service-finder' ),
    ),
	array(
    'id'       => 'latest-blogs-background-attachment',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Latest Blogs Background Attachment', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'scroll' => esc_html__( 'Scroll', 'service-finder' ),
    'fixed' => esc_html__( 'Fixed', 'service-finder' ),
    ),
	'default'  => 'fixed',
    ),
	array(
    'id'            => 'latest-blogs-bg-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Latest Blogs BG Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => .8,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'latest-blogs-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Latest Blogs BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
    'validate' => 'color',
    ),
	array(
    'id'       => 'jobs-left-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Jobs Left Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#7754f4',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'jobs-right-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Jobs Right Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#62b815',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'jobs-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Jobs BG Image', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => esc_html__( '2000 x 1200 px', 'service-finder' ),
    'subtitle' => esc_html__( 'For Home Page', 'service-finder' ),
    ),
	array(
    'id'       => 'jobs-background-attachment',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Jobs Background Attachment', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'scroll' => esc_html__( 'Scroll', 'service-finder' ),
    'fixed' => esc_html__( 'Fixed', 'service-finder' ),
    ),
	'default'  => 'fixed',
    ),
	array(
    'id'            => 'jobs-bg-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Jobs BG Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => .8,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'jobs-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Jobs BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
    'validate' => 'color',
    ),
	array(
    'id'       => 'featured-providers-left-curve-color',
    'type'     => 'color',
    'title'    => sprintf( esc_html__('Featured %s Left Curve Color', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'default'  => '#7754f4',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'featured-providers-right-curve-color',
    'type'     => 'color',
    'title'    => sprintf( esc_html__('Featured %s Right Curve Color', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'default'  => '#62b815',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'featured-providers-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => sprintf( esc_html__('Featured %s BG Image', 'service-finder'), $providerreplacestring ),
    'compiler' => 'true',
    'desc'     => esc_html__( '1920 x 1200 px', 'service-finder' ),
    'subtitle' => esc_html__( 'For Home Page', 'service-finder' ),
    ),
	array(
    'id'       => 'featured-providers-background-attachment',
    'type'     => 'button_set',
    'title'    => sprintf( esc_html__('Featured %s Background Attachment', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'scroll' => esc_html__( 'Scroll', 'service-finder' ),
    'fixed' => esc_html__( 'Fixed', 'service-finder' ),
    ),
	'default'  => 'scroll',
    ),
	array(
    'id'            => 'featured-providers-bg-opacity',
    'type'          => 'slider',
    'title'         => sprintf( esc_html__('Featured %s BG Opacity', 'service-finder'), $providerreplacestring ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => .8,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'featured-providers-bg-color',
    'type'     => 'color',
    'title'    => sprintf( esc_html__('Featured %s BG Color', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'default'  => '',
    'validate' => 'color',
    ),
	array(
    'id'       => 'follow-us-left-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Follow Us Left Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#7754f4',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'follow-us-right-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Follow Us Right Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#62b815',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
    array(
    'id'       => 'follow-us-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Follow Us BG Image', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => esc_html__( '2000 x 1200 px', 'service-finder' ),
    'subtitle' => esc_html__( 'For Home Page', 'service-finder' ),
    ),
	array(
    'id'       => 'follow-us-background-attachment',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Follow Us Background Attachment', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'scroll' => esc_html__( 'Scroll', 'service-finder' ),
    'fixed' => esc_html__( 'Fixed', 'service-finder' ),
    ),
	'default'  => 'fixed',
    ),
	array(
    'id'            => 'follow-us-bg-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Follow Us BG Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => .8,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'follow-us-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Follow Us BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
    'validate' => 'color',
    ),
	array(
    'id'       => 'category-left-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Category Left Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#7754f4',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'category-right-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Category Right Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#62b815',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'category-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Category BG Image', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => esc_html__( '2000 x 1200 px', 'service-finder' ),
    'subtitle' => esc_html__( 'For Home Page', 'service-finder' ),
    ),
	array(
    'id'       => 'category-background-attachment',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Category Background Attachment', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'scroll' => esc_html__( 'Scroll', 'service-finder' ),
    'fixed' => esc_html__( 'Fixed', 'service-finder' ),
    ),
	'default'  => 'fixed',
    ),
	array(
    'id'            => 'category-bg-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Category BG Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => .8,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'category-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Category BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
    'validate' => 'color',
    ),
	array(
    'id'       => 'why-choose-us-left-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Why Choose Us Left Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#7754f4',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'why-choose-us-right-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Why Choose Us Right Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#62b815',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'why-choose-us-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Why Choose Us BG Image', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => esc_html__( '2000 x 1200 px', 'service-finder' ),
    'subtitle' => esc_html__( 'For Home Page', 'service-finder' ),
    ),
	array(
    'id'       => 'why-choose-us-background-attachment',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Why Choose Us Background Attachment', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'scroll' => esc_html__( 'Scroll', 'service-finder' ),
    'fixed' => esc_html__( 'Fixed', 'service-finder' ),
    ),
	'default'  => 'scroll',
    ),
	array(
    'id'            => 'why-choose-us-bg-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Why Choose Us BG Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => .8,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'why-choose-us-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Why Choose Us BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
    'validate' => 'color',
    ),
	array(
    'id'       => 'after-title-separator',
    'type'     => 'switch',
    'title'    => esc_html__( 'After Title Separator', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'icon-between-devider',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'After Title Separator Icon', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => esc_html__( '25 x 25 px', 'service-finder' ),
    ),
    array(
    'id'       => 'bio-left-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Bio Left Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#7754f4',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'bio-right-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Bio Right Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#62b815',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'bio-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Bio BG Image', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => esc_html__( '1920 x 1200 px', 'service-finder' ),
    'subtitle' => esc_html__( 'For Who\'s on service finder.com section on home page', 'service-finder' ),
    ),
	array(
    'id'       => 'bio-background-attachment',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Bio Background Attachment', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'scroll' => esc_html__( 'Scroll', 'service-finder' ),
    'fixed' => esc_html__( 'Fixed', 'service-finder' ),
    ),
	'default'  => 'fixed',
    ),
	array(
    'id'            => 'bio-bg-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Bio BG Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => .8,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'bio-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Bio BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
    'validate' => 'color',
    ),
	array(
    'id'       => 'features-left-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Features Left Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#7754f4',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'features-right-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Features Right Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#62b815',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'features-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Features BG Image', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => esc_html__( '1920 x 1200 px', 'service-finder' ),
    'subtitle' => esc_html__( 'For Who\'s on service finder.com section on home page', 'service-finder' ),
    ),
	array(
    'id'       => 'features-background-attachment',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Features Background Attachment', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'scroll' => esc_html__( 'Scroll', 'service-finder' ),
    'fixed' => esc_html__( 'Fixed', 'service-finder' ),
    ),
	'default'  => 'fixed',
    ),
	array(
    'id'            => 'features-bg-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Features BG Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => .8,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'features-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Features BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
    'validate' => 'color',
    ),
    array(
    'id'       => 'photo-gallery-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Photo Gallery BG Image', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => esc_html__( '1920 x 1200 px', 'service-finder' ),
    'subtitle' => esc_html__( 'For photo gallery section on provider\'s page style 2', 'service-finder' ),
    ),
	array(
    'id'       => 'photo-gallery-background-attachment',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Photo Gallery Background Attachment', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'scroll' => esc_html__( 'Scroll', 'service-finder' ),
    'fixed' => esc_html__( 'Fixed', 'service-finder' ),
    ),
	'default'  => 'fixed',
    ),
	array(
    'id'            => 'photo-gallery-bg-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Photo Gallery BG Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => .8,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'photo-gallery-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Photo Gallery BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
    'validate' => 'color',
    ),
    array(
    'id'       => 'request-quote-bg-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Request a Quote BG Image', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => esc_html__( '2000 x 1200 px', 'service-finder' ),
    'subtitle' => esc_html__( 'For request a quote section on provider\'s page style 2', 'service-finder' ),
    ),
	array(
    'id'       => 'request-quote-background-attachment',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Request a Quote Background Attachment', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'scroll' => esc_html__( 'Scroll', 'service-finder' ),
    'fixed' => esc_html__( 'Fixed', 'service-finder' ),
    ),
	'default'  => 'fixed',
    ),
	array(
    'id'            => 'request-quote-bg-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Request a Quote BG Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => .8,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'request-quote-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Request a Quote BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
    'validate' => 'color',
    ),
    array(
    'id'           => 'quote-description',
    'type'         => 'textarea',
    'title'        => esc_html__( 'Description for Request a Quote', 'service-finder' ),
    'subtitle'     => esc_html__( 'Enter description for request a quote section', 'service-finder' ),
    'desc'         => '',
    'validate'     => 'html_custom',
    'default'      => '',
    'allowed_html' => array(
    'a'      => array(
    'href'  => array(),
    'title' => array()
    ),
    'br'     => array(),
    'em'     => array(),
    'strong' => array()
    ) 
    ),
    )
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Blog Settings', 'service-finder' ),
    'id'               => 'blog-setting',
    'subsection'       => true,
    'customizer_width' => '450px',
	'customizer'           => false,
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'blog-templates',
    'type'     => 'image_select',
    'title'    => esc_html__( 'Blog Templates', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    //Must provide key => value(array:title|img) pairs for radio options
    'options'  => array(
    'blog-grid-2' => array(
    'alt' => 'Blog Grid 2',
    'img' => get_template_directory_uri().'/inc/images/redux/blog-grid-2.jpg'
    ),
    'blog-grid-3' => array(
    'alt' => 'Blog Grid 3',
    'img' => get_template_directory_uri().'/inc/images/redux/blog-grid-3.jpg'
    ),
    'blog-standard' => array(
    'alt' => 'Blog Large Image',
    'img' => get_template_directory_uri().'/inc/images/redux/blog-large-image.jpg'
    ),
    'blog-left-sidebar' => array(
    'alt' => 'Blog with Left Sidebar',
    'img' => get_template_directory_uri().'/inc/images/redux/left-sidebar.jpg'
    ),
    'blog-no-sidebar' => array(
    'alt' => 'Blog with No Sidebar',
    'img' => get_template_directory_uri().'/inc/images/redux/no-side-bar.jpg'
    ),
    'blog-right-sidebar' => array(
    'alt' => 'Blog with Right Sidebar',
    'img' => get_template_directory_uri().'/inc/images/redux/blog-half-image.jpg'
    )
    ),
    'default'  => 'blog-standard'
    ),
    )
    ) );
    
	$allcountries = service_finder_get_allcountries();
    if(!empty($allcountries)){
    foreach($allcountries as $country){
    $countryarr[$country] = $country;
    }
    }else{
    $countryarr[] = 'Please Select a Country';
    }
    
    $service_finder_options = get_option('service_finder_options');
    if($wpdb->get_var("SHOW TABLES LIKE '".$service_finder_Tables->providers."'") == $service_finder_Tables->providers) {
	
	if(!empty($service_finder_options['default-country'])){
    $defaultcities = $wpdb->get_results('SELECT DISTINCT city FROM '.$service_finder_Tables->providers.' WHERE admin_moderation = "approved" AND account_blocked != "yes" AND `country` LIKE "'.$service_finder_options['default-country'].'"');
    if(!empty($defaultcities)){
	$cityarr[] = 'Please Select a City';
    foreach($defaultcities as $city){
    $cityarr[$city->city] = $city->city;
    }
    }else{
    $cityarr[] = 'Please Select a City';
    }
    }else{
    $cityarr[] = 'Please Select a City';
    }
	
	}else{
	$cityarr[] = 'Please Select a City';
	}
    
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Page Setting', 'service-finder' ),
    'id'               => 'page-setting',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'page-sidebar',
    'type'     => 'switch',
    'title'    => esc_html__( 'Page Sidebar', 'service-finder' ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'sidebar-position',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Sidebar Position', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    //Must provide key => value pairs for radio options
    'options'  => array(
    'left' => esc_html__( 'Left', 'service-finder' ),
    'right' => esc_html__( 'Right', 'service-finder' ),
    ),
    'default'  => 'right'
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Map Setting', 'service-finder' ),
    'id'               => 'map-setting',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'google-map-api-key',
    'type'     => 'text',
    'title'    => esc_html__( 'Browser API Key', 'service-finder' ),
    'desc' => esc_html__( 'Enter Registered Browser API Key by Google (Required)', 'service-finder' ),
    ),
	array(
    'id'       => 'server-api-key',
    'type'     => 'text',
    'title'    => esc_html__( 'Server API Key', 'service-finder' ),
    'desc' => esc_html__( 'Enter Registered Server API Key by Google (Required)', 'service-finder' ),
    ),
	array(
    'id'       => 'default-map-marker-icon',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Default Map Marker Icon', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => esc_html__( '20 x 32 px', 'service-finder' ),
    'subtitle' => '',
    ),
	array(
    'id'       => 'server-key-response',
    'type'     => 'switch',
    'title'    => esc_html__( 'Display Server Key Response', 'service-finder' ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'            => 'map-height-desktop',
    'type'          => 'slider',
    'title'         => esc_html__( 'Map Height in Desktop', 'service-finder' ),
    'subtitle'      => '(In px)',
    'desc'          => 'Works only for home page',
    'default'       => 600,
    'min'           => 100,
    'step'          => 1,
    'max'           => 1000,
    'resolution'    => 1,
    'display_value' => 'text'
    ),
	array(
    'id'            => 'map-height-ipad',
    'type'          => 'slider',
    'title'         => esc_html__( 'Map Height in Ipad', 'service-finder' ),
    'subtitle'      => '(In px)',
    'desc'          => 'Works only for home page',
    'default'       => 650,
    'min'           => 100,
    'step'          => 1,
    'max'           => 1000,
    'resolution'    => 1,
    'display_value' => 'text'
    ),
	array(
    'id'            => 'map-height-mobile',
    'type'          => 'slider',
    'title'         => esc_html__( 'Map Height in Mobile', 'service-finder' ),
    'subtitle'      => '(In px)',
    'desc'          => 'Works only for home page',
    'default'       => 350,
    'min'           => 100,
    'step'          => 1,
    'max'           => 1000,
    'resolution'    => 1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'remove-map-from-site',
    'type'     => 'switch',
    'title'    => esc_html__( 'Remove Map from Site', 'service-finder' ),
	'desc'     => esc_html__( 'This will remove map from site.', 'service-finder' ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'remove-autosuggestion-from-site',
    'type'     => 'switch',
    'title'    => esc_html__( 'Remove Google Auto Suggestion from Site', 'service-finder' ),
	'desc'     => esc_html__( 'This will remove google auto suggestion from all text inputs from site.', 'service-finder' ),
    'subtitle' => '',
    'default'  => false,
    ),
    array(
    'id'       => 'default-location-section',
    'type'     => 'section',
    'title'    => esc_html__( 'Default Location', 'service-finder' ),
    'subtitle' => 'Only registered providers cities will be populated here.',
    'indent'   => false,
    ),
    array(
    'id'       => 'default-country',
    'type'     => 'select',
    'title'    => esc_html__( 'Select Country', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => $countryarr,
    ),
    array(
    'id'       => 'default-city',
    'type'     => 'select',
    'title'    => esc_html__( 'Select City', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => $cityarr,
    ),
    array(
    'id'       => 'map-color-administrative',
    'type'     => 'color',
    'title'    => esc_html__( 'Map Color (Administrative)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#0088ff',
    'validate' => 'color',
    ),
    array(
    'id'       => 'map-color-landscape',
    'type'     => 'color',
    'title'    => esc_html__( 'Map Color (Landscape)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ff0000',
    'validate' => 'color',
    ),
    array(
    'id'       => 'map-color-poi-government',
    'type'     => 'color',
    'title'    => esc_html__( 'Map Color (Poi-Government)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#aaaaaa',
    'validate' => 'color',
    ),
    array(
    'id'       => 'map-color-road-geometry',
    'type'     => 'color',
    'title'    => esc_html__( 'Map Color (Road Geometry)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#f0ece9',
    'validate' => 'color',
    ),
    array(
    'id'       => 'map-color-road-labels',
    'type'     => 'color',
    'title'    => esc_html__( 'Map Color (Road Labels)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ccdca1',
    'validate' => 'color',
    ),
    array(
    'id'       => 'map-color-water-all',
    'type'     => 'color',
    'title'    => esc_html__( 'Map Color (Water All)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#767676',
    'validate' => 'color',
    ),
    array(
    'id'       => 'map-color-water-geometry',
    'type'     => 'color',
    'title'    => esc_html__( 'Map Color (Water Geometry)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#ffffff',
    'validate' => 'color',
    ),
    array(
    'id'       => 'map-color-water-labels',
    'type'     => 'color',
    'title'    => esc_html__( 'Map Color (Water Labels)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#e8e0d8',
    'validate' => 'color',
    ),
	array(
    'id'       => 'map-color-cluster',
    'type'     => 'color',
    'title'    => esc_html__( 'Map Color (Cluster)', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#0088ff',
    'validate' => 'color',
    ),
	array(
    'id'            => 'zoom-level-address',
    'type'          => 'slider',
    'title'         => esc_html__( 'Zoom Level for Address', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => 'It works only for home page',
    'default'       => 14,
    'min'           => 0,
    'step'          => 1,
    'max'           => 20,
    'display_value' => 'text'
    ),
	array(
    'id'            => 'zoom-level-city',
    'type'          => 'slider',
    'title'         => esc_html__( 'Zoom Level for City', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => 'It works only for home page',
    'default'       => 12,
    'min'           => 0,
    'step'          => 1,
    'max'           => 20,
    'display_value' => 'text'
    ),
	array(
    'id'            => 'zoom-level-country',
    'type'          => 'slider',
    'title'         => esc_html__( 'Zoom Level for Country', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => 'It works only for home page',
    'default'       => 5,
    'min'           => 0,
    'step'          => 1,
    'max'           => 20,
    'display_value' => 'text'
    ),
    array(
    'id'            => 'zoom-level',
    'type'          => 'slider',
    'title'         => esc_html__( 'Zoom Level', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => 'It works only for inner pages like contact us, provider profile etc..',
    'default'       => 15,
    'min'           => 0,
    'step'          => 1,
    'max'           => 20,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'map-radius-fill-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Radius Fill Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#00a802',
    'validate' => 'color',
    ),
	array(
    'id'       => 'map-radius-border-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Radius Border Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#8224e3',
    'validate' => 'color',
    ),
	array(
    'id'            => 'radius-fill-color-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Radius Fill Color Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => .3,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'            => 'radius-border-color-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Radius Border Color Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => .8,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'            => 'radius-border-thickness',
    'type'          => 'slider',
    'title'         => esc_html__( 'Radius border thickness', 'service-finder' ),
    'subtitle'      => '',
    'default'       => 2,
    'min'           => 1,
    'step'          => 1,
    'max'           => 3,
    'display_value' => 'text'
    ),
    )
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Search Setting', 'service-finder' ),
    'id'               => 'search-setting',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'search-template',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Search Template', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    //Must provide key => value pairs for radio options
    'options'  => array(
    'style-1' => esc_html__( 'Style 1', 'service-finder' ),
    'style-2' => esc_html__( 'Style 2', 'service-finder' ),
    ),
    'default'  => 'style-1'
    ),
	array(
    'id'       => 'search-bar-position-searchpage',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Search Bar Position', 'service-finder' ),
    'subtitle' => '',
    'desc'     => 'Only works for search page (style 1)',
    //Must provide key => value pairs for radio options
    'options'  => array(
    'middle' => esc_html__( 'In Middle', 'service-finder' ),
    'bottom' => esc_html__( 'In Bottom', 'service-finder' ),
    ),
    'default'  => 'bottom'
    ),
	array(
    'id'       => 'default-view',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Default View (Style 1)', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( '"Grid View 4 Column" not available in theme style 4.', 'service-finder' ),
    //Must provide key => value pairs for radio options
    'options'  => array(
    'grid-4' => 'Grid View 4 Column',
    'grid-3' => 'Grid View 3 Column',
	'listview' => 'List View',
    ),
    'default'  => 'grid-4'
    ),
	array(
    'id'       => 'default-view-2',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Default View (Style 2)', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    //Must provide key => value pairs for radio options
    'options'  => array(
    'grid-2' => 'Grid View 2 Column',
	'listview' => 'List View',
    ),
    'default'  => 'grid-2'
    ),
	array(
    'id'       => 'srhresult-search-bar',
    'type'     => 'switch',
    'title'    => esc_html__( 'Hide Search Bar', 'service-finder' ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'auto-location-detect',
    'type'     => 'switch',
    'title'    => esc_html__( 'Auto Location Detect', 'service-finder' ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'search-bar-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Search Bar BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#fff',
    'validate' => 'color',
    ),
	array(
    'id'       => 'search-bar-bg-color-mobile',
    'type'     => 'color',
    'title'    => esc_html__( 'Search Bar BG Color in Mobile', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#3396d1',
    'validate' => 'color',
    ),
	array(
    'id'            => 'search-bar-bg-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Search Bar BG Opacity', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => .3,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
    array(
    'id'       => 'search-header-style',
    'type'     => 'select',
    'title'    => esc_html__( 'Search Page Header Style', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'banner' => 'Banner',
    'map' => 'Map',
    ),
    'default'  => 'map'
    ),
    array(
    'id'       => 'search-style',
    'type'     => 'select',
    'title'    => esc_html__( 'Search Style', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'ajax-search' => 'Ajax Search',
    'page-reload' => 'Page Realod',
    'ajax-with-url-change' => 'Ajax Search with URL Change',
    ),
    'default'  => 'ajax-search'
    ),
	array(
    'id'       => 'search-default-orderby',
    'type'     => 'select',
    'title'    => esc_html__( 'Default Order By', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'id' => esc_html__( 'Newest', 'service-finder' ),
	'rating' => esc_html__( 'Rating', 'service-finder' ),
    'title' => esc_html__( 'Title', 'service-finder' ),
    'distance' => esc_html__( 'Distance', 'service-finder' )
    ),
    'default'  => esc_html__( 'id', 'service-finder' )
    ),
	array(
    'id'       => 'search-default-order',
    'type'     => 'select',
    'title'    => esc_html__( 'Default Order', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'asc' => esc_html__( 'Asc', 'service-finder' ),
	'desc' => esc_html__( 'Desc', 'service-finder' ),
    ),
    'default'  => esc_html__( 'desc', 'service-finder' )
    ),
	array(
    'id'       => 'search-btn-text',
    'type'     => 'text',
    'title'    => esc_html__( 'Text on Search Button', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    ),
    array(
    'id'      => 'srh-per-page',
    'type'    => 'spinner',
    'title'   => esc_html__( 'Show number of items per page', 'service-finder' ),
    'desc'    => '',
    'default' => '12',
    'min'     => '1',
    'step'    => '1',
    'max'     => '120',
    ),
	array(
    'id'       => 'show-empty-category',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Show Empty Category in Search Dropdown', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'yes' => esc_html__( 'Yes', 'service-finder' ),
	'no' => esc_html__( 'No', 'service-finder' ),
    ),
    'default'  => 'yes'
    ),
	array(
    'id'       => 'show-featured-providers-top',
    'type'     => 'switch',
    'title'    => esc_html__( 'Show Featured Providers on Top', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'advance-search-view',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Advance Search Default View', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    //Must provide key => value pairs for radio options
    'options'  => array(
    'show' => esc_html__( 'Show', 'service-finder' ),
	'hide' => esc_html__( 'Hide', 'service-finder' ),
    ),
    'default'  => 'hide'
    ),
	array(
    'id'       => 'search-filters-section',
    'type'     => 'section',
    'title'    => esc_html__( 'Search Filters', 'service-finder' ),
    'subtitle' => '',
    'indent'   => false,
    ),
	array(
    'id'       => 'filter-by-availability',
    'type'     => 'switch',
    'title'    => esc_html__( 'Filter by Availability', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'filter-by-gender',
    'type'     => 'switch',
    'title'    => esc_html__( 'Filter by Gender', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'search-fields-section',
    'type'     => 'section',
    'title'    => esc_html__( 'Search Fields', 'service-finder' ),
    'subtitle' => '',
    'indent'   => false,
    ),
	array(
    'id'       => 'search-keyword',
    'type'     => 'switch',
    'title'    => esc_html__( 'Keyword', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'search-address',
    'type'     => 'switch',
    'title'    => esc_html__( 'Address', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'search-category',
    'type'     => 'switch',
    'title'    => esc_html__( 'Category', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'search-country',
    'type'     => 'switch',
    'title'    => esc_html__( 'Country', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'search-state',
    'type'     => 'switch',
    'title'    => esc_html__( 'State', 'service-finder' ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'search-city',
    'type'     => 'switch',
    'title'    => esc_html__( 'City', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'search-zipcode',
    'type'     => 'switch',
    'title'    => esc_html__( 'Zipcode', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'search-price',
    'type'     => 'switch',
    'title'    => esc_html__( 'Price Range', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'search-radius',
    'type'     => 'switch',
    'title'    => esc_html__( 'Radius', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'            => 'search-max-price',
    'type'          => 'slider',
    'title'         => esc_html__( 'Maximum Price for Search Filter', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => 1000,
    'min'           => 1,
    'step'          => 1,
    'max'           => 100000,
    'resolution'    => 1,
    'display_value' => 'text'
    ),
	array(
    'id'            => 'search-max-radius',
    'type'          => 'slider',
    'title'         => esc_html__( 'Maximum Radius for Search Filter', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => 1000,
    'min'           => 1,
    'step'          => 1,
    'max'           => 5000,
    'resolution'    => 1,
    'display_value' => 'text'
    ),
	array(
    'id'            => 'default-radius',
    'type'          => 'slider',
    'title'         => esc_html__( 'Default Radius', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => 0,
    'min'           => 0,
    'step'          => 1,
    'max'           => 5000,
    'resolution'    => 1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'radius-search-unit',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Radius Search in', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'mi' => 'Miles',
	'km' => 'Km',
    ),
    'default'  => 'mi'
    ),
    array(
    'id'         => 'search-preview',
    'type'       => 'raw',
    'full_width' => false,
    'title'      => esc_html__( 'Preview', 'service-finder' ),
    'subtitle'   => '',
    'desc'       => '',
    'content'    => '<img src="'.get_template_directory_uri().'/inc/images/redux/search-template-demo.jpg">',
    ),
    )
    ) );
    
    $categories = $wpdb->get_results("SELECT t.term_id, t.name, t.slug FROM ".$wpdb->prefix."terms AS t INNER JOIN ".$wpdb->prefix."term_taxonomy AS tt ON (t.term_id = tt.term_id) WHERE tt.taxonomy IN ('providers-category') ORDER BY t.name ASC");
    
    if(!empty($categories)){
    foreach($categories as $category){
    $categoryarr[$category->term_id] = $category->name;
    }
    }else{
    $categoryarr[] = '';
    }

    Redux::setSection( $opt_name, array(
    'title'            => esc_html($providerreplacestring).' '.esc_html__( 'Category Settings', 'service-finder' ),
    'id'               => 'provider-category-setting',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'sub-category-layout',
    'type'     => 'button_set',
    'title'    => sprintf( esc_html__('Sub Category Layout on %s Category Page', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    //Must provide key => value pairs for radio options
    'options'  => array(
    'style-1' => 'Style 1',
    'style-2' => 'Style 2',
	'style-3' => 'Style 3',
    ),
    'default'  => 'style-1'
    ),
	array(
    'id'       => 'category-default-view',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Default View', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( '"Grid View 4 Column" not available in theme style 4.', 'service-finder' ),
    //Must provide key => value pairs for radio options
    'options'  => array(
    'grid-4' => 'Grid View 4 Column',
    'grid-3' => 'Grid View 3 Column',
	'listview' => 'List View',
    ),
    'default'  => 'grid-4'
    ),
    array(
    'id'            => 'overlay-hover-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Overlay Opacity on Hover', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => 0.3,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'search-bar-position-categorypage',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Search Bar Position', 'service-finder' ),
    'subtitle' => '',
    'desc'     => 'Only works for category page',
    //Must provide key => value pairs for radio options
    'options'  => array(
    'middle' => esc_html__( 'In Middle', 'service-finder' ),
    'bottom' => esc_html__( 'In Bottom', 'service-finder' ),
    ),
    'default'  => 'bottom'
    ),
	array(
    'id'       => 'category-search-bar',
    'type'     => 'switch',
    'title'    => esc_html__( 'Hide Search Bar', 'service-finder' ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'show-category-featured-providers-top',
    'type'     => 'switch',
    'title'    => esc_html__( 'Show Featured Providers on Top', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'providers-category-replace-string',
    'type'     => 'text',
    'title'    => sprintf( esc_html__( 'String that will replace "providers-category" Word on %s Category Page URL', 'service-finder' ), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => esc_html__('Leave blank for no changes', 'service-finder'),
    'default'  => '',
    ),
	array(
    'id'       => 'category-image-banner',
    'type'     => 'switch',
    'title'    => esc_html__( 'Use Category Image as Banner for Individual Category Page', 'service-finder' ),
	'desc'     => esc_html__( 'Use 2000 x 1200 px image for better quality banner', 'service-finder' ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'homepage-categories',
    'type'     => 'select',
    'multi'    => true,
	'sortable' => true,
    'title'    => esc_html__( 'Home Page Categories', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => $categoryarr,
    'default'  => ''
    ),
	array(
    'id'         => 'category-styles',
    'type'       => 'raw',
    'full_width' => false,
    'title'      => esc_html__( 'Style Preview', 'service-finder' ),
    'subtitle'   => '',
    'desc'       => '',
    'content'    => '<img src="'.get_template_directory_uri().'/inc/images/redux/provider-categories.jpg">',
    ),
    )
    ) );
	
	Redux::setSection( $opt_name, array(
    'title'            => esc_html($providerreplacestring).' '.esc_html__( 'Cities Settings', 'service-finder' ),
    'id'               => 'provider-cities-setting',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'            => 'city-overlay-hover-opacity',
    'type'          => 'slider',
    'title'         => esc_html__( 'Overlay Opacity on Hover', 'service-finder' ),
    'subtitle'      => '',
    'desc'          => '',
    'default'       => 0.3,
    'min'           => 0,
    'step'          => .1,
    'max'           => 1,
    'resolution'    => 0.1,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'search-bar-position-citypage',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Search Bar Position', 'service-finder' ),
    'subtitle' => '',
    'desc'     => 'Only works for city page',
    //Must provide key => value pairs for radio options
    'options'  => array(
    'middle' => esc_html__( 'In Middle', 'service-finder' ),
    'bottom' => esc_html__( 'In Bottom', 'service-finder' ),
    ),
    'default'  => 'bottom'
    ),
	array(
    'id'       => 'city-search-bar',
    'type'     => 'switch',
    'title'    => esc_html__( 'Hide Search Bar', 'service-finder' ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'show-city-featured-providers-top',
    'type'     => 'switch',
    'title'    => esc_html__( 'Show Featured Providers on Top', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    )
    )
    ) );

    /*Shortcode settings*/ 
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Shortcodes Settings', 'service-finder' ),
		'id'               => 'shortcodes-settings',
		'desc'             => esc_html__( 'Manage shortcode settings from here', 'service-finder' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-cogs'
    ) );
	
	/*Shortcode - service finder cities settings*/
	$allcountry = (!empty($service_finder_options['all-countries'])) ? $service_finder_options['all-countries'] : '';
	$countryarr[] = '';
	if(class_exists('service_finder_booking_plugin'))
	{
	$countries = service_finder_get_countries_for_theme();
	if($allcountry){
	  if(!empty($countries)){
		foreach($countries as $key => $country){
			 $countryarr[$country] = $country;
		}
	  }
	}else{
	 $countryarr = (!empty($service_finder_options['allowed-country'])) ? $service_finder_options['allowed-country'] : array();
	 if(!empty($countryarr)){
		foreach($countryarr as $key){
			$countryarr[$countries[$key]] = $countries[$key];
		}
	 }
	}
	}
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Cities', 'service-finder' ),
		'id'               => 'shortcodes-cities-settings',
		'customizer'       => false,
		'icon' 			   => 'el-icon-tasks',
		'subsection'       => true,
		'customizer_width' => '450px',
		'desc'             => '',
        'fields'           => array(
			array(
                'id'       => 'shortcode-city-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-city-tagline',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Tagline', 'service-finder' ),
                'validate' => 'no_html',
            ),
			array(
				'id'       => 'shortcode-city-title-color',
				'type'     => 'color',
				'title'    => esc_html__('Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-city-tagline-color',
				'type'     => 'color',
				'title'    => esc_html__('Tagline Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-city-divider-color',
				'type'     => 'color',
				'title'    => esc_html__('Divider Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#a7a7a7',
				'validate' => 'color',
			),
			array(
                'id'       => 'shortcode-city-limit',
                'type'     => 'text',
                'title'    => esc_html__( 'Number of Cities', 'service-finder' ),
				'default'  => 6
            ),
			array(
				'id'       => 'shortcode-city-country',
				'type'     => 'select',
				'title'    => esc_html__( 'Country', 'service-finder' ),
				'subtitle' => '',
				'desc'     => '',
				'options'  => $countryarr,
				'default'  => ''
			),
        )
    ) );
	
	/*Shortcode - service finder categories settings*/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Categories', 'service-finder' ),
		'id'               => 'shortcodes-categories-settings',
		'customizer'       => false,
		'icon' 			   => 'el-icon-tasks',
		'subsection'       => true,
		'customizer_width' => '450px',
		'desc'             => '',
        'fields'           => array(
			array(
                'id'       => 'shortcode-categories-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-categories-subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Sub Title', 'service-finder' ),
				'required' => array( 'theme-style', '=', 'style-4' ),
            ),
			array(
                'id'       => 'shortcode-categories-tagline',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Tagline', 'service-finder' ),
                'validate' => 'no_html',
            ),
			array(
				'id'       => 'shortcode-categories-title-color',
				'type'     => 'color',
				'title'    => esc_html__('Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-categories-subtitle-color',
				'type'     => 'color',
				'title'    => esc_html__('Sub Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
				'required' => array( 'theme-style', '=', 'style-4' ),
			),
			array(
				'id'       => 'shortcode-categories-tagline-color',
				'type'     => 'color',
				'title'    => esc_html__('Tagline Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-categories-divider-color',
				'type'     => 'color',
				'title'    => esc_html__('Divider Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#a7a7a7',
				'validate' => 'color',
			),
			array(
			'id'       => 'category-top-bg-color',
			'type'     => 'color',
			'title'    => esc_html__( 'Top Background Color', 'service-finder' ),
			'subtitle' => '',
			'default'  => '#0e1215',
			'validate' => 'color',
			'required' => array( 'theme-style', '=', 'style-3' )
			),
			array(
                'id'       => 'shortcode-categories-limit',
                'type'     => 'text',
                'title'    => esc_html__( 'Number of Categories', 'service-finder' ),
				'default'  => 6
            ),
			array(
                'id'       => 'shortcode-subcategories',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Display Subcategory', 'service-finder' ),
                'options'  => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
                'default'  => 'yes'
            ),
			array(
                'id'       => 'shortcode-categories-style',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Category Style', 'service-finder' ),
                'options'  => array(
                    'slider' => esc_html__( 'Slider', 'service-finder' ),
                    'loadmore' => esc_html__( 'Load More', 'service-finder' )
                ),
				'required' => array( 'theme-style', '=', 'style-4' ),
                'default'  => 'slider'
            ),
			array(
                'id'       => 'shortcode-categories-showmore',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Show More', 'service-finder' ),
                'options'  => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
				'required' => array( 'theme-style', '!=', 'style-4' ),
                'default'  => 'yes'
            ),
			array(
                'id'       => 'shortcode-categories-description',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Show Description', 'service-finder' ),
				'desc'    => esc_html__('Works only for theme style 3', 'service-finder'),
                'options'  => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
                'default'  => 'yes'
            )
        )
    ) );
	
	/*Shortcode - service finder how it works settings*/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'How it Works', 'service-finder' ),
		'id'               => 'shortcodes-how-works-settings',
		'customizer'       => false,
		'icon' 			   => 'el-icon-tasks',
		'subsection'       => true,
		'customizer_width' => '450px',
		'desc'             => '',
        'fields'           => array(
			array(
                'id'       => 'shortcode-how-works-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-how-works-subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Sub Title', 'service-finder' ),
				'required' => array( 'theme-style', '=', 'style-4' ),
            ),
			array(
                'id'       => 'shortcode-how-works-tagline',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Tagline', 'service-finder' ),
                'validate' => 'no_html',
				'required' => array( 'theme-style', '!=', 'style-4' ),
            ),
			array(
				'id'       => 'shortcode-how-works-title-color',
				'type'     => 'color',
				'title'    => esc_html__('Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-how-works-subtitle-color',
				'type'     => 'color',
				'title'    => esc_html__('Sub Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
				'required' => array( 'theme-style', '=', 'style-4' ),
			),
			array(
				'id'       => 'shortcode-how-works-tagline-color',
				'type'     => 'color',
				'title'    => esc_html__('Text Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-how-works-icon-bg-color',
				'type'     => 'color',
				'title'    => esc_html__('Icon BG Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-how-works-divider-color',
				'type'     => 'color',
				'title'    => esc_html__('Divider Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#a7a7a7',
				'validate' => 'color',
			),
			array(
                'id'       => 'shortcode-how-works-step1',
                'type'     => 'section',
                'title'    => esc_html__( 'Step 1', 'service-finder' ),
                'subtitle' => esc_html__( 'Step 1 Fields', 'service-finder' ),
                'indent'   => true,
            ),
			array(
				'id'       => 'shortcode-how-works-step1-show',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show/Hide', 'service-finder' ),
				'default'  => true,
			),
			array(
                'id'       => 'shortcode-how-works-step1-number',
                'type'     => 'text',
                'title'    => esc_html__( 'Step Number', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-how-works-step1-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-how-works-step1-content',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Content', 'service-finder' ),
                'validate' => 'no_html',
            ),
			array(
				'id'       => 'shortcode-how-works-step1-icon',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Icon', 'service-finder' ),
			),
			array(
                'id'       => 'shortcode-how-works-step2',
                'type'     => 'section',
                'title'    => esc_html__( 'Step 2', 'service-finder' ),
                'subtitle' => esc_html__( 'Step 2 Fields', 'service-finder' ),
                'indent'   => true,
            ),
			array(
				'id'       => 'shortcode-how-works-step2-show',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show/Hide', 'service-finder' ),
				'default'  => true,
			),
			array(
                'id'       => 'shortcode-how-works-step2-number',
                'type'     => 'text',
                'title'    => esc_html__( 'Step Number', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-how-works-step2-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-how-works-step2-content',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Content', 'service-finder' ),
                'validate' => 'no_html',
            ),
			array(
				'id'       => 'shortcode-how-works-step2-icon',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Icon', 'service-finder' ),
			),
			array(
                'id'       => 'shortcode-how-works-step3',
                'type'     => 'section',
                'title'    => esc_html__( 'Step 3', 'service-finder' ),
                'subtitle' => esc_html__( 'Step 3 Fields', 'service-finder' ),
                'indent'   => true,
            ),
			array(
				'id'       => 'shortcode-how-works-step3-show',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show/Hide', 'service-finder' ),
				'default'  => true,
			),
			array(
                'id'       => 'shortcode-how-works-step3-number',
                'type'     => 'text',
                'title'    => esc_html__( 'Step Number', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-how-works-step3-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-how-works-step3-content',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Content', 'service-finder' ),
                'validate' => 'no_html',
            ),
			array(
				'id'       => 'shortcode-how-works-step3-icon',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Icon', 'service-finder' ),
			)
        )
    ) );
	
	/*Shortcode - service finder followers settings*/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Followers', 'service-finder' ),
		'id'               => 'shortcodes-followers-settings',
		'customizer'       => false,
		'icon' 			   => 'el-icon-tasks',
		'subsection'       => true,
		'customizer_width' => '450px',
		'desc'             => '',
        'fields'           => array(
			array(
                'id'       => 'shortcode-followers-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
				'desc'     => '%TOTAL-PROVIDERS%',
            ),
			array(
				'id'       => 'shortcode-followers-text-color',
				'type'     => 'color',
				'title'    => esc_html__('Text Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#FFFFFF',
				'validate' => 'color',
			),
			array(
				'id'      => 'shortcode-followers-content',
				'type'    => 'editor',
				'title'   => esc_html__( 'Content', 'service-finder' ),
				'desc'     => '%TOTAL-PROVIDERS%',
				'args'    => array(
					'wpautop'       => false,
					'media_buttons' => false,
					'textarea_rows' => 5,
					'teeny'         => false,
					'quicktags'     => true,
				)
			),
			array(
                'id'       => 'shortcode-followers-image-video',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Show Image/Video', 'service-finder' ),
                'options'  => array(
                    'image' => 'Image',
                    'video' => 'Video',
                ),
                'default'  => 'image',
				'desc'     => esc_html__( 'Only display in theme style 3', 'service-finder' ),
            ),
			array(
				'id'       => 'shortcode-followers-image-url',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Upload Image', 'service-finder' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Only display in theme style 3', 'service-finder' ),
				'required' => array( 'shortcode-followers-image-video', '=', 'image' ),
			),
			array(
				'id'       => 'shortcode-followers-youtube-url',
				'type'     => 'text',
				'title'    => esc_html__( 'Youtube URL', 'service-finder' ),
				'subtitle' => esc_html__( 'Enter Youtube URL', 'service-finder' ),
				'desc'     => esc_html__( 'Only display in theme style 3', 'service-finder' ),
				'validate' => 'url',
				'required' => array( 'shortcode-followers-image-video', '=', 'video' ),
			),
			array(
                'id'       => 'shortcode-followers-button-text',
                'type'     => 'text',
                'title'    => esc_html__( 'Button Text', 'service-finder' ),
				'desc'     => esc_html__( 'Only display in theme style 3', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-followers-button-link',
                'type'     => 'text',
                'title'    => esc_html__( 'Button Link', 'service-finder' ),
				'desc'     => esc_html__( 'Only display in theme style 3', 'service-finder' ),
            ),
        )
    ) );
	
	/*Shortcode - service finder featured providers settings*/
	Redux::setSection( $opt_name, array(
		'title'    		   => sprintf( esc_html__('Featured %s', 'service-finder'), $providerreplacestring ),
		'id'               => 'shortcodes-featured-settings',
		'customizer'       => false,
		'icon' 			   => 'el-icon-tasks',
		'subsection'       => true,
		'customizer_width' => '450px',
		'desc'             => '',
        'fields'           => array(
			array(
                'id'       => 'shortcode-featured-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-featured-subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Sub Title', 'service-finder' ),
				'required' => array( 'theme-style', '=', 'style-4' )
            ),
			array(
				'id'      => 'shortcode-featured-tagline',
				'type'    => 'editor',
				'title'   => esc_html__( 'Tagline', 'service-finder' ),
				'args'    => array(
					'wpautop'       => false,
					'media_buttons' => false,
					'textarea_rows' => 5,
					'teeny'         => false,
					'quicktags'     => true,
				)
			),
			array(
				'id'       => 'shortcode-featured-title-color',
				'type'     => 'color',
				'title'    => esc_html__('Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-featured-subtitle-color',
				'type'     => 'color',
				'title'    => esc_html__('Sub Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
				'required' => array( 'theme-style', '=', 'style-4' )
			),
			array(
				'id'       => 'shortcode-featured-tagline-color',
				'type'     => 'color',
				'title'    => esc_html__('Tagline Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-featured-divider-color',
				'type'     => 'color',
				'title'    => esc_html__('Divider Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#a7a7a7',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-featured-box-title-color',
				'type'     => 'color',
				'title'    => esc_html__('Featured Box Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#022279',
				'validate' => 'color',
				'required' => array( 'theme-style', '=', 'style-4' )
			),
			array(
                'id'       => 'shortcode-featured-numberofproviders',
                'type'     => 'text',
                'title'    => sprintf( esc_html__('Number of %s', 'service-finder'), $providerreplacestring ),
				'default'  => 10,
				'desc'     => esc_html__('Items that visible in slider', 'service-finder'),
            ),
			array(
                'id'       => 'shortcode-featured-items',
                'type'     => 'text',
                'title'    => esc_html__( 'Number of Items', 'service-finder' ),
				'default'  => 3,
				'desc'     => esc_html__('Items that visible in slider', 'service-finder'),
            ),
			array(
				'id'       => 'shortcode-featured-from-category',
				'type'     => 'select',
				'title'    => esc_html__( 'Featured From Category', 'service-finder' ),
				'subtitle' => '',
				'desc'     => '',
				'options'  => $categoryarr,
				'default'  => ''
			),
			array(
                'id'       => 'shortcode-featured-fullwidth',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Fullwidth Slider', 'service-finder' ),
                'options'  => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
                'default'  => 'no'
            )
        )
    ) );
	
	/*Shortcode - service finder statistics settings*/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Statistics', 'service-finder' ),
		'id'               => 'shortcodes-statistics-settings',
		'customizer'       => false,
		'icon' 			   => 'el-icon-tasks',
		'subsection'       => true,
		'customizer_width' => '450px',
		'desc'             => '',
        'fields'           => array(
			array(
                'id'       => 'shortcode-statistics-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-statistics-subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Sub Title', 'service-finder' ),
				'required' => array( 'theme-style', '=', 'style-4' ),
            ),
			array(
				'id'      => 'shortcode-statistics-tagline',
				'type'    => 'editor',
				'title'   => esc_html__( 'Tagline', 'service-finder' ),
				'args'    => array(
					'wpautop'       => false,
					'media_buttons' => false,
					'textarea_rows' => 5,
					'teeny'         => false,
					'quicktags'     => true,
				)
			),
			array(
				'id'       => 'shortcode-statistics-title-color',
				'type'     => 'color',
				'title'    => esc_html__('Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-statistics-subtitle-color',
				'type'     => 'color',
				'title'    => esc_html__('Sub Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
				'required' => array( 'theme-style', '=', 'style-4' ),
			),
			array(
				'id'       => 'shortcode-statistics-tagline-color',
				'type'     => 'color',
				'title'    => esc_html__('Tagline Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-statistics-divider-color',
				'type'     => 'color',
				'title'    => esc_html__('Divider Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#a7a7a7',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-statistics-text-color',
				'type'     => 'color',
				'title'    => esc_html__('Text Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#767676',
				'validate' => 'color',
			),
			array(
                'id'       => 'shortcode-statistics-box1',
                'type'     => 'section',
                'title'    => esc_html__( 'Box 1', 'service-finder' ),
                'subtitle' => esc_html__( 'Box 1 Fields', 'service-finder' ),
                'indent'   => true,
            ),
			array(
				'id'       => 'shortcode-statistics-step1-show',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show/Hide', 'service-finder' ),
				'default'  => true,
			),
			array(
                'id'       => 'shortcode-statistics-box1-type',
                'type'     => 'select',
                'title'    => esc_html__( 'Box Type', 'service-finder' ),
                'options'  => array(
                    'providers' => $providerreplacestring,
                    'customers' => $customerreplacestring,
					'jobs' 		=> 'Jobs',
					'categories' => 'Categories',
					'other' => 'Other',
                ),
                'default'  => ''
            ),
			array(
                'id'       => 'shortcode-statistics-box1-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
				'required' => array( 'shortcode-statistics-box1-type', '=', 'other' ),
            ),
			array(
                'id'       => 'shortcode-statistics-box1-number',
                'type'     => 'text',
                'title'    => esc_html__( 'Number', 'service-finder' ),
				'required' => array( 'shortcode-statistics-box1-type', '=', 'other' ),
            ),
			array(
				'id'       => 'shortcode-statistics-box1-color',
				'type'     => 'color',
				'title'    => esc_html__('Box Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#7748ee',
				'validate' => 'color',
			),
			array(
                'id'       => 'shortcode-statistics-box1-icon-class',
                'type'     => 'text',
                'title'    => esc_html__( 'FA Icon Class', 'service-finder' ),
				'placeholder'  => esc_html__( 'e.g. fa-users', 'service-finder' ),
				'required' => array( 'theme-style', '!=', 'style-4' ),
            ),
			array(
                'id'       => 'shortcode-statistics-box2',
                'type'     => 'section',
                'title'    => esc_html__( 'Box 2', 'service-finder' ),
                'subtitle' => esc_html__( 'Box 2 Fields', 'service-finder' ),
                'indent'   => true,
            ),
			array(
				'id'       => 'shortcode-statistics-step2-show',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show/Hide', 'service-finder' ),
				'default'  => true,
			),
			array(
                'id'       => 'shortcode-statistics-box2-type',
                'type'     => 'select',
                'title'    => esc_html__( 'Box Type', 'service-finder' ),
                'options'  => array(
                    'providers' => $providerreplacestring,
                    'customers' => $customerreplacestring,
					'jobs' 		=> 'Jobs',
					'categories' => 'Categories',
					'other' => 'Other',
                ),
                'default'  => ''
            ),
			array(
                'id'       => 'shortcode-statistics-box2-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
				'required' => array( 'shortcode-statistics-box2-type', '=', 'other' ),
            ),
			array(
                'id'       => 'shortcode-statistics-box2-number',
                'type'     => 'text',
                'title'    => esc_html__( 'Number', 'service-finder' ),
				'required' => array( 'shortcode-statistics-box2-type', '=', 'other' ),
            ),
			array(
				'id'       => 'shortcode-statistics-box2-color',
				'type'     => 'color',
				'title'    => esc_html__('Box Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#62b815',
				'validate' => 'color',
			),
			array(
                'id'       => 'shortcode-statistics-box2-icon-class',
                'type'     => 'text',
                'title'    => esc_html__( 'FA Icon Class', 'service-finder' ),
				'placeholder'  => esc_html__( 'e.g. fa-users', 'service-finder' ),
				'required' => array( 'theme-style', '!=', 'style-4' ),
            ),
			array(
                'id'       => 'shortcode-statistics-box3',
                'type'     => 'section',
                'title'    => esc_html__( 'Box 3', 'service-finder' ),
                'subtitle' => esc_html__( 'Box 3 Fields', 'service-finder' ),
                'indent'   => true,
            ),
			array(
				'id'       => 'shortcode-statistics-step3-show',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show/Hide', 'service-finder' ),
				'default'  => true,
			),
			array(
                'id'       => 'shortcode-statistics-box3-type',
                'type'     => 'select',
                'title'    => esc_html__( 'Box Type', 'service-finder' ),
                'options'  => array(
                    'providers' => $providerreplacestring,
                    'customers' => $customerreplacestring,
					'jobs' 		=> 'Jobs',
					'categories' => 'Categories',
					'other' => 'Other',
                ),
                'default'  => ''
            ),
			array(
                'id'       => 'shortcode-statistics-box3-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
				'required' => array( 'shortcode-statistics-box3-type', '=', 'other' ),
            ),
			array(
                'id'       => 'shortcode-statistics-box3-number',
                'type'     => 'text',
                'title'    => esc_html__( 'Number', 'service-finder' ),
				'required' => array( 'shortcode-statistics-box3-type', '=', 'other' ),
            ),
			array(
				'id'       => 'shortcode-statistics-box3-color',
				'type'     => 'color',
				'title'    => esc_html__('Box Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#feb92d',
				'validate' => 'color',
			),
			array(
                'id'       => 'shortcode-statistics-box3-icon-class',
                'type'     => 'text',
                'title'    => esc_html__( 'FA Icon Class', 'service-finder' ),
				'placeholder'  => esc_html__( 'e.g. fa-users', 'service-finder' ),
				'required' => array( 'theme-style', '!=', 'style-4' ),
            ),
			array(
                'id'       => 'shortcode-statistics-box4',
                'type'     => 'section',
                'title'    => esc_html__( 'Box 4', 'service-finder' ),
                'subtitle' => esc_html__( 'Box 4 Fields', 'service-finder' ),
                'indent'   => true,
            ),
			array(
				'id'       => 'shortcode-statistics-step4-show',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show/Hide', 'service-finder' ),
				'default'  => true,
			),
			array(
                'id'       => 'shortcode-statistics-box4-type',
                'type'     => 'select',
                'title'    => esc_html__( 'Box Type', 'service-finder' ),
                'options'  => array(
                    'providers' => $providerreplacestring,
                    'customers' => $customerreplacestring,
					'jobs' 		=> 'Jobs',
					'categories' => 'Categories',
					'other' => 'Other',
                ),
                'default'  => ''
            ),
			array(
                'id'       => 'shortcode-statistics-box4-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
				'required' => array( 'shortcode-statistics-box4-type', '=', 'other' ),
            ),
			array(
                'id'       => 'shortcode-statistics-box4-number',
                'type'     => 'text',
                'title'    => esc_html__( 'Number', 'service-finder' ),
				'required' => array( 'shortcode-statistics-box4-type', '=', 'other' ),
            ),
			array(
				'id'       => 'shortcode-statistics-box4-color',
				'type'     => 'color',
				'title'    => esc_html__('Box Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#2dbefd',
				'validate' => 'color',
			),
			array(
                'id'       => 'shortcode-statistics-box4-icon-class',
                'type'     => 'text',
                'title'    => esc_html__( 'FA Icon Class', 'service-finder' ),
				'placeholder'  => esc_html__( 'e.g. fa-users', 'service-finder' ),
				'required' => array( 'theme-style', '!=', 'style-4' ),
            ),
        )
    ) );
	
	/*Shortcode - service finder latest blogs settings*/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Latest Blogs', 'service-finder' ),
		'id'               => 'shortcodes-blogs-settings',
		'customizer'       => false,
		'icon' 			   => 'el-icon-tasks',
		'subsection'       => true,
		'customizer_width' => '450px',
		'desc'             => '',
        'fields'           => array(
			array(
                'id'       => 'shortcode-blogs-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-blogs-subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Sub Title', 'service-finder' ),
				'required' => array( 'theme-style', '=', 'style-4' ),
            ),
			array(
				'id'      => 'shortcode-blogs-tagline',
				'type'    => 'editor',
				'title'   => esc_html__( 'Tagline', 'service-finder' ),
				'args'    => array(
					'wpautop'       => false,
					'media_buttons' => false,
					'textarea_rows' => 5,
					'teeny'         => false,
					'quicktags'     => true,
				)
			),
			array(
				'id'       => 'shortcode-blogs-title-color',
				'type'     => 'color',
				'title'    => esc_html__('Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-blogs-subtitle-color',
				'type'     => 'color',
				'title'    => esc_html__('Sub Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
				'required' => array( 'theme-style', '=', 'style-4' ),
			),
			array(
				'id'       => 'shortcode-blogs-tagline-color',
				'type'     => 'color',
				'title'    => esc_html__('Tagline Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-blogs-divider-color',
				'type'     => 'color',
				'title'    => esc_html__('Divider Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#a7a7a7',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-blog-post-title-color',
				'type'     => 'color',
				'title'    => esc_html__('Blog Post Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#022279',
				'validate' => 'color',
				'required' => array( 'theme-style', '=', 'style-4' )
			),
			array(
                'id'       => 'shortcode-blogs-limit',
                'type'     => 'text',
                'title'    => esc_html__( 'Number of Items', 'service-finder' ),
				'default'  => 3
            )
        )
    ) );
	
	/*Shortcode - service finder why choose us settings*/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Why Choose Us', 'service-finder' ),
		'id'               => 'shortcodes-why-choose-us-settings',
		'customizer'       => false,
		'icon' 			   => 'el-icon-tasks',
		'subsection'       => true,
		'customizer_width' => '450px',
		'desc'             => '',
        'fields'           => array(
			array(
                'id'       => 'shortcode-why-choose-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-why-choose-subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Sub Title', 'service-finder' ),
				'required' => array( 'theme-style', '=', 'style-4' ),
            ),
			array(
				'id'      => 'shortcode-why-choose-tagline',
				'type'    => 'editor',
				'title'   => esc_html__( 'Tagline', 'service-finder' ),
				'args'    => array(
					'wpautop'       => false,
					'media_buttons' => false,
					'textarea_rows' => 5,
					'teeny'         => false,
					'quicktags'     => true,
				)
			),
			array(
				'id'       => 'shortcode-why-choose-title-color',
				'type'     => 'color',
				'title'    => esc_html__('Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-why-choose-subtitle-color',
				'type'     => 'color',
				'title'    => esc_html__('Sub Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
				'required' => array( 'theme-style', '=', 'style-4' ),
			),
			array(
				'id'       => 'shortcode-why-choose-tagline-color',
				'type'     => 'color',
				'title'    => esc_html__('Text Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-why-choose-divider-color',
				'type'     => 'color',
				'title'    => esc_html__('Divider Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#a7a7a7',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-why-choose-rightside-image',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Right Side Image', 'service-finder' ),
				'required' => array( 'theme-style', '=', 'style-4' ),
			),
			array(
                'id'       => 'shortcode-why-choose-box1',
                'type'     => 'section',
                'title'    => esc_html__( 'Box 1', 'service-finder' ),
                'subtitle' => esc_html__( 'Box 1 Fields', 'service-finder' ),
                'indent'   => true,
            ),
			array(
				'id'       => 'shortcode-why-choose-step1-show',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show/Hide', 'service-finder' ),
				'default'  => true,
			),
			array(
                'id'       => 'shortcode-why-choose-box1-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-why-choose-box1-content',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Content', 'service-finder' ),
                'validate' => 'no_html',
            ),
			array(
				'id'       => 'shortcode-why-choose-box1-icon',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Icon', 'service-finder' ),
			),
			array(
                'id'       => 'shortcode-why-choose-box2',
                'type'     => 'section',
                'title'    => esc_html__( 'Box 2', 'service-finder' ),
                'subtitle' => esc_html__( 'Box 2 Fields', 'service-finder' ),
                'indent'   => true,
            ),
			array(
				'id'       => 'shortcode-why-choose-step2-show',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show/Hide', 'service-finder' ),
				'default'  => true,
			),
			array(
                'id'       => 'shortcode-why-choose-box2-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-why-choose-box2-content',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Content', 'service-finder' ),
                'validate' => 'no_html',
            ),
			array(
				'id'       => 'shortcode-why-choose-box2-icon',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Icon', 'service-finder' ),
			),
			array(
                'id'       => 'shortcode-why-choose-box3',
                'type'     => 'section',
                'title'    => esc_html__( 'Box 3', 'service-finder' ),
                'subtitle' => esc_html__( 'Box 3 Fields', 'service-finder' ),
                'indent'   => true,
            ),
			array(
				'id'       => 'shortcode-why-choose-step3-show',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show/Hide', 'service-finder' ),
				'default'  => true,
			),
			array(
                'id'       => 'shortcode-why-choose-box3-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-why-choose-box3-content',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Content', 'service-finder' ),
                'validate' => 'no_html',
            ),
			array(
				'id'       => 'shortcode-why-choose-box3-icon',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Icon', 'service-finder' ),
			),
        )
    ) );
	
	/*Shortcode - service finder jobs settings*/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Jobs', 'service-finder' ),
		'id'               => 'shortcodes-jobs-settings',
		'customizer'       => false,
		'icon' 			   => 'el-icon-tasks',
		'subsection'       => true,
		'customizer_width' => '450px',
		'desc'             => '',
        'fields'           => array(
			array(
			'id'       => 'job-listing-style',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Job Listing Style', 'service-finder' ),
			'subtitle' => '',
			'desc'     => '',
			'options'  => array(
			'grid' => 'Grid',
			'list' => 'List',
			),
			'default'  => 'grid',
			),
			array(
                'id'       => 'shortcode-jobs-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-jobs-subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Sub Title', 'service-finder' ),
				'required' => array( 'theme-style', '=', 'style-4' ),
            ),
			array(
				'id'      => 'shortcode-jobs-tagline',
				'type'    => 'editor',
				'title'   => esc_html__( 'Tagline', 'service-finder' ),
				'args'    => array(
					'wpautop'       => false,
					'media_buttons' => false,
					'textarea_rows' => 5,
					'teeny'         => false,
					'quicktags'     => true,
				)
			),
			array(
                'id'       => 'shortcode-jobs-loadmore-text',
                'type'     => 'text',
                'title'    => esc_html__( 'View More Button Text', 'service-finder' ),
				'required' => array( 'theme-style', '=', 'style-4' )
            ),
			array(
                'id'       => 'shortcode-jobs-loadmore-link',
                'type'     => 'text',
                'title'    => esc_html__( 'View More Button Link', 'service-finder' ),
				'required' => array( 'theme-style', '=', 'style-4' )
            ),
			array(
				'id'       => 'shortcode-jobs-title-color',
				'type'     => 'color',
				'title'    => esc_html__('Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-jobs-subtitle-color',
				'type'     => 'color',
				'title'    => esc_html__('Sub Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
				'required' => array( 'theme-style', '=', 'style-4' )
			),
			array(
				'id'       => 'shortcode-jobs-tagline-color',
				'type'     => 'color',
				'title'    => esc_html__('Tagline Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-jobs-divider-color',
				'type'     => 'color',
				'title'    => esc_html__('Divider Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#a7a7a7',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-jobs-boxtitle-color',
				'type'     => 'color',
				'title'    => esc_html__('Box Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#022279',
				'validate' => 'color',
				'required' => array( 'theme-style', '=', 'style-4' )
			),
        )
    ) );
	
	/*Shortcode - service finder testimonials settings*/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Testimonials', 'service-finder' ),
		'id'               => 'shortcodes-testimonials-settings',
		'customizer'       => false,
		'icon' 			   => 'el-icon-tasks',
		'subsection'       => true,
		'customizer_width' => '450px',
		'desc'             => '',
        'fields'           => array(
			array(
                'id'       => 'shortcode-testimonials-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-testimonials-subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Sub Title', 'service-finder' ),
				'required' => array( 'theme-style', '=', 'style-4' ),
            ),
			array(
				'id'      => 'shortcode-testimonials-tagline',
				'type'    => 'editor',
				'title'   => esc_html__( 'Tagline', 'service-finder' ),
				'args'    => array(
					'wpautop'       => false,
					'media_buttons' => false,
					'textarea_rows' => 5,
					'teeny'         => false,
					'quicktags'     => true,
				)
			),
			array(
				'id'       => 'shortcode-testimonials-title-color',
				'type'     => 'color',
				'title'    => esc_html__('Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-testimonials-subtitle-color',
				'type'     => 'color',
				'title'    => esc_html__('Sub Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
				'required' => array( 'theme-style', '=', 'style-4' ),
			),
			array(
				'id'       => 'shortcode-testimonials-tagline-color',
				'type'     => 'color',
				'title'    => esc_html__('Tagline Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-testimonials-divider-color',
				'type'     => 'color',
				'title'    => esc_html__('Divider Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#a7a7a7',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-testimonials-boxtitle-color',
				'type'     => 'color',
				'title'    => esc_html__('Box Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#022279',
				'validate' => 'color',
				'required' => array( 'theme-style', '=', 'style-4' )
			),
			array(
                'id'       => 'shortcode-testimonials-limit',
                'type'     => 'text',
                'title'    => esc_html__( 'Number of Testimonials', 'service-finder' ),
				'default'  => ''
            ),
        )
    ) );
	
	/*Shortcode - service finder bio settings*/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Bio', 'service-finder' ),
		'id'               => 'shortcodes-bio-settings',
		'customizer'       => false,
		'icon' 			   => 'el-icon-tasks',
		'subsection'       => true,
		'customizer_width' => '450px',
		'desc'             => '',
        'fields'           => array(
			array(
                'id'       => 'shortcode-bio-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
				'id'      => 'shortcode-bio-tagline',
				'type'    => 'editor',
				'title'   => esc_html__( 'Tagline', 'service-finder' ),
				'args'    => array(
					'wpautop'       => false,
					'media_buttons' => false,
					'textarea_rows' => 5,
					'teeny'         => false,
					'quicktags'     => true,
				)
			),
			array(
				'id'      => 'shortcode-bio-content',
				'type'    => 'editor',
				'title'   => esc_html__( 'Content', 'service-finder' ),
				'args'    => array(
					'wpautop'       => false,
					'media_buttons' => false,
					'textarea_rows' => 5,
					'teeny'         => false,
					'quicktags'     => true,
				)
			),
			array(
				'id'       => 'shortcode-bio-title-color',
				'type'     => 'color',
				'title'    => esc_html__('Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-bio-tagline-color',
				'type'     => 'color',
				'title'    => esc_html__('Text Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-bio-divider-color',
				'type'     => 'color',
				'title'    => esc_html__('Divider Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#a7a7a7',
				'validate' => 'color',
			),
			array(
                'id'       => 'shortcode-bio-button-text',
                'type'     => 'text',
                'title'    => esc_html__( 'Button Text', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-bio-button-link',
                'type'     => 'text',
                'title'    => esc_html__( 'Button Link', 'service-finder' ),
            ),
        )
    ) );
	
	/*Shortcode - service finder features settings*/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Features', 'service-finder' ),
		'id'               => 'shortcodes-features-settings',
		'customizer'       => false,
		'icon' 			   => 'el-icon-tasks',
		'subsection'       => true,
		'customizer_width' => '450px',
		'desc'             => '',
        'fields'           => array(
			array(
                'id'       => 'shortcode-features-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
				'id'      => 'shortcode-features-tagline',
				'type'    => 'editor',
				'title'   => esc_html__( 'Tagline', 'service-finder' ),
				'args'    => array(
					'wpautop'       => false,
					'media_buttons' => false,
					'textarea_rows' => 5,
					'teeny'         => false,
					'quicktags'     => true,
				)
			),
			array(
				'id'       => 'shortcode-features-title-color',
				'type'     => 'color',
				'title'    => esc_html__('Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-features-tagline-color',
				'type'     => 'color',
				'title'    => esc_html__('Text Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-features-divider-color',
				'type'     => 'color',
				'title'    => esc_html__('Divider Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#a7a7a7',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-features-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Icons Background Color', 'service-finder' ),
				'subtitle' => '',
				'default'  => '#ffb600',
				'validate' => 'color',
				'required' => array( 'theme-style', '=', 'style-4' )
			),
			array(
                'id'       => 'shortcode-features-box1',
                'type'     => 'section',
                'title'    => esc_html__( 'Box 1', 'service-finder' ),
                'subtitle' => esc_html__( 'Box 1 Fields', 'service-finder' ),
                'indent'   => true,
            ),
			array(
				'id'       => 'shortcode-features-box1-show',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show/Hide', 'service-finder' ),
				'default'  => true,
			),
			array(
                'id'       => 'shortcode-features-box1-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-features-box1-content',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Content', 'service-finder' ),
                'validate' => 'no_html',
            ),
			array(
                'id'       => 'shortcode-features-box1-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Fa Icon', 'service-finder' ),
				'desc'    => esc_html__( 'eg. fa-clock-o', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-features-box2',
                'type'     => 'section',
                'title'    => esc_html__( 'Box 2', 'service-finder' ),
                'subtitle' => esc_html__( 'Box 2 Fields', 'service-finder' ),
                'indent'   => true,
            ),
			array(
				'id'       => 'shortcode-features-box2-show',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show/Hide', 'service-finder' ),
				'default'  => true,
			),
			array(
                'id'       => 'shortcode-features-box2-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-features-box2-content',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Content', 'service-finder' ),
                'validate' => 'no_html',
            ),
			array(
                'id'       => 'shortcode-features-box2-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Fa Icon', 'service-finder' ),
				'desc'    => esc_html__( 'eg. fa-clock-o', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-features-box3',
                'type'     => 'section',
                'title'    => esc_html__( 'Box 3', 'service-finder' ),
                'subtitle' => esc_html__( 'Box 3 Fields', 'service-finder' ),
                'indent'   => true,
            ),
			array(
				'id'       => 'shortcode-features-box3-show',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show/Hide', 'service-finder' ),
				'default'  => true,
			),
			array(
                'id'       => 'shortcode-features-box3-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-features-box3-content',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Content', 'service-finder' ),
                'validate' => 'no_html',
            ),
			array(
                'id'       => 'shortcode-features-box3-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Fa Icon', 'service-finder' ),
				'desc'    => esc_html__( 'eg. fa-clock-o', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-features-box4',
                'type'     => 'section',
                'title'    => esc_html__( 'Box 4', 'service-finder' ),
                'subtitle' => esc_html__( 'Box 4 Fields', 'service-finder' ),
                'indent'   => true,
            ),
			array(
				'id'       => 'shortcode-features-box4-show',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show/Hide', 'service-finder' ),
				'default'  => true,
			),
			array(
                'id'       => 'shortcode-features-box4-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-features-box4-content',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Content', 'service-finder' ),
                'validate' => 'no_html',
            ),
			array(
                'id'       => 'shortcode-features-box4-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Fa Icon', 'service-finder' ),
				'desc'    => esc_html__( 'eg. fa-clock-o', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-features-box5',
                'type'     => 'section',
                'title'    => esc_html__( 'Box 5', 'service-finder' ),
                'subtitle' => esc_html__( 'Box 5 Fields', 'service-finder' ),
                'indent'   => true,
            ),
			array(
				'id'       => 'shortcode-features-box5-show',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show/Hide', 'service-finder' ),
				'default'  => true,
			),
			array(
                'id'       => 'shortcode-features-box5-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-features-box5-content',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Content', 'service-finder' ),
                'validate' => 'no_html',
            ),
			array(
                'id'       => 'shortcode-features-box5-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Fa Icon', 'service-finder' ),
				'desc'    => esc_html__( 'eg. fa-clock-o', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-features-box6',
                'type'     => 'section',
                'title'    => esc_html__( 'Box 6', 'service-finder' ),
                'subtitle' => esc_html__( 'Box 6 Fields', 'service-finder' ),
                'indent'   => true,
            ),
			array(
				'id'       => 'shortcode-features-box6-show',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show/Hide', 'service-finder' ),
				'default'  => true,
			),
			array(
                'id'       => 'shortcode-features-box6-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-features-box6-content',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Content', 'service-finder' ),
                'validate' => 'no_html',
            ),
			array(
                'id'       => 'shortcode-features-box6-icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Fa Icon', 'service-finder' ),
				'desc'    => esc_html__( 'eg. fa-clock-o', 'service-finder' ),
            ),
        )
    ) );
	
	$allpackages = service_finder_get_active_packages();
    if(!empty($allpackages)){
    foreach($allpackages as $key => $value){
    $packagearr[$key] = $value;
    }
    }else{
    $packagearr[] = esc_html__( 'Select a Package', 'service-finder' );
    }
	
	/*Shortcode - service finder pricing plans settings*/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Pricing Plans', 'service-finder' ),
		'id'               => 'shortcodes-pricing-plans-settings',
		'customizer'       => false,
		'icon' 			   => 'el-icon-tasks',
		'subsection'       => true,
		'customizer_width' => '450px',
		'desc'             => '',
        'fields'           => array(
			array(
                'id'       => 'shortcode-pricing-plans-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-pricing-plans-subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Sub Title', 'service-finder' ),
				'required' => array( 'theme-style', '=', 'style-4' ),
            ),
			array(
				'id'      => 'shortcode-pricing-plans-tagline',
				'type'    => 'editor',
				'title'   => esc_html__( 'Tagline', 'service-finder' ),
				'args'    => array(
					'wpautop'       => false,
					'media_buttons' => false,
					'textarea_rows' => 5,
					'teeny'         => false,
					'quicktags'     => true,
				)
			),
			array(
				'id'       => 'shortcode-pricing-plans-title-color',
				'type'     => 'color',
				'title'    => esc_html__('Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-pricing-plans-subtitle-color',
				'type'     => 'color',
				'title'    => esc_html__('Sub Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
				'required' => array( 'theme-style', '=', 'style-4' ),
			),
			array(
				'id'       => 'shortcode-pricing-plans-tagline-color',
				'type'     => 'color',
				'title'    => esc_html__('Tagline Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-pricing-plans-divider-color',
				'type'     => 'color',
				'title'    => esc_html__('Divider Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#a7a7a7',
				'validate' => 'color',
			),
			array(
				'id'       => 'shortcode-pricing-plans-boxtitle-color',
				'type'     => 'color',
				'title'    => esc_html__('Box Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '#022279',
				'validate' => 'color',
				'required' => array( 'theme-style', '=', 'style-4' )
			),
			array(
				'id'       => 'shortcode-pricing-plans-highlight',
				'type'     => 'select',
				'title'    => esc_html__( 'Highlight Column', 'service-finder' ),
				'subtitle' => '',
				'desc'     => '',
				'options'  => $packagearr,
				'default'  => 'admin'
			),
			array(
				'id'       => 'shortcode-pricing-plans-highlight-bgcolor',
				'type'     => 'color',
				'title'    => esc_html__('Package Highligh BG Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
				'required' => array( 'theme-style', '=', 'style-4' )
			),
			array(
				'id'       => 'shortcode-pricing-plans-highlight-titlecolor',
				'type'     => 'color',
				'title'    => esc_html__('Package Highligh Title Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
				'required' => array( 'theme-style', '=', 'style-4' )
			),
			array(
				'id'       => 'shortcode-pricing-plans-highlight-textcolor',
				'type'     => 'color',
				'title'    => esc_html__('Package Highligh Text Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
				'required' => array( 'theme-style', '=', 'style-4' )
			),
			array(
				'id'       => 'shortcode-pricing-plans-highlight-checksign-color',
				'type'     => 'color',
				'title'    => esc_html__('Package Highligh Check Sign Color', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
				'required' => array( 'theme-style', '=', 'style-4' )
			),
			array(
				'id'       => 'shortcode-pricing-plans-column-color0',
				'type'     => 'color',
				'title'    => esc_html__('Package Color Column 1', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
				'required' => array( 'theme-style', '!=', 'style-4' )
			),
			array(
				'id'       => 'shortcode-pricing-plans-column-color1',
				'type'     => 'color',
				'title'    => esc_html__('Package Color Column 2', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
				'required' => array( 'theme-style', '!=', 'style-4' )
			),
			array(
				'id'       => 'shortcode-pricing-plans-column-color2',
				'type'     => 'color',
				'title'    => esc_html__('Package Color Column 3', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
				'required' => array( 'theme-style', '!=', 'style-4' )
			),
			array(
				'id'       => 'shortcode-pricing-plans-column-color3',
				'type'     => 'color',
				'title'    => esc_html__('Package Color Column 4', 'service-finder'),
				'subtitle' => '',
				'default'  => '',
				'validate' => 'color',
				'required' => array( 'theme-style', '!=', 'style-4' )
			),
			array(
                'id'       => 'shortcode-pricing-plans-signup-link-style',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Signup Button Style', 'service-finder' ),
                'options'  => array(
                    'page' => 'Page',
                    'popup' => 'Popup',
                ),
                'default'  => 'page'
            ),
			array(
                'id'       => 'shortcode-pricing-plans-column-gap',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Gap Between Column', 'service-finder' ),
                'options'  => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
                'default'  => 'yes'
            ),
			array(
                'id'       => 'shortcode-pricing-feature-booking',
                'type'     => 'text',
                'title'    => esc_html__( 'Booking', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-pricing-feature-cover-image',
                'type'     => 'text',
                'title'    => esc_html__( 'Cover Image', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-pricing-feature-gallery-images',
                'type'     => 'text',
                'title'    => esc_html__( 'Gallery Images', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-pricing-feature-multiple-categories',
                'type'     => 'text',
                'title'    => esc_html__( 'Multiple Categories', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-pricing-feature-apply-for-job',
                'type'     => 'text',
                'title'    => esc_html__( 'Apply for Job', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-pricing-feature-job-alerts',
                'type'     => 'text',
                'title'    => esc_html__( 'Job Alerts', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-pricing-feature-branches',
                'type'     => 'text',
                'title'    => esc_html__( 'More Locations (Branches)', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-pricing-feature-google-calendar',
                'type'     => 'text',
                'title'    => esc_html__( 'Google Calendar', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-pricing-feature-crop',
                'type'     => 'text',
                'title'    => esc_html__( 'Crop Profile Image', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-pricing-feature-contact-numbers',
                'type'     => 'text',
                'title'    => esc_html__( 'Contact Numbers', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-pricing-feature-message-system',
                'type'     => 'text',
                'title'    => esc_html__( 'Message System', 'service-finder' ),
				'desc'     => esc_html__( 'It will work only "Service Finder Messaging System" addon is installed.', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-pricing-feature-invoice',
                'type'     => 'text',
                'title'    => esc_html__( 'Invoice', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-pricing-feature-availability',
                'type'     => 'text',
                'title'    => esc_html__( 'Availability', 'service-finder' ),
            ),
			array(
                'id'       => 'shortcode-pricing-feature-staff-members',
                'type'     => 'text',
                'title'    => esc_html__( 'Staff Members', 'service-finder' ),
            ),
        )
    ) );
	
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Social Settings', 'service-finder' ),
    'id'               => 'social-settings',
	'customizer'           => false,
    'desc'             => '',
    'customizer_width' => '400px',
	'customizer'           => false,
    'icon'             => 'el el-thumbs-up'
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Social Media', 'service-finder' ),
    'id'               => 'social-media',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'fb-link',
    'type'     => 'text',
    'title'    => esc_html__( 'Facebook URL', 'service-finder' ),
    'subtitle' => esc_html__( 'Enter Facebook URL', 'service-finder' ),
    'desc'     => '',
    'validate' => 'url',
    ),
    array(
    'id'       => 'linkedin-link',
    'type'     => 'text',
    'title'    => esc_html__( 'Linkedin URL', 'service-finder' ),
    'subtitle' => esc_html__( 'Enter Linkedin URL', 'service-finder' ),
    'desc'     => '',
    'validate' => 'url',
    ),
    array(
    'id'       => 'twitter-link',
    'type'     => 'text',
    'title'    => esc_html__( 'Twitter URL', 'service-finder' ),
    'subtitle' => esc_html__( 'Enter Twitter URL', 'service-finder' ),
    'desc'     => '',
    'validate' => 'url',
    ),
    array(
    'id'       => 'pinterest-link',
    'type'     => 'text',
    'title'    => esc_html__( 'Pinterest URL', 'service-finder' ),
    'subtitle' => esc_html__( 'Enter Pinterest URL', 'service-finder' ),
    'desc'     => '',
    'validate' => 'url',
    ),
    array(
    'id'       => 'delicious-link',
    'type'     => 'text',
    'title'    => esc_html__( 'Delicious URL', 'service-finder' ),
    'subtitle' => esc_html__( 'Enter Delicius URL', 'service-finder' ),
    'desc'     => '',
    'validate' => 'url',
    ),
    array(
    'id'       => 'digg-link',
    'type'     => 'text',
    'title'    => esc_html__( 'Digg URL', 'service-finder' ),
    'subtitle' => esc_html__( 'Enter Digg URL', 'service-finder' ),
    'desc'     => '',
    'validate' => 'url',
    ),
    array(
    'id'       => 'flickr-link',
    'type'     => 'text',
    'title'    => esc_html__( 'Flickr URL', 'service-finder' ),
    'subtitle' => esc_html__( 'Enter Flickr URL', 'service-finder' ),
    'desc'     => '',
    'validate' => 'url',
    ),
	array(
    'id'       => 'instagram-link',
    'type'     => 'text',
    'title'    => esc_html__( 'Instagram URL', 'service-finder' ),
    'subtitle' => esc_html__( 'Enter Instagram URL', 'service-finder' ),
    'desc'     => '',
    'validate' => 'url',
    ),
	array(
    'id'       => 'youtube-link',
    'type'     => 'text',
    'title'    => esc_html__( 'Youtube URL', 'service-finder' ),
    'subtitle' => esc_html__( 'Enter Youtube URL', 'service-finder' ),
    'desc'     => '',
    'validate' => 'url',
    ),
    )
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Social Shares', 'service-finder' ),
    'id'               => 'social-shares',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'enable-social-shares',
    'type'     => 'switch',
    'title'    => esc_html__( 'Enable Social Shares', 'service-finder' ),
    'subtitle' => esc_html__( 'Enable this option to show social shares below each post', 'service-finder' ),
    'default'  => true,
    ),
    array(
    'id'       => 'facebook',
    'type'     => 'switch',
    'title'    => esc_html__( 'Facebook', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
    array(
    'id'       => 'linkedin',
    'type'     => 'switch',
    'title'    => esc_html__( 'Linkedin', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
    array(
    'id'       => 'twitter',
    'type'     => 'switch',
    'title'    => esc_html__( 'Twitter', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
    array(
    'id'       => 'pinterest',
    'type'     => 'switch',
    'title'    => esc_html__( 'Pinterest', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
    array(
    'id'       => 'digg',
    'type'     => 'switch',
    'title'    => esc_html__( 'Digg', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
    )
    ) );
    
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Typography Settings', 'service-finder' ),
    'id'               => 'typography-settings',
	'customizer'           => false,
    'desc'             => '',
    'customizer_width' => '400px',
    'icon'             => 'el el-font'
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Predefine Tags', 'service-finder' ),
    'id'               => 'predefine-tags',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    /*array(
    'id'       => 'body-tag',
    'type'     => 'typography',
    'title'    => esc_html__( 'Body Tag', 'service-finder' ),
    'subtitle' => '',
    'google'   => true,
	'text-align' => false,
	'text-transform' => false,
	'subsets' => false,
    'default'  => array(
    'color'       => '#767676',
    'font-size'   => '13px',
    'font-family' => "Open Sans",
    'font-weight' => '400',
    'line-height' => '24px',
    ),
    ),*/
	array(
    'id'       => 'banner-heading-text',
    'type'     => 'typography',
    'title'    => esc_html__( 'Home Page Banner Heading', 'service-finder' ),
    'subtitle' => '',
    'google'   => true,
	'subsets' => false,
	'text-align' => false,
	'text-transform' => true,
    'default'  => array(
    'color'       => '#ffffff',
    'font-size'   => '72px',
    'font-family' => "Raleway",
    'font-weight' => '700',
    'line-height' => '70px',
    ),
    ),
	array(
    'id'       => 'banner-sub-heading-text',
    'type'     => 'typography',
    'title'    => esc_html__( 'Home Page Banner Sub Heading', 'service-finder' ),
    'subtitle' => '',
    'google'   => true,
	'subsets' => false,
	'text-align' => false,
	'text-transform' => true,
    'default'  => array(
    'color'       => '#ffffff',
    'font-size'   => '24px',
    'font-family' => "Raleway",
    'font-weight' => '400',
    'line-height' => '30px',
    ),
    ),
	array(
    'id'       => 'h1-size',
    'type'     => 'typography',
    'title'    => esc_html__( 'H1 Size', 'service-finder' ),
    'subtitle' => '',
    'google'   => true,
	'subsets' => false,
	'text-align' => false,
	'text-transform' => true,
    'default'  => array(
    'color'       => '#555555',
    'font-size'   => '36px',
    'font-family' => "Open Sans",
    'font-weight' => 'Normal',
    'line-height' => '36px',
    ),
    ),
    array(
    'id'       => 'h2-size',
    'type'     => 'typography',
    'title'    => esc_html__( 'H2 Size', 'service-finder' ),
    'subtitle' => '',
    'google'   => true,
	'text-align' => false,
	'subsets' => false,
	'text-transform' => true,
    'default'  => array(
    'color'       => '#555555',
    'font-size'   => '24px',
    'font-family' => "Open Sans",
    'font-weight' => 'Normal',
    'line-height' => '24px',
    ),
    ),
    array(
    'id'       => 'h3-size',
    'type'     => 'typography',
    'title'    => esc_html__( 'H3 Size', 'service-finder' ),
    'subtitle' => '',
    'google'   => true,
	'subsets' => false,
	'text-align' => false,
	'text-transform' => true,
    'default'  => array(
    'color'       => '#555555',
    'font-size'   => '20px',
    'font-family' => "Open Sans",
    'font-weight' => 'Normal',
    'line-height' => '24px',
    ),
    ),
    array(
    'id'       => 'h4-size',
    'type'     => 'typography',
    'title'    => esc_html__( 'H4 Size', 'service-finder' ),
    'subtitle' => '',
    'google'   => true,
	'text-align' => false,
	'subsets' => false,
	'text-transform' => true,
    'default'  => array(
    'color'       => '#555555',
    'font-size'   => '18px',
    'font-family' => "Open Sans",
    'font-weight' => 'Normal',
    'line-height' => '22px',
    ),
    ),
    array(
    'id'       => 'h5-size',
    'type'     => 'typography',
    'title'    => esc_html__( 'H5 Size', 'service-finder' ),
    'subtitle' => '',
    'google'   => true,
	'text-align' => false,
	'subsets' => false,
	'text-transform' => true,
    'default'  => array(
    'color'       => '#555555',
    'font-size'   => '16px',
    'font-family' => "Open Sans",
    'font-weight' => 'Normal',
    'line-height' => '22px',
    ),
    ),
    array(
    'id'       => 'h6-size',
    'type'     => 'typography',
    'title'    => esc_html__( 'H6 Size', 'service-finder' ),
    'subtitle' => '',
    'google'   => true,
	'text-align' => false,
	'subsets' => false,
	'text-transform' => true,
    'default'  => array(
    'color'       => '#555555',
    'font-size'   => '14px',
    'font-family' => "Open Sans",
    'font-weight' => 'Normal',
    'line-height' => '18px',
    ),
    ),
    )
    ) );
    
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Contact Page', 'service-finder' ),
    'id'               => 'contact-page',
	'customizer'           => false,
    'desc'             => '',
    'customizer_width' => '400px',
    'icon'             => 'el el-envelope'
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Contact Us', 'service-finder' ),
    'id'               => 'contact-us',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'contact-templates',
    'type'     => 'image_select',
    'title'    => esc_html__( 'Contact Templates', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    //Must provide key => value(array:title|img) pairs for radio options
    'options'  => array(
    'contact-us' => array(
    'alt' => 'Contact ver 1',
    'img' => get_template_directory_uri().'/inc/images/redux/contact-1.jpg'
    ),
    'contact-us-v2' => array(
    'alt' => 'Contact ver 2',
    'img' => get_template_directory_uri().'/inc/images/redux/contact-2.jpg'
    ),
    'contact-us-v3' => array(
    'alt' => 'Contact ver 3',
    'img' => get_template_directory_uri().'/inc/images/redux/contact-4.jpg'
    ),
    'contact-us-v4' => array(
    'alt' => 'Contact ver 4',
    'img' => get_template_directory_uri().'/inc/images/redux/contact-3.jpg'
    ),
	'contact-us-v5' => array(
    'alt' => 'Contact ver 5',
    'img' => get_template_directory_uri().'/inc/images/redux/contact-5.jpg'
    )
    ),
    'default'  => 'contact-us'
    ),
	array(
		'id'       => 'contact-address-icon',
		'type'     => 'media',
		'url'      => true,
		'title'    => esc_html__( 'Address Icon', 'service-finder' ),
		'required' => array( 'contact-templates', '=', 'contact-us-v5' )
	),
	array(
		'id'       => 'contact-email-icon',
		'type'     => 'media',
		'url'      => true,
		'title'    => esc_html__( 'Email Icon', 'service-finder' ),
		'required' => array( 'contact-templates', '=', 'contact-us-v5' )
	),
	array(
		'id'       => 'contact-phone-icon',
		'type'     => 'media',
		'url'      => true,
		'title'    => esc_html__( 'Phone Icon', 'service-finder' ),
		'required' => array( 'contact-templates', '=', 'contact-us-v5' )
	),
    array(
    'id'       => 'hide-contact-page-map',
    'type'     => 'switch',
    'title'    => esc_html__( 'Hide Contact Map', 'service-finder' ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'contact-facebook',
    'type'     => 'text',
    'title'    => esc_html__( 'Facebook', 'service-finder' ),
    'subtitle' => esc_html__( 'Enter facebook url', 'service-finder' ),
	'required' => array( 'contact-templates', '=', 'contact-us-v5' )
    ),
	array(
    'id'       => 'contact-twitter',
    'type'     => 'text',
    'title'    => esc_html__( 'Twitter', 'service-finder' ),
    'subtitle' => esc_html__( 'Enter twitter url', 'service-finder' ),
	'required' => array( 'contact-templates', '=', 'contact-us-v5' )
    ),
	array(
    'id'       => 'contact-pinterest',
    'type'     => 'text',
    'title'    => esc_html__( 'Pinterest', 'service-finder' ),
    'subtitle' => esc_html__( 'Enter pinterest url', 'service-finder' ),
	'required' => array( 'contact-templates', '=', 'contact-us-v5' )
    ),
	array(
    'id'       => 'phone',
    'type'     => 'text',
    'title'    => esc_html__( 'Phone', 'service-finder' ),
    'subtitle' => esc_html__( 'Enter phone number', 'service-finder' ),
    ),
    array(
    'id'       => 'email',
    'type'     => 'text',
    'title'    => esc_html__( 'Email', 'service-finder' ),
    'subtitle' => esc_html__( 'Enter Valid Email', 'service-finder' ),
    'desc'     => '',
    'validate' => 'email',
    'msg'      => 'Please enter valid email address',
    'default'  => '',
    ),
    array(
    'id'           => 'address',
    'type'         => 'textarea',
    'title'        => esc_html__( 'Address', 'service-finder' ),
    'subtitle'     => esc_html__( 'Enter address here', 'service-finder' ),
    'desc'         => '',
    'validate'     => 'html_custom',
    'default'      => '',
    'allowed_html' => array(
    'a'      => array(
    'href'  => array(),
    'title' => array()
    ),
    'br'     => array(),
    'em'     => array(),
    'strong' => array()
    ) 
    ),
    )
    ) );
    
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Accounts', 'service-finder' ),
    'id'               => 'accounts',
	'customizer'           => false,
    'desc'             => esc_html__( 'Accounts Settings', 'service-finder' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-user'
    ) );
    
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Payment Settings', 'service-finder' ),
    'id'               => 'payment-settings',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'pay_booking_amount_to',
    'type'     => 'select',
    'title'    => esc_html__( 'Booking Payment to', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'admin' => 'Admin',
    'provider' => esc_html($providerreplacestring),
    ),
    'default'  => 'admin'
    ),
	array(
    'id'       => 'payment-methods',
    'type'     => 'checkbox',
	'desc'     => 'Wire Transfer for booking, registration and upgrade/Paypal Adaptive for pay to provider from admin',
    'title'    => esc_html__( 'Payment Methods', 'service-finder' ),
    'options'  => array(
    'paypal' => 'Paypal',
    'stripe' => 'Stripe',
	/*'twocheckout' => '2Checkout',*/
	'wired' => 'Wire Transfer',
	'paypal-adaptive' => 'Paypal Adaptive',
	'payumoney' => 'PayU Money '.esc_html__( '(Works for one time payment, not recurring.)', 'service-finder' ),
	'payulatam' => 'PayU Latam '.esc_html__( '(Works for one time payment, not recurring.)', 'service-finder' ),
	'cod' => 'Cash on Delivery '.esc_html__( '(Works only for booking)', 'service-finder' ),
    ),
    'default'  => array(
    'wired' => '0',
	'paypal' => '0',
    'stripe' => '0',
	'paypal-adaptive' => '0',
	'payu-money' => '0',
	'cod' => '0',
    )
    ),
	array(
    'id'       => 'currency-code',
    'type'     => 'select',
    'title'    => esc_html__( 'Currency Code', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'AED' => esc_html__( 'United Arab Emirates Dirham', 'service-finder' ),
    'AUD' => esc_html__( 'Australian Dollars (&#36;)', 'service-finder' ),
	'ARS' => esc_html__( 'Argentina (&#36;)', 'service-finder' ),
    'BDT' => esc_html__( 'Bangladeshi Taka (&#2547;&nbsp;)', 'service-finder' ),
    'BRL' => esc_html__( 'Brazilian Real (&#82;&#36;)', 'service-finder' ),
    'BGN' => esc_html__( 'Bulgarian Lev (&#1083;&#1074;.)', 'service-finder' ),
	'BZD' => esc_html__( 'Belize Dollar (BZ&#36;)', 'service-finder' ),
	'BHD' => esc_html__( 'Bahraini dinar (BD)', 'service-finder' ),
    'CAD' => esc_html__( 'Canadian Dollars (&#36;)', 'service-finder' ),
    'CLP' => esc_html__( 'Chilean Peso (&#36;)', 'service-finder' ),
    'CNY' => esc_html__( 'Chinese Yuan (&yen;)', 'service-finder' ),
    'COP' => esc_html__( 'Colombian Peso (&#36;)', 'service-finder' ),
    'CZK' => esc_html__( 'Czech Koruna (&#75;&#269;)', 'service-finder' ),
	'DZD' => esc_html__( 'Algerian Dinar', 'service-finder' ),
    'DKK' => esc_html__( 'Danish Krone (kr.)', 'service-finder' ),
    'DOP' => esc_html__( 'Dominican Peso (RD&#36;)', 'service-finder' ),
    'EUR' => esc_html__( 'Euros (&euro;)', 'service-finder' ),
    'GYD' => esc_html__( 'Guyanese dollar (GY$)', 'service-finder' ),
	'GHS' => esc_html__( 'Ghanaian cedi (GH&#8373;)', 'service-finder' ),
	'HKD' => esc_html__( 'Hong Kong Dollar (&#36;)', 'service-finder' ),
    'HRK' => esc_html__( 'Croatia kuna (Kn)', 'service-finder' ),
    'HUF' => esc_html__( 'Hungarian Forint (&#70;&#116;)', 'service-finder' ),
    'ISK' => esc_html__( 'Icelandic krona (Kr.)', 'service-finder' ),
    'IDR' => esc_html__( 'Indonesia Rupiah (Rp)', 'service-finder' ),
    'INR' => esc_html__( 'Indian Rupee (Rs.)', 'service-finder' ),
	'PKR' => esc_html__( 'Pakistani Rupee (Rs.)', 'service-finder' ),
    'NPR' => esc_html__( 'Nepali Rupee (Rs.)', 'service-finder' ),
    'ILS' => esc_html__( 'Israeli Shekel (&#8362;)', 'service-finder' ),
    'JPY' => esc_html__( 'Japanese Yen (&yen;)', 'service-finder' ),
    'KIP' => esc_html__( 'Lao Kip (&#8365;)', 'service-finder' ),
    'KRW' => esc_html__( 'South Korean Won (&#8361;)', 'service-finder' ),
    'MAD' => esc_html__( 'Moroccan Dirham (&#x2e;&#x62f;&#x2e;&#x645;)', 'service-finder' ),
	'MYR' => esc_html__( 'Malaysian Ringgits (&#82;&#77;)', 'service-finder' ),
	'MVR' => esc_html__( 'Maldivian Rufiyaa (Rf)', 'service-finder' ),
    'MXN' => esc_html__( 'Mexican Peso (&#36;)', 'service-finder' ),
    'NGN' => esc_html__( 'Nigerian Naira (&#8358;)', 'service-finder' ),
    'NOK' => esc_html__( 'Norwegian Krone (&#107;&#114;)', 'service-finder' ),
    'NZD' => esc_html__( 'New Zealand Dollar (&#36;)', 'service-finder' ),
    'PEN' => esc_html__( 'Peru (Sol)', 'service-finder' ),
	'PYG' => esc_html__( 'Paraguayan Guaran&&iuml; (&#8370;)', 'service-finder' ),
    'PHP' => esc_html__( 'Philippine Pesos (&#8369;)', 'service-finder' ),
    'PLN' => esc_html__( 'Polish Zloty (&#122;&#322;)', 'service-finder' ),
    'GBP' => esc_html__( 'Pounds Sterling (&pound;)', 'service-finder' ),
    'RON' => esc_html__( 'Romanian Leu (lei)', 'service-finder' ),
    'RUB' => esc_html__( 'Russian Ruble (&#1088;&#1091;&#1073;.)', 'service-finder' ),
	'UAH' => esc_html__( 'Ukranian Hrivna (&#8372;)', 'service-finder' ),
    'SGD' => esc_html__( 'Singapore Dollar (&#36;)', 'service-finder' ),
	'LKR' => esc_html__( 'Sri Lankan Rupee (Rs)', 'service-finder' ),
    'ZAR' => esc_html__( 'South African rand (&#82;)', 'service-finder' ),
    'SEK' => esc_html__( 'Swedish Krona (&#107;&#114;)', 'service-finder' ),
    'CHF' => esc_html__( 'Swiss Franc (&#67;&#72;&#70;)', 'service-finder' ),
    'TWD' => esc_html__( 'Taiwan New Dollars (&#78;&#84;&#36;)', 'service-finder' ),
    'THB' => esc_html__( 'Thai Baht (&#3647;)', 'service-finder' ),
    'TRY' => esc_html__( 'Turkish Lira (&#8378;)', 'service-finder' ),
    'USD' => esc_html__( 'US Dollars (&#36;)', 'service-finder' ),
    'VND' => esc_html__( 'Vietnamese Dong (&#8363;)', 'service-finder' ),
    'EGP' => esc_html__( 'Egyptian Pound (EGP)', 'service-finder' ),
	'XOF' => esc_html__( 'West African Franc (FCFA)', 'service-finder' ),
	'SAR' => esc_html__( 'Saudi Riyal', 'service-finder' ),
	'KSH' => esc_html__( 'Kenyan Shilling', 'service-finder' ),
	'HNL' => esc_html__( 'Honduran Lempira', 'service-finder' ),
	'TZS' => esc_html__( 'Tanzanian Shilling', 'service-finder' ),
	'XPF' => esc_html__( 'CFP Franc', 'service-finder' ),
	'UGX' => esc_html__( 'Uganda Shillings', 'service-finder' ),
	'TZS' => esc_html__( 'Tanzania Shillings', 'service-finder' ),
	'RWF' => esc_html__( 'Rwandan Franc', 'service-finder' ),
	'BIF' => esc_html__( 'Burundi Franc', 'service-finder' ),
	'colones' => esc_html__( 'Costa Rica Colones', 'service-finder' ),
	'BAM' => esc_html__( 'Bosnia and Herzegovina', 'service-finder' ),
	'KZT' => esc_html__( 'Kazakhstan', 'service-finder' ),
	'AOA' => esc_html__( 'Angolan kwanza', 'service-finder' ),
    ),
    'default'  => 'USD'
    ),
    array(
    'id'       => 'payment-type',
    'type'     => 'radio',
    'title'    => esc_html__( 'Payment Type ', 'service-finder' ),
    'options'  => array(
    'single' => 'Single payments',	
    'recurring' => 'Recurring payments (Subscriptions)',
    ),
    'default'  => 'single'
    ),
    array(
    'id'       => 'wire-transfer-settings',
    'type'     => 'section',
    'title'    => esc_html__( 'Wire Transfer Settings', 'service-finder' ),
    'indent'   => false,
    ),
	array(
    'id'      => 'wire-transfer-description',
    'type'    => 'editor',
    'title'   => esc_html__( 'Description for Wire Transfer', 'service-finder' ),
    'desc' => "",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'      => 'wire-transfer-mail-instructions',
    'type'    => 'editor',
    'title'   => esc_html__( 'Instructions for Wire Transfer', 'service-finder' ),
    'desc' => sprintf( esc_html__('This instruction will be send in mail template to %s', 'service-finder'), $customerreplacestring ),
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'paypal-settings',
    'type'     => 'section',
    'title'    => esc_html__( 'Paypal Settings', 'service-finder' ),
    'indent'   => false,
    ),
    array(
    'id'       => 'enable-paypal',
    'type'     => 'checkbox',
    'title'    => esc_html__( 'Enable paypal', 'service-finder' ),
    'default'  => '1'
    ),
    array(
    'id'       => 'paypal-type',
    'type'     => 'radio',
    'title'    => esc_html__( 'PayPal API Enviroment', 'service-finder' ),
    'options'  => array(
    'sandbox' => esc_html__( 'Use sandbox (virtual) enviroment to testing paypal functionality', 'service-finder' ),
    'live' 	  => esc_html__( 'Use live (real) enviroment ', 'service-finder' ),
    ),
    'default'  => 'sandbox'
    ),
    array(
    'id'       => 'paypal-username',
    'type'     => 'text',
    'title'    => esc_html__( 'PayPal API Username', 'service-finder' ),
    ),
    array(
    'id'       => 'paypal-password',
    'type'     => 'text',
    'title'    => esc_html__( 'PayPal API Password', 'service-finder' ),
    ),
    array(
    'id'       => 'paypal-signatue',
    'type'     => 'text',
    'title'    => esc_html__( 'PayPal API Signatue', 'service-finder' ),
    ),
	array(
    'id'       => 'paypal-payment-name',
    'type'     => 'text',
    'title'    => esc_html__( 'PayPal Payment Name', 'service-finder' ),
    ),
	 array(
    'id'       => 'paypal-method',
    'type'     => 'radio',
    'title'    => esc_html__( 'Paypal Method', 'service-finder' ),
    'options'  => array(
    'expresscheckout' => 'Paypal Express Checkout',	
    'adaptivepayment' => 'Paypal Adaptive Payment',
    ),
    'default'  => 'expresscheckout'
    ),
	array(
    'id'       => 'paypal-app-id',
    'type'     => 'text',
    'title'    => esc_html__( 'PayPal App ID', 'service-finder' ),
	'desc' 	   => esc_html__( 'It will use for paypal adaptive payment option', 'service-finder' ),
	'required' => array( 'paypal-method', '=', 'adaptivepayment' ),
    ),
	array(
    'id'       => 'paypal-email-id',
    'type'     => 'text',
    'title'    => esc_html__( 'PayPal Email ID', 'service-finder' ),
	'desc' 	   => esc_html__( 'It will use for paypal adaptive payment option', 'service-finder' ),
	'required' => array( 'paypal-method', '=', 'adaptivepayment' ),
    ),
	array(
    'id'       => 'payment-fees-by',
    'type'     => 'select',
    'title'    => esc_html__( 'Payment Fees by', 'service-finder' ),
    'options'  => array(
    'PRIMARYRECEIVER' => 'Primary Receiver',
    'EACHRECEIVER' => 'Each Receiver',
    ),
    'default'  => 'PRIMARYRECEIVER',
	'required' => array( 'paypal-method', '=', 'adaptivepayment' )
    ),
    array(
    'id'       => 'stripe-settings',
    'type'     => 'section',
    'title'    => esc_html__( 'Stripe Settings', 'service-finder' ),
    'indent'   => false,
    ),
    array(
    'id'       => 'enable-stripe',
    'type'     => 'checkbox',
    'title'    => esc_html__( 'Enable Stripe', 'service-finder' ),
    'default'  => '1'
    ),
    array(
    'id'       => 'stripe-type',
    'type'     => 'radio',
    'title'    => esc_html__( 'Stripe Mode', 'service-finder' ),
    'options'  => array(
    'test' => 'Test Mode',	
    'live' => 'Live Mode',
    ),
    'default'  => 'test'
    ),
    array(
    'id'       => 'stripe-test-secret-key',
    'type'     => 'text',
    'title'    => esc_html__( 'Test Secret Key', 'service-finder' ),
    ),
    array(
    'id'       => 'stripe-test-public-key',
    'type'     => 'text',
    'title'    => esc_html__( 'Test Public Key', 'service-finder' ),
    ),
    array(
    'id'       => 'stripe-live-secret-key',
    'type'     => 'text',
    'title'    => esc_html__( 'Live Secret Key', 'service-finder' ),
    ),
    array(
    'id'       => 'stripe-live-public-key',
    'type'     => 'text',
    'title'    => esc_html__( 'Live Public Key', 'service-finder' ),
    ),
	array(
    'id'       => 'stripe-connect-type',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Stripe Connect Type', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'standard' => 'Standard',
    'custom' => 'Custom',
    ),
    'default'  => 'standard'
    ),
	array(
    'id'       => 'stripe-connect-client-id',
    'type'     => 'text',
    'title'    => esc_html__( 'Stripe Connect Client ID', 'service-finder' ),
	'desc' 	   => esc_html__( 'It will use for pay to provider via stripe connect', 'service-finder' ),
	'required' => array( 'stripe-connect-type', '=', 'standard' ),
    ),
    array(
    'id'       => 'stripe-payment-name',
    'type'     => 'text',
    'title'    => esc_html__( 'Stripe Payment Name', 'service-finder' ),
    ),
	array(
    'id'       => 'payu-money-settings',
    'type'     => 'section',
    'title'    => esc_html__( 'PayU Money Settings', 'service-finder' ),
    'indent'   => false,
    ),
    array(
    'id'       => 'enable-payu-money',
    'type'     => 'checkbox',
    'title'    => esc_html__( 'Enable PayU Money', 'service-finder' ),
    'default'  => '1'
    ),
    array(
    'id'       => 'payumoney-type',
    'type'     => 'radio',
    'title'    => esc_html__( 'PayU Money Mode', 'service-finder' ),
    'options'  => array(
    'test' => 'Test Mode',	
    'live' => 'Live Mode',
    ),
    'default'  => 'test'
    ),
    array(
    'id'       => 'payumoney-mid-test',
    'type'     => 'text',
    'title'    => esc_html__( 'Test PayU Money MID', 'service-finder' ),
    ),
    array(
    'id'       => 'payumoney-key-test',
    'type'     => 'text',
    'title'    => esc_html__( 'Test PayU Money Key', 'service-finder' ),
    ),
    array(
    'id'       => 'payumoney-salt-test',
    'type'     => 'text',
    'title'    => esc_html__( 'Test PayU Money Salt', 'service-finder' ),
    ),
	array(
    'id'       => 'payumoney-mid-live',
    'type'     => 'text',
    'title'    => esc_html__( 'Live PayU Money MID', 'service-finder' ),
    ),
    array(
    'id'       => 'payumoney-key-live',
    'type'     => 'text',
    'title'    => esc_html__( 'Live PayU Money Key', 'service-finder' ),
    ),
    array(
    'id'       => 'payumoney-salt-live',
    'type'     => 'text',
    'title'    => esc_html__( 'Live PayU Money Salt', 'service-finder' ),
    ),
	array(
    'id'       => 'payumoney-payment-name',
    'type'     => 'text',
    'title'    => esc_html__( 'PayU Money Payment Name', 'service-finder' ),
    ),
	array(
    'id'       => 'payu-latam-settings',
    'type'     => 'section',
    'title'    => esc_html__( 'PayU Latam Settings', 'service-finder' ),
    'indent'   => false,
    ),
    array(
    'id'       => 'enable-payu-latam',
    'type'     => 'checkbox',
    'title'    => esc_html__( 'Enable PayU Latam', 'service-finder' ),
    'default'  => '1'
    ),
    array(
    'id'       => 'payulatam-type',
    'type'     => 'radio',
    'title'    => esc_html__( 'PayU Latam Mode', 'service-finder' ),
    'options'  => array(
    'test' => 'Test Mode',	
    'live' => 'Live Mode',
    ),
    'default'  => 'test'
    ),
    array(
    'id'       => 'payulatam-merchantid-test',
    'type'     => 'text',
    'title'    => esc_html__( 'Test PayU Latam Merchant Id', 'service-finder' ),
    ),
	array(
    'id'       => 'payulatam-apilogin-test',
    'type'     => 'text',
    'title'    => esc_html__( 'Test PayU Latam API Login', 'service-finder' ),
    ),
	array(
    'id'       => 'payulatam-apikey-test',
    'type'     => 'text',
    'title'    => esc_html__( 'Test PayU Latam API Key', 'service-finder' ),
    ),
	array(
    'id'       => 'payulatam-accountid-test',
    'type'     => 'text',
    'title'    => esc_html__( 'Test PayU Latam Account Id', 'service-finder' ),
    ),
	array(
    'id'       => 'payulatam-merchantid-live',
    'type'     => 'text',
    'title'    => esc_html__( 'Live  PayU Latam Merchant Id', 'service-finder' ),
    ),
	array(
    'id'       => 'payulatam-apilogin-live',
    'type'     => 'text',
    'title'    => esc_html__( 'Live PayU Latam API Login', 'service-finder' ),
    ),
	array(
    'id'       => 'payulatam-apikey-live',
    'type'     => 'text',
    'title'    => esc_html__( 'Live PayU Latam API Key', 'service-finder' ),
    ),
	array(
    'id'       => 'payulatam-accountid-live',
    'type'     => 'text',
    'title'    => esc_html__( 'Live PayU Latam Account Id', 'service-finder' ),
    ),
	array(
    'id'       => 'payulatam-apilogin-live',
    'type'     => 'text',
    'title'    => esc_html__( 'Live PayU Latam 	API Login', 'service-finder' ),
    ),
	array(
    'id'       => 'payulatam-payment-name',
    'type'     => 'text',
    'title'    => esc_html__( 'PayU Latam Payment Name', 'service-finder' ),
    ),
	array(
    'id'       => 'payulatam-country',
    'type'     => 'select',
    'title'    => esc_html__( 'Country', 'service-finder' ),
    'options'  => array(
    'AR' => 'Argentina',
    'BR' => 'Brazil',
	'CO' => 'Colombia',
    'MX' => 'Mexico',
    'PA' => 'Panama',
	'PE' => 'Peru',
    ),
    'default'  => 'AR'
    ),
	/*array(
    'id'       => 'twocheckout-settings',
    'type'     => 'section',
    'title'    => esc_html__( '2Checkout Settings', 'service-finder' ),
    'indent'   => false,
    ),
    array(
    'id'       => 'twocheckout-type',
    'type'     => 'radio',
    'title'    => esc_html__( '2Checkout Mode', 'service-finder' ),
    'options'  => array(
    'test' => 'Test Mode',	
    'live' => 'Live Mode',
    ),
    'default'  => 'test'
    ),
	array(
    'id'       => 'twocheckout-api-username',
    'type'     => 'text',
    'title'    => esc_html__( 'API Username', 'service-finder' ),
    ),
	array(
    'id'       => 'twocheckout-api-password',
    'type'     => 'text',
    'title'    => esc_html__( 'API Password', 'service-finder' ),
    ),
	array(
    'id'       => 'twocheckout-test-account-id',
    'type'     => 'text',
    'title'    => esc_html__( 'Test Account ID', 'service-finder' ),
    ),
    array(
    'id'       => 'twocheckout-test-publish-key',
    'type'     => 'text',
    'title'    => esc_html__( 'Test Publish Key', 'service-finder' ),
    ),
    array(
    'id'       => 'twocheckout-test-private-key',
    'type'     => 'text',
    'title'    => esc_html__( 'Test Private Key', 'service-finder' ),
    ),
	array(
    'id'       => 'twocheckout-live-account-id',
    'type'     => 'text',
    'title'    => esc_html__( 'Live Account ID', 'service-finder' ),
    ),
    array(
    'id'       => 'twocheckout-live-publish-key',
    'type'     => 'text',
    'title'    => esc_html__( 'Live Publish Key', 'service-finder' ),
    ),
    array(
    'id'       => 'twocheckout-live-private-key',
    'type'     => 'text',
    'title'    => esc_html__( 'Live Private Key', 'service-finder' ),
    ),*/
    )
    ) );
	
	/*Payout settings*/
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Payout Settings', 'service-finder' ),
		'id'               => 'payout-settings',
		'desc'             => esc_html__( 'Manage payout related settings from here', 'service-finder' ),
		'customizer'       => false,
		'subsection'       => true,
		'customizer_width' => '450px',
		'desc'             => '',
        'fields'           => array(
			array(
				'id'       => 'masspay-payout-enable',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Paypal Masspay Payout', 'service-finder' ),
				'subtitle' => '',
				'default'  => false,
			),
			array(
                'id'       => 'masspay-api-username',
                'type'     => 'text',
                'title'    => esc_html__( 'Masspay API Username', 'service-finder' ),
				'desc'     => '',
				'default'  => '',
				'required' => array( 'masspay-payout-enable', '=', true ),
            ),
			array(
                'id'       => 'masspay-api-password',
                'type'     => 'text',
                'title'    => esc_html__( 'Masspay API Password', 'service-finder' ),
				'desc'     => '',
				'default'  => '',
				'required' => array( 'masspay-payout-enable', '=', true ),
            ),
			array(
                'id'       => 'masspay-api-signature',
                'type'     => 'text',
                'title'    => esc_html__( 'Masspay API Signature', 'service-finder' ),
				'desc'     => '',
				'default'  => '',
				'required' => array( 'masspay-payout-enable', '=', true ),
            ),
			array(
				'id'       => 'masspay-test-mode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Masspay Test Mode', 'service-finder' ),
				'subtitle' => '',
				'default'  => true,
				'required' => array( 'masspay-payout-enable', '=', true ),
			),
        )
    ) );

	$cap_fields = service_finder_get_all_capabilities();		
	
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Packages', 'service-finder' ),
    'id'               => 'payment-packages',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'default-signup-package',
    'type'     => 'select',
    'title'    => esc_html__( 'Default Signup Package', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'This will be default package for signup and make sure it should be active. Other packages will be show in upgrade account.', 'service-finder' ),
    'options'  => array(
		'package_0' => esc_html__( 'Trial Package', 'service-finder' ),
		'package_1' => esc_html__( 'Package 1', 'service-finder' ),
		'package_2' => esc_html__( 'Package 2', 'service-finder' ),
		'package_3' => esc_html__( 'Package 3', 'service-finder' )
	),
    'default'  => 'package_0'
    ),
	array(
    'id'       => 'default-social-signup-package',
    'type'     => 'select',
    'title'    => esc_html__( 'Default Social Signup Package', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'This will be default package for social signup and make sure it should be active. Other packages will be show in upgrade account.', 'service-finder' ),
    'options'  => array(
		'package_0' => esc_html__( 'Trial Package', 'service-finder' ),
		'package_1' => esc_html__( 'Package 1', 'service-finder' ),
		'package_2' => esc_html__( 'Package 2', 'service-finder' ),
		'package_3' => esc_html__( 'Package 3', 'service-finder' )
	),
    'default'  => ''
    ),
	array(
    'id'       => 'enable-package0',
    'type'     => 'checkbox',
    'title'    => esc_html__( 'Trial Package', 'service-finder' ),
    'default'  => '1'
    ),
    array(
    'id'       => 'package0-name',
    'type'     => 'text',
    'title'    => esc_html__( 'Package Name', 'service-finder' ),
    ),
	array(
    'id'       => 'package0-expday',
    'type'     => 'text',
    'title'    => esc_html__( 'Account expiration limit in days', 'service-finder' ),
    'subtitle' => '',
    'default'  => '30'
    ),
	array(
    'id'       => 'package0-capabilities',
    'type'     => 'checkbox',
    'title'    => esc_html__( 'Package Capabilities', 'service-finder' ),
    'options'  => $cap_fields,
    'default'  => 'booking'
    ),
    array(
    'id'       => 'capabilities0-subsection',
    'type'     => 'section',
    'title'    => '',
    'indent'   => false,
    ),
    array(
    'id'       => 'package0-subcapabilities',
    'type'     => 'checkbox',
    'title'    => esc_html__( 'Package Sub Capabilities', 'service-finder' ),
    'options'  => array(
    'invoice' => esc_html__('Invoice', 'service-finder' ),
    'availability' => esc_html__('Availability', 'service-finder' ),
    'staff-members' => esc_html__('Staff Members', 'service-finder' ),
    ),
    ),
	array(
    'id'       => 'enable-package1',
    'type'     => 'checkbox',
    'title'    => esc_html__( 'Active Packages 1', 'service-finder' ),
    'default'  => '0'
    ),
    array(
    'id'       => 'package1-name',
    'type'     => 'text',
    'title'    => esc_html__( 'Package Name', 'service-finder' ),
    ),
    array(
    'id'       => 'package1-price',
    'type'     => 'text',
    'title'    => esc_html__( 'Price (0 for free)', 'service-finder' ),
    'default'  => '0'
    ),
    array(
    'id'       => 'package1-expday',
    'type'     => 'text',
    'title'    => esc_html__( 'Account expiration limit in days (0 for unlimited)', 'service-finder' ),
    'subtitle' => esc_html__( 'Used for free and single payments', 'service-finder' ),
    'default'  => '0'
    ),
    array(
    'id'       => 'package1-billing-period',
    'type'     => 'select',
    'title'    => esc_html__( 'Billing Period', 'service-finder' ),
    'subtitle' => esc_html__( 'Used for recurring payments', 'service-finder' ),
    'options'  => array(
    'Year' => 'Year',
    'Month' => 'Month',
    'Week' => 'Week',
    'Day' => 'Day',
    ),
    'default'  => 'Year'
    ),
    array(
    'id'       => 'package1-capabilities',
    'type'     => 'checkbox',
    'title'    => esc_html__( 'Package Capabilities', 'service-finder' ),
    'options'  => $cap_fields,
    'default'  => 'booking'
    ),
    
    array(
    'id'       => 'capabilities1-subsection',
    'type'     => 'section',
    'title'    => '',
    'indent'   => false,
    ),
    array(
    'id'       => 'package1-subcapabilities',
    'type'     => 'checkbox',
    'title'    => esc_html__( 'Package Sub Capabilities', 'service-finder' ),
    'options'  => array(
    'invoice' => esc_html__('Invoice', 'service-finder' ),
    'availability' => esc_html__('Availability', 'service-finder' ),
    'staff-members' => esc_html__('Staff Members', 'service-finder' ),
    ),
    ),
    
    array(
    'id'       => 'package2',
    'type'     => 'section',
    'title'    => esc_html__( 'Package 2', 'service-finder' ),
    'indent'   => false,
    ),
    array(
    'id'       => 'enable-package2',
    'type'     => 'checkbox',
    'title'    => esc_html__( 'Active Packages 2', 'service-finder' ),
    'default'  => '0'
    ),
    array(
    'id'       => 'package2-name',
    'type'     => 'text',
    'title'    => esc_html__( 'Package Name', 'service-finder' ),
    ),
    array(
    'id'       => 'package2-price',
    'type'     => 'text',
    'title'    => esc_html__( 'Price (0 for free)', 'service-finder' ),
    ),
    array(
    'id'       => 'package2-expday',
    'type'     => 'text',
    'title'    => esc_html__( 'Account expiration limit in days (0 for unlimited)', 'service-finder' ),
    'subtitle' => esc_html__( 'Used for free and single paypal/stripe payments', 'service-finder' ),
    ),
    array(
    'id'       => 'package2-billing-period',
    'type'     => 'select',
    'title'    => esc_html__( 'Billing Period', 'service-finder' ),
    'subtitle' => esc_html__( 'Used for paypal/stripe recurring payments', 'service-finder' ),
    'options'  => array(
    'Year' => 'Year',
    'Month' => 'Month',
    'Week' => 'Week',
    'Day' => 'Day',
    ),
    'default'  => 'Year'
    ),
    array(
    'id'       => 'package2-capabilities',
    'type'     => 'checkbox',
    'title'    => esc_html__( 'Package Capabilities', 'service-finder' ),
    'options'  => $cap_fields,
    'default'  => 'booking'
    ),
    
    array(
    'id'       => 'capabilities2-subsection',
    'type'     => 'section',
    'title'    => '',
    'indent'   => false,
    ),
    array(
    'id'       => 'package2-subcapabilities',
    'type'     => 'checkbox',
    'title'    => esc_html__( 'Package Sub Capabilities', 'service-finder' ),
    'options'  => array(
    'invoice' => 'Invoice',
    'availability' => 'Availability',
    'staff-members' => 'Staff Members',
    ),
    ),
    
    array(
    'id'       => 'package3',
    'type'     => 'section',
    'title'    => esc_html__( 'Package 3', 'service-finder' ),
    'indent'   => false,
    ),
    array(
    'id'       => 'enable-package3',
    'type'     => 'checkbox',
    'title'    => esc_html__( 'Active Packages 3', 'service-finder' ),
    'default'  => '0'
    ),
    array(
    'id'       => 'package3-name',
    'type'     => 'text',
    'title'    => esc_html__( 'Package Name', 'service-finder' ),
    ),
    array(
    'id'       => 'package3-price',
    'type'     => 'text',
    'title'    => esc_html__( 'Price (0 for free)', 'service-finder' ),
    ),
    array(
    'id'       => 'package3-expday',
    'type'     => 'text',
    'title'    => esc_html__( 'Account expiration limit in days (0 for unlimited)', 'service-finder' ),
    'subtitle' => esc_html__( 'Used for free and single paypal/stripe payments', 'service-finder' ),
    ),
    array(
    'id'       => 'package3-billing-period',
    'type'     => 'select',
    'title'    => esc_html__( 'Billing Period', 'service-finder' ),
    'subtitle' => esc_html__( 'Used for paypal/stripe recurring payments', 'service-finder' ),
    'options'  => array(
    'Year' => 'Year',
    'Month' => 'Month',
    'Week' => 'Week',
    'Day' => 'Day',
    ),
    'default'  => 'Year'
    ),
    array(
    'id'       => 'package3-capabilities',
    'type'     => 'checkbox',
    'title'    => esc_html__( 'Package Capabilities', 'service-finder' ),
    'options'  => $cap_fields,
    'default'  => 'booking'
    ),
    
    array(
    'id'       => 'capabilities3-subsection',
    'type'     => 'section',
    'title'    => '',
    'indent'   => false,
    ),
    array(
    'id'       => 'package3-subcapabilities',
    'type'     => 'checkbox',
    'title'    => esc_html__( 'Package Sub Capabilities', 'service-finder' ),
    'options'  => array(
    'invoice' => 'Invoice',
    'availability' => 'Availability',
    'staff-members' => 'Staff Members',
    ),
    ),
    )
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Account Moderation', 'service-finder' ),
    'id'               => 'account-moderation-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'account-moderation',
    'type'     => 'switch',
    'title'    => esc_html__( 'Account Moderation', 'service-finder' ),
    'subtitle' => '',
    'default'  => false,
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Commission System', 'service-finder' ),
    'id'               => 'commission-system-settings',
	'customizer'       => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'charge-admin-fee',
    'type'     => 'switch',
    'title'    => esc_html__( 'Charge Admin Fee', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'pay-only-admin-fee',
    'type'     => 'switch',
    'title'    => esc_html__( 'Pay Only Admin Fee', 'service-finder' ),
	'desc'     => esc_html__( 'Chrage only admin fee at the time of booking if this option is on', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => false,
	'required' => array( 'charge-admin-fee', '=', true )
    ),
	array(
    'id'       => 'admin-fee-type',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Admin Fee Type', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'fixed' => 'Fixed',
    'percentage' => 'In Percentage',
    ),
    'default'  => ''
    ),
	array(
    'id'            => 'admin-fee-percentage',
    'type'          => 'slider',
    'title'    => esc_html__( 'Admin Fee (In Pecentage)', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'Enter admin fee on each booking', 'service-finder' ),
    'default'       => 0,
    'min'           => 0,
    'step'          => 1,
    'max'           => 100,
    'display_value' => 'text',
	'required' => array( 'admin-fee-type', '=', 'percentage' )
    ),
	array(
    'id'       => 'admin-fee-fixed',
    'type'     => 'text',
    'title'    => esc_html__( 'Admin Fee (Fixed Amount)', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => '',
	'required' => array( 'admin-fee-type', '=', 'fixed' )
    ),
	array(
    'id'       => 'charge-admin-fee-from',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Charge Admin Fee From', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'provider' => esc_html($providerreplacestring),
    'customer' => esc_html( $customerreplacestring ),
    ),
    'default'  => ''
    ),
	array(
    'id'       => 'admin-fee-label',
    'type'     => 'text',
    'title'    => esc_html__( 'Label for Admin Fee', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    )
    )
    ) );
	
	$pages = $wpdb->get_results("select * from ".$wpdb->prefix."posts WHERE post_type = 'page' AND post_status = 'publish'");
	
    if(!empty($pages)){
		$pagearr['no'] = esc_html__( 'No Redirect (Default)', 'service-finder' );
		foreach($pages as $page){
		$pagearr[$page->ID] = $page->post_title;
		}
    }else{
   		$pagearr['no'] = esc_html__( 'No Redirect (Default)', 'service-finder' );
    }
	
	if(class_exists( 'WooCommerce' )){

	$products = service_finder_get_woocommerce_products();
	if(empty($products)){
	$products = array(
			''	=>	esc_html__( 'No Products Found', 'service-finder' )
	);
	}

	}else{

	$products = array(
			''	=>	esc_html__( 'No Products Found', 'service-finder' )
	);

	}

	$productdesc = esc_html__( 'Please create a random woocommerce product and select from Products dropdown here. Please check documentation ', 'service-finder' );
	$productdesc .= '<a href="javascript:;"><strong>'.esc_html__( 'here', 'service-finder' ).'</strong></a>';
	$productdesc .= esc_html__( ' for more clear view.', 'service-finder' );
	
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'WooCommerce Settings', 'service-finder' ),
    'id'               => 'provider-settings-heading',
	'customizer'           => false,
    'desc'             => '',
    'customizer_width' => '400px',
    'icon'             => 'el el-cog'
    ) );
	
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'WooCommerce Settings', 'service-finder' ),
    'id'               => 'woocommerce-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'woocommerce-payment',
    'type'     => 'switch',
    'title'    => esc_html__( 'WooCommerce Payment', 'service-finder' ),
	'desc'     => esc_html__( 'If this is ON Other local payment gateway no longer work.', 'service-finder' ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'woo-product-id',
    'type'     => 'select',
    'title'    => esc_html__( 'WooCommerce Product Id', 'service-finder' ),
    'subtitle' => '',
    'desc'     => $productdesc,
    'options'  => $products,
    'default'  => '',
    ),
	array(
    'id'       => 'woo-signup-redirect',
    'type'     => 'select',
    'title'    => sprintf( esc_html__('Redirect after %s Signup', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => $pagearr,
    'default'  => 'no'
    ),
	array(
    'id'       => 'woo-upgrade-redirect',
    'type'     => 'select',
    'title'    => esc_html__('Redirect after Account Upgrade', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'options'  => $pagearr,
    'default'  => 'no'
    ),
	array(
    'id'       => 'woo-booking-redirect',
    'type'     => 'select',
    'title'    => esc_html__('Redirect after Booking', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'options'  => $pagearr,
    'default'  => 'no'
    ),
	array(
    'id'       => 'woo-featured-redirect',
    'type'     => 'select',
    'title'    => esc_html__('Redirect after Featured Payment', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'options'  => $pagearr,
    'default'  => 'no'
    ),
	array(
    'id'       => 'woo-jobconnect-redirect',
    'type'     => 'select',
    'title'    => esc_html__('Redirect after Job Connect Payment', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'options'  => $pagearr,
    'default'  => 'no'
    ),
	array(
    'id'       => 'woo-jobpostconnect-redirect',
    'type'     => 'select',
    'title'    => esc_html__('Redirect after Job Post Connect Payment', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'options'  => $pagearr,
    'default'  => 'no'
    ),
	array(
    'id'       => 'woo-claimed-redirect',
    'type'     => 'select',
    'title'    => esc_html__('Redirect after Claim Business Payment', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'options'  => $pagearr,
    'default'  => 'no'
    ),
	array(
    'id'       => 'woo-invoice-redirect',
    'type'     => 'select',
    'title'    => esc_html__('Redirect after Invoice Payment', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'options'  => $pagearr,
    'default'  => 'no'
    ),
	array(
    'id'       => 'woo-provider-wallet-redirect',
    'type'     => 'select',
    'title'    => esc_html__('Redirect after Provider Add to Wallet Payment', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'options'  => $pagearr,
    'default'  => 'no'
    ),
	array(
    'id'       => 'woo-customer-wallet-redirect',
    'type'     => 'select',
    'title'    => esc_html__('Redirect after Customer Add to Wallet Payment', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'options'  => $pagearr,
    'default'  => 'no'
    ),
    )
    ) );
	
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Wallet Settings', 'service-finder' ),
    'id'               => 'wallet-settings-heading',
	'customizer'           => false,
    'desc'             => '',
    'customizer_width' => '400px',
    'icon'             => 'el el-cog'
    ) );
	
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Wallet Settings', 'service-finder' ),
    'id'               => 'wallet-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'wallet-system',
    'type'     => 'switch',
    'title'    => esc_html__( 'Wallet System', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'min-wallet-amount',
    'type'     => 'text',
    'title'    => esc_html__( 'Minimum amount to add to wallet', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => '',
	'required' => array( 'wallet-system', '=', true ),
    ),
	array(
    'id'       => 'max-wallet-amount',
    'type'     => 'text',
    'title'    => esc_html__( 'Maximum amount to add to wallet', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => '',
	'required' => array( 'wallet-system', '=', true ),
    ),
	array(
    'id'       => 'cashback-system',
    'type'     => 'switch',
    'title'    => esc_html__( 'Cashback System', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => false,
	'required' => array( 'wallet-system', '=', true ),
    ),
	array(
    'id'       => 'cashback-amount',
    'type'     => 'text',
    'title'    => esc_html__( 'Cashback Amount', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'Please enter fixed amount to return as cashback', 'service-finder' ),
    'default'  => '',
	'required' => array( 'cashback-system', '=', true ),
    ),
	array(
    'id'           => 'cashback-description',
    'type'         => 'textarea',
    'title'        => esc_html__( 'Description for Cashback', 'service-finder' ),
    'subtitle'     => esc_html__( 'Enter description for cashback', 'service-finder' ),
    'desc'         => '',
    'default'      => '',
	'required' => array( 'cashback-system', '=', true ),
    ),
	array(
    'id'       => 'wallet-cashback-all-transaction',
    'type'     => 'checkbox',
    'title'    => esc_html__( 'Apply to All Wallet Transaction', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'If checked this option Above cashback setting will apply to all wallet transaction', 'service-finder' ),
    'default'  => '1',
	'required' => array( 'cashback-system', '=', true ),
    ),
	array(
    'id'       => 'upgrade-cashback-amount',
    'type'     => 'text',
    'title'    => esc_html__( 'Upgrade Cashback Amount', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'Please enter fixed amount to return as cashback', 'service-finder' ),
    'default'  => '',
	'required' => array( 'wallet-cashback-all-transaction', '=', '0' ),
    ),
	array(
    'id'           => 'upgrade-cashback-description',
    'type'         => 'textarea',
    'title'        => esc_html__( 'Upgrade Description for Cashback', 'service-finder' ),
    'subtitle'     => esc_html__( 'Enter description for cashback', 'service-finder' ),
    'desc'         => '',
    'default'      => '',
	'required' => array( 'wallet-cashback-all-transaction', '=', '0' ),
    ),
	array(
    'id'       => 'featured-cashback-amount',
    'type'     => 'text',
    'title'    => esc_html__( 'Featured Cashback Amount', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'Please enter fixed amount to return as cashback', 'service-finder' ),
    'default'  => '',
	'required' => array( 'wallet-cashback-all-transaction', '=', '0' ),
    ),
	array(
    'id'           => 'featured-cashback-description',
    'type'         => 'textarea',
    'title'        => esc_html__( 'Featured Description for Cashback', 'service-finder' ),
    'subtitle'     => esc_html__( 'Enter description for cashback', 'service-finder' ),
    'desc'         => '',
    'default'      => '',
	'required' => array( 'wallet-cashback-all-transaction', '=', '0' ),
    ),
	array(
    'id'       => 'job-apply-limit-cashback-amount',
    'type'     => 'text',
    'title'    => esc_html__( 'Job Apply Limit Cashback Amount', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'Please enter fixed amount to return as cashback', 'service-finder' ),
    'default'  => '',
	'required' => array( 'wallet-cashback-all-transaction', '=', '0' ),
    ),
	array(
    'id'           => 'job-apply-limit-cashback-description',
    'type'         => 'textarea',
    'title'        => esc_html__( 'Job Apply Limit Description for Cashback', 'service-finder' ),
    'subtitle'     => esc_html__( 'Enter description for cashback', 'service-finder' ),
    'desc'         => '',
    'default'      => '',
	'required' => array( 'wallet-cashback-all-transaction', '=', '0' ),
    ),
	array(
    'id'       => 'job-post-limit-cashback-amount',
    'type'     => 'text',
    'title'    => esc_html__( 'Job Post Limit Cashback Amount', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'Please enter fixed amount to return as cashback', 'service-finder' ),
    'default'  => '',
	'required' => array( 'wallet-cashback-all-transaction', '=', '0' ),
    ),
	array(
    'id'           => 'job-post-limit-cashback-description',
    'type'         => 'textarea',
    'title'        => esc_html__( 'Job Post Limit Description for Cashback', 'service-finder' ),
    'subtitle'     => esc_html__( 'Enter description for cashback', 'service-finder' ),
    'desc'         => '',
    'default'      => '',
	'required' => array( 'wallet-cashback-all-transaction', '=', '0' ),
    ),
	array(
    'id'       => 'booking-cashback-amount',
    'type'     => 'text',
    'title'    => esc_html__( 'Booking Cashback Amount', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'Please enter fixed amount to return as cashback', 'service-finder' ),
    'default'  => '',
	'required' => array( 'wallet-cashback-all-transaction', '=', '0' ),
    ),
	array(
    'id'           => 'booking-cashback-description',
    'type'         => 'textarea',
    'title'        => esc_html__( 'Booking Description for Cashback', 'service-finder' ),
    'subtitle'     => esc_html__( 'Enter description for cashback', 'service-finder' ),
    'desc'         => '',
    'default'      => '',
	'required' => array( 'wallet-cashback-all-transaction', '=', '0' ),
    ),
	array(
    'id'       => 'invoice-cashback-amount',
    'type'     => 'text',
    'title'    => esc_html__( 'Invoice Cashback Amount', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'Please enter fixed amount to return as cashback', 'service-finder' ),
    'default'  => '',
	'required' => array( 'wallet-cashback-all-transaction', '=', '0' ),
    ),
	array(
    'id'           => 'invoice-cashback-description',
    'type'         => 'textarea',
    'title'        => esc_html__( 'Invoice Description for Cashback', 'service-finder' ),
    'subtitle'     => esc_html__( 'Enter description for cashback', 'service-finder' ),
    'desc'         => '',
    'default'      => '',
	'required' => array( 'wallet-cashback-all-transaction', '=', '0' ),
    ),
    )
    ) );
	
	if(class_exists('aonesms'))
	{
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'SMS Settings', 'service-finder' ),
		'id'               => 'sms-settings',
		'customizer'           => false,
		'desc'             => '',
		'customizer_width' => '400px',
		'icon'             => 'el el-cog'
    ) );
	$firebaselink = '<a href="//aonetheme.com/demo/documentation/firebase-setup-instructions.html" target="_blank">'.esc_html__( 'here', 'service-finder' ).'</a>';
	$twilliolink = '<a href="//aonetheme.com/demo/documentation/twilio-setup-instructions.html" target="_blank">'.esc_html__( 'here', 'service-finder' ).'</a>';
	/*SMS settings*/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'SMS Configuration', 'service-finder' ),
		'id'               => 'sms-configuration',
		'desc'             => esc_html__( 'Manage sms configuration related settings from here', 'service-finder' ),
		'customizer'       => false,
		'icon' 			   => 'el-icon-cog',
		'subsection'       => true,
		'customizer_width' => '450px',
        'fields'           => array(
			array(
                'id'       => 'login-signup-sms-gateway',
                'type'     => 'button_set',
                'title'    => esc_html__( 'SMS Gateway', 'service-finder' ),
                'options'  => array(
                    'firebase' => esc_html__( 'Google (Firebase)', 'service-finder' ),
					'twilio' => esc_html__( 'Twilio', 'service-finder' ),
                ),
                'default'  => 'firebase',
				'desc'     => esc_html__( 'Google (Firebase) will only work for login/signup via otp.', 'service-finder' ).'<br/>'.sprintf(esc_html__( 'Click %s to get firebase settings.', 'service-finder' ),$firebaselink).'<br/>'.sprintf(esc_html__( 'Click %s to get twillio settings.', 'service-finder' ),$twilliolink),
            ),
			array(
                'id'       => 'firebase-apikey',
                'type'     => 'text',
                'title'    => esc_html__( 'Google API Key', 'service-finder' ),
				'default'  => '',
				'required' => array( 'login-signup-sms-gateway', '=', 'firebase' ),
            ),
			array(
                'id'       => 'firebase-authdomain',
                'type'     => 'text',
                'title'    => esc_html__( 'Auth Domain', 'service-finder' ),
				'default'  => '',
				'required' => array( 'login-signup-sms-gateway', '=', 'firebase' ),
            ),
			array(
                'id'       => 'firebase-databaseurl',
                'type'     => 'text',
                'title'    => esc_html__( 'Database URL', 'service-finder' ),
				'default'  => '',
				'required' => array( 'login-signup-sms-gateway', '=', 'firebase' ),
            ),
			array(
                'id'       => 'firebase-projectid',
                'type'     => 'text',
                'title'    => esc_html__( 'Project ID', 'service-finder' ),
				'default'  => '',
				'required' => array( 'login-signup-sms-gateway', '=', 'firebase' ),
            ),
			array(
                'id'       => 'firebase-storagebucket',
                'type'     => 'text',
                'title'    => esc_html__( 'Storage Bucket', 'service-finder' ),
				'default'  => '',
				'required' => array( 'login-signup-sms-gateway', '=', 'firebase' ),
            ),
			array(
                'id'       => 'firebase-messaging-senderid',
                'type'     => 'text',
                'title'    => esc_html__( 'Messaging Sender ID', 'service-finder' ),
				'default'  => '',
				'required' => array( 'login-signup-sms-gateway', '=', 'firebase' ),
            ),
			array(
                'id'       => 'twillio-sid',
                'type'     => 'text',
                'title'    => esc_html__( 'Twillio SID', 'service-finder' ),
				'default'  => '',
				'required' => array( 'login-signup-sms-gateway', '=', 'twilio' ),
            ),
			array(
                'id'       => 'twillio-token',
                'type'     => 'text',
                'title'    => esc_html__( 'Twillio Token', 'service-finder' ),
				'default'  => '',
				'required' => array( 'login-signup-sms-gateway', '=', 'twilio' ),
            ),
			array(
                'id'       => 'twillio-senderid',
                'type'     => 'text',
                'title'    => esc_html__( 'Twillio Sender ID', 'service-finder' ),
				'default'  => '',
				'required' => array( 'login-signup-sms-gateway', '=', 'twilio' ),
            ),
			array(
                'id'       => 'twillio-countrycode',
                'type'     => 'select',
                'title'    => esc_html__( 'Twillio Country Code', 'service-finder' ),
				'default'  => '',
				'required' => array( 'login-signup-sms-gateway', '=', 'twilio' ),
				'options'  => service_finder_get_country_code_dropdown()
            )
        )
    ) );
	
	/*SMS Templates*/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'SMS Templates', 'service-finder' ),
		'id'               => 'sms-templates',
		'desc'             => esc_html__( 'Set sms templates from here', 'service-finder' ),
		'customizer'       => false,
		'icon' 			   => 'el-icon-cog',
		'subsection'       => true,
		'customizer_width' => '450px',
        'fields'           => array(
			array(
				'id'       => 'is-active-provider-new-booking-sms',
				'type'     => 'switch',
				'title'    => esc_html__( 'Send New Booking SMS to ', 'service-finder' ).esc_html($providerreplacestring),
				'desc'     => '',
				'subtitle' => '',
				'default'  => false,
			),
			array(
				'id'           => 'template-provider-new-booking-sms',
				'type'         => 'textarea',
				'title'        => esc_html__( 'Template for New Booking SMS to ', 'service-finder' ).esc_html($providerreplacestring),
				'desc' 			=> "Set tempalte for new booking sms using define keywords. keyword are %BOOKINGREFID%,%DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %PAYMENTMETHOD%, %AMOUNT%, %ADMINFEE%, %SERVICES%, %SHORTDESCRIPTION%",
				'validate'     => 'html_custom',
				'allowed_html' => array(
					'a'      => array('href'  => array(),'title' => array()),
					'br'     => array(),
					'em'     => array(),
					'strong' => array()
				),
				'required' => array( 'is-active-provider-new-booking-sms', '=', true ),
			),
			array(
				'id'       => 'is-active-customer-new-booking-sms',
				'type'     => 'switch',
				'title'    => esc_html__( 'Send New Booking SMS to ', 'service-finder' ).esc_html($customerreplacestring),
				'desc'     => '',
				'subtitle' => '',
				'default'  => false,
			),
			array(
				'id'           => 'template-customer-new-booking-sms',
				'type'         => 'textarea',
				'title'        => esc_html__( 'Template for New Booking SMS to ', 'service-finder' ).esc_html($customerreplacestring),
				'desc' => "Set tempalte for new booking sms using define keywords. keyword are %BOOKINGREFID%,%DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %PAYMENTMETHOD%, %AMOUNT%, %ADMINFEE%, %SERVICES%, %SHORTDESCRIPTION%",
				'validate'     => 'html_custom',
				'allowed_html' => array(
					'a'      => array('href'  => array(),'title' => array()),
					'br'     => array(),
					'em'     => array(),
					'strong' => array()
				),
				'required' => array( 'is-active-customer-new-booking-sms', '=', true ),
			),
			array(
				'id'       => 'is-active-provider-booking-complete-sms',
				'type'     => 'switch',
				'title'    => esc_html__( 'Send Booking Complete SMS to ', 'service-finder' ).esc_html($providerreplacestring),
				'desc'     => '',
				'subtitle' => '',
				'default'  => false,
			),
			array(
				'id'           => 'template-provider-booking-complete-sms',
				'type'         => 'textarea',
				'title'        => esc_html__( 'Template for Booking Complete SMS to ', 'service-finder' ).esc_html($providerreplacestring),
				'desc' 			=> "Set tempalte for booking complete sms using define keywords. keyword are %BOOKINGREFID%,%DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %SERVICES%",
				'validate'     => 'html_custom',
				'allowed_html' => array(
					'a'      => array('href'  => array(),'title' => array()),
					'br'     => array(),
					'em'     => array(),
					'strong' => array()
				),
				'required' => array( 'is-active-provider-booking-complete-sms', '=', true ),
			),
			array(
				'id'       => 'is-active-customer-booking-complete-sms',
				'type'     => 'switch',
				'title'    => esc_html__( 'Send Booking Complete SMS to ', 'service-finder' ).esc_html($customerreplacestring),
				'desc'     => '',
				'subtitle' => '',
				'default'  => false,
			),
			array(
				'id'           => 'template-customer-booking-complete-sms',
				'type'         => 'textarea',
				'title'        => esc_html__( 'Template for Booking Complete SMS to ', 'service-finder' ).esc_html($customerreplacestring),
				'desc' => "Set tempalte for booking complete sms using define keywords. keyword are %BOOKINGREFID%,%DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %SERVICES%",
				'validate'     => 'html_custom',
				'allowed_html' => array(
					'a'      => array('href'  => array(),'title' => array()),
					'br'     => array(),
					'em'     => array(),
					'strong' => array()
				),
				'required' => array( 'is-active-customer-booking-complete-sms', '=', true ),
			),
			array(
				'id'       => 'is-active-provider-booking-cancel-sms',
				'type'     => 'switch',
				'title'    => esc_html__( 'Send Booking Cancel SMS to ', 'service-finder' ).esc_html($providerreplacestring),
				'desc'     => '',
				'subtitle' => '',
				'default'  => false,
			),
			array(
				'id'           => 'template-provider-booking-cancel-sms',
				'type'         => 'textarea',
				'title'        => esc_html__( 'Template for Booking Cancel SMS to ', 'service-finder' ).esc_html($providerreplacestring),
				'desc' 			=> "Set tempalte for booking cancel sms using define keywords. keyword are %BOOKINGREFID%, %DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%",
				'validate'     => 'html_custom',
				'allowed_html' => array(
					'a'      => array('href'  => array(),'title' => array()),
					'br'     => array(),
					'em'     => array(),
					'strong' => array()
				),
				'required' => array( 'is-active-provider-booking-cancel-sms', '=', true ),
			),
			array(
				'id'       => 'is-active-customer-booking-cancel-sms',
				'type'     => 'switch',
				'title'    => esc_html__( 'Send Booking Cancel SMS to ', 'service-finder' ).esc_html($customerreplacestring),
				'desc'     => '',
				'subtitle' => '',
				'default'  => false,
			),
			array(
				'id'           => 'template-customer-booking-cancel-sms',
				'type'         => 'textarea',
				'title'        => esc_html__( 'Template for Booking Cancel SMS to ', 'service-finder' ).esc_html($customerreplacestring),
				'desc' => "Set tempalte for booking cancel sms using define keywords. keyword are %BOOKINGREFID%, %DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%",
				'validate'     => 'html_custom',
				'allowed_html' => array(
					'a'      => array('href'  => array(),'title' => array()),
					'br'     => array(),
					'em'     => array(),
					'strong' => array()
				),
				'required' => array( 'is-active-customer-booking-cancel-sms', '=', true ),
			),
			array(
				'id'       => 'is-active-provider-job-publish-sms',
				'type'     => 'switch',
				'title'    => esc_html__( 'Send Job Publish SMS to ', 'service-finder' ).esc_html($providerreplacestring),
				'desc'     => '',
				'subtitle' => '',
				'default'  => false,
			),
			array(
				'id'           => 'template-provider-job-publish-sms',
				'type'         => 'textarea',
				'title'        => esc_html__( 'Template for Job Publish SMS to ', 'service-finder' ).esc_html($providerreplacestring),
				'desc' => "Set tempalte for job publish sms using define keywords. keyword are %JOBTITLE%,%JOBLINK%",
				'validate'     => 'html_custom',
				'allowed_html' => array(
					'a'      => array('href'  => array(),'title' => array()),
					'br'     => array(),
					'em'     => array(),
					'strong' => array()
				),
				'required' => array( 'is-active-provider-job-publish-sms', '=', true ),
			),
			array(
				'id'       => 'is-active-provider-job-invite-sms',
				'type'     => 'switch',
				'title'    => esc_html__( 'Send Job Invite SMS to ', 'service-finder' ).esc_html($providerreplacestring),
				'desc'     => '',
				'subtitle' => '',
				'default'  => false,
			),
			array(
				'id'           => 'template-provider-job-invite-sms',
				'type'         => 'textarea',
				'title'        => esc_html__( 'Template for Job Invite SMS to ', 'service-finder' ).esc_html($providerreplacestring),
				'desc' => "Set tempalte for job invite sms using define keywords. keyword are %JOBTITLE%,%JOBLINK%",
				'validate'     => 'html_custom',
				'allowed_html' => array(
					'a'      => array('href'  => array(),'title' => array()),
					'br'     => array(),
					'em'     => array(),
					'strong' => array()
				),
				'required' => array( 'is-active-provider-job-invite-sms', '=', true ),
			),
			array(
				'id'       => 'is-active-provider-job-hire-sms',
				'type'     => 'switch',
				'title'    => esc_html__( 'Send Job Hire SMS to ', 'service-finder' ).esc_html($providerreplacestring),
				'desc'     => '',
				'subtitle' => '',
				'default'  => false,
			),
			array(
				'id'           => 'template-provider-job-hire-sms',
				'type'         => 'textarea',
				'title'        => esc_html__( 'Template for Job Hire SMS to ', 'service-finder' ).esc_html($providerreplacestring),
				'desc' => "Set tempalte for job hire sms using define keywords. keyword are %BOOKINGREFID%,%DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %PAYMENTMETHOD%, %AMOUNT%, %ADMINFEE%, %SERVICES%, %SHORTDESCRIPTION%",
				'validate'     => 'html_custom',
				'allowed_html' => array(
					'a'      => array('href'  => array(),'title' => array()),
					'br'     => array(),
					'em'     => array(),
					'strong' => array()
				),
				'required' => array( 'is-active-provider-job-hire-sms', '=', true ),
			),
        )
    ) );
	}
	
	if( class_exists( '\GRUP_PLUGIN\Includes\Plugin_Controller' ) ) {
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Group Appointment', 'service-finder' ),
		'id'               => 'group-appointment-configuration',
		'desc'             => esc_html__( 'Manage group appointment', 'service-finder' ),
		'customizer'       => false,
		'icon' 			   => 'el-icon-cog',
		'subsection'       => false,
		'customizer_width' => '450px',
        'fields'           => array(
			array(
				'id'       => 'group-appointment',
				'type'     => 'switch',
				'title'    => esc_html__( 'Group Appointment', 'service-finder' ),
				'desc'     => '',
				'subtitle' => '',
				'default'  => true,
			),
        )
    ) );
	}
	
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Offers & Promotions Settings', 'service-finder' ),
    'id'               => 'offers-settings-heading',
	'customizer'           => false,
    'desc'             => '',
    'customizer_width' => '400px',
    'icon'             => 'el el-cog'
    ) );
	
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Offers & Promotions', 'service-finder' ),
    'id'               => 'offers-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'offers-system',
    'type'     => 'switch',
    'title'    => esc_html__( 'Offers & Promotions System', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'offers-based-on',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Offer Based On', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'services' => 'Each Services',
    'booking' => 'Each Booking',
	'both' => 'Both',
    ),
    'default'  => 'services',
	'required' => array( 'offers-system', '=', true ),
    ),
    )
    ) );
	
	Redux::setSection( $opt_name, array(
    'title'            => esc_html($providerreplacestring).' '.esc_html__( 'Settings', 'service-finder' ),
    'id'               => 'provider-settings',
	'customizer'           => false,
    'desc'             => '',
    'customizer_width' => '400px',
    'icon'             => 'el el-cog'
    ) );
	
	Redux::setSection( $opt_name, array(
    'title'            => esc_html($providerreplacestring).' '.esc_html__( 'Page Setting', 'service-finder' ),
    'id'               => 'booking-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'default-avatar',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Default Avatar Image', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => '',
    'subtitle' => sprintf( esc_html__('Upload Default Avatar for %s', 'service-finder'), $providerreplacestring ),
    ),
	array(
    'id'       => 'booking-page-style',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Profile Page Style', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'style-1' => 'Style 1',
    'style-2' => 'Style 2',
    ),
    'default'  => 'style-1'
    ),
	array(
    'id'         => 'profile-left-right-curve-preview',
    'type'       => 'raw',
    'full_width' => false,
    'title'      => esc_html__( 'Preview for Left and Right Curve', 'service-finder' ),
    'subtitle'   => '',
    'desc'       => '',
    'content'    => '<img src="'.get_template_directory_uri().'/inc/images/redux/profile-left-right-curve.jpg">',
    ),
	array(
    'id'       => 'profile-left-right-curve',
    'type'     => 'switch',
    'title'    => esc_html__( 'Profile Left Right Curve', 'service-finder' ),
	'desc'     => esc_html__( 'It will toggle left and right curve on theme style 3 for profile page style 2', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'profile-left-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Profile Left Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#7754f4',
	'desc'     => esc_html__( 'It works only for theme style 3 for profile page style 2', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'profile-right-curve-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Profile Right Curve Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#62b815',
	'desc'     => esc_html__( 'It works only for theme style 3 for profile page style 2', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'profile-gallery-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Profile Gallery BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'profile-gallery-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Profile Gallery Text Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#fff',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'profile-document-services-bg-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Profile Document/Services BG Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'profile-document-services-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Profile Document/Services Text Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#fff',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'profile-document-services-active-text-color',
    'type'     => 'color',
    'title'    => esc_html__( 'Profile Document/Services Active Text Color', 'service-finder' ),
    'subtitle' => '',
    'default'  => '#fff',
	'desc'     => esc_html__( 'It works only for theme style 3', 'service-finder' ),
    'validate' => 'color',
    ),
	array(
    'id'       => 'profileurlby',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Profile URL by', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'companyname' => 'Company Name',
    'fullname' => 'Full Name',
	'username' => 'Username'
    ),
    'default'  => 'fullname'
    ),
	array(
    'id'       => 'job-notification',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Job Notification', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'job-alert' => 'By Job Alert',
    'job-publish' => 'On Job Publish',
    ),
    'default'  => 'job-publish'
    ),
	array(
    'id'       => 'availability-based-on',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Availability Based On', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'timeslots' => 'Time Slots',
    'starttime' => 'Start Time',
	'both' => 'Both',
    ),
    'default'  => 'timeslots'
    ),
	array(
    'id'       => 'booking-date-style',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Booking Date Style', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'singledate' => 'Single Date',
    'multidate' => 'Multi Date',
	'both' => 'Both',
    ),
    'default'  => 'singledate'
    ),
	array(
    'id'       => 'add-to-fav',
    'type'     => 'switch',
    'title'    => esc_html__( 'Add to Favorite', 'service-finder' ),
	'desc'     => esc_html__( "If off then 'add to favorite' button will be removed from provider profile.", "service-finder" ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'quick-signup',
    'type'     => 'switch',
    'title'    => esc_html__( 'Quick Signup', 'service-finder' ),
	'desc'     => esc_html__( "If this is on then address related fields will be removed from provider signup form.", "service-finder" ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'social-media',
    'type'     => 'switch',
    'title'    => esc_html__( 'Social Media', 'service-finder' ),
	'desc'     => esc_html__( "If off then All social media will be removed from provider profile and my account section.", "service-finder" ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'review-system',
    'type'     => 'switch',
    'title'    => esc_html__( 'Review System', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'display-basicfeature-after-sociallogin',
    'type'     => 'switch',
    'title'    => esc_html__( 'Display Basic Feature After Social Login', 'service-finder' ),
	'desc'     => esc_html__( 'If provider registered via social login then do you want him to display basic profile. If set OFF then only upgrade account section will be visible.', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'search-bar-position-profilepage',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Search Bar Position', 'service-finder' ),
    'subtitle' => '',
    'desc'     => 'Only works for profile page',
    //Must provide key => value pairs for radio options
    'options'  => array(
    'middle' => esc_html__( 'In Middle', 'service-finder' ),
    'bottom' => esc_html__( 'In Bottom', 'service-finder' ),
    ),
    'default'  => 'bottom'
    ),
	array(
    'id'       => 'profile-search-bar',
    'type'     => 'switch',
    'title'    => esc_html__( 'Hide Search Bar', 'service-finder' ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'review-style',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Review & Rating to show on profile page', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    //Must provide key => value pairs for radio options
    'options'  => array(
    'booking-review' => esc_html__( 'Booking Review', 'service-finder' ),
    'open-review' => esc_html__( 'Open Review', 'service-finder' ),
    ),
    'default'  => 'open-review'
    ),
	array(
    'id'       => 'rating-style',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Rating Style', 'service-finder' ),
    'subtitle' => '',
    'options'  => array(
    'simple-rating' => esc_html__( 'Basic', 'service-finder' ),
    'custom-rating' => esc_html__( 'Advance', 'service-finder' ),
    ),
	'desc'     => esc_html__( 'If advance rating is turned on then please make sure you have setup rating labels from service finder -> rating lables.', 'service-finder' ),
    'default'  => 'simple-rating',
    ),
	array(
    'id'       => 'providers-review',
    'type'     => 'switch',
    'title'    => esc_html__( 'Provider Can Leave Review', 'service-finder' ),
    'subtitle' => '',
	'required' => array( 'review-style', '=', 'open-review' ),
    'default'  => false,
    ),
	array(
    'id'       => 'invite-for-job',
    'type'     => 'switch',
    'title'    => esc_html__( 'Invite for Job', 'service-finder' ),
	'desc'     => esc_html__( "If off then 'invite for job' button will be removed from provider profile.", "service-finder" ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'request-quote',
    'type'     => 'switch',
    'title'    => esc_html__( 'Request a Quote', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'show-amenities',
    'type'     => 'switch',
    'title'    => esc_html__( 'Amenities', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'show-languages',
    'type'     => 'switch',
    'title'    => esc_html__( 'Languages', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'floating-menu-desktop',
    'type'     => 'switch',
    'title'    => sprintf( esc_html__( 'Show Floating Menu on %s Profile for Desktop', 'service-finder' ), $providerreplacestring ),
	'desc'     => esc_html__( 'It will work only for provider profile style 2', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'floating-menu-mobile',
    'type'     => 'switch',
    'title'    => sprintf( esc_html__( 'Show Floating Menu on %s Profile for Mobile', 'service-finder' ), $providerreplacestring ),
	'desc'     => esc_html__( 'Show Floating Menu on %s Profile for Desktop', 'service-finder' ),
    'subtitle' => esc_html__( 'It will work only for provider profile style 2', 'service-finder' ),
    'default'  => true,
    ),
	array(
    'id'       => 'request-quote-after-login',
    'type'     => 'switch',
    'title'    => esc_html__( 'Request a Quote Form Show Only After Login', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'request-quote-mail-to',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Request a Quote Mail Send to', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    //Must provide key => value pairs for radio options
    'options'  => array(
    'provider' => esc_html__( 'Provider', 'service-finder' ),
    'admin' => esc_html__( 'Admin', 'service-finder' ),
	'both' => esc_html__( 'Both', 'service-finder' ),
	'hold' => esc_html__( 'Hold for Moderation', 'service-finder' ),
    ),
    'default'  => 'both'
    ),
	array(
    'id'       => 'paid-booking',
    'type'     => 'switch',
    'title'    => esc_html__( 'Paid Booking', 'service-finder' ),
	'desc'     => esc_html__( 'if both(free and paid) options are off then free booking will be applicable by default.', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'free-booking',
    'type'     => 'switch',
    'title'    => esc_html__( 'Free Booking', 'service-finder' ),
	'desc'     => esc_html__( 'if both(free and paid) options are off then free booking will be applicable by default.', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'guest-booking',
    'type'     => 'switch',
    'title'    => esc_html__( 'Guest Booking', 'service-finder' ),
	'desc'     => esc_html__('If off then only registered user will be able to book.', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'time-format',
    'type'     => 'switch',
    'title'    => esc_html__( 'Use 24-Hour Format for Time Slots', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'hide-top-banner-area',
    'type'     => 'button_set',
    'title'    => sprintf( esc_html__( 'Hide %s Top Banner Area', 'service-finder' ), $providerreplacestring ),
	'desc'     => '',
    'subtitle' => '',
    'options'  => array(
    'yes' =>  esc_html__( 'Yes', 'service-finder' ),
    'no' =>  esc_html__( 'No', 'service-finder' ),
    ),
    'default'  => 'no',
	'required' => array( 'theme-style', '=', 'style-4' )
    ),
	array(
    'id'       => 'keep-author-word',
    'type'     => 'button_set',
    'title'    => sprintf( esc_html__( 'Want to Keep "author" Word on %s Profile Page', 'service-finder' ), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'yes' =>  esc_html__( 'Yes', 'service-finder' ),
    'no' =>  esc_html__( 'No', 'service-finder' ),
    ),
    'default'  => 'yes'
    ),
	array(
    'id'       => 'provider-default-tagline',
    'type'     => 'text',
    'title'    => sprintf( esc_html__( '%s Default Tagline', 'service-finder' ), $providerreplacestring ),
    'subtitle' => '',
    'default'  => '',
    ),
	array(
    'id'       => 'author-replace-string',
    'type'     => 'text',
    'title'    => sprintf( esc_html__( 'String that will replace "author" Word on %s Profile Page URL', 'service-finder' ), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => esc_html__('Leave blank for no changes', 'service-finder'),
    'default'  => '',
	'required' => array( 'keep-author-word', '=', 'yes' ),
    ),
    array(
    'id'       => 'redirect-option',
    'type'     => 'select',
    'title'    => esc_html__( 'Redirect after booking', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'booking-page' => 'Same Booking Page',
    'thankyou-page' => 'Thank You Page',
    ),
    'default'  => 'booking-page'
    ),
    array(
    'id'       => 'thankyou-page-url',
    'type'     => 'text',
    'title'    => esc_html__( 'Thank You Page URL', 'service-finder' ),
    'subtitle' => esc_html__( 'Enter page url for redirect after booking', 'service-finder' ),
    'desc'     => sprintf( esc_html__('Ex: %s', 'service-finder'), home_url('/thank-you/') ),
    'default'  => ''
    ),
	array(
    'id'       => 'provider-replace-string',
    'type'     => 'text',
    'title'    => esc_html__( 'String That will replace "Provider" word', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'Enter a string that will replace with provider word in frontend.', 'service-finder' ),
    'default'  => ''
    ),
	array(
    'id'       => 'customer-replace-string',
    'type'     => 'text',
    'title'    => esc_html__( 'String That will replace "Customer" word', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'Enter a string that will replace with customer word in frontend.', 'service-finder' ),
    'default'  => ''
    ),
	array(
    'id'       => 'requestquote-replace-string',
    'type'     => 'text',
    'title'    => esc_html__( 'String That will replace "Request a Quote" title', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'Enter a string that will replace with "Request a Quote" title in frontend.', 'service-finder' ),
    'default'  => ''
    ),
	array(
    'id'       => 'show-booking-otp',
    'type'     => 'switch',
    'title'    => esc_html__( 'Show OTP in Booking', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'show-contact-info',
    'type'     => 'switch',
    'title'    => esc_html__( 'Show Contact Info', 'service-finder' ),
	'desc'     => esc_html__( 'If off then provider contact details will be disappeared from profile.', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'show-address-info',
    'type'     => 'switch',
    'title'    => esc_html__( 'Show Address Info', 'service-finder' ),
	'desc'     => esc_html__( 'If off then provider address details will be disappeared from the whole website.', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'only-registered-user',
    'type'     => 'switch',
    'title'    => esc_html__( 'Only Register User can View Address Info', 'service-finder' ),
    'subtitle' => '',
    'default'  => false,
	'required' => array( 'show-address-info', '=', true ),
    ),
	array(
    'id'       => 'show-postal-address',
    'type'     => 'switch',
    'title'    => esc_html__( 'Show Postal Address', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
	'required' => array( 'show-address-info', '=', true ),
    ),
	array(
    'id'       => 'show-gps',
    'type'     => 'switch',
    'title'    => esc_html__( 'Show GPS Info (Latitude and Longitude)', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
	'required' => array( 'show-address-info', '=', true ),
    ),
	array(
    'id'       => 'show-contact-number',
    'type'     => 'switch',
    'title'    => esc_html__( 'Show Contact Numbers', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
	'required' => array( 'show-address-info', '=', true ),
    ),
	array(
    'id'       => 'show-email-address',
    'type'     => 'switch',
    'title'    => esc_html__( 'Show Email Address', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
	'required' => array( 'show-address-info', '=', true ),
    ),
	array(
    'id'       => 'show-fax',
    'type'     => 'switch',
    'title'    => esc_html__( 'Show Fax', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
	'required' => array( 'show-address-info', '=', true ),
    ),
	array(
    'id'       => 'show-website',
    'type'     => 'switch',
    'title'    => esc_html__( 'Show Website', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
	'required' => array( 'show-address-info', '=', true ),
    ),
	array(
    'id'       => 'show-skype',
    'type'     => 'switch',
    'title'    => esc_html__( 'Show Skype', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'show-contact-map',
    'type'     => 'switch',
    'title'    => esc_html__( 'Show Contact Map', 'service-finder' ),
	'desc'     => esc_html__( 'This will toggle map on provider account and public profile also.', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
	'required' => array( 'show-address-info', '=', true ),
    ),
	array(
    'id'       => 'identity-check',
    'type'     => 'switch',
    'title'    => esc_html__( 'Identity Check Feature', 'service-finder' ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'allow-access-untill-admin-approves',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Whether to allow access to my account or not after sign up until admin approves', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'yes' => 'Yes',
    'no' => 'No',
    ),
    'default'  => 'no'
    ),
	array(
    'id'       => 'basic-profile-after-trial-expire',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Display basic profile after trial package expire', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'yes' => 'Yes',
    'no' => 'No',
    ),
    'default'  => 'yes'
    ),
	array(
    'id'       => 'msg-identity-approval-waiting',
    'type'     => 'text',
    'title'    => esc_html__( 'Message when identity is waiting for admin approval', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'This Message will show when identity is waiting for admin approval', 'service-finder' ),
    'default'  => ''
    ),
	array(
    'id'       => 'msg-identity-approved',
    'type'     => 'text',
    'title'    => esc_html__( 'Message when identity is approved', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'This Message will show when identity has been approved', 'service-finder' ),
    'default'  => ''
    ),
	array(
    'id'       => 'restrict-my-account',
    'type'     => 'switch',
    'title'    => esc_html__( 'Restrict My Account', 'service-finder' ),
	'desc'     => esc_html__('It only works when identity check feature is on. Provider will not be able to access his my account sections until identity approve by admin.', 'service-finder'),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'restrict-user-area',
    'type'     => 'switch',
    'title'    => esc_html__( 'Restrict User Area', 'service-finder' ),
	'desc'     => esc_html__('It only works when identity check feature is on. Provider public profile will disappear.', 'service-finder'),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'      => 'identity-check-description',
    'type'    => 'editor',
    'title'   => esc_html__( 'Description about Identity check documents', 'service-finder' ),
    'desc' => esc_html__('This will display when popup for identity check', 'service-finder'),
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    array(
    'id'         => 'style-1',
    'type'       => 'raw',
    'full_width' => false,
    'title'      => esc_html__( 'Style Preview', 'service-finder' ),
    'subtitle'   => '',
    'desc'       => '',
    'content'    => '<img src="'.get_template_directory_uri().'/inc/images/redux/provider-style.jpg">',
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html($providerreplacestring).' '.esc_html__( 'Menu', 'service-finder' ),
    'id'               => 'provider-menu',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'wallet-menu',
    'type'     => 'switch',
    'title'    => esc_html__('My Wallet', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'earnings-dues-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Earnings & Dues', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'qualification-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Qualification', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'experience-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Experience', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'certificates-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Certificates', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'articles-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Articles', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'quotation-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Quotation', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'offers-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Offers & Promotions', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'availability-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Availability', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'set-unavailability-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Set UnAvailability', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'booking-settings-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Booking Settings', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'payout-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Payout', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'business-hours-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Business Hours', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'postal-codes-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Postal Codes', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'our-branches-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Our Branches', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'regions-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Regions', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'my-services-menu',
    'type'     => 'switch',
    'title'    => esc_html__('My Services', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'my-jobs-menu',
    'type'     => 'switch',
    'title'    => esc_html__('My Jobs', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'job-apply-limits-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Job Apply Limits', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'team-members-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Team Members', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'bookings-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Bookings', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'schedule-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Schedule', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'invoice-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Invoice', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'upgrade-account-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Upgrade Account', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'bank-account-info-section',
    'type'     => 'switch',
    'title'    => esc_html__('Bank Account Info Section', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'question-answer-section',
    'type'     => 'switch',
    'title'    => esc_html__('Question/Answer Section', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html($customerreplacestring).' '.esc_html__( 'Menu', 'service-finder' ),
    'id'               => 'customer-menu',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'customer-booking-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Bookings', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'customer-schedule-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Schedule', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'customer-invoice-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Invoice', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'customer-favorite-menu',
    'type'     => 'switch',
    'title'    => esc_html__('My Favorites', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'customer-jobpost-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Post a Job', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'customer-myjobs-menu',
    'type'     => 'switch',
    'title'    => esc_html__('My Jobs', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'customer-jobpostplans-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Job Post Plans', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'customer-quotations-menu',
    'type'     => 'switch',
    'title'    => esc_html__('Quotations', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
    )
    ) );
	
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Captcha', 'service-finder' ),
    'id'               => 'captcha',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'captcha-style',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Captcha Style', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'style-1' => 'Style 1',
    'style-2' => 'Style 2'
    ),
    'default'  => 'style-1'
    ),
	array(
    'id'       => 'captcha-sitekey',
    'type'     => 'text',
    'title'    => esc_html__( 'reCAPTCHA Site Key', 'service-finder' ),
    'subtitle' => '',
    'desc'     => sprintf( esc_html__( 'You can get site key from %s', 'service-finder' ), '<a target="_blank" href="https://www.google.com/recaptcha/admin">here</a>' ),
	'required' => array( 'captcha-style', '=', 'style-2' ),
    'default'  => ''
    ),
	array(
    'id'       => 'captcha-theme',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Captcha Theme', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
	'required' => array( 'captcha-style', '=', 'style-2' ),
    'options'  => array(
    'light' => 'Light',
    'dark' => 'Dark',
    ),
    'default'  => 'light'
    ),
	array(
    'id'       => 'provider-signup-captcha',
    'type'     => 'switch',
    'title'    => sprintf( esc_html__('Captcha on %s Signup', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'customer-signup-captcha',
    'type'     => 'switch',
    'title'    => sprintf( esc_html__('Captcha on %s Signup', 'service-finder'), $customerreplacestring ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'request-quote-captcha',
    'type'     => 'switch',
    'title'    => esc_html__( 'Captcha on Request a Quote', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'claim-business-captcha',
    'type'     => 'switch',
    'title'    => esc_html__( 'Captcha on Claim Business', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Google Calendar', 'service-finder' ),
    'id'               => 'google-calendar-settings',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'google-calendar-client-id',
    'type'     => 'text',
    'title'    => esc_html__('Client ID', 'service-finder'),
    'subtitle' => '',
	'description'     => esc_html__( 'Authorized redirect URIs: ', 'service-finder' ).home_url().'?action=googleoauth-callback',
    ),
	array(
    'id'       => 'google-calendar-client-secret',
    'type'     => 'text',
    'title'    => esc_html__('Client Secret', 'service-finder'),
    'subtitle' => '',
    )
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Claim Business', 'service-finder' ),
    'id'               => 'claim-business',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'string-claim-business',
    'type'     => 'text',
    'title'    => esc_html__('String that will use for Claim Business', 'service-finder'),
    'subtitle' => '',
    'default'  => esc_html__('Claim Business', 'service-finder'),
    ),
	array(
    'id'       => 'claim-business-option',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Claim Business', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'free' => 'Free',
    'paid' => 'Paid',
    ),
    'default'  => 'free'
    ),
	array(
    'id'       => 'claimed-redirect-option',
    'type'     => 'select',
    'title'    => sprintf( esc_html__('Redirect after Claimed Business', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => $pagearr,
    'default'  => 'no'
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Sign Up Restriction', 'service-finder' ),
    'id'               => 'signup-restriction',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'all-countries',
    'type'     => 'checkbox',
    'title'    => esc_html__( 'All Countries', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'If checked this option following allowed countries option will not work', 'service-finder' ),
    'default'  => '1'
    ),
    array(
    'id'       => 'allowed-country',
    'type'     => 'select',
    'multi'    => true,
    'title'    => esc_html__( 'Allowed Countries', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    "AF" =>  'Afghanistan',
    "AX" =>  'Aland Islands',
    "AL" =>  'Albania',
    "DZ" =>  'Algeria',
    "AS" =>  'American Samoa',
    "AD" =>  'Andorra',
    "AO" =>  'Angola',
    "AI" =>  'Anguilla',
    "AQ" =>  'Antarctica',
    "AG" =>  'Antigua and Barbuda',
    "AR" =>  'Argentina',
    "AM" =>  'Armenia',
    "AW" =>  'Aruba',
    "AU" =>  'Australia',
    "AT" =>  'Austria',
    "AZ" =>  'Azerbaijan',
    "BS" =>  'Bahamas',
    "BH" =>  'Bahrain',
    "BD" =>  'Bangladesh',
    "BB" =>  'Barbados',
    "BY" =>  'Belarus',
    "BE" =>  'Belgium',
    "BZ" =>  'Belize',
    "BJ" =>  'Benin',
    "BM" =>  'Bermuda',
    "BT" =>  'Bhutan',
    "BO" =>  'Bolivia',
    "BA" =>  'Bosnia and Herzegovina',
    "BW" =>  'Botswana',
    "BV" =>  'Bouvet Island',
    "BR" =>  'Brazil',
    "IO" =>  'British Indian Ocean Territory',
    "BN" =>  'Brunei Darussalam',
    "BG" =>  'Bulgaria',
    "BF" =>  'Burkina Faso',
    "BI" =>  'Burundi',
    "KH" =>  'Cambodia',
    "CM" =>  'Cameroon',
    "CA" =>  'Canada',
    "CV" =>  'Cape Verde',
    "KY" =>  'Cayman Islands',
    "CF" =>  'Central African Republic',
    "TD" =>  'Chad',
    "CL" =>  'Chile',
    "CN" =>  'China',
    "CX" =>  'Christmas Island',
    "CC" =>  'Cocos (Keeling) Islands',
    "CO" =>  'Colombia',
    "KM" =>  'Comoros',
    "CG" =>  'Congo',
    "CD" =>  'Congo, The Democratic Republic of The',
    "CK" =>  'Cook Islands',
    "CR" =>  'Costa Rica',
    "CI" =>  "Cote D'Ivoire",
    "HR" =>  'Croatia',
    "CU" =>  'Cuba',
    "CY" =>  'Cyprus',
    "CZ" =>  'Czech Republic',
    "DK" =>  'Denmark',
    "DJ" =>  'Djibouti',
    "DM" =>  'Dominica',
    "DO" =>  'Dominican Republic',
    "EC" =>  'Ecuador',
    "EG" =>  'Egypt',
    "SV" =>  'El Salvador',
    "GQ" =>  'Equatorial Guinea',
    "ER" =>  'Eritrea',
    "EE" =>  'Estonia',
    "ET" =>  'Ethiopia',
    "FK" =>  'Falkland Islands (Malvinas)',
    "FO" =>  'Faroe Islands',
    "FJ" =>  'Fiji',
    "FI" =>  'Finland',
    "FR" =>  'France',
    "GF" =>  'French Guiana',
    "PF" =>  'French Polynesia',
    "TF" =>  'French Southern Territories',
    "GA" =>  'Gabon',
    "GM" =>  'Gambia',
    "GE" =>  'Georgia',
    "DE" =>  'Germany',
    "GH" =>  'Ghana',
    "GI" =>  'Gibraltar',
    "GR" =>  'Greece',
    "GL" =>  'Greenland',
    "GD" =>  'Grenada',
    "GP" =>  'Guadeloupe',
    "GU" =>  'Guam',
    "GT" =>  'Guatemala',
    "GG" =>  'Guernsey',
    "GN" =>  'Guinea',
    "GW" =>  'Guinea-bissau',
    "GY" =>  'Guyana',
    "HT" =>  'Haiti',
    "HM" =>  'Heard Island and Mcdonald Islands',
    "VA" =>  'Holy See (Vatican City State)',
    "HN" =>  'Honduras',
    "HK" =>  'Hong Kong',
    "HU" =>  'Hungary',
    "IS" =>  'Iceland',
    "IN" =>  'India',
    "ID" =>  'Indonesia',
    "IR" =>  'Iran, Islamic Republic of',
    "IQ" =>  'Iraq',
    "IE" =>  'Ireland',
    "IM" =>  'Isle of Man',
    "IL" =>  'Israel',
    "IT" =>  'Italy',
    "JM" =>  'Jamaica',
    "JP" =>  'Japan',
    "JE" =>  'Jersey',
    "JO" =>  'Jordan',
    "KZ" =>  'Kazakhstan',
    "KE" =>  'Kenya',
    "KI" =>  'Kiribati',
    "KP" =>  'Korea, Democratic People\'s Republic of',
    "KR" =>  'Korea, Republic of',
    "KW" =>  'Kuwait',
    "KG" =>  'Kyrgyzstan',
    "LA" =>  'Lao People\'s Democratic Republic',
    "LV" =>  'Latvia',
    "LB" =>  'Lebanon',
    "LS" =>  'Lesotho',
    "LR" =>  'Liberia',
    "LY" =>  'Libyan Arab Jamahiriya',
    "LI" =>  'Liechtenstein',
    "LT" =>  'Lithuania',
    "LU" =>  'Luxembourg',
    "MO" =>  'Macao',
    "MK" =>  'Macedonia, The Former Yugoslav Republic of',
    "MG" =>  'Madagascar',
    "MW" =>  'Malawi',
    "MY" =>  'Malaysia',
    "MV" =>  'Maldives',
    "ML" =>  'Mali',
    "MT" =>  'Malta',
    "MH" =>  'Marshall Islands',
    "MQ" =>  'Martinique',
    "MR" =>  'Mauritania',
    "MU" =>  'Mauritius',
    "YT" =>  'Mayotte',
    "MX" =>  'Mexico',
    "FM" =>  'Micronesia, Federated States of',
    "MD" =>  'Moldova, Republic of',
    "MC" =>  'Monaco',
    "MN" =>  'Mongolia',
    "ME" =>  'Montenegro',
    "MS" =>  'Montserrat',
    "MA" =>  'Morocco',
    "MZ" =>  'Mozambique',
    "MM" =>  'Myanmar',
    "NA" =>  'Namibia',
    "NR" =>  'Nauru',
    "NP" =>  'Nepal',
    "NL" =>  'Netherlands',
    "AN" =>  'Netherlands Antilles',
    "NC" =>  'New Caledonia',
    "NZ" =>  'New Zealand',
    "NI" =>  'Nicaragua',
    "NE" =>  'Nicaragua',
    "NG" =>  'Nigeria',
	"NE" =>  'Niger',
    "NU" =>  'Niue',
    "NF" =>  'Norfolk Island',
    "MP" =>  'Northern Mariana Islands',
    "NO" =>  'Norway',
    "OM" =>  'Oman',
    "PK" =>  'Pakistan',
    "PW" =>  'Palau',
    "PS" =>  'Palestinian Territory, Occupied',
    "PA" =>  'Panama',
    "PG" =>  'Papua New Guinea',
    "PY" =>  'Paraguay',
    "PE" =>  'Peru',
    "PH" =>  'Philippines',
    "PN" =>  'Pitcairn',
    "PL" =>  'Poland',
    "PT" =>  'Portugal',
    "PR" =>  'Puerto Rico',
    "QA" =>  'Qatar',
    "RE" =>  'Reunion',
    "RO" =>  'Romania',
    "RU" =>  'Russian Federation',
    "RW" =>  'Rwanda',
    "SH" =>  'Saint Helena',
    "KN" =>  'Saint Kitts and Nevis',
    "LC" =>  'Saint Lucia',
    "PM" =>  'Saint Pierre and Miquelon',
    "VC" =>  'Saint Vincent and The Grenadines',
    "WS" =>  'Samoa',
    "SM" =>  'San Marino',
    "ST" =>  'Sao Tome and Principe',
    "SA" =>  'Saudi Arabia',
    "SN" =>  'Senegal',
    "RS" =>  'Serbia',
    "SC" =>  'Seychelles',
    "SL" =>  'Sierra Leone',
    "SG" =>  'Singapore',
    "SK" =>  'Slovakia',
    "SI" =>  'Slovenia',
    "SB" =>  'Solomon Islands',
    "SO" =>  'Somalia',
    "ZA" =>  'South Africa',
    "GS" =>  'South Georgia and The South Sandwich Islands',
    "ES" =>  'Spain',
    "LK" =>  'Sri Lanka',
    "SD" =>  'Sudan',
    "SR" =>  'Suriname',
    "SJ" =>  'Svalbard and Jan Mayen',
    "SZ" =>  'Swaziland',
    "SE" =>  'Sweden',
    "CH" =>  'Switzerland',
    "SY" =>  'Syrian Arab Republic',
    "TW" =>  'Taiwan, Province of China',
    "TJ" =>  'Tajikistan',
    "TZ" =>  'Tanzania, United Republic of',
    "TH" =>  'Thailand',
    "TL" =>  'Timor-leste',
    "TG" =>  'Togo',
    "TK" =>  'Tokelau',
    "TO" =>  'Tonga',
    "TT" =>  'Trinidad and Tobago',
    "TN" =>  'Tunisia',
    "TR" =>  'Turkey',
    "TM" =>  'Turkmenistan',
    "TC" =>  'Turks and Caicos Islands',
    "TV" =>  'Tuvalu',
    "UG" =>  'Uganda',
    "UA" =>  'Ukraine',
    "AE" =>  'United Arab Emirates',
    "GB" =>  'United Kingdom',
    "US" =>  'United States',
    "UM" =>  'United States Minor Outlying Islands',
    "UY" =>  'Uruguay',
    "UZ" =>  'Uzbekistan',
    "VU" =>  'Vanuatu',
    "VE" =>  'Venezuela',
    "VN" =>  'Viet Nam',
    "VG" =>  'Virgin Islands, British',
    "VI" =>  'Virgin Islands, U.S.',
    "WF" =>  'Wallis and Futuna',
    "EH" =>  'Western Sahara',
    "YE" =>  'Yemen',
    "ZM" =>  'Zambia',
    "ZW" =>  'Zimbabwe'),
    'default'  => 'US'
    ),
	array(
    'id'       => 'signup-auto-suggestion',
    'type'     => 'switch',
    'title'    => esc_html__('Google Auto Suggestion for Signup Address', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'show-signup-otp',
    'type'     => 'switch',
    'title'    => sprintf( esc_html__( 'Show OTP in %s Signup', 'service-finder' ), $providerreplacestring ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'show-customer-signup-otp',
    'type'     => 'switch',
    'title'    => sprintf( esc_html__( 'Show OTP in %s Signup', 'service-finder' ), $customerreplacestring ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
		'id'       => 'social-signup-with',
		'type'     => 'button_set',
		'title'    => esc_html__( 'Social Signup With', 'service-finder' ),
		'options'  => array(
			'nextend-social-login' => esc_html__( 'Nextend Social Login', 'service-finder' ),
			'wordpress-social-login' => esc_html__( 'WordPress Social Login', 'service-finder' ),
		),
		'default'  => 'nextend-social-login'
	),
	array(
    'id'       => 'signup-redirect-option',
    'type'     => 'select',
    'title'    => sprintf( esc_html__('Redirect after %s Signup', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => $pagearr,
    'default'  => 'no'
    ),
	array(
    'id'       => 'signup-redirect-customer-option',
    'type'     => 'select',
    'title'    => sprintf( esc_html__('Redirect after %s Signup', 'service-finder'), $customerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => $pagearr,
    'default'  => 'no'
    ),
	array(
    'id'       => 'login-after-signup',
    'type'     => 'switch',
    'title'    => esc_html__('Login after Signup', 'service-finder'),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'login-redirect-provider-option',
    'type'     => 'select',
    'title'    => sprintf( esc_html__('Redirect after %s Login', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => $pagearr,
    'default'  => service_finder_get_page_id_by_shortcode_theme('[service_finder_my_account]')
    ),
	array(
    'id'       => 'login-redirect-customer-option',
    'type'     => 'select',
    'title'    => sprintf( esc_html__('Redirect after %s Login', 'service-finder'), $customerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => $pagearr,
    'default'  => service_finder_get_page_id_by_shortcode_theme('[service_finder_my_account]')
    ),
	array(
    'id'            => 'hide-msg-seconds',
    'type'          => 'slider',
    'title'         => esc_html__( 'Hide Message (After x Seconds)', 'service-finder' ),
    'desc'          => '',
    'default'       => 120,
    'min'           => 1,
    'step'          => 1,
    'max'           => 300,
    'display_value' => 'text',
    ),
	array(
    'id'       => 'terms-condition-checkbox-providers',
    'type'     => 'switch',
    'title'    => sprintf( esc_html__('Terms and Condition Checkbox on Signup Form for %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'text-terms-condition-checkbox-providers',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Text for Terms and Condition Checkbox for %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => 'It only works when terms and condition is on.',
    'default'  => ''
    ),
	array(
    'id'       => 'terms-condition-checkbox-customers',
    'type'     => 'switch',
    'title'    => sprintf( esc_html__('Terms and Condition Checkbox on Signup Form for %s', 'service-finder'), $customerreplacestring ),
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'text-terms-condition-checkbox-customers',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Text for Terms and Condition Checkbox for %s', 'service-finder'), $customerreplacestring ),
    'subtitle' => '',
    'desc'     => 'It only works when terms and condition is on.',
    'default'  => ''
    ),
    )
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Gallery Settings', 'service-finder' ),
    'id'               => 'gallery-settings',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'            => 'default-gallery-images',
    'type'          => 'slider',
    'title'         => esc_html__( 'Gallery Images for Default', 'service-finder' ),
    'subtitle'      => esc_html__( 'Please set number of Gallery Images for default version', 'service-finder' ),
    'desc'          => '',
    'default'       => 5,
    'min'           => 1,
    'step'          => 1,
    'max'           => 500,
    'display_value' => 'text'
    ),
    array(
    'id'            => 'package0-gallery-images',
    'type'          => 'slider',
    'title'         => esc_html__( 'Gallery Images for Trial Package', 'service-finder' ),
    'subtitle'      => esc_html__( 'Please set number of Gallery Images for Trial Package', 'service-finder' ),
    'desc'          => '',
    'default'       => 10,
    'min'           => 1,
    'step'          => 1,
    'max'           => 500,
    'display_value' => 'text'
    ),
	array(
    'id'            => 'package1-gallery-images',
    'type'          => 'slider',
    'title'         => esc_html__( 'Gallery Images for Package 1', 'service-finder' ),
    'subtitle'      => esc_html__( 'Please set number of Gallery Images for Package 1', 'service-finder' ),
    'desc'          => '',
    'default'       => 10,
    'min'           => 1,
    'step'          => 1,
    'max'           => 500,
    'display_value' => 'text'
    ),
    array(
    'id'            => 'package2-gallery-images',
    'type'          => 'slider',
    'title'         => esc_html__( 'Gallery Images for Package 2', 'service-finder' ),
    'subtitle'      => esc_html__( 'Please set number of Gallery Images for Package 2', 'service-finder' ),
    'desc'          => '',
    'default'       => 10,
    'min'           => 1,
    'step'          => 1,
    'max'           => 500,
    'display_value' => 'text'
    ),
    array(
    'id'            => 'package3-gallery-images',
    'type'          => 'slider',
    'title'         => esc_html__( 'Gallery Images for Package 3', 'service-finder' ),
    'subtitle'      => esc_html__( 'Please set number of Gallery Images for Package 3', 'service-finder' ),
    'desc'          => '',
    'default'       => 10,
    'min'           => 1,
    'step'          => 1,
    'max'           => 500,
    'display_value' => 'text'
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Multiple Category Settings', 'service-finder' ),
    'id'               => 'multiple-category-settings',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'            => 'package0-multiple-categories',
    'type'          => 'slider',
    'title'         => esc_html__( 'Multiple Categories for Trial Package', 'service-finder' ),
    'subtitle'      => esc_html__( 'Please set number of categories for Trial Package', 'service-finder' ),
    'desc'          => '',
    'default'       => 10,
    'min'           => 1,
    'step'          => 1,
    'max'           => 500,
    'display_value' => 'text'
    ),
	array(
    'id'            => 'package1-multiple-categories',
    'type'          => 'slider',
    'title'         => esc_html__( 'Multiple Categories for Package 1', 'service-finder' ),
    'subtitle'      => esc_html__( 'Please set number of categories for Package 1', 'service-finder' ),
    'desc'          => '',
    'default'       => 10,
    'min'           => 1,
    'step'          => 1,
    'max'           => 500,
    'display_value' => 'text'
    ),
    array(
    'id'            => 'package2-multiple-categories',
    'type'          => 'slider',
    'title'         => esc_html__( 'Multiple Categories for Package 2', 'service-finder' ),
    'subtitle'      => esc_html__( 'Please set number of categories for Package 2', 'service-finder' ),
    'desc'          => '',
    'default'       => 10,
    'min'           => 1,
    'step'          => 1,
    'max'           => 500,
    'display_value' => 'text'
    ),
    array(
    'id'            => 'package3-multiple-categories',
    'type'          => 'slider',
    'title'         => esc_html__( 'Multiple Categories for Package 3', 'service-finder' ),
    'subtitle'      => esc_html__( 'Please set number of categories for Package 3', 'service-finder' ),
    'desc'          => '',
    'default'       => 10,
    'min'           => 1,
    'step'          => 1,
    'max'           => 500,
    'display_value' => 'text'
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Job Application Settings', 'service-finder' ),
    'id'               => 'job-application-settings',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'job-apply-limit-period',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Job Apply Period', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'weekly' => 'Weekly',
    'monthly' => 'Monthly',
    ),
    'default'  => 'monthly'
    ),
	array(
    'id'            => 'job-apply-number-of-week-month',
    'type'          => 'slider',
    'title'         => esc_html__( 'Job Apply Limit For', 'service-finder' ),
    'subtitle'      => esc_html__( 'Number of week/month for job apply limit', 'service-finder' ),
    'desc'          => '',
    'default'       => 1,
    'min'           => 1,
    'step'          => 1,
    'max'           => 48,
    'display_value' => 'text'
    ),
	array(
    'id'            => 'package0-job-apply',
    'type'          => 'slider',
    'title'         => esc_html__( 'Apply for Job for Trial Package', 'service-finder' ),
    'subtitle'      => esc_html__( 'Please set number of job apply for Trial Package', 'service-finder' ),
    'desc'          => '',
    'default'       => 10,
    'min'           => 0,
    'step'          => 1,
    'max'           => 500,
    'display_value' => 'text'
    ),
	array(
    'id'            => 'package1-job-apply',
    'type'          => 'slider',
    'title'         => esc_html__( 'Apply for Job for Package 1', 'service-finder' ),
    'subtitle'      => esc_html__( 'Please set number of job apply for Package 1', 'service-finder' ),
    'desc'          => '',
    'default'       => 10,
    'min'           => 0,
    'step'          => 1,
    'max'           => 500,
    'display_value' => 'text'
    ),
    array(
    'id'            => 'package2-job-apply',
    'type'          => 'slider',
    'title'         => esc_html__( 'Apply for Job for Package 2', 'service-finder' ),
    'subtitle'      => esc_html__( 'Please set number of job apply for Package 2', 'service-finder' ),
    'desc'          => '',
    'default'       => 10,
    'min'           => 0,
    'step'          => 1,
    'max'           => 500,
    'display_value' => 'text'
    ),
    array(
    'id'            => 'package3-job-apply',
    'type'          => 'slider',
    'title'         => esc_html__( 'Apply for Job for Package 3', 'service-finder' ),
    'subtitle'      => esc_html__( 'Please set number of job apply for Package 3', 'service-finder' ),
    'desc'          => '',
    'default'       => 10,
    'min'           => 0,
    'step'          => 1,
    'max'           => 500,
    'display_value' => 'text'
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Job Apply Limit Plans', 'service-finder' ),
    'id'               => 'job-limit-plans',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'increase-limit-plans',
    'type'     => 'switch',
    'title'    => esc_html__( 'Increase Job Apply Limit Plans', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => false,
    ),
	array(
    'id'       => 'append-limit',
    'type'     => 'switch',
    'title'    => esc_html__( 'Add Remaining Limits to Next Month/Week', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => false,
	'required' => array( 'increase-limit-plans', '=', true ),
    ),
	array(
    'id'       => 'plan1',
    'type'     => 'switch',
    'title'    => esc_html__( 'Plan 1', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => true,
	'required' => array( 'increase-limit-plans', '=', true ),
    ),
    array(
    'id'       => 'plan1-name',
    'type'     => 'text',
    'title'    => esc_html__( 'Name', 'service-finder' ),
	'required' => array( 'plan1', '=', true ),
    ),
    array(
    'id'       => 'plan1-price',
    'type'     => 'text',
    'title'    => esc_html__( 'Price', 'service-finder' ),
    'default'  => '0',
	'required' => array( 'plan1', '=', true ),
    ),
    array(
    'id'            => 'plan1-limit',
    'type'          => 'slider',
    'title'         => esc_html__( 'Limit', 'service-finder' ),
    'desc'          => '',
    'default'       => 1,
    'min'           => 1,
    'step'          => 1,
    'max'           => 5000,
    'display_value' => 'text',
	'required' => array( 'plan1', '=', true )
    ),
    array(
    'id'       => 'plan2',
    'type'     => 'switch',
    'title'    => esc_html__( 'Plan 2', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => true,
	'required' => array( 'increase-limit-plans', '=', true ),
    ),
    array(
    'id'       => 'plan2-name',
    'type'     => 'text',
    'title'    => esc_html__( 'Name', 'service-finder' ),
	'required' => array( 'plan2', '=', true )
    ),
    array(
    'id'       => 'plan2-price',
    'type'     => 'text',
    'title'    => esc_html__( 'Price', 'service-finder' ),
    'default'  => '0',
	'required' => array( 'plan2', '=', true )
    ),
    array(
    'id'            => 'plan2-limit',
    'type'          => 'slider',
    'title'         => esc_html__( 'Limit', 'service-finder' ),
    'desc'          => '',
    'default'       => 1,
    'min'           => 1,
    'step'          => 1,
    'max'           => 5000,
    'display_value' => 'text',
	'required' => array( 'plan2', '=', true )
    ),
	array(
    'id'       => 'plan3',
    'type'     => 'switch',
    'title'    => esc_html__( 'Plan 3', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => true,
	'required' => array( 'increase-limit-plans', '=', true ),
    ),
    array(
    'id'       => 'plan3-name',
    'type'     => 'text',
    'title'    => esc_html__( 'Name', 'service-finder' ),
	'required' => array( 'plan3', '=', true )
    ),
    array(
    'id'       => 'plan3-price',
    'type'     => 'text',
    'title'    => esc_html__( 'Price', 'service-finder' ),
    'default'  => '0',
	'required' => array( 'plan3', '=', true )
    ),
    array(
    'id'            => 'plan3-limit',
    'type'          => 'slider',
    'title'         => esc_html__( 'Limit', 'service-finder' ),
    'desc'          => '',
    'default'       => 1,
    'min'           => 1,
    'step'          => 1,
    'max'           => 5000,
    'display_value' => 'text',
	'required' => array( 'plan3', '=', true )
    ),
    )
    ) );
	
	Redux::setSection( $opt_name, array(
    'title'            => esc_html($customerreplacestring).' '.esc_html__( 'Settings', 'service-finder' ),
    'id'               => 'customer-settings',
	'customizer'           => false,
    'desc'             => '',
    'customizer_width' => '400px',
    'icon'             => 'el el-cog'
    ) );
	
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Job Post Plans', 'service-finder' ),
    'id'               => 'job-post-plans',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'job-posting-type',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Job Posting', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'free' => 'Free',
    'paid' => 'Paid',
    ),
    'default'  => 'free',
    ),
	array(
    'id'       => 'increase-job-post-limit-plans',
    'type'     => 'switch',
    'title'    => esc_html__( 'Increase Job Post Limit Plans', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => false,
	'required' => array( 'job-posting-type', '=', 'paid' ),
    ),
	array(
    'id'       => 'append-post-limit',
    'type'     => 'switch',
    'title'    => esc_html__( 'Add Remaining Limits to Next Month/Week', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => false,
	'required' => array( 'increase-job-post-limit-plans', '=', true ),
    ),
	array(
    'id'       => 'job-post-limit-period',
    'type'     => 'button_set',
    'title'    => esc_html__( 'Job Post Period', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'options'  => array(
    'weekly' => 'Weekly',
    'monthly' => 'Monthly',
    ),
    'default'  => 'monthly',
	'required' => array( 'increase-job-post-limit-plans', '=', true ),
    ),
	array(
    'id'            => 'job-post-number-of-week-month',
    'type'          => 'slider',
    'title'         => esc_html__( 'Job Post Limit For', 'service-finder' ),
    'subtitle'      => esc_html__( 'Number of week/month for job post limit', 'service-finder' ),
    'desc'          => '',
    'default'       => 1,
    'min'           => 1,
    'step'          => 1,
    'max'           => 48,
    'display_value' => 'text',
	'required' => array( 'increase-job-post-limit-plans', '=', true ),
    ),
	array(
    'id'            => 'default-job-post-limit',
    'type'          => 'slider',
    'title'         => esc_html__( 'Job Post Limit with Signup', 'service-finder' ),
    'subtitle'      => esc_html__( 'Please set default number of job post limit after signup', 'service-finder' ),
    'desc'          => '',
    'default'       => 10,
    'min'           => 0,
    'step'          => 1,
    'max'           => 500,
    'display_value' => 'text',
	'required' => array( 'increase-job-post-limit-plans', '=', true ),
    ),
	array(
    'id'       => 'job-post-plan1',
    'type'     => 'switch',
    'title'    => esc_html__( 'Plan 1', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => true,
	'required' => array( 'increase-job-post-limit-plans', '=', true ),
    ),
    array(
    'id'       => 'job-post-plan1-name',
    'type'     => 'text',
    'title'    => esc_html__( 'Name', 'service-finder' ),
	'required' => array( 'job-post-plan1', '=', true ),
    ),
    array(
    'id'       => 'job-post-plan1-price',
    'type'     => 'text',
    'title'    => esc_html__( 'Price', 'service-finder' ),
    'default'  => '0',
	'required' => array( 'job-post-plan1', '=', true ),
    ),
    array(
    'id'            => 'job-post-plan1-limit',
    'type'          => 'slider',
    'title'         => esc_html__( 'Limit', 'service-finder' ),
    'desc'          => '',
    'default'       => 1,
    'min'           => 1,
    'step'          => 1,
    'max'           => 5000,
    'display_value' => 'text',
	'required' => array( 'job-post-plan1', '=', true )
    ),
	array(
    'id'       => 'job-post-plan2',
    'type'     => 'switch',
    'title'    => esc_html__( 'Plan 2', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => true,
	'required' => array( 'increase-job-post-limit-plans', '=', true ),
    ),
    array(
    'id'       => 'job-post-plan2-name',
    'type'     => 'text',
    'title'    => esc_html__( 'Name', 'service-finder' ),
	'required' => array( 'job-post-plan2', '=', true ),
    ),
    array(
    'id'       => 'job-post-plan2-price',
    'type'     => 'text',
    'title'    => esc_html__( 'Price', 'service-finder' ),
    'default'  => '0',
	'required' => array( 'job-post-plan2', '=', true ),
    ),
    array(
    'id'            => 'job-post-plan2-limit',
    'type'          => 'slider',
    'title'         => esc_html__( 'Limit', 'service-finder' ),
    'desc'          => '',
    'default'       => 1,
    'min'           => 1,
    'step'          => 1,
    'max'           => 5000,
    'display_value' => 'text',
	'required' => array( 'job-post-plan2', '=', true )
    ),
	array(
    'id'       => 'job-post-plan3',
    'type'     => 'switch',
    'title'    => esc_html__( 'Plan 3', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => true,
	'required' => array( 'increase-job-post-limit-plans', '=', true ),
    ),
    array(
    'id'       => 'job-post-plan3-name',
    'type'     => 'text',
    'title'    => esc_html__( 'Name', 'service-finder' ),
	'required' => array( 'job-post-plan3', '=', true ),
    ),
    array(
    'id'       => 'job-post-plan3-price',
    'type'     => 'text',
    'title'    => esc_html__( 'Price', 'service-finder' ),
    'default'  => '0',
	'required' => array( 'job-post-plan3', '=', true ),
    ),
    array(
    'id'            => 'job-post-plan3-limit',
    'type'          => 'slider',
    'title'         => esc_html__( 'Limit', 'service-finder' ),
    'desc'          => '',
    'default'       => 1,
    'min'           => 1,
    'step'          => 1,
    'max'           => 5000,
    'display_value' => 'text',
	'required' => array( 'job-post-plan3', '=', true )
    ),
    )
    ) );
	
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Job Applicants Filters', 'service-finder' ),
    'id'               => 'job-applicants-filters',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'job-show-filters',
    'type'     => 'switch',
    'title'    => esc_html__( 'Show Filters', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'job-location-filter',
    'type'     => 'switch',
    'title'    => esc_html__( 'Location Filter', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'job-type-filter',
    'type'     => 'switch',
    'title'    => esc_html__( 'Type Filter', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'job-quote-filter',
    'type'     => 'switch',
    'title'    => esc_html__( 'Filter by invitations/applicants', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'job-rating-filter',
    'type'     => 'switch',
    'title'    => esc_html__( 'Rating Filter', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'job-amenity-filter',
    'type'     => 'switch',
    'title'    => esc_html__( 'Amenity Filter', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'job-text',
    'type'     => 'text',
    'title'    => esc_html__( 'Job Text', 'service-finder' ),
    'default'  => esc_html__( 'Job', 'service-finder' ),
    ),
	array(
    'id'       => 'job-service-perform-text',
    'type'     => 'text',
    'title'    => esc_html__( 'Service Perform At Text', 'service-finder' ),
    'default'  => esc_html__( 'Service Perform At Text', 'service-finder' ),
    ),
	array(
    'id'       => 'job-filter-radius-input-placeholder',
    'type'     => 'text',
    'title'    => esc_html__( 'Radius Input Placeholder', 'service-finder' ),
    'default'  => esc_html__( 'Enter Radius', 'service-finder' ),
    ),
	array(
    'id'       => 'job-filter-by-location-text',
    'type'     => 'text',
    'title'    => esc_html__( 'Filter by Location Text', 'service-finder' ),
    'default'  => esc_html__( 'Filter by Location Text', 'service-finder' ),
    ),
	array(
    'id'       => 'job-recommended-lession-text',
    'type'     => 'text',
    'title'    => esc_html__( 'Recommended Provider Text', 'service-finder' ),
    'default'  => esc_html__( 'Recommended Provider Text', 'service-finder' ),
    ),
	array(
    'id'       => 'job-number-of-provider-have-applied-text',
    'type'     => 'text',
    'title'    => esc_html__( '%NUMBER% provider has applied to this job', 'service-finder' ),
    'default'  => esc_html__( '%NUMBER% provider has applied to this job', 'service-finder' ),
	'desc' => "Keywords: %NUMBER%",
    ),
	array(
    'id'       => 'job-send-invitation-selected-lession-provider-text',
    'type'     => 'text',
    'title'    => esc_html__( 'Send invitations to all selected providers', 'service-finder' ),
    'default'  => esc_html__( 'Send invitations to all selected providers', 'service-finder' ),
    ),
	array(
    'id'      => 'job-no-result-html-view-applicants',
    'type'    => 'editor',
    'title'   => esc_html__('No Result HTML (View applicants)', 'service-finder'),
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'      => 'job-no-result-html-send-invitations',
    'type'    => 'editor',
    'title'   => esc_html__('No Result HTML (Send invitations)', 'service-finder'),
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	
	if(class_exists('aone_messaging')){
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Message System', 'service-finder' ),
    'id'               => 'message-system-settings',
	'customizer'           => false,
    'desc'             => '',
    'customizer_width' => '400px',
    'icon'             => 'el el-cog'
    ) );
	
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Message System Settings', 'service-finder' ),
    'id'               => 'msg-sys-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'no-chat-image',
    'type'     => 'media',
    'url'      => true,
    'title'    => esc_html__( 'Placeholder for No Chat', 'service-finder' ),
    'compiler' => 'true',
    'desc'     => '',
    'subtitle' => esc_html__( 'Upload image that will show when no conversation in chat box', 'service-finder' ),
    ),
	array(
    'id'       => 'block-user-message',
    'type'     => 'switch',
    'title'    => esc_html__( 'Block Another User', 'service-finder' ),
	'desc'     => '',
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'            => 'message-refresh-rate',
    'type'          => 'slider',
    'title'         => esc_html__( 'Refresh Rate (In Sec.)', 'service-finder' ),
    'subtitle'      => esc_html__( 'Reload notification in above seconds', 'service-finder' ),
    'desc'          => '',
    'default'       => 30,
    'min'           => 5,
    'step'          => 1,
    'max'           => 300,
    'display_value' => 'text'
    ),
	array(
    'id'       => 'quote-chat-message-received-to-user-subject',
    'type'     => 'text',
    'title'    => esc_html__('Subject for Chat Message Received for Quote to User', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'quote-chat-message-received-to-user',
    'type'    => 'editor',
    'title'   => esc_html__('Chat Message Received for Quote to User', 'service-finder'),
    'desc' => "Keywords: %QUOTEID%,%MESSAGE%,%LINK%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'job-chat-message-received-to-user-subject',
    'type'     => 'text',
    'title'    => esc_html__('Subject for Chat Message Received for Job to User', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'job-chat-message-received-to-user',
    'type'    => 'editor',
    'title'   => esc_html__('Chat Message Received for Job to User', 'service-finder'),
    'desc' 	  => "Keywords: %JOBTITLE%,%MESSAGE%,%LINK%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	}
	
    
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'SEO Settings', 'service-finder' ),
    'id'               => 'seo-settings-page',
	'customizer'           => false,
    'desc'             => '',
    'customizer_width' => '400px',
    'icon'             => 'el el-graph'
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html($providerreplacestring).' '.esc_html__( 'SEO Settings', 'service-finder' ),
    'id'               => 'provider-seo-settings',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'provider-meta-title',
    'type'     => 'text',
    'title'    => esc_html__( 'Meta Title', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '%NAME%,%COMPANY-NAME%,%SINGLE-CATEGORY%,%MULTIPLE-CATEGORY%,%COUNTRY%,%CITY%,%DESCRIPTION%',
    'default'  => ''
    ),
	array(
    'id'       => 'provider-meta-keywords',
    'type'     => 'text',
    'title'    => esc_html__( 'Meta Keywords', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '%NAME%,%COMPANY-NAME%,%SINGLE-CATEGORY%,%MULTIPLE-CATEGORY%,%COUNTRY%,%CITY%,%DESCRIPTION%',
    'default'  => ''
    ),
	array(
    'id'       => 'provider-meta-desription',
    'type'     => 'text',
    'title'    => esc_html__( 'Meta Desription', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '%NAME%,%COMPANY-NAME%,%SINGLE-CATEGORY%,%MULTIPLE-CATEGORY%,%COUNTRY%,%CITY%,%DESCRIPTION%',
    'default'  => ''
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Search Page SEO Settings', 'service-finder' ),
    'id'               => 'search-seo-settings',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'search-meta-title',
    'type'     => 'text',
    'title'    => esc_html__( 'Meta Title', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '%KEYWORD%,%ADDRESS%,%CATEGORY%,%COUNTRY%,%CITY%',
    'default'  => ''
    ),
	array(
    'id'       => 'search-meta-keywords',
    'type'     => 'text',
    'title'    => esc_html__( 'Meta Keywords', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '%KEYWORD%,%ADDRESS%,%CATEGORY%,%COUNTRY%,%CITY%',
    'default'  => ''
    ),
	array(
    'id'       => 'search-meta-desription',
    'type'     => 'text',
    'title'    => esc_html__( 'Meta Desription', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '%KEYWORD%,%ADDRESS%,%CATEGORY%,%COUNTRY%,%CITY%',
    'default'  => ''
    ),
    )
    ) );
	
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Featured Settings', 'service-finder' ),
    'id'               => 'featured-settings-page',
	'customizer'           => false,
    'desc'             => '',
    'customizer_width' => '400px',
    'icon'             => 'el el-cog'
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Featured Settings', 'service-finder' ),
    'id'               => 'featured-settings',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'provider-feature',
    'type'     => 'switch',
    'title'    => esc_html__( 'Feature', 'service-finder' ).' '.esc_html($providerreplacestring),
    'subtitle' => '',
    'default'  => true
    ),
    array(

    'id'            => 'feature-min-max-days-min',

    'type'          => 'spinner',

    'title'         => esc_html__( 'Minimum Days for Feature', 'service-finder' ),

    'subtitle'      => esc_html__( 'Please set minimum number of days available to make provider as featured', 'service-finder' ),

    'desc'          => '',

    'default'           => 1,
	
	'min'           => 1,

    'step'          => 1,

    'max'           => '365',

    ),
	
	array(

    'id'            => 'feature-min-max-days-max',

    'type'          => 'spinner',

    'title'         => esc_html__( 'Maximum Days for Feature', 'service-finder' ),

    'subtitle'      => esc_html__( 'Please set maximum number of days available to make provider as featured', 'service-finder' ),

    'desc'          => '',

    'default'           => 365,
	
	'min'           => 1,

    'step'          => 1,

    'max'           => '365',

    ),
    )
    ) );
	
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Labels', 'service-finder' ),
    'id'               => 'labels-setting',
	'customizer'           => false,
    'desc'             => '',
    'customizer_width' => '400px',
    'icon'             => 'el el-cog'
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => sprintf( esc_html__('%s My Account Labels', 'service-finder'), $providerreplacestring ),
    'id'               => 'provider-myaccount-labels',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'label-profile-settings',
    'type'     => 'text',
    'title'    => esc_html__( 'Profile Settings', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-mymessages',
    'type'     => 'text',
    'title'    => esc_html__( 'My Messages', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-blog-post',
    'type'     => 'text',
    'title'    => esc_html__( 'Blog Post', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-identity-check',
    'type'     => 'text',
    'title'    => esc_html__( 'Identity Check', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-availability',
    'type'     => 'text',
    'title'    => esc_html__( 'Availability', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-set-unavailability',
    'type'     => 'text',
    'title'    => esc_html__( 'Set Unavailability', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-account-business-hours',
    'type'     => 'text',
    'title'    => esc_html__( 'Business Hours', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-quotation',
    'type'     => 'text',
    'title'    => esc_html__( 'Quotation', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-payout-history',
    'type'     => 'text',
    'title'    => esc_html__( 'Payout History', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-postal-codes',
    'type'     => 'text',
    'title'    => esc_html__( 'Postal Codes', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-our-branches',
    'type'     => 'text',
    'title'    => esc_html__( 'Our Branches', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-regions',
    'type'     => 'text',
    'title'    => esc_html__( 'Regions', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-my-services',
    'type'     => 'text',
    'title'    => esc_html__( 'My Services', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-my-jobs',
    'type'     => 'text',
    'title'    => esc_html__('My Jobs', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
    array(
    'id'       => 'label-job-limits',
    'type'     => 'text',
    'title'    => esc_html__('Job Limits', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-team-members',
    'type'     => 'text',
    'title'    => esc_html__( 'Team Members', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-booking-settings',
    'type'     => 'text',
    'title'    => esc_html__( 'Booking Settings', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-bookings',
    'type'     => 'text',
    'title'    => esc_html__( 'Bookings', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-schedule',
    'type'     => 'text',
    'title'    => esc_html__( 'Schedule', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-invoice',
    'type'     => 'text',
    'title'    => esc_html__( 'Invoice', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-upgrade',
    'type'     => 'text',
    'title'    => esc_html__( 'Upgrade', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-articles',
    'type'     => 'text',
    'title'    => esc_html__( 'Articles', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-experience',
    'type'     => 'text',
    'title'    => esc_html__( 'Experience', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-certificates',
    'type'     => 'text',
    'title'    => esc_html__( 'Certificates', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-qualification',
    'type'     => 'text',
    'title'    => esc_html__( 'Qualification', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-wallet',
    'type'     => 'text',
    'title'    => esc_html__( 'Wallet', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-payout',
    'type'     => 'text',
    'title'    => esc_html__( 'Payout', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-payout-settings',
    'type'     => 'text',
    'title'    => esc_html__( 'Mangopay Account Settings', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-earnings-dues',
    'type'     => 'text',
    'title'    => esc_html__( 'Earnings & Dues', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-offers',
    'type'     => 'text',
    'title'    => esc_html__( 'Offers & Promotions', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => sprintf( esc_html__('%s My Account Labels', 'service-finder'), $customerreplacestring ),
    'id'               => 'customer-myaccount-labels',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'label-customer-my-profile',
    'type'     => 'text',
    'title'    => esc_html__( 'My Profile', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-customer-wallet',
    'type'     => 'text',
    'title'    => esc_html__( 'Wallet', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-customer-favorites',
    'type'     => 'text',
    'title'    => esc_html__( 'My Favorites', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-customer-bookings',
    'type'     => 'text',
    'title'    => esc_html__( 'Bookings', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-customer-schedule',
    'type'     => 'text',
    'title'    => esc_html__( 'Schedule', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-customer-invoice',
    'type'     => 'text',
    'title'    => esc_html__( 'Invoice', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-customer-post-job',
    'type'     => 'text',
    'title'    => esc_html__( 'Post a Job', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-customer-my-jobs',
    'type'     => 'text',
    'title'    => esc_html__( 'My Jobs', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-customer-job-post-plans',
    'type'     => 'text',
    'title'    => esc_html__( 'Job Post Plans', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-customer-my-quotations',
    'type'     => 'text',
    'title'    => esc_html__( 'My Quotations', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => sprintf( esc_html__('%s Public Profile Labels', 'service-finder'), $providerreplacestring ),
    'id'               => 'provider-public-profile-labels',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'label-photo-gallery',
    'type'     => 'text',
    'title'    => esc_html__( 'Photo Gallery', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-provider-bio',
    'type'     => 'text',
    'title'    => esc_html__( 'Provider Bio', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-public-business-hours',
    'type'     => 'text',
    'title'    => esc_html__( 'Business Hours', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-our-video',
    'type'     => 'text',
    'title'    => esc_html__( 'Our Video', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-our-services',
    'type'     => 'text',
    'title'    => esc_html__( 'Our services', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-services',
    'type'     => 'text',
    'title'    => esc_html__( 'Services', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-documents',
    'type'     => 'text',
    'title'    => esc_html__( 'Documents', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-review-qa',
    'type'     => 'text',
    'title'    => esc_html__( 'Review & Q&A', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-qa',
    'type'     => 'text',
    'title'    => esc_html__( 'Q&A', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-ask-question',
    'type'     => 'text',
    'title'    => esc_html__( 'Ask Question', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-book-now',
    'type'     => 'text',
    'title'    => esc_html__('Book Now', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
    array(
    'id'       => 'label-related-provider',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Related %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-booking-amount',
    'type'     => 'text',
    'title'    => esc_html__('Booking Amount', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-task-location',
    'type'     => 'text',
    'title'    => esc_html__( 'Your Task Location', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-date-time',
    'type'     => 'text',
    'title'    => esc_html__( 'Choose Date & Time', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-customer-info',
    'type'     => 'text',
    'title'    => esc_html__( 'Customer Info ', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-payment',
    'type'     => 'text',
    'title'    => esc_html__( 'Payment', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-review',
    'type'     => 'text',
    'title'    => esc_html__( 'Review', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
    )
    ) );
	
	Redux::setSection( $opt_name, array(
    'title'            => sprintf( esc_html__('%s Public Profile Right Scroll Bar Labels', 'service-finder'), $providerreplacestring ),
    'id'               => 'provider-public-profile-scroll-bar-labels',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'label-about-info',
    'type'     => 'text',
    'title'    => esc_html__( 'About info', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-gallery',
    'type'     => 'text',
    'title'    => esc_html__( 'Gallery', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-business-hours',
    'type'     => 'text',
    'title'    => esc_html__( 'Business hours', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-address-info',
    'type'     => 'text',
    'title'    => esc_html__( 'Address info', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-map',
    'type'     => 'text',
    'title'    => esc_html__( 'Map', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-video',
    'type'     => 'text',
    'title'    => esc_html__( 'Video', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-services',
    'type'     => 'text',
    'title'    => esc_html__('Services', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
    array(
    'id'       => 'label-booking-form',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Booking form', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'label-review',
    'type'     => 'text',
    'title'    => esc_html__('Review', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
    )
    ) );
	
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Custom Messages', 'service-finder' ),
    'id'               => 'custom-messages-page',
	'customizer'           => false,
    'desc'             => '',
    'customizer_width' => '400px',
    'icon'             => 'el el-cog'
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Custom Messages', 'service-finder' ),
    'id'               => 'custom-messages',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'login-successfull',
    'type'     => 'text',
    'title'    => esc_html__( 'Login Successfull', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'provider-signup-successfull',
    'type'     => 'text',
    'title'    => esc_html__( 'Provider Signup Successfull', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'claimed-business-successfull',
    'type'     => 'text',
    'title'    => esc_html__( 'Claimed Business Successfull', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'customer-signup-successfull',
    'type'     => 'text',
    'title'    => esc_html__( 'Customer Signup Successfull', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'provider-upgrade-successfull',
    'type'     => 'text',
    'title'    => esc_html__( 'Provider Upgrade Successfull', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'provider-upgrade-failed',
    'type'     => 'text',
    'title'    => esc_html__( 'Provider Upgrade Failed', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'provider-upgrade-pending',
    'type'     => 'text',
    'title'    => esc_html__( 'Provider Upgrade via Wire Transfer', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'jobapply-limit-successfull',
    'type'     => 'text',
    'title'    => esc_html__( 'Job Apply Limit Upgrade Successfull', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'update-wallet-amount-successfull',
    'type'     => 'text',
    'title'    => esc_html__( 'Wallet Amount Added Successfull', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'jobapply-limit-wiretransfer',
    'type'     => 'text',
    'title'    => esc_html__( 'Job Apply Limit Upgrade After Wire Transfer', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'update-wallet-amount-wiretransfer',
    'type'     => 'text',
    'title'    => esc_html__( 'Wallet Amount Upgrade After Wire Transfer', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'provider-recurring-signup-successfull',
    'type'     => 'text',
    'title'    => esc_html__( 'Provider Recurring Signup Successfull', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'provider-recurring-upgrade-successfull',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('%s Recurring Upgrade Successfull', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
    array(
    'id'       => 'customer-signup-successfull',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('%s Signup Successfull', 'service-finder'), $customerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'password-reset-successfull',
    'type'     => 'text',
    'title'    => esc_html__( 'Password Reset Successfull', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'feature-request',
    'type'     => 'text',
    'title'    => esc_html__( 'Send Feature Request', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'feature-payment',
    'type'     => 'text',
    'title'    => esc_html__( 'After Feature Payment', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'feature-wiretransfer',
    'type'     => 'text',
    'title'    => esc_html__( 'After Feature Wire Transfer', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'featured-account',
    'type'     => 'text',
    'title'    => esc_html__( 'After being Featured in Upgrade Account Tab', 'service-finder' ),
    'subtitle' => '',
    'desc'     => 'Use %REMAININGDAYS% keyword to show reamining days to expire featured account',
    'default'  => ''
    ),
	array(
    'id'       => 'subscription-cancel',
    'type'     => 'text',
    'title'    => esc_html__( 'Subscription Cancelled', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'featured-cancel',
    'type'     => 'text',
    'title'    => esc_html__( 'Featured/Featured Request Cancelled', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'booking-approve',
    'type'     => 'text',
    'title'    => esc_html__( 'Booking Approve', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'provider-booked',
    'type'     => 'text',
    'title'    => esc_html__( 'After book Provider', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'get-quote',
    'type'     => 'text',
    'title'    => esc_html__( 'Get Quotation', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'pay-invoice',
    'type'     => 'text',
    'title'    => esc_html__( 'After Pay Invoice', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'invoice-pay-wiretransfer',
    'type'     => 'text',
    'title'    => esc_html__( 'Pay Invoice via Wire Transfer', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'job-limit',
    'type'     => 'text',
    'title'    => esc_html__( 'After Payment for Increase Job Limit', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'upload-identity',
    'type'     => 'text',
    'title'    => esc_html__( 'After Upload Identity', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'nl-subscription',
    'type'     => 'text',
    'title'    => esc_html__( 'Newsletter Subscription', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'apply-job',
    'type'     => 'text',
    'title'    => esc_html__( 'Apply for Job', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'hire-bookingoff',
    'type'     => 'text',
    'title'    => esc_html__( 'Hire if booking is off', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'myaccount-notification',
    'type'     => 'text',
    'title'    => esc_html__( 'Notification on my Account', 'service-finder' ),
	'desc' 	   => esc_html__( 'It will show when address not fill in provider profile.', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'google-calendar-booking-title',
    'type'     => 'text',
    'title'    => esc_html__( 'Title for Booking in Google Calendar', 'service-finder' ),
    'subtitle' => '',
    'desc' 	   => "Keywords: %CUSTOMERNAME%,%CUSTOMEREMAIL%",
    'default'  => ''
    ),
	array(
    'id'      => 'claim-business-payment',
    'type'    => 'editor',
    'title'   => esc_html__('Claim Business Payment', 'service-finder'),
    'desc' => "Keywords: %PROVIDERNAME%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
    
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Mail Settings', 'service-finder' ),
    'id'               => 'mail-templates',
	'customizer'           => false,
    'desc'             => '',
    'customizer_width' => '400px',
    'icon'             => 'el el-envelope'
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Set From Name and Email in Mail Function', 'service-finder' ),
    'id'               => 'set-from-address',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'from-name',
    'type'     => 'text',
    'title'    => esc_html__( 'From Name', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'       => 'from-email',
    'type'     => 'text',
    'title'    => esc_html__( 'From Email', 'service-finder' ),
    'subtitle' => '',
    'desc'     => 'Ex.:- example@domain.com',
    'default'  => ''
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html($providerreplacestring).' '.esc_html__( 'Expiry Mail Notification', 'service-finder' ),
    'id'               => 'expiry-mail-notification',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'expiry-mail-notification-days',
    'type'     => 'multi_text',
    'title'    => esc_html__( 'Number of Days Before mail Send', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'Set the number of days before expiry mail send', 'service-finder' )
    ),
    )
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Signup Mail', 'service-finder' ),
    'id'               => 'signup-mail-settings',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'send-to-user-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'send-to-user',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'desc' => "Keywords: %USERNAME%,%FIRSTNAME%,%LASTNAME%,%EMAIL%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'send-to-provider-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'send-to-provider',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'desc' => "Keywords: %USERNAME%,%FIRSTNAME%,%LASTNAME%,%EMAIL%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
 	array(
    'id'       => 'provider-to-admin-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for %s Signup Mail to Admin', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),  
    array(
    'id'      => 'provider-to-admin',
    'type'    => 'editor',
    'title'   => esc_html($providerreplacestring).' '.esc_html__( 'Signup Mail to Admin', 'service-finder' ),
    'desc' => "Keywords: %USERNAME%,%EMAIL%,%ADDRESS%,%CITY%,%COUNTRY%,%ZIPCODE%,%CATEGORY%,%PACKAGENAME%,%PAYMENTTYPE%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'confirm-email-otp-to-provider-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for %s for OTP to Confirm Email', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),  
    array(
    'id'      => 'confirm-email-otp-to-provider',
    'type'    => 'editor',
    'title'   => esc_html__( 'OTP to Confirm Email to', 'service-finder' ).' '.$providerreplacestring,
    'desc' => "Keywords: %OTP%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'customer-to-admin-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for %s Signup Mail to Admin', 'service-finder'), $customerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
    array(
    'id'      => 'customer-to-admin',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('%s Signup Mail to Admin', 'service-finder'), $customerreplacestring ),
    'desc' => "Keywords: %USERNAME%,%EMAIL%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Provider Account Approval', 'service-finder' ),
    'id'               => 'provider-account-approval-settings',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'provider-account-approval-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s for Account Approval', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'send-to-provider-account-approval',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Mail Send to %s for Account Approval', 'service-finder'), $providerreplacestring ),
	'desc' => "Keywords: %PROVIDERNAME%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(

    'title'            => esc_html__( 'Provider Block/Unblock Account', 'service-finder' ),

    'id'               => 'provider-account-block-unblock-settings',

    'subsection'       => true,

	'customizer'           => false,

    'customizer_width' => '450px',

    'desc'             => '',

    'fields'           => array(

    array(

    'id'       => 'provider-account-block-subject',

    'type'     => 'text',

    'title'    => sprintf( esc_html__('Subject for Mail Send to %s for Account Block', 'service-finder'), $providerreplacestring ),

    'subtitle' => '',

    'desc'     => '',

    'default'  => ''

    ),

	array(

    'id'      => 'send-to-provider-account-block',

    'type'    => 'editor',

    'title'   => sprintf( esc_html__('Mail Send to %s for Account Block', 'service-finder'), $providerreplacestring ),

	'desc' => "Keywords: %COMMENT%",

    'default' => '',

    'args'    => array(

    'wpautop'       => false,

    'media_buttons' => false,

    'textarea_rows' => 5,

    'teeny'         => false,

    'quicktags'     => true,

    )

    ),
	
	array(

    'id'       => 'provider-account-unblock-subject',

    'type'     => 'text',

    'title'    => sprintf( esc_html__('Subject for Mail Send to %s for Account Unblock', 'service-finder'), $providerreplacestring ),

    'subtitle' => '',

    'desc'     => '',

    'default'  => ''

    ),

	array(

    'id'      => 'send-to-provider-account-unblock',

    'type'    => 'editor',

    'title'   => sprintf( esc_html__('Mail Send to %s for Account Unblock', 'service-finder'), $providerreplacestring ),

    'default' => '',

    'args'    => array(

    'wpautop'       => false,

    'media_buttons' => false,

    'textarea_rows' => 5,

    'teeny'         => false,

    'quicktags'     => true,

    )

    ),

    )

    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Featured Request Approval/Featured Payment', 'service-finder' ),
    'id'               => 'provider-featured-request-approval-settings',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'provider-featured-request-approval-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s for Featured Request Approval', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'send-to-provider-featured-request-approval',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Mail Send to %s for Featured Request Approval', 'service-finder'), $providerreplacestring ),
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	 array(

    'id'       => 'admin-featured-request-subject',

    'type'     => 'text',

    'title'    => esc_html__('Subject for Mail Send to admin for Featured Request', 'service-finder'),

    'subtitle' => '',

    'desc'     => '',

    'default'  => ''

    ),

	array(

    'id'      => 'send-to-admin-featured-request',

    'type'    => 'editor',

    'title'   => esc_html__('Mail Send to admin for Featured Request', 'service-finder'),

    'desc' => '%PROVIDERNAME%,%PROVIDEREMAIL%',

    'args'    => array(

    'wpautop'       => false,

    'media_buttons' => false,

    'textarea_rows' => 5,

    'teeny'         => false,

    'quicktags'     => true,

    )

    ),
	array(
    'id'       => 'featured-expire-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Featured Expired Mail', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'featured-expire-message',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Mail Send to %s for Featured Expired', 'service-finder'), $providerreplacestring ),
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'admin-featured-payment-subject',
    'type'     => 'text',
    'title'    => esc_html__('Subject for Mail Send to admin for Featured Payment', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'admin-featured-payment-message',
    'type'    => 'editor',
    'title'   => esc_html__('Mail Send to admin for Featured Payment', 'service-finder'),
    'default' => '',
	'desc' => "Keywords: %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%",
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'provider-featured-payment-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s for Featured Payment', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'provider-featured-payment-message',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Mail Send to %s for Featured Payment', 'service-finder'), $providerreplacestring ),
    'default' => '',
	'desc' => "Keywords: %REMAININGDAYS%",
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Subscription Expire/Cancel Mail', 'service-finder' ),
    'id'               => 'subscription-expire-cancel-settings',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'provider-subscription-expire-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s for Subscription Expire', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'send-to-subscription-expire-provider',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Mail Send to %s for Subscription Expire', 'service-finder'), $providerreplacestring ),
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'provider-subscription-expire-reminder-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s for Subscription Expire Reminder', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'send-to-subscription-expire-reminder-provider',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Mail Send to %s for Subscription Expire Reminder', 'service-finder'), $providerreplacestring ),
	'desc' => "Keywords: %NUMBEROFDAYS%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'admin-subscription-expire-subject',
    'type'     => 'text',
    'title'    => esc_html__('Subject for Mail Send to Admin for Subscription Expire', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'send-to-subscription-expire-admin',
    'type'    => 'editor',
    'title'   => esc_html__('Mail Send to Admin for Subscription Expire', 'service-finder'),
	'desc' => "Keywords: %PROVIDERNAME%,%PROVIDEREMAIL%,%PROVIDERPHONE%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'provider-subscription-cancel',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s for Subscription Cancel', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'send-to-subscription-cancel-provider',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Mail Send to %s for Subscription Cancel', 'service-finder'), $providerreplacestring ),
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'admin-subscription-cancel',
    'type'     => 'text',
    'title'    => esc_html__('Subject for Mail Send to Admin for Subscription Cancel', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'send-to-subscription-cancel-admin',
    'type'    => 'editor',
    'title'   => esc_html__('Mail Send to Admin for Subscription Cancel', 'service-finder'),
	'desc' => "Keywords: %PROVIDERNAME%,%PROVIDEREMAIL%,%PROVIDERPHONE%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Upgrade Mail', 'service-finder' ),
    'id'               => 'upgrade-mail-settings',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'upgrade-send-to-provider-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Upgrade Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'upgrade-send-to-provider',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Upgrade Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'desc' => "Keywords: %USERNAME%,%EMAIL%,%PACKAGENAME%,%PAYMENTTYPE%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'upgrade-provider-to-admin-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for %s Upgrade Mail to Admin', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),   
    array(
    'id'      => 'upgrade-provider-to-admin',
    'type'    => 'editor',
    'title'   => esc_html($providerreplacestring).' '.esc_html__( 'Upgrade Mail to Admin', 'service-finder' ),
    'desc' => "Keywords: %USERNAME%,%EMAIL%,%ADDRESS%,%CITY%,%COUNTRY%,%ZIPCODE%,%CATEGORY%,%PACKAGENAME%,%PAYMENTTYPE%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'upgrade-provider-to-admin-subject-wired',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for %s Wired Transfer Upgrade Mail to Admin', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),   
    array(
    'id'      => 'upgrade-provider-to-admin-wired',
    'type'    => 'editor',
    'title'   => esc_html($providerreplacestring).' '.esc_html__( 'Wired Transfer Upgrade Mail to Admin', 'service-finder' ),
    'desc' => "Keywords: %USERNAME%,%EMAIL%,%ADDRESS%,%CITY%,%COUNTRY%,%ZIPCODE%,%CATEGORY%,%PACKAGENAME%,%PAYMENTTYPE%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'upgrade-send-to-provider-subject-wired',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Wired Transfer Upgrade Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'upgrade-send-to-provider-wired',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Wired Transfer Upgrade Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'desc' => "Keywords: %USERNAME%,%EMAIL%,%PACKAGENAME%,%PAYMENTTYPE%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'send-to-provider-upgrade-request-approval-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Wire Transfer Upgrade Mail Approval Send to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'send-to-provider-upgrade-request-approval',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Wired Transfer Upgrade Approval Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Booking Mail', 'service-finder' ),
    'id'               => 'booking-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'booking-to-customer-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'booking-to-customer',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'desc' => "Keywords: %BOOKINGREFID%,%DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %PAYMENTMETHOD%, %AMOUNT%, %ADMINFEE%, %SERVICES%, %SHORTDESCRIPTION%,%SERVICELOCATION%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
   array(
    'id'       => 'booking-to-provider-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
    array(
    'id'      => 'booking-to-provider',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to', 'service-finder' ).' '.esc_html($providerreplacestring),
    'desc' => "Keywords: %BOOKINGREFID%,%DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %PAYMENTMETHOD%, %AMOUNT%, %ADMINFEE%, %SERVICES%, %SHORTDESCRIPTION%,%SERVICELOCATION%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    array(
    'id'       => 'booking-to-admin-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Mail Send to Admin', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'booking-to-admin',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to Admin', 'service-finder' ),
    'desc' => "Keywords: %BOOKINGREFID%,%DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %PAYMENTMETHOD%, %AMOUNT%, %ADMINFEE% %SERVICES%, %SHORTDESCRIPTION%,%SERVICELOCATION%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Booking Edit Mail', 'service-finder' ),
    'id'               => 'booking-edit-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'edit-booking-to-customer-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'edit-booking-to-customer',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'desc' => "Keywords: %BOOKINGREFID%,%DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %PAYMENTMETHOD%, %AMOUNT%, %ADMINFEE%, %SERVICES%, %SHORTDESCRIPTION%,%SERVICELOCATION%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
   array(
    'id'       => 'edit-booking-to-provider-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
    array(
    'id'      => 'edit-booking-to-provider',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to', 'service-finder' ).' '.esc_html($providerreplacestring),
    'desc' => "Keywords: %BOOKINGREFID%,%DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %PAYMENTMETHOD%, %AMOUNT%, %ADMINFEE%, %SERVICES%, %SHORTDESCRIPTION%,%SERVICELOCATION%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    array(
    'id'       => 'edit-booking-to-admin-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Mail Send to Admin', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'edit-booking-to-admin',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to Admin', 'service-finder' ),
    'desc' => "Keywords: %BOOKINGREFID%,%DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %PAYMENTMETHOD%, %AMOUNT%, %ADMINFEE% %SERVICES%, %SHORTDESCRIPTION%,%SERVICELOCATION%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Paypal Masspay Configuration Mail', 'service-finder' ),
    'id'               => 'masspay-configuration-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'masspay-config-to-provider-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => esc_html__( 'Paypal Email Validation Mail', 'service-finder' ),
    'default'  => ''
    ),
    array(
    'id'      => 'masspay-config-to-provider',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to', 'service-finder' ).' '.esc_html($providerreplacestring),
    'desc' => "Keywords: %VALIDATION_MESSAGE%, %PROVIDERNAME%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    array(
    'id'       => 'masspay-config-to-admin-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Mail Send to Admin', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'masspay-config-to-admin',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to Admin', 'service-finder' ),
    'desc' => "Keywords: %VALIDATION_MESSAGE%, %PROVIDERNAME%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Paypal Masspay Transfered Success Mail', 'service-finder' ),
    'id'               => 'masspay-payout-transfer-success-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'masspay-payout-transfer-success-to-provider-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
    array(
    'id'      => 'masspay-payout-transfer-success-to-provider',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to', 'service-finder' ).' '.esc_html($providerreplacestring),
    'desc' => "Keywords: %PROVIDERNAME%, %PAYOUTAMOUNT%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    array(
    'id'       => 'masspay-payout-transfer-success-to-admin-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Mail Send to Admin', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'masspay-payout-transfer-success-to-admin',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to Admin', 'service-finder' ),
    'desc' => "Keywords: %PROVIDERNAME%, %PAYOUTAMOUNT%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Paypal Masspay Transfered Fail Mail', 'service-finder' ),
    'id'               => 'masspay-payout-transfer-fail-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'masspay-payout-transfer-fail-to-provider-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
    array(
    'id'      => 'masspay-payout-transfer-fail-to-provider',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to', 'service-finder' ).' '.esc_html($providerreplacestring),
    'desc' => "Keywords: %PROVIDERNAME%, %PAYOUTAMOUNT%, %FAILEDREASON%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    array(
    'id'       => 'masspay-payout-transfer-fail-to-admin-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Mail Send to Admin', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'masspay-payout-transfer-fail-to-admin',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to Admin', 'service-finder' ),
    'desc' => "Keywords: %PROVIDERNAME%, %PAYOUTAMOUNT%, %FAILEDREASON%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Booking Reminder Mail', 'service-finder' ),
    'id'               => 'booking-reminder-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'booking-reminder-mail-notification-days',
    'type'     => 'multi_text',
    'title'    => esc_html__( 'Number of Days Before mail Send', 'service-finder' ),
    'subtitle' => '',
    'desc'     => esc_html__( 'Set the number of days before booking reminder mail send', 'service-finder' )
    ),
	array(
    'id'       => 'booking-reminder-to-customer-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'booking-reminder-to-customer',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'desc' => "Keywords: %DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %PAYMENTMETHOD%, %AMOUNT%, %SERVICES%, %SHORTDESCRIPTION%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
   array(
    'id'       => 'booking-reminder-to-provider-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
    array(
    'id'      => 'booking-reminder-to-provider',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to', 'service-finder' ).' '.esc_html($providerreplacestring),
    'desc' => "Keywords: %DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %PAYMENTMETHOD%, %AMOUNT%, %SERVICES%, %SHORTDESCRIPTION%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    array(
    'id'       => 'booking-reminder-to-admin-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Mail Send to Admin', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'booking-reminder-to-admin',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to Admin', 'service-finder' ),
    'desc' => "Keywords: %DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %PAYMENTMETHOD%, %AMOUNT%, %SERVICES%, %SHORTDESCRIPTION%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Booking Approval Mail If Booking Made via Wire Transfer', 'service-finder' ),
    'id'               => 'booking-approval-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'booking-approval-to-customer-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'booking-approval-to-customer',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'desc' => "Keywords: %DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %PAYMENTMETHOD%, %AMOUNT%, %ADMINFEE%, %SERVICES%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
   array(
    'id'       => 'booking-approval-to-provider-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
    array(
    'id'      => 'booking-approval-to-provider',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to', 'service-finder' ).' '.esc_html($providerreplacestring),
    'desc' => "Keywords: %DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %PAYMENTMETHOD%, %AMOUNT%, %ADMINFEE%, %SERVICES%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    array(
    'id'       => 'booking-approval-to-admin-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Mail Send to Admin', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'booking-approval-to-admin',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to Admin', 'service-finder' ),
    'desc' => "Keywords: %DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %PAYMENTMETHOD%, %AMOUNT%, %ADMINFEE% %SERVICES%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Booking Hire Mail If Booking is off', 'service-finder' ),
    'id'               => 'booking-hire-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
   	array(
    'id'       => 'booking-hire-mail-to-provider-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
    array(
    'id'      => 'booking-hire-mail-to-provider',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to', 'service-finder' ).' '.esc_html($providerreplacestring),
    'desc' => "Keywords: %CUSTOMERNAME%, %CUSTOMEREMAIL%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Change Booking Status to Complete Mail', 'service-finder' ),
    'id'               => 'change-booking-status-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'change-booking-status-to-customer-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'change-booking-status-to-customer',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'desc' => "Keywords: %DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %SERVICES%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    array(
    'id'       => 'change-booking-status-to-provider-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'change-booking-status-to-provider',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to', 'service-finder' ).' '.esc_html($providerreplacestring),
    'desc' => "Keywords: %DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %SERVICES%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    array(
    'id'       => 'change-booking-status-to-admin-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Mail Send to Admin', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'change-booking-status-to-admin',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to Admin', 'service-finder' ),
    'desc' => "Keywords: %DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, '%SERVICES%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Cancel Booking Mail', 'service-finder' ),
    'id'               => 'cancel-booking-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'cancel-booking-to-customer-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'cancel-booking-to-customer',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'desc' => "Keywords: %BOOKINGREFID%, %DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    array(
    'id'       => 'cancel-booking-to-provider-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'cancel-booking-to-provider',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to', 'service-finder' ).' '.esc_html($providerreplacestring),
    'desc' => "Keywords: %BOOKINGREFID%, %DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    array(
    'id'       => 'cancel-booking-to-admin-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Mail Send to Admin', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'cancel-booking-to-admin',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to Admin', 'service-finder' ),
    'desc' => "Keywords: %BOOKINGREFID%, %DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Invoice Mail', 'service-finder' ),
    'id'               => 'invoice-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'invoice-to-customer-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Generate Invoice Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'invoice-to-customer',
    'type'    => 'editor',
    'title'   => esc_html__( 'Generate Invoice Mail Send to Customer', 'service-finder' ),
    'desc' => "Keywords: %REFERENCENO%,%DUEDATE%,%PROVIDERNAME%,%DISCOUNTTYPE%,%DISCOUNT%,'%TAXTYPE%',%TAX%,%DESCRIPTION%,%TOTAL%,%GRANDTOTAL%,%CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %DISCOUNTAMOUNT%, %TAXAMOUNT%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'invoice-to-provider-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Invoice Paid Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),   
    array(
    'id'      => 'invoice-to-provider',
    'type'    => 'editor',
    'title'   => esc_html__( 'Invoice Paid Mail Send to', 'service-finder' ).' '.esc_html($providerreplacestring),
    'desc' => "Keywords: %REFERENCENO%,%DUEDATE%,%CUSTOMEREMAIL%,%DISCOUNTTYPE%,%DISCOUNT%,'%TAXTYPE%',%TAX%,%DESCRIPTION%,%TOTAL%,%GRANDTOTAL%,%CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'invoice-to-customer-paid-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Invoice Paid Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),   
    array(
    'id'      => 'invoice-to-customer-paid',
    'type'    => 'editor',
    'title'   => esc_html__( 'Invoice Paid Mail Send to', 'service-finder' ).' '.esc_html($customerreplacestring),
    'desc' => "Keywords: %REFERENCENO%,%DUEDATE%,%CUSTOMEREMAIL%,%DISCOUNTTYPE%,%DISCOUNT%,'%TAXTYPE%',%TAX%,%DESCRIPTION%,%TOTAL%,%GRANDTOTAL%,%CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Contact Us Mail', 'service-finder' ),
    'id'               => 'contactus-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'contactus-to-admin-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Contact Us Mail Send to Admin', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ), 
	array(
    'id'      => 'contactus-to-admin',
    'type'    => 'editor',
    'title'   => esc_html__( 'Contact Us Mail Send to Admin', 'service-finder' ),
    'desc' => "Keywords: %FULLNAME%,%EMAIL%,%PHONE%,%COMMENT%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Job Apply Mail', 'service-finder' ),
    'id'               => 'jobapply-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'job-apply-mail-to-admin',
    'type'     => 'switch',
    'title'    => esc_html__( 'Job Apply Mail Send to Admin', 'service-finder' ),
    'subtitle' => '',
    'default'  => true,
    ),
	array(
    'id'       => 'applyjob-to-admin-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Apply for Job Mail Send to Admin', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ), 
	array(
    'id'      => 'applyjob-to-admin',
    'type'    => 'editor',
    'title'   => esc_html__( 'Apply for Job Mail Send to Admin', 'service-finder' ),
    'desc' => "%JOBTITLE%,%FULLNAME%,%EMAIL%,%PHONE%,%COST%,%DESCRIPTION%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'applyjob-to-customer-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Apply for Job Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ), 
	array(
    'id'      => 'applyjob-to-customer',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Apply for Job Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'desc' => "%JOBTITLE%,%FULLNAME%,%EMAIL%,%PHONE%,%COST%,%DESCRIPTION%,%JOBAPPLICATIONSPAGELINK%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Job Invite Mail', 'service-finder' ),
    'id'               => 'job-invite-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'invitejob-to-provider-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Invite for Job Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ), 
	array(
    'id'      => 'invitejob-to-provider',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Invite for Job Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'desc' => "%JOBTITLE%,%JOBLINK%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Job Publish Notification Mail', 'service-finder' ),
    'id'               => 'job-publish-notification-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'job-published-mail-to-customer-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Job Published Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ), 
	array(
    'id'      => 'job-published-mail-to-customer',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Job Published Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'desc' => "%JOBTITLE%,%JOBLINK%,%RECOMMENDED_PROVIDERS_LINK%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'job-published-mail-to-provider-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Job Published Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ), 
	array(
    'id'      => 'job-published-mail-to-provider',
    'type'    => 'editor',
    'title'   => sprintf( esc_html__('Job Published Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'desc' => "%JOBTITLE%,%JOBLINK%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html($providerreplacestring).' '.esc_html__( 'Buy Job Limit Connects', 'service-finder' ),
    'id'               => 'jobalimit-connects-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'joblimit-connect-purchase-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Job Connect After Purchase', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ), 
	array(
    'id'      => 'joblimit-connect-purchase-message',
    'type'    => 'editor',
    'title'   => esc_html__( 'Subject for Job Connect After Purchase', 'service-finder' ),
    'desc' => "%USERNAME%,%PLANNAME%,%PAYMENTMETHOD%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'joblimit-connect-purchase-declined-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Job Connect After Purchase Declined', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ), 
	array(
    'id'      => 'joblimit-connect-purchase-declined-message',
    'type'    => 'editor',
    'title'   => esc_html__( 'Subject for Job Connect After Purchase Declined', 'service-finder' ),
    'desc' => "%USERNAME%,%PLANNAME%,%PAYMENTMETHOD%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html($customerreplacestring).' '.esc_html__( 'Buy Job Post Connects', 'service-finder' ),
    'id'               => 'jobpost-connect-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'jobpost-connect-purchase-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Job Post Connect After Purchase', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ), 
	array(
    'id'      => 'jobpost-connect-purchase-message',
    'type'    => 'editor',
    'title'   => esc_html__( 'Subject for Job Post Connect After Purchase', 'service-finder' ),
    'desc' => "%USERNAME%,%PLANNAME%,%PAYMENTMETHOD%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'jobpost-connect-purchase-declined-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Job Post Connect After Purchase Declined', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ), 
	array(
    'id'      => 'jobpost-connect-purchase-declined-message',
    'type'    => 'editor',
    'title'   => esc_html__( 'Subject for Job Post Connect After Purchase Declined', 'service-finder' ),
    'desc' => "%USERNAME%,%PLANNAME%,%PAYMENTMETHOD%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Job Assign to Member Mail', 'service-finder' ),
    'id'               => 'job-assign-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'job-assign-to-member-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Mail Send to Member', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ), 
	array(
    'id'      => 'job-assign-to-member',
    'type'    => 'editor',
    'title'   => esc_html__( 'Mail Send to Member', 'service-finder' ),
    'desc' => "Keywords: %DATE%, %STARTTIME%, %ENDTIME%, %MEMBERNAME%, %PROVIDERNAME%, %PROVIDEREMAIL%, %PROVIDERPHONE%, %CUSTOMERNAME%, %CUSTOMEREMAIL%, %CUSTOMERPHONE%, %CUSTOMERPHONE2%, %ADDRESS%, %APT%, %CITY%, %STATE%, %ZIPCODE%, %COUNTRY%, %PAYMENTMETHOD%, %AMOUNT%, %SERVICES%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Identity Check Mail', 'service-finder' ),
    'id'               => 'identity-check-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'identity-upload-mail-subject',
    'type'     => 'text',
    'title'    => esc_html__('Subject for Identity Upload Mail to Admin', 'service-finder'),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'identity-upload-mail',
    'type'    => 'editor',
    'title'   => esc_html__( 'Identity Upload Mail to Admin', 'service-finder' ),
    'desc' => "",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'identity-approve-mail-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Identity Approve Mail to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'identity-approve-mail',
    'type'    => 'editor',
    'title'   => esc_html__( 'Identity Approve Mail to', 'service-finder' ).' '.esc_html($providerreplacestring),
    'desc' => "",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'identity-unapprove-mail-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Identity UnApprove Mail to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'identity-unapprove-mail',
    'type'    => 'editor',
    'title'   => esc_html__( 'Identity UnApprove Mail to', 'service-finder' ).' '.esc_html($providerreplacestring),
    'desc' => "",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
    Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Request a Quote Mail', 'service-finder' ),
    'id'               => 'quote-mail-settings',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'quote-to-provider-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Request a Quote Mail Send to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'quote-to-provider',
    'type'    => 'editor',
    'title'   => esc_html__( 'Request a Quote Mail Send to', 'service-finder' ).' '.esc_html($providerreplacestring),
    'desc' => "Keywords: %CUSTOMERNAME%,%EMAIL%,%PHONE%,%DESCRIPTION%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'quote-to-admin-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Request a Quote Mail Send to Admin', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'quote-to-admin',
    'type'    => 'editor',
    'title'   => esc_html__( 'Request a Quote Mail Send to Admin', 'service-finder' ),
    'desc' => "Keywords: %PROVIDERNAME%,%PROVIDEREMAIL%,%CUSTOMERNAME%,%EMAIL%,%PHONE%,%DESCRIPTION%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'quotation-reply-message-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Quote Reply Mail Send to %s', 'service-finder'), $customerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'quotation-reply-message',
    'type'    => 'editor',
    'title'   => esc_html__( 'Quote Reply Mail Send to', 'service-finder' ).' '.esc_html($customerreplacestring),
    'desc' => "Keywords: %PROVIDERNAME%,%QUOTEID%,%QUOTEPRICE%,%REPLY%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Question/Answer Mail', 'service-finder' ),
    'id'               => 'question-answer-mail-settings',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'question-submit-to-provider-subject',
    'type'     => 'text',
    'title'    => sprintf( esc_html__('Subject for Question Submitted to %s', 'service-finder'), $providerreplacestring ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'question-submit-to-provider',
    'type'    => 'editor',
    'title'   => esc_html__( 'Question Submitted Mail Send to', 'service-finder' ).' '.esc_html($providerreplacestring),
	'desc'    => "Keywords: %QUESTIONTITLE%,%REPLYLINK%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'answer-submit-to-user-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Answer Submitted to Question Author', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'answer-submit-to-user',
    'type'    => 'editor',
    'title'   => esc_html__( 'Answer Submitted to Question Author', 'service-finder' ),
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Claim Business Mail', 'service-finder' ),
    'id'               => 'claim-business-mail-settings',
    'subsection'       => true,
	'customizer'           => false,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
	array(
    'id'       => 'claimbusiness-to-admin-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Claim Business Send to Admin', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'claimbusiness-to-admin',
    'type'    => 'editor',
    'title'   => esc_html__( 'Claim Business Mail Send to Admin', 'service-finder' ),
    'desc' => "Keywords: %PROVIDERNAME%,%PROVIDEREMAIL%,%PROVIDERPROFILELINK%,%CUSTOMERNAME%,%EMAIL%,%DESCRIPTION%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'approve-claim-free-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Free Approve Claim Business Send to User', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'approve-claim-free',
    'type'    => 'editor',
    'title'   => esc_html__( 'Free Approve Claim Business Mail Send to User', 'service-finder' ),
    'desc' => "Keywords: %USERNAME%,%PASSWORD%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'approve-claim-paid-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Paid Approve Claim Business Send to User', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'approve-claim-paid',
    'type'    => 'editor',
    'title'   => esc_html__( 'Paid Approve Claim Business Mail Send to User', 'service-finder' ),
    'desc' => "Keywords: %PROVIDERNAME%,%PROVIDERPROFILELINK%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'after-claimedpayment-subject-user',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for After Claimed to User', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'after-claimedpayment-message-user',
    'type'    => 'editor',
    'title'   => esc_html__( 'After Claimed Payment Mail Send to User', 'service-finder' ),
    'desc' => "Keywords: %USERNAME%,%PASSWORD%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'after-claimedpayment-subject-admin',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for After Claimed to Admin', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'after-claimedpayment-message-admin',
    'type'    => 'editor',
    'title'   => esc_html__( 'After Claimed Payment Mail Send to Admin', 'service-finder' ),
    'desc' => "Keywords: %USERNAME%,%EMAIL%,%PACKAGENAME%,%PAYMENTTYPE%,%CUSTOMERNAME%,%CUSTOMEREMAIL%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
	array(
    'id'       => 'decline-claim-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Decline Claim Business Send to User', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ),
	array(
    'id'      => 'decline-claim',
    'type'    => 'editor',
    'title'   => esc_html__( 'Decline Claim Business Mail Send to User', 'service-finder' ),
    'desc' => "Keywords: %PROVIDERNAME%,%PROVIDEREMAIL%,%PROVIDERPROFILELINK%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html($customerreplacestring).' '.esc_html__( 'Forgot Password Email', 'service-finder' ),
    'id'               => 'password-reset-mail-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'password-reset-to-customer-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Forgot Password Mail Send to', 'service-finder' ).' '.esc_html($customerreplacestring),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ), 
	array(
    'id'      => 'password-reset-to-customer',
    'type'    => 'editor',
    'title'   => esc_html__( 'Forgot Password Mail Send to', 'service-finder' ).' '.esc_html($customerreplacestring),
    'desc' => "Keywords: %USERNAME%,%PASSWORDRESETLINK%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
	Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Password Reset Mail', 'service-finder' ),
    'id'               => 'password-reset-settings',
	'customizer'           => false,
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => '',
    'fields'           => array(
    array(
    'id'       => 'password-reset-subject',
    'type'     => 'text',
    'title'    => esc_html__( 'Subject for Password Reset Mail', 'service-finder' ),
    'subtitle' => '',
    'desc'     => '',
    'default'  => ''
    ), 
	array(
    'id'      => 'password-reset-mail',
    'type'    => 'editor',
    'title'   => esc_html__( 'Password Reset Mail', 'service-finder' ),
    'desc' => "Keywords: %USERNAME%,%EMAIL%,%RESETLINK%",
    'default' => '',
    'args'    => array(
    'wpautop'       => false,
    'media_buttons' => false,
    'textarea_rows' => 5,
    'teeny'         => false,
    'quicktags'     => true,
    )
    ),
    )
    ) );
    
    if ( file_exists( plugin_dir_path( __FILE__ ) . '/../README.md' ) ) {
    $section = array(
    'icon'   => 'el el-list-alt',
    'title'  => esc_html__( 'Documentation', 'service-finder' ),
    'fields' => array(
    array(
    'id'       => '17',
    'type'     => 'raw',
    'markdown' => true,
    'content_path' => plugin_dir_path( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
    ),
    ),
    );
    Redux::setSection( $opt_name, $section );
    }
    /*
    * <--- END SECTIONS
    */
    
    
    add_filter('redux/options/' . $opt_name . '/settings/change', 'service_finder_save_action', 10, 3);
    
    if ( ! function_exists( 'service_finder_save_action' ) ) {
    function service_finder_save_action( $values ) {
		if ( function_exists( 'service_finder_jamming_rules' ) ) {
			if(service_finder_jamming_rules()){
				if ( function_exists( 'service_finder_generate_options_css' ) ) {
				/*Re-Generate style.css file*/
				service_finder_generate_options_css($values);
				}
				
				if ( function_exists( 'service_finder_createPlans' ) ) {
				/*Plans create for stripe*/
				service_finder_createPlans($values);
				}
			}
		}
    
    }
    }
    
    
    /*
    *
    * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
    *
    */
    
    /*
    *
    * --> Action hook examples
    *
    */
    
    /**
    * This is a test function that will let you see when the compiler hook occurs.
    * It only runs if a field    set with compiler=>true is changed.
    * */
    if ( ! function_exists( 'compiler_action' ) ) {
    function compiler_action( $options, $css, $changed_values ) {
    echo '
<h1>The compiler hook has run!</h1>
';
    }
    }
    
    /**
    * Custom function for the callback validation referenced above
    * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
    function redux_validate_callback_function( $field, $value, $existing_value ) {
    $error   = false;
    $warning = false;
    
    //do your validation
    if ( $value == 1 ) {
    $error = true;
    $value = $existing_value;
    } elseif ( $value == 2 ) {
    $warning = true;
    $value   = $existing_value;
    }
    
    $return['value'] = $value;
    
    if ( $error == true ) {
    $return['error'] = $field;
    $field['msg']    = 'your custom error message';
    }
    
    if ( $warning == true ) {
    $return['warning'] = $field;
    $field['msg']      = 'your custom warning message';
    }
    
    return $return;
    }
    }
    
    /**
    * Custom function for the callback referenced above
    */
    if ( ! function_exists( 'custom_flush_cache' ) ) {
    function custom_flush_cache( $field, $value ) {
    echo '<a href="'.admin_url('/admin.php?page=ServiceFinder&flushcache=true').'" class="button flush-cache">'.esc_html__( 'Flush CSS Cache', 'service-finder' ).'</a><br/>';
	echo '<div class="description field-desc">'.esc_html__( 'Remove css cache file from theme to update css changes when using minify css.', 'service-finder' ).'</div>';
    }
    }
	
	$flushcache = isset($_GET['flushcache']) ? esc_html($_GET['flushcache']) : '';
	if($flushcache){
		$cachedir = get_template_directory().'/inc/caches/';
		service_finder_delete_css_cache($cachedir);
		add_action( 'admin_notices', 'custom_flush_cache_admin_notice' );
	}
	
	function custom_flush_cache_admin_notice() {
		?>
		<div class="notice notice-success is-dismissible">
			<p><?php echo esc_html__( 'Css cache flushed successfully.', 'service-finder' ) ?></p>
		</div>
		<?php
	}
	
    
    /**
    * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
    * Simply include this function in the child themes functions.php file.
    * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
    * so you must use get_template_directory_uri() if you want to use any of the built in icons
    * */
    if ( ! function_exists( 'dynamic_section' ) ) {
    function dynamic_section( $sections ) {
    $sections[] = array(
    'title'  => esc_html__( 'Section via hook', 'service-finder' ),
    'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>
', 'service-finder' ),
    'icon'   => 'el el-paper-clip',
    // Leave this as a blank section, no options just some intro text set above.
    'fields' => array()
    );
    
    return $sections;
    }
    }
    
    /**

    * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
    * */
    if ( ! function_exists( 'change_arguments' ) ) {
    function change_arguments( $args ) {
    //$args['dev_mode'] = true;
    
    return $args;
    }
    }
    
    /**
    * Filter hook for filtering the default value of any given field. Very useful in development mode.
    * */
    if ( ! function_exists( 'change_defaults' ) ) {
    function change_defaults( $defaults ) {
    $defaults['str_replace'] = 'Testing filter hook!';
    
    return $defaults;
    }
    }
    

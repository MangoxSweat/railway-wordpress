<?php

/*****************************************************************************

*

*	copyright(c) - aonetheme.com - Service Finder Team

*	More Info: http://aonetheme.com/

*	Coder: Service Finder Team

*	Email: contact@aonetheme.com

*

******************************************************************************/

//Footer Layout

function service_finder_footer_layout(){

global $service_finder_globals, $service_finder_ThemeParams;

$service_finder_options = $service_finder_globals;

if(!empty($service_finder_options['footer-bg-image']['url'])){

$footerbg = 'style="background-image:url('.esc_url($service_finder_options['footer-bg-image']['url']).')"';

}else{

$footerbg = '';

} ?>

<?php

$showfooter = (!empty($service_finder_options['show-footer'])) ? $service_finder_options['show-footer'] : '';

$showbottomfooter = (!empty($service_finder_options['show-bottom-footer'])) ? $service_finder_options['show-bottom-footer'] : '';

$footerlayout = (!empty($service_finder_options['footer-layout'])) ? $service_finder_options['footer-layout'] : 'col-4';

?>

<footer id="footer" <?php echo (service_finder_themestyle_fortheme() == 'style-3') ? 'class="sf-footer-light sf-footer-bottom-line"' : ''; ?> <?php echo wp_kses_post($footerbg); ?>>

  <?php if($showfooter || !class_exists( 'ReduxFrameworkPlugin' )):?>

  <div class="footer-top sf-top-footer-overlay">

    <div class="container">

      <div class="row">

        <?php if($footerlayout == 'col-4' || !class_exists( 'ReduxFrameworkPlugin' )){ ?>

        <!-- 4 Colomn footer -->

        <div class="col-md-3 col-sm-3 col-xs-6 footer-4-col">

          <?php 

		  if ( is_active_sidebar( 'sf-sidebar-footer-1' ) ) {

		  	dynamic_sidebar('sf-sidebar-footer-1');

		  }

		  ?>

        </div>

        <div class="col-md-3 col-sm-3 col-xs-6 footer-4-col">

          <?php 

		  if ( is_active_sidebar( 'sf-sidebar-footer-2' ) ) {

		  	dynamic_sidebar('sf-sidebar-footer-2');

		  }

		  ?>

        </div>

        <div class="footer-clear default-hidden"></div>

        <div class="col-md-3 col-sm-3 col-xs-6 footer-4-col">

          <?php 

		  if ( is_active_sidebar( 'sf-sidebar-footer-3' ) ) {

		  	dynamic_sidebar('sf-sidebar-footer-3');

		  }

		  ?>

        </div>

        <div class="col-md-3 col-sm-3 col-xs-6 footer-4-col">

          <?php 

		  if ( is_active_sidebar( 'sf-sidebar-footer-4' ) ) {

		  	dynamic_sidebar('sf-sidebar-footer-4');

		  }

		  ?>

        </div>

        <?php }elseif($footerlayout == 'col-3'){ ?>

        <!-- 3 Colomn footer -->

        <div class="col-md-4 col-sm-4 col-xs-4 footer-3-col">

          <?php 

		  if ( is_active_sidebar( 'sf-sidebar-footer-1' ) ) {

		  	dynamic_sidebar('sf-sidebar-footer-1');

		  }

		  ?>

        </div>

        <div class="col-md-4 col-sm-4 col-xs-4 footer-3-col">

          <?php 

		  if ( is_active_sidebar( 'sf-sidebar-footer-2' ) ) {

		  	dynamic_sidebar('sf-sidebar-footer-2');

		  }

		  ?>

        </div>

        <div class="col-md-4 col-sm-4 col-xs-4 footer-3-col">

          <?php 

		  if ( is_active_sidebar( 'sf-sidebar-footer-3' ) ) {

		  	dynamic_sidebar('sf-sidebar-footer-3');

		  }

		  ?>

        </div>

        <?php }elseif($footerlayout == 'col-2-1'){ ?>

        <!-- 2-1 Colomn footer -->

        <div class="col-md-3 col-sm-3 col-xs-6 footer-2-1-col">

          <?php 

		  if ( is_active_sidebar( 'sf-sidebar-footer-1' ) ) {

		  	dynamic_sidebar('sf-sidebar-footer-1');

		  }

		  ?>

        </div>

        <div class="col-md-3 col-sm-3 col-xs-6 footer-2-1-col">

          <?php 

		  if ( is_active_sidebar( 'sf-sidebar-footer-2' ) ) {

		  	dynamic_sidebar('sf-sidebar-footer-2');

		  }

		  ?>

        </div>

        <div class="col-md-6 col-sm-6 col-xs-6 footer-2-1-col">

          <?php 

		  if ( is_active_sidebar( 'sf-sidebar-footer-3' ) ) {

		  	dynamic_sidebar('sf-sidebar-footer-3');

		  }

		  ?>

        </div>

        <?php }elseif($footerlayout == 'col-2'){ ?>

        <!-- 2 Colomn footer -->

        <div class="col-md-6 col-sm-6 col-xs-6 footer-2-col">

          <?php 

		  if ( is_active_sidebar( 'sf-sidebar-footer-1' ) ) {

		  	dynamic_sidebar('sf-sidebar-footer-1');

		  }

		  ?>

        </div>

        <div class="col-md-6 col-sm-6 col-xs-6 footer-2-col">

          <?php 

		  if ( is_active_sidebar( 'sf-sidebar-footer-2' ) ) {

		  	dynamic_sidebar('sf-sidebar-footer-2');

		  }

		  ?>

        </div>

        <?php }elseif($footerlayout == 'col-1'){ ?>

        <!-- 1 Colomn footer -->

        <div class="col-md-12 col-sm-12 col-xs-6 footer-1-col">

          <?php 

		  if ( is_active_sidebar( 'sf-sidebar-footer-1' ) ) {

		  	dynamic_sidebar('sf-sidebar-footer-1');

		  }

		  ?>

        </div>

        <?php }elseif($footerlayout == 'col-1-3'){ ?>

        <!-- 1-3 Colomn footer -->

        <div class="col-md-3 col-sm-3 col-xs-6 footer-1-3-col">

          <?php 

		  if ( is_active_sidebar( 'sf-sidebar-footer-1' ) ) {

		  	dynamic_sidebar('sf-sidebar-footer-1');

		  }

		  ?>

        </div>

        <div class="col-md-9 col-sm-9 col-xs-6 footer-1-3-col">

          <?php 

		  if ( is_active_sidebar( 'sf-sidebar-footer-2' ) ) {

		  	dynamic_sidebar('sf-sidebar-footer-2');

		  }

		  ?>

        </div>

        <?php } ?>

      </div>

    </div>

  </div>

  <?php endif; ?>

  <?php if($showbottomfooter || !class_exists( 'ReduxFrameworkPlugin' )):?>

  <?php if(service_finder_themestyle_fortheme() == 'style-3'){ ?>

  <div class="sf-footer-divider-wrap">

      <div class="container">

          <div class="sf-footer-divider-line"></div>

      </div>

  </div>

  <?php } ?>  

  <?php if(service_finder_themestyle_fortheme() == 'style-4'){ ?>
  <div class="sf-footer-bottom footer-bottom">
        <div class="container">
            <div class="sf-footer-bottom-section">
                <div class="sf-f-logo logo-footer">
                <a href="<?php echo esc_url($service_finder_ThemeParams['homeUrl']); ?>"><?php if(!empty($service_finder_options['footer-logo']['url'])){ ?> <img src="<?php echo esc_url($service_finder_options['footer-logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>"> <?php }else{ echo get_bloginfo('name'); }?></a>
                </div>
                <div class="sf-f-copyright">
                    <?php if(class_exists( 'ReduxFrameworkPlugin' )) { ?>

					  <?php if($service_finder_options['show-copyright']):?>
            
                      <span><?php
            
                      if(!empty($service_finder_options['copyright']))
            
                      {
            
                        print_r($service_finder_options['copyright']);
            
                      }else{
            
                        printf(esc_html__('Copyright %s | All Rights Reserved','service-finder'),date('Y'));
            
                      }
            
                      ?></span>
            
                      <?php endif; ?>
            
                      <?php }else{ ?>
            
                      <span><?php printf(esc_html__('Copyright %s | All Rights Reserved','service-finder'),date('Y')); ?></span>
            
                      <?php } ?>
                </div>
               
                <div class="sf-f-social">
                    <ul class="socila-box">
                        <?php echo (!empty($service_finder_options['fb-link'])) ? '<li><a href="'.esc_url($service_finder_options['fb-link']).'" class="fa fa-facebook" target="_blank"></a></li>' : ''; ?> 

						<?php echo (!empty($service_finder_options['linkedin-link'])) ? '<li><a href="'.esc_url($service_finder_options['linkedin-link']).'" class="fa fa-linkedin" target="_blank"></a></li>' : ''; ?> 
            
                        <?php echo (!empty($service_finder_options['twitter-link'])) ? '<li><a href="'.esc_url($service_finder_options['twitter-link']).'" class="fa fa-twitter" target="_blank"></a></li>' : ''; ?> 
            
                        <?php echo (!empty($service_finder_options['pinterest-link'])) ? '<li><a href="'.esc_url($service_finder_options['pinterest-link']).'" class="fa fa-pinterest" target="_blank"></a></li>' : ''; ?> 
            
                        <?php echo (!empty($service_finder_options['delicious-link'])) ? '<li><a href="'.esc_url($service_finder_options['delicious-link']).'" class="fa fa-delicious" target="_blank"></a></li>' : ''; ?> 
            
                        <?php echo (!empty($service_finder_options['digg-link'])) ? '<li><a href="'.esc_url($service_finder_options['digg-link']).'" class="fa fa-digg" target="_blank"></a></li>' : ''; ?> 
            
                        <?php echo (!empty($service_finder_options['flickr-link'])) ? '<li><a href="'.esc_url($service_finder_options['flickr-link']).'" class="fa fa-flickr" target="_blank"></a></li>' : ''; ?>
            
                        <?php echo (!empty($service_finder_options['instagram-link'])) ? '<li><a href="'.esc_url($service_finder_options['instagram-link']).'" class="fa fa-instagram" target="_blank"></a></li>' : ''; ?>
            
                        <?php echo (!empty($service_finder_options['youtube-link'])) ? '<li><a href="'.esc_url($service_finder_options['youtube-link']).'" class="fa fa-youtube" target="_blank"></a></li>' : ''; ?>
                    </ul>
                </div>
                
            </div>
        </div>
  </div>
  <?php }else{ ?>
  <!-- Footer bottom start -->

  <div class="footer-bottom sf-bottom-footer-overlay">

    <div class="container">

      <div class="row">

        <div class="col-md-6 col-sm-6 col-xs-6 ">

		  <?php if(class_exists( 'ReduxFrameworkPlugin' )) { ?>

		  <?php if($service_finder_options['show-copyright']):?>

          <span><?php

		  if(!empty($service_finder_options['copyright']))

		  {

		  	print_r($service_finder_options['copyright']);

		  }else{

		  	printf(esc_html__('Copyright %s | All Rights Reserved','service-finder'),date('Y'));

		  }

		  ?></span>

          <?php endif; ?>

          <?php }else{ ?>

          <span><?php printf(esc_html__('Copyright %s | All Rights Reserved','service-finder'),date('Y')); ?></span>

          <?php } ?>

        </div>

        <div class="col-md-6 col-sm-6 col-xs-6">

          <ul class=" socila-box list-inline pull-right">

            <?php echo (!empty($service_finder_options['fb-link'])) ? '<li><a href="'.esc_url($service_finder_options['fb-link']).'" class="fa fa-facebook" target="_blank"></a></li>' : ''; ?> 

			<?php echo (!empty($service_finder_options['linkedin-link'])) ? '<li><a href="'.esc_url($service_finder_options['linkedin-link']).'" class="fa fa-linkedin" target="_blank"></a></li>' : ''; ?> 

			<?php echo (!empty($service_finder_options['twitter-link'])) ? '<li><a href="'.esc_url($service_finder_options['twitter-link']).'" class="fa fa-twitter" target="_blank"></a></li>' : ''; ?> 

			<?php echo (!empty($service_finder_options['pinterest-link'])) ? '<li><a href="'.esc_url($service_finder_options['pinterest-link']).'" class="fa fa-pinterest" target="_blank"></a></li>' : ''; ?> 

			<?php echo (!empty($service_finder_options['delicious-link'])) ? '<li><a href="'.esc_url($service_finder_options['delicious-link']).'" class="fa fa-delicious" target="_blank"></a></li>' : ''; ?> 

			<?php echo (!empty($service_finder_options['digg-link'])) ? '<li><a href="'.esc_url($service_finder_options['digg-link']).'" class="fa fa-digg" target="_blank"></a></li>' : ''; ?> 

			<?php echo (!empty($service_finder_options['flickr-link'])) ? '<li><a href="'.esc_url($service_finder_options['flickr-link']).'" class="fa fa-flickr" target="_blank"></a></li>' : ''; ?>

            <?php echo (!empty($service_finder_options['instagram-link'])) ? '<li><a href="'.esc_url($service_finder_options['instagram-link']).'" class="fa fa-instagram" target="_blank"></a></li>' : ''; ?>

            <?php echo (!empty($service_finder_options['youtube-link'])) ? '<li><a href="'.esc_url($service_finder_options['youtube-link']).'" class="fa fa-youtube" target="_blank"></a></li>' : ''; ?>

          </ul>

        </div>

      </div>

    </div>

  </div>
  <?php } ?>

  <!-- Footer bottom end -->

  <?php endif; ?>

  <button class="scroltop fa fa-arrow-up" ></button>

</footer>

<?php

}



//Header layout

function service_finder_header_layout(){

global $service_finder_globals, $service_finder_ThemeParams, $author;

$service_finder_options = $service_finder_globals;



if(is_author()){

if ( function_exists( 'service_finder_getProviderSettings' ) ){

$settings = service_finder_getProviderSettings($author);

$userCap = service_finder_get_capability($author);

}

}



$loginsignuppopup = (!empty($service_finder_options['login-signup-popup'])) ? $service_finder_options['login-signup-popup'] : '';



$service_finder_MenuLocation = 'primary';



$menuArgs = array(



		'theme_location'  => $service_finder_MenuLocation,

		

		'menu_class'      => 'nav navbar-nav',

		

		'menu_id'       => 'primary-menu',

		

		'container'       => '',

		

		);

	

$current_user = wp_get_current_user(); 

$headertemplates = (!empty($service_finder_options['header-templates'])) ? $service_finder_options['header-templates'] : ''; 

$topbar = (!empty($service_finder_options['top-bar'])) ? $service_finder_options['top-bar'] : ''; 

			$class2 = '';

            if(is_home() || is_front_page()){

				if(class_exists( 'ReduxFrameworkPlugin' )) {

					if($headertemplates == 'classic' && $topbar){

							$class = 'header-style1'; 

					}elseif($headertemplates == 'center-mode' && $topbar){

							$class = 'header-style2'; 

					}elseif($headertemplates == 'transperent' && $topbar){

							$class = 'header-style3'; 

							$class2 = 'transparent-bg';

					}elseif($headertemplates == 'overlay-white' && $topbar){

							$class = 'header-style4'; 

							$class2 = 'overlay-bg-white';

					}elseif($headertemplates == 'overlay-black' && $topbar){

							$class = 'header-style5'; 

							$class2 = 'overlay-bg-black';

					}elseif($headertemplates == 'transperent-no-top-bar'){

							$class = 'header-style7'; 

					}elseif($headertemplates == 'no-top-bar' || !$topbar){

							$class = 'header-style6'; 

					}

				}else{

					$class = 'header-style1';

				}

				

			}else{

				if(class_exists( 'ReduxFrameworkPlugin' )) {

					if(($headertemplates == 'classic' || $headertemplates == 'transperent' || $headertemplates == 'overlay-white' || $headertemplates == 'overlay-black') && $topbar){

								$class = 'header-style1';

					}elseif($headertemplates == 'center-mode' && $topbar){

							$class = 'header-style2'; 

					}elseif($headertemplates == 'no-top-bar' || !$topbar){

								$class = 'header-style6';

					}elseif($headertemplates == 'transperent-no-top-bar'){

								$class = 'header-style6';

					}

				}else{

					$class = 'header-style1';

				}	

				

			}

$headerfullwidth = (!empty($service_finder_options['header-full-width'])) ? esc_html($service_finder_options['header-full-width']) : '';

$fullwidth = ($headerfullwidth) ? 'sf-header-full-width' : '';

$headermenuslideposition = (!empty($service_finder_options['header-menu-slide-position'])) ? $service_finder_options['header-menu-slide-position'] : ''; 

$slideposition = ($headermenuslideposition == 'left') ? 'left-nav-wrap' : '';



if(is_home() || is_front_page()){

$innerheaderclass = 'sf-header-home';

}else{

$innerheaderclass = 'sf-header-inner';

}

?>

<header id="header-part" class="mostion clearfix <?php echo sanitize_html_class($class); ?> <?php echo sanitize_html_class($class2); ?> <?php echo sanitize_html_class($innerheaderclass); ?> <?php echo sanitize_html_class($fullwidth); ?> <?php echo sanitize_html_class($slideposition); ?>">



  <?php if(($headertemplates != 'no-top-bar' && $topbar && $headertemplates != 'transperent-no-top-bar') || !class_exists( 'ReduxFrameworkPlugin' )):?>

  <!-- Display this section when no top bar selected -->

  <div class="top-bar">

    <div class="container">

      <div class="row">

      <?php 

	  $email = isset($service_finder_options['email']) ? $service_finder_options['email'] : '';

	  $phone = isset($service_finder_options['phone']) ? $service_finder_options['phone'] : '';

	  $colwidth = 12;

	  if($email != "" || $phone != ""){

	  $colwidth = 6;

	  ?>

        <div class="col-md-6 col-sm-6  col-xs-6">

          <ul class="list-unstyled e-p-bx">

            <li><a href="mailto:<?php echo esc_attr($service_finder_options['email']) ?>"><?php echo (!empty($service_finder_options['email'])) ? '<i class="fa fa-envelope"></i>'.$service_finder_options['email'] : ''; ?></a></li>

            <li><a href="tel:<?php echo esc_attr($service_finder_options['phone']) ?>"><?php echo (!empty($service_finder_options['phone'])) ? '<i class="fa fa-phone"></i>'.$service_finder_options['phone'] : ''; ?></a></li>

          </ul>

        </div>

        <?php } ?>

        <div class="col-md-<?php echo esc_attr($colwidth); ?> col-sm-<?php echo esc_attr($colwidth); ?>  col-xs-<?php echo esc_attr($colwidth); ?>">

          <ul class="login-bx  list-inline fs-customer-status">

            <?php if(is_user_logged_in()){

						  $fullname = get_user_meta($current_user->ID,'first_name',true).' '.get_user_meta($current_user->ID,'last_name',true);

						  if($fullname == ' ' || $fullname == ''){

						  $fullname = ucfirst($current_user->display_name);

						  }

						  if ( function_exists( 'service_finder_UserRole' ) ) {

						  if(service_finder_UserRole($current_user->ID) == 'administrator'){

							$accounturl = admin_url( 'profile.php' );

						  }else{

						  	if ( function_exists( 'service_finder_get_url_by_shortcode' ) ) {

						  	$accounturl = service_finder_get_url_by_shortcode('[service_finder_my_account]');

							}else{

							$accounturl = service_finder_get_url_by_shortcodefortheme('[service_finder_my_account]');

							}

						  }

						  }

						  ?>

            <li> <i class="fa fa-user"></i>

              <?php 

						if ( function_exists( 'service_finder_UserRole' ) ) {

						if(service_finder_UserRole($current_user->ID) == 'Customer'){ 

						echo '<a href="'.esc_url($accounturl).'" data-delay="1000" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false">'.$fullname.'<b class="caret"></b></a>';

						$myaccount = $accounturl;

						if(get_option('permalink_structure')){

						$myaccount = $myaccount.'?';

						}else{

						$myaccount = $myaccount.'&';

						}

						?>

              <?php service_finder_customer_menu_items(); ?>

              <?php }else{

						   echo '<a href="'.esc_url($accounturl).'">'.$fullname.'</a>';

						   } 

						   }

						   ?>

            </li>

            	<li>

    	          <a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>">

              		<i class="fa fa-sign-out"></i> <?php esc_html_e('Logout', 'service-finder'); ?>

	              </a>

                </li>

            <?php

						  }else{

						  $loginsignuppopup = (!empty($service_finder_options['login-signup-popup'])) ? $service_finder_options['login-signup-popup'] : '';

						  if($loginsignuppopup){

						  ?>

							<?php if(class_exists('service_finder_booking_plugin')) {?>
                
                            <li><i class="fa fa-user"></i><a href="javascript:void(0);" data-action="login" data-redirect="yes" data-toggle="modal" data-target="#login-Modal">
                
                              <?php esc_html_e('Login', 'service-finder'); ?>
                
                              </a></li>
                
                            <li><i class="fa fa-plus"></i><a href="javascript:void(0);" data-action="signup" data-redirect="yes" data-toggle="modal" data-target="#login-Modal">
                
                              <?php esc_html_e('Sign up', 'service-finder'); ?>
                
                              </a></li>
                
                              
                
                            <?php
                
                            }

						  }

						  }?>

          </ul>

          <?php 

		  if(class_exists('aone_messaging')){

		  echo do_shortcode( '[service_finder_message_notification]');

		  }

		  if(class_exists('service_finder_booking_plugin')){

		  echo do_shortcode( '[service_finder_notification_bar]');

		  }

		  ?>

          <ul class="social-bx list-inline">

            <?php echo (!empty($service_finder_options['fb-link'])) ? '<li><a href="'.esc_url($service_finder_options['fb-link']).'" class="fa fa-facebook"  rel="nofollow" target="_blank"></a></li>' : ''; ?> 

			<?php echo (!empty($service_finder_options['linkedin-link'])) ? '<li><a href="'.esc_url($service_finder_options['linkedin-link']).'"  rel="nofollow" class="fa fa-linkedin" target="_blank"></a></li>' : ''; ?> 

			<?php echo (!empty($service_finder_options['twitter-link'])) ? '<li><a href="'.esc_url($service_finder_options['twitter-link']).'"  rel="nofollow" class="fa fa-twitter" target="_blank"></a></li>' : ''; ?> 

			<?php echo (!empty($service_finder_options['pinterest-link'])) ? '<li><a href="'.esc_url($service_finder_options['pinterest-link']).'"  rel="nofollow" class="fa fa-pinterest" target="_blank"></a></li>' : ''; ?> 

			<?php echo (!empty($service_finder_options['delicious-link'])) ? '<li><a href="'.esc_url($service_finder_options['delicious-link']).'"  rel="nofollow" class="fa fa-delicious" target="_blank"></a></li>' : ''; ?> 

			<?php echo (!empty($service_finder_options['digg-link'])) ? '<li><a href="'.esc_url($service_finder_options['digg-link']).'"  rel="nofollow" class="fa fa-digg" target="_blank"></a></li>' : ''; ?> 

			<?php echo (!empty($service_finder_options['flickr-link'])) ? '<li><a href="'.esc_url($service_finder_options['flickr-link']).'"  rel="nofollow" class="fa fa-flickr" target="_blank"></a></li>' : ''; ?>

            <?php echo (!empty($service_finder_options['instagram-link'])) ? '<li><a href="'.esc_url($service_finder_options['instagram-link']).'"  rel="nofollow" class="fa fa-instagram" target="_blank"></a></li>' : ''; ?>

            <?php echo (!empty($service_finder_options['youtube-link'])) ? '<li><a href="'.esc_url($service_finder_options['youtube-link']).'" class="fa fa-youtube" target="_blank"></a></li>' : ''; ?>

          </ul>

        </div>

      </div>

    </div>

    <div class="curve-box"></div>

  </div>

  <?php endif; ?>

  <?php if(is_home() || is_front_page()){ ?>

<?php 

$headertemplates = (!empty($service_finder_options['header-templates'])) ? $service_finder_options['header-templates'] : ''; 

$topbar = (!empty($service_finder_options['top-bar'])) ? $service_finder_options['top-bar'] : ''; 

?>



  <?php if(($headertemplates == 'classic' && $topbar) || !class_exists( 'ReduxFrameworkPlugin' )){ ?>

  <!-- Classic header style start -->

  <div class="main-bar clearfix">

    <div class="container">

      <div class="logo-header mostion"><div class="logo-header-inr"><a href="<?php echo esc_url($service_finder_ThemeParams['homeUrl']); ?>"><?php if(!empty($service_finder_options['site-logo']['url'])){ ?> <img src="<?php echo esc_url($service_finder_options['site-logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>"> <?php }else{ echo get_bloginfo('name'); }?></a></div></div>

      <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed nav-top-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <button type="button" class="navbar-toggle nav-left-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <?php 

	  $headermenuslideposition = (!empty($service_finder_options['header-menu-slide-position'])) ? $service_finder_options['header-menu-slide-position'] : ''; 

	  $slideposition = ($headermenuslideposition == 'left') ? 'header-nav-left' : '';

	  ?>

      <div class="header-nav navbar-collapse collapse <?php echo sanitize_html_class($slideposition); ?>">

        <?php 

		if (has_nav_menu($service_finder_MenuLocation)) {

		wp_nav_menu( $menuArgs);

		}

		?>

      </div>

      <div class="body-overlay" style="display: none;"></div>

    </div>

  </div>

  <!-- Classic header style end -->

  <?php }elseif($headertemplates == 'center-mode' && $topbar){ ?>

  <!-- Center mode header style start -->

  <div class="main-bar">

    <div class="container">

      <div class="logo-header center-block"><a href="<?php echo esc_url($service_finder_ThemeParams['homeUrl']); ?>"><?php if(!empty($service_finder_options['site-logo']['url'])){ ?> <img src="<?php echo esc_url($service_finder_options['site-logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>"> <?php }else{ echo get_bloginfo('name'); }?></a></div>

      <div class="nav-outer center-block">

        <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed nav-top-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <button type="button" class="navbar-toggle nav-left-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

  

        <?php 

		  $headermenuslideposition = (!empty($service_finder_options['header-menu-slide-position'])) ? $service_finder_options['header-menu-slide-position'] : ''; 

		  $slideposition = ($headermenuslideposition == 'left') ? 'header-nav-left' : '';

		  ?>

		  <div class="header-nav navbar-collapse collapse <?php echo sanitize_html_class($slideposition); ?>">

          <?php 

			if (has_nav_menu($service_finder_MenuLocation)) {

			wp_nav_menu( $menuArgs);

			}

			?>

      </div>

      <div class="body-overlay" style="display: none;"></div>

    </div>

  </div>

  <!-- Center mode header style end -->

  <?php }elseif($headertemplates == 'transperent' && $topbar){ ?>

  <!-- Transparent header style start -->

  <div class="main-bar clearfix ">

    <div class="container">

      <div class="logo-header mostion"><div class="logo-header-inr"><a href="<?php echo esc_url($service_finder_ThemeParams['homeUrl']); ?>"><?php if(!empty($service_finder_options['site-logo']['url'])){ ?> <img src="<?php echo esc_url($service_finder_options['site-logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>"> <?php }else{ echo get_bloginfo('name'); }?></a></div></div>

      <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed nav-top-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <button type="button" class="navbar-toggle nav-left-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      

      <?php 

	  $headermenuslideposition = (!empty($service_finder_options['header-menu-slide-position'])) ? $service_finder_options['header-menu-slide-position'] : ''; 

	  $slideposition = ($headermenuslideposition == 'left') ? 'header-nav-left' : '';

	  ?>

      <div class="header-nav navbar-collapse collapse <?php echo sanitize_html_class($slideposition); ?>">

        <?php 

		if (has_nav_menu($service_finder_MenuLocation)) {

		wp_nav_menu( $menuArgs);

		}

		?>

      </div>

      <div class="body-overlay" style="display: none;"></div>

    </div>

  </div>

  <!-- Transparent header style end -->

  <?php }elseif($headertemplates == 'overlay-white' && $topbar){ ?>

  <!-- Overlay header style start -->

  <div class="main-bar clearfix ">

    <div class="container">

      <div class="logo-header mostion"><div class="logo-header-inr"><a href="<?php echo esc_url($service_finder_ThemeParams['homeUrl']); ?>"><?php if(!empty($service_finder_options['site-logo']['url'])){ ?> <img src="<?php echo esc_url($service_finder_options['site-logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>"> <?php }else{ echo get_bloginfo('name'); }?></a></div></div>

      <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed nav-top-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <button type="button" class="navbar-toggle nav-left-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      

      <?php 

	  $headermenuslideposition = (!empty($service_finder_options['header-menu-slide-position'])) ? $service_finder_options['header-menu-slide-position'] : ''; 

	  $slideposition = ($headermenuslideposition == 'left') ? 'header-nav-left' : '';

	  ?>

      <div class="header-nav navbar-collapse collapse <?php echo sanitize_html_class($slideposition); ?>">

        <?php 

		if (has_nav_menu($service_finder_MenuLocation)) {

		wp_nav_menu( $menuArgs);

		}

		?>

      </div>

      <div class="body-overlay" style="display: none;"></div>

    </div>

  </div>

  <!-- Overlay header style end -->

  <?php }elseif($headertemplates == 'overlay-black' && $topbar){ ?>

  <!-- Overlay black header style start -->

  <div class="main-bar clearfix ">

    <div class="container">

      <div class="logo-header mostion"><div class="logo-header-inr"><a href="<?php echo esc_url($service_finder_ThemeParams['homeUrl']); ?>"><?php if(!empty($service_finder_options['site-logo']['url'])){ ?> <img src="<?php echo esc_url($service_finder_options['site-logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>"> <?php }else{ echo get_bloginfo('name'); }?></a></div></div>

      <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed nav-top-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <button type="button" class="navbar-toggle nav-left-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      

      <?php 

	  $headermenuslideposition = (!empty($service_finder_options['header-menu-slide-position'])) ? $service_finder_options['header-menu-slide-position'] : ''; 

	  $slideposition = ($headermenuslideposition == 'left') ? 'header-nav-left' : '';

	  ?>

      <div class="header-nav navbar-collapse collapse <?php echo sanitize_html_class($slideposition); ?>">

        <?php 

		if (has_nav_menu($service_finder_MenuLocation)) {

		wp_nav_menu( $menuArgs);

		}

		?>

      </div>

      <div class="body-overlay" style="display: none;"></div>

    </div>

  </div>

  <!-- Overlay black header style end -->

  <?php }elseif($headertemplates == 'no-top-bar' || !$topbar){ ?>

  <!-- No top bar header style start -->

  <div class="main-bar clearfix ">

    <div class="container">

      <div class="logo-header mostion"><div class="logo-header-inr"><a href="<?php echo esc_url($service_finder_ThemeParams['homeUrl']); ?>"><?php if(!empty($service_finder_options['site-logo']['url'])){ ?> <img src="<?php echo esc_url($service_finder_options['site-logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>"> <?php }else{ echo get_bloginfo('name'); }?></a></div></div>

      <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed nav-top-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <button type="button" class="navbar-toggle nav-left-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <?php 

	  $headermenuslideposition = (!empty($service_finder_options['header-menu-slide-position'])) ? $service_finder_options['header-menu-slide-position'] : ''; 

	  $slideposition = ($headermenuslideposition == 'left') ? 'header-nav-left' : '';

	  ?>

      <div class="header-nav navbar-collapse collapse <?php echo sanitize_html_class($slideposition); ?>">

      <?php if(class_exists('service_finder_booking_plugin')) { ?>

	 <?php if(!is_user_logged_in()){ ?>	 

      <div class="extra-nav"> 

      <?php if($loginsignuppopup){ ?>

      <div class="extra-cell">

      <a href="javascript:void(0);" class="btn btn-border btn-sm" data-redirect="yes" data-action="login" data-toggle="modal" data-target="#login-Modal"><i class="fa fa-user"></i>

        <?php esc_html_e('Login', 'service-finder'); ?>

        </a></div>

      <div class="extra-cell"> <a href="javascript:void(0);" class="btn btn-border btn-sm"  data-toggle="modal" data-action="signup" data-target="#login-Modal"><i class="fa fa-plus"></i>

        <?php esc_html_e('Sign up', 'service-finder'); ?>

        </a> </div>

      <?php } ?>  

        

		<?php if(is_author() && service_finder_themestyle_fortheme() != 'style-4'){ ?>

        <?php

        if(!empty($userCap)){

		if(in_array('bookings',$userCap)){

		?>

        <?php if($settings['booking_process'] == 'on' && (!is_user_logged_in() || service_finder_getUserRole($current_user->ID) == 'Customer' || service_finder_getUserRole($current_user->ID) == 'administrator' || (service_finder_getUserRole($current_user->ID) == 'Provider' && $current_user->ID == $author) )){ ?>

        <div class="extra-cell">

		<?php if((!is_user_logged_in() && !$service_finder_options['guest-booking'])){ ?>

            <button class="btn btn-primary" data-action="login" data-redirect="no" data-toggle="modal" data-target="#login-Modal"><?php esc_html_e('Book now','service-finder')?></button>

        <?php }else{ ?>  

	        <button class="btn btn-primary sf-booknow-btn"><?php esc_html_e('Book now','service-finder')?></button>

        <?php } ?>

        </div>

        <?php } ?> 

        <?php 

		}

		}

		?>

        <?php } ?>

        

        </div>

        <?php }else{

		?>

		<div class="extra-nav sf-notopbar-notification">

        <?php 

		if(class_exists('aone_messaging')){

		echo do_shortcode( '[service_finder_message_notification_notopbar]');

		}

		if(class_exists('service_finder_booking_plugin')){

		echo do_shortcode( '[service_finder_notification_notopbar]');//For No Top Bar Home Page 

		}

		?>

            <?php if(is_user_logged_in()){

						  $fullname = get_user_meta($current_user->ID,'first_name',true).' '.get_user_meta($current_user->ID,'last_name',true);

						  if($fullname == ' ' || $fullname == ''){

						  $fullname = ucfirst($current_user->display_name);

						  }

						  if ( function_exists( 'service_finder_UserRole' ) ) {

						  if(service_finder_UserRole($current_user->ID) == 'administrator'){

							$accounturl = admin_url( 'profile.php' );

						  }else{

						  	if ( function_exists( 'service_finder_get_url_by_shortcode' ) ) {

						  	$accounturl = service_finder_get_url_by_shortcode('[service_finder_my_account]');

							}else{

							$accounturl = service_finder_get_url_by_shortcodefortheme('[service_finder_my_account]');

							}

						  }

						  }

						  ?>

             

              <?php 

						if ( function_exists( 'service_finder_UserRole' ) ) {

						if(service_finder_UserRole($current_user->ID) == 'Customer'){ 

						echo '<div class="extra-cell fs-customer-status2"><a href="'.esc_url($accounturl).'" data-delay="1000" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle btn btn-border btn-sm" aria-expanded="false"><i class="fa fa-user"></i> '.$fullname.' <b class="caret"></b></a>';

						$myaccount = $accounturl;

						if(get_option('permalink_structure')){

						$myaccount = $myaccount.'?';

						}else{

						$myaccount = $myaccount.'&';

						}

						?>

              <?php service_finder_customer_menu_items(); ?>

              </div>

              <?php }else{

						   echo '<div class="extra-cell"><a href="'.esc_url($accounturl).'" class="btn btn-border btn-sm"><i class="fa fa-user"></i>'.$fullname.'</a></div>';

						   } 

						   }

						   ?>

            

            <div class="extra-cell"><a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>" class="btn btn-border btn-sm">

              <i class="fa fa-sign-out"></i> <?php esc_html_e('Logout', 'service-finder'); ?>

              </a></div>

              <?php if(is_author() && service_finder_themestyle_fortheme() != 'style-4'){ ?>

              <?php

			if(!empty($userCap)){

			if(in_array('bookings',$userCap)){

			?>

            <?php if($settings['booking_process'] == 'on' && (!is_user_logged_in() || service_finder_getUserRole($current_user->ID) == 'Customer' || service_finder_getUserRole($current_user->ID) == 'administrator' || (service_finder_getUserRole($current_user->ID) == 'Provider' && $current_user->ID == $author) )){ ?>

            <div class="extra-cell">

            <?php if((!is_user_logged_in() && !$service_finder_options['guest-booking'])){ ?>

            <button class="btn btn-primary" data-action="login" data-redirect="no" data-toggle="modal" data-target="#login-Modal"><?php esc_html_e('Book now','service-finder')?></button>

          <?php }else{ ?>  

	        <button class="btn btn-primary sf-booknow-btn"><?php esc_html_e('Book now','service-finder')?></button>

          <?php } ?>

            </div>  

            <?php } ?>

            <?php } ?>

            <?php 

}

}

?>

			<?php

						  }?>

          </div>

		<?php

		} ?>    

      <?php } ?>  

        <?php 

		if (has_nav_menu($service_finder_MenuLocation)) {

		wp_nav_menu( $menuArgs);


		}

		?>

      </div>

      <div class="body-overlay" style="display: none;"></div>

    </div>

  </div>

  <!-- No top bar header style end -->

  <?php }elseif($headertemplates == 'transperent-no-top-bar'){ ?>

  <!-- No top bar header style start -->

  <div class="main-bar clearfix ">

    <div class="container">

      <div class="logo-header mostion"><div class="logo-header-inr"><a href="<?php echo esc_url($service_finder_ThemeParams['homeUrl']); ?>"><?php if(!empty($service_finder_options['site-logo']['url'])){ ?> <img src="<?php echo esc_url($service_finder_options['site-logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>"> <?php }else{ echo get_bloginfo('name'); }?></a></div></div>

      <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed nav-top-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <button type="button" class="navbar-toggle nav-left-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <?php 

	  $headermenuslideposition = (!empty($service_finder_options['header-menu-slide-position'])) ? $service_finder_options['header-menu-slide-position'] : ''; 

	  $slideposition = ($headermenuslideposition == 'left') ? 'header-nav-left' : '';

	  ?>

      <div class="header-nav navbar-collapse collapse <?php echo sanitize_html_class($slideposition); ?>">

      	<?php if(class_exists('service_finder_booking_plugin')) { ?>

	 <?php if(!is_user_logged_in()){ ?>	 

      <div class="extra-nav"> 

      <?php if($loginsignuppopup){ ?>

      <div class="extra-cell">

      <a href="javascript:void(0);" class="btn btn-border btn-sm" data-redirect="yes" data-action="login" data-toggle="modal" data-target="#login-Modal"><i class="fa fa-user"></i>

        <?php esc_html_e('Login', 'service-finder'); ?>

        </a></div>

      <div class="extra-cell"> <a href="javascript:void(0);" class="btn btn-border btn-sm"  data-toggle="modal" data-action="signup" data-target="#login-Modal"><i class="fa fa-plus"></i>

        <?php esc_html_e('Sign up', 'service-finder'); ?>

        </a> </div>

      <?php } ?>  

        <?php if(is_author() && service_finder_themestyle_fortheme() != 'style-4'){ ?>

        <?php

		if(!empty($userCap)){

		if(in_array('bookings',$userCap)){

		?>

        <?php if($settings['booking_process'] == 'on' && (!is_user_logged_in() || service_finder_getUserRole($current_user->ID) == 'Customer' || service_finder_getUserRole($current_user->ID) == 'administrator' || (service_finder_getUserRole($current_user->ID) == 'Provider' && $current_user->ID == $author) )){ ?>

        <div class="extra-cell">

		<?php if((!is_user_logged_in() && !$service_finder_options['guest-booking'])){ ?>

            <button class="btn btn-primary" data-action="login" data-redirect="no" data-toggle="modal" data-target="#login-Modal"><?php esc_html_e('Book now','service-finder')?></button>

        <?php }else{ ?>  

	        <button class="btn btn-primary sf-booknow-btn"><?php esc_html_e('Book now','service-finder')?></button>

        <?php } ?>

        </div>

        <?php } ?> 

        <?php 

		}

		}

		?>

        <?php } ?>

        </div>

        <?php }else{

		?>

		<div class="extra-nav sf-notopbar-notification">

        <?php 

		if(class_exists('aone_messaging')){

		echo do_shortcode( '[service_finder_message_notification_notopbar]');

		}

		if(class_exists('service_finder_booking_plugin')){

		echo do_shortcode( '[service_finder_notification_notopbar]');//For No Top Bar Home Page 

		}

		?>

            <?php if(is_user_logged_in()){

						  $fullname = get_user_meta($current_user->ID,'first_name',true).' '.get_user_meta($current_user->ID,'last_name',true);

						  if($fullname == ' ' || $fullname == ''){

						  $fullname = ucfirst($current_user->display_name);

						  }

						  if ( function_exists( 'service_finder_UserRole' ) ) {

						  if(service_finder_UserRole($current_user->ID) == 'administrator'){

							$accounturl = admin_url( 'profile.php' );

						  }else{

						  	if ( function_exists( 'service_finder_get_url_by_shortcode' ) ) {

						  	$accounturl = service_finder_get_url_by_shortcode('[service_finder_my_account]');

							}else{

							$accounturl = service_finder_get_url_by_shortcodefortheme('[service_finder_my_account]');

							}

						  }

						  }

						  ?>

             

              <?php 

						if ( function_exists( 'service_finder_UserRole' ) ) {

						if(service_finder_UserRole($current_user->ID) == 'Customer'){ 

						echo '<div class="extra-cell fs-customer-status2"><a href="'.esc_url($accounturl).'" data-delay="1000" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle btn btn-border btn-sm" aria-expanded="false"><i class="fa fa-user"></i> '.$fullname.' <b class="caret"></b></a>';

						$myaccount = $accounturl;

						if(get_option('permalink_structure')){

						$myaccount = $myaccount.'?';

						}else{

						$myaccount = $myaccount.'&';

						}

						?>

              <?php service_finder_customer_menu_items(); ?>

              </div>

              <?php }else{

						   echo '<div class="extra-cell"><a href="'.esc_url($accounturl).'" class="btn btn-border btn-sm"><i class="fa fa-user"></i>'.$fullname.'</a></div>';

						   } 

						   }

						   ?>

            

            <div class="extra-cell"><a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>" class="btn btn-border btn-sm">

              <i class="fa fa-sign-out"></i> <?php esc_html_e('Logout', 'service-finder'); ?>

              </a></div>

              <?php if(is_author() && service_finder_themestyle_fortheme() != 'style-4'){ ?>

              <?php

			if(!empty($userCap)){

			if(in_array('bookings',$userCap)){

			?>

            <?php if($settings['booking_process'] == 'on' && (!is_user_logged_in() || service_finder_getUserRole($current_user->ID) == 'Customer' || service_finder_getUserRole($current_user->ID) == 'administrator' || (service_finder_getUserRole($current_user->ID) == 'Provider' && $current_user->ID == $author) )){ ?>

            <div class="extra-cell">

            <?php if((!is_user_logged_in() && !$service_finder_options['guest-booking'])){ ?>

            <button class="btn btn-primary" data-action="login" data-redirect="no" data-toggle="modal" data-target="#login-Modal"><?php esc_html_e('Book now','service-finder')?></button>

          <?php }else{ ?>  

	        <button class="btn btn-primary sf-booknow-btn"><?php esc_html_e('Book now','service-finder')?></button>

          <?php } ?>

            </div>  

            <?php } ?>

            <?php } ?>

            <?php 

			}

			}

			?>

            <?php

						  }?>

          </div>

		<?php

		} ?>    

      <?php } ?>  

        <?php 

		if (has_nav_menu($service_finder_MenuLocation)) {

		wp_nav_menu( $menuArgs);

		}

		?>

      </div>

      <div class="body-overlay" style="display: none;"></div>

    </div>

  </div>

  <!-- No top bar header style end -->

  <?php } ?>

  <?php }else{

  if((($headertemplates == 'classic' || $headertemplates == 'transperent' || $headertemplates == 'overlay-white' || $headertemplates == 'overlay-black') && $headertemplates) || !class_exists( 'ReduxFrameworkPlugin' )){

  ?>

  <!-- Classic header style start -->

  <div class="main-bar clearfix">

    <div class="container">

      <div class="logo-header mostion"><div class="logo-header-inr"><a href="<?php echo esc_url($service_finder_ThemeParams['homeUrl']); ?>"><?php if(!empty($service_finder_options['site-logo']['url'])){ ?> <img src="<?php echo esc_url($service_finder_options['site-logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>"> <?php }else{ echo get_bloginfo('name'); }?></a></div></div>

      <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed nav-top-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <button type="button" class="navbar-toggle nav-left-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <?php 

						  if(is_author() && service_finder_themestyle_fortheme() != 'style-4'){

						  if(!empty($userCap)){

						  if(in_array('bookings',$userCap)){

						  $booking_process = (!empty($settings['booking_process'])) ? $settings['booking_process'] : '';

						  if($booking_process == 'on' && (!is_user_logged_in() || service_finder_getUserRole($current_user->ID) == 'Customer' || service_finder_getUserRole($current_user->ID) == 'administrator' || (service_finder_getUserRole($current_user->ID) == 'Provider' && $current_user->ID == $author) )){

						  ?>

	<?php if(!($headertemplates == 'no-top-bar' || !$topbar)){?>	                          

      <div class="extra-nav">

      <?php if($settings['booking_process'] == 'on' && (!is_user_logged_in() || service_finder_getUserRole($current_user->ID) == 'Customer' || service_finder_getUserRole($current_user->ID) == 'administrator' || (service_finder_getUserRole($current_user->ID) == 'Provider' && $current_user->ID == $author) )){ ?>

        <div class="extra-cell">

          <?php if((!is_user_logged_in() && !$service_finder_options['guest-booking'])){ ?>

            <button class="btn btn-primary" data-action="login" data-redirect="no" data-toggle="modal" data-target="#login-Modal"><?php esc_html_e('Book now','service-finder')?></button>

          <?php }else{ ?>  

	        <button class="btn btn-primary sf-booknow-btn"><?php esc_html_e('Book now','service-finder')?></button>

          <?php } ?>

          </div>

      </div>

      <?php 

	  }

	  }

						   }

						   }

						   }

						   }

						   ?>

      <?php 

	  $headermenuslideposition = (!empty($service_finder_options['header-menu-slide-position'])) ? $service_finder_options['header-menu-slide-position'] : ''; 

	  $slideposition = ($headermenuslideposition == 'left') ? 'header-nav-left' : '';

	  ?>

      <div class="header-nav navbar-collapse collapse <?php echo sanitize_html_class($slideposition); ?>">

        <?php 

		if (has_nav_menu($service_finder_MenuLocation)) {

		wp_nav_menu( $menuArgs);

		}

		?>

      </div>

      <div class="body-overlay" style="display: none;"></div>

    </div>

  </div>

  <!-- Classic header style end -->

  <?php 

  }elseif($headertemplates == 'center-mode' && $topbar){ ?>

  <!-- Center mode header style start -->

  <div class="main-bar clearfix">

    <div class="container">

      <div class="logo-header center-block"><a href="<?php echo esc_url($service_finder_ThemeParams['homeUrl']); ?>"><?php if(!empty($service_finder_options['site-logo']['url'])){ ?> <img src="<?php echo esc_url($service_finder_options['site-logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>"> <?php }else{ echo get_bloginfo('name'); }?></a></div>

      <div class="main-bar-inr">

      <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed nav-top-slide-btn">


      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <button type="button" class="navbar-toggle nav-left-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <?php 

						  if(is_author() && service_finder_themestyle_fortheme() != 'style-4'){

						  if(!empty($userCap)){

						  if(in_array('bookings',$userCap)){

						  $booking_process = (!empty($settings['booking_process'])) ? $settings['booking_process'] : '';

						  if($booking_process == 'on' && (!is_user_logged_in() || service_finder_getUserRole($current_user->ID) == 'Customer' || service_finder_getUserRole($current_user->ID) == 'administrator' || (service_finder_getUserRole($current_user->ID) == 'Provider' && $current_user->ID == $author) )){

						  ?>

	<?php if(!($headertemplates == 'no-top-bar' || !$topbar)){?>	                          

      <div class="extra-nav">

        <?php if($settings['booking_process'] == 'on' && (!is_user_logged_in() || service_finder_getUserRole($current_user->ID) == 'Customer' || service_finder_getUserRole($current_user->ID) == 'administrator' || (service_finder_getUserRole($current_user->ID) == 'Provider' && $current_user->ID == $author) )){ ?>

        <div class="extra-cell">

          <?php if((!is_user_logged_in() && !$service_finder_options['guest-booking'])){ ?>

            <button class="btn btn-primary" data-action="login" data-redirect="no" data-toggle="modal" data-target="#login-Modal"><?php esc_html_e('Book now','service-finder')?></button>

          <?php }else{ ?>  

	        <button class="btn btn-primary sf-booknow-btn"><?php esc_html_e('Book now','service-finder')?></button>

          <?php } ?>

          </div>

        <?php } ?>  

      </div>

      <?php 

	  }

						   }

						   }

						   }

						   }

						   ?>

      <?php 

	  $headermenuslideposition = (!empty($service_finder_options['header-menu-slide-position'])) ? $service_finder_options['header-menu-slide-position'] : ''; 

	  $slideposition = ($headermenuslideposition == 'left') ? 'header-nav-left' : '';

	  ?>

      <div class="header-nav navbar-collapse collapse <?php echo sanitize_html_class($slideposition); ?>">

        <?php 

		if (has_nav_menu($service_finder_MenuLocation)) {

		wp_nav_menu( $menuArgs);

		}

		?>

      </div>

      <div class="body-overlay" style="display: none;"></div>

      </div>

    </div>

  </div>

  <!-- Center mode header style end -->

  <?php }elseif($headertemplates == 'no-top-bar' || !$topbar){ ?>

  <!-- No top bar header style start -->

  <div class="main-bar clearfix ">

    <div class="container">

      <div class="logo-header mostion"><div class="logo-header-inr"><a href="<?php echo esc_url($service_finder_ThemeParams['homeUrl']); ?>"><?php if(!empty($service_finder_options['site-logo']['url'])){ ?> <img src="<?php echo esc_url($service_finder_options['site-logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>"> <?php }else{ echo get_bloginfo('name'); }?></a></div></div>

      <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed nav-top-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <button type="button" class="navbar-toggle nav-left-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <?php 

						  if(is_author() && service_finder_themestyle_fortheme() != 'style-4'){

						  if(!empty($userCap)){

						  if(in_array('bookings',$userCap)){

						  $booking_process = (!empty($settings['booking_process'])) ? $settings['booking_process'] : '';

						  if($booking_process == 'on' && (!is_user_logged_in() || service_finder_getUserRole($current_user->ID) == 'Customer' || service_finder_getUserRole($current_user->ID) == 'administrator' || (service_finder_getUserRole($current_user->ID) == 'Provider' && $current_user->ID == $author) )){

						  ?>

		<?php if(!($headertemplates == 'no-top-bar' || !$topbar)){?>	               

      <div class="extra-nav">

        <?php if($settings['booking_process'] == 'on' && (!is_user_logged_in() || service_finder_getUserRole($current_user->ID) == 'Customer' || service_finder_getUserRole($current_user->ID) == 'administrator' || (service_finder_getUserRole($current_user->ID) == 'Provider' && $current_user->ID == $author) )){ ?>

        <div class="extra-cell">

            <?php if((!is_user_logged_in() && !$service_finder_options['guest-booking'])){ ?>

            <button class="btn btn-primary" data-action="login" data-redirect="no" data-toggle="modal" data-target="#login-Modal"><?php esc_html_e('Book now','service-finder')?></button>

          <?php }else{ ?>  

	        <button class="btn btn-primary sf-booknow-btn"><?php esc_html_e('Book now','service-finder')?></button>

          <?php } ?>

            

          </div>

        <?php } ?>  

      </div>

      <?php 

	  }

						   }

						   }

						   }

						   }

						   ?>

      <?php 

	  $headermenuslideposition = (!empty($service_finder_options['header-menu-slide-position'])) ? $service_finder_options['header-menu-slide-position'] : ''; 

	  $slideposition = ($headermenuslideposition == 'left') ? 'header-nav-left' : '';

	  ?>

      <div class="header-nav navbar-collapse collapse <?php echo sanitize_html_class($slideposition); ?>">

      <?php if(class_exists('service_finder_booking_plugin')) { ?>

	  <?php if(!is_user_logged_in()){ ?>	 

      <div class="extra-nav"> 

        <?php if($loginsignuppopup){ ?>

        <div class="extra-cell"><a href="javascript:void(0);" class="btn btn-border btn-sm" data-redirect="yes" data-action="login" data-toggle="modal" data-target="#login-Modal"><i class="fa fa-user"></i>

        <?php esc_html_e('Login', 'service-finder'); ?>

        </a> </div>

        <div class="extra-cell">

        <a href="javascript:void(0);" class="btn btn-border btn-sm"  data-toggle="modal" data-action="signup" data-target="#login-Modal"><i class="fa fa-plus"></i>

        <?php esc_html_e('Sign up', 'service-finder'); ?>

        </a> </div>

        <?php } ?>

        <?php if(is_author() && service_finder_themestyle_fortheme() != 'style-4'){ 

		if(!empty($userCap)){

		if(in_array('bookings',$userCap)){

		?>

        <?php if($settings['booking_process'] == 'on' && (!is_user_logged_in() || service_finder_getUserRole($current_user->ID) == 'Customer' || service_finder_getUserRole($current_user->ID) == 'administrator' || (service_finder_getUserRole($current_user->ID) == 'Provider' && $current_user->ID == $author) )){ ?>

        <div class="extra-cell">

        <?php if((!is_user_logged_in() && !$service_finder_options['guest-booking'])){ ?>

            <button class="btn btn-primary" data-action="login" data-redirect="no" data-toggle="modal" data-target="#login-Modal"><?php esc_html_e('Book now','service-finder')?></button>

          <?php }else{ ?>  

	        <button class="btn btn-primary sf-booknow-btn"><?php esc_html_e('Book now','service-finder')?></button>

          <?php } ?>

        </div>  

        <?php } ?>

        <?php 

		}

		}

		} ?>

        </div>

        <?php }else{

		?>

		<div class="extra-nav sf-notopbar-notification">

        <?php 

		if(class_exists('aone_messaging')){

		echo do_shortcode( '[service_finder_message_notification_notopbar]');

		}

		if(class_exists('service_finder_booking_plugin')){

		echo do_shortcode( '[service_finder_notification_notopbar]');//For No Top Bar Inner Page 

		}

		?>

            <?php if(is_user_logged_in()){

						  $fullname = get_user_meta($current_user->ID,'first_name',true).' '.get_user_meta($current_user->ID,'last_name',true);

						  if($fullname == ' ' || $fullname == ''){

						  $fullname = ucfirst($current_user->display_name);

						  }

						  if ( function_exists( 'service_finder_UserRole' ) ) {

						  if(service_finder_UserRole($current_user->ID) == 'administrator'){

							$accounturl = admin_url( 'profile.php' );

						  }else{

						  	if ( function_exists( 'service_finder_get_url_by_shortcode' ) ) {

						  	$accounturl = service_finder_get_url_by_shortcode('[service_finder_my_account]');

							}else{

							$accounturl = service_finder_get_url_by_shortcodefortheme('[service_finder_my_account]');

							}

						  }

						  }

						  ?>

             

              <?php 

						if ( function_exists( 'service_finder_UserRole' ) ) {

						if(service_finder_UserRole($current_user->ID) == 'Customer'){ 

						echo '<div class="extra-cell fs-customer-status2"><a href="'.esc_url($accounturl).'" data-delay="1000" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle btn btn-border btn-sm" aria-expanded="false"><i class="fa fa-user"></i> '.$fullname.' <b class="caret"></b></a>';

						$myaccount = $accounturl;

						if(get_option('permalink_structure')){

						$myaccount = $myaccount.'?';

						}else{

						$myaccount = $myaccount.'&';

						}

						?>

              <?php service_finder_customer_menu_items(); ?>

              </div>

              <?php }else{

						   echo '<div class="extra-cell"><a href="'.esc_url($accounturl).'" class="btn btn-border btn-sm"><i class="fa fa-user"></i>'.$fullname.'</a></div>';

						   } 

						   }

						   ?>

            

            <div class="extra-cell"><a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>" class="btn btn-border btn-sm">

              <i class="fa fa-sign-out"></i> <?php esc_html_e('Logout', 'service-finder'); ?>

              </a></div>

              

              <?php if(is_author() && service_finder_themestyle_fortheme() != 'style-4'){

			  if(!empty($userCap)){

			  if(in_array('bookings',$userCap)){

			   ?>

              <?php if($settings['booking_process'] == 'on' && (!is_user_logged_in() || service_finder_getUserRole($current_user->ID) == 'Customer' || service_finder_getUserRole($current_user->ID) == 'administrator' || (service_finder_getUserRole($current_user->ID) == 'Provider' && $current_user->ID == $author) )){ ?>

              <div class="extra-cell">

              <?php if((!is_user_logged_in() && !$service_finder_options['guest-booking'])){ ?>

            <button class="btn btn-primary" data-action="login" data-redirect="no" data-toggle="modal" data-target="#login-Modal"><?php esc_html_e('Book now','service-finder')?></button>

          <?php }else{ ?>  

	        <button class="btn btn-primary sf-booknow-btn"><?php esc_html_e('Book now','service-finder')?></button>

          <?php } ?>

              </div>  

              <?php } ?>

              <?php 

			  }

			  }

			  } ?>

            <?php

						  }?>

          </div>

		<?php

		} ?>	 

      <?php } ?>

        <?php 

		if (has_nav_menu($service_finder_MenuLocation)) {

		wp_nav_menu( $menuArgs);

		}

		?>

      </div>

      <div class="body-overlay" style="display: none;"></div>

    </div>

  </div>

  <!-- No top bar header style end -->

  <?php }elseif($headertemplates == 'transperent-no-top-bar'){ ?>

  <!-- No top bar header style start -->

  <div class="main-bar clearfix ">

    <div class="container">

      <div class="logo-header mostion"><div class="logo-header-inr"><a href="<?php echo esc_url($service_finder_ThemeParams['homeUrl']); ?>"><?php if(!empty($service_finder_options['site-logo']['url'])){ ?> <img src="<?php echo esc_url($service_finder_options['site-logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>"> <?php }else{ echo get_bloginfo('name'); }?></a></div></div>

      <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed nav-top-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <button type="button" class="navbar-toggle nav-left-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <?php 

						  if(is_author() && service_finder_themestyle_fortheme() != 'style-4'){

						  if(!empty($userCap)){

						  if(in_array('bookings',$userCap)){

						  $booking_process = (!empty($settings['booking_process'])) ? $settings['booking_process'] : '';

						  if($booking_process == 'on' && (!is_user_logged_in() || service_finder_getUserRole($current_user->ID) == 'Customer' || service_finder_getUserRole($current_user->ID) == 'administrator' || (service_finder_getUserRole($current_user->ID) == 'Provider' && $current_user->ID == $author) )){

						  ?>

		<?php if($headertemplates != 'transperent-no-top-bar'){?>	               

      <div class="extra-nav">

        <?php if($settings['booking_process'] == 'on' && (!is_user_logged_in() || service_finder_getUserRole($current_user->ID) == 'Customer' || service_finder_getUserRole($current_user->ID) == 'administrator' || (service_finder_getUserRole($current_user->ID) == 'Provider' && $current_user->ID == $author) )){ ?>

        <div class="extra-cell">

            <?php if((!is_user_logged_in() && !$service_finder_options['guest-booking'])){ ?>

            <button class="btn btn-primary" data-action="login" data-redirect="no" data-toggle="modal" data-target="#login-Modal"><?php esc_html_e('Book now','service-finder')?></button>

          <?php }else{ ?>  

	        <button class="btn btn-primary sf-booknow-btn"><?php esc_html_e('Book now','service-finder')?></button>

          <?php } ?>

            

          </div>

        <?php } ?>  

      </div>

      <?php 

	  }

						   }

						   }

						   }

						   }

						   ?>

      <?php 

	  $headermenuslideposition = (!empty($service_finder_options['header-menu-slide-position'])) ? $service_finder_options['header-menu-slide-position'] : ''; 

	  $slideposition = ($headermenuslideposition == 'left') ? 'header-nav-left' : '';

	  ?>

      <div class="header-nav navbar-collapse collapse <?php echo sanitize_html_class($slideposition); ?>">

      <?php if(class_exists('service_finder_booking_plugin')) { ?>

	  <?php if(!is_user_logged_in()){ ?>	 

      <div class="extra-nav"> 

        <?php if($loginsignuppopup){ ?>

        <div class="extra-cell"><a href="javascript:void(0);" class="btn btn-border btn-sm" data-redirect="yes" data-action="login" data-toggle="modal" data-target="#login-Modal"><i class="fa fa-user"></i>

        <?php esc_html_e('Login', 'service-finder'); ?>

        </a> </div>

        <div class="extra-cell">

        <a href="javascript:void(0);" class="btn btn-border btn-sm"  data-toggle="modal" data-action="signup" data-target="#login-Modal"><i class="fa fa-plus"></i>

        <?php esc_html_e('Sign up', 'service-finder'); ?>

        </a> </div>

        <?php } ?>

        <?php if(is_author() && service_finder_themestyle_fortheme() != 'style-4'){

		if(!empty($userCap)){

		if(in_array('bookings',$userCap)){

		 ?>

        <?php if($settings['booking_process'] == 'on' && (!is_user_logged_in() || service_finder_getUserRole($current_user->ID) == 'Customer' || service_finder_getUserRole($current_user->ID) == 'administrator' || (service_finder_getUserRole($current_user->ID) == 'Provider' && $current_user->ID == $author) )){ ?>

        <div class="extra-cell">

        <?php if((!is_user_logged_in() && !$service_finder_options['guest-booking'])){ ?>

            <button class="btn btn-primary" data-action="login" data-redirect="no" data-toggle="modal" data-target="#login-Modal"><?php esc_html_e('Book now','service-finder')?></button>

          <?php }else{ ?>  

	        <button class="btn btn-primary sf-booknow-btn"><?php esc_html_e('Book now','service-finder')?></button>

          <?php } ?>

        </div>  

        <?php } ?>

        <?php 

		}

		}

		} ?>

        </div>

        <?php }else{

		?>

		<div class="extra-nav sf-notopbar-notification">

        <?php 

		if(class_exists('aone_messaging')){

		echo do_shortcode( '[service_finder_message_notification_notopbar]');

		}

		if(class_exists('service_finder_booking_plugin')){

		echo do_shortcode( '[service_finder_notification_notopbar]');//For No Top Bar Inner Page 

		}

		?>

            <?php if(is_user_logged_in()){

						  $fullname = get_user_meta($current_user->ID,'first_name',true).' '.get_user_meta($current_user->ID,'last_name',true);

						  if($fullname == ' ' || $fullname == ''){

						  $fullname = ucfirst($current_user->display_name);

						  }

						  if ( function_exists( 'service_finder_UserRole' ) ) {

						  if(service_finder_UserRole($current_user->ID) == 'administrator'){

							$accounturl = admin_url( 'profile.php' );

						  }else{

						  	if ( function_exists( 'service_finder_get_url_by_shortcode' ) ) {

						  	$accounturl = service_finder_get_url_by_shortcode('[service_finder_my_account]');

							}else{

							$accounturl = service_finder_get_url_by_shortcodefortheme('[service_finder_my_account]');

							}

						  }

						  }

						  ?>

             

              <?php 

						if ( function_exists( 'service_finder_UserRole' ) ) {

						if(service_finder_UserRole($current_user->ID) == 'Customer'){ 

						echo '<div class="extra-cell fs-customer-status2"><a href="'.esc_url($accounturl).'" data-delay="1000" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle btn btn-border btn-sm" aria-expanded="false"><i class="fa fa-user"></i> '.$fullname.' <b class="caret"></b></a>';

						$myaccount = $accounturl;

						if(get_option('permalink_structure')){

						$myaccount = $myaccount.'?';

						}else{

						$myaccount = $myaccount.'&';

						}

						?>

              <?php service_finder_customer_menu_items(); ?>

              </div>

              <?php }else{

						   echo '<div class="extra-cell"><a href="'.esc_url($accounturl).'" class="btn btn-border btn-sm"><i class="fa fa-user"></i>'.$fullname.'</a></div>';

						   } 

						   }

						   ?>

            

            <div class="extra-cell"><a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>" class="btn btn-border btn-sm">

              <i class="fa fa-sign-out"></i> <?php esc_html_e('Logout', 'service-finder'); ?>

              </a></div>

              

              <?php if(is_author() && service_finder_themestyle_fortheme() != 'style-4'){ 

			  if(!empty($userCap)){

			  if(in_array('bookings',$userCap)){

			  ?>

              <?php if($settings['booking_process'] == 'on' && (!is_user_logged_in() || service_finder_getUserRole($current_user->ID) == 'Customer' || service_finder_getUserRole($current_user->ID) == 'administrator' || (service_finder_getUserRole($current_user->ID) == 'Provider' && $current_user->ID == $author) )){ ?>

              <div class="extra-cell">

              <?php if((!is_user_logged_in() && !$service_finder_options['guest-booking'])){ ?>

            <button class="btn btn-primary" data-action="login" data-redirect="no" data-toggle="modal" data-target="#login-Modal"><?php esc_html_e('Book now','service-finder')?></button>

          <?php }else{ ?>  

	        <button class="btn btn-primary sf-booknow-btn"><?php esc_html_e('Book now','service-finder')?></button>

          <?php } ?>

              </div>  

              <?php } ?>

              <?php 

			  }

			  }

			  }

			  ?>

            <?php

						  }?>

          </div>

		<?php

		} ?>	 

      <?php } ?>

        <?php 

		if (has_nav_menu($service_finder_MenuLocation)) {

		wp_nav_menu( $menuArgs);

		}

		?>

      </div>

      <div class="body-overlay" style="display: none;"></div>

    </div>

  </div>

  <!-- No top bar header style end -->

  <?php }

  } ?>

</header>

<?php

}



//Header layout for search style 2

function service_finder_header_layout_searchmapstyle(){

global $service_finder_globals, $service_finder_ThemeParams, $author;

$service_finder_options = $service_finder_globals;

$loginsignuppopup = (!empty($service_finder_options['login-signup-popup'])) ? $service_finder_options['login-signup-popup'] : '';

if(is_author()){

if ( function_exists( 'service_finder_getProviderSettings' ) ){

$settings = service_finder_getProviderSettings($author);

}

}



$service_finder_MenuLocation = 'primary';



$headertemplates = (!empty($service_finder_options['header-templates'])) ? $service_finder_options['header-templates'] : ''; 

$topbar = (!empty($service_finder_options['top-bar'])) ? $service_finder_options['top-bar'] : ''; 



$menuArgs = array(



		'theme_location'  => $service_finder_MenuLocation,

		

		'menu_class'      => 'nav navbar-nav',

		

		'menu_id'       => 'primary-menu',

		

		'container'       => '',

		

		);

	

$current_user = wp_get_current_user(); 





            if(is_home() || is_front_page()){

				if(class_exists( 'ReduxFrameworkPlugin' )) {

					if($headertemplates == 'classic' && $topbar){

							$class = 'header-style1'; 

					}elseif($headertemplates == 'center-mode' && $topbar){

							$class = 'header-style2'; 

					}elseif($headertemplates == 'transperent' && $topbar){

							$class = 'header-style3 transparent-bg'; 

					}elseif($headertemplates == 'overlay-white' && $topbar){

							$class = 'header-style4 overlay-bg-white'; 

					}elseif($headertemplates == 'overlay-black' && $topbar){

							$class = 'header-style5 overlay-bg-black'; 

					}elseif($headertemplates == 'no-top-bar' || !$topbar){

							$class = 'header-style6'; 

					}

				}else{

					$class = 'header-style1';

				}

				

			}else{

				if(class_exists( 'ReduxFrameworkPlugin' )) {				

					if(($headertemplates == 'classic' || $headertemplates == 'center-mode' || $headertemplates == 'transperent' || $headertemplates == 'overlay-white' || $headertemplates == 'overlay-black') && $topbar){

								$class = 'header-style1';

					}elseif($headertemplates == 'no-top-bar' || !$topbar){

								$class = 'header-style6';

					}

				}else{

					$class = 'header-style1';

				}	

				

			}

			$headermenuslideposition = (!empty($service_finder_options['header-menu-slide-position'])) ? $service_finder_options['header-menu-slide-position'] : ''; 

			$slideposition = ($headermenuslideposition == 'left') ? 'left-nav-wrap' : '';
			if(is_home() || is_front_page()){

			$innerheaderclass = '';
			
			}else{
			
			$innerheaderclass = 'sf-header-inner';
			
			}

			?>

			<header id="header-part" class="fix-map-header <?php echo sanitize_html_class($innerheaderclass); ?> <?php echo sanitize_html_class($slideposition); ?>">

  <!-- Map page header style start -->

  <div class="main-bar clearfix">

    <div class="container-fluid">

      <div class="logo-header mostion"><div class="logo-header-inr"><a href="<?php echo esc_url($service_finder_ThemeParams['homeUrl']); ?>"><?php if(!empty($service_finder_options['site-logo']['url'])){ ?> <img src="<?php echo esc_url($service_finder_options['site-logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>"> <?php }else{ echo get_bloginfo('name'); }?></a></div></div>

      <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed nav-top-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <button type="button" class="navbar-toggle nav-left-slide-btn">

      <span class="sr-only">

      <?php esc_html_e('Toggle navigation', 'service-finder'); ?>

      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <?php 

	  $headermenuslideposition = (!empty($service_finder_options['header-menu-slide-position'])) ? $service_finder_options['header-menu-slide-position'] : ''; 

	  $slideposition = ($headermenuslideposition == 'left') ? 'header-nav-left' : '';

	  ?>

      <div class="header-nav navbar-collapse collapse <?php echo sanitize_html_class($slideposition); ?>">

      	<?php if(class_exists('service_finder_booking_plugin')) { ?>

	  <?php if(!is_user_logged_in()){ ?>

      <?php if($loginsignuppopup){ ?>

      <div class="extra-nav">

        <div class="extra-cell">

           <a href="javascript:void(0);" class="btn btn-border btn-sm" data-redirect="yes" data-action="login" data-toggle="modal" data-target="#login-Modal"><i class="fa fa-user"></i>

            <?php esc_html_e('Login', 'service-finder'); ?>

            </a> </div>

        <div class="extra-cell"> <a href="javascript:void(0);" class="btn btn-border btn-sm"  data-toggle="modal" data-action="signup" data-target="#login-Modal"><i class="fa fa-plus"></i>

            <?php esc_html_e('Sign up', 'service-finder'); ?>

            </a> </div>

      </div>

      <?php } ?>

      <?php }else{

	  

		?>

		<div class="extra-nav sf-notopbar-notification">

        <?php 

		if(class_exists('aone_messaging')){

		echo do_shortcode( '[service_finder_message_notification_notopbar]');

		}

		if(class_exists('service_finder_booking_plugin')){

		echo do_shortcode( '[service_finder_notification_notopbar]');//For No Top Bar Home Page 

		}

		?>

            <?php if(is_user_logged_in()){

						  $fullname = get_user_meta($current_user->ID,'first_name',true).' '.get_user_meta($current_user->ID,'last_name',true);

						  if($fullname == ' ' || $fullname == ''){

						  $fullname = ucfirst($current_user->display_name);

						  }

						  if ( function_exists( 'service_finder_UserRole' ) ) {

						  if(service_finder_UserRole($current_user->ID) == 'administrator'){

							$accounturl = admin_url( 'profile.php' );

						  }else{

						  	if ( function_exists( 'service_finder_get_url_by_shortcode' ) ) {

						  	$accounturl = service_finder_get_url_by_shortcode('[service_finder_my_account]');

							}else{

							$accounturl = service_finder_get_url_by_shortcodefortheme('[service_finder_my_account]');

							}

						  }

						  }

						  ?>

             

              <?php 

						if ( function_exists( 'service_finder_UserRole' ) ) {

						if(service_finder_UserRole($current_user->ID) == 'Customer'){ 

						echo '<div class="extra-cell fs-customer-status2"><a href="'.esc_url($accounturl).'" data-delay="1000" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle btn btn-border btn-sm" aria-expanded="false"><i class="fa fa-user"></i> '.$fullname.' <b class="caret"></b></a>';

						$myaccount = $accounturl;

						if(get_option('permalink_structure')){

						$myaccount = $myaccount.'?';

						}else{

						$myaccount = $myaccount.'&';

						}

						?>

              <?php service_finder_customer_menu_items(); ?>

              </div>

              <?php }else{

						   echo '<div class="extra-cell"><a href="'.esc_url($accounturl).'" class="btn btn-border btn-sm"><i class="fa fa-user"></i>'.$fullname.'</a></div>';

						   } 

						   }

						   ?>

            

            <div class="extra-cell"><a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>" class="btn btn-border btn-sm">

              <i class="fa fa-sign-out"></i> <?php esc_html_e('Logout', 'service-finder'); ?>

              </a></div>

              <?php if(is_author() && service_finder_themestyle_fortheme() != 'style-4'){ ?>

              <?php

			if(!empty($userCap)){

			if(in_array('bookings',$userCap)){

			?>

            <?php if($settings['booking_process'] == 'on' && (!is_user_logged_in() || service_finder_getUserRole($current_user->ID) == 'Customer' || service_finder_getUserRole($current_user->ID) == 'administrator' || (service_finder_getUserRole($current_user->ID) == 'Provider' && $current_user->ID == $author) )){ ?>

            <div class="extra-cell">

            <?php if((!is_user_logged_in() && !$service_finder_options['guest-booking'])){ ?>

            <button class="btn btn-primary" data-action="login" data-redirect="no" data-toggle="modal" data-target="#login-Modal"><?php esc_html_e('Book now','service-finder')?></button>

          <?php }else{ ?>  

	        <button class="btn btn-primary sf-booknow-btn"><?php esc_html_e('Book now','service-finder')?></button>

          <?php } ?>

            </div>  

            <?php } ?>

            <?php } ?>

            <?php 

}

}

?>

			<?php

						  }?>

          </div>

		<?php

		

	  } ?>

      <?php } ?>

        <?php 

		if (has_nav_menu($service_finder_MenuLocation)) {

		wp_nav_menu( $menuArgs);

		}

		?>

      </div>

      <div class="body-overlay" style="display: none;"></div>

    </div>

  </div>

  <!-- Map page header style end -->

</header>

<?php

}

function service_finder_header_template8(){
global $service_finder_globals, $service_finder_ThemeParams, $author, $service_finder_options, $current_user;

$service_finder_MenuLocation = 'primary';
$menuArgs = array(
		'theme_location'  => $service_finder_MenuLocation,
		'menu_class'      => 'nav navbar-nav',
		'menu_id'       => 'primary-menu',
		'container'       => '',
		);
$srhheader = (is_search() && ($_GET['s'] == "" && (isset($_GET['keyword']) || isset($_GET['searchAddress']) || isset($_GET['catid']) || isset($_GET['country']) || isset($_GET['city'])))) ? 'sf-search-header' : '';

$headermenuslideposition = (!empty($service_finder_options['header-menu-slide-position'])) ? $service_finder_options['header-menu-slide-position'] : ''; 

$slideposition = ($headermenuslideposition == 'left') ? 'header-nav-left' : '';

$innerheader = (is_home() || is_front_page()) ? '' : 'sf-header-inner';
?>
<header id="header-part" class="mostion clearfix header-style8 sf-header-full-width <?php echo sanitize_html_class($innerheader); ?> <?php echo sanitize_html_class($srhheader); ?> <?php echo sanitize_html_class($slideposition); ?>">
  <!-- No top bar header style start -->
  <div class="main-bar clearfix ">
    <div class="container">
        <div class="logo-header mostion">
          <div class="logo-header-inr">
          	  <?php if(is_home() || is_front_page()){ ?>
              <a href="<?php echo esc_url($service_finder_ThemeParams['homeUrl']); ?>">
			  <?php if(!empty($service_finder_options['site-logo']['url'])){ ?> <img class="sf-header-logo" src="<?php echo esc_url($service_finder_options['site-logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>"> <?php }else{ echo get_bloginfo('name'); }?>
              <?php if(!empty($service_finder_options['sticky-logo']['url'])){ ?> <img class="sf-sticky-logo" src="<?php echo esc_url($service_finder_options['sticky-logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>"> <?php }else{ echo get_bloginfo('name'); }?>
              </a>
              <?php }else{ ?>
              <a href="<?php echo esc_url($service_finder_ThemeParams['homeUrl']); ?>">
              <?php if(!empty($service_finder_options['sticky-logo']['url'])){ ?> <img src="<?php echo esc_url($service_finder_options['sticky-logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>"> <?php }else{ echo get_bloginfo('name'); }?>
              </a>
			  <?php } ?>
          </div>
        </div>
        
        <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed nav-top-slide-btn">
          <span class="sr-only"><?php esc_html__( 'Toggle navigation', 'service-finder' ); ?></span> 
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        
        <button type="button" class="navbar-toggle nav-left-slide-btn">
            <span class="sr-only"><?php esc_html__( 'Toggle navigation', 'service-finder' ); ?></span> 
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        
        <div class="header-nav navbar-collapse collapse ">
		
        <?php 
		if(class_exists('service_finder_booking_plugin')) { 
			if(is_user_logged_in()){
				echo '<div class="extra-nav">';
				if(class_exists('aone_messaging')){
				echo do_shortcode( '[service_finder_message_notification_notopbar]');
				}
		
				if(class_exists('service_finder_booking_plugin')){
				echo do_shortcode( '[service_finder_notification_notopbar]');//For No Top Bar Home Page 
				}
				
				 $fullname = get_user_meta($current_user->ID,'first_name',true).' '.get_user_meta($current_user->ID,'last_name',true);

				  if($fullname == ' ' || $fullname == ''){

						  $fullname = ucfirst($current_user->display_name);

						  }
	
				  if(service_finder_UserRole($current_user->ID) == 'administrator'){

					$accounturl = admin_url( 'profile.php' );

				  }else{

					if ( function_exists( 'service_finder_get_url_by_shortcode' ) ) {

					$accounturl = service_finder_get_url_by_shortcode('[service_finder_my_account]');

					}else{

					$accounturl = service_finder_get_url_by_shortcodefortheme('[service_finder_my_account]');

					}

				  }
						  
				  if(service_finder_UserRole($current_user->ID) == 'Customer'){ 

						echo '<div class="extra-cell fs-customer-status2"><a href="'.esc_url($accounturl).'" data-delay="1000" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle btn btn-primary" aria-expanded="false"><i class="fa fa-user"></i> '.$fullname.' <b class="caret"></b></a>';

						$myaccount = $accounturl;

						if(get_option('permalink_structure')){

						$myaccount = $myaccount.'?';

						}else{

						$myaccount = $myaccount.'&';

						}

						?>

              <?php service_finder_customer_menu_items(); ?>
              </div>

              <?php }else{

						   echo '<div class="extra-cell"><a href="'.esc_url($accounturl).'" class="btn btn-primary"><i class="fa fa-user"></i>'.$fullname.'</a></div>';

						   } 
				  ?>
				  <div class="extra-cell"><a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>" class="btn btn-primary">
                  <i class="fa fa-sign-out"></i> <?php esc_html_e('Logout', 'service-finder'); ?>
                  </a></div>
                  
	            <?php if(is_author() && service_finder_themestyle_fortheme() != 'style-4'){ ?>
				<?php
                if(!empty($userCap)){
                if(in_array('bookings',$userCap)){
                ?>
                <?php if($settings['booking_process'] == 'on' && (!is_user_logged_in() || service_finder_getUserRole($current_user->ID) == 'Customer' || service_finder_getUserRole($current_user->ID) == 'administrator' || (service_finder_getUserRole($current_user->ID) == 'Provider' && $current_user->ID == $author) )){ ?>
    
                <div class="extra-cell">
    
                <?php if((!is_user_logged_in() && !$service_finder_options['guest-booking'])){ ?>
    
                <button class="btn btn-primary" data-action="login" data-redirect="no" data-toggle="modal" data-target="#login-Modal"><?php esc_html_e('Book now','service-finder')?></button>
    
              <?php }else{ ?>  
    
                <button class="btn btn-primary sf-booknow-btn"><?php esc_html_e('Book now','service-finder')?></button>
    
              <?php } ?>
    
                </div>  
    
                <?php } ?>
    
                <?php } ?>
    
                <?php 
    
                }
                
                } ?>
				  <?php	   
				  echo '</div>';
			}else{
			
			$loginsignuppopup = (!empty($service_finder_options['login-signup-popup'])) ? $service_finder_options['login-signup-popup'] : '';
			
			if($loginsignuppopup) {
			?>
			<div class="extra-nav"> 
            
                <div class="extra-cell">
                    <a href="javascript:void(0);" class="btn btn-primary" data-redirect="yes" data-action="login" data-toggle="modal" data-target="#login-Modal">
                    <i class="fa fa-user"></i><?php esc_html_e('Login', 'service-finder'); ?></a>
                </div>
                
                <div class="extra-cell">
                    <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-action="signup" data-target="#login-Modal">
                    <i class="fa fa-plus"></i><?php esc_html_e('Sign up', 'service-finder'); ?></a>
                </div>
            </div>	
			<?php
			}else{
			
			$signuppage = service_finder_get_url_by_shortcode('[service_finder_signup');
			$loginpage = service_finder_get_url_by_shortcode('[service_finder_login]');
			
			if($loginpage != '' || $signuppage != '') {
			?>
			<div class="extra-nav"> 
            
                <?php if($loginpage != '') { ?>
                <div class="extra-cell">
                    <a href="<?php echo esc_url($loginpage); ?>" class="btn btn-primary" data-redirect="yes">
                    <i class="fa fa-user"></i><?php esc_html_e('Login', 'service-finder'); ?></a>
                </div>
                <?php } ?>
                
                <?php if($signuppage != '') { ?>
                <div class="extra-cell">
                    <a href="<?php echo esc_url($signuppage); ?>" class="btn btn-primary">
                    <i class="fa fa-plus"></i><?php esc_html_e('Sign up', 'service-finder'); ?></a>
                </div>
                <?php } ?>
            </div>
			<?php
			}
			}
			}
		}

		if (has_nav_menu($service_finder_MenuLocation)) {
		wp_nav_menu( $menuArgs);
		}
		?>
        </div>
        
        <div class="body-overlay" style="display: none;"></div>
    </div>
      
  </div>
  <!-- No top bar header style end -->
</header>
<?php
}

/*My account header layout*/

function service_finder_myaccount_layout(){

global $current_user;

$userInfo = service_finder_getCurrentUserInfo();

?>

<header id="header-admin-wrap" class="header-admin-fixed">



<!-- Header Start -->

<div id="header-admin">

    <div class="container">

        

        <!-- Left Side Content -->

        <div class="header-left">

            <div class="nav-btn-wrap">

                <a class="nav-btn-admin" id="sidebarCollapse">

                    <span class="fa fa-reorder"></span>

                </a>                           

            </div>

        </div>

        

        <!-- Right Side Content -->

        <div class="header-right">

            <ul class="header-widget-wrap">

                <?php 

				if(class_exists('aone_messaging') && function_exists( 'aone_msg_myaccount_notification' )){

				echo do_shortcode( '[service_finder_myaccount_message_notification]');

				}

				if(class_exists('service_finder_booking_plugin')){

				echo do_shortcode( '[service_finder_myaccount_notification_bar]');

				}

				?>

                <li class="header-widget dropdown">

                    <div class="aon-admin-user dropdown-toggle" data-toggle="dropdown">

                        <div class="aon-admin-pic">

                        <?php if(service_finder_get_user_profile_image($userInfo['avatar_id']) != ""){ ?>

                        <img src="<?php echo esc_url(service_finder_get_user_profile_image($userInfo['avatar_id'])); ?>"> 

                        <?php } ?>

                        </div>

                        <span class="aon-admin-name">

						<?php 

						if(service_finder_UserRole($current_user->ID) == 'administrator'){

						echo sprintf(esc_html__('Hi, %s','service-finder'),ucfirst($current_user->display_name));

						}else{

						$fullname = get_user_meta($current_user->ID,'first_name',true).' '.get_user_meta($current_user->ID,'last_name',true); 

						echo sprintf(esc_html__('Hi, %s','service-finder'),$fullname);

						}

						?> 

						<i class="fa fa-arrow"></i></span>

                    </div>

                    <?php

                    if(service_finder_UserRole($current_user->ID) == 'administrator'){

						$accounturl = admin_url( 'profile.php' );

					}else{

						if ( function_exists( 'service_finder_get_url_by_shortcode' ) ) {

						$accounturl = service_finder_get_url_by_shortcode('[service_finder_my_account]');

					}else{

						$accounturl = service_finder_get_url_by_shortcodefortheme('[service_finder_my_account]');

						}

					}

					?>	

                    <ul class="dropdown-menu arrow-up sf-myaccounts-list">

                        <li><a href="<?php echo esc_url($accounturl); ?>"><i class="fa fa-gear"></i> <?php esc_html_e('My Profile','service-finder') ?> </a></li>

                        <li><a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>"><i class="fa fa-power-off"></i> <?php esc_html_e('Logout', 'service-finder'); ?></a></li>

                    </ul>  

                </li>

            </ul>

        </div>

        

    </div>

</div>

<!-- Header End -->



</header>

<?php

}



//Header Banner

function service_finder_header_slider(){

global $service_finder_globals;

$service_finder_options = $service_finder_globals;



wp_add_inline_script( 'service_finder-js-custom', 'jQuery("body").on("change", "#country", function(){

                    var country = jQuery(this).val();



					var data = {

						  "action": "load_cities",

						  "country": country

						};

						

				  var formdata = jQuery.param(data);

				  

				  jQuery.ajax({

			

									type: "POST",

			

									url: ajaxurl,

			

									data: formdata,

									

									dataType: "json",

									

									success:function (data, textStatus) {

										if(data["status"] == "success"){

											

											jQuery("select[name=\'city\']").html(data["html"]);

											jQuery("select[name=\'city\']").selectpicker("refresh");

										}

									

									}

			

								});

					



                });', 'after' );

$bgcolor = (!empty($service_finder_options['banner-bg-color'])) ? $service_finder_options['banner-bg-color'] : '';

$bgopacity = (!empty($service_finder_options['banner-opacity'])) ? $service_finder_options['banner-opacity'] : '';



$slideralias = (isset($service_finder_options['default-rev-slider'])) ? esc_attr($service_finder_options['default-rev-slider']) : '';

?>



<section class="sf-rev-slider-wrap">

  <?php if (class_exists('RevSliderFront')) { ?>

	<?php putRevSlider($slideralias, 'homepage'); ?>

    <?php } ?>	

  <!--Search form-->

  <?php 

  $homesearchbar = (!empty($service_finder_options['home-search-bar'])) ? $service_finder_options['home-search-bar'] : '';

  if(!$homesearchbar){ 

   $srhposition = (!empty($service_finder_options['search-bar-position'])) ? $service_finder_options['search-bar-position'] : 'bottom';

   if($srhposition == 'middle'){

   	$positionclass = 'pos-v-center';

   }else{

   	$positionclass = 'pos-v-bottom';

   }

   $classes = (service_finder_themestyle_fortheme() == 'style-2') ? 'sf-search-result' : '';

  ?>

  <div class="sf-find-bar <?php echo sanitize_html_class($classes); ?> <?php echo sanitize_html_class($positionclass); ?>">

    <div class="container">

      <?php if(service_finder_themestyle_fortheme() == 'style-2'){ ?>

      <ul class="sf-search-title clearfix">

            <li><?php echo esc_html__('Search Provider', 'service-finder'); ?></li>

        </ul>

       <?php } ?> 

      <?php $advanceclass = (service_finder_check_advance_search()) ? '' : 'sf-empty-radius'; ?>

      <div class="search-form <?php echo sanitize_html_class($advanceclass); ?>"> 

        <?php echo do_shortcode('[service_finder_search_form]'); ?>

      </div>

    </div>

  </div>

  <?php } ?>

</section>

<?php

}

//Header Banner

function service_finder_header_banner(){

global $service_finder_globals;

$service_finder_options = $service_finder_globals;


wp_add_inline_script( 'service_finder-js-custom', 'jQuery("body").on("change", "#country", function(){

                    var country = jQuery(this).val();



					var data = {

						  "action": "load_cities",

						  "country": country

						};

						

				  var formdata = jQuery.param(data);

				  

				  jQuery.ajax({

			

									type: "POST",

			

									url: ajaxurl,

			

									data: formdata,

									

									dataType: "json",

									

									success:function (data, textStatus) {

										if(data["status"] == "success"){

											

											jQuery("select[name=\'city\']").html(data["html"]);

											jQuery("select[name=\'city\']").selectpicker("refresh");

										}

									

									}

			

								});

					



                });', 'after' );

$bgcolor = (!empty($service_finder_options['banner-bg-color'])) ? $service_finder_options['banner-bg-color'] : '';

$bgopacity = (!empty($service_finder_options['banner-opacity'])) ? $service_finder_options['banner-opacity'] : '';

?>



<section class="sf-banner-row">

<?php if(!empty($service_finder_options['header-bg-image']['url'])){ ?>

  <div class="sf-banner-outer sf-overlay-wrapper">

    <div class="sf-bnr-pic"> 

    <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?>;"></div>

    <img src="<?php echo (!empty($service_finder_options['header-bg-image']['url'])) ? esc_url($service_finder_options['header-bg-image']['url']) : '' ?>" width="1919" height="910"> 

    </div>

    <div class="sf-bnr-text text-center">

      <div class="container"> <strong class="text-uppercase">

        <?php echo (!empty($service_finder_options['banner-heading'])) ? $service_finder_options['banner-heading'] : ''; ?>

        </strong> <span>

        <?php echo (!empty($service_finder_options['banner-subheading'])) ? $service_finder_options['banner-subheading'] : ''; ?>

        </span> </div>

    </div>

  </div>

 <?php } ?> 

  <!--Search form-->

  <?php 

  $homesearchbar = (!empty($service_finder_options['home-search-bar'])) ? $service_finder_options['home-search-bar'] : '';

  if(!$homesearchbar){ 

   $srhposition = (!empty($service_finder_options['search-bar-position'])) ? $service_finder_options['search-bar-position'] : 'bottom';

   if($srhposition == 'middle'){

   	$positionclass = 'pos-v-center';

   }else{

   	$positionclass = 'pos-v-bottom';

   }

   $classes = (service_finder_themestyle_fortheme() == 'style-2') ? 'sf-search-result' : '';

  ?>

  <div class="sf-find-bar <?php echo sanitize_html_class($classes); ?> <?php echo sanitize_html_class($positionclass); ?>">

    <div class="container">

      <?php if(service_finder_themestyle_fortheme() == 'style-2'){ ?>

      <ul class="sf-search-title clearfix">

            <li><?php echo esc_html__('Search Provider', 'service-finder'); ?></li>

        </ul>

       <?php } ?> 

      <?php $advanceclass = (service_finder_check_advance_search()) ? '' : 'sf-empty-radius'; ?>

      <div class="search-form <?php echo sanitize_html_class($advanceclass); ?>"> 

        <?php echo do_shortcode('[service_finder_search_form]'); ?>

      </div>

    </div>

  </div>

  <?php } ?>

</section>

<?php
}

function service_finder_header_banner_style_4(){

global $service_finder_globals;

$service_finder_options = $service_finder_globals;



wp_add_inline_script( 'service_finder-js-custom', 'jQuery("body").on("change", "#country", function(){

                    var country = jQuery(this).val();



					var data = {

						  "action": "load_cities",

						  "country": country

						};

						

				  var formdata = jQuery.param(data);

				  

				  jQuery.ajax({

			

									type: "POST",

			

									url: ajaxurl,

			

									data: formdata,

									

									dataType: "json",

									

									success:function (data, textStatus) {

										if(data["status"] == "success"){

											

											jQuery("select[name=\'city\']").html(data["html"]);

											jQuery("select[name=\'city\']").selectpicker("refresh");

										}

									

									}

			

								});

					



                });', 'after' );

$bgcolor = (!empty($service_finder_options['banner-bg-color'])) ? $service_finder_options['banner-bg-color'] : '';

$bgopacity = (!empty($service_finder_options['banner-opacity'])) ? $service_finder_options['banner-opacity'] : '';
?>

<section class="sf-banner-row sf-banner-two">

    <div class="sf-banner-outer sf-overlay-wrapper">
        <div class="sf-bnr-pic">
            <div class="sf-curve-area"></div>
            <div class="sf-overlay-main" style="opacity:<?php echo esc_attr($bgopacity); ?>; background-color:<?php echo esc_attr($bgcolor); ?>;"></div>
            <img src="<?php echo (!empty($service_finder_options['header-bg-image']['url'])) ? esc_url($service_finder_options['header-bg-image']['url']) :  get_template_directory_uri().'/inc/images/banner/bnr2.jpg'; ?>" width="1919" height="976" alt="">
        </div>
        <div class="sf-bnr-text">
            <div class="container"> 
                <div class="sf-bnr-write">
                    <div class="text-top-line"><?php echo (!empty($service_finder_options['banner-heading'])) ? $service_finder_options['banner-heading'] : ''; ?> </div>
                    <div class="text-bot-line"><?php echo (!empty($service_finder_options['banner-subheading'])) ? $service_finder_options['banner-subheading'] : ''; ?></div>
                </div>
            </div>
        </div>
    </div>
    <?php $advanceclass = (service_finder_check_advance_search()) ? '' : 'sf-empty-radius'; ?>
    <div class="sf-find-bar sf-findBar-vertical">
      <div class="container">
        <div class="search-form <?php echo sanitize_html_class($advanceclass); ?>">
          <?php echo do_shortcode('[service_finder_search_form]'); ?>
        </div>
      </div>
    </div>
    
</section>

<?php
}

function service_finder_header_banner_style_4_2(){

global $service_finder_globals;

$service_finder_options = $service_finder_globals;



wp_add_inline_script( 'service_finder-js-custom', 'jQuery("body").on("change", "#country", function(){

                    var country = jQuery(this).val();



					var data = {

						  "action": "load_cities",

						  "country": country

						};

						

				  var formdata = jQuery.param(data);

				  

				  jQuery.ajax({

			

									type: "POST",

			

									url: ajaxurl,

			

									data: formdata,

									

									dataType: "json",

									

									success:function (data, textStatus) {

										if(data["status"] == "success"){

											

											jQuery("select[name=\'city\']").html(data["html"]);


											jQuery("select[name=\'city\']").selectpicker("refresh");

										}

									

									}

			

								});

					



                });', 'after' );

$bgcolor = (!empty($service_finder_options['banner-bg-color'])) ? $service_finder_options['banner-bg-color'] : '';

$bgopacity = (!empty($service_finder_options['banner-opacity'])) ? $service_finder_options['banner-opacity'] : '';
?>

<section class="aon-banner-area2">

    <!--banner 2-->

    <div class="container">

        <div class="aone-banner-area2-inner">

            <div class="row d-flex align-items-center">

                <!--Banner Left-->

                <div class="col-lg-5 col-md-5">

                    <div class="aon-bnr2-content-wrap">

                        <!--Banner Text-->

                        <div class="aon-bnr-write">

                            <h2 class="text-top-line">
                            	
                                <?php echo (!empty($service_finder_options['banner-heading'])) ? $service_finder_options['banner-heading'] : ''; ?>

                            </h2>

                            <h2 class="text-bot-line">
                            <?php echo (!empty($service_finder_options['banner-subheading'])) ? $service_finder_options['banner-subheading'] : ''; ?>
                            </h2>

                        </div>

                        <!--Banner Text End-->

                        <!--Seach Bar-->
						<?php $advanceclass = (service_finder_check_advance_search()) ? '' : 'sf-empty-radius'; ?>
                        <div class="aon-bnr2-search-bar search-form <?php echo sanitize_html_class($advanceclass); ?>">

                            <?php echo do_shortcode('[service_finder_search_form]'); ?>

                        </div>

                        <!--Seach Bar End-->

                    </div>

                </div>

                <!--Banner Right-->

                <div class="col-lg-7 col-md-7">

                    <div class="aon-bnr2-media-wrap">

                        <!-- COLUMNS 1 -->

                        <div class="aon-bnr2-media">
                        
                            <img src="<?php echo (!empty($service_finder_options['header-bg-image']['url'])) ? esc_url($service_finder_options['header-bg-image']['url']) :  esc_url(get_template_directory_uri().'/inc/images/banner2/1.png'); ?>" alt="">

                        </div>

                        <!-- COLUMNS 2 -->

                        <div class="aon-bnr2-lines-left">

                            <div class="aon-bnr2-line-left-content">

                                <img src="<?php echo esc_url(get_template_directory_uri().'/inc/images/banner2/line-left.png'); ?>" alt="">

                                <span class="circle-l-1 slide-fwd-center"></span>

                                <span class="circle-l-2 slide-fwd-center2"></span>

                                <span class="circle-l-3 slide-fwd-center3"></span>

                            </div>

                        </div>

                        <!-- COLUMNS 3 -->

                        <div class="aon-bnr2-lines-right">

                            <img src="<?php echo esc_url(get_template_directory_uri().'/inc/images/banner2/line-right.png'); ?>" alt="">

                            <span class="circle-r-1 slide-fwd-center3"></span>

                            <span class="circle-r-2 slide-fwd-center2"></span>

                            <span class="circle-r-3 slide-fwd-center"></span>

                        </div>

                    </div>

                </div>

                

            </div>

        </div>

    </div>

    <!--banner 2-->

</section>

<?php
}

//Header style

function service_finder_header_style(){

global $service_finder_globals;

$service_finder_options = $service_finder_globals;



$headerstyle = (!empty($service_finder_options['header-style'])) ? $service_finder_options['header-style'] : '';

if($headerstyle == 'map'){
	if(service_finder_show_map_on_site_fortheme()){
		return 'map';
	}else{
		return 'banner';
	}
}else{
	return $headerstyle;
}

}

function service_finder_banner_style(){
global $service_finder_globals, $service_finder_options;

$bannerstyle = (!empty($service_finder_options['banner-style'])) ? $service_finder_options['banner-style'] : '';

return $bannerstyle;

}

/*It will use in theme style 4 for home page style 1 & 2*/
if ( ! function_exists( 'service_finder_get_home_page_style' ) ) {
function service_finder_get_home_page_style(){
global $service_finder_globals, $service_finder_options;

$homepagestyle = (!empty($service_finder_options['home-page-style'])) ? $service_finder_options['home-page-style'] : '2';

return $homepagestyle;

}
}


//Sub header

function service_finder_sub_header(){

global $service_finder_globals;

$service_finder_options = $service_finder_globals;



$subheader = (!empty($service_finder_options['sub-header'])) ? $service_finder_options['sub-header'] : '';

return $subheader;

}



//Contact us banner image

function service_finder_contactus_banner(){

global $service_finder_globals;

$service_finder_options = $service_finder_globals;



$bannerimg = (!empty($service_finder_options['contact-sub-header-bg-image']['url'])) ? $service_finder_options['contact-sub-header-bg-image']['url'] : ''; 

return $bannerimg;

}



//Inner page banner image

function service_finder_innerpage_banner(){

global $service_finder_globals;

$service_finder_options = $service_finder_globals;



$bannerimg = (!empty($service_finder_options['inner-sub-header-bg-image']['url'])) ? $service_finder_options['inner-sub-header-bg-image']['url'] : '';

return $bannerimg;

}



//Breadcrumb

function service_finder_breadcrumb(){

global $service_finder_globals;

$service_finder_options = $service_finder_globals;



$breadcrumbs = (!empty($service_finder_options['breadcrumbs'])) ? $service_finder_options['breadcrumbs'] : '';

return $breadcrumbs;

}



/*Load Markers for Home Page*/	

add_action( 'wp_ajax_load-markers', 'service_finder_load_markers' );

add_action( 'wp_ajax_nopriv_load-markers', 'service_finder_load_markers' );



function service_finder_load_markers() {

   

   global $service_finder_ThemeParams, $wpdb, $service_finder_options;



   $getProviders = new SERVICE_FINDER_searchProviders();

	

   $providersInfoArr = $getProviders->service_finder_getProvidersMarkers(esc_attr($_POST['allproviers']),esc_attr($_POST['address']),esc_attr($_POST['city']),esc_attr($_POST['catid']),esc_attr($_POST['country']));

   

   $providersInfo = $providersInfoArr['srhResult'];

   $count = $providersInfoArr['count'];

	

	$markers = '';

	if(!empty($providersInfo)){ 

	foreach($providersInfo as $provider){



	$userLink = get_author_posts_url($provider->wp_user_id);



	if(!empty($provider->avatar_id) && $provider->avatar_id > 0){

		$src  = wp_get_attachment_image_src( $provider->avatar_id, 'service_finder-provider-thumb' );

		$src  = $src[0];

	}else{

		$src  = '';

	}

	

	$catid = get_user_meta($provider->wp_user_id,'primary_category',true);

	

	

	$icon = service_finder_getCategoryIcon($catid);

	if($icon == ""){

	$icon = (!empty($service_finder_options['default-map-marker-icon']['url'])) ? $service_finder_options['default-map-marker-icon']['url'] : '';

	}

	

	$markeraddress = service_finder_getAddress($provider->wp_user_id);

	

	$companyname = service_finder_getCompanyName($provider->wp_user_id);



	$companyname = str_replace(array("\n", "\r", '"', "'"), ' ', $companyname);



	$companyname = preg_replace('/\t+/', '', $companyname);



	



	$full_name = str_replace(array("\n", "\r", '"', "'"), ' ', $provider->full_name);



	$full_name = preg_replace('/\t+/', '', $full_name);



	



	$markeraddress = str_replace(array("\n", "\r", '"', "'"), ' ', $markeraddress);



	$markeraddress = str_replace('\t', '', $markeraddress);

	



	$catname = service_finder_getCategoryName(get_user_meta($provider->wp_user_id,'primary_category',true));

	

	$catname = str_replace(array("\n", "\r", '"', "'"), ' ', $catname);



	$catname = str_replace('\t', '', $catname);

	

	$categorycolor = service_finder_getCategoryColor(get_user_meta($provider->wp_user_id,'primary_category',true));

	

	//Create Markers

	$markers .= '["'.stripcslashes($full_name).'","'.$provider->lat.'","'.$provider->long.'","'.$src.'","'.$icon.'","'.$userLink.'","'.$provider->wp_user_id.'","'.$catname.'","'.stripcslashes($markeraddress).'","'.stripcslashes($companyname).'","'.$categorycolor.'"],';

	

     }

	 	if($_POST['city'] == 'New York'){

			$newcity = $_POST['city'].', NY';

		}else{

			$newcity = $_POST['city'];

		}

		

		if($_POST['address'] != ""){

			$address = str_replace(" ","+",$_POST['address']);

			$res = service_finder_getLatLong($address);

			$lat = $res['lat'];

			$lng = $res['lng'];

		}elseif($_POST['address'] == "" && $_POST['city'] != "" && $_POST['country'] != ""){

			$address = str_replace(" ","+",$newcity).'+'.str_replace(" ","+",$_POST['country']);

			$res = service_finder_getLatLong($address);

			$lat = $res['lat'];

			$lng = $res['lng'];

		}elseif($_POST['address'] == "" && $_POST['city'] == "" && $_POST['country'] != ""){

			$address = str_replace(" ","+",$_POST['country']);

			$res = service_finder_getLatLong($address);

			$lat = $res['lat'];

			$lng = $res['lng'];

		}elseif($_POST['address'] == "" && $_POST['city'] != "" && $_POST['country'] == ""){

			$defaultcountry = (!empty($service_finder_options['default-country'])) ? $service_finder_options['default-country'] : '';

			if($defaultcountry != ""){

			$address = str_replace(" ","+",$newcity).'+'.str_replace(" ","+",$defaultcountry);

			}else{

			$address = str_replace(" ","+",$newcity);

			}

			$res = service_finder_getLatLong($address);

			$lat = $res['lat'];

			$lng = $res['lng'];

		}

			

		



	}else{

		if($_POST['city'] == 'New York'){

			$newcity = $_POST['city'].', NY';

		}else{

			$newcity = $_POST['city'];

		}

	

		if($_POST['address'] != ""){

			$address = str_replace(" ","+",$_POST['address']);

			$res = service_finder_getLatLong($address);

			$lat = $res['lat'];

			$lng = $res['lng'];

		}elseif($_POST['address'] == "" && $_POST['city'] != ""){

			$address = str_replace(" ","+",$newcity);

			$res = service_finder_getLatLong($address);

			$lat = $res['lat'];

			$lng = $res['lng'];

		}elseif($_POST['address'] == "" && $_POST['city'] == "" && $_POST['country'] != ""){

			$address = str_replace(" ","+",$_POST['country']);

			$res = service_finder_getLatLong($address);

			$lat = $res['lat'];

			$lng = $res['lng'];

		}elseif($_POST['address'] == "" && $_POST['city'] != "" && $_POST['country'] == ""){

			

			$defaultcountry = (!empty($service_finder_options['default-country'])) ? $service_finder_options['default-country'] : '';

			if($defaultcountry != ""){

			$address = str_replace(" ","+",$newcity).'+'.str_replace(" ","+",$defaultcountry);

			}else{

			$address = str_replace(" ","+",$newcity);

			}

			$res = service_finder_getLatLong($address);

			$lat = $res['lat'];

			$lng = $res['lng'];

		}

	

	}

	

		$markers = rtrim($markers,',');

		$markers = '[ '.$markers.' ]';

		

		$lat = (isset($lat)) ? $lat : '';

		$lng = (isset($lng)) ? $lng : '';

		

		$resarr = array(

					'catid' => $_POST['catid'],

					'address' => $_POST['address'],

					'city' => $_POST['city'],

					'country' => $_POST['country'],

					'lat' => $lat,

					'lng' => $lng,

					'count' => $count,

					'markers' => $markers

				);

		

		echo json_encode($resarr);		

		

    exit();

}



/*Generate style.css file from styles.php for dynamic css from framework*/

function service_finder_generate_options_css($newdata) {

	global $wp_filesystem,$wpdb, $service_finder_options;

	$data = $newdata;	

	$css_dir = get_template_directory();

	ob_start();
	
	if($newdata['profileurlby'] != $service_finder_options['profileurlby']){
		service_finder_update_profile_url($newdata['profileurlby']);
	}
	
	if($newdata['default-city'] != $service_finder_options['default-city'] || $newdata['default-country'] != $service_finder_options['default-country']){
		
		$address = $newdata['default-city'].' '.$newdata['default-country'];
		$address = str_replace(" ","+",$address);
		$res = service_finder_getLatLong($address);
		$defaultlat = $res['lat'];
		$defaultlng = $res['lng'];
		
		update_option('defaultlat',$defaultlat);
		update_option('defaultlng',$defaultlng);
	}
	
	if($newdata['address'] != $service_finder_options['address']){
		
		$address = $newdata['address'];
		$address = str_replace(" ","+",$address);
		$res = service_finder_getLatLong($address);
		$defaultlat = $res['lat'];
		$defaultlng = $res['lng'];
		
		update_option('contactmap_lat',$defaultlat);
		update_option('contactmap_lng',$defaultlng);
	}

	$blogTemplate = 'templates/'.$newdata['blog-templates'].'.php';

	$contactTemplate = 'templates/'.$newdata['contact-templates'].'.php';

	$table_name = $wpdb->prefix . 'postmeta';

	$contactPages = $wpdb->get_results('SELECT post_id from '.$table_name.' where `meta_key` = "_wp_page_template" and `meta_value` IN ("templates/contact-us.php","templates/contact-us-v2.php","templates/contact-us-v3.php","templates/contact-us-v4.php","templates/contact-us-v5.php")');

	

	$defaultBlogPages = $wpdb->get_results('SELECT post_id from '.$table_name.' where `meta_key` = "_wp_page_template" and `meta_value` IN ("templates/blog-standard.php","templates/blog-grid-2.php","templates/blog-grid-3.php","templates/blog-left-sidebar.php","templates/blog-no-sidebar.php","templates/blog-right-sidebar.php")');

	

	$page_for_posts = get_option('page_for_posts');

	update_post_meta($page_for_posts, '_wp_page_template', $blogTemplate);

	if(!empty($contactPages)) {

		foreach($contactPages as $contactPage){

			$contactPageID = $contactPage->post_id;

			update_post_meta($contactPageID, '_wp_page_template', $contactTemplate);

		}

	}

	

	if(!empty($defaultBlogPages)) {

		foreach($defaultBlogPages as $defaultBlogPage){

			$defaultBlogPageID = $defaultBlogPage->post_id;

			update_post_meta($defaultBlogPageID, '_wp_page_template', $blogTemplate);

		}

	}

				

	require(get_template_directory() . '/styles.php'); // Generate CSS



	$css = ob_get_clean(); // Get generated CSS (output buffering)

	WP_Filesystem();

	$wp_filesystem->put_contents(get_template_directory() . '/style.css', $css, FS_CHMOD_FILE); // Save it

	

}


//Save Post Hook

function service_finder_update_page_template( $post_id, $post, $update ) {

global $service_finder_options;



if($post->page_template == 'templates/contact-us.php' || $post->page_template == 'templates/contact-us-v2.php' || $post->page_template == 'templates/contact-us-v3.php' || $post->page_template == 'templates/contact-us-v4.php' || $post->page_template == 'templates/contact-us-v5.php'){

$tem = explode('.ph',basename($post->page_template));

$service_finder_options['contact-templates'] = $tem[0];

update_option('service_finder_options',$service_finder_options);

}



if($post->page_template == 'templates/blog-standard.php' || $post->page_template == 'templates/blog-grid-2.php' || $post->page_template == 'templates/blog-grid-3.php' || $post->page_template == 'templates/blog-left-sidebar.php' || $post->page_template == 'templates/blog-no-sidebar.php' || $post->page_template == 'templates/blog-right-sidebar.php'){

$tem = explode('.ph',basename($post->page_template));

$service_finder_options['blog-templates'] = $tem[0];

update_option('service_finder_options',$service_finder_options);

}



}

add_action( 'save_post', 'service_finder_update_page_template', 10, 3 );



/*Get Page ID By Its Slug for theme*/

function service_finder_get_id_by_slug_theme($page_slug) {

    $page = get_page_by_path($page_slug);

    if ($page) {

        return $page->ID;

    } else {

        return null;

    }

}



/*Add Custom classes for default widget*/

add_filter('dynamic_sidebar_params', 'service_finder_add_classes_to_widget'); 

function service_finder_add_classes_to_widget($params){
	//echo 'hello';
	//echo '<pre>';print_r($params);echo '</pre>';
	
	$classe_to_add = '';

	switch($params[0]['widget_name']){

	case 'Search':

		$classe_to_add = 'bx-search ';

		break;

	case 'Recent Comments':

		$classe_to_add = 'bx-recent-comments ';

		break;

	case 'Recent Posts':

		$classe_to_add = 'bx-recent-post ';

		break;

	case 'Recent Posts with Thumbnail':

		$classe_to_add = 'bx-recent-post-thumbnail recent-posts-entry ';

		break;

	case 'Archives':

		$classe_to_add = 'bx-archives ';

		break;

	case 'Categories':

		$classe_to_add = 'bx-categories ';

		break;

	case 'Meta':

		$classe_to_add = 'bx-meta ';

		break;

	case 'Calendar':

		$classe_to_add = 'bx-calendar ';

		break;

	case 'Custom Menu':

		$classe_to_add = 'bx-custom-menu ';

		break;

	case 'Pages':

		$classe_to_add = 'bx-pages ';

		break;

	case 'RSS':

		$classe_to_add = 'bx-rss ';

		break;

	case 'Tag Cloud':

		$classe_to_add = 'bx-tag-cloud ';

		break;

	case 'Text':

		$classe_to_add = 'bx-text ';

		break;					

	}

    $classe_to_add = 'class="'.$classe_to_add;

    $params[0]['before_widget'] = str_replace('class="',$classe_to_add,$params[0]['before_widget']);



	

    return $params;

} 



// SERVICE_FINDER_MultiPostThumbnails Class calling

if (class_exists('SERVICE_FINDER_MultiPostThumbnails')) {

    new SERVICE_FINDER_MultiPostThumbnails(array(

        'label' => esc_html__('Banner Image', 'service-finder'),

        'id' => 'banner-image',

        'post_type' => 'page'

        )

    );

};



/*Get User Role By ID*/

function service_finder_UserRole($userid){

	$user = new WP_User( $userid );

	return (!empty($user->roles[0])) ? $user->roles[0] : '';

}



/*Get page url by shortcode call withing that page*/

function service_finder_get_url_by_shortcodefortheme($shortcode) {

	global $wpdb;



	$url = '';



	$sql = 'SELECT ID FROM '.$wpdb->posts.' WHERE post_type = "page" AND post_status="publish" AND post_content LIKE "%'.$shortcode.'%"';



	if ($id = $wpdb->get_var($sql)) {

		$url = get_permalink($id);

	}



	return $url;

}



/*Get page id by shortcode call withing that page*/

function service_finder_get_id_by_shortcodefortheme($shortcode) {

	global $wpdb;



	$url = '';

	$pageids = array();

	$sql = 'SELECT ID FROM ' . $wpdb->posts . ' WHERE post_type = "page" AND post_status="publish" AND post_content LIKE "%'.$shortcode.'%"';

	

	if ($results = $wpdb->get_results($sql)) {

		foreach($results as $res){

			$pageids[] = $res->ID;

		}

	}

	return $pageids;

	

}



/*Add inline css for admin TGM Plugin*/

function service_finder_custom_inline_css() {

	   echo '<style type="text/css">

		   .update-nag{display:block;clear:both;}

		 </style>';

}

add_action('admin_head', 'service_finder_custom_inline_css');



function service_finder_map_response(){

global $service_finder_options;



$serverkeyresponse = (!empty($service_finder_options['server-key-response'])) ? $service_finder_options['server-key-response'] : '';



if($serverkeyresponse){



	$apikey = (!empty($service_finder_options['server-api-key'])) ? $service_finder_options['server-api-key'] : '';

	

	$address = 'jaipur';

	

	$url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&key='.$apikey;

	

	$feeds = json_decode(wp_remote_fopen($url));

	

	if($feeds->status == 'OK')

	{

	?>

    <div class="notice notice-success is-dismissible">

        <p><?php esc_html_e( 'Server API key for map is configured successfully', 'service-finder' ); ?></p>

    </div>

    <?php

	}else{

	?>

    <div class="error notice is-dismissible">

        <p><?php echo wp_kses_post($feeds->error_message); ?></p>

    </div>

    <?php

	}

}

}

add_action( 'admin_notices', 'service_finder_map_response' );



/*Get Lat Long By Address*/

/* Get geocodes by custom address*/

function service_finder_getLatLong_for_theme($address) 

{

	global $service_finder_options;

	

	$apikey = (!empty($service_finder_options['server-api-key'])) ? $service_finder_options['server-api-key'] : '';

	

	$url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&key='.$apikey;

	

	$feeds = json_decode(wp_remote_fopen($url));

	

	if($feeds->status == 'OK')

	{

		$lat = $feeds->results[0]->geometry->location->lat;

		$lng = $feeds->results[0]->geometry->location->lng;

		

		$result = array(

				'status' => $feeds->status,

				'lat' => $lat,

				'lng' => $lng,

		);

		

	}else{

		$result = array(

				'status' => $feeds->status,

				'error_message' => $feeds->error_message,

		);

	}

	return $result;

}



function service_finder_contactmap($lat,$lng,$h,$w,$title)

{

global $service_finder_options;

$defaults = array('general_latitude'=>$lat,'general_longitude'=>$lng,'path'=>'','idx_status'=>'0','page_custom_zoom'=>'12','markers'=>'','generated_pins'=>'0');



$height = $h;



$html = '<!-- Google Map -->

<div id="gmap_wrapper"   data-post_id="661" data-cur_lat="0" data-cur_long="0"  style="height:'.$h.'"  >

	<span id="isgooglemap" data-isgooglemap="1"></span>       

   

	<div id="gmap-controls-wrapper">

		<div id="gmapzoomplus"><i class="fa fa-plus"></i></div>

		<div id="gmapzoomminus"><i class="fa fa-minus"></i></div>

		<div  id="gmap-full"><i class="fa fa-arrows-alt"></i></div>

	</div>

	<div id="googleMap"  style="height:'.$h.'">   

	</div>    

   <div class="tooltip"> click to enable zoom</div>

   <div id="gmap-loading">     

		<div class="loader-inner ball-pulse"  id="listing_loader_maps">

			<div class="double-bounce1"></div>

			<div class="double-bounce2"></div>

		</div>

   </div>

  

</div>    

<!-- END Google Map --> ';		



$imagepath = get_template_directory_uri().'/inc/images/markers';



$administrativeColor = (!empty($service_finder_options['map-color-administrative'])) ? $service_finder_options['map-color-administrative'] : '#0088ff';

$landscapeColor = (!empty($service_finder_options['map-color-landscape'])) ? $service_finder_options['map-color-landscape'] : '#ff0000';

$poiColor = (!empty($service_finder_options['map-color-poi-government'])) ? $service_finder_options['map-color-poi-government'] : '#aaaaaa';

$roadGeometryColor = (!empty($service_finder_options['map-color-road-geometry'])) ? $service_finder_options['map-color-road-geometry'] : '#f0ece9';

$roadLabelsColor = (!empty($service_finder_options['map-color-road-labels'])) ? $service_finder_options['map-color-road-labels'] : '#ccdca1';

$waterAllColor = (!empty($service_finder_options['map-color-water-all'])) ? $service_finder_options['map-color-water-all'] : '#767676';

$waterGeometryColor = (!empty($service_finder_options['map-color-water-geometry'])) ? $service_finder_options['map-color-water-geometry'] : '#ffffff';

$waterLabelsColor = (!empty($service_finder_options['map-color-water-labels'])) ? $service_finder_options['map-color-water-labels'] : '#b8cb93';



wp_add_inline_script( 'service_finder-js-theme-gmapfunctions', 'var mapfunctions_vars = {"path":"'.esc_js($imagepath).'","pin_images":"{}","geolocation_radius":"1000","adv_search":"","in_text":"","zoom_cluster":"12","user_cluster":"yes","generated_pins":"0","geo_no_pos":"The browser couldn\'t detect your position!","geo_no_brow":"Geolocation is not supported by this browser.","map_style":"[{\"featureType\":\"water\",\"stylers\":[{\"saturation\":43},{\"lightness\":-11},{\"hue\":\"'.esc_js($administrativeColor).'\"}]},{\"featureType\":\"road\",\"elementType\":\"geometry.fill\",\"stylers\":[{\"hue\":\"'.esc_js($landscapeColor).'\"},{\"saturation\":-100},{\"lightness\":99}]},{\"featureType\":\"road\",\"elementType\":\"geometry.stroke\",\"stylers\":[{\"color\":\"'.esc_js($poiColor).'\"},{\"lightness\":54}]},{\"featureType\":\"landscape.man_made\",\"elementType\":\"geometry.fill\",\"stylers\":[{\"color\":\"'.esc_js($roadGeometryColor).'\"}]},{\"featureType\":\"poi.park\",\"elementType\":\"geometry.fill\",\"stylers\":[{\"color\":\"'.esc_js($roadLabelsColor).'\"}]},{\"featureType\":\"road\",\"elementType\":\"labels.text.fill\",\"stylers\":[{\"color\":\"'.esc_js($waterAllColor).'\"}]},{\"featureType\":\"road\",\"elementType\":\"labels.text.stroke\",\"stylers\":[{\"color\":\"'.esc_js($waterGeometryColor).'\"}]},{\"featureType\":\"poi\",\"stylers\":[{\"visibility\":\"off\"}]},{\"featureType\":\"landscape.natural\",\"elementType\":\"geometry.fill\",\"stylers\":[{\"visibility\":\"on\"},{\"color\":\"'.esc_js($waterLabelsColor).'\"}]},{\"featureType\":\"poi.park\",\"stylers\":[{\"visibility\":\"on\"}]},{\"featureType\":\"poi.sports_complex\",\"stylers\":[{\"visibility\":\"on\"}]},{\"featureType\":\"poi.medical\",\"stylers\":[{\"visibility\":\"on\"}]},{\"featureType\":\"poi.business\",\"stylers\":[{\"visibility\":\"simplified\"}]}]"};', 'before' );



return $html;	

}



//Customizer live preview css update

add_filter( 'redux/customizer/live_preview', 'service_finder_livepreview' );

function service_finder_livepreview() {

global $service_finder_globals,$wp_filesystem,$wpdb;

$data = $service_finder_globals;



	if ( empty( $wp_filesystem ) ) {

          require_once ABSPATH . '/wp-admin/includes/file.php';

          WP_Filesystem();

    }



	$css_dir = get_template_directory();

	ob_start();



	require(get_template_directory() . '/styles.php'); // Generate CSS



	$css = ob_get_clean(); // Get generated CSS (output buffering)

	$wp_filesystem->put_contents(get_template_directory() . '/inc/css/preview.css', $css, FS_CHMOD_FILE); // Save it



}



// Custom CSS for Redux Framework admin panel

function service_finder_custom_redux_css() {

  wp_dequeue_style( 'redux-admin-css' );

  wp_register_style(

  'service_finder-redux-admin-css',

  get_template_directory_uri().'/inc/css/redux-admin.css',

  array(),

  time(),

  'all'

  );    

   wp_enqueue_style('service_finder-redux-admin-css');

}

add_action( 'redux/page/service_finder_options/enqueue', 'service_finder_custom_redux_css' );



//Save customizer data

function service_finder_customizer_save(){

global $service_finder_globals,$wp_filesystem,$wpdb;

$data = $service_finder_globals;

	if ( empty( $wp_filesystem ) ) {

          require_once ABSPATH . '/wp-admin/includes/file.php';

          WP_Filesystem();

    }



	$css_dir = get_template_directory();

	ob_start();



	require(get_template_directory() . '/inc/css/preview.css'); // Generate CSS



	$css = ob_get_clean(); // Get generated CSS (output buffering)

	$wp_filesystem->put_contents(get_template_directory() . '/style.css', $css, FS_CHMOD_FILE); // Save it

}

add_action( 'customize_save_after', 'service_finder_customizer_save' );



//Reset preview css

add_filter('redux/options/service_finder_options/reset', 'service_finder_reset_preview', 10, 3);

add_filter('redux/options/service_finder_options/section/reset', 'service_finder_reset_preview', 10, 3);

if ( ! function_exists( 'service_finder_reset_preview' ) ) {

function service_finder_reset_preview( $values ) {

global $service_finder_globals,$wp_filesystem,$wpdb;

$data = $service_finder_globals;



	if ( empty( $wp_filesystem ) ) {

          require_once ABSPATH . '/wp-admin/includes/file.php';

          WP_Filesystem();

    }



	$css_dir = get_template_directory();

	ob_start();



	require(get_template_directory() . '/styles.php'); // Generate CSS



	$css = ob_get_clean(); // Get generated CSS (output buffering)

	$wp_filesystem->put_contents(get_template_directory() . '/inc/css/preview.css', $css, FS_CHMOD_FILE); // Save it

}

}



/*Get currecy code*/

if ( !function_exists( 'service_finder_currencycode' ) ){

function service_finder_currencycode(){

global $service_finder_options;

$currency = (!empty($service_finder_options['currency-code'])) ? $service_finder_options['currency-code'] : 'USD';

return $currency;

}

}



/*Get currecy symbol*/

if ( !function_exists( 'service_finder_currencysymbol' ) ){

function service_finder_currencysymbol(){

global $service_finder_options;

$currency = (!empty($service_finder_options['currency-code'])) ? $service_finder_options['currency-code'] : 'USD';



switch ( $currency ) {

		case 'AED' :

			$currency_symbol = 'AED';

			break;

		case 'BDT':

			$currency_symbol = '&#2547;&nbsp;';

			break;

		case 'BRL' :

			$currency_symbol = '&#82;&#36;';

			break;

		case 'BGN' :

			$currency_symbol = '&#1083;&#1074;.';

			break;

		case 'AUD' :

		case 'CAD' :

		case 'CLP' :

		case 'COP' :

		case 'MXN' :

		case 'NZD' :

		case 'HKD' :

		case 'SGD' :

		case 'USD' :

			$currency_symbol = '&#36;';

			break;

		case 'EUR' :

			$currency_symbol = '&euro;';

			break;

		case 'CNY' :

		case 'RMB' :

		case 'JPY' :

			$currency_symbol = '&yen;';

			break;

		case 'RUB' :

			$currency_symbol = '&#1088;&#1091;&#1073;.';

			break;

		case 'KRW' : $currency_symbol = '&#8361;'; break;

        	case 'PYG' : $currency_symbol = '&#8370;'; break;

		case 'TRY' : $currency_symbol = '&#8378;'; break;

		case 'NOK' : $currency_symbol = '&#107;&#114;'; break;

		case 'ZAR' : $currency_symbol = '&#82;'; break;

		case 'CZK' : $currency_symbol = '&#75;&#269;'; break;

		case 'DZD' : $currency_symbol = 'DA'; break;

		case 'MYR' : $currency_symbol = '&#82;&#77;'; break;

		case 'DKK' : $currency_symbol = 'kr.'; break;

		case 'GYD' : $currency_symbol = 'GY$'; break;

		case 'GHS' : $currency_symbol = 'GH&#8373;'; break;

		case 'HUF' : $currency_symbol = '&#70;&#116;'; break;

		case 'IDR' : $currency_symbol = 'Rp'; break;

		case 'INR' : $currency_symbol = '&#8377;'; break;
		
		case 'PKR' : $currency_symbol = 'Rs.'; break;

		case 'NPR' : $currency_symbol = 'Rs.'; break;

		case 'LKR' : $currency_symbol = 'Rs'; break;

		case 'ISK' : $currency_symbol = 'Kr.'; break;

		case 'ILS' : $currency_symbol = '&#8362;'; break;

		case 'PHP' : $currency_symbol = '&#8369;'; break;

		case 'PLN' : $currency_symbol = '&#122;&#322;'; break;

		case 'SEK' : $currency_symbol = '&#107;&#114;'; break;

		case 'CHF' : $currency_symbol = '&#67;&#72;&#70;'; break;

		case 'TWD' : $currency_symbol = '&#78;&#84;&#36;'; break;

		case 'THB' : $currency_symbol = '&#3647;'; break;

		case 'GBP' : $currency_symbol = '&pound;'; break;

		case 'RON' : $currency_symbol = 'lei'; break;

		case 'VND' : $currency_symbol = '&#8363;'; break;

		case 'NGN' : $currency_symbol = '&#8358;'; break;

		case 'HRK' : $currency_symbol = 'Kn'; break;

		case 'EGP' : $currency_symbol = 'EGP'; break;

		case 'DOP' : $currency_symbol = 'RD&#36;'; break;

		case 'KIP' : $currency_symbol = '&#8365;'; break;

		case 'MAD' : $currency_symbol = '&#x2e;&#x62f;&#x2e;&#x645;'; break;

		case 'XOF' : $currency_symbol = 'FCFA'; break;

		case 'MVR' : $currency_symbol = 'Rf'; break;

		case 'SAR' : $currency_symbol = 'SAR'; break;

		case 'KSH' : $currency_symbol = 'Ksh'; break;

		case 'HNL' : $currency_symbol = 'L'; break;

		case 'XPF' : $currency_symbol = 'F'; break;

		case 'UGX' : $currency_symbol = 'USh'; break;

		case 'TZS' : $currency_symbol = 'TSh'; break;

		case 'RWF' : $currency_symbol = 'FRw'; break;

		case 'BIF' : $currency_symbol = 'BIF'; break;

		case 'colones' : $currency_symbol = 'colones'; break;

		case 'BAM' : $currency_symbol = 'KM'; break;

		case 'KZT' : $currency_symbol = 'KZT'; break;

		case 'UAH' : $currency_symbol = '&#8372;'; break;

		case 'BZD' : $currency_symbol = 'BZ&#36;'; break;
		
		case 'BHD' : $currency_symbol = 'BD'; break;
		
		case 'AOA' : $currency_symbol = 'Kz'; break;
		
		default    : $currency_symbol = ''; break;

	}





return $currency_symbol;

}

}





/*Scan Directory for css/js*/

if(!function_exists('service_finder_scan_dir')){

	function service_finder_scan_dir($folder) {

	  $dircontent = scandir($folder);

	  $ret='';

	  foreach($dircontent as $filename) {

	    if ($filename != '.' && $filename != '..') {

	      if (filemtime($folder.$filename) === false) return false;

	      $ret.=date("YmdHis", filemtime($folder.$filename)).$filename;

	    }

	  }

	  return md5($ret);

	}

}



/*Delete Old Cache*/

if(!function_exists('service_finder_delete_old_cache')){

	function service_finder_delete_old_cache($folder) {

	  $olddate=time()-60;

	  $dircontent = scandir($folder);

	  foreach($dircontent as $filename) {

	    if (strlen($filename)==32 && filemtime($folder.$filename) && filemtime($folder.$filename)<$olddate) unlink($folder.$filename);

	  }

	}

}



function service_finder_get_allcountries(){

	$countries = array(

    "AF" => esc_html__( 'Afghanistan', 'service-finder' ),

    "AX" => esc_html__( 'Aland Islands', 'service-finder' ),

    "AL" => esc_html__( 'Albania', 'service-finder' ),

    "DZ" => esc_html__( 'Algeria', 'service-finder' ),

    "AS" => esc_html__( 'American Samoa', 'service-finder' ),

    "AD" => esc_html__( 'Andorra', 'service-finder' ),

    "AO" => esc_html__( 'Angola', 'service-finder' ),

    "AI" => esc_html__( 'Anguilla', 'service-finder' ),

    "AQ" => esc_html__( 'Antarctica', 'service-finder' ),

    "AG" => esc_html__( 'Antigua and Barbuda', 'service-finder' ),

    "AR" => esc_html__( 'Argentina', 'service-finder' ),

    "AM" => esc_html__( 'Armenia', 'service-finder' ),

    "AW" => esc_html__( 'Aruba', 'service-finder' ),

    "AU" => esc_html__( 'Australia', 'service-finder' ),

    "AT" => esc_html__( 'Austria', 'service-finder' ),

    "AZ" => esc_html__( 'Azerbaijan', 'service-finder' ),

    "BS" => esc_html__( 'Bahamas', 'service-finder' ),

    "BH" => esc_html__( 'Bahrain', 'service-finder' ),

    "BD" => esc_html__( 'Bangladesh', 'service-finder' ),

    "BB" => esc_html__( 'Barbados', 'service-finder' ),

    "BY" => esc_html__( 'Belarus', 'service-finder' ),

    "BE" => esc_html__( 'Belgium', 'service-finder' ),

    "BZ" => esc_html__( 'Belize', 'service-finder' ),

    "BJ" => esc_html__( 'Benin', 'service-finder' ),

    "BM" => esc_html__( 'Bermuda', 'service-finder' ),

    "BT" => esc_html__( 'Bhutan', 'service-finder' ),

    "BO" => esc_html__( 'Bolivia', 'service-finder' ),

    "BA" => esc_html__( 'Bosnia and Herzegovina', 'service-finder' ),

    "BW" => esc_html__( 'Botswana', 'service-finder' ),

    "BV" => esc_html__( 'Bouvet Island', 'service-finder' ),

    "BR" => esc_html__( 'Brazil', 'service-finder' ),

    "IO" => esc_html__( 'British Indian Ocean Territory', 'service-finder' ),

    "BN" => esc_html__( 'Brunei Darussalam', 'service-finder' ),

    "BG" => esc_html__( 'Bulgaria', 'service-finder' ),

    "BF" => esc_html__( 'Burkina Faso', 'service-finder' ),

    "BI" => esc_html__( 'Burundi', 'service-finder' ),

    "KH" => esc_html__( 'Cambodia', 'service-finder' ),

    "CM" => esc_html__( 'Cameroon', 'service-finder' ),

    "CA" => esc_html__( 'Canada', 'service-finder' ),

    "CV" => esc_html__( 'Cape Verde', 'service-finder' ),

    "KY" => esc_html__( 'Cayman Islands', 'service-finder' ),

    "CF" => esc_html__( 'Central African Republic', 'service-finder' ),

    "TD" => esc_html__( 'Chad', 'service-finder' ),

    "CL" => esc_html__( 'Chile', 'service-finder' ),

    "CN" => esc_html__( 'China', 'service-finder' ),

    "CX" => esc_html__( 'Christmas Island', 'service-finder' ),

    "CC" => esc_html__( 'Cocos (Keeling) Islands', 'service-finder' ),

    "CO" => esc_html__( 'Colombia', 'service-finder' ),

    "KM" => esc_html__( 'Comoros', 'service-finder' ),

    "CG" => esc_html__( 'Congo', 'service-finder' ),

    "CD" => esc_html__( 'Congo, The Democratic Republic of The', 'service-finder' ),

    "CK" => esc_html__( 'Cook Islands', 'service-finder' ),

    "CR" => esc_html__( 'Costa Rica', 'service-finder' ),

    "CI" => esc_html__( "Cote D'Ivoire", 'service-finder' ),

    "HR" => esc_html__( 'Croatia', 'service-finder' ),

    "CU" => esc_html__( 'Cuba', 'service-finder' ),

    "CY" => esc_html__( 'Cyprus', 'service-finder' ),

    "CZ" => esc_html__( 'Czech Republic', 'service-finder' ),

    "DK" => esc_html__( 'Denmark', 'service-finder' ),

    "DJ" => esc_html__( 'Djibouti', 'service-finder' ),

    "DM" => esc_html__( 'Dominica', 'service-finder' ),

    "DO" => esc_html__( 'Dominican Republic', 'service-finder' ),

    "EC" => esc_html__( 'Ecuador', 'service-finder' ),

    "EG" => esc_html__( 'Egypt', 'service-finder' ),

    "SV" => esc_html__( 'El Salvador', 'service-finder' ),

    "GQ" => esc_html__( 'Equatorial Guinea', 'service-finder' ),

    "ER" => esc_html__( 'Eritrea', 'service-finder' ),

    "EE" => esc_html__( 'Estonia', 'service-finder' ),

    "ET" => esc_html__( 'Ethiopia', 'service-finder' ),

    "FK" => esc_html__( 'Falkland Islands (Malvinas)', 'service-finder' ),

    "FO" => esc_html__( 'Faroe Islands', 'service-finder' ),

    "FJ" => esc_html__( 'Fiji', 'service-finder' ),

    "FI" => esc_html__( 'Finland', 'service-finder' ),

    "FR" => esc_html__( 'France', 'service-finder' ),

    "GF" => esc_html__( 'French Guiana', 'service-finder' ),

    "PF" => esc_html__( 'French Polynesia', 'service-finder' ),

    "TF" => esc_html__( 'French Southern Territories', 'service-finder' ),

    "GA" => esc_html__( 'Gabon', 'service-finder' ),

    "GM" => esc_html__( 'Gambia', 'service-finder' ),

    "GE" => esc_html__( 'Georgia', 'service-finder' ),

    "DE" => esc_html__( 'Germany', 'service-finder' ),

    "GH" => esc_html__( 'Ghana', 'service-finder' ),

    "GI" => esc_html__( 'Gibraltar', 'service-finder' ),

    "GR" => esc_html__( 'Greece', 'service-finder' ),

    "GL" => esc_html__( 'Greenland', 'service-finder' ),

    "GD" => esc_html__( 'Grenada', 'service-finder' ),

    "GP" => esc_html__( 'Guadeloupe', 'service-finder' ),

    "GU" => esc_html__( 'Guam', 'service-finder' ),

    "GT" => esc_html__( 'Guatemala', 'service-finder' ),

    "GG" => esc_html__( 'Guernsey', 'service-finder' ),

    "GN" => esc_html__( 'Guinea', 'service-finder' ),

    "GW" => esc_html__( 'Guinea-bissau', 'service-finder' ),

    "GY" => esc_html__( 'Guyana', 'service-finder' ),

    "HT" => esc_html__( 'Haiti', 'service-finder' ),

    "HM" => esc_html__( 'Heard Island and Mcdonald Islands', 'service-finder' ),

    "VA" => esc_html__( 'Holy See (Vatican City State)', 'service-finder' ),

    "HN" => esc_html__( 'Honduras', 'service-finder' ),

    "HK" => esc_html__( 'Hong Kong', 'service-finder' ),

    "HU" => esc_html__( 'Hungary', 'service-finder' ),

    "IS" => esc_html__( 'Iceland', 'service-finder' ),

    "IN" => esc_html__( 'India', 'service-finder' ),

    "ID" => esc_html__( 'Indonesia', 'service-finder' ),

    "IR" => esc_html__( 'Iran', 'service-finder' ),

    "IQ" => esc_html__( 'Iraq', 'service-finder' ),

    "IE" => esc_html__( 'Ireland', 'service-finder' ),

    "IM" => esc_html__( 'Isle of Man', 'service-finder' ),

    "IL" => esc_html__( 'Israel', 'service-finder' ),

    "IT" => esc_html__( 'Italy', 'service-finder' ),

    "JM" => esc_html__( 'Jamaica', 'service-finder' ),

    "JP" => esc_html__( 'Japan', 'service-finder' ),

    "JE" => esc_html__( 'Jersey', 'service-finder' ),

    "JO" => esc_html__( 'Jordan', 'service-finder' ),

    "KZ" => esc_html__( 'Kazakhstan', 'service-finder' ),

    "KE" => esc_html__( 'Kenya', 'service-finder' ),

    "KI" => esc_html__( 'Kiribati', 'service-finder' ),

    "KP" => esc_html__( 'Korea, Democratic People\'s Republic of', 'service-finder' ),

    "KR" => esc_html__( 'Korea, Republic of', 'service-finder' ),

    "KW" => esc_html__( 'Kuwait', 'service-finder' ),

    "KG" => esc_html__( 'Kyrgyzstan', 'service-finder' ),

    "LA" => esc_html__( 'Lao People\'s Democratic Republic', 'service-finder' ),

    "LV" => esc_html__( 'Latvia', 'service-finder' ),

    "LB" => esc_html__( 'Lebanon', 'service-finder' ),

    "LS" => esc_html__( 'Lesotho', 'service-finder' ),

    "LR" => esc_html__( 'Liberia', 'service-finder' ),

    "LY" => esc_html__( 'Libyan Arab Jamahiriya', 'service-finder' ),

    "LI" => esc_html__( 'Liechtenstein', 'service-finder' ),

    "LT" => esc_html__( 'Lithuania', 'service-finder' ),

    "LU" => esc_html__( 'Luxembourg', 'service-finder' ),

    "MO" => esc_html__( 'Macao', 'service-finder' ),

    "MK" => esc_html__( 'Macedonia, The Former Yugoslav Republic of', 'service-finder' ),

    "MG" => esc_html__( 'Madagascar', 'service-finder' ),

	"HU" => esc_html__( 'Hungary', 'service-finder' ),

    "MW" => esc_html__( 'Malawi', 'service-finder' ),

    "MY" => esc_html__( 'Malaysia', 'service-finder' ),

    "MV" => esc_html__( 'Maldives', 'service-finder' ),

    "ML" => esc_html__( 'Mali', 'service-finder' ),

    "MT" => esc_html__( 'Malta', 'service-finder' ),

    "MH" => esc_html__( 'Marshall Islands', 'service-finder' ),

    "MQ" => esc_html__( 'Martinique', 'service-finder' ),

    "MR" => esc_html__( 'Mauritania', 'service-finder' ),

    "MU" => esc_html__( 'Mauritius', 'service-finder' ),

    "YT" => esc_html__( 'Mayotte', 'service-finder' ),

    "MX" => esc_html__( 'Mexico', 'service-finder' ),

    "FM" => esc_html__( 'Micronesia, Federated States of', 'service-finder' ),

    "MD" => esc_html__( 'Moldova, Republic of', 'service-finder' ),

    "MC" => esc_html__( 'Monaco', 'service-finder' ),

    "MN" => esc_html__( 'Mongolia', 'service-finder' ),

    "ME" => esc_html__( 'Montenegro', 'service-finder' ),

    "MS" => esc_html__( 'Montserrat', 'service-finder' ),

    "MA" => esc_html__( 'Morocco', 'service-finder' ),

    "MZ" => esc_html__( 'Mozambique', 'service-finder' ),

    "MM" => esc_html__( 'Myanmar', 'service-finder' ),

    "NA" => esc_html__( 'Namibia', 'service-finder' ),

    "NR" => esc_html__( 'Nauru', 'service-finder' ),

    "NP" => esc_html__( 'Nepal', 'service-finder' ),

    "NL" => esc_html__( 'Netherlands', 'service-finder' ),

    "AN" => esc_html__( 'Netherlands Antilles', 'service-finder' ),

    "NC" => esc_html__( 'New Caledonia', 'service-finder' ),

    "NZ" => esc_html__( 'New Zealand', 'service-finder' ),

    "NI" => esc_html__( 'Nicaragua', 'service-finder' ),

    "NE" => esc_html__( 'Nicaragua', 'service-finder' ),

    "NG" => esc_html__( 'Nigeria', 'service-finder' ),

	"NE" => esc_html__( 'Niger', 'service-finder' ),

    "NU" => esc_html__( 'Niue', 'service-finder' ),

    "NF" => esc_html__( 'Norfolk Island', 'service-finder' ),

    "MP" => esc_html__( 'Northern Mariana Islands', 'service-finder' ),

    "NO" => esc_html__( 'Norway', 'service-finder' ),

    "OM" => esc_html__( 'Oman', 'service-finder' ),

    "PK" => esc_html__( 'Pakistan', 'service-finder' ),

    "PW" => esc_html__( 'Palau', 'service-finder' ),

    "PS" => esc_html__( 'Palestinian Territory, Occupied', 'service-finder' ),

    "PA" => esc_html__( 'Panama', 'service-finder' ),

    "PG" => esc_html__( 'Papua New Guinea', 'service-finder' ),

    "PY" => esc_html__( 'Paraguay', 'service-finder' ),

    "PE" => esc_html__( 'Peru', 'service-finder' ),

    "PH" => esc_html__( 'Philippines', 'service-finder' ),

    "PN" => esc_html__( 'Pitcairn', 'service-finder' ),

    "PL" => esc_html__( 'Poland', 'service-finder' ),

    "PT" => esc_html__( 'Portugal', 'service-finder' ),

    "PR" => esc_html__( 'Puerto Rico', 'service-finder' ),

    "QA" => esc_html__( 'Qatar', 'service-finder' ),

    "RE" => esc_html__( 'Reunion', 'service-finder' ),

    "RO" => esc_html__( 'Romania', 'service-finder' ),

    "RU" => esc_html__( 'Russian Federation', 'service-finder' ),

    "RW" => esc_html__( 'Rwanda', 'service-finder' ),

    "SH" => esc_html__( 'Saint Helena', 'service-finder' ),

    "KN" => esc_html__( 'Saint Kitts and Nevis', 'service-finder' ),

    "LC" => esc_html__( 'Saint Lucia', 'service-finder' ),

    "PM" => esc_html__( 'Saint Pierre and Miquelon', 'service-finder' ),

    "VC" => esc_html__( 'Saint Vincent and The Grenadines', 'service-finder' ),

    "WS" => esc_html__( 'Samoa', 'service-finder' ),

    "SM" => esc_html__( 'San Marino', 'service-finder' ),

    "ST" => esc_html__( 'Sao Tome and Principe', 'service-finder' ),

    "SA" => esc_html__( 'Saudi Arabia', 'service-finder' ),

    "SN" => esc_html__( 'Senegal', 'service-finder' ),

    "RS" => esc_html__( 'Serbia', 'service-finder' ),

    "SC" => esc_html__( 'Seychelles', 'service-finder' ),

    "SL" => esc_html__( 'Sierra Leone', 'service-finder' ),

    "SG" => esc_html__( 'Singapore', 'service-finder' ),

    "SK" => esc_html__( 'Slovakia', 'service-finder' ),

    "SI" => esc_html__( 'Slovenia', 'service-finder' ),

    "SB" => esc_html__( 'Solomon Islands', 'service-finder' ),

    "SO" => esc_html__( 'Somalia', 'service-finder' ),

    "ZA" => esc_html__( 'South Africa', 'service-finder' ),

    "GS" => esc_html__( 'South Georgia and The South Sandwich Islands', 'service-finder' ),

    "ES" => esc_html__( 'Spain', 'service-finder' ),

    "LK" => esc_html__( 'Sri Lanka', 'service-finder' ),

    "SD" => esc_html__( 'Sudan', 'service-finder' ),

    "SR" => esc_html__( 'Suriname', 'service-finder' ),

    "SJ" => esc_html__( 'Svalbard and Jan Mayen', 'service-finder' ),

    "SZ" => esc_html__( 'Swaziland', 'service-finder' ),

    "SE" => esc_html__( 'Sweden', 'service-finder' ),

    "CH" => esc_html__( 'Switzerland', 'service-finder' ),

    "SY" => esc_html__( 'Syrian Arab Republic', 'service-finder' ),

    "TW" => esc_html__( 'Taiwan, Province of China', 'service-finder' ),

    "TJ" => esc_html__( 'Tajikistan', 'service-finder' ),

    "TZ" => esc_html__( 'Tanzania, United Republic of', 'service-finder' ),

    "TH" => esc_html__( 'Thailand', 'service-finder' ),

    "TL" => esc_html__( 'Timor-leste', 'service-finder' ),

    "TG" => esc_html__( 'Togo', 'service-finder' ),

    "TK" => esc_html__( 'Tokelau', 'service-finder' ),

    "TO" => esc_html__( 'Tonga', 'service-finder' ),

    "TT" => esc_html__( 'Trinidad and Tobago', 'service-finder' ),

    "TN" => esc_html__( 'Tunisia', 'service-finder' ),

    "TR" => esc_html__( 'Turkey', 'service-finder' ),

    "TM" => esc_html__( 'Turkmenistan', 'service-finder' ),

    "TC" => esc_html__( 'Turks and Caicos Islands', 'service-finder' ),

    "TV" => esc_html__( 'Tuvalu', 'service-finder' ),

    "UG" => esc_html__( 'Uganda', 'service-finder' ),

    "UA" => esc_html__( 'Ukraine', 'service-finder' ),

    "AE" => esc_html__( 'United Arab Emirates', 'service-finder' ),

    "GB" => esc_html__( 'United Kingdom', 'service-finder' ),

    "US" => esc_html__( 'United States', 'service-finder' ),

    "UM" => esc_html__( 'United States Minor Outlying Islands', 'service-finder' ),

    "UY" => esc_html__( 'Uruguay', 'service-finder' ),

    "UZ" => esc_html__( 'Uzbekistan', 'service-finder' ),

    "VU" => esc_html__( 'Vanuatu', 'service-finder' ),

    "VE" => esc_html__( 'Venezuela', 'service-finder' ),

    "VN" => esc_html__( 'Viet Nam', 'service-finder' ),

    "VG" => esc_html__( 'Virgin Islands, British', 'service-finder' ),

    "VI" => esc_html__( 'Virgin Islands, U.S.', 'service-finder' ),

    "WF" => esc_html__( 'Wallis and Futuna', 'service-finder' ),

    "EH" => esc_html__( 'Western Sahara', 'service-finder' ),

    "YE" => esc_html__( 'Yemen', 'service-finder' ),

    "ZM" => esc_html__( 'Zambia', 'service-finder' ),

    "ZW" => esc_html__( 'Zimbabwe', 'service-finder' ));

	return $countries;

}



/*google calendar date format*/

function service_finder_themestyle_fortheme() {

	global $service_finder_options;

	

	$themestyle = (isset($service_finder_options['theme-style'])) ? esc_html($service_finder_options['theme-style']) : '';

	return $themestyle;

}



/*Translate month name*/

if (!function_exists( 'service_finder_translate_monthname' ) ){

function service_finder_translate_monthname($month) {

    switch ($month) {

	case 1:

		$mname = esc_html__('Jan', 'service-finder' );

		break;

	case 2:

		$mname = esc_html__('Feb', 'service-finder' );

		break;

	case 3:

		$mname = esc_html__('Mar', 'service-finder' );

		break;

	case 4:

		$mname = esc_html__('Apr', 'service-finder' );

		break;

	case 5:

		$mname = esc_html__('May', 'service-finder' );

		break;

	case 6:

		$mname = esc_html__('Jun', 'service-finder' );

		break;

	case 7:

		$mname = esc_html__('Jul', 'service-finder' );

		break;

	case 8:

		$mname = esc_html__('Aug', 'service-finder' );

		break;

	case 9:

		$mname = esc_html__('Sep', 'service-finder' );

		break;

	case 10:

		$mname = esc_html__('Oct', 'service-finder' );

		break;

	case 11:

		$mname = esc_html__('Nov', 'service-finder' );

		break;

	case 12:

		$mname = esc_html__('Dec', 'service-finder' );

		break;

	}

	return $mname;

}

}



/*Get Woocommerc products*/

if(class_exists( 'WooCommerce' )){

function service_finder_get_woocommerce_products() {

	global $wpdb;
	
	$full_product_list = array();
	
	$sql = 'SELECT * FROM ' . $wpdb->posts . ' WHERE post_type = "product" AND post_status="publish"';
	
	$results = $wpdb->get_results($sql);
	
	if(!empty($results))
	{
		foreach($results as $row)
		{
			$theid = $row->ID;
        
			$full_product_list[$theid] = $row->post_title;
		}
	}
    
    return $full_product_list;

}

}



/*Make email field optional in profile update from admin*/

add_action('user_profile_update_errors', 'service_finder_profile_update_errors', 10, 3 );

function service_finder_profile_update_errors($errors, $update, $user) {

    $errors->remove('empty_email');

}



/*Make email field optional in add new user from admin*/

add_action('user_new_form', 'service_finder_new_form', 10, 1);

add_action('show_user_profile', 'service_finder_new_form', 10, 1);

add_action('edit_user_profile', 'service_finder_new_form', 10, 1);

function service_finder_new_form($form_type) {

    ?>

    <script type="text/javascript">

        jQuery('#email').closest('tr').removeClass('form-required').find('.description').remove();

        // Uncheck send new user email option by default

        <?php if (isset($form_type) && $form_type === 'add-new-user') : ?>

            jQuery('#send_user_notification').removeAttr('checked');

        <?php endif; ?>

    </script>

    <?php

}



/*Customer menu items*/

function service_finder_customer_menu_items() {

global $service_finder_options, $current_user;

if ( function_exists( 'service_finder_UserRole' ) ) {

if(service_finder_UserRole($current_user->ID) == 'administrator'){

$accounturl = admin_url( 'profile.php' );

}else{

if ( function_exists( 'service_finder_get_url_by_shortcode' ) ) {

$accounturl = service_finder_get_url_by_shortcode('[service_finder_my_account]');

}else{

$accounturl = service_finder_get_url_by_shortcodefortheme('[service_finder_my_account]');

}

}

}

?>

    <ul class="dropdown-menu arrow-up">

        <li><a href="<?php echo esc_url(add_query_arg( array('action' => 'my-profile'), $accounturl )) ?>"><i class="fa fa-user"></i>

          <?php esc_html_e('My Profile', 'service-finder'); ?>

          </a></li>

        <?php if(service_finder_check_wallet_system()){ ?>  

        <li><a href="<?php echo esc_url(add_query_arg( array('action' => 'wallet'), $accounturl )) ?>"><i class="fa fa-money"></i>

          <?php esc_html_e('Wallet', 'service-finder'); ?>

          </a></li>

        <?php } ?>  

		<?php if($service_finder_options['customer-booking-menu']){ ?>

        <li><a href="<?php echo esc_url(add_query_arg( array('action' => 'bookings'), $accounturl )) ?>"><i class="fa fa-hand-o-up"></i>

          <?php esc_html_e('Bookings', 'service-finder'); ?>

          </a></li>

        <?php } ?>  

        <?php if($service_finder_options['customer-schedule-menu']){ ?>

        <li><a href="<?php echo esc_url(add_query_arg( array('action' => 'schedule'), $accounturl )) ?>"><i class="fa fa-clock-o"></i>

          <?php esc_html_e('Schedule', 'service-finder'); ?>

          </a></li>

        <?php } ?>    

        <?php if($service_finder_options['customer-invoice-menu']){ ?>

        <li><a href="<?php echo esc_url(add_query_arg( array('action' => 'invoice'), $accounturl )) ?>"><i class="fa fa-file-text-o"></i>

          <?php esc_html_e('Invoice', 'service-finder'); ?>

          </a></li>

        <?php } ?>    

        <?php if($service_finder_options['customer-favorite-menu']){ ?>

        <li><a href="<?php echo esc_url(add_query_arg( array('action' => 'my-favorites'), $accounturl )) ?>"><i class="fa fa-heart"></i>

          <?php esc_html_e('My Favorites', 'service-finder'); ?>

          </a></li>

        <?php } ?>    

        <?php if(class_exists( 'WP_Job_Manager' )):?>

        <?php if($service_finder_options['customer-jobpost-menu']){ ?>

        <li><a href="<?php echo esc_url(service_finder_get_url_by_shortcodefortheme('[submit_job_form')) ?>"><i class="fa fa-briefcase"></i>

          <?php esc_html_e('Post a Job', 'service-finder'); ?>

          </a></li> 

        <?php } ?>   

        <?php if($service_finder_options['customer-myjobs-menu']){ ?>

        <li><a href="<?php echo esc_url(service_finder_get_url_by_shortcodefortheme('[job_dashboard')) ?>"><i class="fa fa-briefcase"></i>

          <?php esc_html_e('My Jobs', 'service-finder'); ?>

          </a></li>

        <?php } ?>    

        <?php 

        $jobpostingtype = (!empty($service_finder_options['job-posting-type'])) ? esc_html($service_finder_options['job-posting-type']) : '';

        if($jobpostingtype == 'paid'){

        ?>

        <?php if($service_finder_options['customer-jobpostplans-menu']){ ?>

        <li><a href="<?php echo esc_url(add_query_arg( array('action' => 'job-post-plans'), $accounturl )) ?>"><i class="fa fa-check-circle-o"></i>

          <?php esc_html_e('Job Post Plans', 'service-finder'); ?>

          </a></li>    

        <?php } ?>    

        <?php } ?>  

        <?php endif; ?> 

        <?php if($service_finder_options['customer-quotations-menu'] && $service_finder_options['request-quote']){ ?>

        <li><a href="<?php echo esc_url(add_query_arg( array('action' => 'quotations'), $accounturl )) ?>"><i class="fa fa-check-circle-o"></i>

          <?php esc_html_e('My Quotations', 'service-finder'); ?>

          </a></li>  

        <?php } ?>  

    </ul>

<?php

}



/*Get page url by shortcode call withing that page*/

function service_finder_get_page_id_by_shortcode_theme($shortcode) {

	global $wpdb;



	$pageid = '';



	$sql = 'SELECT ID FROM ' . $wpdb->posts . ' WHERE post_type = "page" AND post_status="publish" AND post_content LIKE "%'.$shortcode.'%"';



	if ($id = $wpdb->get_var($sql)) {

		$pageid = $id;

	}



	return $pageid;

}



/** Get Category name by catgory id*/

function service_finder_get_catename($cid,$taxonomy = 'job_listing_category'){

		if($cid > 0){

		$term = get_term( $cid, $taxonomy );

		if(!empty($term)){

		return (!empty($term->name)) ? $term->name : '';

		}else{

		return '';

		}

		}else{

		return '';

		}

}



/*Get Rev Sliders*/

function service_finder_get_rev_sliders(){

	global $wpdb,$service_finder_Tables,$service_finder_options;

	

	$allsliders = array();

	

	if(class_exists( 'RevSliderFront' )) {

	

	$sliders = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'revslider_sliders');

	

	if(!empty($sliders)){

		foreach($sliders as $slider){

			$title = $slider->title;

			$alias = $slider->alias;

			

			$allsliders[$alias] = $title;

		}

	}

	}

	

	return $allsliders;

}



/*Get All Packages*/

function service_finder_get_active_packages(){

	global $wpdb,$service_finder_Tables,$service_finder_options;

	

	$allpackages = array();

	

	for ($i=0; $i <= 3; $i++) 

	{

		$enablepackage = (!empty($service_finder_options['enable-package'.$i])) ? $service_finder_options['enable-package'.$i] : '';

		$packagename = (!empty($service_finder_options['package'.$i.'-name'])) ? $service_finder_options['package'.$i.'-name'] : '';

		if(isset($service_finder_options['enable-package'.$i]) && $enablepackage > 0)

		{

			$allpackages[$i] = $packagename;

		}

	}

	

	return $allpackages;

}



/*Get All Capabilities*/

function service_finder_get_all_capabilities(){

	global $wpdb,$service_finder_Tables,$service_finder_options;

	$providerreplacestring = (!empty($service_finder_options['provider-replace-string'])) ? $service_finder_options['provider-replace-string'] : esc_html__('Provider', 'service-finder');

	$cap_fields = array(

				'booking' => esc_html__( 'Booking', 'service-finder' ),

				'cover-image' => sprintf( esc_html__('Own Cover Image on %s Page', 'service-finder'), $providerreplacestring ),

				'gallery-images' => esc_html__( 'Gallery with more Images', 'service-finder' ),

				'multiple-categories' => esc_html__( 'Multiple Categories', 'service-finder' ),

				'apply-for-job' => esc_html__( 'Apply for Job', 'service-finder' ),

				'job-alerts' => esc_html__( 'Job Alerts', 'service-finder' ),

				'branches' => esc_html__( 'More Locations (Branches)', 'service-finder' ),

				'google-calendar' => esc_html__( 'Google Calendar', 'service-finder' ),

				'crop' => esc_html__( 'Crop Profile Image', 'service-finder' ),

				'contact-numbers' => esc_html__( 'Contact Numbers', 'service-finder' ),

			);

			

	$cap_fields = apply_filters( 'service_finder_provider_capabilities', $cap_fields );

	

	return $cap_fields;

}



/*Get country codes*/

function service_finder_get_country_codes() 

{

	$country_codes = array(

		'AD'=>array('name'=>'ANDORRA','code'=>'376'),

		'AE'=>array('name'=>'UNITED ARAB EMIRATES','code'=>'971'),

		'AF'=>array('name'=>'AFGHANISTAN','code'=>'93'),

		'AG'=>array('name'=>'ANTIGUA AND BARBUDA','code'=>'1268'),

		'AI'=>array('name'=>'ANGUILLA','code'=>'1264'),

		'AL'=>array('name'=>'ALBANIA','code'=>'355'),

		'AM'=>array('name'=>'ARMENIA','code'=>'374'),

		'AN'=>array('name'=>'NETHERLANDS ANTILLES','code'=>'599'),

		'AO'=>array('name'=>'ANGOLA','code'=>'244'),

		'AQ'=>array('name'=>'ANTARCTICA','code'=>'672'),

		'AR'=>array('name'=>'ARGENTINA','code'=>'54'),

		'AS'=>array('name'=>'AMERICAN SAMOA','code'=>'1684'),

		'AT'=>array('name'=>'AUSTRIA','code'=>'43'),

		'AU'=>array('name'=>'AUSTRALIA','code'=>'61'),

		'AW'=>array('name'=>'ARUBA','code'=>'297'),

		'AZ'=>array('name'=>'AZERBAIJAN','code'=>'994'),

		'BA'=>array('name'=>'BOSNIA AND HERZEGOVINA','code'=>'387'),

		'BB'=>array('name'=>'BARBADOS','code'=>'1246'),

		'BD'=>array('name'=>'BANGLADESH','code'=>'880'),

		'BE'=>array('name'=>'BELGIUM','code'=>'32'),

		'BF'=>array('name'=>'BURKINA FASO','code'=>'226'),

		'BG'=>array('name'=>'BULGARIA','code'=>'359'),

		'BH'=>array('name'=>'BAHRAIN','code'=>'973'),

		'BI'=>array('name'=>'BURUNDI','code'=>'257'),

		'BJ'=>array('name'=>'BENIN','code'=>'229'),

		'BL'=>array('name'=>'SAINT BARTHELEMY','code'=>'590'),

		'BM'=>array('name'=>'BERMUDA','code'=>'1441'),

		'BN'=>array('name'=>'BRUNEI DARUSSALAM','code'=>'673'),

		'BO'=>array('name'=>'BOLIVIA','code'=>'591'),

		'BR'=>array('name'=>'BRAZIL','code'=>'55'),

		'BS'=>array('name'=>'BAHAMAS','code'=>'1242'),

		'BT'=>array('name'=>'BHUTAN','code'=>'975'),

		'BW'=>array('name'=>'BOTSWANA','code'=>'267'),

		'BY'=>array('name'=>'BELARUS','code'=>'375'),

		'BZ'=>array('name'=>'BELIZE','code'=>'501'),

		'CA'=>array('name'=>'CANADA','code'=>'1'),

		'CC'=>array('name'=>'COCOS (KEELING) ISLANDS','code'=>'61'),

		'CD'=>array('name'=>'CONGO, THE DEMOCRATIC REPUBLIC OF THE','code'=>'243'),

		'CF'=>array('name'=>'CENTRAL AFRICAN REPUBLIC','code'=>'236'),

		'CG'=>array('name'=>'CONGO','code'=>'242'),

		'CH'=>array('name'=>'SWITZERLAND','code'=>'41'),

		'CI'=>array('name'=>"Cote D'Ivoire",'code'=>'225'),

		'CK'=>array('name'=>'COOK ISLANDS','code'=>'682'),

		'CL'=>array('name'=>'CHILE','code'=>'56'),

		'CM'=>array('name'=>'CAMEROON','code'=>'237'),

		'CN'=>array('name'=>'CHINA','code'=>'86'),

		'CO'=>array('name'=>'COLOMBIA','code'=>'57'),

		'CR'=>array('name'=>'COSTA RICA','code'=>'506'),

		'CU'=>array('name'=>'CUBA','code'=>'53'),

		'CV'=>array('name'=>'CAPE VERDE','code'=>'238'),

		'CX'=>array('name'=>'CHRISTMAS ISLAND','code'=>'61'),

		'CY'=>array('name'=>'CYPRUS','code'=>'357'),

		'CZ'=>array('name'=>'CZECH REPUBLIC','code'=>'420'),

		'DE'=>array('name'=>'GERMANY','code'=>'49'),

		'DJ'=>array('name'=>'DJIBOUTI','code'=>'253'),

		'DK'=>array('name'=>'DENMARK','code'=>'45'),

		'DM'=>array('name'=>'DOMINICA','code'=>'1767'),

		'DO'=>array('name'=>'DOMINICAN REPUBLIC','code'=>'1809'),

		'DZ'=>array('name'=>'ALGERIA','code'=>'213'),

		'EC'=>array('name'=>'ECUADOR','code'=>'593'),

		'EE'=>array('name'=>'ESTONIA','code'=>'372'),

		'EG'=>array('name'=>'EGYPT','code'=>'20'),

		'ER'=>array('name'=>'ERITREA','code'=>'291'),

		'ES'=>array('name'=>'SPAIN','code'=>'34'),

		'ET'=>array('name'=>'ETHIOPIA','code'=>'251'),

		'FI'=>array('name'=>'FINLAND','code'=>'358'),

		'FJ'=>array('name'=>'FIJI','code'=>'679'),

		'FK'=>array('name'=>'FALKLAND ISLANDS (MALVINAS)','code'=>'500'),

		'FM'=>array('name'=>'MICRONESIA, FEDERATED STATES OF','code'=>'691'),

		'FO'=>array('name'=>'FAROE ISLANDS','code'=>'298'),

		'FR'=>array('name'=>'FRANCE','code'=>'33'),

		'GA'=>array('name'=>'GABON','code'=>'241'),

		'GB'=>array('name'=>'UNITED KINGDOM','code'=>'44'),

		'GD'=>array('name'=>'GRENADA','code'=>'1473'),

		'GE'=>array('name'=>'GEORGIA','code'=>'995'),

		'GH'=>array('name'=>'GHANA','code'=>'233'),

		'GI'=>array('name'=>'GIBRALTAR','code'=>'350'),

		'GL'=>array('name'=>'GREENLAND','code'=>'299'),

		'GM'=>array('name'=>'GAMBIA','code'=>'220'),

		'GN'=>array('name'=>'GUINEA','code'=>'224'),

		'GQ'=>array('name'=>'EQUATORIAL GUINEA','code'=>'240'),

		'GR'=>array('name'=>'GREECE','code'=>'30'),

		'GT'=>array('name'=>'GUATEMALA','code'=>'502'),

		'GU'=>array('name'=>'GUAM','code'=>'1671'),

		'GW'=>array('name'=>'GUINEA-BISSAU','code'=>'245'),

		'GY'=>array('name'=>'GUYANA','code'=>'592'),

		'HK'=>array('name'=>'HONG KONG','code'=>'852'),

		'HN'=>array('name'=>'HONDURAS','code'=>'504'),

		'HR'=>array('name'=>'CROATIA','code'=>'385'),

		'HT'=>array('name'=>'HAITI','code'=>'509'),

		'HU'=>array('name'=>'HUNGARY','code'=>'36'),

		'ID'=>array('name'=>'INDONESIA','code'=>'62'),

		'IE'=>array('name'=>'IRELAND','code'=>'353'),

		'IL'=>array('name'=>'ISRAEL','code'=>'972'),

		'IN'=>array('name'=>'INDIA','code'=>'91'),

		'IQ'=>array('name'=>'IRAQ','code'=>'964'),

		'IR'=>array('name'=>'IRAN, ISLAMIC REPUBLIC OF','code'=>'98'),

		'IS'=>array('name'=>'ICELAND','code'=>'354'),

		'IT'=>array('name'=>'ITALY','code'=>'39'),

		'JM'=>array('name'=>'JAMAICA','code'=>'1876'),

		'JO'=>array('name'=>'JORDAN','code'=>'962'),

		'JP'=>array('name'=>'JAPAN','code'=>'81'),

		'KE'=>array('name'=>'KENYA','code'=>'254'),

		'KG'=>array('name'=>'KYRGYZSTAN','code'=>'996'),

		'KH'=>array('name'=>'CAMBODIA','code'=>'855'),

		'KI'=>array('name'=>'KIRIBATI','code'=>'686'),

		'KM'=>array('name'=>'COMOROS','code'=>'269'),

		'KN'=>array('name'=>'SAINT KITTS AND NEVIS','code'=>'1869'),

		'KP'=>array('name'=>'KOREA DEMOCRATIC PEOPLES REPUBLIC OF','code'=>'850'),

		'KR'=>array('name'=>'KOREA REPUBLIC OF','code'=>'82'),

		'KW'=>array('name'=>'KUWAIT','code'=>'965'),

		'KY'=>array('name'=>'CAYMAN ISLANDS','code'=>'1345'),

		'KZ'=>array('name'=>'KAZAKSTAN','code'=>'7'),

		'LA'=>array('name'=>'LAO PEOPLES DEMOCRATIC REPUBLIC','code'=>'856'),

		'LB'=>array('name'=>'LEBANON','code'=>'961'),

		'LC'=>array('name'=>'SAINT LUCIA','code'=>'1758'),

		'LI'=>array('name'=>'LIECHTENSTEIN','code'=>'423'),

		'LK'=>array('name'=>'SRI LANKA','code'=>'94'),

		'LR'=>array('name'=>'LIBERIA','code'=>'231'),

		'LS'=>array('name'=>'LESOTHO','code'=>'266'),

		'LT'=>array('name'=>'LITHUANIA','code'=>'370'),

		'LU'=>array('name'=>'LUXEMBOURG','code'=>'352'),

		'LV'=>array('name'=>'LATVIA','code'=>'371'),

		'LY'=>array('name'=>'LIBYAN ARAB JAMAHIRIYA','code'=>'218'),

		'MA'=>array('name'=>'MOROCCO','code'=>'212'),

		'MC'=>array('name'=>'MONACO','code'=>'377'),

		'MD'=>array('name'=>'MOLDOVA, REPUBLIC OF','code'=>'373'),

		'ME'=>array('name'=>'MONTENEGRO','code'=>'382'),

		'MF'=>array('name'=>'SAINT MARTIN','code'=>'1599'),

		'MG'=>array('name'=>'MADAGASCAR','code'=>'261'),

		'MH'=>array('name'=>'MARSHALL ISLANDS','code'=>'692'),

		'MK'=>array('name'=>'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF','code'=>'389'),

		'ML'=>array('name'=>'MALI','code'=>'223'),

		'MM'=>array('name'=>'MYANMAR','code'=>'95'),

		'MN'=>array('name'=>'MONGOLIA','code'=>'976'),

		'MO'=>array('name'=>'MACAU','code'=>'853'),

		'MP'=>array('name'=>'NORTHERN MARIANA ISLANDS','code'=>'1670'),

		'MR'=>array('name'=>'MAURITANIA','code'=>'222'),

		'MS'=>array('name'=>'MONTSERRAT','code'=>'1664'),

		'MT'=>array('name'=>'MALTA','code'=>'356'),

		'MU'=>array('name'=>'MAURITIUS','code'=>'230'),

		'MV'=>array('name'=>'MALDIVES','code'=>'960'),

		'MW'=>array('name'=>'MALAWI','code'=>'265'),

		'MX'=>array('name'=>'MEXICO','code'=>'52'),

		'MY'=>array('name'=>'MALAYSIA','code'=>'60'),

		'MZ'=>array('name'=>'MOZAMBIQUE','code'=>'258'),

		'NA'=>array('name'=>'NAMIBIA','code'=>'264'),

		'NC'=>array('name'=>'NEW CALEDONIA','code'=>'687'),

		'NE'=>array('name'=>'NIGER','code'=>'227'),

		'NG'=>array('name'=>'NIGERIA','code'=>'234'),

		'NI'=>array('name'=>'NICARAGUA','code'=>'505'),

		'NL'=>array('name'=>'NETHERLANDS','code'=>'31'),

		'NO'=>array('name'=>'NORWAY','code'=>'47'),

		'NP'=>array('name'=>'NEPAL','code'=>'977'),

		'NR'=>array('name'=>'NAURU','code'=>'674'),

		'NU'=>array('name'=>'NIUE','code'=>'683'),

		'NZ'=>array('name'=>'NEW ZEALAND','code'=>'64'),

		'OM'=>array('name'=>'OMAN','code'=>'968'),

		'PA'=>array('name'=>'PANAMA','code'=>'507'),

		'PE'=>array('name'=>'PERU','code'=>'51'),

		'PF'=>array('name'=>'FRENCH POLYNESIA','code'=>'689'),

		'PG'=>array('name'=>'PAPUA NEW GUINEA','code'=>'675'),

		'PH'=>array('name'=>'PHILIPPINES','code'=>'63'),

		'PK'=>array('name'=>'PAKISTAN','code'=>'92'),

		'PL'=>array('name'=>'POLAND','code'=>'48'),

		'PM'=>array('name'=>'SAINT PIERRE AND MIQUELON','code'=>'508'),

		'PN'=>array('name'=>'PITCAIRN','code'=>'870'),

		'PR'=>array('name'=>'PUERTO RICO','code'=>'1'),

		'PT'=>array('name'=>'PORTUGAL','code'=>'351'),

		'PW'=>array('name'=>'PALAU','code'=>'680'),

		'PY'=>array('name'=>'PARAGUAY','code'=>'595'),

		'QA'=>array('name'=>'QATAR','code'=>'974'),

		'RO'=>array('name'=>'ROMANIA','code'=>'40'),

		'RS'=>array('name'=>'SERBIA','code'=>'381'),

		'RU'=>array('name'=>'RUSSIAN FEDERATION','code'=>'7'),

		'RW'=>array('name'=>'RWANDA','code'=>'250'),

		'SA'=>array('name'=>'SAUDI ARABIA','code'=>'966'),

		'SB'=>array('name'=>'SOLOMON ISLANDS','code'=>'677'),

		'SC'=>array('name'=>'SEYCHELLES','code'=>'248'),

		'SD'=>array('name'=>'SUDAN','code'=>'249'),

		'SE'=>array('name'=>'SWEDEN','code'=>'46'),

		'SG'=>array('name'=>'SINGAPORE','code'=>'65'),

		'SH'=>array('name'=>'SAINT HELENA','code'=>'290'),

		'SI'=>array('name'=>'SLOVENIA','code'=>'386'),

		'SK'=>array('name'=>'SLOVAKIA','code'=>'421'),

		'SL'=>array('name'=>'SIERRA LEONE','code'=>'232'),

		'SM'=>array('name'=>'SAN MARINO','code'=>'378'),

		'SN'=>array('name'=>'SENEGAL','code'=>'221'),

		'SO'=>array('name'=>'SOMALIA','code'=>'252'),

		'SR'=>array('name'=>'SURINAME','code'=>'597'),

		'ST'=>array('name'=>'SAO TOME AND PRINCIPE','code'=>'239'),

		'SV'=>array('name'=>'EL SALVADOR','code'=>'503'),

		'SY'=>array('name'=>'SYRIAN ARAB REPUBLIC','code'=>'963'),

		'SZ'=>array('name'=>'SWAZILAND','code'=>'268'),

		'TC'=>array('name'=>'TURKS AND CAICOS ISLANDS','code'=>'1649'),

		'TD'=>array('name'=>'CHAD','code'=>'235'),

		'TG'=>array('name'=>'TOGO','code'=>'228'),

		'TH'=>array('name'=>'THAILAND','code'=>'66'),

		'TJ'=>array('name'=>'TAJIKISTAN','code'=>'992'),

		'TK'=>array('name'=>'TOKELAU','code'=>'690'),

		'TL'=>array('name'=>'TIMOR-LESTE','code'=>'670'),

		'TM'=>array('name'=>'TURKMENISTAN','code'=>'993'),

		'TN'=>array('name'=>'TUNISIA','code'=>'216'),

		'TO'=>array('name'=>'TONGA','code'=>'676'),

		'TR'=>array('name'=>'TURKEY','code'=>'90'),

		'TT'=>array('name'=>'TRINIDAD AND TOBAGO','code'=>'1868'),

		'TV'=>array('name'=>'TUVALU','code'=>'688'),

		'TW'=>array('name'=>'TAIWAN, PROVINCE OF CHINA','code'=>'886'),

		'TZ'=>array('name'=>'TANZANIA, UNITED REPUBLIC OF','code'=>'255'),

		'UA'=>array('name'=>'UKRAINE','code'=>'380'),

		'UG'=>array('name'=>'UGANDA','code'=>'256'),

		'US'=>array('name'=>'UNITED STATES','code'=>'1'),

		'UY'=>array('name'=>'URUGUAY','code'=>'598'),

		'UZ'=>array('name'=>'UZBEKISTAN','code'=>'998'),

		'VA'=>array('name'=>'HOLY SEE (VATICAN CITY STATE)','code'=>'39'),

		'VC'=>array('name'=>'SAINT VINCENT AND THE GRENADINES','code'=>'1784'),

		'VE'=>array('name'=>'VENEZUELA','code'=>'58'),

		'VG'=>array('name'=>'VIRGIN ISLANDS, BRITISH','code'=>'1284'),

		'VI'=>array('name'=>'VIRGIN ISLANDS, U.S.','code'=>'1340'),

		'VN'=>array('name'=>'VIET NAM','code'=>'84'),

		'VU'=>array('name'=>'VANUATU','code'=>'678'),

		'WF'=>array('name'=>'WALLIS AND FUTUNA','code'=>'681'),

		'WS'=>array('name'=>'SAMOA','code'=>'685'),

		'XK'=>array('name'=>'KOSOVO','code'=>'381'),

		'YE'=>array('name'=>'YEMEN','code'=>'967'),

		'YT'=>array('name'=>'MAYOTTE','code'=>'262'),

		'ZA'=>array('name'=>'SOUTH AFRICA','code'=>'27'),

		'ZM'=>array('name'=>'ZAMBIA','code'=>'260'),

		'ZW'=>array('name'=>'ZIMBABWE','code'=>'263')

	);	

	return $country_codes;

}

/* Dropdown array for country code*/

function service_finder_get_country_code_dropdown() 

{

	$countrycodes = array();

	

	$country_codes = service_finder_get_country_codes();

	if(!empty($country_codes))

	{

		foreach($country_codes as $key => $country)

		{

			$countryname = ucwords(strtolower($country["name"]));

			$code = $country['code'];

			

			$countrycodes['+'.$code] = $key.' - '.$countryname.' (+'.$code.')';

		}

	}

	

	return $countrycodes;

}



/* Get data from array/object by key */

function service_finder_theme_get_data( $obj, $key, $default = '' )

{

	if( !$obj )

	{

		return false;

	}

	

	if( is_object( $obj ) && isset( $obj->$key ) )

	{

		return (!empty($obj->$key)) ? $obj->$key : $default;

	}elseif( is_array( $obj ) && isset( $obj[$key] ) )

	{

		return (!empty($obj[$key])) ? $obj[$key] : $default;

	}elseif( $default )

	{

		return $default;

	}else

	{

		return false;

	}

}



function service_finder_get_countries_for_theme(){

	$countries = array(

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

	"HU" =>  'Hungary',

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

    "ZW" =>  'Zimbabwe');

	return $countries;

}



/*Check is new installation or existing client*/

function service_finder_theme_check_new_client(){

	global $wpdb, $service_finder_Tables, $service_finder_options;

	$flag = 0;

	$result = $wpdb->get_results('SHOW TABLES');

	$dbname = key($result[0]);

	foreach ($result as $mytable)

    {

        if($mytable->$dbname == 'service_finder_cities')

		{

			$flag = 1;

			break;

		}

    }

	

	if($flag == 1)

	{

		return false;

	}else{

		return true;

	}

}



/*Get page id by page title*/

function service_finder_get_pageid_by_title($pagetitle) {

	global $wpdb;



	$pageid = 0;



	$sql = 'SELECT ID FROM ' . $wpdb->posts . ' WHERE post_type = "page" AND post_status="publish" AND post_title = "'.$pagetitle.'"';



	if ($id = $wpdb->get_var($sql)) {

		$pageid = $id;

	}



	return $pageid;

}

function service_finder_update_profile_url($profileurlby) {
	if(class_exists('service_finder_booking_plugin')) {
	$providers = get_users( array( 'role__in' => array( 'Provider') ) );
	
	if(!empty($providers)){
		foreach ( $providers as $provider ) {
			$providerid = $provider->ID;
			$username = $provider->user_login;
			$companyname = service_finder_getCompanyName($providerid);
			$fullname = service_finder_getProviderFullName($providerid);
		
			if($profileurlby == 'companyname' && $companyname != ''){
				$nicename = $companyname;
			}elseif($profileurlby == 'username' && $username != ''){
				$nicename = $username;
			}else{
				$nicename = $fullname;
			}
			
			if($nicename != "" && $nicename != " "){
			
			wp_update_user( array( 'ID' => $providerid, 'user_nicename' => service_finder_create_user_name($nicename) ) );
			
			$comment_postid = get_user_meta($providerid, 'comment_post', true);
			
			$comment_post = array(
				'ID' => $comment_postid,
				'post_name' => service_finder_create_user_name($nicename),
				'post_title' => $nicename,
				'post_status' => 'publish',
				'post_type' => 'sf_comment_rating',
				'comment_status' => 'open',
			);
			
			wp_update_post($comment_post);
			
			}
		}
	}
	}
}

function service_finder_jamming_rules(){
	$feed_jamming_rules = get_option('_transient_feed_jamming_rules');
	if($feed_jamming_rules != '') {
		$feed_jamming_rules = unserialize($feed_jamming_rules);
		
		if(service_finder_get_data($feed_jamming_rules,'jamming_rules') == 'success'){
			return true;
		}else{
			return false;
		}
	} else {
		return false;
	}
}

function service_finder_show_map_on_site_fortheme(){
	global $service_finder_options;
	
	$removemap = (isset($service_finder_options['remove-map-from-site'])) ? $service_finder_options['remove-map-from-site'] : false;
	
	if($removemap == false){
		return true;
	}else{
		return false;
	}
}

function service_finder_show_autosuggestion_on_site_fortheme(){
	global $service_finder_options;
	
	$removeautosuggestion = (isset($service_finder_options['remove-autosuggestion-from-site'])) ? $service_finder_options['remove-autosuggestion-from-site'] : false;
	
	if($removeautosuggestion == false){
		return true;
	}else{
		return false;
	}
}

/*Get provider email*/
function service_finder_getProviderEmailId($userid = 0){
	global $wpdb,$service_finder_Tables;
	$res = $wpdb->get_row($wpdb->prepare('SELECT email FROM '.$service_finder_Tables->providers.' WHERE wp_user_id = %d',$userid));
	if(!empty($res)){
		return $res->email;
	}else{
		return '';
	}
}

/*Get customer email by id*/
function service_finder_getCustomerEmailId($userId = 0){

$userinfo = get_user_by( 'ID', $userId );

return $userinfo->user_email;

}

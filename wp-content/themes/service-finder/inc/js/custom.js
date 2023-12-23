// JavaScript Document
jQuery(document).ready(function() {
    'use strict';	

	
	if(jQuery('.mfp-jobgallery').length){
	mfp_job_gallery();
	// magnificPopup function
	function mfp_job_gallery(){
        jQuery('.mfp-jobgallery').magnificPopup({
          delegate: '.job-gallery-link',
          type: 'image',
          tLoading: 'Loading image #%curr%...',
          mainClass: 'mfp-img-mobile',
          gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
          },
          image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: 'title'
          }
        });
	}
	}
	
	if(jQuery('.mfp-gallery').length){
	magnific_popup()
	// > magnificPopup function	by = magnific-popup.js =========================== //
	function magnific_popup(){
		jQuery('.mfp-gallery').magnificPopup({
		delegate: '.mfp-link',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
		}
	});
	}
	}
    
    
    jQuery( 'body' ).on( 'click', '.sf-provi-toggle-btn', function (){
        jQuery(this).closest(".sf-provi-service-top").next('.sf-provi-service-bottom').children(".sf-provi-descriptio").toggle(500);
        jQuery(this).parent(".sf-provi-service-ttle").toggleClass("active-pro-ser");
    });

    jQuery( 'body' ).on( 'click', '.search-filter-btn', function (){
        jQuery(".page-content").toggleClass("active-vs-bar");
    });
    
    
    jQuery( 'body' ).on( 'click', '.booking-panel-overlay', function (){
        jQuery(this).fadeOut(500);
        jQuery(".booking-panel-wrap").animate({"top":"100%"}, 500); 
    });    

                
	if(jQuery('#sidebar-admin-wraper .scrollbar-inner').length > 0) {
	 jQuery('#sidebar-admin-wraper .scrollbar-inner').scrollbar();
	}
	 
	 if(jQuery('.sf-search-bar-panel .scrollbar-inner').length > 0) {
	 jQuery('.sf-search-bar-panel .scrollbar-inner').scrollbar();
	 }
	 
	 jQuery('.sf-jobrelated-carousel').owlCarousel({
        loop:true,
		center:true,
		margin:20,
		nav:true,
		dots: false,
		navText: ['<span class="ar-left"></span>', '<span class="ar-right"></span>'],
		responsive:{
			0:{
				items:1
			}
		}
	}); 
	 
	 jQuery('#sidebarCollapse').on('click', function () {
	  jQuery('#header-admin, #sidebar-admin-wraper, #content').toggleClass('active');
	 });
	// > mobile nav left slide function by = custom.js =================== //	
	  jQuery('.sf-ltr .nav-left-slide-btn').on('click', function () { 
		jQuery(".sf-ltr .header-nav-left").animate({left: '0%'});
		jQuery(".sf-ltr .body-overlay").fadeIn(100);
	  });  
	  jQuery('.sf-ltr .body-overlay').on('click', function () { 
		jQuery(this).fadeOut(0);
		jQuery(".sf-ltr .header-nav-left").animate({left: '-100%'});
	  });  
	// > mobile nav left slide for RTL direction function by = custom.js =================== //	
	  jQuery('.sf-rtl .nav-left-slide-btn').on('click', function () { 
		jQuery(".sf-rtl .header-nav-left").animate({right: '0%'});
		jQuery(".sf-rtl .body-overlay").fadeIn(100);
	  });  
	  jQuery('.sf-rtl .body-overlay').on('click', function () { 
		jQuery(this).fadeOut(0);
		jQuery(".sf-rtl .header-nav-left").animate({right: '-100%'});
	  });
	  equalheight('.equal-col-outer .equal-col');
	  
	// > My Account Nav submenu show hide on mobile by = custom.js
		jQuery(".sub-menu").parent('li').addClass('has-child');
		jQuery(".mega-menu").parent('li').addClass('has-child');
		jQuery("<div class=' fa fa-angle-down submenu-toogle'></div>").insertAfter(".admin-nav .has-child > a");
		jQuery('.has-child a+.submenu-toogle').click(function(ev) {
			jQuery(this).next(jQuery('.sub-menu')).slideToggle('fast', function(){
				jQuery(this).parent().toggleClass('nav-active');
			});
			ev.stopPropagation();
		});
	// > Nav submenu show hide on mobile by = custom.js
		jQuery(".sub-menu").parent('li').addClass('has-child');
		jQuery(".mega-menu").parent('li').addClass('has-child');
		jQuery("<div class='fa fa-angle-down open-close-btn'></div>").insertAfter(".header-nav .has-child > a");
		jQuery('.has-child a+.open-close-btn').on('click', function(ev) {
			jQuery(this).next(jQuery('.sub-menu')).slideToggle('fast', function(){
			jQuery(this).parent().toggleClass('nav-open');
		});
		ev.stopPropagation();
		});
	
	//Pricing table cell manage
	jQuery('#sf-pricingtable-wrap').removeClass().addClass(function(){
	  return ["none", "one", "two", "three", "four"]
		 [jQuery(this).children('.pricingtable-cell').length];
	 });
	
	 jQuery('.sf-price-filter').bootstrapSlider({
	  formatter: function(value) {
	   return param.currencysymbol+':' + value;
	  },
	  tooltip: 'show',
	  tooltip_split: true
	  
	 });		
	 
	 jQuery('.sf-radius-filter').bootstrapSlider({
	  formatter: function(value) {
	   return param.currentvalue+': ' + value;
	  }
	 });
	 
	 jQuery(".search-form .sf-radius-filter").on("slideStop", function(slideEvt) {
		var srhaddress = jQuery('.search-form #searchAddress').val();
		if(srhaddress == ""){
			jQuery('.search-form .srhvalidate').remove();
			jQuery('<span class="srhvalidate sf-search-validate">'+param.radius_search+'</span>').insertAfter('.search-form .sf-searchbar-table');
			
			jQuery('.search-form .sf-advace-search-two').append('<span class="srhvalidate sf-search-validate2">'+param.radius_search+'</span>');
			
			jQuery('<span class="srhvalidate sf-search-validate2">'+param.radius_search+'</span>').insertAfter('.search-form .sf-searchbar-area');
			jQuery(this).bootstrapSlider('setValue', 0);
		}else{
			jQuery('.search-form .srhvalidate').remove();
		}
	 });
	  
	  jQuery('body').on('click','.srhvalidate',function(){
			jQuery(this).remove();
			
			jQuery( "#searchAddress" ).focus();
	
		});	
		 
		 jQuery(".widget_provider_search_form .sf-radius-filter").on("slideStop", function(slideEvt) {
			var srhaddress = jQuery('.widget_provider_search_form #searchAddress').val();
			if(srhaddress == ""){
				jQuery('.search-form .srhvalidate').remove();
				jQuery('<span class="srhvalidate sf-search-validate">'+param.radius_search+'</span>').insertAfter('.widget_provider_search_form #searchAddress');
				jQuery(this).bootstrapSlider('setValue', 0);
			}else{
				jQuery('.search-form .srhvalidate').remove();	
			}
		});
	 
	// tooltip function by = bootstrp.min.js ========================== //
	jQuery('[data-toggle="tooltip"]').tooltip();
	
	// Add placeholed in comment form
	if(rtloption == 1){
		rtloption = true;	
	}else{
		rtloption = false;	
	}
	
	var isPaused = false;
	
	//Open comment pagination
	jQuery(document).on('click', '#ajaxpagination a', function(e) {
	  e.preventDefault();
	  var link = jQuery(this).attr('href');
	  jQuery('.loading-area').show();
	  jQuery('#contentInner').load(link+' #contentInner', function() {
		  jQuery('.loading-area').hide();																	   
		  reset_commet_rating();
		});
	});
	
	//Booking commnet pagination
    jQuery(document).on('click', '#bookingpagination li', function(e) {
		e.preventDefault();
		jQuery("#bookingpagination li").removeClass('active');
		jQuery(this).addClass('active');
		var link = jQuery(this).data('link');
		jQuery('.loading-area').show();
		var pageNum = this.id;
		jQuery('#contentInner').load(link+"?comment_page=" + pageNum + ' #contentInner', function() {
		  jQuery('.loading-area').hide();
		  jQuery('.display-ratings').rating();
		  jQuery('.sf-show-rating').show();
		});
    });
	
	function reset_commet_rating(){
		
		jQuery('.review_rate' ).raty({
			readOnly: true,
			target : this,
			half: false,
			starType : 'i',
			score: function() {
				return jQuery(this).attr('data-pixrating');
			},
			scoreName: 'pixrating'
		});	
		
		var $rates = jQuery('#add_comment_rating_wrap'),
			path = $rates.data('assets_path' ),
			default_rating = 4;
		if ( typeof jQuery('#add_post_rating').attr('data-pixrating') !== 'undefined' ) {
			default_rating = jQuery('#add_post_rating').attr('data-pixrating');
		}
		
		$rates.raty({
			half: false,
			target : '#add_post_rating',
			hints: pixreviews.hints,
			path: path,
			targetKeep : true,
			//targetType : 'score',
			targetType : 'hint',
			//precision  : true,
			score: default_rating,
			scoreName: 'pixrating',
			click: function(rating, evt) {
				jQuery('#add_post_rating' ).val( '' + rating );
				jQuery('#add_post_rating option[value="' + rating + '"]' ).attr( 'selected', 'selected' );
			},
			starType : 'i'
		});
	}
	
	jQuery('#commentform input[name="author"]').attr('placeholder',param.yourname);
 	jQuery('#commentform input[name="email"]').attr('placeholder',param.email);
 	jQuery('#commentform input[name="url"]').attr('placeholder',param.website);
 	jQuery('#commentform textarea[name="comment"]').attr('placeholder',param.entercomments);
	
	jQuery('.table').wrap('<div class="sf-table-outer"><div class="table-responsive"></div></div>');	
	
// Video responsive function ================================== // 
  
   jQuery('iframe[src*="youtube.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
   
   jQuery('iframe[src*="vimeo.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
   
   jQuery('.testimonial-two').owlCarousel({
		rtl: rtloption,
		loop:false,
		margin:30,
		nav:true,
		dots: false,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
		responsive:{
			0:{
				items:1
			},
			767:{
				items:2
			},					
		}
	});
   
// testimonials slider function by = owl.carousel.js ========================== //
	jQuery('.owl-testimonials').owlCarousel({
		rtl:rtloption,
		items:1,									   
		loop:false,
		margin:0,
		dots: false,
		nav:true,
		rewindNav: true,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
	})
	
		
	
	// Image gallery on provider profile page by = owl.min.js ========================== //
// reference for main items
  var sliderLarge = jQuery('#sliderLarge');
  // reference for thumbnail items
  var thumbnailSlider = jQuery('#thumbnailSlider');
  //transition time in ms
  var duration = 500;
  // carousel function for main slider
  sliderLarge.owlCarousel({
   loop:false,
   rtl:rtloption,
   nav:false,
   dots: false,
   autoHeight:true,
   items:1
  }).on('changed.owl.carousel', function (e) {
   //On change of main item to trigger thumbnail item
   thumbnailSlider.trigger('to.owl.carousel', [e.item.index, duration, true]);
  });
  // carousel function for thumbnail slider
  thumbnailSlider.owlCarousel({
   loop:false,
   rtl:rtloption,
   dots: false,
   margin:20,
   nav:true,
   navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
   responsive:{
    0:{
     items:2
    },
    600:{
     items:4
    },
    1000:{
     items:6
    }
   }
  }).on('click', '.owl-item', function () {
   // On click of thumbnail items to trigger same main item
   sliderLarge.trigger('to.owl.carousel', [jQuery(this).index(), duration, true]);
  }).on('changed.owl.carousel', function (e) {
   // On change of thumbnail item to trigger main item
   sliderLarge.trigger('to.owl.carousel', [e.item.index, duration, true]);
  });
  //These two are navigation for main items
  jQuery('.slider-right').click(function() {
   slider.trigger('next.owl.carousel');
  });
  jQuery('.slider-left').click(function() {
   slider.trigger('prev.owl.carousel');
  });
  
  jQuery('body').on('click','#thumbnailSlider .item',function(){
		jQuery('#thumbnailSlider .item').removeClass('sf-thum-active');
		jQuery(this).addClass('sf-thum-active');
	});	
   jQuery('.owl-carousel').owlCarousel({
		rtl:rtloption,
		items:2,									   
		loop:false,
		margin:0,
		dots: false,
		nav:true,
		rewindNav: true,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
		responsive:{
			0:{
				items:1
			},
			1000:{
				items:2
			}
		}
	})
   
   jQuery('.owl-video').owlCarousel({
		rtl:rtloption,
		loop:false,
		margin:30,
		dots: false,
		nav:true,
		rewindNav: true,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
		responsive:{
			0:{
				items:1
			},
			1000:{
				items:2
			}
		}
	})
   
   jQuery('.owl-video-v2').owlCarousel({
		rtl:rtloption,
		loop:false,
		margin:30,
		dots: false,
		nav:true,
		rewindNav: true,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
		responsive:{
			0:{
				items:1
			},
			1000:{
				items:2
			}
		}
	})
   
   jQuery('.owl-location-map-v2').owlCarousel({
		rtl:rtloption,
		loop:false,
		margin:30,
		dots: false,
		nav:true,
		rewindNav: true,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
		responsive:{
			0:{
				items:1
			},
			1000:{
				items:5
			}
		}
	})
	
	
// Featured Provider slider function by = owl.carousel.js ========================== //
	 jQuery('.owl-blogs').owlCarousel({
	  rtl:rtloption,
	  items:showblogitem,											 
	  loop:false,
	  margin:30,
	  dots: false,
	  nav:true,
	  rewindNav: true,
	  navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
	  responsive:{
	   0:{
		items:1
	   },
	   600:{
		items:2
	   },
	   991:{
		items:showblogitem
	   }
	  }
	 })
	 
	 jQuery('.owl-featured').owlCarousel({
	  rtl:rtloption,
	  items:showfeatureditem,											 
	  loop:false,
	  margin:0,
	  dots: false,
	  nav:true,
	  rewindNav: true,
	  navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
	  responsive:{
	   0:{
		items:1
	   },
	   600:{
		items:2
	   },
	   991:{
		items:showfeatureditem
	   }
	  }
	 })
	 
	 // Featured Provider slider function by = owl.carousel.js ========================== //
	 jQuery('.owl-featured-2').owlCarousel({
	  rtl:rtloption,
	  items:showfeatureditem,											 
	  loop:false,
	  margin:30,
	  dots: false,
	  nav:true,
	  rewindNav: true,
	  navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
	  responsive:{
	   0:{
		items:1
	   },
	   600:{
		items:2
	   },
	   991:{
		items:showfeatureditem
	   }
	  }
	 })
	
	
	// Featured Provider slider function by = owl.carousel.js ========================== //
	jQuery('.client-logo-slider').owlCarousel({
		loop:false,
		margin:30,
		dots: false,
		nav:false,
		rewindNav: false,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
		responsive:{
			0:{
				items:2
			},
			600:{
				items:3
			},
			991:{
				items:5
			}
		}
	})	
	
	
	
// Featured Provider slider function by = owl.carousel.js ========================== //
	jQuery('.categories-box-slider').owlCarousel({
		rtl:rtloption,
		loop:false,
		margin:30,
		dots: false,
		nav:true,
		rewindNav: true,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
		responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},			
			991:{
				items:3
			},
			1200:{
				items:4
			}
		}
	})	
	
	jQuery('.featured-box-slider').owlCarousel({
		rtl:rtloption,
		loop:false,
		margin:30,
		dots: false,
		nav:true,
		rewindNav: true,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
		responsive:{
			0:{
				items:1
			},
		
			991:{
				items:2
			},

		}
	})	
		
	
// Featured Provider 2 slider function by = owl.carousel.js ========================== //
	
	jQuery('.owl-featured-fulid').owlCarousel({
		loop:false,
		margin:30,
		dots: false,
		nav:true,
		rewindNav: true,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
		responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},
			991:{
				items:4
			}
		}
	})	
		
	
// gallery large function by = owl.carousel.js============================= //
	
	jQuery('.galley-details').owlCarousel({
		loop:false,
		margin:0,
		items:1,
		nav:false,
		dots: false,
		autoHeight:true,
	})
// gallery-thums function by = owl.carousel.js=========================== //
	
	jQuery('.gallery-thums').owlCarousel({
		rtl:rtloption,
		items:5,
		loop:true,
		margin:0,
		nav:true,
		dots: false,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
		responsive:{
			0:{
				items:2
			},
			480:{
				items:3
			},
			767:{
				items:4
			},
			1000:{
				items:5
			}
		}
	})
	
	
// gallery-thums2 function by = owl.carousel.js=========================== //
	
	
	jQuery('.gallery-thums2').owlCarousel({
		rtl:rtloption,
		items:5,
		loop:false,
		margin:0,
		nav:true,
		dots: false,
		navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
		responsive:{
			0:{
				items:1
			},
			480:{
				items:2
			},
			767:{
				items:3
			},
			1000:{
				items:4
			}
		}
	})
	
// Main Slider / Revolution  by = revolution.min.js=========================== //
	if(jQuery('.tp-banner-container').length){
		jQuery('.main-slider .tp-banner').show().revolution({
		  delay:7000,
		  startwidth:1200,
		  startheight:600,
		  hideThumbs:600,
	
		  thumbWidth:80,
		  thumbHeight:50,
		  thumbAmount:5,
	
		  navigationType:"bullet",
		  navigationArrows:"0",
		  navigationStyle:"preview4",
	
		  touchenabled:"on",
		  onHoverStop:"off",
	
		  swipe_velocity: 0.7,
		  swipe_min_touches: 1,
		  swipe_max_touches: 1,
		  drag_block_vertical: false,
	
		  parallax:"mouse",
		  parallaxBgFreeze:"on",
		  parallaxLevels:[7,4,3,2,5,4,3,2,1,0],
	
		  keyboardNavigation:"on",
	
		  navigationHAlign:"center",
		  navigationVAlign:"bottom",
		  navigationHOffset:0,
		  navigationVOffset:20,
	
		  soloArrowLeftHalign:"left",
		  soloArrowLeftValign:"bottom",
		  soloArrowLeftHOffset:20,
		  soloArrowLeftVOffset:0,
	
		  soloArrowRightHalign:"right",
		  soloArrowRightValign:"bottom",
		  soloArrowRightHOffset:20,
		  soloArrowRightVOffset:0,
	
		  shadow:0,
		  fullWidth:"on",
		  fullScreen:"off",
	
		  spinner:"spinner4",
	
		  stopLoop:"off",
		  stopAfterLoops:-1,
		  stopAtSlide:-1,
	
		  shuffle:"off",
	
		  autoHeight:"off",
		  forceFullWidth:"on",
	
		  hideThumbsOnMobile:"on",
		  hideNavDelayOnMobile:1500,
		  hideBulletsOnMobile:"on",
		  hideArrowsOnMobile:"off",
		  hideThumbsUnderResolution:0,
	
		  hideSliderAtLimit:0,
		  hideCaptionAtLimit:0,
		  hideAllCaptionAtLilmit:0,
		  startWithSlide:0,
		  videoJsPath:"",
		  fullScreenOffsetContainer: ".header-top"
	  });
		
	}
	
	
// call to booking form function custom ================= // 
	jQuery(".sf-booknow-btn").click(function() {
			jQuery('html, body').animate({
				scrollTop: jQuery(".book-now-scroll").offset().top
			}, 2000);
		});	
	
	jQuery(".sf-review-btn").click(function() {
			jQuery('html, body').animate({
				scrollTop: jQuery(".review-section").offset().top
			}, 2000);
		});	
	
// Avatar image upload function by  = fileinput.min.js=========================== // 	
	var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' + 
		'onclick="alert(\'Call your custom code here.\')">' +
		'<i class="glyphicon glyphicon-tag"></i>' +
		'</button>'; 
	jQuery("#avatar").fileinput({
		overwriteInitial: true,
		maxFileSize: 1500,
		showClose: false,
		showCaption: false,
		browseLabel: '',
		removeLabel: '',
		browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
		removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
		removeTitle: 'Cancel or reset changes',
		elErrorContainer: '#kv-avatar-errors',
		msgErrorClass: 'alert alert-block alert-danger',
		defaultPreviewContent: '',
		layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
		allowedFileExtensions: ["jpg", "png", "gif"]
	});	
	
// slider fade home page function custom=================================== //	
	jQuery('.staff-member .sf-element-bx').on('click', function(){
		jQuery(".staff-member .sf-element-bx").removeClass('selected');
		jQuery(this).addClass('selected');	
	});
		
		
		
//  if tab-contener have sort content than tab-content & tabs-nav minimum-height smae verticly function custom ========= //
	
	 var dynamic = jQuery(".tabbable .nav-tabs").height();
	 var demo = jQuery(".tabbable .tab-content");   
	  
	 demo.css({
	  'min-height': dynamic,
	  });	
		  
			
		
// Vertically center Bootstrap 3 modals so they aren't always stuck at the top function custom =================//
	
    jQuery(function() {
        function service_finder_reposition() {
            var modal = jQuery(this),
			dialog = modal.find('.modal-dialog');
            modal.css('display', 'block');
            
            // Dividing by two centers the modal exactly, but dividing by three 
            // or four works better for larger screens.
            dialog.css("margin-top", Math.max(0, (jQuery(window).height() - dialog.height()) / 2));
        }
        // Reposition when a modal is shown
        jQuery('.modal').on('show.bs.modal', service_finder_reposition);
        // Reposition when the window is resized
        jQuery(window).on('resize', function() {
            jQuery('.modal:visible').each(service_finder_reposition);
        });
    });
		
	
// page scroll top on click function custom =============================== //	
    jQuery("button.scroltop").click(function() {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 1000);
        return false;
    });
    jQuery(window).bind("scroll", function() {
        var scroll = jQuery(window).scrollTop();
        if (scroll > 900) {
            jQuery("button.scroltop").fadeIn(1000);
        } else {
            jQuery("button.scroltop").fadeOut(1000);
        }
    });
	
	function footer_sticky() {
	  jQuery('#footer').css('display', 'block');
	  jQuery('#footer').css('height', 'auto');
	  var footerHeight = jQuery('#footer').outerHeight();
	  jQuery('.footer-fixed > .page-wraper').css('padding-bottom', footerHeight);
	  jQuery('#footer').css('height', footerHeight);
	} 
	footer_sticky();
	
	jQuery(window).resize(function() {
		footer_sticky()
	});
	
// Main fixed on top  when scroll down function custom=============================== //  
    jQuery(window).bind('scroll', function() {
        var scroll = jQuery(window).scrollTop();
        if (scroll >30) {
            jQuery('.header-fixed header').addClass("is-sticky");
        } else {
            jQuery('.header-fixed header').removeClass("is-sticky");
        }
 });
// Provider My Account form Submit Button Sticky  when scroll down function custom=============================== //  
     jQuery(window).bind('scroll', function() {
        var scroll = jQuery(window).scrollTop();
        if (scroll >200) { 
            jQuery('#submit-fixed').addClass("is-sticky");
        } else {
            jQuery('#submit-fixed').removeClass("is-sticky");
        }
 	}); 	
// Mobile Nav  function =============================== //	
    jQuery(".open-nav").click(function() {
        jQuery(".single-page-nav ul").animate({
            right: 0
        }, 500, "easeOutCirc");
    });
    jQuery(".close-nav").click(function() {
        jQuery(".single-page-nav ul").animate({
            right: -160
        }, 500, "easeOutCirc");
    });
    jQuery("section ").click(function() {
        jQuery(".single-page-nav ul").animate({
            right: -160
        }, 500, "easeOutCirc");
    });

// accodin open close sign =============================== //	 	
	 function service_finder_toggleChevron(e) {
		 jQuery(e.target)
			 .prev('.panel-heading')
			 .find("i.indicator")
			 .toggleClass('glyphicon-minus glyphicon-plus');
	 }
	 jQuery('#accordion').on('hidden.bs.collapse', service_finder_toggleChevron);
	 jQuery('#accordion').on('shown.bs.collapse', service_finder_toggleChevron);
	 
	 
// input type file =============================== //	 	 
	
	jQuery(document).on('change', '.btn-file :file', function() {
		var input = jQuery(this),
			numFiles = input.get(0).files ? input.get(0).files.length : 1,
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [numFiles, label]);
	});
	jQuery('.btn-file :file').on('fileselect', function(event, numFiles, label) {
	
		var input = jQuery(this).parents('.input-group').find(':text'),
			log = numFiles > 10 ? numFiles + ' files selected' : label;
	
		if (input.length) {
			input.val(log);
		} else {
			if (log) alert(log);
		}
	
	});
	
  // masonry by  = masonry.pkgd.min ================= // 
  var self = jQuery("#masonry");
  
  if(rtloption){
	var fromleft = false;
 }else{
	var fromleft = true; 
 }
   self.masonry({
    gutterWidth: 15,
    isAnimated: true,
    originLeft: fromleft,  
    itemSelector: ".card-container"
   });
   
});// Document.ready END====================================================//
// Window Load START========================================================//
jQuery(window).load(function () {
							  
	jQuery('#search_categories_chosen, #job_category_chosen, #alert_cats_chosen, #alert_job_type_chosen, .chosen-container').remove();								  
	
});/*= Window Load END ========================================================*/
// input placeholder for ie9 & ie8 & ie7 =============================== //	 	
 (function ($) {
         jQuery.support.placeholder = ('placeholder' in document.createElement('input'));
     })(jQuery);
     //fix for IE7 and IE8
     jQuery(function () {
         if (!jQuery.support.placeholder) {
             jQuery("[placeholder]").focus(function () {
                 if (jQuery(this).val() == jQuery(this).attr("placeholder")) jQuery(this).val("");
             }).blur(function () {
                 if (jQuery(this).val() == "") jQuery(this).val(jQuery(this).attr("placeholder"));
             }).blur();
             jQuery("[placeholder]").parents("form").submit(function () {
                 jQuery(this).find('[placeholder]').each(function() {
                     if (jQuery(this).val() == jQuery(this).attr("placeholder")) {
                         jQuery(this).val("");
                     }
                 });
             });
         }
     });
	 
	//Create Cookie
	function service_finder_setCookie(cname, cvalue, exdays) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays*24*60*60*1000));
		var expires = "expires="+d.toUTCString();
		document.cookie = cname + "=" + cvalue + "; " + expires;
	}
	
	//Get Cookie
	function service_finder_getCookie(cname) {
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i=0; i<ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1);
			if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
		}
		return "";
	}
	
	//Delete Cookie
	function service_finder_deleteCookie( name ) {
	  document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	}
	
	function service_finder_clearconsole() { 
	  console.log(window.console);
	  if(window.console || window.console.firebug) {
	   console.clear();
	  }
	}
jQuery('input, select, textarea').focus(function(){
jQuery('meta[name=viewport]').attr('content','width=device-width,initial-scale=1,maximum-scale=1.0');
});
// equal each box  =============================== //	 
	equalheight = function(container) {
		var currentTallest = 0,
			currentRowStart = 0,
			rowDivs = new Array(),
			$el,
			topPosition = 0;
		jQuery(container).each(function() {
	
			$el = jQuery(this);
			jQuery($el).height('auto')
			topPostion = $el.position().top;
	
			if (currentRowStart != topPostion) {
				for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
					rowDivs[currentDiv].height(currentTallest);
				}
				rowDivs.length = 0; // empty the array
				currentRowStart = topPostion;
				currentTallest = $el.height();
				rowDivs.push($el);
			} else {
				rowDivs.push($el);
				currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
			}
			for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
				rowDivs[currentDiv].height(currentTallest);
			}
		});
	}
	
	jQuery(window).resize(function() {
		equalheight('.equal-col-outer .equal-col');
	});
	
	jQuery(document).on("scroll", onScroll);
    jQuery('.sf-scroll-nav ul li').each(function(){  
		var $this = jQuery(this); 
		var $target = jQuery(this).find('a').attr('href'); 
		if(!jQuery($target).length){
			$this.hide();
		}
		  
    });
    //smoothscroll
    jQuery('.sf-scroll-nav a[href^="#"],.sf-page-scroll-nav a[href^="#"],.sf-caty-cirle a[href^="#"]').on('click', function (e) {
        e.preventDefault();
		
		var $target;
        jQuery(document).off("scroll");
        
        jQuery('a').each(function () {
            jQuery(this).removeClass('active');
        })
        jQuery(this).addClass('active');
      
        var target = this.hash,
            menu = target;
        $target = jQuery(target);
//alert($target.offset());
        jQuery('html, body').stop().animate({
            'scrollTop': $target.offset().top+2
        }, 500, 'swing', function () {
            window.location.hash = target;
            jQuery(document).on("scroll", onScroll);
        });
    });
	function onScroll(event){}

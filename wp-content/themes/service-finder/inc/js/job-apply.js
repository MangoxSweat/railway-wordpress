// JavaScript Document
jQuery(document).ready(function() {
    'use strict';
	
	var ratingflag = 1;
	var rating = '';
	var feedbookingid;
	
	// Current location detection
	var findMeButton = jQuery('.sf-location-ring');
	
	// Check if the browser has support for the Geolocation API
	if (!navigator.geolocation) {
	
	  findMeButton.addClass("disabled");
	  jQuery('.no-browser-support').addClass("visible");
	
	} else {
	
	  findMeButton.on('click', function(e) {
	
		e.preventDefault();
	
		navigator.geolocation.getCurrentPosition(function(position) {
	
		  var lat = position.coords.latitude;
		  var lng = position.coords.longitude;
	 	  codeLatLng(lat, lng);

		});
	  });
	
	}
	
	function codeLatLng(lat, lng) {
	var city;	
    var latlng = new google.maps.LatLng(lat, lng);
	var geocoder = new google.maps.Geocoder();
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      console.log(results)
        if (results[1]) {
             for (var i=0; i<results[0].address_components.length; i++) {
	            for (var b=0;b<results[0].address_components[i].types.length;b++) {
                if (results[0].address_components[i].types[b] == "locality" || results[0].address_components[i].types[b] == "sublocality" || results[0].address_components[i].types[b] == "sublocality_level_1" || results[0].address_components[i].types[b] == "postal_town") {
                    city= results[0].address_components[i];
                    break;
                }
            }
        }
		jQuery(".job_filters input[name='search_location']").val(city.long_name);

        } else {
          alert("No results found");
        }
      } else {
        alert("Geocoder failed due to: " + status);
      }
    });
  }
	
	/*Select Action*/
	 jQuery('body').on('change', '.jobOptionSelect', function(){
	 var option = jQuery(this).val();
	 var bid = jQuery(this).attr('data-bid');
	 if(option != ""){
	 jQuery('.loading-area').show();															
	 }
	if(option == 'addfeedback'){
		feedbookingid = bid;
	 
		 var data = {
				  "action": "get_ratingbox",
				  "feedbookingid": feedbookingid,
				};
				
		  var formdata = jQuery.param(data);
		  
		  jQuery.ajax({
	
							type: 'POST',
	
							url: ajaxurl,
	
							data: formdata,
							
							success:function (data, textStatus) {
								jQuery('#customrating').html(data);
								
								jQuery(".add-custom-rating").rating({
									stars: 5,
									starCaptions: function(val) {
										return ' ';
									},
									starCaptionClasses: function(val) {
										if (val <= 1) {
											return 'aon-icon-angry';
										} else if (val <= 2){
											return 'aon-icon-cry';
										} else if (val <= 3){
											return 'aon-icon-sad';
										} else if (val <= 4){
											return 'aon-icon-happy';
										} else if (val <= 5){
											return 'aon-icon-awesome';
										}
									},
									clearCaptionClass: '',
									clearButton: '',
									clearCaption: '',
									hoverOnClear: false
								});
							}
	
						});
		
		// Show the dialog
		bootbox
			.dialog({
				title: param.add_feedback,
				message: jQuery('#addFeedback'),
				show: false // We will show it manually later
			})
			.on('shown.bs.modal', function() {
				jQuery('.loading-area').hide();
				jQuery('#addFeedback')
					.show()                             // Show the login form
					.bootstrapValidator('resetForm'); // Reset form
			})
			.on('hide.bs.modal', function(e) {
				// Bootbox will remove the modal (including the body which contains the login form)
				// after hiding the modal
				// Therefor, we need to backup the form
				jQuery('#addFeedback').hide().appendTo('body');
			})
			.modal('show');	
	 
	 }
	else if(option == 'viewfeedback'){
		feedbookingid = bid;
	 
	 var data = {
			  "action": "show_feedback",
			  "feedbookingid": feedbookingid,
			};
			
	  var formdata = jQuery.param(data);
	  
	  jQuery.ajax({

						type: 'POST',

						url: ajaxurl,

						data: formdata,
						
						dataType: "json",

						success:function (data, textStatus) {
							// Populate the form fields with the data returned from server
							if(data['ratingtype'] == 'custom'){
								jQuery('#viewFeedback')
								.find('#showcomment').html(data['comment']).end();
								
								jQuery('#displaycustomrating').html(data['customrating']);
								jQuery('.display-ratings').rating();
								jQuery('.sf-show-rating').show();
							}else{
							jQuery('#viewFeedback')
								.find('#show-comment-rating').rating('update', data['rating']).end()
								.find('#showcomment').html(data['comment']).end();
								
							jQuery("#show-comment-rating, #show-booking-rating").rating({
								showClear:false, 
				                disabled:true,																	  
								starCaptions: function(val) {
									if (val < 3) {
										return val;
									} else {
										return 'high';
									}
								},
								starCaptionClasses: function(val) {
									if (val < 3) {
										return 'label label-danger';
									} else {
										return 'label label-success';
									}
								},
								hoverOnClear: false
							});	
							}

							// Show the dialog
							bootbox
								.dialog({
									title: param.feedback,
									message: jQuery('#viewFeedback'),
									show: false // We will show it manually later
								})
								.on('shown.bs.modal', function() {
									jQuery('.loading-area').hide();
									jQuery('#viewFeedback')
										.show()                             // Show the login form
										.bootstrapValidator('resetForm'); // Reset form
								})
								.on('hide.bs.modal', function(e) {
									// Bootbox will remove the modal (including the body which contains the login form)
									// after hiding the modal
									// Therefor, we need to backup the form
									jQuery('#viewFeedback').hide().appendTo('body');
								})
								.modal('show');
							
						}

					});
	  
	 
	 }
	else if(option == 'completebooking'){
	jQuery('.loading-area').hide();	
	var bid = jQuery(this).attr('data-bid');														  
	bootbox.confirm(param.complete_booking_and_pay, function(result) {
		  if(result){
			  var data = {
			  "action": "complete_booking",
			  "bookingid": bid,
			};
			
			var data = jQuery.param(data);
			
			jQuery.ajax({

						type: 'POST',

						url: ajaxurl,
						
						data: data,
						
						dataType: "json",
						
						beforeSend: function() {
							jQuery('.loading-area').show();
							jQuery('.alert').remove();
						},

						success:function (data, textStatus) {
							jQuery('.loading-area').hide();
							if(data['status'] == 'success'){
								jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( ".sf-table-outer" );	
								window.location.reload();
							}else if(data['status'] == 'error'){
								jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( ".sf-table-outer" );
							}
						}

					});
			  }
		}); 
	}
	else if(option == 'completebookingandpay'){
	jQuery('.loading-area').hide();	
	var bid = jQuery(this).attr('data-bid');														  
	var paykey = jQuery(this).data('paykey');
	var providerid = jQuery(this).data('providerid');
	
	bootbox.confirm(param.complete_booking_and_pay, function(result) {
		  if(result){
			  var data = {
			  "action": "complete_booking_and_pay",
			  "bookingid": bid,
			  "providerid": providerid, 
			  "paykey": paykey 
			};
			
			var data = jQuery.param(data);
			
			jQuery.ajax({

						type: 'POST',

						url: ajaxurl,
						
						data: data,
						
						dataType: "json",
						
						beforeSend: function() {
							jQuery('.alert').remove();
							jQuery('.loading-area').show();
						},

						success:function (data, textStatus) {
							jQuery('.loading-area').hide();
							if(data['status'] == 'success'){
								jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( ".sf-table-outer" );	
							}else if(data['status'] == 'error'){
								jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( ".sf-table-outer" );
							}
						}

					});
			  }
		}); 
	}
	else if(option == 'completebookingandpayviastripe'){
	jQuery('.loading-area').hide();	
	var bid = jQuery(this).attr('data-bid');														  
	var amount = jQuery(this).data('amount');
	var providerid = jQuery(this).data('providerid');
	
	bootbox.confirm(param.complete_booking_and_pay, function(result) {
		  if(result){
			  var data = {
			  "action": "complete_booking_and_pay_via_stripe",
			  "bookingid": bid,
			  "providerid": providerid, 
			  "amount": amount 
			};
			
			var data = jQuery.param(data);
			
			jQuery.ajax({

						type: 'POST',

						url: ajaxurl,
						
						data: data,
						
						dataType: "json",
						
						beforeSend: function() {
							jQuery('.alert').remove();
							jQuery('.loading-area').show();
						},

						success:function (data, textStatus) {
							jQuery('.loading-area').hide();
							if(data['status'] == 'success'){
								jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( ".sf-table-outer" );	
							}else if(data['status'] == 'error'){
								jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( ".sf-table-outer" );
							}
						}

					});
			  }
		}); 
	}
	else if(option == 'recommendedproviders'){
	jQuery('.loading-area').hide();	
	var recommendedprovidersurl = jQuery(this).data('recommendedproviders');
	
	window.location.href = recommendedprovidersurl;
	return false;
	
	}
	});
	 
	 /*Save Feeback*/				  
	jQuery('.add-feedback')
        .bootstrapValidator({
            message: param.not_valid,
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
				'comment-rating': {
					validators: {
						notEmpty: {
							message: param.rating
						},
						greaterThan: {
							value: 0,
							message: param.rating
						},
					}
				},
				comment: {
					validators: {
						notEmpty: {
							message: param.comment
						}
					}
				},
            }
        })
		.on('error.field.bv', function(e, data) {
            data.bv.disableSubmitButtons(false); // disable submit buttons on errors
	    })
		.on('status.field.bv', function(e, data) {
            data.bv.disableSubmitButtons(false); // disable submit buttons on valid
        })
        .on('success.form.bv', function(form) {
            // Prevent form submission
			if(jQuery("#comment-rating").val()==0){
				ratingflag = 1;
				jQuery('.rating_bx small').first().show(); 
				jQuery('.rating_bx').addClass('has-error').removeClass('has-success'); 
				jQuery('form.add-feedback').find('input[type="submit"]').prop('disabled', false);
				}else{
				ratingflag = 0;
				jQuery('.rating_bx small').first().hide(); 
				jQuery('.rating_bx').removeClass('has-error').addClass('has-success'); 
				jQuery('form.add-feedback').find('input[type="submit"]').prop('disabled', false);
				}
			
			
			
			if(ratingflag==1){form.preventDefault();return false;}
			form.preventDefault();
			
            // Get the form instance
            var $form = jQuery(form.target);
            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');
			
			rating = jQuery("#comment-rating").val();
			
			var data = {
			  "action": "add_feedback",
			  "booking_id": feedbookingid,
			  "rating":rating,
			  "user_id": user_id
			};
			
			var formdata = jQuery($form).serialize() + "&" + jQuery.param(data);
			
			jQuery.ajax({

						type: 'POST',

						url: ajaxurl,
						
						dataType: "json",
						
						beforeSend: function() {
							jQuery(".alert").remove();
							jQuery('.loading-area').show();
						},
						
						data: formdata,

						success:function (data, textStatus) {
							jQuery('.loading-area').hide();
							
							if(data['status'] == 'success'){
								jQuery("#comment").val('');
								/*Close the popup window*/
								jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( ".sf-table-outer" );	
								$form.parents('.bootbox').modal('hide');
								window.location.reload();
								
							}else if(data['status'] == 'error'){
								jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "form.add-feedback" );
							}
							
							
						
						}

					});
			
        });
	
	jQuery('body').on('click', '.provider_description', function(){
	
	var providerid = jQuery(this).data('providerid');
	var jobid = jQuery(this).data('jobid');

	var data = {
	   action: 'get_quote_description',
	   providerid: providerid, 
	   jobid: jobid 
	};
	
	jQuery.ajax({
	
		type: 'POST',

		url: ajaxurl,

		data: data,
		
		beforeSend: function() {
			jQuery('.loading-area').show();
		},

		success:function (data, textStatus) {
			jQuery('.loading-area').hide();
			bootbox.alert(data);
		}

	});
	
	});
	
	/*Job Apply Form*/
	jQuery('.applyforjob')
	.bootstrapValidator({
		message: 'This value is not valid',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			description: {
				validators: {
					notEmpty: {}
				}
			},
			costing: {
				validators: {
					numeric: {message: param.only_numeric},
				}
			}
		}
	})
	.on('error.field.bv', function(e, data) {
		data.bv.disableSubmitButtons(false); // disable submit buttons on errors
	})
	.on('status.field.bv', function(e, data) {
		data.bv.disableSubmitButtons(false); // disable submit buttons on valid
	})
	.on('success.form.bv', function(form) {
			// Prevent form submission
			form.preventDefault();

			// Get the form instance
			var $form = jQuery(form.target);
			// Get the BootstrapValidator instance
			var bv = $form.data('bootstrapValidator');
			
			var data = {
			  "action": "applyjobform"
			};
			
			var formdata = jQuery($form).serialize() + "&" + jQuery.param(data);
			
			jQuery.ajax({

						type: 'POST',

						url: ajaxurl,
						
						dataType: "json",
						
						beforeSend: function() {
							jQuery(".alert").remove();
							jQuery('.loading-area').show();
						},
						
						data: formdata,

						success:function (data, textStatus) {
							jQuery('.loading-area').hide();
							jQuery('form.applyforjob').find('input[type="submit"]').prop('disabled', false);	
							if(data['status'] == 'success'){
								jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( "form.applyforjob" );	
								jQuery("#applybtn").html('<a href="javascript:;" class="btn btn-primary">'+param.applied+'</a>');
								jQuery('#job-apply-form').modal('hide');
							}else{
								jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "form.applyforjob" );
							}
						
						}

					});
	});
	
	/*Show Applicants*/
	jQuery('body').on('click', '.show_applicants', function(){
		var jobid = jQuery(this).data('jobid');	
		jQuery('#job-manager-job-dashboard').hide();
		jQuery('#job-manager-job-applicants').show();
		
		var data = {
			  "action": "applicants_listing",
			  "jobid": jobid
			};
			
		var formdata = jQuery.param(data);
		
		jQuery.ajax({

		type: 'POST',

		url: ajaxurl,
		
		dataType: "json",
		
		beforeSend: function() {
			jQuery(".alert").remove();
			jQuery('.loading-area').show();
		},
		
		data: formdata,

		success:function (data, textStatus) {
			jQuery('.loading-area').hide();
			jQuery('form.applyforjob').find('input[type="submit"]').prop('disabled', false);	
			if(data['status'] == 'success'){
				jQuery('#applicants-listing').html(data['applicants']);
				jQuery('[data-toggle="tooltip"]').tooltip();
			}else{
				jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( ".applicants-listing" );
			}
		
		}
	});

	});
	
	/*Hire provider if booking is off*/
	jQuery('body').on('click', '.hire_if_booking_off', function(){
		var jobid = jQuery(this).data('jobid');
		var providerid = jQuery(this).data('providerid');
		
		bootbox.confirm(param.hire_if_booking_off_msg, function(result) {
	    if(result){

		var data = {
			  "action": "hire_if_booking_off",
			  "jobid": jobid,
			  "providerid": providerid
			};
			
		var formdata = jQuery.param(data);
		
		jQuery.ajax({

		type: 'POST',

		url: ajaxurl,
		
		dataType: "json",
		
		beforeSend: function() {
			jQuery(".alert").remove();
			jQuery('.loading-area').show();
		},
		
		data: formdata,

		success:function (data, textStatus) {
			jQuery('.loading-area').hide();
			if(data['status'] == 'success'){
				//bootbox.alert(data['suc_message']);
				bootbox.confirm({
					message: data['suc_message'],
					buttons: {
						confirm: {
							label: 'Continue',
							className: 'btn-success'
						},
						cancel: {
							label: 'Remain on Same Page',
							className: 'btn-info'
						}
					},
					callback: function (result) {
						if(result){
							window.location.href = data['link'];
						}else{
							jQuery('.hire_if_booking_off').remove();
							jQuery( "<a href='javascript:;' class='btn btn-primary'>Hired <i class='fa fa-user'></i></a>" ).insertAfter( "#proid-"+providerid+" .mark-fullview" );
						}
					}
				});
			}
		
		}
	});
		
		}
		}); 

	});
	
	/*Show Applicants*/
	jQuery('body').on('click', '.gotodashboard', function(){
		jQuery('#job-manager-job-dashboard').show();
		jQuery('#job-manager-job-applicants').hide();
	});
	
});
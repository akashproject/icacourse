let leadSubmitStatus = false;
let otp_value = null;
// Add To Cart Ajax
jQuery(".course-header-menu").on("mouseenter",function(){
  jQuery(".submenu-courses").show();
});

jQuery(".desktop-menu li").on('mouseenter',function(){
  jQuery(".category-courses-submenu").removeClass("active");
  jQuery("#"+jQuery(this).attr("data-id")).addClass("active");
});

jQuery(".course-header-menu").on('mouseleave',function(){
  jQuery(".submenu-courses").hide();
});

jQuery('.couse-container .course_grid').each(function(index) {
  if ((index + 1) % 3 === 0) {
    console.log(index);
    jQuery(this).children().addClass('right');
  }
});

jQuery(".sort_by_category").on("change",function (){
	window.location.href = $(this).val();
});

jQuery(".filter_by_tag").on("change",function (){
	window.location.href = $(this).val();
});

jQuery('.add_course_to_cart').on('submit', function(e) {
    e.preventDefault();
    let cart_count = parseInt(jQuery(".header_cart-items").text());
    console.log(cart_count);
    var formId = jQuery(this).closest("form").attr('data-id');
    jQuery(".add_to_cart_btn_"+formId).text("Adding to cart...")
    $.ajax({
        url: `${globalUrl}add-to-cart`,
        type: "POST",
        data: $(this).serialize(),
        success: function(response) {
            cart_count++;
            console.log(cart_count);
            
            jQuery(".header_cart-items").text(cart_count);
            jQuery(".add_to_cart_btn_"+formId).prop('disabled', true).text('Added to cart').addClass("disabled");
        },
    });
    return false;
});

jQuery(".course_fee_selection").change(function(){
    var formId = jQuery(this).closest("form").attr('data-id');
    jQuery(".add_to_cart_btn_"+formId).prop('disabled', false).removeClass("disabled");
});

jQuery('#lead_validate_form').validate({
    rules: {
      'mobile': {
          required: true,
          number: true,
          maxlength: 10,
          minlength: 10,
      },
    },
    messages: {
      'mobile': "Enter valid mobile number.",
    },
    submitHandler: function(form) {
      jQuery(".checkout_loader").show()
      let formId = $(form).attr('id');      
      if (leadSubmitStatus) {
        form.submit();
      } else {
        sendMobileOtp(formId);
        countDown();
      }
    }
});

jQuery('#checkoutform').validate({
    rules: {
        'mobile': {
            required: true,
            number: true,
            maxlength: 10,
            minlength: 10,
        },
    },

    messages: {
        'lead_email_address': "Enter valid email address.",
        'lead_first_name': "Enter valid first name.",
        'lead_last_name': "Enter Valid last name.",
        'guardian_name': "Enter Valid Gurdian name.",
        'lead_mobile[1]': "Enter valid mobile number.",
        'addressline_1': "Enter Valid address",
        //'date_of_birth': "Please type your date of birth",
        'gender': "Select your gender",
        'state': "Please Select State",
        'city': "Please Select city",
        'pincode': "Enter valid pincode",
        'qualification': "Select your highest qualification",
        'language_option': "Select your prefferd language",
    },

});

jQuery('#leadCaptureForm').validate({
    rules: {
        'lead_mobile_number[1]': {
            required: true,
            number: true,
            maxlength: 10,
            minlength: 10,
        },
        pincode:{
          maxlength: 6,
          minlength: 6,
        }
    },
    messages: {
      'lead_mobile_number[1]': "Please type valid mobile number.",
      lead_full_name:{
        'required':"Enter Valid Full Name"
      },
      lead_email:{
        'required':"Enter Valid Email Address"
      },
      lead_pincode:{
        'required':"Enter Valid Address Pincode",
        'maxlength':"Enter Valid Address Pincode",
        'minlength':"Enter Valid Address Pincode",
      }
    },
    submitHandler: function(form) {
      jQuery(".checkout_loader").show()
      let formId = $(form).attr('id');      
      if (leadSubmitStatus) {
        form.submit();
      } else {
        insertLeadRecord(form,formId)
        sendMobileOtp(formId);
        countDown();
      }

    }
});

jQuery('#capture_lead_otp_target').otpdesigner({
    typingDone: function (code) {      
      if(otp_value != code){
        jQuery("#otp_target-error").show();
      } else {
        jQuery("#otp_target-error").hide();
        leadSubmitStatus = true;
        jQuery(".form-submit-btn").prop('disabled',false).removeClass("disabled");
      }
    },
    length: 4,
    onlyNumbers: false,
    inputsClasses: 'some-class text-danger',
});

jQuery('#otp_target').otpdesigner({
    typingDone: function (code) {      
      if(otp_value != code){
        jQuery("#otp_target-error").show();
        return false
      }
      leadSubmitStatus = true;
      jQuery("#otp_target-error").hide();
      jQuery(".form-submit-btn").prop('disabled',false).removeClass("disabled");
    },
    length: 4,
    onlyNumbers: false,
    inputsClasses: 'some-class text-danger',
});

jQuery(".resendOtp").on('click',function(){
    jQuery(this).addClass('display-none');
    jQuery('.countdown_label').removeClass('display-none');
    let form = jQuery(this).closest("form");
    let formId = $(form).attr('id');
    countDown();
    sendMobileOtp(formId);
});
  
jQuery(".backstep").on('click',function(){
    let form = jQuery(this).closest("form");
    let formId = $(form).attr('id');
    jQuery("#" + formId + " .lead_steps").removeClass("active");
    jQuery("#" + formId + " .lead_steps.step_1").addClass("active");
});

jQuery('.open-popup-link').magnificPopup({
    type: 'inline',
    midClick: true,
    mainClass: 'mfp-fade'
});

jQuery(".mfp-close-btn").on("click",function(){
    jQuery(".mfp-close").trigger("click");
})

function insertLeadRecord(form,formId) {
		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: `${globalUrl}insert-lead-records`,
			type: "post",
			data: jQuery(form).serialize(),
			success: function(result) {
        console.log(result);
        
				jQuery("#" + formId + " .lead_id").val(result.id);
				return true;
			}
		});
}

function sendMobileOtp(formId) {
  jQuery(".after_otp_validation").prop('disabled',true).addClass("disabled");
  var mobileNo = jQuery("#" + formId + " #lead_mobile_info").val();
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: `${globalUrl}submit-mobile-otp`,
    type: "post",
    data: {
      mobile: mobileNo,
    },
    success: function(result) {
      if (result) {        
        otp_value = result.otp_value;
        jQuery("#" + formId + " .formFieldOtpResponse").val(result.otp_value);
        jQuery("#" + formId + " .submitted_lead_mobile_no").text(mobileNo);
        jQuery("#" + formId + " .lead_steps").removeClass("active");
        jQuery("#" + formId + " .lead_steps.step_2").addClass("active");
        jQuery(".checkout_loader").hide()
        return true;
      } else {
        
        return true;
      }
    }
  });
}

let interval;
function countDown(){
  clearInterval(interval)
  var timer2 = "0:59";
  interval = setInterval(function() {
    var timer = timer2.split(':');
    var minutes = parseInt(timer[0], 10);
    var seconds = parseInt(timer[1], 10);
    --seconds;
    minutes = (seconds < 0) ? --minutes : minutes;
    if (minutes < 0) {
      clearInterval(interval)
      jQuery('.countdown_label').addClass("display-none");
      jQuery('.resendOtp').removeClass("display-none");
    };
    seconds = (seconds < 0) ? 59 : seconds;
    seconds = (seconds < 10) ? '0' + seconds : seconds;
    //minutes = (minutes < 10) ?  minutes : minutes;
    jQuery('.countdown').html(minutes + ':' + seconds);
    timer2 = minutes + ':' + seconds;
  }, 1000);
}

function remove_form_cart(course_id) {    
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: `${globalUrl}remove-from-cart`,
        type: "post",
        data: {
            course_id: course_id,
        },
        success: function(result) {
            if(result){
                window.location.replace(`${globalUrl}cart`);
            }
        }
    });
}

function apply_coupon_code() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: `${globalUrl}apply-coupon-code`,
        type: "post",
        data: {
            coupon_code: $("#coupon_code").val(),
        },
        success: function(result) {
            $(".coupon_status").html(result.message);
            $(".coupon_status").show();
            if (result.status == 0) {
                $("#coupon_code").val("");
                return false;
            }
            $("#amount").val(result.amount) 
            $("#discount").val(result.discount)
            $(".coupon_discount").show();
            $(".total_payble_amount").text(result.display_amount)
            $(".display_coupon_discount").text(result.display_discount)
            $(".coupon_offer_message").text(result.offer_message)
            jQuery.magnificPopup.open({
              items: {
                src: '#coupon-offer-popup', // can be a HTML string, jQuery object, or CSS selector
                type: 'inline',
                mainClass: 'mfp-fade'
              }
            });
        }
    });
}

function getCitiesByStateId(event){
    let state = event.value;
    console.log(state);
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: `${globalUrl}get-city-by-state-id`,
        type: "post",
        data: {
            state: state,
        },
        success: function(result) {
            console.log(result);
            
            let htmlContent = '<option value="">Select City</option>';
            $.each(result, function (key, data) {
                htmlContent += '<option value="'+data.id+'"> '+data.name+' </option>';
            });
            $("#city").html(htmlContent);  
        }
    });
}

jQuery("#varthana_loan_application_form .copy_address").on("click",function(){
    jQuery("input[name=permanent_address]").val(jQuery("input[name=current_address]").val());
    jQuery("input[name=permanent_pincode]").val(jQuery("input[name=current_pincode]").val());
    jQuery("input[name=permanent_city]").val(jQuery("input[name=current_city]").val());
    jQuery("input[name=no_of_years_permanent_residence]").val(jQuery("input[name=no_of_years_current_residence]").val());
    jQuery("select[name=permanent_residence_type]").val(jQuery("select[name=current_residence_type]").val());
})

jQuery("#varthana_loan_application_form").validate({
    rules: {
        'email': {
            required: true,
            email_rule: true
        }
    }
})

jQuery(".occupation").on("change",function(){
    let id = jQuery(this).attr('id');
    var selectedId = jQuery('#'+id+" option:selected").attr('data-id');
    jQuery(".professional_section").removeClass("active");
    jQuery("."+selectedId).addClass("active");
})

if ($('#file-dropzone').length) {
  Dropzone.autoDiscover = true;

  const uploadedFiles = [];

  const myDropzone = new Dropzone("#file-dropzone", {
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: `${globalUrl}upload-payslips`,
      paramName: "file",
      maxFilesize: 5,
      uploadMultiple: false,
      addRemoveLinks: true,
      acceptedFiles: "image/*,.pdf",
      params: {
          action: "varthana_upload_payslip",
      },
      success: function(file, response) {
          if (response) {
              console.log(response);
              
              uploadedFiles.push(response);
          }
          jQuery("#varthana_payslips").val(uploadedFiles);        
      }
  });
}
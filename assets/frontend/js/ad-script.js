let leadSubmitStatus = false;
let otp_value = null;
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

// testimonial Slider
$('.testimonial_slider').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: false,
    arrows: true,
    autoplaySpeed: 9000,
    responsive: [{
            breakpoint: 1199,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                arrows: false
            }
        }
    ]
});

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
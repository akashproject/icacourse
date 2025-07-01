// Add To Cart Ajax
jQuery('.add_course_to_cart').on('submit', function(e) {
    e.preventDefault();
    let cart_count = parseInt(jQuery(".header_cart-items").text());
    var formId = jQuery(this).closest("form").attr('data-id');
    jQuery(".add_to_cart_btn_"+formId).text("Adding to cart...")
    $.ajax({
        url: `${globalUrl}add-to-cart`,
        type: "POST",
        data: $(this).serialize(),
        success: function(response) {
            cart_count++;
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
        'lead_mobile_number[0]': {
            required: true,
        },
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

jQuery('.open-popup-link').magnificPopup({
    type: 'inline',
    midClick: true,
    mainClass: 'mfp-fade'
});

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
            
            if (result.status == 0) {
                $("#coupon_code").val("");
                return false;
            }
            $(".coupon_status").html(result.message);
            $(".coupon_status").show();
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
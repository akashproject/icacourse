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
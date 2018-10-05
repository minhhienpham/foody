$(document).ready(function() {
    checkLogin('/checkout/cart');
    $.ajax({
        url: "/api/users/info",
        type: "get",
        headers: {
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + token
        },
        success: function(response) {
            var user = response.result;
          $('#name-orderer').val(user.full_name);
          $('#EMAIL').val(user.email);
          $('#phone-orderer').val(user.phone);
        }
    });
    $(document).on('click', '#submit-cart-btn', function(event) {
        event.preventDefault();
        $.ajax({
            url: "/api/orders",
            type: "post",
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token
            },
            data: {
                'products' : localStorage.getItem('cart'),
                'address' : $('#address-orderer').val(),
                'customer_note'  : $('#note-orderer').val(),
                'delivery_time'  : $('#delivery-time input').val(),
                'money_ship' : 50000,
            },
            success: function(response) {
                if(response.code == 200) {
                    ModalMessageCart();
                    modifyCart(0, 'clear')
                }
            },
            error: function (response) {
                if(response.responseJSON.error.products&&response.responseJSON.error.products.length >0){
                    $('#modalMessageCart h3').html(Lang.get('user/cart.empty_cart'));
                    $('#modalMessageCart #modal-message').html(Lang.get('user/cart.message_empty_cart'));
                    ModalMessageCart();
                }else{
                    errors = Object.keys(response.responseJSON.error);
                    errors.forEach(error => {
                        $('#valmsg-' + error).removeClass('field-validation-valid');
                        $('#valmsg-' + error).addClass('field-validation-error');
                        $('#valmsg-' + error).html(response.responseJSON.error[error]);
                    });
                }
            }
        });
    });
    $("#modalMessageCart").on("hidden.bs.modal", function () {
        location.href = '/';
    });
});
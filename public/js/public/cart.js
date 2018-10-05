var cart = JSON.parse(localStorage.getItem('cart'));
$(document).ready(function() {
    if(!cart){
        $('.box-cart').html('<p class="title text-uppercase">Your Cart is empty</p>');
        cart = [];
    }else{
        showCart(cart);
    }
    $('.shopping-cart-show').click(function () {
        $('.box-cart').toggleClass("active");
    });
});
function addToCart(idProduct) {
    if(!cart){
        cart = [];
    }
    if(window.location.pathname.substring(10) == idProduct){
        var img = $('#bzoom-thumb-image-1').attr('src');
        var name = $('#productName').text();
        var price = $('#productPrice').text();
    } else {
        var img = $('#item-product-' + idProduct +' .item .item-img a img').attr('src');
        var name = $('#item-product-' + idProduct +' .item .item-name a h2').text();
        var price = $('#item-product-' + idProduct +' .item .item-name .price span').text();
    }
    var cartItem;
    if(cart.length > 0){
        var resultObject = searchById(idProduct, cart);
        if(!resultObject){
            cartItem = {id:idProduct, name:name, img:img, price:price, quantity: 1};
            cart.push(cartItem);
        }else{
          for (var j = 0; j < cart.length; j++) {
            if(idProduct === cart[j].id){
                cart[j].quantity += 1;
            }
          }
        }
    }else {
    cartItem  = {id:idProduct, name:name, img:img, price:price, quantity: 1};
    cart.push(cartItem);
    }
    localStorage.setItem("cart", JSON.stringify(cart));
    showCart(cart);
    expandCart();
}
function searchById(id, data){
    for (var i=0; i < data.length; i++) {
        if (data[i].id === id) {
          return data[i];
        }
    }
}
function showCart(cart) {
    var html = '', total = 0;
    if(cart.length){
        html += '<div class="box-cart-detail">'+
              '<p class="title text-uppercase">'+Lang.get('user/index.cart.your_cart')+
              '</p>'+
              '<div class="popup-cart box-cart-scroll">'+
                '<table class="table">'+
                 ' <tbody>';
        for(var i=0; i<cart.length; i++) {
            var cartItem = cart[i];
            total += cartItem.price * cartItem.quantity;
            html += '<tr>' +
            '<td rowspan="2" width="50">'+
            '<img src="'+cartItem.img+'" alt="" width="75" height="75">'+
            '</td>'+
            '<td colspan="3" class="cart-name bold">'+
            '<span>'+cartItem.name+'</span>'+
            '<i class="fa fa-trash-o delete_pro_in_cart_top" title="Xoá khỏi giỏ hàng" onclick="modifyCart('+cartItem.id+',\'delete\')"></i>'+
            '</td>'+
        '</tr>'+
        '<tr>'+
            '<td width="100" class="text-right td_soluong">'+
            '<i class="fa fa-minus " onclick="modifyCart('+cartItem.id+',\'subone\')"></i> <span><input class="number-product-'+cartItem.id+'" id="number-product-'+cartItem.id+'" type="number" style="width:40px" onchange="modifyCart('+cartItem.id+',\'change\')" value="'+cartItem.quantity+'"></span><i class="fa fa-plus " onclick="modifyCart('+cartItem.id+',\'addone\')"></i>'+
            '</td>'+
            '<td class="text-right">'+cartItem.price+' VNĐ</td>'+
            '<td class="text-right bold">'+(cartItem.price*cartItem.quantity).toFixed(3)+' VNĐ</td>'+
        '</tr>';
        }
        html += '</tbody>'+
                '</table>'+
              '</div>'+
              '<table class="table">'+
                '<tfoot>'+
                  '<tr>'+
                    '<td colspan="3" class="bold"><b>'+Lang.get('user/index.cart.total')+'</b></td>'+
                    '<td id="total-money" class="text-right"><b class="bold" style="color:#f00;font-size:15px;">'+total.toFixed(3)+' </b>VNĐ</td>'+
                  '</tr>'+
                '</tfoot>'+
              '</table>'+
              '<p class="cart-options">'+
                '<a href="javascript:;" class="thugon-cart btn btn-sm btn-primary btn-warning text-capitalize" onclick="collapseCart();"><i class="fa fa-close"></i>'+Lang.get('user/index.cart.exit')+' </a>'+
                '<a href="javascript:;" onclick="modifyCart(0,\'clear\');" class="btn btn-sm btn-primary btn-danger text-capitalize"><i class="fa fa-trash"></i>'+Lang.get('user/index.cart.cancel')+'</a>'+
                '<a id="checkout-btn" onclick="checkLogin(\'/checkout/cart\')" class="btn btn-sm btn-primary btn-success text-capitalize"><i class="fa fa-shopping-cart"></i>'+Lang.get('user/index.cart.order')+'</a>'+
              '</p>'+
            '</div>';
        changeNumberCart(cart.length);
        $('.box-cart').html(html);
    }else {
        collapseCart();
        $('.box-cart').html('<p class="title text-uppercase">Your Cart is empty</p>');
        changeNumberCart(0);
    }
    $('#cart-detail-checkout .box-cart-detail p').remove();
    $('#total').html(total.toFixed(3));
    $('#money-ship').html(formatNumber(50000));
    $('#total-payments').html((total+50.000).toFixed(3));
}
function changeNumberCart(length) {
    $('.shopping-cart .shopping-cart-show').html('Cart ('+length+')');
}
function modifyCart(id, option) {
    if(option == 'clear') {
        localStorage.removeItem('cart');
        cart = null;
        $('.shopping-cart .shopping-cart-show').html('Cart (0)');
        collapseCart();
        $('.box-cart').html('<p class="title text-uppercase">Your Cart is empty</p>');
        changeNumberCart(0);
    } else {
        for (var j = 0; j < cart.length; j++) {
            if(id === cart[j].id){
                switch (option) {
                    case 'addone':
                        cart[j].quantity += 1;
                        break;
                    case 'subone':
                        cart[j].quantity -= 1;
                        if(cart[j].quantity == 0) {
                            modifyCart(id, 'delete');
                        }
                        break;
                    case 'delete':
                        cart.splice(j, 1);
                        break;
                    case 'change':
                        var number, numberCheckout, numberCart;
                        if(window.location.pathname == '/checkout/cart') {
                            numberCheckout = parseInt($('#cart-detail-checkout .box-cart-detail .box-cart-scroll table tbody tr td span .number-product-' +id).val());
                        }
                        numberCart = parseInt($('#number-product-' +id).val());
                        number = numberCart != cart[j].quanlity ? numberCart : numberCheckout;
                        if(number <=0) modifyCart(id, 'delete'); 
                        cart[j].quantity = number;
                        break;
                }
            }
        }
        if(cart.length == 0) {
            localStorage.removeItem('cart');
            cart = null;
            $('.shopping-cart .shopping-cart-show').html('Cart (0)');
            collapseCart();
            $('.box-cart').html('<p class="title text-uppercase">Your Cart is empty</p>');
            changeNumberCart(0);
        }else{
            localStorage.setItem("cart", JSON.stringify(cart));
            showCart(cart);
            changeNumberCart(cart.length);
        }
    }
}
function collapseCart() {
    $('.box-cart').removeClass("active");
}
function expandCart() {
    $('.box-cart').addClass("active");
}

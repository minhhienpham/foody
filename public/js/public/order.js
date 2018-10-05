function updateOrder(order_id){
    $('#confirmMsg').text(Lang.get('user/cart.orders.confirm_message'));
    $('#btnYes').on('click', function(){
        $.ajax({
            url: 'api/orders/' + order_id,
            type: "put",
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token
            },
            success: function(response) {
                location.reload();
            },
            error: function(response) {
                alert(response.responseJSON.message);
            }
        });
    });
}

$(document).ready(function(){
  $('#warningMsg').hide();
  $.ajax({
    url: 'api/orders',
    type: "get",
    headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + token
    },
    success: function(response) {
      orders = response.result.data;
      if (orders.length == 0) {
        $('#productInfo').hide();
        $('#warningMsg').show().text(Lang.get('user/cart.orders.not_buy'));
      } else {
        orders.forEach(order => {
            var totalMoney = 0;
            orderHtml = '';
            orderHtml += '<div class="panel-heading left full" id="panelHeading-'+order.id+'"><div class="col-lg-12 distance-none">\
            <div class="col-lg-3">\
                <p>\
                    <i class="fa fa-barcode"></i>\
                    <b id="statusOrder-'+order.id+'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mã đơn hàng">#\
                    '+order.id+'</b>\
                </p>\
            </div>\
            <div class="col-lg-3">\
                <p>\
                    <i class="fa fa-money"></i>\
                    <b id="total-money-'+order.id+'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tổng tiền"></b>\
                </p>\
            </div>\
            <div class="col-lg-3">\
                <p>\
                    <i class="fa fa-calendar"></i>\
                    <b data-toggle="tooltip" data-placement="top" title="" data-original-title="Ngày mua">\
                    '+ order.submit_time+'</b>\
                </p>\
            </div>\
            <div class="col-lg-3">';

            if(order.processing_status == 3) { 
                orderHtml += '<p><b id="cancelOrder" onclick="updateOrder('+ order.id +');" data-toggle="modal" data-target="#confirmModal" data-placement="top" title="" data-original-title="Hủy đơn hàng">\
                    <i class="fa fa-trash"></i>'+Lang.get('user/cart.orders.cancel_order')+'</b></p>\
                    </div></div></div>';
            } else if(order.processing_status == 2) { 
                orderHtml += '<p><i class="fa fa-info-circle"></i>\
                    <b data-toggle="tooltip" data-placement="top" title="" data-original-title="Trạng thái">\
                        <span >'+Lang.get('user/cart.orders.canceled_order')+'</span>\
                    </b></p></div></div></div>';
            } else {
                orderHtml += '<p><i class="fa fa-info-circle"></i>\
                    <b data-toggle="tooltip" data-placement="top" title="" data-original-title="Trạng thái">\
                        <span >'+Lang.get('user/cart.orders.approved_order')+'</span>\
                    </b></p></div></div></div>';
            }

            order.order_details.forEach(products => {
                orderHtml+='<div class="panel-body distance-none">\
                            <div class="col-lg-12 border-none distance-none">\
                            <div class="col-lg-4" style="padding-left:0">\
                            <img src="images/products/'+products.product.images[0].path +'"/>\
                            </div>\
                            <div class="col-lg-8"><h2>'+Lang.get('user/cart.orders.product_name')+': '+products.product.name+'</h2>\
                            <p class="col-lg-12">'+Lang.get('user/cart.orders.quantity')+': <b>'+ products.quantity+'</b></p>\
                            <p class="col-lg-12">'+Lang.get('user/cart.orders.price')+': <b>'+ formatNumber(products.product.price) +' VND</b></p>\
                            <p class="col-lg-12">'+Lang.get('user/cart.orders.total')+': <b>'+ formatNumber(products.product.price*products.quantity) +' VND</b></p>\
                            </div></div></div>';
                            totalMoney += products.product.price*products.quantity;
            });
            orderHtml += '<div class="panel-footer left full none-border none-background">\
                        <div class="col-lg-12"><p><b>'+localStorage.getItem("username")+'</b></p><p><b>'+order.address+'</b></p>\
                        <div class="col-lg-6 right text-right"><p>'+Lang.get('user/cart.orders.payments')+': <b>CARD</b></p>\
                        <p>'+Lang.get('user/cart.orders.money_ship')+': <b>' + formatNumber(order.money_ship) + ' VND</b></p>\
                        <p>'+Lang.get('user/cart.orders.total')+': <b>' + formatNumber(order.money_ship+totalMoney) + ' VND</b></p></div></div></div>';
      
            $('#productInfo').append(orderHtml);
            $('#total-money-'+order.id).html(formatNumber(order.money_ship+totalMoney) + ' VND');
            if(order.processing_status == 3) { 
                $('#statusOrder-'+order.id).html('Pending Order');
                $('#statusOrder-'+order.id).css('color', 'red');
                $('#panelHeading-'+order.id).css('background-color', 'powderblue');
            } else if(order.processing_status == 2) {
                $('#panelHeading-'+order.id).css('background-color', 'red');
            }  
            else { 
                $('#panelHeading-'+order.id).css('background-color', 'chartreuse');
            }
        });
      }
    }
  });
});

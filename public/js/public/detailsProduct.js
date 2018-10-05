$(document).ready(function() {
  $.ajax({
    url: "/api" + window.location.pathname,
    type: "get",
    success: function(response){
      $('#productName').html(response.result.name);
      $('#details').html(response.result.describe);
      $('#productPrice').html(formatNumber(response.result.price));
      $('.breadcrumb ul li:nth-child(2) a').html(response.result.category.parent.name);
      $('.breadcrumb ul li:nth-child(2) a').attr('href', api.products_index +'?category_id=' + response.result.category.parent_id);
      $('.breadcrumb ul li:nth-child(3) a').attr('href', api.products_index +'?category_id=' + response.result.category.id);
      $('.breadcrumb ul li:nth-child(3) a').html(response.result.category.name);
      $('.breadcrumb ul li:nth-child(4) a').html(response.result.name);
      $('#btn-muangay').attr('onclick', 'addToCart('+response.result.id+')');
      let i = 1;
      response.result.images.forEach(image => {
        $('#bzoom-thumb-image-' + i).attr('src', 'images/products/'+ image.path);
        $('#bzoom-big-image-' + i).attr('src', 'images/products/'+ image.path);
        $('#mobile-image-' + i).attr('src', 'images/products/'+ image.path);
        smallImg=$('.bzoom_smallthumb_active').parent().find( "li" ).children()[i-1];
        $(smallImg).attr('src','images/products/'+ image.path);
        i++;
      });
    }
  });
});

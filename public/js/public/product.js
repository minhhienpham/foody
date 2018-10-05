function loadProducts(result, html, current_page) {
  if(result.result) {
  result.result.data.forEach(product => {
    html += '<div class="item-wrapper">'+
    '<div class="item">'+
      '<div class="item-img">'+
        '<a href="'+ api.products_index +'/'+ product['id'] +'">'+
          '<img height="200" src="images/products/'+product.images[0].path+'" alt="" />'+
        '</a>'+
      '</div>'+
      '<div class="item-name">'+
        '<a href="'+ api.products_index +'/'+ product['id'] +'">'+
          '<h2 class="text-center text-uppercase distance-none" title="">'+product.name+'</h2>'+
        '</a>'+
        '<div class="store text-center">'+
          '<a href=""><span>'+product.store.name+'</span></a>'+
        '</div>'+
        '<div class="price text-center">'+
        '<span>'+formatNumber(product.price)+' VND</span>'+
        '</div>'+
      '</div>'+
      '<div class="item-addCart-hover">'+
        '<span class="item-addCart btn btn-default btn-lg text-capitalize" onclick="">'+
            '<i class="fa fa-shopping-cart"></i>Buy Now'+
        '</span>'+
        '<div class="row">'+
          '<div class="col-lg-12">'+
            '<div class="col-lg-4" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lượt xem">'+
              '<p><i class="fa fa-eye"></i></p>'+
              '<p>126</p>'+
            '</div>'+
            '<div class="col-lg-4" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lượt mua">'+
              '<p><i class="fa fa-tags"></i></p>'+
              '<p>28</p>'+
            '</div>'+
            '<a href="javascript:;">'+
              '<div class="col-lg-4" data-toggle="tooltip" data-placement="top" title="" data-original-title="Chia sẻ">'+
                '<p><i class="fa fa-share-alt"></i></p>'+
                '<p>Share</p>'+
              '</div>'+
            '</a>'+
          '</div>'+
        ' </div>'+
      '</div>'+
    '</div>'+
  '</div>';
  });
}
html += '</div>';
if (current_page !== result.result.paginator.last_page) {
  html += '<div class="page-readmore text-uppercase">+See more (4) <i class="fa fa-angle-double-down"></i></div>';
}
return html;
}
$(document).ready(function() {
    var url = api.api_products_index + window.location.search;
    var id = parseInt(window.location.search.substring(13));
    var current_page;
    $.ajax({
        url: url+'&page=1',
        type: "get",
        success: function(result) {
          console.log(result)
          var html = '';
          current_page = result.result.paginator.current_page;
          $('.breadcrumb ul li:nth-child(2) a').html(result.result.data[0].category.parent.name);
          if(id===result.result.data[0].category.parent.id) {
            $('.breadcrumb ul li:nth-child(2) a').attr('href', api.products_index +'?category_id=' + id);
            // $('.breadcrumb ul li:nth-child(2) a').html(result.result.data[0].category.parent.name);
            $('.breadcrumb ul li:nth-child(2) i').hide();
            html+='<div id="category-products" class="product product-home product-wrapper">'+
            '<div class="title border-bottom">'+
              '<i class="fa fa-fire"></i>'+
              '<h1 class="distance-none text-uppercase">'+
                '<span>'+result.result.data[0].category.parent.name+'</span>'+
              '</h1>'+
            '</div>';
          } else {
            $('.breadcrumb ul li:nth-child(2) a').attr('href', api.products_index +'?category_id=' + result.result.data[0].category.parent.id);
            // $('.breadcrumb ul li:nth-child(2) a').html(result.result.data[0].category.parent.name);
            $('.breadcrumb ul li:nth-child(3) a').attr('href', api.products_index +'?category_id=' + id);
            $('.breadcrumb ul li:nth-child(3) a').html(result.result.data[0].category.name);
            html+='<div id="category-products" class="product product-home product-wrapper">'+
            '<div class="title border-bottom">'+
              '<i class="fa fa-fire"></i>'+
              '<h1 class="distance-none text-uppercase">'+
                '<span>'+result.result.data[0].category.name+'</span>'+
              '</h1>'+
            '</div>';
          }
          html = loadProducts(result, html, current_page);
          $('.product-home').append(html);
        }
    });
    $(document).on('click', '.page-readmore', function (event) {
      event.preventDefault();
      $.ajax({
        url: url+'&page=' + ++current_page,
        type: "get",
        success: function(result) {
          let html = '';
          $('.page-readmore').remove();
          html = loadProducts(result, html, current_page);
          $('#category-products').append(html);
        }
    });
    })
});

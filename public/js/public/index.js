$(document).ready(function() {
    $.ajax({
        url: "/api/products?newest_products=8",
        type: "get",
        success: function(result) {
            let i = 1;
            result.result.forEach(product => {
                $('.img-newest-' + i).attr('href', api.products_index + '/' + product['id']);
                $('#img-pro-newest-' + i).attr({'src': 'images/products/'+ product.images[0].path,
                                                'height' : '200'});
                $('#buy-now-newest-' + i).attr('onclick', 'addToCart('+product.id+')');
                $('#name-pro-newest-' + i).html(product.name);
                $('#store-pro-newest-' + i + ' span').html(product.store.name);
                $('#price-pro-newest-' + i + ' span').html(formatNumber(product.price) +' VND');
                i++;
            });
        }
    });
    $.ajax({
        url: "/api/products?filter=hotest",
        type: "get",
        success: function(result) {
            let i = 1;
            html ='';
                if(result.result) {
                result.result.forEach(category => {
                html+='<div class="product product-home product-wrapper">'+
                            '<div class="title border-bottom">'+
                                '<i class="fa fa-fire"></i>'+
                                '<h1 class="distance-none text-uppercase">'+
                                    '<span>'+category.name+'</span>'+
                                    '<a href="'+api.products_index+"?category_id="+category.id+'" class="btn btn-danger btn-sm">See More</a>'+
                                '</h1>'+
                            '</div>';
                category.products.forEach(product => {
                    html += '<div id="item-product-'+product.id+'" class="item-wrapper">'+
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
                                            '<span>'+formatNumber(product.price)+' </span> VND'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="item-addCart-hover">'+
                                        '<span class="item-addCart btn btn-default btn-lg text-capitalize" onclick="addToCart('+product.id+')">'+
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
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
                        });
                        html+='</div>';
                    });
            }
            $(html).insertBefore('.bottom-banner');
        }
    });
});

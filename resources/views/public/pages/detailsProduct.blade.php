@extends('public.layout.master')
@section('breadcrumb')
<div class="breadcrumb distance-none">
  <ul class="list-inline text-uppercase distance-none">
    <li>
      <a href=""><i class="fa fa-home"></i></a>
      <i class="fa fa-angle-double-right"></i>
    </li>
    <li>
      <a href=""></a>
      <i class="fa fa-angle-double-right"></i>
    </li>
    <li>
      <a href=""></a>
      <i class="fa fa-angle-double-right"></i>
    </li>
    <li>
      <a href="javascript:;"><h1 style="font-size:14px;padding:0;margin:0;"></h1></a>
    </li>
  </ul>
</div>
@endsection
@section('banner-ad')
<div class="banner_home_sm">
  <a href="don-tet-ron-rang-cung-flyfood-goi-y-thuc-don-tiec-nhanh-nhan-dip-tet-den-xuan-ve--detail-0efb230118141528294.html">
    <img src="user/Files/admin/23012018/BANNER&#32;TIEC&#32;NHANH&#32;2018.png" />
  </a>
  <a href="index.html">
    <img src="user/Files/admin/10042018/1-mon-cung-giao-610x180.gif" />
  </a>
</div>
@endsection
@section('content')
  <div class="left-banner">
    <a href="http://tiectrongoi.vn/trang-chu.html">
      <img src="user/Files/admin/19042018/baner-dung-flyfood.gif" />
    </a>
  </div>
  <div class="right-banner">
    <a href="dang-ky-loc-xoay-happy-birthday-loc-coc-leng-keng-5-con-so-1-detail-fdb7020418135808910.html">
      <img src="user/Files/admin/27042018/banner-phai.gif" />
    </a>
  </div>

  <div class="product product-home product-wrapper">
      <div class="col-lg-12 full left distance-none">
          <div class="col-lg-5 left spdetail distance-none">
              <section class="product product-home">
                  <div class="slider-mobile">
  
                      <div class="carousel_new carousel_buys owl-carousel owl-theme">
                                  <div class="item">
                                      <div class="item-img">
                                          <a href="javascript:;">
                                              <img id="mobile-image-1"/>
                                          </a>
                                      </div>
  
                                  </div>
                                  <div class="item">
                                      <div class="item-img">
                                          <a href="javascript:;">
                                              <img id="mobile-image-2"/>
                                          </a>
                                      </div>
  
                                  </div>
                                  <div class="item">
                                      <div class="item-img">
                                          <a href="javascript:;">
                                              <img id="mobile-image-3"/>
                                          </a>
                                      </div>
                                  </div>
                      </div>
  
                  </div>
              </section>
              
              <!--show product images-->
              <div class="bzoom_wrap">
                <ul id="bzoom">
                  <li>
                    <img id="bzoom-thumb-image-1" class="bzoom_thumb_image"  />
                    <img id="bzoom-big-image-1" class="bzoom_big_image"  />
                  </li>
                  <li>
                    <img id="bzoom-thumb-image-2" class="bzoom_thumb_image"/>
                    <img id="bzoom-big-image-2" class="bzoom_big_image"/>
                  </li>
                  <li>
                    <img id="bzoom-thumb-image-3" class="bzoom_thumb_image" />
                    <img id="bzoom-big-image-3" class="bzoom_big_image"  />
                  </li>
                </ul>
              </div>
          </div>
          <div class="col-lg-7 left spdetail chitiet-wrapper distance-none">
              <!--show product detail-->
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h2 id="productName"> </h2>
                      <ul class="list-inline distance-none spdetail">
                          <li>{{__('user/product.details.code')}}: 7127 
                          </li>
                          <li>
                            <i class="fa fa-tags"></i>4820 {{__('user/product.details.purchases')}}
                          </li>
                          <li>
                            <i class="fa fa-eye"></i>8563 {{__('user/product.details.view')}}
                          </li>
                      </ul>
  
                  </div>
                  <div class="panel-body none-border">
                      <p id="details">
                        </p>
  
                          <div class="price left">
                              <span id ="productPrice" class="only-price"></span><span class="only-price">&nbsp;VND</span>
                          </div>
  
                      <div class="right social text-right">
                        <p>{{__('user/product.details.code')}}: 7127 </p>
                        <p style="color:#ff0000">
                            <strong>{{__('user/product.details.VAT')}}</strong>
                        </p>
                        <p>
                            <div class="ic">
                                <div class="g-plusone" data-annotation="inline" data-href="http://flyfood.vn/com-ga-la-sen-spdetail-7127310816120859758.html" data-width="300"></div>
                            </div>
                            <div class="fb-like"
                                  data-href="http://flyfood.vn/com-ga-la-sen-spdetail-7127310816120859758.html"
                                  data-layout="button_count"
                                  data-action="like"
                                  data-show-faces="false"
                                  data-share="true">
                            </div>
                        </p>
  
                      </div>
                      <br style="clear:both" />
                      <div class="col-lg-12 distance-none left">
                          <div class="col-lg-6 left spdetail distance-none">
                              <p>
                                  <b>{{__('user/product.details.select_type')}}:</b>
                                  <span class="size active" data-val="1">{{__('user/product.details.standard')}}</span>
                              </p>
                                  <div>
                                      <label class="sl-validate field-validation-error"></label>
                                      <div class="form-group input-group col-lg-12">
                                          <span class="input-group-addon">{{__('user/product.details.quantity')}}</span>
                                          <input id="Soluong" type="text" class="form-control" placeholder="{{__('user/product.details.quantity')}}" value="1" onchange="CheckNumber(this);" />
                                      </div>
                                  </div>
                                  <div>
                                              <div class="form-group col-lg-12 distance-none">
                                                  <button id="btn-muangay" type="button" class="btn btn-lg btn-primary btn-block btn-success text-capitalize">
                                                      <i class="fa fa-shopping-cart"></i>{{__('user/product.details.buy_now')}}
                                                  </button>
                                              </div>
                                  </div>
  
                          </div>
                          <div class="col-lg-6 spdetail moto left distance-none">
                            <img src="user/Files/Images/moto-hotline.png" style="width:200px;float:right;" alt="giao hang" />
                          </div>
                      </div>
  
                  </div>
              </div>
          </div>
      </div>
  


      <div class="title border-bottom" style="margin:0;"></div>
      


<section class="bottom-banner">
  <a href="ban-muon-dat-tiec-flyfood-cung-cap-mon-an-cuc-nhanh-detail-fe4d181215170131137.html">
    <img src="user/Files/admin/02072016/Banner-flyfood-footer.png" />
  </a>
</section>
@endsection
@section('js')
  <script type="text/javascript" src="/js/public/detailsProduct.js"></script>
@endsection

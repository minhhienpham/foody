@extends('public.layout.master') @section('breadcrumb')
<div class="breadcrumb distance-none">
  <ul class="list-inline text-uppercase distance-none">
    <li>
      <a href="/"><i class="fa fa-home"></i></a>
      <i class="fa fa-angle-double-right"></i>
    </li>
    <li>
      <a href="">{{ __('user/category.title')}}</a>
      <i class="fa fa-angle-double-right"></i>
    </li>
    <li>
      <a href="">
        <h1 style="font-size:14px;padding:0;margin:0;"></h1>
      </a>
    </li>
  </ul>
</div>
@endsection @section('banner-ad')
<div class="banner_home_sm">
  <a href="don-tet-ron-rang-cung-flyfood-goi-y-thuc-don-tiec-nhanh-nhan-dip-tet-den-xuan-ve--detail-0efb230118141528294.html">
    <img src="user/Files/admin/23012018/BANNER&#32;TIEC&#32;NHANH&#32;2018.png" />
  </a>
  <a href="index.html">
    <img src="user/Files/admin/10042018/1-mon-cung-giao-610x180.gif" />
  </a>
</div>
@endsection @section('content')
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
  <p class="message full left text-center">{{__('user/cart.required_fill')}}</p>
  <div class="dat-hang col-sm-12 distance-none" style="margin-bottom:10px;">
    <form action="/thong-tin-gio-hang.html?Length=6" data-ajax="true" data-ajax-failure="hideMark" data-ajax-method="Post" data-ajax-success="checkOrder" enctype="multipart/form-data" id="_loginForm" method="post" novalidate="novalidate">
      <div class="chi-tiet-gh col-sm-12">
        <h3 class="title text-capitalize">
          <i class="fa fa-shopping-cart"></i>{{__('user/cart.cart_infor')}}
        </h3>
        <div class="cart-detail-wrapper">
          <div id="cart-detail-checkout" class="box-cart cart-detail">
            <div class="box-cart-detail">
              
            </div>
          </div>
        </div>
      </div>
      <div class="thong-tin col-sm-6">
        <h3 class="title text-capitalize">
          <i class="fa fa-edit"></i> {{__('user/cart.order_infor')}}
        </h3>
        <span class="field-validation-valid" data-valmsg-for="name-orderer" data-valmsg-replace="true"></span>
        <div class="form-group">
          <input class="form-control" data-val="true" data-val-required="{{__('user/cart.name_required')}}" 
          id="name-orderer" name="name-orderer" placeholder="{{__('user/cart.name_orderer')}}" type="text" value="" disabled>
        </div>
        <span class="field-validation-valid" data-valmsg-for="EMAIL" data-valmsg-replace="true"></span>
        <div class="form-group">
          <input class="form-control" data-val="true" data-val-regex="{{__('user/cart.email_regex_orderer')}}" data-val-required="{{__('user/cart.email_required')}}"  data-val-regex-pattern="^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$" 
          id="EMAIL" name="EMAIL" placeholder="{{__('user/cart.email_orderer')}}" type="text" value="" disabled>
        </div>
        <span class="field-validation-valid" data-valmsg-for="phone-orderer" data-valmsg-replace="true"></span>
        <div class="form-group">
          <input class="form-control" data-val="true" data-val-regex="{{__('user/cart.phone_regex_orderer')}}" 
          data-val-regex-pattern="^(0[1-9]{1}\d{8,9})$" data-val-required="{{__('user/cart.phone_regex_orderer')}}" id="phone-orderer"
              name="phone-orderer" placeholder="{{__('user/cart.phone_orderer')}}" type="text" value="" disabled>
        </div>
        <span id="valmsg-address" class="field-validation-valid" data-valmsg-for="address-orderer" data-valmsg-replace="true"></span>
        <div class="form-group">
          <input class="form-control" data-val="true" data-val-required="{{__('user/cart.address_required')}}" 
          id="address-orderer" name="address-orderer" placeholder="{{__('user/cart.address_orderer')}}" type="text" value="">
        </div>
        <div class="form-group">
          <textarea class="form-control" cols="20" id="note-orderer" name="note-orderer" placeholder="{{__('user/cart.note_orderer')}}" rows="3"></textarea>
        </div>
      </div>
      <div class="hinh-thuc col-sm-6">
        <h3 class="title text-capitalize">
          <i class="fa fa-money"></i> {{__('user/cart.payments')}}
        </h3>
        <span id="valmsg-delivery_time" class="field-validation-valid" data-valmsg-for="delivery-time" data-valmsg-replace="true"></span>
        <div class="row">
          <div class='col-sm-12'>
              <div class="form-group">
                  <div class='input-group date' id='delivery-time'>
                      <input type='text' class="form-control" placeholder="{{__('user/cart.delivery_time')}}" />
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
              </div>
          </div>
      </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group input-group">
              <b>{{__('user/index.cart.total')}}</b>
            </div>
          </div>
          <div class="col-sm-6 text-right">
            <span id="total" class="bold"></span> {{__('user/cart.vnd')}}
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group input-group">
                {{__('user/cart.money_ship')}}
            </div>
          </div>
          <div class="col-sm-6 text-right">
            <span id="money-ship" class="bold"></span> {{__('user/cart.vnd')}}
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group input-group">
              <b>{{__('user/cart.total_payment')}}</b>
            </div>
          </div>
          <div class="col-sm-6 text-right">
            <span id="total-payments" class="bold"></span> {{__('user/cart.vnd')}}
          </div>
        </div>
        <div class="form-group">
          <button id="submit-cart-btn" type="submit" class="right btn btn-sm btn-block btn-success text-capitalize text-center">
              {{__('user/cart.submit')}}
          </button>
          <a href="/" class="right btn btn-sm btn-block btn-warning text-capitalize text-center">
            {{__('user/cart.buy_more')}}
          </a>
          <button type="button" onclick="modifyCart(0,'clear');" class="right btn btn-sm btn-block btn-danger text-capitalize text-center">
              {{__('user/cart.cancel_order')}}
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
<section class="bottom-banner">
    <a href="http://flyfood.vn/ban-muon-dat-tiec-flyfood-cung-cap-mon-an-cuc-nhanh-detail-fe4d181215170131137.html">
        <img src="/Files/admin/02072016/Banner-flyfood-footer.png">
    </a>
</section>
@endsection
@section('js')
<script src="js/public/checkout.js"></script>
@endsection
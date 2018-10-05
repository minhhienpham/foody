@extends('public.layout.master')
@section('breadcrumb')
<div class="breadcrumb distance-none">
  <ul class="list-inline text-uppercase distance-none">
    <li>
      <a href="/"><i class="fa fa-home"></i></a>
      <i class="fa fa-angle-double-right"></i>
    </li>
    <li>
      <a href="javascript:;"><h1 style="font-size:14px;padding:0;margin:0;">{{__('user/cart.left-menu.account-info')}}</h1></a>
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

  <div class="list-menu home-menu" style="top:10px;">
    <ul class="list-inline">
      <li>
        <a href={{route('user.info')}}>{{__('user/cart.left-menu.account-info')}}</a>
      </li>
      <li>
        <a href={{route('orders.info')}}>{{__('user/cart.left-menu.order-info')}}</a>
      </li>
      <li>
        <a href="http://flyfood.vn/quy-trinh-huong-dan-dat-hang-online-tai-flyfoodvn-detail-81d1180116115450489.html">{{__('user/cart.left-menu.shopping_guide')}}</a>
      </li>
      <li>
        <a href="http://flyfood.vn/dieu-khoan-su-dung-website-flyfood-detail-28cf180116111951153.html">{{__('user/cart.left-menu.term-of-use')}}</a>
      </li>
      <li>
        <a href="http://flyfood.vn/chinh-sach-bao-mat-flyfood-detail-4ed3180116110956315.html">{{__('user/cart.left-menu.privacy-policy')}}</a>
      </li>
    </ul>
  </div>

  <div class="banner-user" style="margin-top:10px;">
  <p class="message full left text-center" id="textMessage"></p>
    <div class="row">
      <div id="profileForm" class="col-lg-12 left full">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6" style="width:100%;">
                <form method="POST" data-ajax="true" data-ajax-failure="checkMember" data-ajax-method="Post" data-ajax-success="checkMember" enctype="multipart/form-data" method="post">
                  <div class="row">
                    <div class="col-lg-4">
                      <span class="field-validation-valid" data-valmsg-for="username" data-valmsg-replace="true"></span>
                      <div class="form-group">
                      <label for="disabledSelect">{{__('user/login.userInfo.username')}}</label>
                      <input class="form-control" data-val="true" data-val-length="chiều dài 1-100" data-val-length-max="100" data-val-regex="{{__('user/login.userInfo.username_regex')}}" data-val-regex-pattern="([a-zA-Z0-9 .&amp;&#39;-]+)" data-val-required="{{__('user/login.userInfo.username_require')}}" id="userNameInfo" name="username" placeholder="{{__('user/login.userInfo.username')}}" readonly="readonly" type="text" value="" />
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <span class="field-validation-valid" data-valmsg-for="full_name" data-valmsg-replace="true"></span>
                      <div class="form-group">
                        <label for="disabledSelect">{{__('user/login.userInfo.full_name')}}</label>
                        <input class="form-control" data-val="true" data-val-length="{{__('user/login.userInfo.full_name_length')}}" data-val-length-max="100" data-val-required="{{__('user/login.userInfo.full-name-length')}}" id="fullNameInfo" name="full_name" placeholder="{{__('user/login.userInfo.full_name')}}" type="text"/>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <span class="field-validation-valid" data-valmsg-for="gender" data-valmsg-replace="true"></span>
                      <div class="form-group">
                        <label for="disabledSelect">{{__('user/login.userInfo.gender')}}</label>
                        <select class="form-control" data-val="true" data-val-required="{{__('user/login.userInfo.gender_require')}}" id="genderInfo" name="gender">
                          <option value="1">{{__('user/login.userInfo.female')}}</option>
                          <option value="0">{{__('user/login.userInfo.male')}}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <span class="field-validation-valid" data-valmsg-for="phone" data-valmsg-replace="true"></span>
                      <div class="form-group">
                        <label for="disabledSelect">{{__('user/login.userInfo.phone')}}</label>
                        <input class="form-control" data-val="true" data-val-length="{{__('user/login.userInfo.phone_length')}}" data-val-length-max="20" data-val-regex="{{__('user/login.userInfo.phone_regex')}}" data-val-regex-pattern="^(0[1-9]{1}\d{8,9})$" id="phoneNumberInfo" name="phone" placeholder="{{__('user/login.userInfo.phone')}}" type="text"/>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <span class="field-validation-valid" data-valmsg-for="email" data-valmsg-replace="true"></span>
                      <div class="form-group">
                        <label for="disabledSelect">{{__('user/login.userInfo.email')}}</label>
                        <input class="form-control" data-val="true" data-val-regex="{{__('user/login.userInfo.email_regex')}}" data-val-regex-pattern="^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$" data-val-required="{{__('user/login.userInfo.email_require')}}" id="emailInfo" name="email" placeholder="{{__('user/login.userInfo.email')}}" type="text"/>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <span class="field-validation-valid" data-valmsg-for="birthday" data-valmsg-replace="true"></span>
                      <div class="form-group">
                        <label for="disabledSelect">{{__('user/login.userInfo.birthday')}}</label>
                        <input class="form-control" data-val="true" data-val-required="{{__('user/login.userInfo.birthday_require')}}" id="birthdayInfo" name="birthday" placeholder="{{__('user/login.userInfo.birthday')}}" type="text"/>
                      </div>
                    </div>
                  </div>
                  <button type="submit" id="btnUpdateInfo" class="btn btn btn-success"><i class="fa fa-sign-in" ></i>{{__('user/login.userInfo.save')}}</button>
                  <a href={{ route('user.home') }} class="btn btn btn-danger"><i class="fa fa-close"></i>{{__('user/login.userInfo.cancel')}}</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<section class="bottom-banner">
  <a href="ban-muon-dat-tiec-flyfood-cung-cap-mon-an-cuc-nhanh-detail-fe4d181215170131137.html">
    <img src="user/Files/admin/02072016/Banner-flyfood-footer.png" />
  </a>
</section>
@endsection
@section('js')
  <script src="/js/public/userInfo.js"></script>
@endsection

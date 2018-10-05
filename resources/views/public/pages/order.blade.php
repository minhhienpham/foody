@extends('public.layout.master')
@section('breadcrumb')
<div class="breadcrumb distance-none">
  <ul class="list-inline text-uppercase distance-none">
    <li>
      <a href="/"><i class="fa fa-home"></i></a>
      <i class="fa fa-angle-double-right"></i>
    </li>
    <li>
      <a href="javascript:;"><h1 style="font-size:14px;padding:0;margin:0;">{{__('user/cart.left-menu.order-info')}}</h1></a>
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

      <section class="chitiethd">
        <p class="message full left text-center" id="warningMsg"></p>
        <div id="productInfo" class="panel panel-default">
        </div>
      </section>
    </div>

    <div class="modal fade" id="confirmModal" role="dialog">
			<div class="modal-dialog">

				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2 class="modal-title">Confirm</h2>
					</div>
					<div class="modal-body">
						<h4 id="confirmMsg"></h4>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal" id="btnYes">Yes</button>
						<button type="button" class="btn btn-default" data-dismiss="modal" id="btnNo">No</button>
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
  <script src="js/public/order.js"></script>
@endsection

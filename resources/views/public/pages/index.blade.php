@extends('public.layout.master')
@section('menu-banner')
  <div class="banner">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="0"></li>
        <li data-target="#carousel-example-generic" data-slide-to="0"></li>
      </ol>
      <!-- Indicators -->
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <a href="https://kfcvietnam.com.vn/vn/khuyen-mai/70/123-chickenista-hoi-cuong-ga-kfc.html?utm_source=Foody&utm_medium=CPD&utm_campaign=Chickenista">
            <img src="user/Files/Images/kfc.png" alt="KFC.png">
          </a>
        </div>
        <div class="item">
          <a href="https://www.foody.vn/bai-viet/chao-dao-hit-ha-voi-sup-lau-thai-cay-nong-thom-ngon-kho-cuong-17084">
            <img src="user/Files/Images/lau.jpg" alt="lau.jpg">
          </a>
        </div>
        <div class="item">
          <a href="https://abcbakery.co/">
            <img src="user/Files/Images/trungthu.jpg" alt="moon-cake.jpg">
          </a>
        </div>
      </div>
      <!-- Controls -->
      <a class="left carousel-control" href="index.html#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="index.html#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
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
  <section class="product product-home">
    <div class="title border-bottom" style="margin:0;">
      <h1 class="distance-none text-uppercase" style="margin-left: 0; color: #FB0F0F;">
          {{ __('user/index.newest')}}
        <a href="san-pham.html" class="btn btn-danger btn-sm">{{ __('user/index.see_more')}}</a>
      </h1>
    </div>
    <div class="carousel_best_buy owl-carousel owl-theme" style="padding: 20px 0px; background: rgb(220, 220, 220); opacity: 1; display: block;">
      <div class="item">
        <div class="item-img">
          <a class="img-newest-1" href="">
            <img id="img-pro-newest-1" src="" alt="" />
          </a>
          <p style="display:block; position:absolute;top:50%;" class="full left text-center" >
            <span id="buy-now-newest-1" class="item-addCart btn btn-default btn-lg text-uppercase" onclick="">
              <i class="fa fa-shopping-cart"></i>{{ __('user/index.buy_now')}}
            </span>
          </p>
        </div>
        <div class="item-name">
          <a class="img-newest-1" href=""><h2 id="name-pro-newest-1" class="text-center text-uppercase distance-none" title=""></h2></a>
          <div id="store-pro-newest-1" class="store text-center">
              <a href=""><span></span></a>
          </div>
          <div id="price-pro-newest-1" class="price text-center">
            <span></span>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="item-img">
          <a class="img-newest-2" href="">
            <img id="img-pro-newest-2" src="" alt="" />
          </a>
          <p style="display:block; position:absolute;top:50%;" class="full left text-center" >
            <span id="buy-now-newest-2" class="item-addCart btn btn-default btn-lg text-uppercase" onclick="">
              <i class="fa fa-shopping-cart"></i>{{ __('user/index.buy_now')}}
            </span>
          </p>
        </div>
        <div class="item-name">
          <a class="img-newest-2" href=""><h2 id="name-pro-newest-2" class="text-center text-uppercase distance-none" title=""></h2></a>
          <div id="store-pro-newest-2" class="store text-center">
              <a href=""><span></span></a>
          </div>
          <div id="price-pro-newest-2" class="price text-center">
            <span></span>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="item-img">
          <a class="img-newest-3" href="">
            <img id="img-pro-newest-3" src="" alt="" />
          </a>
          <p style="display:block; position:absolute;top:50%;" class="full left text-center" >
            <span id="buy-now-newest-3" class="item-addCart btn btn-default btn-lg text-uppercase" onclick="">
              <i class="fa fa-shopping-cart"></i>{{ __('user/index.buy_now')}}
            </span>
          </p>
        </div>
        <div class="item-name">
          <a class="img-newest-3" href=""><h2 id="name-pro-newest-3" class="text-center text-uppercase distance-none" title=""></h2></a>
          <div id="store-pro-newest-3" class="store text-center">
              <a href=""><span></span></a>
          </div>
          <div id="price-pro-newest-3" class="price text-center">
            <span></span>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="item-img">
          <a class="img-newest-4" href="">
            <img id="img-pro-newest-4" src="" alt="" />
          </a>
          <p style="display:block; position:absolute;top:50%;" class="full left text-center" >
            <span id="buy-now-newest-4" class="item-addCart btn btn-default btn-lg text-uppercase" onclick="">
              <i class="fa fa-shopping-cart"></i>{{ __('user/index.buy_now')}}
            </span>
          </p>
        </div>
        <div class="item-name">
          <a class="img-newest-4" href=""><h2 id="name-pro-newest-4" class="text-center text-uppercase distance-none" title=""></h2></a>
          <div id="store-pro-newest-4" class="store text-center">
              <a href=""><span></span></a>
          </div>
          <div id="price-pro-newest-4" class="price text-center">
            <span></span>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="item-img">
          <a class="img-newest-5" href="">
            <img id="img-pro-newest-5" src="" alt="" />
          </a>
          <p style="display:block; position:absolute;top:50%;" class="full left text-center" >
            <span id="buy-now-newest-5" class="item-addCart btn btn-default btn-lg text-uppercase" onclick="">
              <i class="fa fa-shopping-cart"></i>{{ __('user/index.buy_now')}}
            </span>
          </p>
        </div>
        <div class="item-name">
          <a class="img-newest-5" href="">
            <h2 id="name-pro-newest-5" class="text-center text-uppercase distance-none" title=""></h2>
          </a>
          <div id="store-pro-newest-5" class="store text-center">
              <a href=""><span></span></a>
          </div>
          <div id="price-pro-newest-5" class="price text-center">
            <span></span>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="item-img">
          <a class="img-newest-6" href="">
            <img id="img-pro-newest-6" src="" alt="" />
          </a>
          <p style="display:block; position:absolute;top:50%;" class="full left text-center" >
            <span id="buy-now-newest-6" class="item-addCart btn btn-default btn-lg text-uppercase" onclick="">
              <i class="fa fa-shopping-cart"></i>{{ __('user/index.buy_now')}}
            </span>
          </p>
        </div>
        <div class="item-name">
          <a href=""><h2 id="name-pro-newest-6" class="text-center text-uppercase distance-none img-newest-6" title=""></h2></a>
          <div id="store-pro-newest-6" class="store text-center">
              <a href=""><span></span></a>
          </div>
          <div id="price-pro-newest-6" class="price text-center">
            <span></span>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="item-img">
          <a class="img-newest-7" href="">
            <img id="img-pro-newest-7" src="" alt="" />
          </a>
          <p style="display:block; position:absolute;top:50%;" class="full left text-center" >
            <span id="buy-now-newest-7" class="item-addCart btn btn-default btn-lg text-uppercase" onclick="">
              <i class="fa fa-shopping-cart"></i>{{ __('user/index.buy_now')}}
            </span>
          </p>
        </div>
        <div class="item-name">
          <a class="img-newest-7" href=""><h2 id="name-pro-newest-7" class="text-center text-uppercase distance-none" title=""></h2></a>
          <div id="store-pro-newest-7" class="store text-center">
              <a href=""><span></span></a>
          </div>
          <div id="price-pro-newest-7" class="price text-center">
            <span></span>
          </div> 
        </div>
      </div>
      <div class="item">
        <div class="item-img">
          <a class="img-newest-8" href="">
            <img id="img-pro-newest-8" src="" alt="" />
          </a>
          <p style="display:block; position:absolute;top:50%;" class="full left text-center" >
            <span id="buy-now-newest-8" class="item-addCart btn btn-default btn-lg text-uppercase" onclick="">
              <i class="fa fa-shopping-cart"></i>{{ __('user/index.buy_now')}}
            </span>
          </p>
        </div>
        <div class="item-name">
          <a class="img-newest-8" href=""><h2 id="name-pro-newest-8" class="text-center text-uppercase distance-none" title=""></h2></a>
          <div id="store-pro-newest-8" class="store text-center">
              <a href=""><span></span></a>
          </div>
          <div id="price-pro-newest-8" class="price text-center">
            <span></span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="bottom-banner">
    <a href="ban-muon-dat-tiec-flyfood-cung-cap-mon-an-cuc-nhanh-detail-fe4d181215170131137.html">
      <img src="user/Files/admin/02072016/Banner-flyfood-footer.png" />
    </a>
  </section>
@endsection
@section('js')
<script src="/js/public/index.js"></script>
@endsection

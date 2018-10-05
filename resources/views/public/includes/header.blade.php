<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TQ2T2H9"
  height="0" width="0" style="display:none;visibility:hidden">
    </iframe>
  </noscript>
	<!-- End Google Tag Manager (noscript) -->	
  <div id="fb-root"></div>
	<script>
    (function (d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=1650169558572376";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
	</script>
  <div class="body-mark modal fade in">
    <div class="modal-backdrop fade in">
      <div id="loader-wrapper">
        <div id="loader"></div>
      </div>
    </div>
  </div>
<header>
  <div class="container wrapper distance-none header-top-wrapper">
    <section class="header-top">
      <div class="logo">
      <a href="{{route('user.home')}}">
            <img src="user/Files/Images/logo-flyfood-2017.png" alt="Foody" />
        </a>
      </div>
      <div class="search">
        <form id="productSearch" method="GET">
          <div class="form-group input-group distance-none">
            <input id="txtsearchFull" name="name" autocomplete="off" type="text" class="form-control" placeholder="{{ __('user/index.search')}}">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
      </div>
      <div class="right header-info">
        <ul class="list-inline">
          <li>
            <img src="user/Files/Images/hotro.png">
            <h2>{{ __('user/index.hotline')}}</h2>
            <p>{{ __('user/index.please_call')}}</p>
          </li>
          <li>
            <img src="user/Files/Images/vanchuyen.png">
            <h2>{{ __('user/index.delivery_area')}}</h2>
            <p>{{ __('user/index.free_delivery')}}</p>
          </li>
        </ul>
      </div>
    </section>
  </div>
  <div class="header-line container distance-none full">
    <div class="container wrapper">
      <ul class="menu-right list-inline right distance-none">
        <li class="login" id="userLogin" onclick="LoginPopup();">
          <i class="fa fa-sign-in"></i>{{__('user/login.title')}}
        </li>
        <li class="user-name">
            <a href="{{route('user.info')}}">
          <i class="fa fa-user" id="userName" style="font-size: larger;"></i></a>
        </li>
        <li class="logout" id="userLogout">
          <i class="fa fa-sign-out"></i>{{__('user/login.logout')}}
        </li>
        <li class="signup" id="userSignup" onclick="SignupPopup();">
            <i class="fa fa-edit"></i>{{__('user/login.register')}}
        </li>
        <li class="shopping-cart" id="shopping-cart">
          <i class="fa fa-shopping-cart"></i>
          <span class="shopping-cart-show"> {{__('user/index.cart.title')}} (0)</span>
          <div class="box-cart">
            
          </div>
        </li>
      </ul>
    </div>
  </div>
  <section class="header-bottom container-fluid">
    <div class="container distance-none wrapper">
      <ul class="menu list-inline left distance-none" id="js-menu">
        <li>
          <a href="{{ route('user.home') }}"><i style="font-size:20px;" class="fa fa-home"></i></a>
        </li>
        <li>
          <a href="gioi-thieu.html">Giới thiệu</a>
        </li>
      </ul>
    </div>
  </section>
</header>
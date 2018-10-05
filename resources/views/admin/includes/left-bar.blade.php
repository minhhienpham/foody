<section class="content">
  <div class="container-fluid">
  <!-- #Top Bar -->
  <section>
  <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
      <!-- User Info -->
      <div class="user-info">
        <div class="image">
          <img src="bower_components/adminbsb-materialdesign/images/user.png" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
          <div class="name" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">{{ Auth::user()->username }}</div>
          <div class="email">{{ Auth::user()->email }}</div>
          <div id="logout-button" class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
              <li><a href="javascript:void(0);"><i
                  class="material-icons">person</i>{{ __('auth.profile') }}</a></li>
              <li role="seperator" class="divider"></li>
              <li><a id="link-click-me" href="{{ route('admin.logout')}}"><i class="material-icons">input</i>{{ __('auth.logout') }}</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- #User Info -->
      <!-- Menu -->
      <div class="menu">
        <ul class="list">
          <li class="header">{{ __('left-bar.main') }}</li>
          <li class="active"><a href="{{ route('admin.dashboard')}}"> <i class="material-icons">home</i><span>{{ __('left-bar.home') }}</span></a></li>
          <li>
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">person_pin</i>
              <span>{{ __('left-bar.user') }}</span>
            </a>
            <ul class="ml-menu">
              <li><a href="{{ route('admin.users.create') }}">{{ __('left-bar.create-user') }}</a></li>
              <li><a href="{{ route('admin.users.index') }}">{{ __('left-bar.show-users') }}</a></li>
            </ul>
            
            <a href="javascript:void(0);" class="menu-toggle"><i
              class="material-icons">widgets</i><span>{{ __('left-bar.category') }}</span></a>
            <ul class="ml-menu">
              <li><a href="{{ route('admin.categories.create')}}"> <span>{{ __('left-bar.create-category') }}</span></a></li>
              <li><a href="{{ route('admin.categories.index')}}"><span>{{ __('left-bar.show-categories') }}</span></a></li>
            </ul>

            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">store</i>
              <span>{{ __('left-bar.store') }}</span>
            </a>
            <ul class="ml-menu">
              <li><a href="{{ route('admin.stores.create') }}">{{ __('left-bar.create-store') }}</a></li>
              <li><a href="{{ route('admin.stores.index') }}">{{ __('left-bar.show-store') }}</a></li>
            </ul>

            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">restaurant</i>
              <span>{{ __('left-bar.product') }}</span>
            </a>
            <ul class="ml-menu">
              <li><a href="{{ route('admin.products.create')}}"><span>{{ __('left-bar.create-product') }}</span></a></li>
              <li><a href="{{ route('admin.products.index') }}"><span>{{ __('left-bar.show-products') }}</span></a></li>
              @if (Auth::user()->role_id == 2)
              <li><a href="{{route('admin.shop-manager.showProducts', Auth::user()->id)}}"><span>{{ __('left-bar.show-your-products') }}</span></a></li>
              @endif
            </ul>

            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">assignment</i>
              <span>{{ __('left-bar.order') }}</span>
            </a>
            <ul class="ml-menu">
              <li><a href="{{ route('admin.orders.create')}}">{{ __('left-bar.create-order') }}</a></li>
              <li><a href="{{ route('admin.orders.index')}}">{{ __('left-bar.show-orders') }}</a></li>
            </ul>

          </li>
        </ul>
      </div>
      <!-- #Menu -->
      <!-- Footer -->
      <div class="legal">
        <div class="copyright">
          &copy; {{ __('left-bar.year') }} <a href="javascript:void(0);">{{ __('left-bar.name-project') }}</a>.
        </div>
        <div class="version">
          <b>{{ __('left-bar.version-tag') }} </b> {{ __('left-bar.version') }}
        </div>
      </div>
      <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    </section>
  </div>
</section>

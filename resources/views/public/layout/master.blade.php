<!DOCTYPE html>
<html>
<head>
  @include('public.includes.head')
</head>
<body>
  @include('public.includes.header')
  <div class="container wrapper distance-none header-responsive">
    @yield('menu-banner')
    @yield('breadcrumb')
    @yield('banner-ad')
  </div>
  <div class="container wrapper">
    @yield('content')
  </div>
  @include('public.includes.footer')
</body>
</html>

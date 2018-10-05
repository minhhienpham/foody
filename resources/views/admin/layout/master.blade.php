<html>
<head>
@include('admin.includes.head')
</head>
<body class="theme-green">
  @include('admin.includes.header')
  @include('admin.includes.left-bar')
  <section class="content">
    <div class="container-fluid">
      <div class="block-header">
        <h2>@yield('title')</h2>
      </div>
      @yield('body')
    </div>
  </section>
@include('admin.includes.footer')

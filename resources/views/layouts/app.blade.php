<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
@include('partials.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<header class="main-header">
<a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>L</b>K</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><img src="/images/LIGHTHOUSE-LOGO.PNG" alt=""></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
  </nav>
</header>
<body>
    <div id="app">

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

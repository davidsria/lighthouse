<!DOCTYPE html>
<html>
<head>
  @include('partials.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    @include('partials.header')
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    @include('partials.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('breadcrumb')

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      @yield('notifications')
      <!-- /.row -->
      <!-- Main row -->
      @yield('content')
      @include('partials.modals')
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('partials.footer')

  <!-- Control Sidebar -->
    <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
@include('partials.script')
</body>
</html>

    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>K</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="{{ URL::asset('images/LIGHTHOUSE-LOGO.PNG') }}" alt=""></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        @if(Auth::check())
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Contact the konnect leader on the following:</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <i class="fa fa-envelope-o"></i>
                      </div>
                      <h4>
                        Telephone No
                      </h4>
                      <p>08062993383</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <i class="fa fa-envelope-o"></i>
                      </div>
                      <h4>
                        Email:
                      </h4>
                      <p>kennigee@gmail.com</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ URL::asset('dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ URL::asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                <p>
                  Konnect Area : Ikeja
                  <small>2017 -> Year of Expanded Territory</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Konnect Area</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Konnect center</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Project</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          @endif
        </ul>
      </div>
    </nav>

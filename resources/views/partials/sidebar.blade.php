    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ URL::asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class=" {{ Request::path() == '/dashboard' ? 'active' : '' }} || {{ Request::path() == '/' ? 'active' : '' }}">
          <a href="{{ route('dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview  {{ Request::path() == 'viewAttendance' ? 'active' : '' }} ||  {{ Request::path() == 'addAttendance' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-vcard-o"></i>
            <span>Attendance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::path() == 'viewAttendance' ? 'active' : '' }}"><a href="{{ url('/viewAttendance') }}"><i class="fa fa-circle-o"></i> View All Attendance</a></li>
            <li class="{{ Request::path() == 'addAttendance' ? 'active' : '' }}"><a href="{{ url('/addAttendance') }}"><i class="fa fa-circle-o"></i> Add Attendance</a></li>
          </ul>
        </li>
        <li class="treeview {{ Request::path() == 'viewProject' ? 'active' : '' }} || {{ Request::path() == 'addProject' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-building"></i>
            <span>Projects</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::path() == 'viewProject' ? 'active' : '' }}"><a href="{{ url('/viewProject') }}"><i class="fa fa-circle-o"></i> View All Projects</a></li>
            <li class="{{ Request::path() == 'addProject' ? 'active' : '' }}"><a href="{{ url('/addProject') }}"><i class="fa fa-circle-o"></i> Add Project</a></li>
          </ul>
        </li>
        <li class="treeview {{ Request::path() == 'members/add' ? 'active' : '' }} ||  {{ Request::path() == 'members/view' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-users"></i> <span>Members</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::path() == 'members/view' ? 'active' : '' }}"><a href="{{ url('/members/view') }}"><i class="fa fa-circle-o"></i> View All Members</a></li>
            <li class="{{ Request::path() == 'members/add' ? 'active' : '' }}"><a href="{{ url('/members/add') }}"><i class="fa fa-circle-o"></i> Add Members</a></li>
          </ul>
        </li>
        <li class="treeview {{ Request::path() == 'konnectArea/view' ? 'active' : '' }}  || {{ Request::path() == 'konnectArea/add' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-map-marker" ></i> <span>Konnect Areas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::path() == 'konnectArea/view' ? 'active' : '' }}"><a href="{{ url('/konnectArea/view') }}"><i class="fa fa-circle-o"></i> View All Konnect Areas</a></li>
            <li class="{{ Request::path() == 'konnectArea/add' ? 'active' : '' }}"><a href="{{ url('/konnectArea/add') }}"><i class="fa fa-circle-o"></i> Add Konnect Area</a></li>
          </ul>
        </li>
        <li class="{{ Request::path() == 'viewReport' ? 'active' : '' }}">
          <a href="{{ url('/viewReport') }}">
            <i class="fa fa-book"></i> <span>Reports</span>
          </a>
        </li>
      </ul>
    </section>
  
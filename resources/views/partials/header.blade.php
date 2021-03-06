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
              <img src="{{ URL::asset('dist/img/account-512.png') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ URL::asset('dist/img/account-512.png') }}" class="img-circle" alt="User Image">

                <p>
                  Konnect Center : {{ Auth::user()->name }}
                  <small>2017 -> Year of Expanded Territory</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-8 text-center">
                    <a href="" class="btn btn-default btn-flat">Change Password</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" data-toggle="modal" data-target="#profile" class="btn btn-primary btn-flat" id="userPro" data-id="{{ Auth::user()->id }}">Profile</a>
                </div>
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
    


<script>
  $(document).ready(function(){
    $(document).on('click', '#userPro', function(event){
      var id = $(this).data('id');
      console.log(id);
      $.ajax({
        url: baseUrl+'/geographicalName/'+id,
        type: 'get',
        success: function(response){
          var container = $('<span />');
          $.each(response, function(key, value){
            container.append(value.name+', ');
            console.log(value.name);
          });
          $('#geoName').html(container);
        }
      })
      $.ajax({
        url: baseUrl+'/konnectPastor/'+id,
        type: 'get',
        success: function(response){
          var container = $('<span />');
          $.each(response, function(key, value){
            container.append(value.name+', ');
            console.log(value.name);
          });
          $('#pastorName').html(container);
        }
      })
      $.ajax({
        url: baseUrl+'/konnectleader/'+id,
        type: 'get',
        success: function(response){
          var container = $('<span />');
          $.each(response, function(key, value){
            container.append(value.name+', ');
            console.log(value.name);
          });
          $('#leaderName').html(container);
        }
      })
      $.ajax({
        url: baseUrl+'/members/'+id,
        type: 'get',
        success: function(response){
          $('#noMembers').text(response.length);
          console.log(response.length);
        }
      })
      $.ajax({
        url: baseUrl+'/projects/'+id,
        type: 'get',
        success: function(response){
          $('#noProjects').text(response.length);
          console.log(response.length);
        }
      })
      $.ajax({
        url: baseUrl+'/Attendance/'+id,
        type: 'get',
        success: function(response){
          $('#noReports').text(response.length);
          console.log(response.length);
        }
      })
      $.ajax({
        url: baseUrl+'/konnectCenter/'+id,
        type: 'get',
        success: function(response){
          var container = $('<span />');
          $.each(response, function(key, value){
            container.append(value.name+', ');
            console.log(value.name);
          });
          $('#areas').html(container);
        }
      })
      $.ajax({
        url: baseUrl+'/konnectArea/'+id,
        type: 'get',
        success: function(response){
          var container = $('<span />');
          var container2 = $('<span />');
          container.append(response.created_at);
          container2.append(response.updated_at);
          $('#updated').html(container2);
          $('#created').html(container);
        }
      })
    });
  });
</script>

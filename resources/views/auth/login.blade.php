@section('title', 'Login')
<!DOCTYPE html>
<html>
<head>
  @include('partials.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <header class="main-header">
  <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>K</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="{{ URL::asset('images/LIGHTHOUSE-LOGO.PNG') }}" alt=""></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      
    </nav>
  </header>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin-top:100px;">
                <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3><b>LOGIN</b></h3>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        @foreach($errors->all() as $error)
                            <div class="alert">
                                <ul style="list-style-type:none;">
                                    <li style="color:red; text-align:center; font-size:17px;">{{$error}}</li>
                                </ul>
                            </div>
                        @endforeach

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('partials.script')
</body>
</html>
@extends('layouts.master')
@section('title','Add Konnect Details')
@section('breadcrumb')
    <section class="content-header">
      <h1>
        Add Konnect Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Konnect Areas</li>
        <li class="active">Add Konnect Details</li>
      </ol>
    </section>
@endsection
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Konnect Area</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if(Session::has('areaResponse'))
              <div class="alert alert-success" role="alert">
                {{Session::get('areaResponse')}}
              </div>
            @endif
             <form role="form" method="post" action="{{url('/konnectArea/add')}}">
              <div class="box-body">
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="exampleInputEmail1">Konnect Area Name</label>
                  <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter konnect area name" required/>
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required/>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="addKonnectArea" class="btn btn-primary">Add</button>
              </div>
              {{ csrf_field() }}
            </form>
          </div>
          <!-- /.box -->
        </div>

          <!-- Form Element sizes -->
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Konnect Center</h3>
            </div>
             @if(Session::has('centerResponse'))
              <div class="alert alert-success" role="alert">
                {{Session::get('centerResponse')}}
              </div>
            @endif
             <form role="form" method="post" action="{{url('/konnectCenter/add')}}">
            <div class="box-body">
              <select class="form-control{{ $errors->has('user_id') ? ' has-error' : '' }}" name="user_id" required/>
              <option selected="selected" disabled>Select Konnect Area</option>
              @foreach($konnectAreas as $konnectArea)
                @if($konnectArea->isAdmin == 0)
                  <option value="{{$konnectArea->id}}">{{$konnectArea->name}}</option>
                @endif
              @endforeach
              </select>
              <br>
              {{ csrf_field() }}
              <input class="form-control {{ $errors->has('name') ? ' has-error' : '' }}" type="text" name="name" placeholder="Enter Konnect center" required/>
              <br>
              <button type="submit" name="addKonnectCenter" class="btn btn-primary">Add</button>
            </div>
            </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
      </div>
          
        
        <!--/.col (left) -->
        <!-- right column -->
      <div class="row">
        <div class="col-md-4">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Geographical Name</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            @if(Session::has('geographicalResponse'))
              <div class="alert alert-success" role="alert">
                {{Session::get('geographicalResponse')}}
              </div>
            @endif
              <form class="form" method="post" action="{{url('/geographicalName/add')}}">
              {{ csrf_field() }}

                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label> Geographical Name</label>
                  <input type="text" name="name" class="form-control" id="inputPassword3" placeholder="Geographic name" required/>
                </div>
                
                <div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }}">
                  <label>Konnect Area</label>
                    <select class="form-control" name="user_id" required/>
                        <option selected="selected" disabled>Choose........</option>
                        @foreach($konnectAreas as $konnectArea)
                          @if($konnectArea->isAdmin == 0)
                            <option value="{{$konnectArea->id}}">{{$konnectArea->name}}</option>
                          @endif
                        @endforeach
                    </select>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>

          <!-- general form elements disabled -->
        <div class="col-md-4">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Konnect Pastor</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @if(Session::has('pastorResponse'))
              <div class="alert alert-success" role="alert">
                {{Session::get('pastorResponse')}}
              </div>
            @endif
             <form role="form" method="post" action="{{url('/konnectPastor/add')}}">
              {{ csrf_field() }}
                <!-- text input -->
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label>Pastor Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter Pastor Name" required/>
                </div>
                
                <!-- select -->
                <div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }}">
                  <label>Konnect Area</label>
                  <select class="form-control" name="user_id" required/>
                    <option selected="selected" disabled>Choose........</option>
                    @foreach($konnectAreas as $konnectArea)
                      @if($konnectArea->isAdmin == 0)
                        <option value="{{$konnectArea->id}}">{{$konnectArea->name}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Add</button>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
        <div class="col-md-4">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Konnect Leader</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @if(Session::has('leaderResponse'))
              <div class="alert alert-success" role="alert">
                {{Session::get('leaderResponse')}}
              </div>
            @endif
             <form role="form" method="post" action="{{url('/konnectleader/add')}}">
              {{ csrf_field() }}
                <!-- text input -->
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label>Pastor Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter Konnect Leader Name" required/>
                </div>
                
                <!-- select -->
                <div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }}">
                  <label>Konnect Area</label>
                  <select class="form-control" name="user_id" required/>
                    <option selected="selected" disabled>Choose........</option>
                    @foreach($konnectAreas as $konnectArea)
                      @if($konnectArea->isAdmin == 0)
                        <option value="{{$konnectArea->id}}">{{$konnectArea->name}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Add</button>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

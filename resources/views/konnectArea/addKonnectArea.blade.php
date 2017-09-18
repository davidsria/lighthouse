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
            @if(Session::has('areaSuccess'))
              <div class="alert alert-success" role="alert">
                {{Session::get('areaSuccess')}}
              </div>
            @endif
             <form role="form" method="post" action="{{url('/addKonnectArea')}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Konnect Area Name</label>
                  <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter konnect area name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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

          <!-- Form Element sizes -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Konnect Center</h3>
            </div>
             @if(Session::has('centerSuccess'))
              <div class="alert alert-success" role="alert">
                {{Session::get('centerSuccess')}}
              </div>
            @endif
             <form role="form" method="post" action="{{url('/konnectCenter/add')}}">
            <div class="box-body">
              <select class="form-control" name="user_id">
              <option>Select Konnect Area</option>
              @foreach($konnectAreas as $konnectArea)
                @if($konnectArea->isAdmin == 0)
                  <option value="{{$konnectArea->id}}">{{$konnectArea->name}}</option>
                @endif
              @endforeach
              </select>
              <br>
              {{ csrf_field() }}
              <input class="form-control" type="text" name="name" placeholder="Enter Konnect center">
              <br>
              <button type="submit" name="addKonnectCenter" class="btn btn-primary">Add</button>
            </div>
            </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


          <!-- Form Element sizes -->
          
          <!-- /.box -->

          
          <!-- /.box -->

          <!-- Input addon -->
          
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Geographic Name</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if(Session::has('geographicSuccess'))
              <div class="alert alert-success" role="alert">
                {{Session::get('geographicSuccess')}}
              </div>
            @endif
             <form class="form-horizontal" role="form" method="post" action="{{url('/geographicalName/add')}}">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Konnect Area</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="user_id">
                        <option>Choose........</option>
                        @foreach($konnectAreas as $konnectArea)
                          @if($konnectArea->isAdmin == 0)
                            <option value="{{$konnectArea->id}}">{{$konnectArea->name}}</option>
                          @endif
                        @endforeach
              </select>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="inputPassword3" placeholder="Geographic name">
                  </div>
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

          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Konnect Pastor</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @if(Session::has('pastorSuccess'))
              <div class="alert alert-success" role="alert">
                {{Session::get('pastorSuccess')}}
              </div>
            @endif
             <form role="form" method="post" action="{{url('/konnectPastor/add')}}">
              {{ csrf_field() }}
                <!-- text input -->
                <div class="form-group">
                  <label>Pastor Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter Pastor Name">
                </div>
                
                <!-- select -->
                <div class="form-group">
                  <label>Konnect Area</label>
                  <select class="form-control" name="user_id">
                    <option>Choose........</option>
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
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

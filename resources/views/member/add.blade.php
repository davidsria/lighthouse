@extends('layouts.master')
@section('title','Add member')
@section('breadcrumb')
    <section class="content-header">
      <h1>
        Add Member
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Members</li>
        <li class="active">Add Member</li>
      </ol>
    </section>
@endsection
@section('content')
        <!-- Main content -->
    <section class="content" id="mainContent">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Upload Members List</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
          @if(Session::has('multipleResponse'))
              <div class="alert alert-success" role="alert">
                {{Session::get('multipleResponse')}}
              </div>
            @endif
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-offset-3 col-md-6">
            <form method="post" action="{{url('/members/addMultiple')}}" enctype="multipart/form-data">
              <div class="form-group">
                <label>Select xls file</label>
                <input type="file" class="form-control" name="membersList" id="membersList" required/>
              </div>
              <!-- /.form-group -->
              <div class="form-group" style="text-align:center;">
                <button type="submit" class="btn btn-primary" name="uploadList" id="uploadList">Upload</button>
              </div>
              {{ csrf_field() }}
              </form>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->
     <form method="post" action="{{ url('members/add') }}"> 
      <div class="row">
       @if(Session::has('memberResponse'))
              <div class="alert alert-success" role="alert">
                {{Session::get('memberResponse')}}
              </div>
            @endif
        <div class="col-md-6">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Add a member</h3>
            </div>
            
            <div class="box-body">
              <!-- Member name -->
              <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                <label>Fullname:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" name="name" id="name" class="form-control" data-inputmask="'alias': 'surname firstname othername'" data-mask required/>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Email -->
              <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <label>Email:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <input type="text" name="email" id="email" class="form-control" required/>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- phone mask -->
              <div class="form-group {{ $errors->has('telephone') ? ' has-error' : '' }}">
                <label>Telephone:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text"  name="telephone" id="telephone" class="form-control" required/>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- IP mask -->
              <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                <label>Address:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                  </div>
                  <input type="text" name="address" id="address" class="form-control" required/>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Other details</h3>
            </div>
            <div class="box-body">
              <!-- Date -->
              <div class="row">
              <div class=" col-md-3 form-group {{ $errors->has('sex') ? ' has-error' : '' }}">
                <label>Sex:</label>

                <div class="input-group">
                 <select class="form-control select2" name="sex" id="sex" style="width: 100%;" required/> 
                    <option selected="selected" disabled>Select sex</option>
                    <option value="Male">Male</opption>
                    <option value="Female">Female</option>
                  </select>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date range -->
              <div class=" col-md-3 form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                <label>Status:</label>

                <div class="input-group">
                  <select class="form-control select2" name="status" id="status" style="width: 100%;" required/>
                    <option selected="selected" disabled>Select status</option>
                    <option value="Single">Single</opption>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                  </select>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              </div>

            <div class="row">
              <div class=" col-md-3 form-group {{ $errors->has('birthday') ? ' has-error' : '' }}">
                <label>Birthday:</label>

                <div class="input-group">
                  <input type="date" name="birthday" id="birthday" class="form-control" />
                </div>
                <!-- /.input group -->
              </div>

              

              <div class=" col-md-3 form-group">
                <label>Anniversary Date:</label>

                <div class="input-group">
                  <input type="date" name="anniversary" id="anniversary" class="form-control" />
                </div>
                <!-- /.input group -->
              </div>
            </div>

              <!-- Date and time range -->
              <div class="form-group {{ $errors->has('geographicalName_id') ? ' has-error' : '' }}">
                <label>Geographical Name:</label>

                <div class="input-group" id="addSelect">
                  
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date and time range -->
              <div class="form-group">
                <div class="input-group">
                  <button type="submit" class="btn btn-primary pull-center">
                      Add 
                  </button>
                </div>
              </div>
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- iCheck -->
          
          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->
      {{ csrf_field() }}
      </form>
    </section> 
    <script>
      $(document).ready(function(){
        var id = "{{Auth::user()->id}}";
        console.log(id);
         $.get('/geographicalName/'+id, function(data){
                    console.log(data);
                    console.log("Data length is "+data.length);
                    var container = $("<select class='form-control select2' name='geographicalName_id' id='geographicalName_id' style='width: 100%;' required/>");
                    container.append("<option selected='selected' disabled>Select geographical area</option>");
                   $.each(data, function(key, value){
                        container.append($('<option>', {
                          value: value.id,
                          text: value.name
                        }));
                   });
                   $('#addSelect').html(container);
                });
  
      });
    </script>            
@endsection
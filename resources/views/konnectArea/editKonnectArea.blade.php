@extends('layouts.master')
@section('title','Edit Konnect Details')
@section('breadcrumb')
    <section class="content-header">
      <h1>
        Edit Konnect Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Konnect Areas</li>
        <li class="active">Edit Konnect Details</li>
      </ol>
    </section>
@endsection
@section('content')
<!-- Main content -->
    <section class="content">
      <div id="response" style="display:none;"></div>
      <div class="row">
        <div class="col-md-4">
        <div class="row">
         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Konnect Center</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div>
                    <label for="exampleInputEmail1">Konnect Center Name</label>
                    <input type="text" class="form-control" name="name" id="areaName" value="{{ $konnectArea->name }}" required/>
                </div><br>
                <div>
                    <button type="button" class="btn btn-primary form-control" id="areaUpdate" data-id="{{ $konnectArea->id }}">Save changes</button>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="row" id="area">
         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Konnect Area</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                          @if($konnectCenters->count() == 0)
              No konnect center found
            @else
                @foreach($konnectCenters as $konnectCenter)
                <div>
                    <label for="exampleInputEmail1">Konnect Area Name</label>
                    <input type="text" class="form-control" name="name" id="centerName" value="{{ $konnectCenter->name }}" required/>
                </div><br>
                <div>
                    <button type="button" class="btn btn-primary form-control" id="centerUpdate" data-id="{{ $konnectCenter->id }}">Save changes</button>
                </div>
                @endforeach
            @endif
                
            </div>
            <!-- /.box-body -->
            
          </div>
          <a href="{{ url('/konnectArea/view') }}" class="btn btn-warning ">Back to Konnect Centers</a>
          <!-- /.box -->
        <!-- /.col -->
        
        </div>
        </div>
        <!-- /.col --> 
        <div class="col-md-8">
         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Other Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="response" style="display:none;"></div>
                <ul  class="nav nav-pills">
                    <li class="active"><a href="#geographical" data-toggle="tab">Geographical Name</a></li>
			        <li><a  href="#leaders" data-toggle="tab">Leaders</a></li>
			        <li><a href="#pastors" data-toggle="tab">Pastors</a></li>
		        </ul>
			    <div class="tab-content clearfix"><br>
			    <div class="tab-pane active" id="geographical">
            @if($geographicals->count() == 0)
              <span>No geographical name found</span>
            @else
              <table id="allattendance" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size:10px;">
                <thead>   
                  <tr>
                    <th rowspan="2">S/N</th>
                    <th rowspan="2">Name</th>   
                    <th rowspan="2">Date created</th>   
                    <th rowspan="2">Date last updated</th>   
                    <th rowspan="2">Action</th>
                  </tr>      
                </thead>
                <tbody>
                  @foreach($geographicals as $key => $geographical)
                    <tr>
                      <td>{{ ++$key }}</td>
                      <td>{{ $geographical->name }}</td>
                      <td>{{ $geographical->created_at }}</td>
                      <td>{{ $geographical->updated_at }}</td>
                      <td>
                        <ul style="list-style-type:none;">   
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:black;">
                              <i class="fa fa-list"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="#" data-user ="{{ $konnectArea->id }}" data-id="{{ $geographical->id }}" data-name="{{ $geographical->name }}" data-toggle="modal" data-target="#editGeo" id="geoEdit"><i class="fa fa-edit"> Edit</i></a></li>
                              <li><a href="#" data-id="{{ $geographical->id }}" data-name="{{ $geographical->name }}" data-toggle="modal" data-target="#deleteGeo" id="delGeo"><i class="fa fa-trash"> Remove</i></a></li>
                            </ul>
                          </li>
                        </ul>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>          
            @endif    
          </div>
				  <div class="tab-pane" id="pastors">
            @if($konnectPastors->count() == 0)
              <span>No konnect pastor found</span>
            @else
              <table id="allattendance" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size:10px;">
                <thead>   
                  <tr>
                    <th rowspan="2">S/N</th>
                    <th rowspan="2">Name</th>   
                    <th rowspan="2">Date created</th>   
                    <th rowspan="2">Date last updated</th>   
                    <th rowspan="2">Action</th>
                  </tr>      
                </thead>
                <tbody>
                  @foreach($konnectPastors as $key => $konnectPastor)
                    <tr>
                      <td>{{ ++$key }}</td>
                      <td>{{ $konnectPastor->name }}</td>
                      <td>{{ $konnectPastor->created_at }}</td>
                      <td>{{ $konnectPastor->updated_at }}</td>
                      <td>
                        <ul style="list-style-type:none;">   
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:black;">
                              <i class="fa fa-list"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="#" data-id="{{ $konnectPastor->id }}" data-name="{{ $konnectPastor->name }}" data-toggle="modal" data-target="#editPastor" id="pastorEdit"><i class="fa fa-edit"> Edit</i></a></li>
                              <li><a href="#" data-id="{{ $konnectPastor->id }}" data-name="{{ $konnectPastor->name }}" data-toggle="modal" data-target="#deletePastor" id="delPastor"><i class="fa fa-trash"> Remove</i></a></li>
                            </ul>
                          </li>
                        </ul>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>          
            @endif
          </div>
				<div class="tab-pane" id="leaders">
          @if($konnectLeaders->count() == 0)
              <span>No konnect leader found</span>
            @else
              <table id="allattendance" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size:10px;">
                <thead>   
                  <tr>
                    <th rowspan="2">S/N</th>
                    <th rowspan="2">Name</th>   
                    <th rowspan="2">Date created</th>   
                    <th rowspan="2">Date last updated</th>   
                    <th rowspan="2">Action</th>
                  </tr>      
                </thead>
                <tbody>
                  @foreach($konnectLeaders as $key => $konnectLeader)
                    <tr>
                      <td>{{ ++$key }}</td>
                      <td>{{ $konnectLeader->name }}</td>
                      <td>{{ $konnectLeader->created_at }}</td>
                      <td>{{ $konnectLeader->updated_at }}</td>
                      <td>
                        <ul style="list-style-type:none;">   
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:black;">
                              <i class="fa fa-list"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="#" data-id="{{ $konnectLeader->id }}" data-name="{{ $konnectLeader->name }}" data-toggle="modal" data-target="#editLeader" id="leaderEdit"><i class="fa fa-edit"> Edit</i></a></li>
                              <li><a href="#" data-id="{{ $konnectLeader->id }}" data-name="{{ $konnectLeader->name }}" data-toggle="modal" data-target="#deleteLeader" id="delLeader"><i class="fa fa-trash"> Remove</i></a></li>
                            </ul>
                          </li>
                        </ul>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>          
            @endif      
        </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->  
</section>
<!-- /.content -->

<!-- modal to edit konnect leader -->
<div class="modal fade" id="editLeader">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Edit {{ $konnectArea->name }} Konnect Leader</h4>
      </div>
      <div class="modal-body">
        <div>
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" name="name" id="leaderName2" required/>
          <span id="leaderID2" style="display:none;"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="leaderUpdate">Save changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal to edit konnect leader -->

<!-- modal to edit konnect pastor -->
<div class="modal fade" id="editPastor">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Edit {{ $konnectArea->name }} Konnect Pastor</h4>
      </div>
      <div class="modal-body">
        <div>
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" name="name" id="pastorName2" required/>
          <span id="pastorID2" style="display:none;"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="pastorUpdate">Save changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal to edit konnect pastor -->


<!-- modal to edit geographical name -->
<div class="modal fade" id="editGeo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Edit {{ $konnectArea->name }} Geographical Name</h4>
      </div>
      <div class="modal-body">
        <div>
          <label for="exampleInputEmail1">Geographical Name</label>
          <input type="text" class="form-control" name="name" id="geoName2" required/>
          <span id="geoID2" style="display:none;"></span>
          <span id="user" style="display:none;"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="geoUpdate">Save changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal to edit geographical name -->


<!-- modal to delete konnect pastor -->
<div class="modal fade" id="deletePastor">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Delete {{ $konnectArea->name }} Konnect Pastor</h4>
      </div>
      <div class="modal-body">
        <span>Do you want to delete <strong id="pastorName"></strong> as a konnect pastor in {{ $konnectArea->name }}?</span>
        <span id="pastorID" style="display:none;"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="pastorDel">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal to delete konnect pastor -->

<!-- modal to delete konnect leader -->
<div class="modal fade" id="deleteLeader">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Delete {{ $konnectArea->name }} Konnect Leader</h4>
      </div>
      <div class="modal-body">
        <span>Do you want to delete <strong id="leaderName"></strong> as a konnect leader in {{ $konnectArea->name }}?</span>
        <span id="leaderID" style="display:none;"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="leaderDel">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal to delete konnect leader -->

<!-- modal to edit geographical name -->
<div class="modal fade" id="deleteGeo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Delete {{ $konnectArea->name }} Geographical Name</h4>
      </div>
      <div class="modal-body">
        <span>Do you want to delete <strong id="geoName"></strong> as a geographical name in {{ $konnectArea->name }}?</span>
        <span id="geoID" style="display:none;"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="geoDel">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal to edit geographical name -->
{{ csrf_field() }}

<script>
$(document).ready(function(){
  $(document).on('click', '#delGeo', function(event){
      var name = $(this).data('name');
      var id = $(this).data('id');
      $('#geoName').text(name);
      $('#geoID').text(id);
  });
  $(document).on('click', '#delLeader', function(event){
      var name = $(this).data('name');
      var id = $(this).data('id');
      $('#leaderName').text(name);
      $('#leaderID').text(id);    
  });
  $(document).on('click', '#delPastor', function(event){
      var name = $(this).data('name');
      var id = $(this).data('id');
      $('#pastorName').text(name);
      $('#pastorID').text(id);        
  });
  $('#geoDel').click(function(event){
      var id = $('#geoID').text();
      $('#geoDel').attr('data-dismiss', 'modal');
      $.ajax({
        url: baseUrl+'/geographicalName/delete/'+id,
        type: 'post',
        data: {_method: 'delete', _token: "{{ csrf_token() }}"},
        success: function(response){
          $('#response').text(response.success);
          $('#response').addClass('alert alert-success');
          $('#response').css('display', 'block');
          $('#geoDel').removeAttr('data-id');
        $('#geographical').load(location.href + ' #geographical');
        }
      })
  });
  $('#leaderDel').click(function(event){
      var id = $('#leaderID').text();
      $('#leaderDel').attr('data-dismiss', 'modal');
      $.ajax({
        url: baseUrl+'/konnectleader/delete/'+id,
        type: 'post',
        data: {_method: 'delete', _token: "{{ csrf_token() }}"},
        success: function(response){
          $('#response').text(response.success);
          $('#response').addClass('alert alert-success');
          $('#response').css('display', 'block');
        $('#leaders').load(location.href + ' #leaders');
        }
      })
  });
  $('#pastorDel').click(function(event){
      var id = $('#pastorID').text();
      $('#pastorDel').attr('data-dismiss', 'modal');
      $.ajax({
        url: baseUrl+'/konnectPastor/delete/'+id,
        type: 'post',
        data: {_method: 'delete', _token: "{{ csrf_token() }}"},
        success: function(response){
          $('#response').text(response.success);
          $('#response').addClass('alert alert-success');
          $('#response').css('display', 'block');
        $('#pastors').load(location.href + ' #pastors');
        }
      })
  });

  $(document).on('click', '#geoEdit', function(event){
      var name = $(this).data('name');
      var id = $(this).data('id');
      $('#geoName2').val(name);
      $('#geoID2').text(id);
      $('#user').text(user);       
  });
  $(document).on('click', '#leaderEdit', function(event){
      var name = $(this).data('name');
      var id = $(this).data('id');
      $('#leaderName2').val(name);
      $('#leaderID2').text(id);        
  });
  $(document).on('click', '#pastorEdit', function(event){
      var name = $(this).data('name');
      var id = $(this).data('id');
      $('#pastorName2').val(name);
      $('#pastorID2').text(id);
    });
  $('#geoUpdate').click(function(event){
      var id = $('#geoID2').text();
      var name = $('#geoName2').val();
      $('#geoUpdate').attr('data-dismiss', 'modal');
      $.ajax({
        url: baseUrl+'/geographicalName/edit/'+id,
        type: 'post',
        data: {_token: "{{ csrf_token() }}", 'name': name,},
        success: function(response){
          $('#response').text(response.success);
          $('#response').addClass('alert alert-success');
          $('#response').css('display', 'block');
        $('#geographical').load(location.href + ' #geographical');
        }
      })
  });

  $('#leaderUpdate').click(function(event){
      var id = $('#leaderID2').text();
      var name = $('#leaderName2').val();
      $('#leaderUpdate').attr('data-dismiss', 'modal');
      $.ajax({
        url: baseUrl+'/konnectleader/edit/'+id,
        type: 'post',
        data: {_token: "{{ csrf_token() }}", 'name': name,},
        success: function(response){
          $('#response').text(response.success);
          $('#response').addClass('alert alert-success');
          $('#response').css('display', 'block');
        $('#leaders').load(location.href + ' #leaders');
        }
      })
  });

  $('#pastorUpdate').click(function(event){
      var id = $('#pastorID2').text();
      var name = $('#pastorName2').val();
      $('#pastorUpdate').attr('data-dismiss', 'modal');
      $.ajax({
        url: baseUrl+'/konnectPastor/edit/'+id,
        type: 'post',
        data: {_token: "{{ csrf_token() }}", 'name': name,},
        success: function(response){
          $('#response').text(response.success);
          $('#response').addClass('alert alert-success');
          $('#response').css('display', 'block');
        $('#pastors').load(location.href + ' #pastors');
        }
      })
  });

  $('#areaUpdate').click(function(event){
      var id = $(this).data('id');
      var name = $('#areaName').val();
      $.ajax({
        url: baseUrl+'/konnectArea/update/'+id,
        type: 'post',
        data: {_token: "{{ csrf_token() }}", 'name': name,},
        success: function(response){
          $('#response').text(response.success);
          $('#response').addClass('alert alert-success');
          $('#response').css('display', 'block');
        }
      })
  });

  $('#centerUpdate').click(function(event){
      var id = $(this).data('id');
      var name = $('#centerName').val();
      $.ajax({
        url: baseUrl+'/konnectCenter/update/'+id,
        type: 'post',
        data: {_token: "{{ csrf_token() }}", 'name': name,},
        success: function(response){
          $('#response').text(response.success);
          $('#response').addClass('alert alert-success');
          $('#response').css('display', 'block');
        }
      })
  });

});
</script>
@endsection

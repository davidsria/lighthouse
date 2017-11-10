@extends('layouts.master')
@section('title','view Konnect Details')
@section('breadcrumb')
    <section class="content-header">
      <h1>
        View Konnect Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Konnect Areas</li>
        <li class="active">View Konnect Details</li>
      </ol>
    </section>
@endsection
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-7">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Konnect Centers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div id="response" style="display:none;"></div>
              <table class="table table-bordered datatable" id="allKonnectAreas">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($konnectAreas as $konnectArea)
                  <tr>
                    <td>{{$konnectArea->name}}</td>
                    <td>
                 <ul style="list-style-type:none;">   
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:black;">
                    <i class="fa fa-list"></i></a>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#" data-id="{{$konnectArea->id}}" data-name="{{$konnectArea->name}}" data-toggle="modal" data-target="#viewCenter" id="centerView"><i class="fa fa-eye"> View</i></a></li>
                    <li><a href="{{ route('editKonnectArea', ['id' => $konnectArea->id]) }}"><i class="fa fa-edit"> Edit</i></a></li>
                    <li><a href="#" data-id="{{$konnectArea->id}}" data-name="{{$konnectArea->name}}" data-toggle="modal" data-target="#deleteCenter" id="delCenter"><i class="fa fa-trash"> Remove</i></a></li>
                  </ul>
                </li>
                </ul>
              
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  
    </section>
    <!-- /.content -->


<!-- modal to delete center -->
<div class="modal fade" id="deleteCenter">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Delete Confirmation</h4>
      </div>
      <div class="modal-body">
        <span style="display:none;" id="deleteID"></span>
        <p>Are you sure you want to delete <strong><span id="centerName"></span></strong> Konnect Center ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="delete">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal to delete center -->

<!-- modal to view center -->
<div class="modal fade" id="viewCenter">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="centerTitle"></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-3">
            <h4 class="modal-title">Geographical Name<span class="badge" id="geographicalNo"></span></h4>
          </div>
          <div class="col-lg-3">
            <h4 class="modal-title">Leaders<span class="badge" id="leaderNo"></span></h4>
          </div>
          <div class="col-lg-3">
            <h4 class="modal-title">Pastors<span class="badge" id="pastorNo"></span></h4>
          </div>
          <div class="col-lg-3">
            <h4 class="modal-title">Members<span class="badge" id="memberNo"></span></h4>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3">
            <span id="geographicalName"></span>
          </div>
          <div class="col-lg-3">
            <span id="konnectLeader"></span>
          </div>
          <div class="col-lg-3">
            <span id="konnectPastor"></span>
          </div>
          <div class="col-lg-3">
            <span id="members"></span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal to view center -->



{{ csrf_field() }}

<script>
  $(document).ready(function(){
    
    $(document).on('click', '#delCenter', function(event){
      var name = $(this).data('name');
      var id = $(this).data('id');
      $('#centerName').text(name);
      $('#delete').attr('data-id', id);
      $('#deleteID').text(id);        
    });
    $(document).on('click', '#centerView', function(event){
      var name = $(this).data('name');
      var id = $(this).data('id');
      $('#centerTitle').text(name+' Details');
      $.ajax({
        url: baseUrl+'/geographicalName/'+id,
        type: 'get',
        success: function(response){
          var container = $('<span />');
          $('#geographicalNo').text(response.length);
          $.each(response, function(key, value){
            container.append(value.name+'<br>');
          });
          $('#geographicalName').html(container);
        }
      })
      $.ajax({
        url: baseUrl+'/konnectPastor/'+id,
        type: 'get',
        success: function(response){
          var container = $('<span />');
          $('#pastorNo').text(response.length);
          $.each(response, function(key, value){
            container.append(value.name+'<br>');
          });
          $('#konnectPastor').html(container);
        }
      })
      $.ajax({
        url: baseUrl+'/konnectleader/'+id,
        type: 'get',
        success: function(response){
          var container = $('<span />');
          $('#leaderNo').text(response.length);
          $.each(response, function(key, value){
            container.append(value.name+'<br>');
          });
          $('#konnectLeader').html(container);
        }
      })
      $.ajax({
        url: baseUrl+'/members/'+id,
        type: 'get',
        success: function(response){
          var container = $('<span />');
          $('#memberNo').text(response.length);
          $.each(response, function(key, value){
            container.append(value.name+'<br>');
          });
          $('#members').html(container);
        }
      })           
    });

    $('#delete').click(function(event){
      var id = $('#deleteID').text();
      $('#delete').attr('data-dismiss', 'modal');
      $.ajax({
        url: baseUrl+'/konnectArea/delete/'+id,
        type: 'post',
        data: {_method: 'delete', _token: "{{ csrf_token() }}"},
        success: function(response){
          $('#response').text(response.success);
          $('#response').addClass('alert alert-success');
          $('#response').css('display', 'block');
          $('#delete').removeAttr('data-id');
        $('#allKonnectAreas').load(location.href + ' #allKonnectAreas');
        }
      })
    });

  });
</script>
@endsection

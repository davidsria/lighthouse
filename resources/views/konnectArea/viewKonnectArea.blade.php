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
        <div class="col-md-offset-3 col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Konnect Areas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div id="response" style="display:none;"></div>
              <table class="table table-bordered" id="allKonnectAreas">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>           
                </tr>
                @foreach($konnectAreas as $konnectArea)
                    @if($konnectArea->isAdmin == 0)
                        <tr>
                            <td>{{$konnectArea->id}}</td>
                            <td>{{$konnectArea->name}}</td>
                            <td style="width: 1px"><button class="btn btn-primary btn-xs" data-id="{{$konnectArea->id}}" data-createdAt="{{$konnectArea->created_at}}" data-updatedAt="{{$konnectArea->updated_at}}" data-name="{{$konnectArea->name}}" data-toggle="modal" data-target="#myModal" id="viewArea">View</button></td>
                            <!--<td style="width: 1px"><button class="btn btn-warning btn-xs" data-id="{{$konnectArea->id}}" data-name="{{$konnectArea->name}}" data-toggle="modal" data-target="#myModal" id="editArea">Edit</button></td>-->
                            <td style="width: 1px"><button class="btn btn-danger btn-xs" data-id="{{$konnectArea->id}}" data-name="{{$konnectArea->name}}" data-toggle="modal" data-target="#myModal" id="deleteArea">Delete</button></td>
                        </tr>
                    @endif
                @endforeach
              </table>
              <div style="text-align:center;">
                {{ $konnectAreas->links() }} 
            </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <!--<ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>-->
            </div>
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

    <!-- Modal  -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" >
    <div class="modal-content" style="background-color:snow;" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="title"></h4>
      </div>
      <div class="modal-body">
      <div id="deleteMessage" style="display:none;"></div>
      <span id="deleteId" style="display:none;"></span>
      <div class="container" id="viewDisplay" style="display:none">
        <h3><strong id="areaName"></strong></h3>
        <h5><strong>Strong Ikeja Konnect Center</strong></h5>
        Created At: <span id="createdDate"></span><br>
        Last Updated: <span id="lastUpdated"></span>
        <div class="row">
          <div class="col-md-3">
            <label>Geographical Name</label><span class="badge" id="geographicalNo"></span>
              <div id='geographicalName'></div>
            <label>Konnect Pastors</label><span class="badge" id="pastorNo"></span>
              <div id='konnectPastor'></div>
          </div>
          <div class="col-md-4">
            <label>Members</label><span class="badge" id="memberNo"></span>
            <div id="members"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="delete" style="display:none;"><i class="fa fa-check"></i> Ok</button>
        <button type="button" class="btn btn-success" id="saveChanges" style="display:none;"><i class="fa fa-save"></i> Save changes</button>
        <button type="button" class="btn btn-primary" id="addButton" style="display:none;"><i class="fa fa-plus"></i> Add Item</button>
        <button type="button" class="btn btn-default" id="closeButton"><i class="fa fa-times"></i> Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{ csrf_field() }}

<script>
  $(document).ready(function(){
        $(document).on('click', '#viewArea', function(event){
                var name = $(this).data('name');
                var id = $(this).data('id');
                var createdAt = $(this).data('createdat');
                var updatedAt = $(this).data('updatedat');
                $('#createdDate').text(createdAt);
                $('#lastUpdated').text(updatedAt);
                $('#areaName').text(name+' Konnect Area');
                $('#deleteMessage').html("");
                $('#deleteMessage').css('display','none');
                $('#viewDisplay').css('display','block');
                $('#title').text('Konnect Area View');
                $('#delete').hide(400);
                $('#saveChanges').hide(400);
                $.get('/geographicalName/'+id, function(data){
                    console.log(data);
                    console.log("Data length is "+data.length);
                    var container = $('<ul />');
                    $('#geographicalNo').text(data.length);
                   $.each(data, function(key, value){
                        container.append('<li>'+value.name+'</li>');
                   });
                   $('#geographicalName').html(container);
                });
                $.get('/konnectPastor/'+id, function(data){
                    console.log(data);
                    console.log("Data length is "+data.length);
                    var container = $('<ul />');
                    $('#pastorNo').text(data.length);
                   $.each(data, function(key, value){
                        container.append('<li>'+value.name+'</li>');
                   });
                   $('#konnectPastor').html(container);
                });
                $.get('/members/'+id, function(data){
                    console.log(data);
                    console.log("Data length is "+data.length);
                    var container = $('<ul />');
                    $('#memberNo').text(data.length);
                   $.each(data, function(key, value){
                        container.append('<li>'+value.name+'</li>');
                   });
                   $('#members').html(container);
                });
        });

        $(document).on('click', '#deleteArea', function(event){
                var name = $(this).data('name');
                var id = $(this).data('id');
                $('#deleteId').text(id);
                $('#delete').attr('data-id', id);
                $('#title').text('Delete Confirmation');
                $('#deleteMessage').html('Do you want to delete&nbsp;<strong>'+name+'&nbsp;</strong> konnect area?');
                $('#deleteMessage').css('display', 'block');
                $('#viewDisplay').css('display', 'none');
                $('#delete').show(400);
                $('#saveChanges').hide(400);
        });
        
        $('#closeButton').click(function(event){
              $('#closeButton').attr('data-dismiss', 'modal');
              $('#allKonnectAreas').load(location.href + ' #allKonnectAreas'); 
        });

         $('#delete').click(function(event){
                var id = $('#deleteId').text();
                  $('#delete').attr('data-dismiss', 'modal');
                  $.post('/konnectArea/delete/'+id, {'_token':$('input[name=_token]').val()}, function(data){
                    $('#response').text('Konnect area deleted successfully');
                    $('#response').addClass('alert alert-success');
                    $('#response').css('display', 'block');
                    $('#allKonnectAreas').load(location.href + ' #allKonnectAreas'); 
                  });
            });

            
     });
</script>

@endsection

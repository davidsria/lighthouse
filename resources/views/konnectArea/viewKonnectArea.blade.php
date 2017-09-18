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
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Konnect Areas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Konnect Center</th>
                  <th style="width: 10px">Members</th>            
                </tr>
                @foreach($konnectAreas as $konnectArea)
                    @if($konnectArea->isAdmin == 0)
                        <tr>
                            <td>{{$konnectArea->id}}</td>
                            <td>{{$konnectArea->name}}</td>
                            <td>Konnect center</td>
                            <td>40</td>
                            <td style="width: 10px"><button class="btn btn-primary btn-xs" data-id="{{$konnectArea->id}}" data-name="{{$konnectArea->name}}" data-toggle="modal" data-target="#myModal" id="viewArea">View</button></td>
                            <td style="width: 10px"><button class="btn btn-warning btn-xs" data-id="{{$konnectArea->id}}" data-name="{{$konnectArea->name}}" data-target="#myModal" id="editArea">Edit</button></td>
                            <td style="width: 10px"><button class="btn btn-danger btn-xs" data-id="{{$konnectArea->id}}" data-name="{{$konnectArea->name}}" data-target="#myModal" id="deleteArea">Delete</button></td>
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

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Konnect Pastors</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
              <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Konnect Area</th>            
                </tr>
                 @foreach($konnectPastors as $konnectPastor)
                        <tr>
                            <td>{{$konnectPastor->id}}</td>
                            <td>{{$konnectPastor->name}}</td>
                            <td>{{$konnectPastor->user_id}}</td>
                            <td style="width: 10px"><button class="btn btn-primary btn-xs">View</button></td>
                            <td style="width: 10px"><button class="btn btn-warning btn-xs">Edit</button></td>
                            <td style="width: 10px"><button class="btn btn-danger btn-xs">Delete</button></td>
                        </tr>
                @endforeach
              </table>
              <div style="text-align:center;">
                {{ $konnectPastors->links() }} 
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Geographical Name</h3>

              <div class="box-tools">
               <!--<ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>-->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Konnect Area</th>
                </tr>
                @foreach($geographicalNames as $geographicalName)
                        <tr>
                            <td>{{$geographicalName->id}}</td>
                            <td>{{$geographicalName->name}}</td>
                            <td>{{$geographicalName->user_id}}</td>
                            <td style="width: 10px"><button class="btn btn-primary btn-xs">View</button></td>
                            <td style="width: 10px"><button class="btn btn-warning btn-xs">Edit</button></td>
                            <td style="width: 10px"><button class="btn btn-danger btn-xs">Delete</button></td>
                        </tr>
                @endforeach
              </table>
              <div style="text-align:center;">
                {{ $geographicalNames->links() }} 
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

    <!-- Modal  -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" >
    <div class="modal-content" style="background-color:snow;" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="title"></h4>
      </div>
      <div class="modal-body">
      <div class="error"></div>
        <label style="display:none;">Name:</label>
        <input type="text" placeholder="Enter a new item" id="addItem" class="form-control"style="display:none;"><br>
        <span id="deleteMessage" style="display:none"></span>
        <span id="addId" style="display:none;"></span>
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
                $('.error').html("");
                $('#addItem').val(name);
                $('#addId').text(id);
                $('#title').text(name);
                $('#delete').show(400);
                $('#saveChanges').show(400);
        });
     });
</script>

@endsection

@extends('layouts.master')
@section('title','View All Attendance')
@section('breadcrumb')
    <section class="content-header">
      <h1>
        View All Projects
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View All Projects</li>
      </ol>
    </section>
@endsection
@section('content')
     <!-- Main content -->
                                    <section class="invoice">
                                    <!-- title row -->
                                    <div class="row">
                                        <div class="col-xs-12">
                                        <h2 class="page-header">
                                            <i class="fa fa-globe"></i> {{ Auth::user()->name}}&nbsp;Konnect Area
                                          
                                        </h2>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    
                                    <!-- /.row -->

                                    <!-- Table row -->
                                    <div class="row">
                                        <div id="response" style="display:none;"></div>
                                            @if($projects->isEmpty())
                                                No Project uploaded yet
                                            @else
                                        <div class="col-xs-12 table-responsive" id="membersList">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th class="text-center">Project</th>
                                                    <th class="text-center">Description</th>
                                                    <th class="text-center">Funds</th>
                                                    <th class="text-center">Execution Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($projects as $project)
                                                    <tr>
                                                        <td>{{ $project->id }}</td>
                                                        <td>{{ $project->name }}</td>
                                                        <td>{{ $project->description }}</td>
                                                        <td>{{ $project->fund }}</td>
                                                        <td>{{ $project->execution_date }}</td>
                                                        <td class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">action
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li data-id="{{$project->id}}" data-name="{{$project->name}}" data-toggle="modal" data-target="#myModal" id="editProject"><a href="#">edit</a></li>
                                                                <li data-id="{{$project->id}}" data-name="{{$project->name}}" data-toggle="modal" data-target="#myModal" id="deleteProject"><a href="#">remove</a></li>
                 
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                        @endif
                                    </section>
                                    <!-- /.content -->
                                <div class="clearfix"></div>
                                <!-- /.content-wrapper -->

         <!-- Modal  -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" >
    <div class="modal-content" style="background-color:snow;" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="title"></h4>
      </div>
      <div class="error"></div>
      <div class="modal-body">
      <div id="deleteMessage" style="display:none;"></div>
      <span id="deleteId" style="display:none;"></span>
      <div class="container" id="editDisplay" style="display:none; width:100%;">
      <span id="updateId" style="display:none;"></span>
        <div class="form-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter project name">
        </div>
        <div class="form-group">
            <textarea placeholder="Enter project description" id="description" name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="fund" id="fund" placeholder="Enter project fund">
        </div>
        <div class="form-group">
            <input type="date" class="form-control" name="execution_date" id="execution_date" placeholder="Enter project execution date">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="delete" style="display:none;"><i class="fa fa-check"></i> Ok</button>
        <button type="button" class="btn btn-success" id="saveChanges" style="display:none;"><i class="fa fa-save"></i> Save changes</button>
        <button type="button" class="btn btn-default" id="closeButton"><i class="fa fa-times"></i> Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{ csrf_field() }}


<script>
  $(document).ready(function(){
        $(document).on('click', '#deleteProject', function(event){
                var name = $(this).data('name');
                var id = $(this).data('id');
                $('#delete').attr('data-id', id);
                 $('#deleteId').text(id);
                $('#title').text('Delete Confirmation');
                $('#deleteMessage').html('Do you want to delete&nbsp;<strong>'+name+'&nbsp;</strong> from your project list?');
                $('#deleteMessage').css('display', 'block');
                $('#editDisplay').css('display', 'none');
                $('#delete').show(400);
                $('#saveChanges').hide(400);
        });
        
        $('#closeButton').click(function(event){
              $('#closeButton').attr('data-dismiss', 'modal');
              $('#projectsList').load(location.href + ' #projectsList'); 
        });

        $('#delete').click(function(event){
                var id = $('#deleteId').text();
                  $('#delete').attr('data-dismiss', 'modal');
                  $.post('/project/delete/'+id, {'_token':$('input[name=_token]').val()}, function(data){
                    $('#response').text('Member deleted successfully');
                    $('#response').addClass('alert alert-success');
                    $('#response').css('display', 'block');
                    $('#projectsList').load(location.href + ' #projectsList'); 
                  });
        });

        $(document).on('click', '#editProject', function(event){
                var name = $(this).data('name');
                var id = $(this).data('id');
                $('#updateId').text(id);
                $('#saveChanges').attr('data-id', id);
                $('#title').text('Update Project');
                $('#deleteMessage').css('display', 'none');
                $('#editDisplay').css('display', 'block');
                $('#delete').hide(400);
                $('#saveChanges').show(400);
                $.get('/project/'+id, function(data){
                    console.log(data);
                   $.each(data, function(key, value){
                    $('#name').val(value.name);
                    $('#description').val(value.description);
                    $('#fund').val(value.fund);
                    $('#execution_date').val(value.execution_date); 
                   });
                 
                });
        });


        $('#saveChanges').click(function(event){
                var name = $('#name').val();
                var description = $('#description').val();
                var fund = $('#fund').val();
                var execution_date = $('#execution_date').val();
                var id = $('#updateId').text();
                if(name == "" || description == "" || fund == "" || execution_date == ""){
                  $('.error').html("<span style='color:red;'>All fields are required</span>");
                }else{
                  $('#saveChanges').attr('data-dismiss', 'modal');
                  $.post('/project/update/'+id, {'name': name, 'description':description, 'fund':fund, 'execution_date':execution_date, '_token':$('input[name=_token]').val()}, function(data){
                    $('#response').addClass('alert alert-success');
                    $('#response').html('<span>Successfully updated</span>');
                    $('#response').css('display', 'block');
                    console.log(data);
                    $('#projectsList').load(location.href + ' #projectsList'); 
                  });
               }
            });



   
     });
</script>
@endsection
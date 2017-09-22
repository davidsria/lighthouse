@extends('layouts.master')
@section('title','View members')
@section('breadcrumb')
    <section class="content-header">
      <h1>
        View Members
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Members</li>
        <li class="active">View Members</li>
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
            <small class="pull-right">Date: {{ $date }}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
      <div id="response" style="display:none;"></div>
      @if($members->isEmpty())
        No members uploaded yet
      @else
        <div class="col-xs-12 table-responsive" id="membersList">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Sex</th>
              <th>Telephone</th>
              <th>Address</th>
              <th>Status</th>
              <th>Geographical Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($members as $member)
            <tr>
                <td>{{ $member->name }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->sex }}</td>
                <td>{{ $member->telephone }}</td>
                <td>{{ $member->address }}</td>
                <td>{{ $member->status }}</td>
                <td>{{ $member->geographicalName_id }}</td>
                <td class="dropdown" style="width:1px;">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">action
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li data-id="{{$member->id}}" data-name="{{$member->name}}" data-toggle="modal" data-target="#myModal" id="editMember"><a class="btn btn-primary" href="#">edit</a></li>
                    <li data-id="{{$member->id}}" data-name="{{$member->name}}" data-toggle="modal" data-target="#myModal" id="deleteMember"><a class="btn btn-danger" href="#">remove</a></li>
                  </ul>
                </td>       
            <tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="{{ route('printMembers') }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <!--<button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate Excel
          </button>-->
        </div>
      </div>
      @endif
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
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
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Enter telephone">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="address" id="address" placeholder="Enter addresss">
        </div>
        <div class="form-group">
            <select class="form-control select2" name="sex" id="sex" style="width: 100%;">
                    <option value="Male">Male</opption>
                    <option value="Female">Female</option>
                  </select>
        </div>
        <div class="form-group">
             <select class="form-control select2" name="status" id="status" style="width: 100%;">
                    <option selected="selected">Select status</option>
                    <option value="Single">Single</opption>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                  </select>


            </select>
        </div>
        <div class="form-group">
            <select class="form-control" name="geographicalName_id" id="geographicalname">
                @foreach($geographicalNames as $geographicalName)
                    <option value="{{ $geographicalName->id }}">{{ $geographicalName->name }}</option>
                @endforeach
            </select>
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
        $(document).on('click', '#deleteMember', function(event){
                var name = $(this).data('name');
                var id = $(this).data('id');
                $('#delete').attr('data-id', id);
                 $('#deleteId').text(id);
                $('#title').text('Delete Confirmation');
                $('#deleteMessage').html('Do you want to delete&nbsp;<strong>'+name+'&nbsp;</strong> as a member?');
                $('#deleteMessage').css('display', 'block');
                $('#editDisplay').css('display', 'none');
                $('#delete').show(400);
                $('#saveChanges').hide(400);
        });
        
        $('#closeButton').click(function(event){
              $('#closeButton').attr('data-dismiss', 'modal');
              $('#membersList').load(location.href + ' #membersList'); 
        });

         $('#delete').click(function(event){
                var id = $('#deleteId').text();
                  $('#delete').attr('data-dismiss', 'modal');
                  $.post('/member/delete/'+id, {'_token':$('input[name=_token]').val()}, function(data){
                    $('#response').text('Member deleted successfully');
                    $('#response').addClass('alert alert-success');
                    $('#response').css('display', 'block');
                    $('#membersList').load(location.href + ' #membersList'); 
                  });
            });

            $(document).on('click', '#editMember', function(event){
                var name = $(this).data('name');
                var id = $(this).data('id');
                $('#updateId').text(id);
                $('#saveChanges').attr('data-id', id);
                $('#title').text('Update Member');
                $('#deleteMessage').css('display', 'none');
                $('#editDisplay').css('display', 'block');
                $('#delete').hide(400);
                $('#saveChanges').show(400);
                $.get('/member/'+id, function(data){
                    console.log(data);
                   $('#memberNo').text(data.length);
                   $.each(data, function(key, value){
                    $('#name').val(value.name);
                    $('#email').val(value.email);
                    $('#address').val(value.address);
                    $('#telephone').val(value.telephone); 
                    var getsex = value.sex;
                    var getstatus = value.status;
                    var getgeographicalname = value.geographicalName_id
                    $('#sex option:contains('+getsex+')').prop('selected',true);
                    $('#status option:contains('+getstatus+')').prop('selected',true);  
                    $('#geographicalname option:contains('+getgeographicalname+')').prop('selected',true);
                   });
                 
                });
        });

        $('#saveChanges').click(function(event){
                var name = $('#name').val();
                var email = $('#email').val();
                var address = $('#address').val();
                var telephone = $('#telephone').val();
                var sex = $('#sex').val();
                var status = $('#status').val();
                var geographicalName_id =$('#geographicalname').val();
                var id = $('#updateId').text();
                if(name == "" || email == "" || address == "" || telephone == "" || geographicalName_id == "" || status == "" || sex == ""){
                  $('.error').html("<span style='color:red;'>All fields are required</span>");
                }else{
                  $('#saveChanges').attr('data-dismiss', 'modal');
                  $.post('/member/update/'+id, {'name': name, 'email':email, 'telephone':telephone, 'address':address, 'sex':sex, 'status':status, 'geographicalName_id':geographicalName_id, '_token':$('input[name=_token]').val()}, function(data){
                    $('#response').addClass('alert alert-success');
                    $('#response').html('<span>Successfully updated</span>');
                    $('#response').css('display', 'block');
                    console.log(data);
                    $('#membersList').load(location.href + ' #membersList'); 
                  });
               }
            });

            
     });
</script>

@endsection
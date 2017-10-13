@extends('layouts.master')
@section('title','Add First Timer')
@section('breadcrumb')
    <section class="content-header">
      <h1>
        Add First Timer
      </h1>
      <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>First Timer</li>
      <li class="active">Add First Timer</li>
      </ol>
    </section>
@endsection
@section('content')
                  <div class="page-content">
                    <div id="tab-general">
                        <div class="col-md-7">
                        <div class="box box-warning">
                            <div class="box-header with-border">
                            <h3 class="box-title">First Timer Form</h3>
                            <small class="pull-right">Date: {{ $date }}</small><br><br>
                            <p><b>Note <samll style="color:red">*</samll> is required</b> </p>
                            
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                            <form role="form" action="{{url('firsttimer/add')}}" method="post">
                            {{ csrf_field() }}
                                @if(Session::has('firsttimerResponse'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('firsttimerResponse')}}
                                    </div>
                                @endif
                                <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
                                <label>Date <samll style="color:red">*</samll></label>
                                <input type="date" class="form-control" name="date"  >
                                </div>

                                <div class=" form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>Name <samll style="color:red">*</samll></label>
                                <input type="text" class="form-control" name="name" placeholder="Enter ..." >
                                </div>

                                <div class=" form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                <label>Address <samll style="color:red">*</samll></label>
                                <input type="text" class="form-control" name="address" placeholder="Enter ...">
                                </div>


                                <div class="appended form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>Email <samll style="color:red">*</samll></label>
                                <input type="email" class="form-control" name="email" placeholder="Enter ..." >
                                </div>

                                <div class="  form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label>Phone Number</label>
                                <input type="text" name="phone_no" class="form-control" placeholder="Enter ...">
                                </div>

                                <div class=" form-group ">
                                <label>Sex</label>
                                <div class="radio">
                                    <label> 
                                    <input type="radio" name="sex" id="sex1" value="female" checked>Female
                                    </label>
                                    &nbsp;
                                    <label> 
                                    <input type="radio" name="sex" id="sex2" value="male">Male
                                    </label>
                                </div>
                                </div>
                            <div class="form-group">
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary pull-center">
                                    Add 
                                </button>
                                </div>
                            </div>

                            </form>
                            </div>
                            <!-- /.box-body -->
                        </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                          
@endsection
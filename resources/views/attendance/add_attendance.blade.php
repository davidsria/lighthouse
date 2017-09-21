@extends('layouts.master')
@section('title','Add Attendance')
@section('breadcrumb')
    <section class="content-header">
      <h1>
        Add Attendance
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Attendance</li>
      </ol>
    </section>
@endsection
@section('content')
                  <div class="page-content">
                    <div id="tab-general">
                        <div class="col-md-7">
                        <div class="box box-warning">
                            <div class="box-header with-border">
                            <h3 class="box-title">Attendance Form</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                            <form role="form" action="{{url('addAttendance')}}" method="post">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Did Meeting Hold</label>
                                <div class="radio">
                                    <label> 
                                    <input type="radio" name="meeting_hold" id="optionsRadios1" value="yes" checked>
                                    Yes
                                    </label>
                                    &nbsp;
                                    <label> 
                                    <input type="radio" name="meeting_hold" id="optionsRadios2" value="no">
                                    No
                                    </label>
                                </div>
                                </div>
                                <!-- text input -->
                                <div class="form-group {{ $errors->has('location') ? ' has-error' : '' }}">
                                <label>Location</label>
                                <input type="text" class="form-control" name="location" placeholder="Enter ...">
                                </div>

                                <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
                                <label>Date</label>
                                <input type="date" class="form-control" name="date" placeholder="Enter ..." >
                                </div>

                                <div class="form-group {{ $errors->has('start_time') ? ' has-error' : '' }}">
                                <label>Start Time</label>
                                <input type="text" class="form-control" name="start_time" placeholder="Enter ..." >
                                </div>

                                <div class="form-group {{ $errors->has('duration') ? ' has-error' : '' }}">
                                <label>Duration</label>
                                <input type="text" class="form-control" name="duration" placeholder="Enter ..." >
                                </div>

                                <div class="form-group">
                                <label>Highlights</label>
                                <textarea class="form-control" rows="3" name="highlights" placeholder="Enter ..."></textarea>
                                </div>

                                <div class="form-group">
                                <label>No of Guest</label>
                                <input type="number" min='0' class="form-control" name="guest" placeholder="Enter ..." >
                                </div>

                                <div class="form-group">
                                <label>Guest Details</label>
                                <textarea class="form-control" rows="3" name="guest_details" placeholder="Enter ..."></textarea>
                                </div>

                                <div class="form-group {{ $errors->has('men') ? ' has-error' : '' }}">
                                <label>No of Men</label>
                                <input type="number" min='0' class="form-control" name="men" placeholder="Enter ..." >
                                </div>

                                <div class="form-group {{ $errors->has('women') ? ' has-error' : '' }} ">
                                <label>No of Women </label>
                                <input type="number" min='0' class="form-control" name="women" placeholder="Enter ..." >
                                </div>

                                <div class="form-group {{ $errors->has('children') ? ' has-error' : '' }}">
                                <label>No of Children</label>
                                <input type="number" min='0' class="form-control" name="children" placeholder="Enter ..." >
                                </div>

                                <div class="box-footer">
                                <button type="submit" class="btn btn-warning">Reset</button>
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
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
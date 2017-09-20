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
                            <form role="form" action="/addAttendance" method="post">
                                <div class="form-group">
                                    <label>Did Meeting Hold</label>
                                <div class="radio">
                                    <label> 
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                    Yes
                                    </label>
                                    &nbsp;
                                    <label> 
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                    No
                                    </label>
                                </div>
                                </div>
                                <!-- text input -->
                                <div class="form-group">
                                <label>Location</label>
                                <input type="text" class="form-control" placeholder="Enter ...">
                                </div>

                                <div class="form-group">
                                <label>Konnect Pastor</label>
                                <input type="text" class="form-control" placeholder="Enter ..." >
                                </div>

                                <div class="form-group">
                                <label>Date</label>
                                <input type="date" class="form-control" placeholder="Enter ..." >
                                </div>

                                <div class="form-group">
                                <label>Start Time</label>
                                <input type="text" class="form-control" placeholder="Enter ..." >
                                </div>

                                <div class="form-group">
                                <label>Duration</label>
                                <input type="text" class="form-control" placeholder="Enter ..." >
                                </div>

                                <div class="form-group">
                                <label>Highlights</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>

                                <div class="form-group">
                                <label>Guest Details</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>

                                <div class="form-group">
                                <label>No of Men</label>
                                <input type="number" class="form-control" placeholder="Enter ..." >
                                </div>

                                <div class="form-group">
                                <label>No of Women </label>
                                <input type="number" class="form-control" placeholder="Enter ..." >
                                </div>

                                <div class="form-group">
                                <label>No of Children</label>
                                <input type="number" class="form-control" placeholder="Enter ..." >
                                </div>

                                <div class="box-footer">
                                <button type="submit" class="btn btn-warning">Reset</button>
                                <button type="submit" class="btn btn-primary pull-right">Sign in</button>
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
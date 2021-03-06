@extends('layouts.master')
@section('title','Add Attendance')
@section('breadcrumb')
    <section class="content-header">
      <h1>
        Add Attendance
      </h1>
      <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Attendance</li>
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
                            <small class="pull-right">Date: {{ $date }}</small><br>
                            <p><b>Note <samll style="color:red">*</samll> is required</b> </p>
                            
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                            <form role="form" action="{{url('addAttendance')}}" method="post">
                            {{ csrf_field() }}
                                @if(Session::has('attendanceResponse'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('attendanceResponse')}}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label>Did Meeting Hold <samll style="color:red">*</samll></label>
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
                                <div class="appended form-group {{ $errors->has('location') ? ' has-error' : '' }}">
                                <label>Location</label>
                                <input type="text" class="form-control" name="location" placeholder="Enter ...">
                                </div>

                                <div class="container-fluid form-group {{ $errors->has('day') ? ' has-error' : '' }}">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Day</label>
                                            <input type="number" class="form-control" name="day" max="31" min="1">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Month/Year</label>
                                            <select class="form-control" name="report_id">
                                                @if($reports->count()>0)
                                                @foreach($reports as $report)
                                                <option value="{{$report->id}}">{{$report->month}},&nbsp;{{$report->year}}</option>
                                                @endforeach
                                                @else
                                                    <option>No attendance month activated</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class=" appended form-group {{ $errors->has('start_time') ? ' has-error' : '' }}">
                                <label>Start Time</label>
                                <input type="time" class="form-control" name="start_time" placeholder="Enter ..." >
                                </div>

                                <div class=" appended form-group {{ $errors->has('end_time') ? ' has-error' : '' }}">
                                <label>End Time</label>
                                <input type="time" class="form-control" name="end_time" placeholder="Enter ..." >
                                </div>

                                <div class=" appended form-group">
                                <label>Highlights</label>
                                <textarea class="form-control" rows="3" name="highlights" placeholder="Enter ..."></textarea>
                                </div>

                                <div class="appended form-group {{ $errors->has('men') ? ' has-error' : '' }}">
                                <label>No of Men <samll style="color:red">*</samll></label>
                                <input type="number" min='0' class="form-control" name="men" placeholder="Enter ..." >
                                </div>

                                <div class="appended form-group {{ $errors->has('women') ? ' has-error' : '' }} ">
                                <label>No of Women <samll style="color:red">*</samll></label>
                                <input type="number" min='0' class="form-control" name="women" placeholder="Enter ..." >
                                </div>

                                <div class="appended form-group {{ $errors->has('children') ? ' has-error' : '' }}">
                                <label>No of Children <samll style="color:red">*</samll></label>
                                <input type="number" min='0' class="form-control" name="children" placeholder="Enter ..." >
                                </div>

                                <div class="appended form-group">
                                <label>No of Guest</label>
                                <input type="number" min='0' class="form-control" name="guest" placeholder="Enter ..." >
                                </div>

                                <div class="appended form-group">
                                <label>Guest Details</label>
                                <textarea class="form-control" rows="3" name="guest_details" placeholder="Enter ..."></textarea>
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
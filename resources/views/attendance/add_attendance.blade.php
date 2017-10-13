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
                            <small class="pull-right">Date: {{ $date }}</small>
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
                                    <label>Did Meeting Hold</label>
                                <div class="radio">
                                    <label> 
                                    <input type="radio" name="meeting_hold" id="optionsRadios1" value="1" checked>
                                    Yes
                                    </label>
                                    &nbsp;
                                    <label> 
                                    <input type="radio" name="meeting_hold" id="optionsRadios2" value="0">
                                    No
                                    </label>
                                </div>
                                </div>
                                <!-- text input -->
                                <div class="form-group {{ $errors->has('location') ? ' has-error' : '' }}">
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
                                                @foreach($reports as $report)
                                                <option value="{{$report->id}}">{{$report->month}},&nbsp;{{$report->year}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('start_time') ? ' has-error' : '' }}">
                                <label>Start Time</label>
                                <input type="time" class="form-control" name="start_time" placeholder="Enter ..." >
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
@extends('layouts.master')
@section('title','View Attendance')
@section('breadcrumb')
    <section class="content-header">
      <h1>
        View Attendance
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Attendance</li>
        <li class="active">View Attendance</li>
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
      @if($attendances->isEmpty())
        No Attendance uploaded yet
      @else
        <div class="col-xs-12 table-responsive" id="membersList">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Date</th>
              <th>Meeting Hold</th>
              <th>Location</th>
              <th>Start Time</th>
              <th>Duration</th>
              <th>Hightlights</th>
              <th>Guests</th>
              <th>Guest Details</th>
              <th>Men</th>
              <th>Women</th>
              <th>Children</th>
            </tr>
            </thead>
            <tbody>
            @foreach($attendances as $attendance)
            <tr>
                <td>{{ $attendance->date }}</td>
                <td>{{ $attendance->meeting_hold }}</td>
                <td>{{ $attendance->location }}</td>
                <td>{{ $attendance->start_time }}</td>
                <td>{{ $attendance->duration }}</td>
                <td>{{ $attendance->highlights }}</td>
                <td>{{ $attendance->guest }}</td>
                <td>{{ $attendance->guest_details }}</td>
                <td>{{ $attendance->men }}</td>
                <td>{{ $attendance->women }}</td>
                <td>{{ $attendance->children }}</td>   
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
          <a href="{{ route('printAttendance') }}" target="_blank" class="btn btn-default">
          <i class="fa fa-print"></i> Print</a>
          </button>
        </div>
      </div>

      @endif
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  <!-- /.content-wrapper -->


@endsection
@extends('layouts.master')
@section('title','Report')
@section('breadcrumb')
    <section class="content-header">
      <h1>
        Report
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Report</li>
      </ol>
    </section>
@endsection
@section('content')
   <table id="allattendance" class="table table-striped table-bordered" cellspacing="0" width="1000px" style="font-size:9px;">
    <thead>   
      <tr>
        <th rowspan="2">S/N</th>
        <th rowspan="2">KONNECT AREA</th>   
        <th rowspan="2">KONNECT LEADER</th>   
        <th rowspan="2">GEOGRAPHICAL AREA</th>   
        <th rowspan="2">KONNECT CENTER (CALL NAME)</th>
        <th rowspan="2">KONNECT PASTOR</th>
        <th rowspan="2">LOCATION</th>
        <th rowspan="2">DID MEETING HOLD?</th>
        <th colspan="4" style="text-align:center;">ATTENDANCE</th>
        <th rowspan="2">START TIME</th>
        <th rowspan="2">END TIME</th> 
        <th rowspan="2">DURATION</th>
        <th rowspan="2">HIGHLIGHTS</th>
        <th rowspan="2">NO OF GUEST</th>
        <th rowspan="2">GUEST DETAILS</th>
      </tr>
      <tr>
        <th>MEN</th>
        <th>WOMEN</th>
        <th>CHILDREN</th>
        <th>TOTAL</th>
      </tr>
    </thead>
    <tbody>
      @foreach($attendances as $attendance)
        <tr>
          <td>{{$attendance->id}}</td>
          <td>{{$attendance->user_id}}</td>   
          <td>KONNECT LEADER</td>   
          <td>
            @for ($i = 0; $i < count($attendance->geographical_name); $i++)
              {!! $attendance->geographical_name[$i] !!}
              @if($i<count($attendance->geographical_name)-1)
                <hr>
              @else
                @break;
              @endif
            @endfor
          </td>   
          <td>{{$attendance->konnect_center}}</td>
          <td>
            @for ($i = 0; $i < count($attendance->konnect_pastor); $i++)
              {!! $attendance->konnect_pastor[$i] !!}
              @if($i<count($attendance->konnect_pastor)-1)
                <hr>
              @else
                @break;
              @endif
            @endfor
          </td>
          <td>{{$attendance->location}}</td>
          <td>{{$attendance->meeting_hold}}</td>
          <td>{{$attendance->men}}</td>
          <td>{{$attendance->women}}</td>
          <td>{{$attendance->children}}</td>
          <td>{{$attendance->total}}</td>
          <td>{{$attendance->start_time}}</td>
          <td>{{$attendance->end_time}}</td> 
          <td>{{$attendance->duration}}</td>
          <td>{{$attendance->highlights}}</td>
          <td>{{$attendance->guest}}</td>
          <td>{{$attendance->guest_details}}</td>
        </tr>
    @endforeach
    </tbody>
  </table>           
@endsection
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

              <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading single-project-nav" style="text-transform: uppercase;font-weight: 500;background-color:grey;">
                  <ul class="nav nav-tabs"> 
                   <li class="active">
                      <a href="#report_info" data-toggle="tab">Report</a>
                   </li>
                   <li>
                       <a href="#members_info" data-toggle="tab">Member</a>
                   </li>
                   <li>
                      <a href="#guest_view" data-toggle="tab">Guest View</a>
                   </li>
                   <li>
                      <a href="#project_info" data-toggle="tab">Project</a>
                   </li>
                   
                  </ul>
                </div>
                <div class="panel-body">
                  <div class="tab-content">
                    <div class="tab-pane fade in active" id="report_info">
                      <div class="row">
                        <div class="row">
                            @if(Session::has('monthResponse'))
                          <div class="alert alert-success" role="alert">
                            {{Session::get('monthResponse')}}
                          </div>
                          @endif
                        </div>
                        <a href="" data-toggle="modal" data-target="#activate_month" style="margin:5px;">Enable monthly attendance submission</a>  
                        <br/><br/>
                        <div class="container">
                          <div class="row">
                          <form method="post" action="{{ route('filterReport') }}">
                            {{ csrf_field() }}
                            <div class="col-md-9">
                              <div class="row">
                                  <div class="col-md-3">
                                    <select class="form-control" name="report_date">
                                    <option value="all">All months</option>
                                    @foreach($reports as $report)
                                      <option value="{{$report->id}}"  @if (old('report_date') == $report->id) selected="selected" @endif>{{$report->month}},&nbsp;{{$report->year}}</option>
                                    @endforeach
                                    </select>
                                  </div>
                                  <div class="col-md-2">
                                    <select class="form-control" name="area">
                                      <option selected value="all">All Konnect Centers</option>
                                      @foreach($konnectAreas as $konnectArea)
                                        <option value="{{$konnectArea->id}}">{{$konnectArea->name}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-md-2">
                                    <input type="submit" value="Submit" class="form-control btn btn-primary">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <a href="{{ route('excelreport') }}" class="btn btn-primary">Generate Excel</a>
                            </div>
                          </form>
                          </div>
                        </div>
                        <br/><br/>
                        <div class="container-fluid" style="margin:auto;">
                          <table id="allattendance" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size:10px;">
                              <thead>   
                                <tr>
                                  <th rowspan="2">S/N</th>
                                  <th rowspan="2">KONNECT CENTER (CALL NAME)</th>   
                                  <th rowspan="2">KONNECT LEADER</th>   
                                  <th rowspan="2">GEOGRAPHICAL AREA</th>   
                                  <th rowspan="2">KONNECT AREA</th>
                                  <th rowspan="2">KONNECT PASTOR</th>
                                  <th rowspan="2">LOCATION</th>
                                  <th rowspan="2">DID MEETING HOLD?</th>
                                  <th colspan="4" style="text-align:center;">ATTENDANCE</th>
                                  <th rowspan="2">START TIME</th>
                                  <th rowspan="2">END TIME</th>
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
                                @foreach($attendances as $key => $attendance)
                                  <tr>
                                    <td>{{ ++$key }} </td>
                                    <td>{{$attendance->user_id}}</td>   
                                    <td>
                                      @for ($i = 0; $i < count($attendance->konnect_leader); $i++)
                                        {!! $attendance->konnect_leader[$i] !!}
                                        @if($i<count($attendance->konnect_leader)-1)
                                          <hr>
                                        @else
                                          @break;
                                        @endif
                                      @endfor
                                    </td>   
                                    <td>
                                      @for ($i = 0; $i < count($attendance->geographical_name); $i++)
                                        {!! $attendance->geographical_name[$i] !!}
                                        @if($i<count($attendance->geographical_name)-1)
                                          , &nbsp;
                                        @elseif($i<count($attendance->geographical_name)-3)
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
                                    <td>{{date("g:i a", strtotime($attendance->start_time))}}</td>
                                    <td>{{date("g:i a", strtotime($attendance->end_time))}}</td>
                                    <td>{{$attendance->highlights}}</td>
                                    <td>{{$attendance->guest}}</td>
                                    <td>{{$attendance->guest_details}}</td>
                                  </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>           
                      </div>
                    </div>
                      
                    <div class="tab-pane fade" id="members_info">
                      <!--<div class="container">
                        <div class="row">
                        <form method="post" action="{{ route('filterReport') }}">
                              {{ csrf_field() }}
                          <div class="col-md-9">
                            <div class="row">
                              <div class="col-md-2">
                                <select class="form-control" name="member_area">
                                  <option selected value="all">All Konnect Centers</option>
                                  @foreach($konnectAreas as $konnectArea)
                                    <option value="{{$konnectArea->id}}">{{$konnectArea->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-md-2">
                                <input type="submit" value="Submit" class="form-control btn btn-primary">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <a href="#" class="btn btn-primary">Generate Excel</a>
                          </div>
                        </form>
                        </div>
                      </div>-->
                      <br/><br/>
                      <div class="container-fluid" style="margin:auto;">
                        <table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                          <thead>   
                            <tr>
                              <th>SN</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Sex</th>
                              <th>Telephone</th>
                              <th>Address</th>
                              <th>Status</th>
                              <th>Birthday</th>
                              <th>Anniversary Date</th>
                              <th>Konnect Center</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($members as $key => $member)
                              <tr>
                                  <td>{{++ $key}}</td>
                                  <td>{{ $member->name }}</td>
                                  <td>{{ $member->email }}</td>
                                  <td>{{ $member->sex }}</td>
                                  <td>{{ $member->telephone }}</td>
                                  <td>{{ $member->address }}</td>
                                  <td>{{ $member->status }}</td>
                                  <td>{{ $member->birthday }}</td>
                                  <td>{{ $member->anniversary }}</td>
                                  <td>{{ $member->user_id }}</td>
                              </tr>
                          @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="guest_view">
                      <!--<div class="container">
                        <div class="row">
                        <form method="post" action="{{ route('filterReport') }}">
                              {{ csrf_field() }}
                          <div class="col-md-9">
                            <div class="row">
                              <div class="col-md-2">
                                <select class="form-control" name="member_area">
                                  <option selected value="all">All Konnect Centers</option>
                                  @foreach($konnectAreas as $konnectArea)
                                    <option value="{{$konnectArea->id}}">{{$konnectArea->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-md-2">
                                <input type="submit" value="Submit" class="form-control btn btn-primary">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <a href="#" class="btn btn-primary">Generate Excel</a>
                          </div>
                        </form>
                        </div>
                      </div>-->
                              <br/><br/>
                      <div class="container-fluid" style="margin:auto;">
                        <table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                          <thead>   
                            <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Sex</th>
                              <th>Telephone</th>
                              <th>Address</th>
                              <th>Konnect Center</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($firstTimers as $firsttimer)
                            <tr>
                                <td>{{ $firsttimer->name }}</td>
                                <td>{{ $firsttimer->email }}</td>
                                <td>{{ $firsttimer->sex }}</td>
                                <td>{{ $firsttimer->phone_no }}</td>
                                <td>{{ $firsttimer->address }}</td>
                                <td>{{ $firsttimer->user_id }}</td>     
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="project_info">
                      <!--<div class="container">
                        <div class="row">
                        <form method="post" action="{{ route('filterReport') }}">
                              {{ csrf_field() }}
                          <div class="col-md-9">
                            <div class="row">
                              <div class="col-md-2">
                                <select class="form-control" name="member_area">
                                  <option selected value="all">All Konnect Centers</option>
                                  @foreach($konnectAreas as $konnectArea)
                                    <option value="{{$konnectArea->id}}">{{$konnectArea->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-md-2">
                                <input type="submit" value="Submit" class="form-control btn btn-primary">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <a href="#" class="btn btn-primary">Generate Excel</a>
                          </div>
                        </form>
                        </div>
                      </div>-->
                                <br/><br/>
                      <div class="container-fluid" style="margin:auto;">
                        <table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                          <thead>   
                            <tr>
                              <th class="text-center">S/N</th>
                              <th class="text-center">Project</th>
                              <th class="text-center">Description</th>
                              <th class="text-center">Funds</th>
                              <th class="text-center">Execution Date</th>
                              <th class="text-center">Konnect Center</th>
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
                              <td>{{ $project->user_id }}</td>   
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
    

<!-- modal for attendance monthly activation-->
<div class="modal fade" id="activate_month">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{ route('monthlyactivation') }}">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" id="dismiss" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Attendance monthly activation</h4>
            </div>
            <div class="modal-body">
            <!-- open a form -->
            <form method="post" action="{{ route('monthlyactivation') }}">
            {{ csrf_field() }}
            <div class="box box-primary">
                <div class="box-body">
                <!-- name : text : Required -->
                <div class="row">
                    <div class="col-xs-6 form-group">
                        <label for="month">Month:</label><span class="text-red">*</span>
                        <select name="month" class="form-control">
                          @foreach($months as $month)
                          <option value="{{$month}}">{{$month}}</option>
                          @endforeach    
                        </select>
                    </div>
                    <!-- phone : Text : -->
                    <div class="col-xs-6 form-group">
                        <label for="year">Year:</label><span class="text-red">*</span>
                        <input type="text" name="year" class="form-control">    
                    </div>    
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="dismis4">Close</button>
            <button type="submit" class="btn btn-primary pull-right" id="submt2">Activate</button>
        </div>
        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
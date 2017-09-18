@extends('layouts.master')
@section('title','View All Attendance')
@section('breadcrumb')
    <section class="content-header">
      <h1>
        View All Attendance
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View All Attendance</li>
      </ol>
    </section>
@endsection
@section('content')
   <div class="page-content">
                    <div id="tab-general">
                        <div class="row mbl">
                            <div class="col-lg-12">
                                <div class="panel panel-blue">
                                    <div class="panel-heading">Reports &nbsp <span><a href="/addAttend" class="button btn-default" style="background-color:orange;">Add Report <i class="fa fa-plus" aria-hidden="true">
                                        <div class="icon-bg bg-blue"></div>
                                        </i> </a></span>
                                    </div>
                                        <div class="panel-body">
                                            <table class="table table-hover table-bordered table-responsive">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Did Meetings Hold</th>
                                                    <th class="text-center">Location</th>
                                                    <th class="text-center">Konnect Pastor</th>
                                                    <th class="text-center">Men</th>
                                                    <th class="text-center">Women</th>
                                                    <th class="text-center">Children</th>
                                                    <th class="text-center">Highlights</th>
                                                    <th class="text-center">No of Guest</th>
                                                    <th class="text-center">Guest Details</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>09/13/2017</td>
                                                    <td>Yes</td>
                                                    <td>Church</td>
                                                    <td>Giwa Kehinde</td>
                                                    <td>13</td>
                                                    <td>9</td>
                                                    <td>5</td>
                                                    <td>Kingdom Steward</td>
                                                    <td>Null</td>
                                                    <td>Null</td>
                                                </tr>

                                                <tr>
                                                    <td>2</td>
                                                    <td>active</td>
                                                    <td>success</td>
                                                    <td>warning</td>
                                                    <td>danger</td>
                                                    <td>active</td>
                                                    <td>success</td>
                                                    <td>warning</td>
                                                    <td>danger</td>
                                                    <td>active</td>
                                                    <td>success</td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>    
                            </div> 
                        </div>
                    </div>
                </div>            
@endsection
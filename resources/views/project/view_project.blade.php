@extends('layouts.master')
@section('title','View All Attendance')
@section('breadcrumb')
    <section class="content-header">
      <h1>
        View All Projects
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View All Projects</li>
      </ol>
    </section>
@endsection
@section('content')
    <div class="page-content">
                    <div id="tab-general">
                        <div class="row mbl">
                            <div class="col-lg-12">
                                <div class="panel panel-blue">
                                    <div class="panel-heading">Reports &nbsp <span><a href="/addProject" class="button btn-default" style="background-color:#f60;">Add New Project <i class="fa fa-plus" aria-hidden="true">
                                        <div class="icon-bg bg-blue"></div>
                                        </i> </a></span>
                                    </div>
                                        <div class="panel-body">
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th class="text-center">Project</th>
                                                    <th class="text-center">Description</th>
                                                    <th class="text-center">Funds</th>
                                                    <th class="text-center">Executuion Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>09/13/2017</td>
                                                    <td>Yes</td>
                                                    <td>Church</td>
                                                    <td>Giwa Kehinde</td>
                                                </tr>

                                                <tr>
                                                    <td>2</td>
                                                    <td>active</td>
                                                    <td>success</td>
                                                    <td>warning</td>
                                                    <td>danger</td>
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
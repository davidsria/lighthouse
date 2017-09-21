@extends('layouts.master')
@section('title','View All Attendance')
@section('breadcrumb')
    <section class="content-header">
      <h1>
        New Projects
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">New Project</li>
      </ol>
    </section>
@endsection
@section('content')
                <div class="page-content">
                    <div id="tab-general">
                        <div class="row mbl">
                            <div class="col-lg-12">
                                <div class="panel panel-blue">
                                    <div class="panel-heading"> <h2>Add New Project </h2></div>
                                        <div class="panel-body form-horizontal">
                                        @if(Session::has('projectResponse'))
                                            <div class="alert alert-success" role="alert">
                                                {{Session::get('projectResponse')}}
                                            </div>
                                        @endif
            
                                            <form action="/addProject" method="POST">
                                            {{ csrf_field() }}
                                            <div class="row">

                                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="concept" class="col-sm-4 control-label"><b>Project Name</b></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="name" name="name">
                                                        </div>
                                                </div>

                                                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                                    <label for="concept" class="col-sm-4 control-label">Description</label>
                                                        <div class="col-sm-8">
                                                            <textarea name="description" id="description" cols="100%" rows="10"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group {{ $errors->has('fund') ? ' has-error' : '' }}">
                                                    <label for="concept" class="col-sm-4 control-label">Fund</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="fund" name="fund">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group {{ $errors->has('execution_date') ? ' has-error' : '' }}">
                                                    <label for="concept" class="col-sm-4 control-label">Execution Date</label>
                                                        <div class="col-sm-8">
                                                            <input type="date" class="form-control" id="execution_date" name="execution_date">
                                                        </div>  
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-5 col-md-offset-7"> 
                                                    <!--<button class="btn btn-default pull-right" style="background-color:#f60;">
                                                    <span class="glyphicon glyphicon-repeat">Reset</span>
                                                    </button>-->
                                                    <button class="btn btn-primary pull-right save">
                                                    <span class="glyphicon glyphicon-floppy-disk ">Save</span>
                                                    </button>
                                                </div>  
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
@endsection
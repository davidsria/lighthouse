@extends('layouts.master')
@section('title','Add Project')
@section('breadcrumb')
    <section class="content-header">
      <h1>
        Add Project
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Projects</li>
        <li class="active">Add Project</li>
      </ol>
    </section>
@endsection
@section('content')
        <!-- Main content -->
    <section class="content" id="mainContent">
        <div class="page-content">
            <div id="tab-general">
                <div class="col-md-7">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Project Form</h3>
                            <small class="pull-right">Date: {{ $date }}</small>
                        </div>
                            <!-- /.box-header -->
                        <div class="box-body">
                            <form method="post" action="{{ url('/addProject') }}">
                            {{ csrf_field() }}
                            
                            <div class="row">
                            @if(Session::has('projectResponse'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('projectResponse')}}
                                    </div>
                                    @endif
                                    
                                <div class="col-md-6">
                                    <div class="box-body">
                                    <!-- Member name -->
                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label>Project Title:</label>

                                        <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <input type="text" name="name" id="name" class="form-control" data-inputmask="'alias': 'name'" data-mask required/>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- Email -->
                                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label>Description:</label>

                                        <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <textarea rows="3" name="description" id="description" class="form-control" required/></textarea>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- phone mask -->
                                    <div class="form-group {{ $errors->has('fund') ? ' has-error' : '' }}">
                                        <label>Fund :</label>

                                        <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <input type="text"  name="fund" id="fund" class="form-control" required/>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->

                                    <!-- IP mask -->
                                    <div class="form-group {{ $errors->has('execution_date') ? ' has-error' : '' }}">
                                        <label>Execution Date :</label>

                                        <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" name="execution_date" id="execution_date" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <button type="submit" class="btn btn-primary pull-center">
                                                Add 
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.form group -->

                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->

                                <!-- iCheck -->
                                
                                <!-- /.box -->
                                </div>
                                <!-- /.col (right) -->
                            </div>
                            </form>
                        </div>
                            <!-- /.box-body -->
                    </div>
                </div>
                <div class="clearfix"></div>
                </div>
            </div>
    </section>            
@endsection
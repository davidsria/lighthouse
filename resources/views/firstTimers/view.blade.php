@extends('layouts.master')
@section('title','Guest View')
@section('breadcrumb')
    <section class="content-header">
      <h1>
        View Guest
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Guest View</li>
        <li class="active">View Guest</li>
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
            <i class="fa fa-globe"></i> {{ Auth::user()->name}}&nbsp;Konnect Center
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
      @if($firstTimers->isEmpty())
        No First Timer uploaded yet
      @else
        <div class="col-xs-12 table-responsive">
          <table  class="table table-striped datatable">
            <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Sex</th>
              <th>Telephone</th>
              <th>Address</th>
            </thead>
            <tbody>
            @foreach($firstTimers as $firsttimer)
            <tr>
                <td>{{ $firsttimer->name }}</td>
                <td>{{ $firsttimer->email }}</td>
                <td>{{ $firsttimer->sex }}</td>
                <td>{{ $firsttimer->phone_no }}</td>
                <td>{{ $firsttimer->address }}</td>     
            </tr>
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
          <a href="{{ url('/firsttimer/print') }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <!--<button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate Excel
          </button>-->
        </div>
      </div>
      @endif
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->


@endsection
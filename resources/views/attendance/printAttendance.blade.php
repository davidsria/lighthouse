@include('partials.head')
@section('title','View members')
<body  onload="window.print();">
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
        <div class="col-xs-12 table-responsive" id="membersList">
            <table class="table table-striped">
                <thead>
                <tr class="text-center">
                <th>Date</th>
                <th>Meeting Hold</th>
                <th>Location</th>
                <th>Start Time</th>
                <th>End Time</th>
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
                    <td>{{ $attendance->end_time }}</td>
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
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->

</body>
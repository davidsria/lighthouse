@include('partials.head')
@section('title','Guest View')
<body  onload="window.print();">
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
        <div class="col-xs-12 table-responsive" id="membersList">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Sex</th>
              <th>Telephone</th>
              <th>Address</th>
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
<div class="modal fade" id="profile" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" >
    <div class="modal-content" style="background-color:snow;" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> {{ Auth::user()->name }} Konnect Center </h4>
      </div>
      <div class="modal-body">
         <div class="row">
          <div class="col-lg-4">
            <img src="{{ URL::asset('dist/img/account-512.png') }}" height="200" width="200" alt="User Image">
          </div>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-4">
                <h6 class="modal-title">Reports<span class="badge" id="noReports"></span></h6>
              </div>
              <div class="col-lg-4">
                <h6 class="modal-title">Members<span class="badge" id="noMembers"></span></h6>
              </div>
              <div class="col-lg-4">
                <h6 class="modal-title">Projects<span class="badge" id="noProjects"></span></h6>
              </div>
            </div><hr>
            <div class="row">
              <div class="col-lg-4">
                <label>Konnet area</label>
              </div>
              <div class="col-lg-8">
                <span id="areas"></span>
              </div>
            </div><hr>
            <div class="row">
              <div class="col-lg-4">
                <label>Date created</label>
              </div>
              <div class="col-lg-8">
                <span id="created"></span>
              </div>
            </div><hr>
            <div class="row">
              <div class="col-lg-4">
                <label>Date last updated</label>
              </div>
              <div class="col-lg-8">
                <span id="updated"></span>
              </div>
            </div><hr>
            <div class="row">
              <div class="col-lg-4">
                <label>Geographical name</label>
              </div>
              <div class="col-lg-8">
                <span id="geoName"></span>
              </div>
            </div><hr>
            <div class="row">
              <div class="col-lg-4">
                <label>Pastors</label>
              </div>
              <div class="col-lg-8">
                <span id="pastorName"></span>
              </div>
            </div><hr>
            <div class="row">
              <div class="col-lg-4">
                <label>Leader</label>
              </div>
              <div class="col-lg-8">
                <span id="leaderName"></span>
              </div>
            </div><hr>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal" id="dismis4">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
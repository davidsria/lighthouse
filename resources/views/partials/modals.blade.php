
<div class="modal fade" id="profile" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" >
    <div class="modal-content" style="background-color:snow;" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> {{ Auth::user()->name }} Konnect Center </h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <label>Report</label><a href=""><span class="badge">3</span></a>
          </div>
          <div class="col-md-4">
            <label> Member </label><a href=""><span class="badge">1</span></a>
          </div>
          <div class="col-md-4">
            <label> Project </label><a href=""><span class="badge">0</span></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Konnect Areas</th>
                        <th>Geographical areas</th>
                        <th>Konnect Pastor</th>
                        <th>Konnect Leader</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Agidingbi</td>
                        <td>Opebi</td>
                        <td>Pastor Kenny</td>
                        <td>Giwa</td>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal" id="dismis4">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
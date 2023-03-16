<div>
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Investments Logs</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                  <thead>
            <tr>
                <th>No.</th>
                <th>User</th>
                <th>Days</th>
                <th>Amount Receive</th>
                <th>Received At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($il as $key=>$info)
            <tr class="child-row">
                <td>{{ $key+1 }}</td>
                <td>{{App\Models\User::where('id',$info->user_id)->value('first_name')}}</td>
                <td>{{ $info->days }}</td>
                <td>{{ $info->amount_receive }}</td>
                <td>{{ $info->created_at }}</td>
          </tr>
            @endforeach
        </tbody>
                  </table>
                  {{ $il->links() }}

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
</div>

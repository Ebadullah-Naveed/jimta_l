<div>
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Investments Information</h4>
              </div>
  
                  <table class="table tablesorter " id="">
                  <thead>
            <tr>
                <th>No.</th>
                <th>User</th>
                <th>Referal</th>
                <th>Amount</th>
                <th>Type</th>
                <th>Message</th>
                </tr>
        </thead>
        <tbody>
            @foreach($reflog as $info)
            <tr class="child-row">
                <td>{{ $info->id }}</td>
                <td>{{App\Models\User::where('id',$info->user)->value('first_name')}}(ID = {{$info->user}})</td>
                <td>{{App\Models\User::where('id',$info->referal)->value('first_name')}}(ID = {{$info->referal}})</td>
                <td>{{ $info->amount }}</td>
                <td>{{ $info->type }}</td>
                <td>{{ $info->message }}</td>

            @endforeach
        </tbody>
                  </table>
    {{ $reflog->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
</div>

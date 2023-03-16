<div>
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Referer Information</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
           
        <thead>
            <tr>
                <th>No.</th>
                <th>Referrer Name</th>
                <th>User Name</th>
                <th>Bonus Percentage</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($referals as $referal)
            <tr class="child-row">
                <td>{{ $referal->id }}</td>
                <td>{{ App\Models\User::where('id',$referal->referrer_id)->value('first_name') }}</td>
                <td>{{ App\Models\User::where('id',$referal->user_id)->value('first_name') }}</td>
                <td>{{$referal->bonus_percentage}}</td>
                @if(auth()->user()->is_admin == 1)
                @if($referal->status == 1)
                <td>
                    <button wire:click="changeStatus({{ $referal->id }},{{$referal->status}})" class="btn btn-success btn-sm">Active</button>
                </td>
                @else
                <td>
                    <button wire:click="changeStatus({{ $referal->id }},{{$referal->status}})" class="btn btn-danger btn-sm">In-Active</button>
                </td>
                @endif
                @endif
          </tr>
            @endforeach
        </tbody>
                  </table>
                  {{ $referals->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

</div>

<div>
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Fund Requested</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          User ID
                        </th>
                        <th>
                          User Name
                        </th>
                        <th>
                         Amount
                        </th>
                        <th>
                          Payment Proof
                        </th>
                        <th>
                          Status
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($fund as $o)
                      <tr>
                        <td>
                          {{$o->user_id}}
                        </td>
                        <td>
                        {{App\Models\User::where('id',$o->user_id)->value('first_name')}}
                        </td>
                        <td>
                          {{$o->amount}}
                        </td>
                        <td>
                        <img src="{{asset('storage/'.$o->image)}}" alt="" height='150' width='150'>
                        </td>
                        <td>
                        @if($o->status == 0)
                        <button class="btn btn-sm btn-danger" wire:click="changestatus({{ $o->id}},{{$o->status }})">Pending</button>
                        @else
                        <button class="btn btn-sm btn-success" wire:click="changestatus({{ $o->id}},{{$o->status }})">Send</button>
                        @endif    
                    </td>
                      </tr>
                      @endforeach                      
                    </tbody>
                  </table>
                  {{ $fund->links() }}

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
</div>


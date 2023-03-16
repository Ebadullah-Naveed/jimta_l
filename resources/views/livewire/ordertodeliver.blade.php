<div>
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Order to Deliver</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          Order Id
                        </th>
                        <th>
                          Orderer Name
                        </th>
                        <th>
                          Service Center Name
                        </th>
                        <th>
                          Status
                        </th>
                        @if(auth()->user()->is_admin == 1)
                        <th>
                          Verification Code
                        </th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $o)
                      <tr>
                        <td>
                          {{$o->order_id}}
                        </td>
                        <td>
                        {{App\Models\User::where('id',$o->orderer_id)->value('first_name')}}
                        </td>
                        <td>
                        {{App\Models\User::where('id',App\Models\ServiceCenter::where('id',$o->user_id)->value('user_id'))->value('first_name')}}
                        </td>
                        <td>
                        @if($o->status != "Received By Service Center")
                        <button wire:click="changeStatus({{ $o->order_id }})">{{$o->status}}</button>
                        @else
                        <button>{{$o->status}}</button>
                        @endif
                        </td>
                        @if(auth()->user()->is_admin == 1)
                        <td>{{$o->verification_code}}</td>
                        @endif
                      </tr>
                      @endforeach                      
                    </tbody>
                  </table>
                  {{ $order->links() }}

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
</div>

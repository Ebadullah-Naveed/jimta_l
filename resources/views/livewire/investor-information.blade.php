<div>
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Investments Information</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                @if($updateMode)
    <div class="form-group">
        <label for="exampleFormControlInput1">Investor Name:</label>
        <p>{{App\Models\User::where('id',$this->user_id)->value('first_name')}}</p>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Investment Amount:</label>
        <p>{{$this->investment_amount}}</p>
        <!-- @if($confirming==$this->is_id)
                    <button wire:click="withdrawReq({{$this->is_id}},{{$this->user_id}})"
                        class="btn btn-danger btn-sm">Are you Sure you want to Wthdraw?</button>
                @else
                <button class="btn btn-success btn-sm" wire:click="confirmDelete({{ $this->is_id }})">Withdraw</button><br>
                @endif
        <small>20% Will be deducted on withdrawing before maturity and 5% bank processing fees will be deducted</small>
      -->
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Investment Return:</label>
        <p>{{$this->return}}</p>
        <button class="btn btn-dark btn-sm" wire:click.prevent="investmentReturn({{$this->investment_amount}})">Calculate</button>
        @if(!(auth()->user()->is_admin))
        <small>{{$this->returnP}}</small><br>
        <!-- @if($this->days >= 547)
        <button wire:click.prevent="returnConvert({{$this->investment_amount}})" class="btn btn-success btn-sm">Convert to Wallet</button>
        @endif -->
        @endif
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Referal Earning:</label>
        <p>{{$this->referal_earning}}</p>
    </div>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
@endif
                  <table class="table tablesorter " id="">
                  <thead>
            <tr>
                <th>No.</th>
                <th>User</th>
                <th>Investment Amount</th>
                <th>Start Date</th>
                <th>End Date</th>
                @if(auth()->user()->is_admin == 1)
                <th>Status</th>
                @endif
                @if(auth()->user()->is_admin == 1)
                <th width="150px">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($infos as $info)
            <tr class="child-row">
                <td>{{ $info->id }}</td>
                <td>{{App\Models\User::where('id',$info->user_id)->value('first_name')}}</td>
                <td>{{ $info->investment_amount }}</td>
                <td>{{ $info->created_at }}</td>
                <td>{{Carbon\Carbon::parse($info->created_at->toDateString())->addMonth(18)}}</td>
                @if(auth()->user()->is_admin == 1)
                @if($info->status == 1)
                <td>
                    <button wire:click="changeStatus({{ $info->id }},{{$info->status}})" class="btn btn-success btn-sm">Active</button>
                </td>
                @else
                <td>
                    <button wire:click="changeStatus({{ $info->id }},{{$info->status}})" class="btn btn-danger btn-sm">In-Active</button>
                </td>
                @endif
                @endif
                <td>
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $info->id }})" class="btn btn-primary btn-sm">View</button>
                </td>
          </tr>
            @endforeach
        </tbody>
                  </table>
                  @if(auth()->user()->is_admin == 1)
    {{ $infos->links() }}
    @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
</div>

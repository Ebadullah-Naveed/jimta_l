<div>
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Withdraw Request</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
@if($updateMode)
<form>
<div class="form-group">
        <label for="exampleFormControlInput1">User Name:</label>
            <p>
            {{ App\Models\User::where('id',$this->user_id)->value('first_name') }}
            </p>    
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Account Number:</label>
            <p>
            {{$this->account_number}}
            </p>    
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Account Title:</label>
        <p>
        {{$this->account_title}}
</p> 
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Bank Name:</label>
        <p>
        {{$this->bank_name}}
</p> 
    </div>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
    </form>
@endif
                  <table class="table tablesorter " id="">
                  <thead>
            <tr>
                <th>No.</th>
                <th>Investment ID</th>
                <th>User Name</th>
                <th>Investment Mature</th>
                <th>Status</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($withdraws as $withdraw)
            <tr class="child-row">
                <td>{{ $withdraw->id }}</td>
                <td>{{ $withdraw->investment_id }}</td>
                <td>{{ App\Models\User::where('id',$withdraw->user_id)->value('first_name') }}</td>
                <td>@if($withdraw->maturity == 0)
                    <button class="btn btn-danger btn-sm">No</button>
                    @else
                    <button class="btn btn-success btn-sm">Yes</button>
                    @endif
                </td>
                @if($withdraw->status == 1)
                <td>
                    <button class="btn btn-dark btn-sm">Pending</button>
                </td>
                @elseif($withdraw->status == 2)
                <td>
                    <button class="btn btn-success btn-sm">Approved</button>
                </td>
                @else
                <td>
                    <button class="btn btn-approve btn-sm">Disapproved</button>
                </td>
                @endif
                <td>
                    <button type="button" class="btn btn-success btn-sm" wire:click.prevent="userBankDet({{$withdraw->user_id}})">Users Bank Details</button>
                </td>
          </tr>
            @endforeach
        </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
    {{ $withdraws->links() }}
</div>

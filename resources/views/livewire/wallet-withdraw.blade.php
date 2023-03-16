<div>
    @if(auth()->user()->is_admin != 1)
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Withdraw Request</h4>
              </div>
              <div class="card-body">
              <form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Amount to Withdraw:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Amount" wire:model="amount">
        @error('amount') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="withReq()" class="btn btn-dark">Add</button>
</form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @else
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Withdrawal Request</h4>
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
                <th>User Name</th>
                <th>Amount</th>
                <th>Status</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($withs as $with)
            <tr class="child-row">
            <td>{{ $with->id }}</td>
                <td>{{ $with->user_name }}</td>
                <td>{{ $with->balance }}</td>              
                @if($with->status == 1)
                <td>
                    <button wire:click="changeStatus({{ $with->id }},{{$with->status}})" class="btn btn-danger btn-sm">Pending</button>
                </td>
                @else
                <td>
                    <button wire:click="changeStatus({{ $with->id }},{{$with->status}})" class="btn btn-success btn-sm">Transfer Successfully</button>
                </td>
                @endif
                <td>
                    <button type="button" class="btn btn-success btn-sm" wire:click.prevent="userBankDet({{$with->user_id}})">Users Bank Details</button>
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
      {{ $withs->links() }}
      @endif
</div>

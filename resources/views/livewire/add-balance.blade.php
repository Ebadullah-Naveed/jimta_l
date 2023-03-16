<div>
  @if(auth()->user()->is_admin ==1)
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Add Jimta Wallet</h4>
              </div>
              <div class="card-body">
              <form>
    <div class="form-group">
        <select wire:model="ids" class="form-control">
            <option value="">--Option--</option>
            @foreach($user as $users)
            <option value="{{$users->id}}">{{$users->first_name}} , {{$users->email}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Balance:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Balance" wire:model="balance">
        @error('balance') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="addBalance()" class="btn btn-dark">Add</button>
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
                <h4 class="card-title">Transfer Wallet</h4>
              </div>
              <div class="card-body">
              <form>
    <div class="form-group">
    <label for="exampleFormControlInput1">User id:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter id" wire:model="user_id">
        @error('user_id') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Balance:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Balance" wire:model="amount">
        @error('amount') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="transferBalance()" class="btn btn-dark">Transfer</button>
</form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif

</div>

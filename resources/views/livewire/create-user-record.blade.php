@if(auth()->user()->is_admin == 1)
<div>
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-body">
            @if(auth()->user()->id == 26)
              <h2>Wallet</h2>
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">User Id:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter First Name" wire:model="user_id">
                        @error('user_id') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    
                    <button wire:click.prevent="createWallet()" class="btn btn-success">Create</button>
                </form>
                <h2>Referal</h2>
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">User Id:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter First Name" wire:model="user_id">
                        @error('user_id') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Referal Id:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter First Name" wire:model="referal_id">
                        @error('referal_id') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    
                    <button wire:click.prevent="makeReferal()" class="btn btn-success">Create</button>
                </form>
                @endif
                <h2>Change Password</h2>
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">User Id:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter User Id" wire:model="user_id">
                        @error('user_id') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Password" wire:model="password">
                        @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    
                    <button wire:click.prevent="changepass()" class="btn btn-success">Create</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

</div>
@endif

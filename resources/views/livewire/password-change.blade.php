<div>
<div>
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Investments Information</h4>
              </div>
              <div class="card-body">
              <form>
<div class="form-group">
        <label for="exampleFormControlInput1">Current Password:</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Enter Current Password" wire:model="p_password">
        @error('p_password') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">New Password:</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Enter New Password" wire:model="n_password">
        @error('n_password') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Confirm Password:</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Enter Confirm password" wire:model="c_password">
        @error('c_password') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
   
    <button wire:click.prevent="changePass()" class="btn btn-success">Change</button>

</form>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
</div>

</div>

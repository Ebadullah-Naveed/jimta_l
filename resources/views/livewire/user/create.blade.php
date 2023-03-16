@if(auth()->user()->is_admin == 1)
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	Add User
</button>
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
           <form>
    <div class="form-group">
        <label for="exampleFormControlInput1">First Name:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter First Name" wire:model="first_name">
        @error('first_name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Last Name:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Last Name" wire:model="last_name">
        @error('last_name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Email:</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Email" wire:model="email">
        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Country:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Country" wire:model="country">
        @error('country') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">City:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter City" wire:model="city">
        @error('city') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Address:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Address" wire:model="address">
        @error('address') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Phone:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Phone" wire:model="phone_number">
        @error('phone_number') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Role:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Role" wire:model="role">
        @error('role') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Status:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Status" wire:model="status">
        @error('status') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
            </div>
        </div>
    </div>
</div>
@endif
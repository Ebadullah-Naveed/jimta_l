<style>
    .update-form label{
        color:white !important;
    }
    .update-form input{
        color:black !important;
    }
    .update-form textarea{
        color:black !important;
    }
</style>
<form class="update-form">
<input type="hidden" wire:model="user_id">
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
    <button wire:click.prevent="update()" class="btn btn-success">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button></form>
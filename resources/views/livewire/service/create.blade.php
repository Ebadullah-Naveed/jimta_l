@if(auth()->user()->is_admin == 1)
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	Add Service Center
</button>
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Service Center</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
           <form>
           <div class="form-group">
        <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="Enter First Name">
    </div>
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
        <label for="exampleFormControlInput2">phone number:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter phone number" wire:model="phone_number">
        @error('phone_number') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <h3 style="color:black;">Business Details</h3>
    <div class="form-group">
        <label for="exampleFormControlInput2">Business Detail:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Business Detail" wire:model="bussiness_details">
        @error('bussiness_details') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Business Name:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Business Name" wire:model="bussiness_name">
        @error('bussiness_name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Shop Address:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Shop Address" wire:model="shop_address">
        @error('shop_address') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Contact Person:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Contact Person" wire:model="contact_person">
        @error('contact_person') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Office Telephone:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Office Telephone" wire:model="tel_office">
        @error('tel_office') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Mobile Number:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Mobile Number" wire:model="mobile">
        @error('mobile') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Business Licence Number:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Business Licence Number" wire:model="bussiness_licence_number">
        @error('bussiness_licence_number') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Goverment Id Proof:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Goverment Id Proof" wire:model="gov_id">
        @error('gov_id') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
  
  
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
            </div>
        </div>
    </div>
</div>
@endif
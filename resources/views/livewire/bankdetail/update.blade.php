<style>
    .update-form label{
        color:white !important;
    }
    .update-form input{
        color:white !important;
    }
    .update-form textarea{
        color:white !important;
    }
</style>
<form class="update-form">
    <input type="hidden" wire:model="bank_id">
    <div class="form-group">
        <label for="exampleFormControlInput1">Bank name:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter bank name" wire:model="bank_name">
        @error('bank_name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Account number:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter account number" wire:model="account_number">
        @error('account_number') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Account title:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter account title" wire:model="account_title">
        @error('account_title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>

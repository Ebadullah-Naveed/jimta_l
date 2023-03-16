@if(App\Models\BankDetail::where('user_id',auth()->user()->id)->first() == null)
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	Add Details
</button>
@endif
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
           <form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Bank Name:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter bank name" wire:model="bank_name">
        @error('bank_name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Account Title:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter account title" wire:model="account_title">
        @error('account_title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Account Number:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter account number" wire:model="account_number">
        @error('account_number') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
            </div>
        </div>
    </div>
</div>
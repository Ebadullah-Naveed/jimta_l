@if(auth()->user()->is_admin == 1) 

<style>
  
</style>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	Get Code
</button>
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
        <label style="color:black !important" for="exampleFormControlInput1">Package:</label>
        <select style="color:black !important" class="text-dark form-control form-control-sm" wire:model="level">
            <option style="color:black !important"  value="">Select</option>
            <option style="color:black !important" value="1">20$ Package</option>
            <option style="color:black !important" value="2">100$ Package</option>
        </select>
        @error('level') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
            </div>
        </div>
    </div>
</div>
@endif
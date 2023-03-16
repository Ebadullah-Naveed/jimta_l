<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	Edid Package
</button>
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Investment Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
           <form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Title:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title" wire:model="title">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Description:</label>
        <textarea type="text" class="form-control" id="exampleFormControlInput2" wire:model="description" placeholder="Enter description"></textarea>
        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Price:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter price" wire:model="price">
        @error('price') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Tier:</label>
        <select wire:model="tier">
            <option value="">--Select--</option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
        @error('tier') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
            </div>
        </div>
    </div>
</div>
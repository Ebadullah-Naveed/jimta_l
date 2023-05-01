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
    <input type="hidden" wire:model="post_id">
    <div class="form-group">
        <label for="exampleFormControlInput1">Title:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title" wire:model="title">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Description:</label>
        <textarea type="email" class="form-control" id="exampleFormControlInput2" wire:model="description" placeholder="Enter description"></textarea>
        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Price:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter price" wire:model="price">
        @error('price') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Tier:</label>
        <select wire:model="tier">
            <option value="">--Select--</option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
        @error('tier') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>

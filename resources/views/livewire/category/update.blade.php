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
    <input type="hidden" wire:model="category_id">
    <div class="form-group">
        <label for="exampleFormControlInput1">Title:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title" wire:model="title">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Type:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter type" wire:model="type">
        @error('type') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>

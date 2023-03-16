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
<input type="hidden" wire:model="product_id">
<div class="form-group">
        <label style="color:white !important" class="text-light" for="exampleFormControlInput1">Title:</label>
        <textarea type="text" class="form-control text-light" id="exampleFormControlInput2" wire:model="title" placeholder="Enter Title"></textarea>
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label style="color:white !important" class="text-light" for="exampleFormControlInput2">Description:</label>
        <textarea type="text" class="form-control text-light" id="exampleFormControlInput2" wire:model="description" placeholder="Enter Description"></textarea>
        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
   
    <div class="form-group">
        <label style="color:white !important" class="text-light" for="exampleFormControlInput1">SKU:</label>
        <input type="text" class="form-control text-light" id="exampleFormControlInput1" placeholder="Enter sku" wire:model="sku">
        @error('sku') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
   
    <div class="form-group">
        <label style="color:white !important" class="text-light" for="exampleFormControlInput1">price:</label>
        <input type="text" class="form-control text-light" id="exampleFormControlInput1" placeholder="Enter price" wire:model="price">
        @error('price') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
   
    <div class="form-group">
        <label style="color:white !important" class="text-light" for="exampleFormControlInput1">Avaliability:</label>
        <input type="number" class="form-control text-light" id="exampleFormControlInput1" placeholder="Enter avaliability" wire:model="avaliability">
        @error('avaliability') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label style="color:white !important" class="text-light" for="exampleFormControlInput1">Product Main Image:</label>
        <input type="file" class="form-control text-light" id="exampleFormControlInput1" placeholder="Enter Product Main Image" wire:model="product_main_image">
        @error('product_main_image') <span class="text-danger">{{ $message }}</span>@enderror
        <img src="{{asset('storage/'.$this->image)}}" alt="" height='150' width='150'>
    </div>
    <div class="form-group">
        <label style="color:white !important" class="text-light" for="exampleFormControlInput1">Product Image Gallery:</label>
        <input type="file" class="form-control text-light" id="exampleFormControlInput1" placeholder="Enter Product Image Gallery" wire:model="product_image_gallery" multiple>
        @error('image') <span class="text-danger">{{ $message }}</span>@enderror
        @foreach($this->gallery as $galleries)
        <img src="{{asset('storage/'.$galleries->image)}}" alt="" height='100' width='100'>
        <button wire:click="killImage({{ $galleries->id }})" class="btn btn-danger btn-sm">Remove</button>
        @endforeach
    </div>
    <!--Checkbox-->
    <!-- <div class="form-group">
        <label class="text-light" for="exampleFormControlInput1">Color:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter color" wire:model="color">
        @error('color') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label class="text-light" for="exampleFormControlInput1">Size:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter size" wire:model="size">
        @error('size') <span class="text-danger">{{ $message }}</span>@enderror
    </div> -->
  <!--Checkbox-->
    <button wire:click.prevent="update()" class="btn btn-success">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>

</form>
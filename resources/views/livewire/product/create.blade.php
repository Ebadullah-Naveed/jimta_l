<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	Add Product
</button>
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
           <form enctype="multipart/form-data">
           <div class="form-group">
        <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Title:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title" wire:model="title">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Description:</label>
        <textarea type="text" class="form-control" id="exampleFormControlInput2" wire:model="description" placeholder="Enter Description"></textarea>
        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">SKU:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter sku" wire:model="sku">
        @error('sku') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">price:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter price" wire:model="price">
        @error('price') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Category:</label>
        <select class="form-control" wire:model="category_id">
            <option>--Select--</option>
            @foreach(App\Models\ProductCategory::get() as $cat)
            <option value="{{$cat->id}}">{{$cat->title}}</option>
            @endforeach
        </select>
        @error('category_id') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Avaliability:</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter avaliability" wire:model="avaliability">
        @error('avaliability') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Product Main Image:</label>
        <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Main Image" wire:model="product_main_image">
        @error('product_main_image') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Product Image Gallery:</label>
        <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Image Gallery" wire:model="product_image_gallery" multiple>
        @error('product_image_gallery.*') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <!--Checkbox-->
    <!-- <div id="opwp_woo_tickets">
    <div class="form-group">
        <input type="checkbox" class="maxtickets_enable_cb">
        <label for="exampleFormControlInput1">Has Variation</label>
    </div>
    
    <div class="max_tickets">
    <div class="form-group">
        <label for="exampleFormControlInput1">Color:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter color" wire:model="color">
        @error('color') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Size:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter size" wire:model="size">
        @error('size') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    </div>
  </div> -->
  <!--Checkbox-->
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
            </div>
        </div>
    </div>
</div>
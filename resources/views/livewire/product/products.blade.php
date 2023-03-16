<div>
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Product</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                @if($updateMode)
    @include('livewire.product.update')
    @else
    @include('livewire.product.create')
    @endif
                  <table class="table tablesorter " id="">
                  <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Avaliability</th>
                <th>Image</th>
                <th>Status</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="child-row">
                <td>{{ $product->id }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->description }}</td>
                @if($product->avaliability >= 1)
                <td>
                    <button class="btn btn-success btn-sm">In Stock Quantity : {{$product->avaliability}}</button>
                </td>
                @else
                <td>
                    <button class="btn btn-danger btn-sm">Out Of Stock</button>
                </td>
                @endif
                <td><img src="{{asset('storage/'.$product->product_main_image)}}" alt="" height='150' width='150'></td>
                @if($product->status == 1)
                <td>
                    <button wire:click="changeStatus({{ $product->id }},{{$product->status}})" class="btn btn-success btn-sm">Active</button>
                </td>
                @else
                <td>
                    <button wire:click="changeStatus({{ $product->id }},{{$product->status}})" class="btn btn-danger btn-sm">In-Active</button>
                </td>
                @endif
                <td>
                <button wire:click="edit({{ $product->id }})" class="btn btn-primary btn-sm">Edit</button>                    
                @if($confirming===$product->id)
                    <button wire:click="kill({{ $product->id }})"
                        class="btn btn-danger btn-sm">Sure?</button>
                @else
                    <button wire:click="confirmDelete({{ $product->id }})"
                        class="btn btn-dark btn-sm">Delete</button>
                @endif
                </td>
          </tr>
            @endforeach
        </tbody>
                  </table>
                  {{ $products->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

</div>

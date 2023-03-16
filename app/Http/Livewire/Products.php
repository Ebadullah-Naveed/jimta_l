<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductGallery;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;

class Products extends Component
{
    use WithPagination;
    public $title, $description, $sku,$slug,$avaliability,$status,$product_id,$images,$product_main_image,$category_id,$price;
    public $updateMode = false;
    public $confirming;
    public $product_image_gallery = [];
    protected $paginationTheme = 'bootstrap';
    use AuthorizesRequests;
    use WithFileUploads;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        if(auth()->user()->is_admin == 1)
        {
        return view('livewire.product.products', [
            'products' => Product::paginate(4),
        ]);
    }
    else
    {
        abort(404);
    }
      
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->title = '';
        $this->description = '';
        $this->sku = '';
        $this->avaliability = '';
        $this->status = '';
        $this->product_main_image = '';
        $this->product_image_gallery = '';
        $this->category_id = '';
        $this->price = '';
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        if($this->product_main_image)
        {
        $name = $this->product_main_image->store('image/product','public');
        }
        
        $validatedDate = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'avaliability' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'product_main_image' => 'image|required',
        ]);
      
        $validatedDate['product_main_image']= $name;
        $validatedDate['slug']= strtolower(str_replace(" ", "-",$this->title));

        Product::create($validatedDate);
        if($this->product_image_gallery != null)
        {
            foreach ($this->product_image_gallery as $product_image_gallery) {
            $id = Product::orderBy('created_at', 'desc')->pluck('id')->first();
                ProductGallery::create([
                    'image' => $product_image_gallery->store('image/product','public'),
                    'product_id' => $id
                ]
                );
            }
        }
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Product Store Successfully!!"
            ]);  
        $this->resetInputFields();

        $this->emit('userStore');
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->gallery = ProductGallery::where('product_id',$id)->get();
        $this->product_id = $id;
        $this->title = $product->title;
        $this->description = $product->description;
        $this->sku = $product->sku;
        $this->price = $product->price;
        $this->avaliability = $product->avaliability;
        $this->image = $product->product_main_image;
  
        $this->updateMode = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        
        $product = Product::find($this->product_id);
        if($this->product_main_image)
        {
            $name = $this->product_main_image->store('image/product','public');
        }
        else
        {
            $name = $product->product_main_image;
        }
        $validatedDate = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'avaliability' => 'required',
            'price' => 'required',
        ]);
        
        $product->update([
            'title' => $this->title,
            'description' => $this->description,
            'sku' => $this->sku,
            'price' => $this->price,
            'slug' => strtolower(str_replace(" ", "-",$this->title)),
            'avaliability' => $this->avaliability,
            'product_main_image' => $name,
        ]);
        if($this->product_image_gallery)
        {
        foreach ($this->product_image_gallery as $product_image_gallery) {
            $id = Product::orderBy('created_at', 'desc')->pluck('id')->first();
                ProductGallery::create([
                    'image' => $product_image_gallery->store('image/product','public'),
                    'product_id' => $id
                ]
                );
            }
        }
        $this->updateMode = false;
  
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Product Update Successfully!!"
        ]);        
        $this->resetInputFields();

        $this->emit('userUpdate');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        $delimage = Product::findOrFail($id);
        $file_path = public_path().'/storage/'.$delimage->product_main_image;
        unlink($file_path);
        Product::destroy($id);
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Product Deleted Successfully!!"
        ]);
    }

    public function killImage($id)
    {
        $delgalleryimage = ProductGallery::findOrFail($id);
        $file_path = public_path().'/storage/'.$delgalleryimage->image;
        unlink($file_path);
        ProductGallery::destroy($id);
    }

    public function changeStatus($id,$status)
    {
        if($status == 0)
        {
        Product::where('id',$id)->update([
            'status' => 1,
        ]);
        }
        else
        {
        Product::where('id',$id)->update([
            'status' => 0,
        ]);
        }
  
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Status Updated Successfully!!"
        ]);
    }
}

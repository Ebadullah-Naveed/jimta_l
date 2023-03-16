<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductDetail extends Component
{
    public $location;
    use AuthorizesRequests;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function mount($slug)
    {
        if(auth()->user()->is_subscriber == 1)
        {
            return view('livewire.product-detail', [
                'product' => Product::where('slug',$slug)->first(),
            ]); 
        }
        else
        {
            abort(403, 'Please Subscribe to view this page');
        }
       
    }

}
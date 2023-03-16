<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\WithPagination;

class ShopController extends Component
{
    use WithPagination;

    public $cat_filter,$productcount;

    public $max_price = 250;

    public $min_price = 0;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        if(auth()->user()->is_subscriber == 1)
        {
            if($this->cat_filter)
            {
            $product = Product::where('avaliability','>',0)->whereBetween('price',[$this->min_price,$this->max_price])->where('category_id',$this->cat_filter)->paginate(12);
            }
            else
            {
                $product = Product::where('avaliability','>',0)->whereBetween('price',[$this->min_price,$this->max_price])->paginate(12);      
            }
            $pc = ProductCategory::get();
            $this->productcount = $product->count();
            return view('livewire.shop-controller',compact('product','pc'));
        }
        else
        {
            abort(403, 'Please Subscribe to view this page');
        }
        
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductGallery;

class ProdDet extends Controller
{
    public function productDet($slug)
    {
        if(auth()->user()->is_subscriber == 1)
        {
        $product = Product::where('id',$slug)->first();
        $pg = ProductGallery::where('product_id',$product->id)->get();
        $ph = Product::get();
        return view('productdetail',compact('product','pg','ph'));
        }
        else
        {
            abort(404);
        }
    }
}

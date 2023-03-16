<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ServiceCenter;
use App\Models\User;


class ProductController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function cart()
    {
        return view('cart');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id,$quantity)
    {
        if($quantity > 0)
        {
        $product = Product::findOrFail($id);
        
        $cart = session()->get('cart', []);
  
        if($quantity != null || $quantity > 0)
        {
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $id,
                "name" => $product->title,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->product_main_image
            ];
        }
    }
        else
        {
            if(isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "id" => $id,
                    "name" => $product->title,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->product_main_image
                ];
            }
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('message', 'Product added to cart successfully!');
        }
        else
        {
            return redirect()->back()->with('message', 'Please Insert Quantity!');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function checkout()
    {
        $checkout = session()->get('checkout', []);

        $cart = session()->get('cart');
        if($cart != null)
        {
        session()->put('checkout', $cart);

        session()->forget('cart');
        }
        $sc_id = User::where('id',auth()->user()->id)->value('service_center_id');
        $sc = ServiceCenter::where('id',$sc_id)->value('user_id');
        $sc_user = User::where('id',$sc)->first();
        return view('checkout',compact('sc_user'));
    }

    public function addToCheckout($id)
    {
        $product = Product::findOrFail($id);
        
        $checkout = session()->get('checkout', []);
  
        if(isset($checkout[$id])) {
            $checkout[$id]['quantity']++;
        } else {
            $checkout[$id] = [
                "id" => $id,
                "name" => $product->title,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->product_main_image
            ];
        }
          
        session()->put('checkout', $checkout);
        return redirect()->route('checkout')->with('message', 'Product added to checkout successfully!');
    }

   
}

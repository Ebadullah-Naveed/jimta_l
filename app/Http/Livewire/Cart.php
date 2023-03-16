<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public function render()
    {
        if(auth()->user()->is_subscriber == 1)
        {
        return view('livewire.cart');
        }
        else
        {
            abort(403, 'Please Subscribe to view this page');
        }
    }

    public function update($id,$quantity)
    {
        if($id && $quantity){
            $cart = session()->get('cart');
            $cart[$id]["quantity"] = $quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove($id)
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}

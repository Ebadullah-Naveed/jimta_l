<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orderdetails;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\PaymentDetail;

class UserAccount extends Component
{
    public $title, $amount, $quantity,$product;
    public $updateMode = false;
 
    public function render()
    {
        if(auth()->user()->is_subscriber == 1)
        {
            $order = Orderdetails::where('user_id',auth()->user()->id)->get();
            return view('livewire.user-account',compact('order'));
        }
        else
        {
            abort(403, 'Please Subscribe to view this page');
        }
      
    }

    public function viewProduct($orderid)
    {
        $productid = OrderItem::leftjoin('products', 'order_items.product_id', '=', 'products.id')->where('order_items.order_id',$orderid)->get();
    }

    public function viewitem($order_id)
    {
        $product_id = OrderItem::where('order_id',$order_id)->pluck('product_id');

        $this->product = Product::whereIn('id',$product_id)->get();


    }
}

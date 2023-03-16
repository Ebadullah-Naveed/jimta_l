<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrderToDelivery;
use App\Models\Orderdetails;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ServiceCenter;

class ConfirmDelivery extends Component
{
    public $vc,$order,$item,$payment,$product;

    public function render()
    {
        return view('livewire.confirm-delivery');
    }

    public function getOrder()
    {
        $vc_confirm = OrderToDelivery::where('verification_code',$this->vc)->first();

        $service_center_id = ServiceCenter::where('user_id',auth()->user()->id)->value('id');
            if($vc_confirm != null)
            {
                if(auth()->user()->is_admin != 1)
                {
                    if($vc_confirm['user_id'] == $service_center_id)
                    {
                        $this->order = Orderdetails::where('id',$vc_confirm['order_id'])->first();
                        $this->item = OrderItem::where('order_id',$vc_confirm['order_id'])->pluck('product_id');
                        $this->product = Product::whereIn('id',$this->item)->get();
                    }
                    else
                    {
                        $this->dispatchBrowserEvent('alert',[
                            'type'=>'warning',
                            'message'=>"Not Your Order!!"
                        ]);
                    }
                }
                else
                {
                    $this->order = Orderdetails::where('id',$vc_confirm['order_id'])->first();
                    $this->item = OrderItem::where('order_id',$vc_confirm['order_id'])->pluck('product_id');
                    $this->product = Product::whereIn('id',$this->item)->get();
                }
            }
            else
            {
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'warning',
                    'message'=>"Wronge Verification Code!!"
                ]);
            }
       
       
    }

    public function delivered()
    {
        $vc_confirm = OrderToDelivery::where('verification_code',$this->vc)->first();

        $service_center_id = ServiceCenter::where('user_id',auth()->user()->id)->value('id');
        if($vc_confirm['user_id'] == $service_center_id)
        {
            if($vc_confirm != null)
            {
                if($vc_confirm['status'] != "Delivered")
                {
                    OrderToDelivery::where('verification_code',$this->vc)->update(['status'=>"Delivered"]);
                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'success',
                        'message'=>"Successfully Delivered!!"
                    ]);
                }
                else
                {
                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'warning',
                        'message'=>"Already Delivered!!"
                    ]);
                }
            }
            else
            {
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'warning',
                    'message'=>"Wronge Verification Code!!"
                ]);
            }
        }
        else
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'warning',
                'message'=>"Not Your Order!!"
            ]);
        }
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrderToDelivery;
use App\Models\ServiceCenter;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Ordertodeliver extends Component
{
    use WithPagination;
    public $user_id, $order_id, $orderer_id,$status;
    public $updateMode = false;
    public $confirming;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        if(auth()->user()->is_service_center == 1)
        {
            $ss_id = ServiceCenter::where('user_id',auth()->user()->id)->value('id');
            $order = OrderToDelivery::where('user_id',$ss_id)->orderBy('id','DESC')->paginate(10);
            return view('livewire.ordertodeliver',compact('order'));
        }
        elseif(auth()->user()->is_admin == 1)
        {
            $order = OrderToDelivery::orderBy('id','DESC')->paginate(10);
            return view('livewire.ordertodeliver',compact('order'));
        }
        else
        {
            abort(403, 'Invalid Url');
        }
    }

    public function changeStatus($orderid)
    {
        $this->status = OrderToDelivery::where('order_id',$orderid)->value('status');

        if(auth()->user()->is_admin == 1)
        {
            OrderToDelivery::where('order_id',$orderid)->update(['status'=>"Delivered To Service Center"]);

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Status Updated Successfully!!"
            ]);
        }
        elseif(auth()->user()->is_service_center == 1 && $this->status == "Delivered To Service Center")
        {
            OrderToDelivery::where('order_id',$orderid)->update(['status'=>"Received By Service Center"]);

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Status Updated Successfully!!"
            ]);
        }
        elseif(auth()->user()->is_service_center == 1 && $this->status == "Received By Service Center")
        {
            OrderToDelivery::where('order_id',$orderid)->update(['status'=>"Completed"]);

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Status Updated Successfully!!"
            ]);
        }
        else
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'warning',
                'message'=>"Something went wrong!!"
            ]);
        }
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ReturnPersentage;
use App\Models\InvesterInformation;
use App\Models\Investor;
use App\Models\{User,ServiceCenter,OrderToDelivery,Orderdetails};


class Dashboard extends Component
{
    public $persentage,$roi,$futureDate,$now,$your_date,$datediff,$days_to_muture,$today;
    public function render()
    {
        if(auth()->user()->is_subscriber == 1)
        {
            $total = 0;
            $totalOrder = 0;
            $investor_count = User::where('is_admin',0)->where('is_investor',1)->count();
            $non_investor_count = User::where('is_admin',0)->where('is_investor',0)->count();
            $package_250_count = Investor::where('package_id',1)->count();
            $package_500_count = Investor::where('package_id',2)->count();
            $package_1000_count = Investor::where('package_id',3)->count();
            $package_5000_count = Investor::where('package_id',4)->count();
            $inv = InvesterInformation::where('user_id',auth()->user()->id)->first();
            $return = ReturnPersentage::first();
            if(auth()->user()->is_service_center == 1)
            {
                $ss_id = ServiceCenter::where('user_id',auth()->user()->id)->value('id');
                $order = OrderToDelivery::where('user_id',$ss_id)->get();
                foreach($order as $orders)
                {
                    $o = Orderdetails::where('id',$orders->id)->value('total');
                    $total += $o;
                }
                $totalOrder = count($order);
            }
         
            return view('livewire.dashboard',compact('totalOrder','total','return','inv','investor_count','non_investor_count','package_250_count','package_500_count','package_1000_count','package_5000_count'));
        }
        else 
        {
            abort(403, 'Please Subscribe to view this page');
        }
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'persentage' => 'required',
        ]);
      
        ReturnPersentage::where('id',1)->update($validatedDate);
    
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Save Successfully!!"
            ]);  

        $this->emit('userStore');
    }
}

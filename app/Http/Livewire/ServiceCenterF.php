<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceCenter;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;

class ServiceCenterF extends Component
{
    use WithPagination;
    public $location,$ser_id;
    use AuthorizesRequests;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        if(auth()->user()->is_subscriber == 1)
        {
            return view('livewire.service-center-f', [
                'service_user' => User::where('is_service_center',1)->get()
            ]); 
        }
        else
        {
            abort(403, 'Please Subscribe to view this page');
        }
        
    }

    public function getDetail()
    {
        $service = ServiceCenter::where('user_id',$this->ser_id)->first();
        if($service != null)
        {
            $this->location = $service->location;
        }
        else
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'warning',
                'message'=>"Please select service center!!"
            ]);
        }
    }

    public function defaultServiceCenter()
    {
        $sc_id = ServiceCenter::where('user_id',$this->ser_id)->value('id');

        if($sc_id != null)
        {
            User::where('id',auth()->user()->id)->update(['service_center_id'=>$sc_id]);

            return redirect()->route('checkout');

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Successfully Connected to Service Center!!"
            ]);
        }
        else
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'warning',
                'message'=>"Please select service center!!"
            ]);
        }
    }
}
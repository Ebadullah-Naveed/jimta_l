<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RequestFund;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class FundReq extends Component
{
    use WithPagination;

    public function render()
    {
        if(auth()->user()->is_subscriber == 1)
        {
            if(auth()->user()->is_admin == 1)
            {
                return view('livewire.fund-req', [
                    'fund' => RequestFund::paginate(25),
                ]);
            }
            else
            {
                return view('livewire.fund-req', [
                    'fund' => RequestFund::where('user_id',auth()->user()->id)->paginate(25),
                ]);
            }
        }
        else
        {
            abort(404);
        }
    }

    public function changestatus($id,$status=1)
    {
        if($status == 0)
        {
        RequestFund::where('id',$id)->update([
            'status' => 1,
        ]);
        }
        else
        {
        RequestFund::where('id',$id)->update([
            'status' => 0,
        ]);
        }
  
        session()->flash('message', 'status Updated Successfully.');
    }
}

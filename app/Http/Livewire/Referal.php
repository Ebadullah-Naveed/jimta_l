<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ReferalBonus;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Referal extends Component
{
    use WithPagination;
    public $user_id, $refferer_id, $bonus_percentage,$referal_id;
    public $updateMode = false;
    public $confirming;
    protected $paginationTheme = 'bootstrap';
    use AuthorizesRequests;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        if(auth()->user()->is_admin == 1)
        {
            return view('livewire.referal', [
                'referals' => ReferalBonus::paginate(4),
            ]);
        }
        else
        {
            if(auth()->user()->is_subscriber == 1)
        {
            return view('livewire.referal', [
                'referals' => ReferalBonus::where('user_id',auth()->user()->id)->paginate(4),
            ]); 
        }
        else
        {
            abort(403, 'Please Subscribe to view this page');
        }
            
        }
      
    }
  
    public function changeStatus($id,$status)
    {
        if($status == 0)
        {
        ReferalBonus::where('id',$id)->update([
            'status' => 1,
        ]);
        }
        else
        {
        ReferalBonus::where('id',$id)->update([
            'status' => 0,
        ]);
        }
  
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Status Updated Successfully!!"
        ]);
    }
}

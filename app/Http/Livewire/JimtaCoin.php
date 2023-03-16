<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\JimtaCoins;
use App\Models\TransferLog;

class JimtaCoin extends Component
{
    public $balance,$ids,$user_id;

    public function render()
    {
        if(auth()->user()->is_subscriber == 1)
        {
            $user = User::get();
            return view('livewire.jimta-coin',compact('user'));
        }
        else
        {
            abort(404);
        }
    }

    private function resetInputFields(){
        $this->balance = '';
        $this->ids = '';
        $this->user_id = '';
    }

    public function addBalance()
    {
        $validatedDate = $this->validate([
            'balance' => 'numeric',
        ]);
        $wallet = JimtaCoins::where('user_id',$this->ids)->first();
        if($this->ids != null)
        {
            $total = $wallet['balance'] + $this->balance;
            JimtaCoins::where('user_id',$this->ids)->update(['balance'=>$total]);
            TransferLog::create(['user_id'=>auth()->user()->id,'transfer_to'=>$this->ids,'amount'=>$this->balance,'source'=>'Jimta Coin']);
            $this->resetInputFields();

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Balance Successfully Added!!"
            ]);
        }
        else
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'warning',
                'message'=>"Please Select User!!"
            ]); 
        }
    }
    public function transferBalance()
    {
        $validatedDate = $this->validate([
            'user_id' => 'required',
            'balance' => 'numeric|gt:0',
        ]);
        $walletto = JimtaCoins::where('user_id',$this->user_id)->first();
        $walletfrom = JimtaCoins::where('user_id',auth()->user()->id)->first();
        if($this->user_id != null)
        {
            $usercheck = User::where('id',$this->user_id)->first();
            if($usercheck != null)
            {
                if($walletfrom != null && $walletto != null)
                {
                    $one_per = $this->balance/100;
                    $add = $walletto['balance'] + $this->balance;
                    $sub = ($walletfrom['balance'] - $this->balance) - $one_per;
                    if($sub >= 0)
                    {
                        JimtaCoins::where('user_id',$this->user_id)->update(['balance'=>$add]);
                        JimtaCoins::where('user_id',auth()->user()->id)->update(['balance'=>$sub]);
                        TransferLog::create(['user_id'=>auth()->user()->id,'transfer_to'=>$this->user_id,'amount'=>$this->balance,'source'=>'Jimta Coin']);
                        $this->resetInputFields();

                        $this->dispatchBrowserEvent('alert',[
                            'type'=>'success',
                            'message'=>"Balance Transfered Successfully!!"
                        ]); 
                    }
                    else
                    {
                        $this->dispatchBrowserEvent('alert',[
                            'type'=>'warning',
                            'message'=>"Invalid Amount!!"
                        ]); 
                    }
                }
                else
                {
                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'success',
                        'message'=>"Something went wronge"
                    ]); 
                }
            }
            else
            {
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'warning',
                    'message'=>"Invalid User!!"
                ]); 
            }
        }
        else
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'warning',
                'message'=>"Please Select User!!"
            ]); 
        }
    }
}

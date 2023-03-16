<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Wallet;
use App\Models\TransferLog;

class AddBalance extends Component
{
    public $balance,$ids,$amount,$user_id;

    public function render()
    {
        if(auth()->user()->is_subscriber == 1)
        {
            $user = User::get();
            return view('livewire.add-balance',compact('user'));
        }
        else
        {
            abort(404);
        }
    }

    private function resetInputFields(){
        $this->balance = '';
        $this->ids = '';
        $this->amount = '';
        $this->user_id = '';
    }

    public function addBalance()
    {
        $validatedDate = $this->validate([
            'balance' => 'numeric',
        ]);
        $wallet = Wallet::where('user_id',$this->ids)->first();
        if($this->ids != null)
        {
        if($wallet != null)
        {
            $total = $wallet['amount'] + $this->balance;
            Wallet::where('user_id',$this->ids)->update(['amount'=>$total]);
            TransferLog::create(['user_id'=>auth()->user()->id,'transfer_to'=>$this->ids,'amount'=>$this->balance,'source'=>'Wallet']);
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
                'message'=>"Something went wronge!!"
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

    public function transferBalance()
    {
        $validatedDate = $this->validate([
            'user_id' => 'required',
            'amount' => 'numeric|gt:0',
        ]);
        $walletto = Wallet::where('user_id',$this->user_id)->first();
        $walletfrom = Wallet::where('user_id',auth()->user()->id)->first();
        if($this->user_id != null)
        {
        $usercheck = User::where('id',$this->user_id)->first();
            if($usercheck != null)
            {
                if($walletfrom != null && $walletto != null)
                {
                    $add = $walletto['amount'] + $this->amount;
                    $sub = $walletfrom['amount'] - $this->amount;
                    if($sub >= 0)
                    {
                    Wallet::where('user_id',$this->user_id)->update(['amount'=>$add]);
                    Wallet::where('user_id',auth()->user()->id)->update(['amount'=>$sub]);
                    TransferLog::create(['user_id'=>auth()->user()->id,'transfer_to'=>$this->user_id,'amount'=>$this->amount,'source'=>'Wallet']);
                    $this->resetInputFields();

                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'success',
                        'message'=>"amount Transfered Successfully!!"
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
                    'type'=>'warning',
                    'message'=>"Something went wronge!!"
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

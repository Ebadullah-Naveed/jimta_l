<?php

namespace App\Http\Livewire;
use App\Models\Wallet;
use App\Models\JimtaCoins;

use Livewire\Component;

class JimtaCoinF extends Component
{
    public $amount;

    public function render()
    {
        return view('livewire.jimta-coin-f');
    }

    public function convert()
    {
        $validatedDate = $this->validate([
            'amount' => ['required','numeric'],
        ]);

        $wallet = Wallet::where('user_id',auth()->user()->id)->first();

        $jimtacoin = JimtaCoins::where('user_id',auth()->user()->id)->first();
        if($wallet != null)
        {
            if($wallet['amount'] >= $this->amount)
            {
                if($jimtacoin != null)
                {
                    $total = $jimtacoin['balance'] + $this->amount;
                    $sub_total = $wallet['amount'] - $this->amount;

                    Wallet::where('user_id',auth()->user()->id)->update(['amount'=>$sub_total]);
                    JimtaCoins::where('user_id',auth()->user()->id)->update(['balance'=>$total]);

                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'success',
                        'message'=>"Successfully Transfered!!"
                    ]);
                }
                else
                {
                    $total = $this->amount;
                    $sub_total = $wallet['amount'] - $this->amount;

                    Wallet::where('user_id',auth()->user()->id)->update(['amount'=>$sub_total]);
                    JimtaCoins::create(['user_id'=>auth()->user()->id,'balance'=>$total]);

                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'success',
                        'message'=>"Successfully Transfered!!"
                    ]);
                }
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
                'message'=>"Wallet Not Exist!!"
            ]);
        }
    }
}

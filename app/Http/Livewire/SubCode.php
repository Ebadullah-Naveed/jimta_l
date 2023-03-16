<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Code;
use App\Models\Wallet;
use Str;

class SubCode extends Component
{
    public $level, $code, $ran_str;

    public function render()
    {
        return view('livewire.sub-code');
    }

    public function getCode()
    {
        $validatedDate = $this->validate([
            'level' => 'required',
        ]);

        $wallet = Wallet::where('user_id',auth()->user()->id)->first();

        if($wallet != null)
        {
            if($this->level == 1)
            {
                if($wallet['amount'] >= 20)
                {
                    $total = $wallet['amount'] - 20;

                    Wallet::where('user_id',auth()->user()->id)->update(['amount'=>$total]);

                    $this->code = Str::random(10);

                    Code::create(['user_id'=>auth()->user()->id,'level'=>$this->level,'code'=>$this->code]);
            
                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'success',
                        'message'=>"Successfully!!"
                    ]);
                }
                else
                {
                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'warning',
                        'message'=>"Not Enough Credit!!"
                    ]);
                }
            }
            else
            {
                if($wallet['amount'] >= 100)
                {
                    $total = $wallet['amount'] - 100;

                    Wallet::where('user_id',auth()->user()->id)->update(['amount'=>$total]);

                    $this->code = Str::random(10);

                    Code::create(['user_id'=>auth()->user()->id,'level'=>$this->level,'code'=>$this->code]);
            
                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'success',
                        'message'=>"Successfully!!"
                    ]);
                }
                else
                {
                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'warning',
                        'message'=>"Not Enough Credit!!"
                    ]);
                }

            }
        }
        else
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'warning',
                'message'=>"Not Enough Credit!!"
            ]);
        }
            
    }

    public function strGen()
    {
        $this->ran_str = Str::random(10);
    }
}


<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\JimtaCoins;
use App\Models\Wallet;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserRecord extends Component
{
    public $user_id,$referal_id,$password;

    public function render()
    {
        return view('livewire.create-user-record');
    }
    
    public function createWallet()
    {
        $wallet = Wallet::where('user_id',$this->user_id)->first();
        $jimta_coin = JimtaCoins::where('user_id',$this->user_id)->first();

        if($wallet == null && $jimta_coin == null)
        {
            Wallet::create(['user_id'=>$this->user_id,'amount'=>0]);
            JimtaCoins::create(['user_id'=>$this->user_id,'balance'=>0]);
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"wallet!!"
            ]);
        }
        elseif($wallet == null && $jimta_coin != null)
        {
            Wallet::create(['user_id'=>$this->user_id,'amount'=>0]);
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"wallet!!"
            ]);
        }
        elseif($wallet != null && $jimta_coin == null)
        {
            JimtaCoins::create(['user_id'=>$this->user_id,'balance'=>0]);
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"wallet!!"
            ]);
        }
        else
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'warning',
                'message'=>"Both wallet exist!!"
            ]);
        }      
    }

    public function makeReferal()
    {
        $user = User::where('id',$this->user_id)->first();
        if($user['referrer_of'] > 0 && $user['referrer_of'] != null)
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'warning',
                'message'=>"Already referal of someone"
            ]);
        }
        else
        {
            $done = User::where('id',$this->user_id)->update(['referrer_of'=>$this->referal_id]);
            ReferralBonus::create(['user_id'=>$this->user_id,'referrer_id'=>$this->referal_id,'bonus_percentage'=>0]);
            if($done == 1)
            {
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'success',
                    'message'=>"Done"
                ]);
            }
            else
            {
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'warning',
                    'message'=>"Something went wronge"
                ]);   
            }
        }
    }

    public function changepass()
    {
        $user = User::where('id',$this->user_id)->first();
        if($user != null)
        {
            $user->update(['password'=>Hash::make($this->password)]);
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Done"
            ]);
        }
        else
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'warning',
                'message'=>"User not found"
            ]);
        }
    }

}

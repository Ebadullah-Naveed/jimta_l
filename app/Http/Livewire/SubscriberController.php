<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subscriber;
use App\Models\Investor;
use App\Models\User;
use App\Models\Code;
use App\Models\Wallet;
use App\Models\{ReferalLog,Notification,PvWalletTrip};
use Auth;

class SubscriberController extends Component
{
    public $codesend;

    public function render()
    {
        return view('livewire.subscriber-controller');
    }

    public function subscribe($id)
    {
        // if(Auth::check())
        // {
        //     $confirm = Subscriber::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
        //     $user_confirm = User::where('id',auth()->user()->id)->first();
        //     if($confirm != null)
        //     {
        //         if($confirm['subscription_id'] == 1 && $id == 2)
        //         {
        //             Subscriber::where('user_id',auth()->user()->id)->update(['subscription_id'=>$id]);
        //             User::where('id',auth()->user()->id)->update(['level'=>2,'is_subscriber'=>1]);

        //             $this->dispatchBrowserEvent('alert',[
        //                 'type'=>'success',
        //                 'message'=>"Successfully Subscribered to package!!"
        //             ]); 
        //         }
        //         elseif($confirm['subscription_id'] == 1 && $id == 1)
        //         {
        //             $this->dispatchBrowserEvent('alert',[
        //                 'type'=>'warning',
        //                 'message'=>"You are already subscribed to this package!!"
        //             ]);  
        //         }
        //         elseif($user_confirm['is_subscriber'] == 1 && $user_confirm['level'] == 2)
        //         {
        //             $this->dispatchBrowserEvent('alert',[
        //                 'type'=>'warning',
        //                 'message'=>"You are already subscribed to this package!!"
        //             ]); 
        //         }
        //     }
        //     else
        //     {
        //         Subscriber::create(['user_id'=>auth()->user()->id,'subscription_id'=>$id]);
        //         User::where('id',auth()->user()->id)->update(['level'=>1,'is_subscriber'=>1]);

        //         $this->dispatchBrowserEvent('alert',[
        //             'type'=>'success',
        //             'message'=>"Successfully Subscribered to package!!"
        //         ]); 
        //     }
        // }
        // else
        // {
        //     $this->dispatchBrowserEvent('alert',[
        //         'type'=>'warning',
        //         'message'=>"Please Login to continue!!"
        //     ]); 
        // }
        $this->dispatchBrowserEvent('alert',[
            'type'=>'warning',
            'message'=>"No Payment Option Avaliable!!"
        ]); 
    }

    public function subscribeCode()
    {
        if(Auth::check())
        {
            $confirm = Subscriber::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
            $user_confirm = User::where('id',auth()->user()->id)->first();
            $code_confirm = Code::where('code',$this->codesend)->where('status',1)->first(); 
            $ref_id = User::where('id',auth()->user()->id)->value('referrer_of');
            if($code_confirm != null)
            {
                if($code_confirm['level'] == 2)
                {
                    Subscriber::where('user_id',auth()->user()->id)->update(['subscription_id'=>$code_confirm['level']]);
                    Code::where('code',$this->codesend)->update(['status'=>0]); 
                    User::where('id',auth()->user()->id)->update(['level'=>2,'is_subscriber'=>1]);
                    if($ref_id != null || $ref_id != 0)
                    {
                       $ref_add = Wallet::where('user_id',$ref_id)->first();
                       $tot_ref = $ref_add['amount'] + 10;
                       $ref_added = Wallet::where('user_id',$ref_id)->update(['amount'=>$tot_ref]);
                       $pvWallet = PvWalletTrip::where('user_id',$ref_id)->value('balance');
                       $totalPv = 80 + $pvWallet;
                       PvWalletTrip::updateOrCreate(
                        ['user_id' =>  $ref_id],
                        ['balance' => $totalPv]
                        );    
                        ReferalLog::create(['user'=>$ref_id,'referal'=>auth()->user()->id,'amount'=>80,'type'=>"PV Trip",'message'=>""]);
            
                       Notification::create(['user_id'=>$ref_id,'message'=>'You have received 10 referal bonus in you wallet']);
                       ReferalLog::create(['user'=>$ref_id,'referal'=>auth()->user()->id,'amount'=>10,'type'=>"Subscription Bonus",'message'=>"Successfull"]);
                    }
                    else
                    {
                        ReferalLog::create(['user'=>$ref_id,'referal'=>auth()->user()->id,'amount'=>0,'type'=>"Subscription Bonus",'message'=>"Referal ID = {$ref_id}, if referal ID is not null/Empty please trasnfer 10 Wallet Point manually"]);
                    }

                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'success',
                        'message'=>"Successfully Subscribered to package!!"
                    ]); 
                    Notification::create(['user_id'=>auth()->user()->id,'message'=>'Congratz you are subscriber now']);

                    return redirect()->route('congrate');
                
            }
            else
            {
                Subscriber::create(['user_id'=>auth()->user()->id,'subscription_id'=>$code_confirm['level']]);
                Code::where('code',$this->codesend)->update(['status'=>0]); 
                User::where('id',auth()->user()->id)->update(['level'=>1,'is_subscriber'=>1]);
                if($ref_id != null || $ref_id != 0)
                {
                   $ref_add = Wallet::where('user_id',$ref_id)->first();
                   $tot_ref = $ref_add['amount'] + 2;
                   $ref_added = Wallet::where('user_id',$ref_id)->update(['amount'=>$tot_ref]);
                   $pvWallet = PvWalletTrip::where('user_id',$ref_id)->value('balance');
                   $totalPv = 16 + $pvWallet;
                   PvWalletTrip::updateOrCreate(
                    ['user_id' =>  $ref_id],
                    ['balance' => $totalPv]
                    );    
                    ReferalLog::create(['user'=>$ref_id,'referal'=>auth()->user()->id,'amount'=>16,'type'=>"PV Trip",'message'=>""]);
        
                   Notification::create(['user_id'=>$ref_id,'message'=>'You have received 2 referal bonus in you wallet']);
                   ReferalLog::create(['user'=>$ref_id,'referal'=>auth()->user()->id,'amount'=>2,'type'=>"Subscription Bonus",'message'=>"Successfull"]);

                }
                else
                {
                    ReferalLog::create(['user'=>$ref_id,'referal'=>auth()->user()->id,'amount'=>0,'type'=>"Subscription Bonus",'message'=>"Referal ID = {$ref_id}, if referal ID is not null/Empty please trasnfer 2 Wallet Point manually"]);
                }
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'success',
                    'message'=>"Successfully Subscribered to package!!"
                ]); 
                Notification::create(['user_id'=>auth()->user()->id,'message'=>'Congratz you are subscriber now']);
                return redirect()->route('congrate');

            }
        }
        else
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'warning',
                'message'=>"Invalid Code!!"
            ]); 
        }
        }
        else
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'warning',
                'message'=>"Please Login to continue!!"
            ]); 
        }

    }
}

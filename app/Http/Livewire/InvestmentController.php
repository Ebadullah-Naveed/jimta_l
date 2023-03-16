<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Investor;
use App\Models\Wallet;
use App\Models\InvestmentPackage;
use App\Models\User;
use App\Models\InvesterInformation;
use App\Models\ReferalLog;
use DB;
use Auth;
use Carbon\Carbon;

class InvestmentController extends Component
{
    public function render()
    {
        if(auth()->user()->is_subscriber == 1)
        {
            $investment = InvestmentPackage::get();

            return view('livewire.investment-controller',compact('investment'));
        }
        else
        {
            abort(403, 'Please Subscribe to view this page');
        }
    }

    public function invest($id,$price)
    {
        try
        {
            $now = Carbon::now();   
            if(Auth::check())
            {
                if(auth()->user()->is_admin == 0)
                {
                    $user_confirm = User::where('id',auth()->user()->id)->first();
                    // $confirm = InvesterInformation::where('user_id',auth()->user()->id)->first();
                    $wallet_confirm = Wallet::where('user_id',auth()->user()->id)->first();
                    $ref_id = User::where('id',auth()->user()->id)->value('referrer_of');
                        if($wallet_confirm != null && $wallet_confirm['amount'] >= $price)
                        {
                                $total = $wallet_confirm['amount'] - $price;
                                Wallet::where('user_id',auth()->user()->id)->update(['amount'=>$total]);
                            
                                Investor::create(['package_id'=>$id,'user_id'=>auth()->user()->id]);
                                $i_id = InvesterInformation::create(['user_id'=>auth()->user()->id,'investment_amount'=>$price,'withdraw_at'=>Carbon::now()->addDays(1),'end_date'=>$now->addMonths(18)]);
                                User::where('id',auth()->user()->id)->update(['is_investor'=>1]);
                                if($ref_id != null || $ref_id != 0)
                                {
                                $ref_add = Wallet::where('user_id',$ref_id)->value('amount');
                                $tot_ref = $ref_add + ($price * 0.10);
                                Wallet::where('user_id',$ref_id)->update(['amount'=>$tot_ref]);
                                }
                                ReferalLog::create(['user'=>auth()->user()->id,'referal'=>$ref_id ?? null,'amount'=>$price,'type'=>"Investment",'message'=>"Successfull. ID : {$i_id}"]);
                                $this->dispatchBrowserEvent('alert',[
                                    'type'=>'success',
                                    'message'=>"Successfully invested to package!!"
                                ]); 

                                return redirect()->route('congrate');
                        }
                            else
                            {
                                $this->dispatchBrowserEvent('alert',[
                                    'type'=>'warning',
                                    'message'=>"Insufficient Balance!!"
                                ]); 
                            }
                }
                else
                {
                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'warning',
                        'message'=>"Admin cannot Invest!!"
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
        catch(\Exception $e)
        {
            ReferalLog::create(['user'=>auth()->user()->id,'referal'=>$ref_id ?? null,'amount'=>null,'type'=>"Investment",'message'=>($e->getMessage())]);
            $this->dispatchBrowserEvent('alert',[
                'type'=>'warning',
                'message'=>"Something went wronge. Please report to site admin with User id"
            ]); 
        }
    }
   
}

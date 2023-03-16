<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Wallet;
use App\Models\Users;
use App\Models\WithdrawWallet;
use App\Models\BankDetail;

class WalletWithdraw extends Component
{
    public $user_id,$amount,$account_number,$account_title,$bank_name;
    public $updateMode = false;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        if(auth()->user()->is_subscriber == 1)
        {
            $withs = WithdrawWallet::paginate(10);
            return view('livewire.wallet-withdraw',compact('withs'));
        }
        else
        {
            abort(404);
        }
    }
    private function resetInputFields(){
        $this->user_id = '';
        $this->account_number = '';
        $this->account_title = '';
        $this->bank_name = '';
    }
   
    public function userBankDet($userid)
    {
        $det = BankDetail::where('user_id',$userid)->first();
        if($det != null)
        {
        $this->user_id = $det->user_id;
        $this->account_number = $det->account_number;
        $this->account_title = $det->account_title;
        $this->bank_name = $det->bank_name;
        }
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function withReq()
    {
        $wallet = Wallet::where('user_id',auth()->user()->id)->first();

        if($wallet != null)
        {
            if($wallet['amount'] >= $this->amount)
            {
                $total = $wallet['amount'] - $this->amount;
                Wallet::where('user_id',auth()->user()->id)->update(['amount' => $total]);
                WithdrawWallet::create(['user_id'=>auth()->user()->id,'user_name'=>auth()->user()->first_name,'balance'=>$this->amount]);

                $this->dispatchBrowserEvent('alert',[
                    'type'=>'success',
                    'message'=>"Successfull!!"
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
                'message'=>"Invalid Amount!!"
            ]); 
        }
    }

    public function changeStatus($id,$status)
    {
        if($status == 0)
        {
        WithdrawWallet::where('id',$id)->update([
            'status' => 1,
        ]);
        }
        else
        {
        WithdrawWallet::where('id',$id)->update([
            'status' => 0,
        ]);
        }
  
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Status Updated Successfully!!"
        ]);
    }
}

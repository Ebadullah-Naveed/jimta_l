<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\InvesterInformation;
use App\Models\WithdrawRequest;
use App\Models\Wallet;
use App\Models\ReturnPersentage;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;
use DateTime;
use DB;

class InvestorInformation extends Component
{
    use WithPagination;
    public $user_id, $investment_amount, $referal_return,$investment_return,$withdraw_at,$status,$is_id,$created_at,$return,$days,$returnP;
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
            $infos = InvesterInformation::paginate(4);
        }
        else
        {
            $infos = InvesterInformation::where('user_id',auth()->user()->id)->where('status',1)->get();
        }
        if(auth()->user()->is_subscriber == 1)
        {
            return view('livewire.investor-information',compact('infos'));
        }
        else
        {
            abort(403, 'Please Subscribe to view this page');
        }
      
    }

    public function edit($id)
    {
        $post = InvesterInformation::findOrFail($id);
        $this->is_id = $id;
        $this->user_id = $post->user_id;
        $this->investment_amount = $post->investment_amount;
        $this->referal_earning = $post->referal_earning;
        $this->investment_return = $post->investment_return;
        $fdate = $post->created_at;
        $tdate = Carbon::now();
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $this->days = $interval->format('%a');
        $this->updateMode = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
    }

    public function changeStatus($id,$status)
    {
        if($status == 0)
        {
        InvesterInformation::where('id',$id)->update([
            'status' => 1,
        ]);
        }
        else
        {
        InvesterInformation::where('id',$id)->update([
            'status' => 0,
        ]);
        }
  
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Status Updated Successfully!!"
        ]);
    }

    public function investmentReturn($investment_amount)
    {
        $returns = ReturnPersentage::where('id',1)->value('persentage');
        $this->return = $investment_amount * ($returns/100);
        $this->returnP = 'The amount you can convert into wallet after maturity';
    }

    public function returnConvert($amount){
        $returns = ReturnPersentage::where('id',1)->value('persentage');

        $investment_return = $amount * ($returns/100);

        if(Wallet::where('user_id',auth()->user()->id)->first() == null)
        {
            Wallet::create(['user_id' => auth()->user()->id, 'amount' => $investment_return]);
            InvesterInformation::where('user_id',auth()->user()->id)->update(['investment_return' => $investment_return]);
        }
        else
        {
            $wallet = Wallet::where('user_id',auth()->user()->id)->value('amount');
            $total = $investment_return + $wallet;
            Wallet::where('user_id',auth()->user()->id)->update(['amount' => $total]);
            InvesterInformation::where('user_id',auth()->user()->id)->update(['investment_return' => $investment_return]);
        }
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Successfully Added into Wallet!!"
        ]);
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function withdrawReq($id,$userid){
        
        $post = InvesterInformation::findOrFail($id);
        $fdate = $post->created_at;
        $tdate = Carbon::now();
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $this->days = $interval->format('%a');
        if($this->days >= 547)
        {
            $maturity = 1;
        }
        else
        {
            $maturity = 0;
        }
        if(WithdrawRequest::where('investment_id',$id)->first() == null)
        {
            WithdrawRequest::create(['investment_id'=>$id,'user_id'=>$userid,'maturity'=>$maturity]);

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Request Generated Successfully!!"
            ]);
        }
        else
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'danger',
                'message'=>"Request is already generated!!"
            ]);
        }
    }
}

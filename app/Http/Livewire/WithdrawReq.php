<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\WithdrawRequest;
use App\Models\BankDetail;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class WithdrawReq extends Component
{
        use WithPagination;
        public $investment_id, $user_id, $status,$maturity,$withdraw_id,$account_number,$account_title,$bank_name;
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
                return view('livewire.withdraw-req', [
                    'withdraws' => WithdrawRequest::paginate(4),
                ]);
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

        public function changeStatus($id,$status)
        {
            if($status == 0)
            {
            WithdrawRequest::where('id',$id)->update([
                'status' => 1,
            ]);
            }
            else
            {
            WithdrawRequest::where('id',$id)->update([
                'status' => 0,
            ]);
            }
      
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Status Updated Successfully!!"
            ]);
        }
    }

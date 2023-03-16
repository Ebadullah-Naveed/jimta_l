<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BankDetail;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BankDet extends Component
{
    use WithPagination;
    public $user_id, $account_number,$bank_id,$account_title,$bank_name;
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
            return view('livewire.bankdetail.bank-det', [
                'banks' => BankDetail::paginate(4),
            ]);
        }
        else
        {
            if(auth()->user()->is_subscriber == 1)
            {
                return view('livewire.bankdetail.bank-det', [
                    'banks' => BankDetail::where('user_id',auth()->user()->id)->paginate(4),
                ]);
            }
            else
            {
                abort(403, 'Please Subscribe to view this page');
            }
          
        }
      
      
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->user_id = '';
        $this->account_number = '';
        $this->account_title = '';
        $this->bank_name = '';
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'account_number' => 'required',
            'account_title' => 'required',
            'bank_name' => 'required',
        ]);

        $validatedDate['user_id'] = auth()->user()->id;
        
        BankDetail::create($validatedDate);
  
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"bank Store Successfully!!"
        ]);
  
        $this->resetInputFields();

        $this->emit('userStore');
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $bank = BankDetail::findOrFail($id);
        $this->bank_id = $id;
        $this->user_id = $bank->user_id;
        $this->account_number = $bank->account_number;
        $this->account_title = $bank->account_title;
        $this->bank_name = $bank->bank_name;
  
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
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        $validatedDate = $this->validate([
            'user_id' => 'required',
            'account_number' => 'required',
            'account_title' => 'required',
            'bank_name' => 'required',
        ]);
  
        $bank = BankDetail::find($this->bank_id);
        $bank->update([
            'user_id' => $this->user_id,
            'account_number' => $this->account_number,
            'account_title' => $this->account_title,
            'bank_name' => $this->bank_name,
        ]);
  
        $this->updateMode = false;
  
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"bank Updated Successfully!!"
        ]);
        $this->resetInputFields();

        $this->emit('userUpdate');
    }

}

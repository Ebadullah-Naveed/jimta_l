<?php

namespace App\Http\Livewire;
use App\Models\RequestFund;
use Livewire\WithFileUploads;


use Livewire\Component;

class FundReqF extends Component
{
    public $amount, $image;
    use WithFileUploads;


    public function render()
    {
       return view('livewire.fund-req-f');
    }

    private function resetInputFields(){
        $this->amount = '';
        $this->image = '';
    }
    
    public function store()
    {
        if($this->image)
        {
        $name = $this->image->store('image/fundreq','public');
        }
        
        $validatedDate = $this->validate([
            'amount' => 'required',
            'image' => 'image|required',
        ]);
      
        RequestFund::create(['user_id'=>auth()->user()->id,'amount'=>$this->amount,'image'=>$name]);
       
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Fund Requested Successfully!!"
            ]);  
        $this->resetInputFields();
    }
}

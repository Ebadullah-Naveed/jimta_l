<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\InvestmentPackage;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class InvestmentPackages extends Component
{
    use WithPagination;
    public $title, $description, $price,$tier,$package_id;
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
        return view('livewire.investment.investment-packages', [
            'investments' => InvestmentPackage::paginate(4),
        ]);
        }
        else
        {
            abort(404);
        }
      
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->title = '';
        $this->body = '';
        $this->author = '';
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => ['required','numeric'],
            'tier' => 'required',
        ]);
  
        InvestmentPackage::create($validatedDate);
  
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Insert Successfully!!"
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
        $investment = InvestmentPackage::findOrFail($id);
        $this->package_id = $id;
        $this->title = $investment->title;
        $this->description = $investment->description;
        $this->price = $investment->price;
        $this->tier = $investment->tier;
  
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
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'tier' => 'required',
        ]);
  
        $investment = InvestmentPackage::find($this->package_id);
        $investment->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'tier' => $this->tier,
        ]);
  
        $this->updateMode = false;
  
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Updated Successfully!!"
        ]);
        $this->resetInputFields();

        $this->emit('userUpdate');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        InvestmentPackage::destroy($id);
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Deleted Successfully!!"
        ]);
    }

    public function changeStatus($id,$status)
    {
        if($status == 0)
        {
        InvestmentPackage::where('id',$id)->update([
            'status' => 1,
        ]);
        }
        else
        {
        InvestmentPackage::where('id',$id)->update([
            'status' => 0,
        ]);
        }
  
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Status Updated Successfully!!"
        ]);
    }
}

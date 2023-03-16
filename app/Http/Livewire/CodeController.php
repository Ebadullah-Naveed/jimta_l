<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Code;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Str;

class CodeController extends Component
{
    use WithPagination;
    public $level, $code, $ran_str;
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
        if(auth()->user()->is_subscriber == 1)
        {
            if(auth()->user()->is_admin == 1)
            {
                return view('livewire.code.code-controller', [
                    'codes' => Code::paginate(25),
                ]);
            }
            else
            {
                return view('livewire.code.code-controller', [
                    'codes' => Code::where('user_id',auth()->user()->id)->paginate(25),
                ]);
            }
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
        $this->level = '';
        $this->code = '';
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'level' => 'required',
        ]);
        $validatedDate['code'] = Str::random(10);

        Code::create($validatedDate);
  
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Post Store Successfully!!"
        ]);
  
        $this->resetInputFields();

        $this->emit('userStore');
    }

    public function strGen()
    {
        $this->ran_str = Str::random(10);
    }
}

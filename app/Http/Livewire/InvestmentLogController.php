<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\InvestmentLog;
use Livewire\WithPagination;

class InvestmentLogController extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        if(auth()->user()->is_admin == 1)
        {
            $il = InvestmentLog::where('days','!=',0)->paginate(25);
        }
        else{
            $il = InvestmentLog::where('user_id',auth()->user()->id)->where('days','!=',0)->paginate(25);
        }
        return view('livewire.investment-log-controller',compact('il'));
    }
}

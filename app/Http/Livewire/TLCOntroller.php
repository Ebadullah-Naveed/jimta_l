<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TransferLog;
use Livewire\WithPagination;


class TLCOntroller extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        if(auth()->user()->is_admin == 1)
        {
            $tl = TransferLog::orderBy('id','desc')->paginate(10);
            return view('livewire.t-l-c-ontroller',compact('tl'));
        }
        else
        {
            $tl = TransferLog::where('user_id',auth()->user()->id)->orderBy('id','desc')->paginate(10);
            return view('livewire.t-l-c-ontroller',compact('tl'));
        }
    }
}

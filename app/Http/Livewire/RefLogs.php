<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ReferalLog;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;

class RefLogs extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        if(auth()->user()->is_admin == 1)
        {
            return view('livewire.ref-logs',[
                'reflog' => ReferalLog::orderBy('id','desc')->paginate(10),
            ]);
        }
        else
        {
            return view('livewire.ref-logs',[
                'reflog' => ReferalLog::where('user',auth()->user()->id)->orderBy('id','desc')->paginate(10),
            ]);
        }
    }
}

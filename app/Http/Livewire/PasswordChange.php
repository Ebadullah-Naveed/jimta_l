<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Hash;

class PasswordChange extends Component
{
    public $p_password, $n_password, $c_password;

    public function render()
    {
        return view('livewire.password-change');
    }

    public function changePass()
    {
        $validatedDate = $this->validate([
            'c_password' => 'required',
            'n_password' => 'required',
            'p_password' => 'required',
        ]);

        $user = User::where('id',auth()->user()->id)->first();

        $checkpass = Hash::check($this->p_password,$user['password']);

        if($checkpass == true)
        {
            if($this->n_password == $this->c_password)
            {
                $hashpass = Hash::make($this->n_password);

                User::where('id',auth()->user()->id)->update(['password'=>$hashpass]);
            }
            else
            {
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'warning',
                    'message'=>"Password Not Match!!"
                ]);
            }
        }
        else
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'warning',
                'message'=>"Invalid Password!!"
            ]);
        }
    }
}

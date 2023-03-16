<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Hash;

class Users extends Component
{
    use WithPagination;
    public $first_name, $last_name, $phone_number,$email,$country,$city,$address,$status,$role,$user_referer;
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
            return view('livewire.user.users', [
                'users' => User::where('is_admin',0)->paginate(25),
            ]);
        }
        else
        {
            if(auth()->user()->is_subscriber == 1)
            {
                return view('livewire.user.users', [
                    'users' => User::where('id',auth()->user()->id)->paginate(4),
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
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->address = '';
        $this->city = '';
        $this->country = '';
        $this->role = '';
        $this->phone_number = '';
        $this->status = '';
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'status' => ['required'],
            'role' => ['required']
        ]);
        $validatedDate['password'] =  Hash::make(123);
        $validatedDate['remember_token'] =  Hash::make(123);
        User::create($validatedDate);
  
        session()->flash('message', 'user Created Successfully.');
  
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
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->phone_number = $user->phone_number;
        $this->country = $user->country;
        $this->city = $user->city;
        $this->address = $user->address;
        $this->status = $user->status;
        $this->role = $user->role;
  
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'status' => ['required'],
            'role' => ['required']
        ]);
  
        $user = User::find($this->user_id);
        $user->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'country' => $this->country,
            'address' => $this->address,
            'city' => $this->city,
            'status' => $this->status,
            'role' => $this->role,
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'user Updated Successfully.');
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
        User::destroy($id);
    }

    public function changeVerification($id,$Verification)
    {
        if($Verification == 0)
        {
        User::where('id',$id)->update([
            'status' => 1,
        ]);
        }
        else
        {
        User::where('id',$id)->update([
            'status' => 0,
        ]);
        }
  
        session()->flash('message', 'Verification Updated Successfully.');
    }

    public function referalCheck($ref_id)
    {
        $this->user_referer = User::where('referrer_of',$ref_id)->get();
        // dd($this->user_referer);
    }
}

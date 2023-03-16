<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Wallet;
use App\Models\JimtaCoins;
use App\Models\ServiceCenter;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;


class ServiceRegister extends Component
{
    use WithPagination;
    public $first_name, $last_name, $email,$country,$cpassword,$city,$password,$address,$phone_number,$is_admin,$is_service_center,$status,$bussiness_details,$bussiness_name,$shop_address,$location,$contact_person,$tel_office,$mobile,$bussiness_licence_number,$gov_id;
    public $updateMode = false;
    use AuthorizesRequests;
    use WithFileUploads;

    public function render()
    {
        return view('livewire.service-register');
    }

    private function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->city = '';
        $this->address = '';
        $this->password = '';
        $this->country = '';
        $this->phone_number ='';
        $this->bussiness_details ='';
        $this->bussiness_name ='';
        $this->shop_address ='';
        $this->location ='';
        $this->contact_person ='';
        $this->tel_office ='';
        $this->bussiness_licence_number ='';
        $this->mobile ='';
        $this->gov_id ='';
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        if($this->password == $this->cpassword)
        {
           
        $validatedDate = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'country' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6',
            'bussiness_details' => 'required',
            'bussiness_name' => 'required',
            'shop_address' => 'required',
            'location' => 'required',
            'contact_person' => ['required'],
            'tel_office' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6',
            'bussiness_licence_number' => 'required',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6',
            'gov_id' => 'required'
        ]);
      
        $validatedDate['is_admin']= 0;
        $validatedDate['is_service_center']= 1;
        $validatedDate['status']= 0;
        $validatedDate['password']= Hash::make($this->password);

        $user = User::create($validatedDate);

        Wallet::create(['user_id'=>$user->id,'amount'=>0]);
        JimtaCoins::create(['user_id'=>$user->id,'balance'=>0]);

        $id = User::where('email',$this->email)->value('id');
        if($this->gov_id)
        {
        $name = $this->gov_id->store('image/idproof','public');
        }

        $validatedD = $this->validate([
            'bussiness_details' => 'required',
            'bussiness_name' => 'required',
            'shop_address' => 'required',
            'location' => 'required',
            'contact_person' => ['required'],
            'tel_office' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6',
            'bussiness_licence_number' => 'required',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6',
        ]);
        $validatedD['gov_id']= $name;
        
        $validatedD['user_id']= $id;

        ServiceCenter::create($validatedD);

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Successfully registered as a Service Center waiting for admin approval"
            ]);  
        $this->resetInputFields();
    }
    else
    {
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Password Doesnot Match"
        ]);  
    }
  
}
}
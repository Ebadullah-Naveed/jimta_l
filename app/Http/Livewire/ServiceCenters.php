<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{User,OrderToDelivery,Orderdetails};
use App\Models\ServiceCenter;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Hash;

class ServiceCenters extends Component
{
    use WithPagination;
    public $first_name, $last_name, $phone_number,$email,$country,$location,$city,$address,$status,$role,$ouser_id,$bussiness_details,$bussiness_name,$shop_address,$contact_person,$tel_office,$mobile,$bussiness_licence_number,$gov_id;
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
        if(auth()->user()->is_admin == 1 || auth()->user()->is_service_center == 1)
        {
        if(auth()->user()->is_admin == 1)
        {
            $users = User::where('users.is_service_center',1)->where('is_admin',0)->paginate(10);
        }
        elseif(auth()->user()->is_service_center == 1)
        {
            $users = User::where('users.is_service_center',1)->where('id',auth()->user()->id)->paginate(10);
        }
        return view('livewire.service.service-centers',compact('users'));
        }
        else
        {
            abort(404);
        }
    }

    public function getTotalOrder($id)
    {
        $ss_id = ServiceCenter::where('user_id',$id)->value('id');
        $order = OrderToDelivery::where('user_id',$id)->get();
        return count($order);
    }

    public function getTotal($id)
    {
        $total = 0;
        $ss_id = ServiceCenter::where('user_id',$id)->value('id');
        $order = OrderToDelivery::where('user_id',$id)->get();
        foreach($order as $orders)
        {
            $o = Orderdetails::where('id',$orders->id)->value('total');
            $total += $o;
        }
        return $total;
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
        $this->phone_number = '';
        $this->bussiness_details = '';
        $this->bussiness_name = '';
        $this->shop_address = '';
        $this->location = '';
        $this->contact_person = '';
        $this->tel_office = '';
        $this->mobile = '';
        $this->bussiness_licence_number = '';
        $this->gov_id = '';
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
            'bussiness_details' => ['required'],
            'bussiness_name' => ['required'],
            'shop_address' => ['required'],
            'contact_person' => ['required'],
            'tel_office' => ['required'],
            'mobile' => ['required'],
            'bussiness_licence_number' => ['required'],
            'gov_id' => ['required'],
        ]);

        
        $validatedDate['password'] =  Hash::make(123);
        $validatedDate['status'] =  0;
        $validatedDate['remember_token'] =  Hash::make(123);
        User::create($validatedDate);

        $user_email = User::where('email',$this->email)->value('id');

        $validated = $this->validate([
            'bussiness_details' => ['required'],
            'bussiness_name' => ['required'],
            'shop_address' => ['required'],
            'contact_person' => ['required'],
            'tel_office' => ['required'],
            'mobile' => ['required'],
            'bussiness_licence_number' => ['required'],
            'gov_id' => ['required'],
        ]);

        $validated['user_id'] = $user_email;

        ServiceCenter::create($validated);

        $ss_id = ServiceCenter::where('user_id',$user_email)->value('id');
        User::where('email',$this->email)->update(['is_service_center'=>1,'service_center_id'=>$ss_id]);
  
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Service Center User Store Successfully!!"
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
        $user = User::findOrFail($id);
        $users = ServiceCenter::where('user_id',$id)->first();
        $this->user_id = $id;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->phone_number = $user->phone_number;
        $this->country = $user->country;
        $this->city = $user->city;
        $this->address = $user->address;
        $this->status = $user->status;
        $this->bussiness_details = $users->bussiness_details;
        $this->bussiness_name = $users->bussiness_name;
        $this->shop_address = $users->shop_address;
        $this->location = $users->location;
        $this->contact_person = $users->contact_person;
        $this->tel_office = $users->tel_office;
        $this->mobile = $users->mobile;
        $this->bussiness_licence_number = $users->bussiness_licence_number;
        $this->gov_id = $users->gov_id;
  
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
            'phone_number' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
          
        ]);

        $validated = $this->validate([
            'bussiness_details' => ['required'],
            'bussiness_name' => ['required'],
            'shop_address' => ['required'],
            'location' => ['required'],
            'contact_person' => ['required'],
            'tel_office' => ['required'],
            'mobile' => ['required'],
            'bussiness_licence_number' => ['required'],
            'gov_id' => ['required'],
        ]);
  
        $user = User::findOrFail($this->user_id);
        $user->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'country' => $this->country,
            'address' => $this->address,
            'city' => $this->city,
          
        ]);

        $users = ServiceCenter::where('user_id',$this->user_id)->update([
            'bussiness_details' => $this->bussiness_details,
            'bussiness_name' => $this->bussiness_name,
            'shop_address' => $this->shop_address,
            'location' => $this->location,
            'contact_person' => $this->contact_person,
            'tel_office' => $this->tel_office,
            'mobile' => $this->mobile,
            'bussiness_licence_number' => $this->bussiness_licence_number,
            'gov_id' => $this->gov_id,
        ]);
  
        $this->updateMode = false;
  
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Service Center User Update Successfully!!"
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
        User::destroy($id);
    }

    public function changeStatus($id,$status)
    {
        if($status == 0)
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
  
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Service Center User Status Updated Successfully!!"
        ]);
    }
}

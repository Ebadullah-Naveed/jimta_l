<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\InvestmentPackage;
use App\Models\Subscriber;
use App\Models\Investor;
use App\Models\User;
use App\Models\Code;
use App\Models\Wallet;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;

class Home extends Component
{
    public $codesend;

    public function render()
    {
        if(auth()->user()->is_subscriber == 1)
        {
            $product = Product::where('avaliability','>',0)->limit(6)->get();
            $pc = ProductCategory::get();
            $investment = InvestmentPackage::get();
            return view('livewire.home',compact('product','pc','investment'));
        }
        else
        {
            return view('livewire.subscriber-controller');
        }
    
    }

    public function addToCart($id,$quantity)
    {
        if(Auth::check())
        {
        $product = Product::findOrFail($id);
        
        $cart = session()->get('cart', []);
  
        if($quantity != null || $quantity > 0)
        {
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $id,
                "name" => $product->title,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->product_main_image
            ];
        }
    }
        else
        {
            if(isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "id" => $id,
                    "name" => $product->title,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->product_main_image
                ];
            }
        }
        session()->put('cart', $cart);
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Product add into cart!!"
        ]);
        }

    }

    public function addToCheckout($id)
    {
        if(Auth::check())
        {
            $product = Product::findOrFail($id);
            
            $checkout = session()->get('checkout', []);
    
            if(isset($checkout[$id])) 
            {
                $checkout[$id]['quantity']++;
            } 
            else 
            {
                $checkout[$id] = 
                [
                    "id" => $id,
                    "name" => $product->title,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->product_main_image
                ];
            }
            
            session()->put('checkout', $checkout);
            return redirect()->route('checkout')->with('message', 'Product added to checkout successfully!');
        }
    }

    public function invest($id,$price)
    {
        if(Auth::check())
        {
            if(auth()->user()->is_admin == 0)
            {
                $user_confirm = User::where('id',auth()->user()->id)->first();
                $confirm = InvesterInformation::where('user_id',auth()->user()->id)->first();
                $wallet_confirm = Wallet::where('user_id',auth()->user()->id)->first();

                    if($wallet_confirm != null && $wallet_confirm['amount'] >= $price)
                    {
                            $total = $wallet_confirm['amount'] - $price;
                            Wallet::where('user_id',auth()->user()->id)->update(['amount'=>$total]);
                        if($confirm == null)
                        {
                            Investor::create(['package_id'=>$id,'user_id'=>auth()->user()->id]);
                            InvesterInformation::create(['user_id'=>auth()->user()->id,'investment_amount'=>$price]);
                            User::where('id',auth()->user()->id)->update(['is_investor'=>1]);

                            $this->dispatchBrowserEvent('alert',[
                                'type'=>'success',
                                'message'=>"Successfully invested to package!!"
                            ]); 
                        }
                        else
                        {
                                Investor::create(['package_id'=>$id,'user_id'=>auth()->user()->id]);
                                $total = $confirm['investment_amount'] + $price;
                                InvesterInformation::where('user_id',auth()->user()->id)->update(['investment_amount'=>$total]);
                                User::where('id',auth()->user()->id)->update(['is_investor'=>1]);
                    
                                $this->dispatchBrowserEvent('alert',[
                                    'type'=>'success',
                                    'message'=>"Successfully invested to package!!"
                                ]); 
                        }
                    }
                        else
                        {
                            $this->dispatchBrowserEvent('alert',[
                                'type'=>'warning',
                                'message'=>"Insufficient Balance!!"
                            ]); 
                        }
            }
            else
            {
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'warning',
                    'message'=>"Admin cannot Invest!!"
                ]); 
            }
        }
        else
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'warning',
                'message'=>"Please Login to continue!!"
            ]); 
        }
    }

    public function subscribe($id)
    {
        
        $this->dispatchBrowserEvent('alert',[
            'type'=>'warning',
            'message'=>"No Payment Option Avaliable!!"
        ]); 
    }

    public function subscribeCode()
    {
        if(Auth::check())
        {
            $confirm = Subscriber::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
            $user_confirm = User::where('id',auth()->user()->id)->first();
            $code_confirm = Code::where('code',$this->codesend)->where('status',1)->first(); 
            $ref_id = User::where('id',auth()->user()->id)->value('referrer_of');
            if($code_confirm != null)
            {
                if($code_confirm['level'] == 2)
                {
                    Subscriber::where('user_id',auth()->user()->id)->update(['subscription_id'=>$code_confirm['level']]);
                    Code::where('code',$this->codesend)->update(['status'=>0]); 
                    User::where('id',auth()->user()->id)->update(['level'=>2,'is_subscriber'=>1]);
                    if($ref_id != null || $ref_id != 0)
                    {
                       $ref_add = Wallet::where('user_id',$ref_id)->first();
                       if($ref_add != null)
                       {
                            $tot_ref = $ref_add['amount'] + 10;
                            $ref_added = Wallet::where('user_id',$ref_id)->update(['amount'=>$tot_ref]);
                            ReferalLog::create(['user'=>$ref_id,'referal'=>auth()->user()->id,'amount'=>10,'type'=>"Subscription Bonus",'message'=>"Successfull"]);
                       }
                       else
                       {
                            $ref_added = Wallet::create(['user_id'=>$ref_id,'amount'=>10]);
                            ReferalLog::create(['user'=>$ref_id,'referal'=>auth()->user()->id,'amount'=>10,'type'=>"Subscription Bonus",'message'=>"Successfull"]);
                       }
                    }
                    else
                    {
                        ReferalLog::create(['user'=>$ref_id,'referal'=>auth()->user()->id,'amount'=>0,'type'=>"Subscription Bonus",'message'=>"Referal ID = {$ref_id}, if referal ID is not null/Empty please trasnfer 10 Wallet Point manually"]);
                    }

                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'success',
                        'message'=>"Successfully Subscribered to package!!"
                    ]); 

                    return redirect()->route('congrate');
                
            }
            else
            {
                Subscriber::create(['user_id'=>auth()->user()->id,'subscription_id'=>$code_confirm['level']]);
                Code::where('code',$this->codesend)->update(['status'=>0]); 
                User::where('id',auth()->user()->id)->update(['level'=>1,'is_subscriber'=>1]);
                if($ref_id != null || $ref_id != 0)
                {
                   $ref_add = Wallet::where('user_id',$ref_id)->first();
                   if($ref_add != null)
                   {
                        $tot_ref = $ref_add['amount'] + 2;
                        $ref_added = Wallet::where('user_id',$ref_id)->update(['amount'=>$tot_ref]);
                        ReferalLog::create(['user'=>$ref_id,'referal'=>auth()->user()->id,'amount'=>2,'type'=>"Subscription Bonus",'message'=>"Successfull"]);
                   }
                   else
                   {
                        $ref_added = Wallet::create(['user_id'=>$ref_id,'amount'=>2]);
                        ReferalLog::create(['user'=>$ref_id,'referal'=>auth()->user()->id,'amount'=>2,'type'=>"Subscription Bonus",'message'=>"Successfull"]);
                   }
                }
                else
                {
                    ReferalLog::create(['user'=>$ref_id,'referal'=>auth()->user()->id,'amount'=>0,'type'=>"Subscription Bonus",'message'=>"Referal ID = {$ref_id}, if referal ID is not null/Empty please trasnfer 2 Wallet Point manually"]);
                }
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'success',
                    'message'=>"Successfully Subscribered to package!!"
                ]); 
                return redirect()->route('congrate');

            }
        }
        else
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'warning',
                'message'=>"Invalid Code!!"
            ]); 
        }
        }
        else
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'warning',
                'message'=>"Please Login to continue!!"
            ]); 
        }

    }
}

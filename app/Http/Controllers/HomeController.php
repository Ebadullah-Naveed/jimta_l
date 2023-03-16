<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JimtaCoins;
use App\Models\OrderItem;
use App\Models\PaymentDetail;
use App\Models\Product;
use App\Models\Orderdetails;
use App\Models\Wallet;
use App\Models\Ordertodelivery;
use App\Models\ServiceCenterBonus;
use App\Models\ServiceCenter;
use App\Models\ReferalBonus;
use App\Models\ReferalLog;
use App\Models\User;
use App\Models\InvestmentLog;
use Illuminate\Support\Str;
use App\Models\{InvesterInformation,Notification,PvWallet};
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function  congrate()
    {
        return view("congrate");
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function walletCheckout($amounts,$delivery)
    {
        \DB::beginTransaction();
        try
        {
        $wallet = JimtaCoins::where('user_id',auth()->user()->id)->value('balance');
        if($delivery != "undefined")
        {
            if($delivery != 0)
            {
      
            $amount = $amounts + $delivery;

        if(session('checkout') != null)
        {
            if($wallet >= $amount)
            {
                $left = $wallet - $amount;
                
                JimtaCoins::where('user_id',auth()->user()->id)->update(['balance'=>$left]);

                $odd = Orderdetails::create(['user_id'=>auth()->user()->id,'total'=>$amount,'delivery'=>"Home Delivery"]);

                $order_id = Orderdetails::where('user_id',auth()->user()->id)->orderBy('id','desc')->limit(1)->value('id');

                foreach(session('checkout') as $id => $details)
                {
                    OrderItem::create(['order_id'=>$order_id,'product_id'=>$details['id'],'quantity'=>$details['quantity'],'provider'=>"Wallet",'status'=>1]);
                    $ava = Product::where('id',$details['id'])->value('avaliability');
                    $ava_tot = $ava - $details['quantity'];
                    Product::where('id',$details['id'])->update(['avaliability'=>$ava_tot]);
                }

                PaymentDetail::create(['order_id'=>$order_id,'amount'=>$amount,'provider'=>"Wallet",'status'=>1]);

                $payment_id = PaymentDetail::where('order_id',$order_id)->orderBy('id','desc')->limit(1)->value('id');

                Orderdetails::where('id',$order_id)->update(['payment_id'=>$payment_id]);

                $lef_jc = JimtaCoins::where('user_id',auth()->user()->id)->value('balance');

                $fiveP = $lef_jc + ((5/100)*$amounts);

                ReferalLog::create(['user'=>auth()->user()->id,'referal'=>null,'amount'=>0,'type'=>"Product Order Shoping point",'message'=>"Order ID = {$odd->id},{$lef_jc} + ((5/100)*{$amounts}) = {$fiveP}"]);

                JimtaCoins::where('user_id',auth()->user()->id)->update(['balance'=>$fiveP]);

                $first_ref = ReferalBonus::where('referrer_id',auth()->user()->id)->value('user_id');

                $second_ref = ReferalBonus::where('referrer_id',$first_ref)->value('user_id');

                $third_ref = ReferalBonus::where('referrer_id',$second_ref)->value('user_id');

                $forth_ref = ReferalBonus::where('referrer_id',$third_ref)->value('user_id');

                $refArray = [auth()->user()->id,$first_ref,$second_ref,$third_ref,$forth_ref];

                $pv = $amounts * 0.8;

                foreach($refArray as $pvValue)
                {
                    $pvWallet = PvWallet::where('user_id',$pvValue)->value('balance');
                    dd($pvWallet);
                    $totalPv = $pv + $pvWallet;
                    PvWallet::where('user_id',$pvValue)->update(['balance'=>$totalPv]);
                }

                if($first_ref != null)
                {
                    $first_ref_bonus = JimtaCoins::where('user_id',$first_ref)->value('balance');
                    if($first_ref_bonus != null)
                    {
                        $first_ref_total = $first_ref_bonus + ((5/100)*$amounts);
                        JimtaCoins::where('user_id',$first_ref)->update(['balance'=>$first_ref_total]);
                        Notification::create(['user_id'=>$first_ref,'message'=>'You have received '.(5/100)*$amounts.' shopping points']);
                        ReferalLog::create(['user'=>$first_ref,'referal'=>auth()->user()->id,'amount'=>$first_ref_total,'type'=>"Product Order Shoping point",'message'=>"Order ID = {$odd->id},{$first_ref_total} = {$first_ref_bonus} + ((5/100)*{$amounts})"]);
                    }
                    else
                    {
                        $first_ref_total = ((5/100)*$amounts);
                        JimtaCoins::create(['user_id'=>$first_ref,'balance'=>$first_ref_total]);
                        Notification::create(['user_id'=>$first_ref,'message'=>'You have received '.(5/100)*$amounts.' shopping points']);
                        ReferalLog::create(['user'=>$first_ref,'referal'=>auth()->user()->id,'amount'=>$first_ref_total,'type'=>"Product Order Shoping point",'message'=>"Order ID = {$odd->id},$first_ref_total = ((5/100)*$amounts)"]);
                    }
                }

                if($second_ref != null)
                {
                    $second_ref_bonus = JimtaCoins::where('user_id',$second_ref)->value('balance');
                    if($second_ref_bonus != null)
                    {
                        $second_ref_total = $second_ref_bonus + ((2/100)*$amounts);
                        JimtaCoins::where('user_id',$second_ref)->update(['balance'=>$second_ref_total]);
                        Notification::create(['user_id'=>$second_ref,'message'=>'You have received '.(2/100)*$amounts.' shopping points']);

                        ReferalLog::create(['user'=>$second_ref,'referal'=>auth()->user()->id,'amount'=>$second_ref_total,'type'=>"Product Order Shoping point",'message'=>"Order ID = {$odd->id},{$second_ref_total} = {$second_ref_bonus} + ((2/100)*{$amounts})"]);

                    }
                    else
                    {
                        $second_ref_total = ((2/100)*$amounts);
                        JimtaCoins::create(['user_id'=>$second_ref,'balance'=>$second_ref_total]);
                        Notification::create(['user_id'=>$second_ref,'message'=>'You have received '.(2/100)*$amounts.' shopping points']);

                        ReferalLog::create(['user'=>$second_ref,'referal'=>auth()->user()->id,'amount'=>$second_ref_total,'type'=>"Product Order Shoping point",'message'=>"Order ID = {$odd->id},$second_ref_total = ((2/100)*$amounts)"]);
                    }
                }

                if($third_ref != null)
                {
                    $third_ref_bonus = JimtaCoins::where('user_id',$third_ref)->value('balance');
                    if($third_ref_bonus != null)
                    {
                        $third_ref_total = $third_ref_bonus + ((1.5/100)*$amounts);
                        JimtaCoins::where('user_id',$third_ref)->update(['balance'=>$third_ref_total]);
                        Notification::create(['user_id'=>$third_ref,'message'=>'You have received '.(1.5/100)*$amounts.' shopping points']);

                        ReferalLog::create(['user'=>$third_ref,'referal'=>auth()->user()->id,'amount'=>$third_ref_total,'type'=>"Product Order Shoping point",'message'=>"Order ID = {$odd->id},{$third_ref_total} = {$third_ref_bonus} + ((1.5/100)*{$amounts})"]);

                    }
                    else
                    {
                        $third_ref_total = ((1.5/100)*$amounts);
                        JimtaCoins::create(['user_id'=>$third_ref,'balance'=>$third_ref_total]);
                        Notification::create(['user_id'=>$third_ref,'message'=>'You have received '.(1.5/100)*$amounts.' shopping points']);

                        ReferalLog::create(['user'=>$third_ref,'referal'=>auth()->user()->id,'amount'=>$third_ref_total,'type'=>"Product Order Shoping point",'message'=>"Order ID = {$odd->id},$third_ref_total = ((1.5/100)*$amounts)"]);

                    }
                }

                if($forth_ref != null)
                {
                    $forth_ref_bonus = JimtaCoins::where('user_id',$forth_ref)->value('balance');
                    if($forth_ref_bonus != null)
                    {
                        $forth_ref_total = $forth_ref_bonus + ((1.5/100)*$amounts);
                        JimtaCoins::where('user_id',$forth_ref)->update(['balance'=>$forth_ref_total]);
                        Notification::create(['user_id'=>$forth_ref,'message'=>'You have received '.(1.5/100)*$amounts.' shopping points']);

                        ReferalLog::create(['user'=>$forth_ref,'referal'=>auth()->user()->id,'amount'=>$forth_ref_total,'type'=>"Product Order Shoping point",'message'=>"Order ID = {$odd->id},{$forth_ref_total} = {$forth_ref_bonus} + ((1.5/100)*{$amounts})"]);

                    }
                    else
                    {
                        $forth_ref_total = ((1.5/100)*$amounts);
                        JimtaCoins::create(['user_id'=>$forth_ref,'balance'=>$forth_ref_total]);
                        Notification::create(['user_id'=>$forth_ref,'message'=>'You have received '.(1.5/100)*$amounts.' shopping points']);

                        ReferalLog::create(['user'=>$forth_ref,'referal'=>auth()->user()->id,'amount'=>$forth_ref_total,'type'=>"Product Order Shoping point",'message'=>"Order ID = {$odd->id},$forth_ref_total = ((1.5/100)*$amounts)"]);

                    }
                }

                session()->forget('checkout');

                $order = Orderdetails::where('id',$odd->id)->with('orderItem','user')->first(); 

                return redirect()->back()->with('success','Order created successfully');
            }
            else
            {
                return redirect()->back()->with('warning','Insufficent Balance');
            }
        }
        else
        {
            return redirect()->back()->with('warning','Nothing to checkout');
        }
    }
    else
    {
        if(session('checkout') != null)
        {
           
            if($wallet >= $amounts)
            {   

                $left = $wallet - $amounts;

                JimtaCoins::where('user_id',auth()->user()->id)->update(['balance'=>$left]);

                $odd = Orderdetails::create(['user_id'=>auth()->user()->id,'total'=>$amounts,'delivery'=>"Service Center"]);

                $order_id = Orderdetails::where('user_id',auth()->user()->id)->orderBy('id','desc')->limit(1)->value('id');

                foreach(session('checkout') as $id => $details)
                {
                    OrderItem::create(['order_id'=>$order_id,'product_id'=>$details['id'],'quantity'=>$details['quantity'],'provider'=>"Wallet",'status'=>1]);
                    $ava = Product::where('id',$details['id'])->value('avaliability');
                    $ava_tot = $ava - $details['quantity'];
                    Product::where('id',$details['id'])->update(['avaliability'=>$ava_tot]);
                }

                PaymentDetail::create(['order_id'=>$order_id,'amount'=>$amounts,'provider'=>"Wallet",'status'=>1]);

                $payment_id = PaymentDetail::where('order_id',$order_id)->orderBy('id','desc')->limit(1)->value('id');

                Orderdetails::where('id',$order_id)->update(['payment_id'=>$payment_id]);

                Ordertodelivery::create(['user_id'=>auth()->user()->service_center_id,'order_id'=>$order_id,'orderer_id'=>auth()->user()->id,'verification_code'=>Str::random(15),'status'=>'Pending']);

                $s_id = ServiceCenter::where('id',auth()->user()->service_center_id)->value('user_id');

                $sb = Wallet::where('user_id',$s_id)->value('amount');

                $sc = JimtaCoins::where('user_id',$s_id)->value('balance');

                $commission = (5/100)*$amounts;

                $tot = $commission + $sb;
                Wallet::where('user_id',$s_id)->update(['amount'=>$tot]);
                ReferalLog::create(['user'=>$s_id,'referal'=>auth()->user()->id,'amount'=>$commission,'type'=>"Service Center Commission wallet",'message'=>"Order ID = {$odd->id},$commission"]);

                $tot = $commission + $sc;
                JimtaCoins::where('user_id',$s_id)->update(['balance'=>$tot]);
                ReferalLog::create(['user'=>$s_id,'referal'=>auth()->user()->id,'amount'=>$commission,'type'=>"Service Center Commission jimta coin",'message'=>"Order ID = {$odd->id},$commission"]);

                $lef_jc = JimtaCoins::where('user_id',auth()->user()->id)->value('balance');

                $ref_ear = (5/100)*$amounts;
                $fiveP = $lef_jc + ($ref_ear);

                ReferalLog::create(['user'=>auth()->user()->id,'referal'=>null,'amount'=>$ref_ear,'type'=>"Product Order Shoping point",'message'=>"Order ID = {$odd->id} , {$lef_jc} + ((5/100)*{$amounts}) = {$fiveP}"]);

                JimtaCoins::where('user_id',auth()->user()->id)->update(['balance'=>$fiveP]);

                $first_ref = ReferalBonus::where('referrer_id',auth()->user()->id)->value('user_id');

                $second_ref = ReferalBonus::where('referrer_id',$first_ref)->value('user_id');

                $third_ref = ReferalBonus::where('referrer_id',$second_ref)->value('user_id');

                $forth_ref = ReferalBonus::where('referrer_id',$third_ref)->value('user_id');

                $refArray = [auth()->user()->id,$first_ref,$second_ref,$third_ref,$forth_ref];

                $pv = $amounts * 0.8;

                foreach($refArray as $pvValue)
                {
                    if($pvValue != null)
                    {
                        $pvWallet = PvWallet::where('user_id',$pvValue)->value('balance');
                        $totalPv = $pv + $pvWallet;
                        PvWallet::updateOrCreate(
                            ['user_id' =>  $pvValue],
                            ['balance' => $totalPv]
                        );    
                        ReferalLog::create(['user'=>$pvValue,'referal'=>auth()->user()->id,'amount'=>$pv,'type'=>"PV points",'message'=>"Order ID = {$odd->id}"]);
                
                    }
                }

                if($first_ref != null)
                {
                    $first_ref_bonus = JimtaCoins::where('user_id',$first_ref)->value('balance');
                    $ref_e = (5/100)*$amounts;
                    if($first_ref_bonus != null)
                    {
                        $ref_e = (5/100)*$amounts;
                        $first_ref_total = $first_ref_bonus + ($ref_e);
                        JimtaCoins::where('user_id',$first_ref)->update(['balance'=>$first_ref_total]);
                        Notification::create(['user_id'=>$first_ref,'message'=>'You have received '.$ref_e.' shopping points']);

                        ReferalLog::create(['user'=>$first_ref,'referal'=>auth()->user()->id,'amount'=>$ref_e,'type'=>"Product Order Shoping point",'message'=>"Order ID = {$odd->id},{$first_ref_total} = {$first_ref_bonus} + ((5/100)*{$amounts})"]);
                    }
                    else
                    {
                        ReferalLog::create(['user'=>$first_ref,'referal'=>auth()->user()->id,'amount'=>$ref_e,'type'=>"Product Order Shoping point",'message'=>"Wallet doesn't exist {$first_ref}"]);
                    }
                }

                if($second_ref != null)
                {
                    $second_ref_bonus = JimtaCoins::where('user_id',$second_ref)->value('balance');
                    if($second_ref_bonus != null)
                    {
                        $second_ref_total = $second_ref_bonus + ((2/100)*$amounts);
                        JimtaCoins::where('user_id',$second_ref)->update(['balance'=>$second_ref_total]);
                        Notification::create(['user_id'=>$second_ref,'message'=>'You have received '.(2/100)*$amounts.' shopping points']);

                        ReferalLog::create(['user'=>$second_ref,'referal'=>auth()->user()->id,'amount'=>(2/100)*$amounts,'type'=>"Product Order Shoping point",'message'=>"Order ID = {$odd->id},{$second_ref_total} = {$second_ref_bonus} + ((2/100)*{$amounts})"]);

                    }
                    else
                    {
                        ReferalLog::create(['user'=>$second_ref,'referal'=>auth()->user()->id,'amount'=>(2/100)*$amounts,'type'=>"Product Order Shoping point",'message'=>"Wallet doesn't exist {$second_ref}"]);
                    }
                }

                if($third_ref != null)
                {
                    $third_ref_bonus = JimtaCoins::where('user_id',$third_ref)->value('balance');
                    if($third_ref_bonus != null)
                    {
                        $third_ref_total = $third_ref_bonus + ((1.5/100)*$amounts);
                        JimtaCoins::where('user_id',$third_ref)->update(['balance'=>$third_ref_total]);
                        Notification::create(['user_id'=>$third_ref,'message'=>'You have received '.(1.5/100)*$amounts.' shopping points']);

                        ReferalLog::create(['user'=>$third_ref,'referal'=>auth()->user()->id,'amount'=>(1.5/100)*$amounts,'type'=>"Product Order Shoping point",'message'=>"Order ID = {$odd->id},{$third_ref_total} = {$third_ref_bonus} + ((1.5/100)*{$amounts})"]);

                    }
                    else
                    {
                        ReferalLog::create(['user'=>$third_ref,'referal'=>auth()->user()->id,'amount'=>(1.5/100)*$amounts,'type'=>"Product Order Shoping point",'message'=>"Wallet doesn't exist {$third_ref}"]);

                    }
                }

                if($forth_ref != null)
                {
                    $forth_ref_bonus = JimtaCoins::where('user_id',$forth_ref)->value('balance');
                    if($forth_ref_bonus != null)
                    {
                        $forth_ref_total = $forth_ref_bonus + ((1.5/100)*$amounts);
                        JimtaCoins::where('user_id',$forth_ref)->update(['balance'=>$forth_ref_total]);
                        Notification::create(['user_id'=>$forth_ref,'message'=>'You have received '.(1.5/100)*$amounts.' shopping points']);

                        ReferalLog::create(['user'=>$forth_ref,'referal'=>auth()->user()->id,'amount'=>(1.5/100)*$amounts,'type'=>"Product Order Shoping point",'message'=>"Order ID = {$odd->id},{$forth_ref_total} = {$forth_ref_bonus} + ((1.5/100)*{$amounts})"]);
                    }
                    else
                    {
                        ReferalLog::create(['user'=>$forth_ref,'referal'=>auth()->user()->id,'amount'=>(1.5/100)*$amounts,'type'=>"Product Order Shoping point",'message'=>"Wallet doesn't exist {$forth_ref}"]);

                    }
                }

                $referal_bonus = User::where('referrer_of',auth()->user()->id)->get();

                foreach($referal_bonus as $rb)
                {
                    $referal_bonus_user = User::where('referrer_of',$rb->id)->where('level',2)->count();
                    if($referal_bonus_user > 4)
                    {
                        $rbc = JimtaCoins::where('user_id',$rb->id)->value('balance');
                        $rbct = $rbc + ((1/100)*$amounts);
                        JimtaCoins::where('user_id',$rb->id)->update(['balance'=>$rbct]);
                        Notification::create(['user_id'=>$rb->id,'message'=>'You have received '.(1/100)*$amounts.' shopping points']);

                        ReferalLog::create(['user'=>$rb->id,'referal'=>auth()->user()->id,'amount'=>(1/100)*$amounts,'type'=>"Product Order Shoping point",'message'=>"Order ID = {$odd->id},{$rbct} = {$rbc} + ((1/100)*{$amounts})"]);
                    }
                    else if($referal_bonus_user > 9)
                    {
                        $rbc = JimtaCoins::where('user_id',$rb->id)->value('balance');
                        $rbct = $rbc + ((2/100)*$amounts);
                        JimtaCoins::where('user_id',$rb->id)->update(['balance'=>$rbct]);
                        Notification::create(['user_id'=>$rb->id,'message'=>'You have received '.(2/100)*$amounts.' shopping points']);

                        ReferalLog::create(['user'=>$rb->id,'referal'=>auth()->user()->id,'amount'=>(2/100)*$amounts,'type'=>"Product Order Shoping point",'message'=>"Order ID = {$odd->id},{$rbct} = {$rbc} + ((2/100)*{$amounts})"]);
                    }
                    else if($referal_bonus_user > 14)
                    {
                        $rbc = JimtaCoins::where('user_id',$rb->id)->value('balance');
                        $rbct = $rbc + ((3/100)*$amounts);
                        JimtaCoins::where('user_id',$rb->id)->update(['balance'=>$rbct]);
                        Notification::create(['user_id'=>$rb->id,'message'=>'You have received '.(3/100)*$amounts.' shopping points']);

                        ReferalLog::create(['user'=>$rb->id,'referal'=>auth()->user()->id,'amount'=>(3/100)*$amounts,'type'=>"Product Order Shoping point",'message'=>"Order ID = {$odd->id},{$rbct} = {$rbc} + ((3/100)*{$amounts})"]);
                    }
                }
                Notification::create(['user_id'=>auth()->user()->id,'message'=>'Your order was created successfully']);
                \DB::commit();
                session()->forget('checkout');

                // $order = Orderdetails::where('id',$odd->id)->with('orderItem','user')->first(); 

                return redirect()->back()->with('success','Order created successfully');
            }
            else
            {
                return redirect()->back()->with('warning','Insufficent Balance');
            }
    }
    }
}
    else
    {
        return redirect()->back()->with('warning','No Delivery Option Selected');

    }
        }
        catch(\Exception $e)
        {
            \DB::rollback();
            ReferalLog::create(['user'=>auth()->user()->id,'referal'=>null,'amount'=>null,'type'=>"Product Order Shoping point",'message'=>$e->getMessage()]);

            return redirect()->back()->with('warning','Something went wronge please contact site admin with User Id');
        }
    }


    public function investReturn(Request $request)
    {
        try
        {
            $now = Carbon::now();
            $next_day = Carbon::now()->addDays(1);
            $end_invest = Carbon::now()->addMonths(18);
            $expire_investment = InvesterInformation::where('end_date','<=',$now->toDateString())->get('id');
            InvesterInformation::whereIn('id',$expire_investment)->update(['status'=>0]);

            $investment = InvesterInformation::where('status',1)->where('withdraw_at',$now->toDateString())->get();
            foreach($investment as $invest)
            {
                $return = ($invest->investment_amount * (80/100)) + $invest->investment_amount;
                $per_day_return = $return/547;
                $total = round($per_day_return, 2);
                $user_jc = JimtaCoins::where('user_id',$invest->user_id)->first();
                JimtaCoins::where('user_id',$invest->user_id)->update(['balance'=>$total+$user_jc->balance]);
                InvesterInformation::where('id',$invest->id)->update(['withdraw_at'=>$next_day]);
                InvestmentLog::create(['user_id'=>$invest->user_id,'days'=>"1",'amount_receive'=>$total]);
            }
            return "Done";
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function investmentReturnAfterMistake(){
        try{
            $now = Carbon::now();
            $next_day = Carbon::now()->addDays(1);
            $end_invest = Carbon::now()->addMonths(18);
            $expire_investment = InvesterInformation::where('end_date','<=',$now->toDateString())->get('id');
            InvesterInformation::whereIn('id',$expire_investment)->update(['status'=>0]);

            $investment = InvesterInformation::where('status',1)->get();
            foreach($investment as $invest)
            {
                $daysGap = Carbon::now()->diffInDays(Carbon::parse($invest->withdraw_at));
                $return = ($invest->investment_amount * (80/100)) + $invest->investment_amount;
                $per_day_return = $return/547;
                $total = (round($per_day_return, 2)) * $daysGap;
                $user_jc = JimtaCoins::where('user_id',$invest->user_id)->first();
                JimtaCoins::where('user_id',$invest->user_id)->update(['balance'=>$total+$user_jc->balance]);
                InvesterInformation::where('id',$invest->id)->update(['withdraw_at'=>$next_day]);
                InvestmentLog::create(['user_id'=>$invest->user_id,'days'=>$daysGap,'amount_receive'=>$total]);

            }
            return "Done";
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }


}

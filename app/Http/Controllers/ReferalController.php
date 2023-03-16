<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReferalBonus;
use App\Models\User;

class ReferalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function referrerReg($id)
    {
        $user = User::where('id',auth()->user()->id)->first();
        $ouser = User::where('id',$id)->value('is_subscriber');
        $bonus = ReferalBonus::value('referrer_id');
        $refbonus = array($bonus);
        if($id != $user->id)
        {
            if($user->referrer_of == null)
            {
                if($ouser == 1)
                {
                    User::where('id',auth()->user()->id)->update(['referrer_of' => $id]);
                    if (in_array($id, $refbonus))
                    {
                        ReferalBonus::create(['user_id' => $id,'referrer_id' => auth()->user()->id,'bonus_percentage' => 5]);
                        $user_in_ref = ReferalBonus::where('referrer_id',$id)->value('user_id');
                        $refbonusc = ReferalBonus::where('user_id',$user_in_ref)->where('referrer_id',$id)->value('bonus_percentage');
                        if($refbonusc <= 7.5)
                        {
                            $cal = $refbonusc + 2.5;
                            ReferalBonus::where('user_id',$user_in_ref)->where('referrer_id',$id)->update(['bonus_percentage' => $cal]);
                        }
                        return redirect()->route('subscriberf');
                    }
                    else
                    {
                        ReferalBonus::create(['user_id' => $id,'referrer_id' => auth()->user()->id,'bonus_percentage' => 5]);
                        return redirect()->route('subscriberf');
                    }   
                }
                else
                {
                    abort(403, 'Invalid Url');
                }
            }
            else
            {
                abort(403, 'Already Referrer Of Someone');
            }
        }
        else
        {
            abort(403, 'Cant Refer yourself');
        }
    }

}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated()
    {
        if (auth()->user()->status == 0) {
            Auth::logout();
    
            return redirect('/login')->with('message','Your account is not approved.');
        }
        elseif(auth()->user()->is_subscriber == 0)
        {
            return redirect('/subscribe/package')->with('message','Please Subscribe to package to verify your account.');
        }
        else
        {
        if ( auth()->user()->is_admin == 1 ||  auth()->user()->is_service_center == 1 ) {
            return redirect()->route('dashboard');
        }
        else
        {
            return redirect()->route('home');
        }

        return redirect('/admin/dashboard');
        }
    }
}

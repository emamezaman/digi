<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/';
    protected $maxAttempts = 5;
    protected $decayMinutes = 2;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'username';
    }

    public function redirectTo(){
        $role = Auth::user()->role;
        if($role == 'admin'){
           return 'admin';
        }else{
           return '/';

        }
    }

    // public function login(LoginRequest $request)
    // {
    //     if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
    //         return redirect()->intended('dashboard');
    //    } elseif (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
    //        return redirect()->intended('dashboard');
    //     } else {
    //       return redirect()->intended('login');
    //    }
    // }


}

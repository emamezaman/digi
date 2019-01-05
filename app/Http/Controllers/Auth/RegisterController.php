<?php

namespace App\Http\Controllers\Auth;


use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
class RegisterController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    //وقتی رجیستر کردی به این روت میری
    public function redirectTo(){
        return '/';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)

    {
        return Validator::make($data, [
             'username' => 'required|string|max:255|check_username|unique_username',
             'password' => 'required|string|min:6|confirmed',
             'captcha' => 'required|captcha',
        ],[
            'check_username'=>':attribute معتبر نیست' ,
            'unique_username'=>':attribute قبلا ثبت شده است .', 
            'captcha'=>'کد امنیتی وارد شده  اشتباه  می باشد' 
            ,'required'=>':attribute نمی تواند خالی باشد',
            'confirmed'=>' تکرار :attribute اشتباه است' ,
        ] ,[

            'captcha'=>'کد امنیتی ',
            'username'=>'پست الکترونیک یا شماره موبایل',
            'password'=>'گذرواژه ', 
               
       ]);

        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'role' => 'user',
            //'active_user' => true,
            'password' => Hash::make($data['password']),
        ]);


    }
}

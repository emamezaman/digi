<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      $array=array();
      $array['username']=>'required',
      $array['password']=>'required',
      return $array;
    }
    public function attributes(){
      return [
        'username'=>'نام کاربری',
        'password'=>'گذر واژه'
      ];
    }
}

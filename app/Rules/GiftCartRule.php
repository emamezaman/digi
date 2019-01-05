<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class GiftCartRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $t = explode('/', $value);
         settype($t[0],'integer');
         settype($t[1],'integer');
         settype($t[2],'integer');
        if(sizeof($t)==3){
             
             if(is_int($t[0])){

                if($t[1]>=1 && $t[1]<=12 ){
                   
                   if(is_int($t[2])){
                      
                      if($t[2]>=1 && $t[2]<=31){
                        return true;
                      }

                   }else{
                    return false;
                   }
                }else{
                    return false;
                }

             }else{
                return false;
             }

        }else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'تاریخ وارد شده نامعتبر هست.';
    }
}

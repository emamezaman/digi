<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\GiftCartRule;
class GiftCartRequest extends FormRequest
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
        $rules = array();
        $rules['user_id'] = ['required'] ;
        $rules['value']   = ['required','numeric'] ;
        $rules['date']    = ['required',new GiftCartRule()] ;

        return $rules;
    }
     public function attributes()
    {
        return [
            'user_id'=>'کاربر',
            'value'=>'مقدار تخفیف بر حسب تومان',
            'date'=>'مدت زمان کارت',
        ];
    }
     public function messages()
    {
        return [
            'require'=>'پر کردن :attribute الزامی است',
            'numeric'=>' :attribute باید عددی باشد',
            
        ];
    }
}

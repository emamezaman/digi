<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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
        $rules['code'] = 'required' ;
        $rules['value'] = ['required','numeric'] ;
        $rules['time_code'] = ['nullable','numeric'] ;

        return $rules;
    }
     public function attributes()
    {
        return [
            'code'=>'کد تخفیف',
            'value'=>'مقدار تخفیف بر حسب درصد',
            'time_code'=>'مدت زمان تخفیف',
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

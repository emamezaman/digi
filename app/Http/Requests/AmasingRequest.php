<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AmasingRequest extends FormRequest
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
        
            return [
        'm_title' =>'bail|required|min:2|max:255',
        'product_id' =>'required',
        'price1' =>'required|integer',
        'price2' =>'required|integer',
        'time' =>'required|integer',
        'tozihat' =>'required',
        ];
        
    }

    public function attributes(){
        return [
        'm_title'=>'عنوانک',
        'product_id'=>'عنوان محصول',
        'price1'=>'قیمت اصلی محصول',
        'price2'=>'قیمت شگفت انگیز',
        'time'=>'مدت زمان شگفت انگیز بودن',
        'tozihat'=>'توضیحات',
        ];
    }
    public function messages(){
        return [
        'required'=>':attribute نمیتواند خالی باشد',
        'integer'=>':attribute باید از نوع عدد باشد',
       
        ];
    }
}

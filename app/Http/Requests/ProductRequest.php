<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $discounts = $this->discounts;
        $array = [
        'title' =>'bail|required|min:3|max:191',
        'code' =>'bail|required|min:3|max:191',
        'cat' =>'required',
        'price' =>'bail|required|integer',
         'product_number' =>'bail|required|numeric',
         'bon' =>'bail|nullable|numeric',
         'text' =>'bail|nullable',
         'description' =>'bail|nullable',
         'like'=>'nullable|numeric',
         'deslike'=>'nullable|numeric',
        ];
        if(!empty($discounts)){
             $array['discounts'] ='integer';   
        }
        return $array;
       
    }
        
    public function attributes(){
        return [
            'title' =>'نام محصول',
            'code' =>'نام لاتین محصول',
            'cat' =>'دسته',
            'price' =>'هزینه محصول',
            'discounts'=>'تخفیف',
            'product_number'=>'تعداد محصول',
            'bon'=>'تعداد بن خرید محصول',
            'product_number'=>'تعداد محصول',
            'text'=>'توضیحات محصول',
            'description'=>'توضیحات محصول',
            'product_number'=>'تعداد محصول',


        ];
    }
    public function messages(){
        return [
        'required' =>'پر کردن :attribute الزامی است',
        'min' =>'تعداد کاراکتر :attribute نباید کمتر از :min باشد',
        'max' =>'تعداد کاراکتر :attribute نباید بیشتر از :max باشد',
        'integer'=>':attribute را با عدد وارد نمائید',
        'numeric'=>':attribute را با عدد وارد نمائید',
        // 'image.max' =>'اندازه تصویر نباید بیشتر از :max کیلو بایت باشد',
        // 'mimes'=>'فایل با پسوند JPG,PNG,JPEG انتخاب نمادید',
        // 'unique' =>'نام لاتین دسته نمیتواند تکراری باشد'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
       if($this->isMethod('post')){
          return [
        'title' =>'bail|required|min:3|max:191',
        'url'   =>'bail|required|min:3|max:191|url|unique:slider',      
        'image' =>'bail|required|max:2024|mimes:jpg,jpeg,png',
        ];
       }else{
           return [
        'title' =>'bail|required|min:3|max:191',
        'url'   =>'unique:slider,url,'.$this->id.'',
        'url'   =>'bail|required|min:3|max:191|url',      
        'image' =>'bail|nullable|max:2024|mimes:jpg,jpeg,png',
        ];
       }
    }
        
    public function attributes(){
        return [
            'title' =>'عنوان اسلایدر',
            'url' => 'مسیر اسلایدر',
            'image' =>'تصویر اسلایدر',
            
        ];
    }
    public function messages(){
        return [
        'required' =>'پر کردن :attribute الزامی است',
        'max' =>'تعداد کاراکتر :attribute نباید بیشتر از :value باشد',
        'min' =>'تعداد کاراکتر :attribute نباید کمتر از :value باشد',
        'image.max' =>'اندازه تصویر نباید بیشتر از :max کیلو بایت باشد',
        'mimes'=>'فایل با پسوند JPG,PNG,JPEG انتخاب نمادید',
        'unique' =>'مسیر اسلایدر نمیتواند تکراری باشد',
        'url' =>'آدر اینترنتی معتبری وارد نمائید'
        ];
    }
}
        

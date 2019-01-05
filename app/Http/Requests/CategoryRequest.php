<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $array =  [
        'title_fa' =>'bail|required|min:2|max:255',
        
        'parent_id' =>'required',
        'image' =>'bail|nullable|max:2024|mimes:jpg,jpeg,png',
        ];
        if($this->isMethod('post')){
          $array['title_en'] ='bail|required|min:2|max:255|unique:category';
        }else{
            $array['title_en'] ='bail|required|min:2|max:255|unique:category,title_en,'.$this->category.'';
        }
        return $array;
    }
        
    public function attributes(){
        return [
            'title_fa' =>'نام فارسی دسته',
            'title_en' => 'نام لاتین دسته',
            'image' =>'تصویر دسته',
            'parent_id' =>'سر دسته',
        ];
    }
    public function messages(){
        return [
        'required' =>'پر کردن :attribute الزامی است',
        'min' =>'تعداد کاراکتر :attribute نباید کمتر از :min باشد',
        'max' =>'تعداد کاراکتر :attribute نباید بیشتر از :max باشد',
        'image.max' =>'اندازه تصویر نباید بیشتر از :max کیلو بایت باشد',
        'mimes'=>'فایل با پسوند JPG,PNG,JPEG انتخاب نمادید',
        'unique' =>'نام لاتین دسته نمیتواند تکراری باشد'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Product extends FormRequest
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
           'cat_id'=>'required',
           'sub_cat_id'=>'required',
           'brand_id'=>'required',
           'title'=>'required',
           'details'=>'required',
            'price'=>'required| regex:$^[0-9]+.[0-9]+$',
            'qty'=>'required|integer',
            'sku'=>'required',
            'image'=>'required | mimes:jpg,bmp,png,svg,gif',
            'location'=>'required',
        ];
    }
}

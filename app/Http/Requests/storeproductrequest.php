<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeproductrequest extends FormRequest
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
            'name.required' => 'name must be filled',                  
            'Price.required' => 'Price is mandatory', 
            'Description.required' => 'Description is important',
            'Quantity.required' => 'Quantity is required' 
        ];
    }
}

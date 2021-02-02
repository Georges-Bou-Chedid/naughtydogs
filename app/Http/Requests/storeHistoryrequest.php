<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeHistoryrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',              
            'Description' => 'required',
            'DueDate' => 'required',
            'createuser' => 'required'
        ];
    }
}

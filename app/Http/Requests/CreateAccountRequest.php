<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateAccountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'state' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ];
    }

    public function validated()
    {
        return array_merge(parent::validated(), ['user_id' => Auth::user()->id]);
    }
}

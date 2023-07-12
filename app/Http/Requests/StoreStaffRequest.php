<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStaffRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fname'=>'required',
            'lname'=>'required',
            'nic'=>'required|unique:App\Models\Staff,nic',
            'dob'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'mobile'=>'required',
        ];
    }

    public function messages(){
        return [
            'fname.required'=>'The first Name field is required',
            'lname.required'=>'The last Name field is required',
            'nic.required'=>'The National Identity Card field is required',
            'gender.required'=>'The last Name field is required',
            'dob.required'=>'The date of birth field is required',

        ];
    }
}
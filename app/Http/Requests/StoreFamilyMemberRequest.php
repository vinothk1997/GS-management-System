<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFamilyMemberRequest extends FormRequest
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
            'nic'=>'required',
            'dob'=>'required',
            'gender'=>'required',
            'mobile'=>'required',
            'birth_c_no'=>'required',
            'relationship'=>'required',
            'school'=>'required',
            'learning_place_type'=>'required',
            'monthly_income'=>'required',
            'driving_licence_no'=>'required',
            'occupation'=>'required|notIn:-- Choose occupation --',
            'education'=>'required|notIn:-- Choose education --',
        ];
    }
    public function messages(){
        return[
            'fname.required'=>'The first name field is required.',
            'lname.required'=>'The last name field is required.',
            'nic.required'=>'The national identity card field is required.',
            'dob.required'=>'The date of birth field is required.',
            'birth_c_no.required'=>'The birth certificate number field is required.',
        ];
    }
}
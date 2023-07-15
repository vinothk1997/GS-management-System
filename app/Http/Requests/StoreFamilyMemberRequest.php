<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


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
            'nic'=>[
                Rule::unique('family_heads', 'nic'),
                Rule::unique('family_members', 'nic')],
            'dob'=>'required',
            'gender'=>'required',
            'birth_c_no'=>'required',
            'relationship'=>'required',
            'occupation'=>'notIn:N/A',
            'education'=>'notIn:N/A',
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
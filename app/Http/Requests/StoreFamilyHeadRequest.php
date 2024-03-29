<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFamilyHeadRequest extends FormRequest
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
            'nic'=>'required|unique:App\Models\FamilyHead,nic',
            'dob'=>'required',
            'gender'=>'required',
            'mobile'=>'required',
            'p_address'=>'required',
            't_address'=>'required',
            'card_type'=>'notIn:N/A',
            'internet'=>'required|notIn:N/A',
            'married_c_no'=>'unique:App\Models\FamilyHead,married_certificate_no',
            'gn_id'=>'required',
            'religion'=>'required|notIn:N/A',
            'ethnic'=>'notIn:N/A',
            'occupation'=>'notIn:N/A',
        ];
    }
    public function messages(){
        return [
            'fname.required'=>"The first name field is required.",
            'lname.required'=>"The last name field is required.",
            'nic.required'=>"The national identy card field is required.",
            'dob.required'=>"The date of birth field is required.",
            'gender.required'=>"The gender field is required.",
            'mobile.required'=>"The mobile no field is required.",
            'p_address.required'=>"The permenant address field is required.",
            't_address.required'=>"The temporary address field is required.",
            'house_no.required'=>"The house no field is required.",
            'card_type.required'=>"The card type field is required.",
            'internet.required'=>"The internet field is required.",
            'married_c_no.required'=>"The married certificate number field is required.",
            'religion.required'=>"The religion field is required.",
            'ethnic.required'=>"The ethnic field is required.",
            'occupation.required'=>"The occupation field is required.",

        ];
    }
}
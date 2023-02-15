<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrganizationRequest extends FormRequest
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
            'name'=>'required',
            'description'=>'max:100',
            'mobile'=>'nullable|min:10|integer',
            'landline'=>'required|integer'
        ];
    }

    public function messages(){
        return[
            'name.required'=>'The organization field is required.',
        ];
    }
}
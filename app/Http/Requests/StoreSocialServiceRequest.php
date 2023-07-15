<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class StoreSocialServiceRequest extends FormRequest
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
            'amount'=>'required',
            'type'=>['required',
            Rule::unique('social_services')->where(function ($query) {
                return $query->where('year', $this->input('year'))
                             ->where('type', $this->input('type'))
                             ->where('member_id', $this->input('member_id'))
                             ->where('family_id', $this->input('family_id'));
            }),
            ]

        ];
    }
    public function messages()
    {
        return [
            'type.unique'=>'A this record already inserted for this year.'
        ];
    }
}

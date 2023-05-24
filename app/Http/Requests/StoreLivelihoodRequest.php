<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLivelihoodRequest extends FormRequest
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
            // 'assist_type_id' => [Rule::unique('livelihoods')->where(function ($query) {
            //     return $query->where('family_id', request()->input('family_id'));
            // }),],
            'start_date'=>'required',
            'amount'=>'required',
        ];
    }
}

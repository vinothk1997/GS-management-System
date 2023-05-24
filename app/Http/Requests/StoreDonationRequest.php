<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonationRequest extends FormRequest
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
            'donated_date'=>'required',
            'organization'=>'required',
            // 'donation_id' => [Rule::unique('livelihoods')->where(function ($query) {
            //         return $query->where('family_id', request()->input('family_id'));
            //     }),],
            'amount'=>'required',
            'description'=>'required',
        ];
    }
}

<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreVoteDetailRequest extends FormRequest
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
            'vote_no'=>'required',
            'year' => [
                Rule::unique('voting_details')->where(function ($query) {
                    return $query->where('year', $this->input('year'))
                                 ->where('member_id', $this->input('member_id'))
                                 ->where('family_id', $this->input('family_id'));
                }),
            ],
        ];
    }
}

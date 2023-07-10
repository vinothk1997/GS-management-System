<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreStaffWorkplaceRequest extends FormRequest
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
            'start_date' => [
                Rule::unique('staff_workplaces')->where(function ($query) {
                    return $query->where('staff_id', $this->input('staffId'))
                                 ->where('start_date', $this->input('start_date'));
                                 
                }),
            ],
            'endDate'=>'required',
            'designation'=>'required|string',
            'placeId'=>'required',
        ];
    }
}
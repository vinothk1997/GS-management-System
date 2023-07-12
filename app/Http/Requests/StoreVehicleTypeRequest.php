<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleTypeRequest extends FormRequest
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
            'vehicle_type'=>'required|unique:vehicle_types,vehicle_type'
        ];
    }
    public function messages()
    {
        return [
            'vehicle_type.required'=>'A vehicle type field is required.'
        ];
    }
}

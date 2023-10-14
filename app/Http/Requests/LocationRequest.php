<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'village' => 'required',
                    'sub_district' => 'required',
                    'city' => 'required',
                    'full_address' => 'required',
                    'coordinate' => 'required'
                ];
                break;
            case 'PUT':
                return [
                    'village' => 'required',
                    'sub_district' => 'required',
                    'city' => 'required',
                    'full_address' => 'required',
                    'coordinate' => 'required'
                ];
                break;
        }
    }
}

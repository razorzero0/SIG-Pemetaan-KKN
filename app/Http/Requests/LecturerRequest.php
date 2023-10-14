<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LecturerRequest extends FormRequest
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
                    'name' => 'required',
                    'nidn' => 'required'
                ];
                break;
            case 'PUT':
                return [
                    'name' => 'required',
                    'nidn' => 'required'
                ];
                break;
        }
    }
    public function messages()
    {
        return [
            "name.required" => "Nama harus diisi",
            "nidn.required" => "NIDN harus diisi"
        ];
    }
}

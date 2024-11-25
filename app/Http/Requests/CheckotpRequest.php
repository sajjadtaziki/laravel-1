<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckotpRequest extends FormRequest
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
        return [
            'Phone'=>['required','min:11','max:11'],
            'Code'=>['required'],
        ];
    }
}

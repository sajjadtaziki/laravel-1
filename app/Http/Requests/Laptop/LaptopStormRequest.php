<?php

namespace App\Http\Requests\Laptop;

use Illuminate\Foundation\Http\FormRequest;

class LaptopStormRequest extends FormRequest
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
            'Name_l',
            'Model_l',
            'Cpu_l',
            'Color_l',
            'Ram_l',
            'Url_Image',
        ];
    }
}

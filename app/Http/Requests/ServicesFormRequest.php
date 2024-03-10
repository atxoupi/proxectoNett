<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicesFormRequest extends FormRequest
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
            "data.attributes.title" => ["required", "string"],
            "data.attributes.summary" => ["required", "string"],
            "data.attributes.body" => ["required", "string"],
            "data.attributes.image" => ["required", "string"],
            "data.attributes.section" => ["required", "integer"]
        ];
    }
}

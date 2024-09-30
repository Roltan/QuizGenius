<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateTestRequest extends FormRequest
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
            'overCount' => ['required', 'numeric', 'min:1'],
            'topic' => ['required', 'string', 'filled', 'min:1'],
            'fillCount' => ['nullable', 'numeric', 'min:0'],
            'choiceCount' => ['nullable', 'numeric', 'min:0'],
            'blankCount' => ['nullable', 'numeric', 'min:0'],
            'relationCount' => ['nullable', 'numeric', 'min:0'],
        ];
    }
}

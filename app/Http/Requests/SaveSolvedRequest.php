<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveSolvedRequest extends FormRequest
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
            'test_id' => ['required', 'number', 'min:1'],
            'time' => ['required', 'number', 'min:1'],
            'is_escape' => ['required', 'boolean'],
            'answer' => ['required', 'array'],
            'answer.id' => ['required', 'number', 'min:1'],
            'answer.text' => ['required', 'string', 'filled', 'min:1']
        ];
    }
}

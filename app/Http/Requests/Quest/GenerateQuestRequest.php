<?php

namespace App\Http\Requests\Quest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GenerateQuestRequest extends FormRequest
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
            'type' => ['nullable', 'string', Rule::in(['fill', 'blank', 'choice', 'relation'])],
            'topic' => ['required', 'string', 'filled', 'min:1'],
            'ids' => ['nullable', 'array'],
            'ids.*' => ['numeric']
        ];
    }
}

<?php

namespace App\Http\Requests\Quest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateQuestRequest extends FormRequest
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
            'topic' => ['required', 'string', 'filled', 'min:1'],
            'quest' => ['required', 'string', 'filled', 'min:1'],
            'type' => ['required', 'string', Rule::in(['fill', 'blank', 'choice', 'relation'])],

            'correct' => [Rule::requiredIf(in_array($this->input('type'), ['blank', 'choice'])), 'array'],
            'correct.*' => [Rule::requiredIf(in_array($this->input('type'), ['blank', 'choice'])), 'string', 'filled', 'min:1'],

            'uncorrect' => [Rule::requiredIf($this->input('type') == 'choice'), 'array'],
            'uncorrect.*' => [Rule::requiredIf($this->input('type') == 'choice'), 'string', 'filled', 'min:1'],

            'first_column' => [Rule::requiredIf($this->input('type') == 'relation'), 'array'],
            'first_column.*' => [Rule::requiredIf($this->input('type') == 'relation'), 'string', 'filled', 'min:1'],

            'second_column' => [Rule::requiredIf($this->input('type') == 'relation'), 'array'],
            'second_column.*' => [Rule::requiredIf($this->input('type') == 'relation'), 'string', 'filled', 'min:1'],
        ];
    }
}

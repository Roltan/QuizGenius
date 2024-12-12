<?php

namespace App\Http\Requests;

use App\Rules\AnswerTextRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'test_alias' => ['required', 'string', 'min:1', 'filled'],
            'time' => ['required', 'numeric', 'min:0'],
            'is_escape' => ['required', 'boolean'],

            'answer' => ['required', 'array'],
            'answer.*' => ['required', 'array'],
            'answer.*.id' => ['required', 'numeric', 'min:1'],
            'answer.*.type' => ['required', Rule::in(['fill', 'relation', 'choice', 'blank'])],
            'answer.*.text' => [new AnswerTextRule]
        ];
    }
}

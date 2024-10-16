<?php

namespace App\Http\Requests\Test;

use App\Rules\UniqueQuestPairRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateTestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'topic' => ['required', 'string', 'max:255'],
            'quest' => ['required', 'array', new UniqueQuestPairRule()],
            'quest.*.id' => ['required', 'integer', 'min:1'],
            'quest.*.type' => ['required', Rule::in(['fill', 'blank', 'choice', 'relation'])],
            'only_user' => ['nullable', 'boolean'],
            'leave' => ['nullable', 'boolean']
        ];
    }
}

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

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $fill = request()->input('fillCount', 0);
            $choice = request()->input('choiceCount', 0);
            $blank = request()->input('blankCount', 0);
            $relation = request()->input('relationCount', 0);
            $over = request()->input('overCount');

            if (($fill + $choice + $blank + $relation) != $over and ($fill + $choice + $blank + $relation) != 0)
                $validator->errors()->add('general', 'the amount of fillCount, choiceCount, blankCount, relationCount must be equal to overCount');
        });
    }
}

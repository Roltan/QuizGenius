<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class HasCorrectAnswer implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        foreach ($value as $group) {
            if (!isset($group['answer']) || !is_array($group['answer'])) {
                $fail('В каждом массиве ответов должен быть хотя бы один правильный ответ.');
                return;
            }

            $hasCorrect = false;
            foreach ($group['answer'] as $answer) {
                if (isset($answer['correct']) && $answer['correct'] === true) {
                    $hasCorrect = true;
                    break;
                }
            }

            if (!$hasCorrect) {
                $fail('В каждом массиве ответов должен быть хотя бы один правильный ответ.');
                return;
            }
        }
    }
}

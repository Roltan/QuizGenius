<?php

namespace App\Http\Resources\Solved;

use App\Services\AnswerServices;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlankResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $quest = $this['quest']->quest;
        if (isset($answer))
            $answer = json_encode($this['answer']->answer);
        else
            $answer = '';

        $checked = in_array($answer, json_decode($quest->correct));

        return [
            'type' => 'blank',
            'id' => $this['quest']->id,
            'quest' => $quest->quest,
            'answer' => $answer,
            'isCorrect' => $checked
        ];
    }
}

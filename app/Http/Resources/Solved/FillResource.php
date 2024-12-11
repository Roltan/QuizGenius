<?php

namespace App\Http\Resources\Solved;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FillResource extends JsonResource
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
            $answer = [];

        $correct = $quest->getCorrectAnswer();
        $checked = [];
        for ($i = 0; $i < count($correct); $i++) {
            $ans = $answer[$i] ?? '';
            $checked[] = $ans == $correct[$i];
        }

        return [
            'type' => 'fill',
            'id' => $this['quest']->id,
            'quest' => $quest->quest,
            'options' => json_decode($quest->options),
            'answer' => $checked
        ];
    }
}

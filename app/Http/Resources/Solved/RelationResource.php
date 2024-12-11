<?php

namespace App\Http\Resources\Solved;

use App\Services\AnswerServices;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RelationResource extends JsonResource
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

        $correct = json_decode($quest->second_column);
        $checked = [];
        for ($i = 0; $i < count($correct); $i++) {
            $ans = $answer[$i] ?? '';
            $checked[] = $ans == $correct[$i];
        }

        return [
            'type' => 'relation',
            'id' => $quest->id,
            'quest' => $quest->quest,
            'first_column' => json_decode($quest->first_column),
            'second_column' => $correct,
            'answer' => $checked
        ];
    }
}

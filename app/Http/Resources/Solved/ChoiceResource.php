<?php

namespace App\Http\Resources\Solved;

use App\Services\AnswerServices;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChoiceResource extends JsonResource
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

        $correct = collect(json_decode($quest->correct))->map(function ($item) use ($answer) {
            $response = [
                'label' => $item,
                'checked' => true,
            ];
            if (in_array($item, $answer))
                $response['isCorrect'] = true;
            return $response;
        });
        $uncorrect = collect(json_decode($quest->uncorrect))->map(function ($item) use ($answer) {
            return [
                'label' => $item,
                'checked' => in_array($item, $answer),
                'isCorrect' => in_array($item, $answer)
            ];
        });

        return [
            'type' => 'choice',
            'id' => $this['quest']->id,
            'quest' => $quest->quest,
            'is_multiple' => $quest->is_multiple,
            'answers' => $correct->merge($uncorrect)
        ];
    }
}

<?php

namespace App\Http\Resources\Solved;

use App\Models\QuestAnswer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SolvedQuestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // цикл по всем переданным заданиям
        $data = $this['quest']->map(function ($quest) {
            $params = ['quest' => $quest];
            // ищем есть ли ответ
            $answer = QuestAnswer::query()
                ->where('solved_test_id', $this['solved_id'])
                ->where('quest_test_id', $quest->id)
                ->first();
            if ($answer != null)
                $params['answer'] = $answer;

            // формируем объект ответа по типу вопроса
            switch ($quest->type_quest) {
                case 'fill':
                    return new FillResource($params);
                case 'blank':
                    return new BlankResource($params);
                case 'choice':
                    return new ChoiceResource($params);
                case 'relation':
                    return new RelationResource($params);
                default:
                    dd($quest->type_quest);
            }
        })->filter()->values();

        $data = json_encode($data);
        $data = json_decode($data, true);

        return $data;
    }
}

<?php

namespace App\Services;

use App\Http\Requests\GenerateTestRequest;
use App\Http\Resources\Test\TestResource;
use App\Models\BlankQuest;
use App\Models\ChoiceQuest;
use App\Models\FillQuest;
use App\Models\RelationQuest;
use App\Models\Topic;
use Illuminate\Http\Request;

class TestServices
{
    public function generateTest(GenerateTestRequest $request)
    {
        $topic = Topic::query()->where('topic', $request->topic)->first();
        if ($topic == null)
            return response(['status' => false, 'error' => 'topic not found']);

        $countQuest = $request->overCount;
        if (!$request->has('fillCount') and !$request->has('choiceCount') and !$request->has('blankCount') and !$request->has('relationCount')) {
            $part = $this->divideIntoParts($countQuest, 4);
            $countArr = [
                'fillCount' => $part[0],
                'choiceCount' => $part[1],
                'blankCount' => $part[2],
                'relationCount' => $part[3]
            ];
        } else {
            $countArr = [
                'fillCount' => $request->has('fillCount') ? $request->fillCount : 0,
                'choiceCount' => $request->has('choiceCount') ? $request->choiceCount : 0,
                'blankCount' => $request->has('blankCount') ? $request->blankCount : 0,
                'relationCount' => $request->has('relationCount') ? $request->relationCount : 0
            ];
        }

        $fill = FillQuest::query()
            ->where('topic_id', $topic->id)
            ->inRandomOrder()
            ->take($countArr['fillCount'])
            ->get()
            ->map(function ($question) {
                $question->type = 'fill';
                return $question;
            });
        $choice = ChoiceQuest::query()
            ->where('topic_id', $topic->id)
            ->inRandomOrder()
            ->take($countArr['choiceCount'])
            ->get()
            ->map(function ($question) {
                $question->type = 'choice';
                return $question;
            });
        $blank = BlankQuest::query()
            ->where('topic_id', $topic->id)
            ->inRandomOrder()
            ->take($countArr['blankCount'])
            ->get()
            ->map(function ($question) {
                $question->type = 'blank';
                return $question;
            });
        $relation = RelationQuest::query()
            ->where('topic_id', $topic->id)
            ->inRandomOrder()
            ->take($countArr['relationCount'])
            ->get()
            ->map(function ($question) {
                $question->type = 'relation';
                return $question;
            });

        $response = collect()
            ->merge($fill)
            ->merge($choice)
            ->merge($blank)
            ->merge($relation)
            ->shuffle();

        return new TestResource($response);
    }

    public function divideIntoParts(int $number, int $count): array
    {
        $basePart = intdiv($number, $count);
        // Вычисляем остаток
        $remainder = $number % $count;

        // Создаем массив с элементами, заполненными базовой частью
        $parts = array_fill(0, $count, $basePart);

        // Распределяем остаток случайным образом
        for ($i = 0; $i < $remainder; $i++) {
            $randomIndex = rand(0, $count - 1); // Выбираем случайный индекс
            $parts[$randomIndex]++; // Увеличиваем значение элемента с этим индексом на 1
        }

        return $parts;
    }
}

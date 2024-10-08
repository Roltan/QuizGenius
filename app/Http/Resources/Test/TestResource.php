<?php

namespace App\Http\Resources\Test;

use App\Models\QuestsTest;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class TestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $quest = collect();
        foreach ($this->quest as $q) {
            $quest = $quest->merge($this->getQuest($q->type_quest, $this->id));
        }
        return [
            'title' => $this->title,
            'quest' => new QuestResource($quest)
        ];
    }

    public function getQuest(string $type, int $testId): Collection
    {
        $quests = DB::table($type . '_quests')
            ->join('quests_tests', $type . '_quests.id', '=', 'quests_tests.quest_id')
            ->where('quests_tests.type_quest', $type)
            ->where('quests_tests.test_id', $testId)
            ->inRandomOrder()
            ->get()
            ->map(function ($question) use ($type) {
                $question->type = $type;
                return $question;
            });
        return $quests;
    }
}

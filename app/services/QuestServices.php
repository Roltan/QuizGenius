<?php

namespace App\Services;

use App\Http\Requests\Quest\GenerateQuestRequest;
use App\Http\Resources\Test\BlankResource;
use App\Http\Resources\Test\ChoiceResource;
use App\Http\Resources\Test\FillResource;
use App\Http\Resources\Test\RelationResource;
use App\Models\BlankQuest;
use App\Models\ChoiceQuest;
use App\Models\FillQuest;
use App\Models\RelationQuest;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use stdClass;

class QuestServices
{
    public function reGenerate(GenerateQuestRequest $request): Response
    {
        switch ($request->type) {
            case 'fill':
                $question = $this->getQuest(FillQuest::class, $request->topic);
                if ($question instanceof Response) return $question;
                $question = new FillResource($question);
                return response(['status' => true, 'quest' => json_decode(json_encode($question), true)]);
            case 'blank':
                $question = $this->getQuest(BlankQuest::class, $request->topic);
                if ($question instanceof Response) return $question;
                $question = new BlankResource($question);
                return response(['status' => true, 'quest' => json_decode(json_encode($question), true)]);
            case 'choice':
                $question = $this->getQuest(ChoiceQuest::class, $request->topic);
                if ($question instanceof Response) return $question;
                $question = new ChoiceResource($question);
                return response(['status' => true, 'quest' => json_decode(json_encode($question), true)]);
            case 'relation':
                $question = $this->getQuest(RelationQuest::class, $request->topic);
                if ($question instanceof Response) return $question;
                $question = new RelationResource($question);
                return response(['status' => true, 'quest' => json_decode(json_encode($question), true)]);
            default:
                return response(['status' => false, 'error' => 'unknown type quest'], 400);
        }
    }

    protected function getQuest(string $model, string $topic): Response|stdClass
    {
        $topic = Topic::query()
            ->where('topic', $topic)
            ->first();
        if ($topic == null)
            return response(['status' => false, 'error' => 'Тема не найдена'], 404);

        $question = $model::query()
            ->where('topic_id', $topic->id)
            ->inRandomOrder()
            ->first();

        $type = $question->type();
        $question = json_decode(json_encode($question));
        $question->type = $type;
        return $question;
    }

    public function create(Request $request): Response
    {
        $topic = Topic::query()
            ->where('topic', $request->topic)
            ->first();
        if ($topic == null)
            return response(['status' => false, 'error' => 'Тема не найдена'], 404);

        $data = [];
        switch ($request->type) {
            case 'fill':
                $data = $request->only(['quest', 'options', 'is_multiple']);
                $this->createQuest(FillQuest::class, $data, $topic->id);
                break;
            case 'blank':
                $data = $request->only(['quest', 'correct']);
                $this->createQuest(BlankQuest::class, $data, $topic->id);
                break;
            case 'choice':
                $data = $request->only(['quest', 'correct', 'uncorrect', 'is_multiple']);
                $this->createQuest(ChoiceQuest::class, $data, $topic->id);
                break;
            case 'relation':
                $data = $request->only(['quest', 'first_column', 'second_column']);
                $this->createQuest(RelationQuest::class, $data, $topic->id);
                break;
            default:
                return response(['status' => false, 'error' => 'unknown type'], 400);
        }
        return response(['status' => true]);
    }

    protected function createQuest(string $model, array $data, int $topic): void
    {
        $data['topic_id'] = $topic;
        $model::create($data);
    }
}

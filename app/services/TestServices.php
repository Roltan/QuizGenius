<?php

namespace App\Services;

use App\Http\Requests\Test\CreateTestRequest;
use App\Models\BlankQuest;
use App\Models\ChoiceQuest;
use App\Models\FillQuest;
use App\Models\QuestsTest;
use App\Models\RelationQuest;
use App\Models\Test;
use App\Models\Topic;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TestServices
{
    public function createTest(CreateTestRequest $request): Response|ResponseFactory
    {
        foreach ($request->quest as $quest) {
            switch ($quest->type) {
                case 'fill':
                    if (!FillQuest::find($quest->id)->exists())
                        return response(['status' => false, 'error' => "there is no question like '$quest->type' with id '$quest->id'"]);
                case 'blank':
                    if (!BlankQuest::find($quest->id)->exists())
                        return response(['status' => false, 'error' => "there is no question like '$quest->type' with id '$quest->id'"]);
                case 'choice':
                    if (!ChoiceQuest::find($quest->id)->exists())
                        return response(['status' => false, 'error' => "there is no question like '$quest->type' with id '$quest->id'"]);
                case 'relation':
                    if (!RelationQuest::find($quest->id)->exists())
                        return response(['status' => false, 'error' => "there is no question like '$quest->type' with id '$quest->id'"]);
            }
        }

        $data = $request->only('title');
        $topic = Topic::where('topic', $request->topic)->first();
        if ($topic == null) return response(['status' => false, 'error' => 'topic not found'], 404);

        $data['user_id'] = Auth::user()->id;
        $data['url'] = Str::slug($request->title);
        $data['topic_id'] = $topic->id;
        $test = Test::create($data);

        foreach ($request->quest as $quest) {
            QuestsTest::create([
                'test_id' => $test->id,
                'quest_id' => $quest->id,
                'type_quest' => $quest->type
            ]);
        }
        return response(['status' => true]);
    }

    public function deleteTest(int $id): Response|ResponseFactory
    {
        $test = Test::find($id);
        if ($test->user_id != Auth::user()->id)
            return response(['status' => false, 'error' => 'forbidden delete test'], 403);
        $test->delete();
        return response(['status' => true]);
    }
}

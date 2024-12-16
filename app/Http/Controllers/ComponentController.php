<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Quest\GenerateQuestRequest;

class ComponentController extends Controller
{
    public function __construct(
        public QuestController $questController
    ) {}

    public function reGenerate(GenerateQuestRequest $generateQuestRequest): RedirectResponse|View
    {
        $response = $this->questController->reGenerate($generateQuestRequest);
        if ($response->status() != 200) {
            return redirect('/')->with('error', $response->original['error']);
        }
        $quest = $response->original['quest'];

        return view('elements/quest/edit', $quest);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Quest\GenerateQuestRequest;
use App\Services\QuestServices;
use Illuminate\Http\Request;

class QuestController extends Controller
{
    public function __construct(
        public QuestServices $questServices
    ) {}
    public function reGenerate(GenerateQuestRequest $generateQuestRequest)
    {
        return $this->questServices->reGenerate($generateQuestRequest);
    }
}

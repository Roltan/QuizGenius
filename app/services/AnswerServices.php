<?php

namespace App\Services;

use App\Models\BlankQuest;
use App\Models\ChoiceQuest;
use App\Models\FillQuest;
use App\Models\QuestAnswer;
use App\Models\RelationQuest;
use Illuminate\Console\View\Components\Choice;

class AnswerServices
{
    public function countCorrect(QuestAnswer $questAnswer): int
    {
        $answer = $this->indexCheck($questAnswer);
        $count = 0;
        foreach ($answer as $ans) {
            if ($ans['correct'] == true)
                $count++;
        }
        return $count;
    }

    public function indexCheck(QuestAnswer $questAnswer): ?array
    {
        $quest = $questAnswer->questsTest->quest;
        $answer = json_decode($questAnswer->answer);
        switch ($questAnswer->questsTest->type_quest) {
            case 'fill':
                return $this->checkFillQuest($quest, $answer);
            case 'choice':
                return $this->checkChoiceQuest($quest, $answer);
            case 'blank':
                return $this->checkBlankQuest($quest, $answer);
            case 'relation':
                return $this->checkRelationQuest($quest, $answer);
            default:
                return null;
        }
    }

    public function checkBlankQuest(BlankQuest $blankQuest, string $answer): array
    {
        return [
            'answer' => $answer,
            'correct' => in_array($answer, json_decode($blankQuest->correct))
        ];
    }

    public function checkChoiceQuest(ChoiceQuest $choiceQuest, array|string $answer): array
    {
        if (!is_array($answer)) $answer = [$answer];
        $response = [];
        foreach ($answer as $ans) {
            $response[] = [
                "answer" => $ans,
                "correct" => in_array($ans, json_decode($choiceQuest->correct))
            ];
        }
        return $response;
    }

    public function checkFillQuest(FillQuest $fillQuest, array $answer): array
    {
        $correct = $fillQuest->getCorrectAnswer();
        $response = [];
        for ($i = 0; $i < count($answer); $i++) {
            $response[] = [
                "answer" => $answer[$i],
                "correct" => $answer[$i] == $correct[$i]
            ];
        }
        return $response;
    }

    public function checkRelationQuest(RelationQuest $relationQuest, array $answer): array
    {
        $correct = json_decode($relationQuest->secondColumn, true);
        $response = [];
        for ($i = 0; $i < count($answer); $i++) {
            $response[] = [
                "answer" => $answer[$i],
                "correct" => $answer[$i] == $correct[$i]
            ];
        }
        return $response;
    }
}

<?php

namespace App\Services;

use App\Http\Requests\SaveSolvedRequest;
use App\Models\QuestAnswer;
use App\Models\SolvedTest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SolvedTestServices
{
    public function saveSolvedTest(SaveSolvedRequest $request): Response
    {
        // общая информация о решении
        $student_id = Auth::check() ? Auth::user()->id : null;
        $test_id = $request->test_id;
        $solved_time = $request->time;
        $is_escape = $request->is_escape;
        $correct = 0;
        $grade = 0;
        $percent = 0;

        $solvedTest = SolvedTest::create([
            'test_id' => $test_id,
            'user_id' => $student_id,
            'is_escapee' => $is_escape,
            'solved_time' => $solved_time,
        ]);

        $count = $solvedTest->test->maxScore();

        // ответы на вопросы
        foreach ($request->answer as $answer) {
            $questAnswer = QuestAnswer::create([
                'solved_test_id' => $solvedTest->id,
                'quest_test_id' => $answer['id'],
                'answer' => json_encode($answer['text'])
            ]);

            $correct += $questAnswer->countCorrect();
        }
        $percent = (int) round($correct / $count * 100);
        $grade = $this->getGrade($percent, 50, 70, 90);

        $solvedTest->score = $correct;
        $solvedTest->percent = $percent;
        $solvedTest->grade = $grade;
        $solvedTest->save();

        return response([
            'status' => true,
            'score' => $correct,
            'percent' => $percent,
            'maxCorrect' => $count,
            'grade' => $grade
        ]);
    }

    protected function getGrade(int $percent, int $end2, int $end3, int $end4): int
    {
        if ($percent >= 0 && $percent < $end2) {
            return 2;
        } elseif ($percent >= $end2 && $percent < $end3) {
            return 3;
        } elseif ($percent >= $end3 && $percent < $end4) {
            return 4;
        }
        return 5;
    }
}

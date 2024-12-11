<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegRequest;
use App\Http\Resources\Card\SolvedResource;
use App\Http\Resources\Card\StatisticResource;
use App\Models\SolvedTest;
use App\Models\Test;
use App\Services\AuthServices;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ViewController extends Controller
{
    function convertObjectsToArray($data): mixed
    {
        // Если данные - массив, рекурсивно обрабатываем каждый элемент
        if (is_array($data)) {
            return array_map(fn($item) => $this->convertObjectsToArray($item), $data);
        }

        // Если данные - объект, преобразуем его в массив и рекурсивно обрабатываем
        if (is_object($data)) {
            return $this->convertObjectsToArray(
                json_decode(
                    json_encode($data),
                    true
                )
            );
        }

        // Если данные не являются массивом или объектом, возвращаем их как есть
        return $data;
    }

    public function viewProfile()
    {
        $user = Auth::user();
        if ($user === null)
            return redirect('/');
        return view('profile', [
            'name' => $user->name,
            'email' => $user->email
        ]);
    }

    public function viewSolved()
    {
        $user = Auth::user();
        if ($user === null)
            return redirect('/');

        $solvedTest = SolvedTest::query()
            ->where('user_id', $user->id)
            ->get();

        $tests = $solvedTest->map(function ($solved) {
            return $solved->test->title;
        });
        return view('profile-solved', $this->convertObjectsToArray([
            'tests' => $tests,
            'cards' => SolvedResource::collection($solvedTest)
        ]));
    }

    public function viewStatistic()
    {
        $user = Auth::user();
        if ($user === null)
            return redirect('/');

        $tests = Test::query()
            ->where('user_id', $user->id)
            ->get();

        $solvedTest = $tests->filter(function ($test) {
            return $test->solved()->count() !== 0;
        })->flatMap(function ($test) {
            return $test->solved;
        });

        return view('profile-statistic', $this->convertObjectsToArray([
            'tests' => $tests->pluck('title'),
            'cards' => StatisticResource::collection($solvedTest)
        ]));
    }

    public function viewTest(string $alias)
    {
        $test = Http::get(env('APP_URL') . "/api/test/solve/" . $alias);
        if (!$test->successful()) {
            return redirect('/');
        }
        $test = $test->json();
        // dd($test);
        return view('test', $this->convertObjectsToArray($test));
    }
}

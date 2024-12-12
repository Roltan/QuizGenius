<?php

namespace App\Http\Controllers;

use App\Http\Requests\Test\GenerateTestRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegRequest;
use App\Http\Resources\Card\SolvedResource;
use App\Http\Resources\Card\StatisticResource;
use App\Models\SolvedTest;
use App\Models\Test;
use App\Models\Topic;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ViewController extends Controller
{
    public  function __construct(
        public SolvedTestController $solvedTestController,
        public TestController $testController
    ) {}

    protected function convertObjectsToArray($data): mixed
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

    public function viewIndex(): View
    {
        $topic = Topic::query()
            ->orderBy('topic')
            ->get()
            ->pluck('topic');
        return view('index', ['topics' => $topic]);
    }

    public function viewCreate(): View
    {
        $topic = Topic::query()
            ->orderBy('topic')
            ->get()
            ->pluck('topic');
        return view('profile-create', ['topics' => $topic]);
    }

    public function viewProfile(): RedirectResponse|View
    {
        $user = Auth::user();
        if ($user === null)
            return redirect('/')->with('error', 'У вас нет прав посещать ту страницу');
        return view('profile', [
            'name' => $user->name,
            'email' => $user->email
        ]);
    }

    public function viewSolved(): RedirectResponse|View
    {
        $user = Auth::user();
        if ($user === null)
            return redirect('/')->with('error', 'У вас нет прав посещать ту страницу');

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

    public function viewStatistic(): RedirectResponse|View
    {
        $user = Auth::user();
        if ($user === null)
            return redirect('/')->with('error', 'У вас нет прав посещать ту страницу');

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

    public function viewTest(string $alias): RedirectResponse|View
    {
        $test = Http::get(env('APP_URL') . "/api/test/solve/" . $alias);
        if (!$test->successful()) {
            return redirect('/')->with('error', $test->json('error'));
        }
        $test = $test->json();

        return view('test', $this->convertObjectsToArray($test));
    }

    public function viewSolvedTest(int $solvedId): RedirectResponse|View
    {
        $response = $this->solvedTestController->getSolvedTest($solvedId);
        if ($response->status() != 200) {
            return redirect('/')->with('error', $response->original['error']);
        }
        $response = $response->original;

        return view('solved', $this->convertObjectsToArray($response));
    }

    public function viewMySolvedTest(int $testId): RedirectResponse|View
    {
        $response = $this->solvedTestController->getMySolvedTest($testId);
        if ($response->status() != 200) {
            return redirect('/')->with('error', $response->original['error']);
        }
        $response = $response->original;

        return view('solved', $this->convertObjectsToArray($response));
    }

    public function generateTest(GenerateTestRequest $request): RedirectResponse|View
    {
        $response = $this->testController->generateTest($request);
        if ($response->status() != 200) {
            return redirect('/')->with('error', $response->original['error']);
        }
        $response = $response->original;

        return view('edit', $this->convertObjectsToArray($response));
    }
}

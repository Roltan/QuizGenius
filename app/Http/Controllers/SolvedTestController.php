<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveSolvedRequest;
use App\Services\SolvedTestServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class SolvedTestController extends Controller
{
    public function __construct(
        public SolvedTestServices $solvedTestServices
    ) {}

    public function saveSolvedTest(SaveSolvedRequest $request): Response
    {
        return $this->solvedTestServices->saveSolvedTest($request);
    }

    public function getMySolvedTest(int $testId): Collection|Response
    {
        return $this->solvedTestServices->getMySolvedTest($testId);
    }
}
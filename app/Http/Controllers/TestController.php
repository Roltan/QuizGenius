<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateTestRequest;
use App\Services\TestServices;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct(
        public TestServices $testServices
    ) {}

    public function generateTest(GenerateTestRequest $request)
    {
        return $this->testServices->generateTest($request);
    }
}

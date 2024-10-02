<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateTestRequest;
use App\Services\GenerateServices;
use App\Services\TestServices;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct(
        public GenerateServices $generateServices
    ) {}

    public function generateTest(GenerateTestRequest $request)
    {
        return $this->generateServices->generateTest($request);
    }
}

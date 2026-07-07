<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CalculateEmiRequest;
use App\Services\LoanEmiService;
use Illuminate\Http\JsonResponse;

class LoanController extends Controller
{
    public function __construct(private readonly LoanEmiService $loanEmiService)
    {
    }

    public function calculate(CalculateEmiRequest $request): JsonResponse
    {
        $validated = $request->validated(); 

        $result = $this->loanEmiService->calculate(
            principal: (float) $validated['principal'],  
            annualRate: (float) $validated['annual_rate'],
            tenureMonths: (int) $validated['tenure_months'],
        );

        return response()->json($result, 200);
    }
}

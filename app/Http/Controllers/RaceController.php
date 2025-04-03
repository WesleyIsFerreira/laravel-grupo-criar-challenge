<?php

namespace App\Http\Controllers;

use App\Services\RaceLapService;
use Illuminate\Http\JsonResponse;

class RaceController extends Controller
{
    protected RaceLapService $raceLapService;

    public function __construct(RaceLapService $raceLapService)
    {
        $this->raceLapService = $raceLapService;
    }

    public function index(): JsonResponse
    {
        $dados = $this->raceLapService->getProcessedRaceResults();

        if ($dados->isEmpty()) {
            return response()->json(["status" => "error", "message" => "Nenhum dado encontrado."], 404);
        }

        return response()->json(["status" => "success"] + $dados->toArray());
    }
}

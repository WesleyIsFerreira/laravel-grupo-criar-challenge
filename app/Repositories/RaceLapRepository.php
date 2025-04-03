<?php

namespace App\Repositories;

use App\Models\RaceLap;
use App\Repositories\Contracts\RaceLapRepositoryInterface;
use Illuminate\Support\Collection;

class RaceLapRepository implements RaceLapRepositoryInterface
{
    public function getRaceResults(): Collection
    {
        return RaceLap::selectRaw("
            piloto,
            COUNT(volta) AS voltas_completadas,
            SEC_TO_TIME(SUM(TIME_TO_SEC(tempo))) AS tempo_total,
            ROUND(AVG(velocidade), 3) AS velocidade_media,
            MIN(TIME_TO_SEC(tempo)) AS melhor_volta_segundos,
            SEC_TO_TIME(MIN(TIME_TO_SEC(tempo))) AS melhor_volta
        ")
        ->groupBy('piloto')
        ->orderByDesc('voltas_completadas')
        ->orderBy('tempo_total')
        ->get();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\RaceLap;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class RaceController extends Controller
{
    public function index(): JsonResponse
    {
        $voltasNecessarias = 4;

        $dados = RaceLap::selectRaw("
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

        if ($dados->isEmpty()) {
            return response()->json(["status" => "error", "message" => "Nenhum dado encontrado."], 404);
        }

        $response = [];
        $posicao = 1;
        $melhorVoltaGeralSegundos = PHP_INT_MAX;
        $melhorVoltaGeralPiloto = null;
        $tempoPrimeiroColocado = null;

        foreach ($dados as $row) {
            [$codigoPiloto, $nomePiloto] = explode(" – ", $row->piloto);

            if ($posicao === 1) {
                $tempoPrimeiroColocado = $row->tempo_total;
            }

            if ($row->melhor_volta_segundos < $melhorVoltaGeralSegundos) {
                $melhorVoltaGeralSegundos = $row->melhor_volta_segundos;
                $melhorVoltaGeralPiloto = [
                    "código_piloto" => $codigoPiloto,
                    "nome_piloto" => $nomePiloto,
                    "melhor_volta" => $row->melhor_volta
                ];
            }

            $tempoAtrasVencedor = ($row->voltas_completadas == $voltasNecessarias)
                ? ($posicao === 1 ? "Vencedor" : gmdate("H:i:s", strtotime($row->tempo_total) - strtotime($tempoPrimeiroColocado)))
                : "-";

            logger('Detalhes da corrida: ' . json_encode([
                "voltas_completadas" => $row->voltas_completadas,
                "voltasNecessarias" => $voltasNecessarias
            ], JSON_PRETTY_PRINT));

            $response[] = [
                "posição" => $posicao,
                "código_piloto" => $codigoPiloto,
                "nome_piloto" => $nomePiloto,
                "voltas_completadas" => (int) $row->voltas_completadas,
                "tempo_total" => $row->tempo_total,
                "velocidade_media" => (float) $row->velocidade_media,
                "melhor_volta" => $row->melhor_volta,
                "tempo_atras_vencedor" => $tempoAtrasVencedor
            ];

            $posicao++;
        }

        return response()->json([
            "status" => "success",
            "data" => $response,
            "melhor_volta_corrida" => $melhorVoltaGeralPiloto
        ]);
    }
}


<?php

namespace App\Services;

use App\Repositories\Contracts\RaceLapRepositoryInterface;
use Illuminate\Support\Collection;

class RaceLapService
{
    protected RaceLapRepositoryInterface $raceLapRepository;

    public function __construct(RaceLapRepositoryInterface $raceLapRepository)
    {
        $this->raceLapRepository = $raceLapRepository;
    }

    public function getProcessedRaceResults(): Collection
    {
        $dados = $this->raceLapRepository->getRaceResults();

        if ($dados->isEmpty()) {
            return collect([]);
        }

        $response = [];
        $posicao = 1;
        $melhorVoltaGeralSegundos = PHP_INT_MAX;
        $melhorVoltaGeralPiloto = null;
        $tempoPrimeiroColocado = null;
        $voltasNecessarias = 4;

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

        return collect([
            "data" => $response,
            "melhor_volta_corrida" => $melhorVoltaGeralPiloto
        ]);
    }
}

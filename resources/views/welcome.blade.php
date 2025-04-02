<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Corrida</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #191970;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .highlight {
            background: #ffd700;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .header {
            color: #191970;
            display: flex;
            justify-content: space-between;
            font-weight: bold;
        }

        .line {
            display: flex;
            margin-top: 8px;
            justify-content: space-between;
        }

        .col-1{
            width: 60px;
        }

        .col-2{
            width: 54px;
        }

        .col-3{
            width: 115px;
        }

        .col-4{
            width: 50px;
        }

        .col-5{
            width: 86px;
        }

        .col-6{
            width: 96px;
        }

        .col-7{
            width: 90px;
        }

        .col-8{
            width: 106px;
        }

        .item {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 0;
            border-radius: 5px;
            font-size: 12px;
            background-color: aliceblue;
        }
    </style>
</head>
<body>

<div class="container">
    <div id="highlight-winner" class="highlight">Carregando vencedor...</div>
    <div id="highlight-best-lap" class="highlight">Carregando melhor volta...</div>

    <div class="header">
        <div class="item col-1">Posição</div>
        <div class="item col-2">Código</div>
        <div class="item col-3">Piloto</div>
        <div class="item col-4">Voltas</div>
        <div class="item col-5">Tempo Total</div>
        <div class="item col-6">Velocidade Média</div>
        <div class="item col-7">Melhor volta</div>
        <div class="item col-8">Tempo atrás do vencedor</div>
    </div>

    <div id="race-results"></div>
</div>

<script>
    async function fetchRaceResults() {
        try {
            const response = await fetch("{{ url('/race-results') }}");
            const data = await response.json();

            if (data.status !== "success") {
                document.getElementById("highlight-winner").innerText = "Erro ao carregar os dados!";
                return;
            }

            const resultsContainer = document.getElementById("race-results");

            data.data.forEach((pilot) => {
                resultsContainer.innerHTML += `
                    <div class="line">
                        <div class="item col-1">${pilot.posição}</div>
                        <div class="item col-2">${pilot.código_piloto}</div>
                        <div class="item col-3">${pilot.nome_piloto}</div>
                        <div class="item col-4">${pilot.voltas_completadas}</div>
                        <div class="item col-5">${pilot.tempo_total}</div>
                        <div class="item col-6">${pilot.velocidade_media} km/h</div>
                        <div class="item col-7">${pilot.melhor_volta}</div>
                        <div class="item col-8">${pilot.tempo_atras_vencedor}</div>
                    </div>
                `;
            });

            const winner = data.data[0];
            document.getElementById("highlight-winner").innerText = `Vencedor: ${winner.nome_piloto} (${winner.código_piloto})`;

            const bestLap = data.melhor_volta_corrida;
            document.getElementById("highlight-best-lap").innerText = `Melhor Volta: ${bestLap.melhor_volta} - ${bestLap.nome_piloto} (${bestLap.código_piloto})`;
        } catch (error) {
            document.getElementById("highlight-winner").innerText = "Erro ao buscar dados!";
            document.getElementById("highlight-best-lap").innerText = "...";
            console.error("Erro ao buscar resultados:", error);
        }
    }

    fetchRaceResults();
</script>

</body>
</html>

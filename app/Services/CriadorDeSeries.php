<?php
namespace App\Services;
use App\Serie;
use Illuminate\Support\Facades\DB;
/**
 *
 */
class CriadorDeSeries
{

    public function criarSerie(string $nome, int $nTemporadas, int $nEpisodios): ?Serie
    {
        DB::beginTransaction();
        $serie = Serie::create(compact('nome'));

        for ($i=1; $i <= $nTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            for ($j=1; $j <= $nEpisodios; $j++) {
                $episodio = $temporada->episodios()->create(['numero' => $j]);
            }
        }
        DB::commit();
        return $serie;
    }
}
 ?>

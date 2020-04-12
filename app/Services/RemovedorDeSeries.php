<?php
namespace App\Services;

use App\{Serie, Temporada, Episodio};
use Illuminate\Support\Facades\DB;
/**
 *
 */
class RemovedorDeSeries
{
    public function removerSerie(int $serieId): ?Serie
    {
        DB::beginTransaction();
        $serie = Serie::find($serieId);
        $serie->temporadas->each(function(Temporada $temporada){
            $temporada->episodios->each(function(Episodio $episodio){
                $episodio->delete();
            });
            $temporada->delete();
        });
        $serie->delete();
        DB::commit();

        return $serie;
    }
}
 ?>

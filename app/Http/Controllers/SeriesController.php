<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
/**
 *
 */
class SeriesController extends Controller
{

    function index(Request $request)
    {
        // $series = Serie::all(); // Pega todos
        $series = Serie::query()->orderBy('nome')->get();

        $mensagem = $request->session()->get("mensagem");
        // return view('series.index', ['series' => $series]);
        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view("series.create");
    }

    public function store(SeriesFormRequest $request)
    {
        $nome = $request->nome;
        $serie = Serie::create(compact('nome'));

        for ($i=1; $i < $request->n_temporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            for ($j=1; $j < $request->n_episodios; $j++) {
                $episodio = $temporada->episodios()->create(['numero' => $j]);
            }
        }
        
        $request->session()
            // ->put( // Cria a sessão como de costume
            ->flash( // Cria a sessão que só dura uma requisição
                "mensagem",
                "Série \"{$serie->nome}\" com o ID {$serie->id} criada com sucesso!"
            );
        return redirect()->route('series.index');
    }

    public function destroy(Request $request)
    {
        $serie = Serie::find($request->id);
        Serie::destroy($request->id);
        $request->session()
            ->flash(
                "mensagem",
                "Série \"{$serie->nome}\" com o ID {$serie->id} removida com sucesso!"
            );
        return redirect()->route('series.index');
    }
}

 ?>

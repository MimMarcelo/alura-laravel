<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\{CriadorDeSeries, RemovedorDeSeries};
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

    public function store(SeriesFormRequest $request, CriadorDeSeries $criadorDeSeries)
    {
        $serie = $criadorDeSeries->criarSerie($request->nome, $request->n_temporadas, $request->n_episodios);

        $request->session()
            // ->put( // Cria a sessão como de costume
            ->flash( // Cria a sessão que só dura uma requisição
                "mensagem",
                "Série \"{$serie->nome}\" com o ID {$serie->id} criada com sucesso!"
            );
        return redirect()->route('series.index');
    }

    public function destroy(Request $request, RemovedorDeSeries $removedorDeSeries)
    {
        $serie = $removedorDeSeries->removerSerie($request->id);
        // Serie::destroy($request->id);
        $request->session()
            ->flash(
                "mensagem",
                "Série \"{$serie->nome}\" com o ID {$serie->id} removida com sucesso!"
            );
        return redirect()->route('series.index');
    }
}

 ?>

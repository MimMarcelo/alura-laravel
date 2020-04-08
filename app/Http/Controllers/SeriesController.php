<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        return view('series.index', ['series' => $series]);
    }

    public function create()
    {
        return view("series.create");
    }

    public function store(Request $request)
    {
        $nome = $request->nome;
        $serie = Serie::create(compact('nome'));
        echo "Série \"{$serie->nome}\" com o ID {$serie->id} criada com sucesso!";
    }
}

 ?>

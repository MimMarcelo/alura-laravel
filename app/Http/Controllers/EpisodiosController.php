<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Episodio, Temporada};

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request)
    {
        $episodios = $temporada->episodios;
        $mensagem = $request->session()->get('mensagem');
        return view('episodios.index', compact('episodios', 'mensagem'));
    }

    public function assistir(Temporada $temporada, Request $request)
    {
        $assistidos = $request->episodios;
        if(is_null($assistidos)){
            $assistidos = array();
        }
        $temporada->episodios->each(function(Episodio $episodio) use ($assistidos){
            $episodio->assistido = in_array($episodio->id, $assistidos);
        });

        $temporada->push();
        $request->session()->flash('mensagem', 'Episódios marcados como assistidos com sucesso');

        // return view('episodios.index', ['episodios' => $temporada->episodios]);
        return redirect()->back();
    }
}

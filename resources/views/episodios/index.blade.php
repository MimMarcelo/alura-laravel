@extends('layout')

@section("cabecalho")
Episodios da temporada {{$episodios[0]->temporada->numero}}
@endsection
@section("conteudo")

@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

<form action="{{route('episodios.assistir', ['temporada' => $episodios[0]->temporada->id])}}" method="post">
    @csrf
    <ul class="list-group">
        @foreach ($episodios as $episodio)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <label for="ckb-episodio-{{$episodio->numero}}">
                    Episódio {{$episodio->numero}}
                </label>
                <input type="checkbox" id="ckb-episodio-{{$episodio->numero}}"
                    name="episodios[]" value="{{$episodio->id}}"
                    {{$episodio->assistido?'checked':''}}>
            </li>
        @endforeach
    </ul>
    <input type="submit" value="Salvar" class="btn btn-primary mt-3 mb-3">
</form>
@endsection

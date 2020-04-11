@extends('layout')

@section("cabecalho")
Séries
@endsection
@section("conteudo")

@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

<a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
<ul class="list-group">
    @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$serie->nome}}
            <span class="d-flex">
                <a href="{{ route('temporadas.index', ['serieId' => $serie->id]) }}"
                    class="btn btn-info btn-sm material-icons mr-3">
                    open_in_new
                </a>
                <form action="{{ route('series.destroy', ['id' => $serie->id]) }}" method="post"
                    onsubmit='return confirm("Deseja realmente excluir a série \"{{ addslashes($serie->nome) }}\"?")'>
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="delete" class="btn btn-danger btn-sm material-icons">
                </form>
            </span>
        </li>
    @endforeach
</ul>
@endsection

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
            <form action="{{ route('series.destroy', ['id' => $serie->id]) }}" method="post"
                onsubmit='return confirm("Deseja realmente excluir a série \"{{ addslashes($serie->nome) }}\"?")'>
                @csrf
                @method('DELETE')
                <input type="submit" value="delete" class="btn btn-danger btn-sm material-icons">
            </form>
        </li>
    @endforeach
</ul>
@endsection

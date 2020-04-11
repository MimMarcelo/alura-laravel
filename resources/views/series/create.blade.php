@extends('layout')

@section("cabecalho")
Adicionar série
@endsection

@section("conteudo")
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post">
    @csrf
    <div class="row">
        <div class="col col-8">
            <label for="nome">Nome da série</label>
            <input type="text" name="nome" id="nome" class="form-control" autofocus>
        </div>
        <div class="col col-2">
            <label for="n_temporadas">Nº Temporadas</label>
            <input type="number" step="1" min="1" name="n_temporadas" id="n_temporadas" class="form-control" autofocus>
        </div>
        <div class="col col-2">
            <label for="n_episodios">Episódios p/ Temp.</label>
            <input type="number" step="1" min="1" name="n_episodios" id="n_episodios" class="form-control" autofocus>
        </div>
    </div>
    <div class="form-group mt-3">
        <input type="submit" value="Gravar" class="btn btn-primary">
    </div>
</form>
<a href="{{ route('series.index') }}" class="btn btn-dark mb-3">Voltar</a>
@endsection

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
    <div class="form-group">
        <label for="nome">Nome da série</label>
        <input type="text" name="nome" id="nome" class="form-control" autofocus>
    </div>
    <div class="form-group">
        <input type="submit" value="Gravar" class="btn btn-primary">
    </div>
</form>
<a href="{{ route('series.index') }}" class="btn btn-dark mb-2">Voltar</a>
@endsection

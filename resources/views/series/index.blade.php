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
            <span id="nome-serie-{{$serie->id}}">{{$serie->nome}}</span>

            <div class="input-group w-50" id="input-nome-serie-{{$serie->id}}" hidden>
                <input type="text" value="{{$serie->nome}}">
                <div class="input-group-append">
                    <button
                        class="btn btn-primary material-icons"
                        onclick="editarSerie({{$serie->id}})">
                        check
                    </button>
                    @csrf
                </div>
            </div>
            <span class="d-flex">
                <a href="{{ route('temporadas.index', ['serieId' => $serie->id]) }}"
                    class="btn btn-info btn-sm material-icons mr-3">
                    open_in_new
                </a>
                <button
                    class="btn btn-warning btn-sm material-icons mr-3"
                    onclick="toggleInput({{$serie->id}})">
                    edit
                </button>
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
<script>
    function toggleInput(serieId){
        if(document.querySelector("#nome-serie-"+serieId).hasAttribute("hidden")){
            document.querySelector("#input-nome-serie-"+serieId).hidden = true;
            document.querySelector("#nome-serie-"+serieId).removeAttribute("hidden");
        }
        else{
            document.querySelector("#input-nome-serie-"+serieId).removeAttribute("hidden");
            // document.querySelector("#input-nome-serie-"+serieId).focus();
            document.querySelector("#nome-serie-"+serieId).hidden = true;
        }
    }

    function editarSerie(serieId){
        let formData = new FormData();
        var nome = document.querySelector("#input-nome-serie-"+serieId+" > input[type='text']").value;
        var token = document.querySelector("#input-nome-serie-"+serieId+" input[name='_token']").value;

        formData.append('nome', nome);
        formData.append('_token', token);

        var url = "/series/"+serieId+"/editarNome";
        fetch(url, {
            body: formData,
            method: 'POST'
        }).then(function(){
            toggleInput(serieId);
            document.querySelector("#nome-serie-"+serieId).textContent = nome
        });
    }
</script>
@endsection

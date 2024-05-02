@extends('admin.master')

@section('content')
<h1>Cadastrar Enquete</h1>
<div class="central">
    <div class="menu">
        <a href="{{ route('enquete.index') }}" class="padrao">Listar Enquetes</a>
        <a href="{{ route('enquete.create') }}" class="padrao">Cadastrar Enquete</a>
    </div>
    <div class="conteudo">
        <div class="infos">
            <form method="POST" action="{{ route('enquete.update', ['id' => $enqueteatual->id]) }}">
                @csrf
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" required value="{{ $enqueteatual->titulo }}">{{ $errors->first('titulo') }}<br>
                
                <label for="dtInicio">Data de inicio:</label>
                <input type="date" id="dtInicio" name="dtInicio" required value="{{ $enqueteatual->dtInicio }}" onchange="habilitarDataFinal()" >{{ $errors->first('dtInicio') }}<br>
                
                <label for="dtFim">Data de fim:</label>
                <input type="date" id="dtFim" name="dtFim" required value="{{ $enqueteatual->dtFim }}" onchange="validarDataFinal()">{{ $errors->first('dtFim') }}<br>
                
                <label for="respostas" class="aliesq">Respostas:</label>
                <div class="alidir" onclick="divrespostasEditar('mais')">Mais</div><div class="alidir" onclick="divrespostasEditar('menos')">Menos</div><br>
                <div id="divrepostas">
                    @foreach ($respostas as $resposta)
                        <div class="divresposta">
                            <div class="aliesq" onclick="divrespostasEditar('sobe', this)">Sobe</div>
                            <div class="aliesq" onclick="divrespostasEditar('desce', this)">Desce</div>
                            <input type="text" id="respostas" required name="respostas[]" value="{{ $resposta->titulo }}">
                            <input type="hidden" id="idbd" name="idbd[]" value="{{ $resposta->id }}">
                            <div class="alidir" onclick="divrespostasEditar('excluir', this)">Excluir</div>
                            {{ $errors->first('respostas[]') }}
                            <br>
                        </div>
                    @endforeach
                </div>
                <button type="submit">Atualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection
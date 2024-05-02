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
                <form method="POST" action="{{ route('enquete.store') }}">
                    
                    @csrf
                    <label for="titulo">Titulo:</label>
                    <input type="text" id="titulo" name="titulo" required value="{{ old('titulo') }}">{{ $errors->first('titulo') }}<br>
                    
                    <label for="dtInicio">Data de inicio:</label>
                    <input type="date" id="dtInicio" name="dtInicio" required value="{{ old('dtInicio') }}" onchange="habilitarDataFinal()" min="{{ date('Y-m-d') }}">{{ $errors->first('dtInicio') }}<br>
                    
                    <label for="dtFim">Data de fim:</label>
                    <input type="date" id="dtFim" name="dtFim" required value="{{ old('dtFim') }}"  disabled onchange="validarDataFinal()">{{ $errors->first('dtFim') }}<br>
                    
                    <label for="respostas" class="aliesq">Respostas:</label>
                    <div class="alidir" onclick="divrespostasCadastrar('mais')">Mais</div><div class="alidir" onclick="divrespostasCadastrar('menos')">Menos</div><br>
                    <div id="divrepostas">
                        <div class="divresposta">
                            <div class="aliesq" onclick="divrespostasCadastrar('sobe', this)">Sobe</div>
                            <div class="aliesq" onclick="divrespostasCadastrar('desce', this)">Desce</div>
                            <input type="text" id="respostas" required name="respostas[]" value="{{ old('respostas[]') }}">
                            <div class="alidir" onclick="divrespostasCadastrar('excluir', this)">Excluir</div>
                            {{ $errors->first('respostas[]') }}
                            <br>
                        </div>
                        <div class="divresposta">
                            <div class="aliesq" onclick="divrespostasCadastrar('sobe', this)">Sobe</div>
                            <div class="aliesq" onclick="divrespostasCadastrar('desce', this)">Desce</div>
                            <input type="text" id="respostas" required name="respostas[]" value="{{ old('respostas[]') }}">
                            <div class="alidir" onclick="divrespostasCadastrar('excluir', this)">Excluir</div>
                            {{ $errors->first('respostas[]') }}
                            <br>
                        </div>
                        <div class="divresposta">
                            <div class="aliesq" onclick="divrespostasCadastrar('sobe', this)">Sobe</div>
                            <div class="aliesq" onclick="divrespostasCadastrar('desce', this)">Desce</div>
                            <input type="text" id="respostas" required name="respostas[]" value="{{ old('respostas[]') }}">
                            <div class="alidir" onclick="divrespostasCadastrar('excluir', this)">Excluir</div>
                            {{ $errors->first('respostas[]') }}
                            <br>
                        </div>
                    </div>
                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
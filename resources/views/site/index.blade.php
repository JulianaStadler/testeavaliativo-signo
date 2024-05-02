@extends('site.master')
@section('content')
    <div class="center">
        <section>        
            @if ( count($enquetesemandamento) > 0 )
                <div class="alinha-title">
                    <h1 class="title">Enquetes em andamento:</h1>
                    <div class="sub-title">{{ count($enquetesemandamento) }} enquete(s) encontrada(s)</div>
                </div>
                <div class="alinha-main">
                
                    @foreach ($enquetesemandamento as $enquete)
                        <div class="padrao">
                            <div class="title"><b>{{ $enquete->titulo }}</b></div>
                            <div class="bottom">
                                <div class="datas">
                                    <div class="sub-title">Data de Inicio: <br>{{ $enquete->dtInicio }}</div>
                                    <div class="sub-title">Data de Finalização: <br>{{ $enquete->dtFim }}</div>
                                    <div class="sub-title">Total de votos: {{ $enquete->totalvotos }}</div>
                                </div>
                                <div class="vermais">
                                    <a class="btn" href="{{ route('pages.show', ['id' => $enquete->id]) }}">Votar!</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        
                </div>
            @else
                <h1 class="title">Enquetes em andamento:</h1>
                <div class="erro">Nenhuma enquete em andamento encontrada no sistema</div>
            @endif
        </section>
        <hr>
        <section>            
            @if ( count($enquetesnaoiniciadas) > 0 )
                <div class="alinha-title">
                    <h1 class="title">Enquetes não iniciadas:</h1>
                    <div class="sub-title">{{ count($enquetesnaoiniciadas) }} enquete(s) encontrada(s)</div>
                </div>
                <div class="alinha-main">
                
                    @foreach ($enquetesnaoiniciadas as $enquete)
                        <div class="padrao">
                            <div class="title"><b>{{ $enquete->titulo }}</b></div>
                            <div class="bottom">
                                <div class="datas">
                                    <div class="sub-title">Data de Inicio: <br>{{ $enquete->dtInicio }}</div>
                                    <div class="sub-title">Data de Finalização: <br>{{ $enquete->dtFim }}</div>
                                    <div class="sub-title">Total de votos: {{ $enquete->totalvotos }}</div>
                                </div>
                                <div class="vermais">
                                    <a class="btn" href="{{ route('pages.show', ['id' => $enquete->id]) }}">Votar!</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        
                </div>
            @else
                <h1 class="title">Enquetes não iniciadas:</h1>
                <div class="erro">Nenhuma enquete não iniciada encontrada no sistema</div>
            @endif
        </section>
        <hr>
        <section>            
            @if ( count($enquetesfinalizadas) > 0 )
                <div class="alinha-title">
                    <h1 class="title">Enquetes finalizadas:</h1>
                    <div class="sub-title">{{ count($enquetesfinalizadas) }} enquete(s) encontrada(s)</div>
                </div>
                <div class="alinha-main">
                
                    @foreach ($enquetesfinalizadas as $enquete)
                        <div class="padrao">
                            <div class="title"><b>{{ $enquete->titulo }}</b></div>
                            <div class="bottom">
                                <div class="datas">
                                    <div class="sub-title">Data de Inicio: <br>{{ $enquete->dtInicio }}</div>
                                    <div class="sub-title">Data de Finalização: <br>{{ $enquete->dtFim }}</div>
                                    <div class="sub-title">Total de votos: {{ $enquete->totalvotos }}</div>
                                </div>
                                <div class="vermais">
                                    <a class="btn" href="{{ route('pages.show', ['id' => $enquete->id]) }}">Votar!</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        
                </div>
            @else
                <h1 class="title">Enquetes finalizadas:</h1>
                <div class="erro">Nenhuma enquete finalizada encontrada no sistema</div>
            @endif
        </section>
    </div>
@endsection
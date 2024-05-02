@extends('site/master')
@section('content')
    <div class="center">
        <section> 
            <div class="alinha-title">
                <h1 class="title">{{ $enquete->titulo }}:</h1>
                <div class="sub-title">Data de Inicio: {{ $enquete->dtInicio }}</div>
                <div class="sub-title">Data de Finalização: {{ $enquete->dtFim }}</div>
            </div>
            <div class="alinha-main">
                <div class="respostas">
                        
                    @foreach ($respostas as $i => $resposta)
                        <div class="divresposta">
                            <div class="infos">
                                <div class="title">{{ $resposta->titulo }}</div>
                                <div class="dir">
                                    <div class="votos">{{ $resposta->votos }}</div>
                                    <div class="btnvotar">
                                        @if ($travada == false)
                                            <form method="POST" action="{{ route('pages.update', ['id' => $enquete->id, 'idvoto' => $resposta->id]) }}">
                                                @csrf
                                                <button type="submit">Votar</button>
                                            </form>
                                        @else
                                            <form disabled>
                                                <button class="desativado" disabled>Votar</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="porcentagem">
                                <div class="linha">
                                    {{ $resposta->votos }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="divresposta total">
                        <div class="infos">
                            <div class="title">Total de votos: </div>
                            <div class="dir">
                                <div class="votos">{{ $enquete->totalvotos }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        window.onload = function() {
            var divs = document.querySelectorAll('.linha');

            var total = 0;
            divs.forEach(function(div) {
                total += parseInt(div.innerHTML);
                console.log(total);
            });

            divs.forEach(function(div) {
                var valor = parseInt(div.innerHTML);
                var porcentagem = (valor / total) * 100;
                if(total != 0){
                    animateWidth(div, porcentagem);
                }
            });
        }

        function animateWidth(div, porcentagem) {
            var width = 0;
            var interval = setInterval(increaseWidth, 15);

            function increaseWidth() {
                if (width >= porcentagem) {
                    clearInterval(interval);
                } else {
                    width++;
                    div.style.width = width + "%";
                }
            }
        }
    </script>
@endsection
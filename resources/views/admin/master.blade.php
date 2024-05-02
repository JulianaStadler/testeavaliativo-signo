<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="center">
            <div class="alinha-menu">
                <a href="{{ route('pages.index') }}" class="padrao">
                    <div class="logo"><p>VejaEnquetes</p></div>
                </a>
                <div class="botoes">
                    <a href="{{ route('enquete.index') }}" class="padrao">Painel</a>
                </div>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="center">
            <div class="alinha-footer">
                <p>Desenvolvido por Juliana Stadler - Maio/2024</p>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/respostas.js') }}"></script>
</body>
</html>
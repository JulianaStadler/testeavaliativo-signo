@extends('admin.master')
@section('content')
    <h1>Listar Enquetes</h1>

    <div class="central">
        <div class="menu">
            <a href="{{ route('enquete.index') }}" class="padrao">Listar Enquetes</a>
            <a href="{{ route('enquete.create') }}" class="padrao">Cadastrar Enquete</a>
        </div>
        <div class="conteudo">
            <div class="infos">
                @if (count($enquetes) > 0)
                    @csrf
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titulo</th>
                                <th>Data Inicio</th>
                                <th>Data Final</th>
                                <th>Total de Votos</th>
                                <th>Situação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($enquetes as $enquete)
                            <tr>
                                <td>
                                    {{ $enquete->id }}
                                </td>
                                <td>
                                    {{ $enquete->titulo }}
                                </td>
                                <td>
                                    {{ $enquete->dtInicio }}
                                </td>
                                <td>
                                    {{ $enquete->dtFim }}
                                </td>
                                <td>
                                    {{ $enquete->totalvotos }}
                                </td>
                                <td>
                                    {{ \App\Helpers\DateHelper::situacaoEnquete($enquete->dtInicio, $enquete->dtFim) }}
                                </td>
                                <td class="botoes">
                                    <a href="{{ route('pages.show', ['id' => $enquete->id]) }}">
                                        <button class="btn btn-danger">Ver</button>
                                    </a>
                                    <a href="{{ route('enquete.edit', ['id' => $enquete->id]) }}">
                                        <button class="btn btn-danger">Editar</button>
                                    </a>
                                    <a href="{{ route('enquete.destroy', ['id' => $enquete->id]) }}" class="js-del">
                                        <button class="btn btn-danger">Deletar</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <b>Nenhuma enquete encontrada no banco de dados.</b>
                @endif
            </div>
        </div>
    </div>
@endsection
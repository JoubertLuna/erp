@extends('adminlte::page')

@section('title', 'AZ ERP')

@section('content_header')
    @can('produto.create')
        <a href="{{ route('produto.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Novo Produto</a>
    @endcan
@stop

@section('content')

    @include('erp.painel.includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="esc">Imagem do Produto</th>
                        <th>Nome do Produto</th>
                        <th>Preço do Produto</th>
                        <th class="esc">Ativo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        @if ($produto->ativo === '1')
                            <tr>
                                <td class="esc" align="center">
                                    @if ($produto->image)
                                        <img src="{{ asset('storage/Produto/' . $produto->image) }}" width="70px"
                                            alt="{{ $produto->produto }}">
                                    @else
                                        <img src="{{ asset('storage/Produto/default.png') }}" width="70px">
                                    @endif
                                </td>
                                <td>{{ $produto->produto }}</td>
                                <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                <td class="esc">{{ $produto->ativo === '1' ? 'Sim' : 'Não' }}</td>

                                <td>
                                    @can('produto.show')
                                        <a href="{{ route('produto.show', $produto->url) }}" title="Ver produto"><i
                                                class="fas fa-list text-dark"></i></a>
                                    @endcan
                                    @can('produto.edit')
                                        <a href="{{ route('produto.edit', $produto->url) }}" title="Editar Dados"><i
                                                class="fa fa-edit text-primary"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @else
                            <tr class="text-muted">
                                <td class="esc" align="center">
                                    @if ($produto->image)
                                        <img src="{{ asset('storage/Produto/' . $produto->image) }}" width="70px"
                                            alt="{{ $produto->produto }}">
                                    @else
                                        <img src="{{ asset('storage/Produto/default.png') }}" width="70px">
                                    @endif
                                </td>
                                <td>{{ $produto->produto }}</td>
                                <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                <td class="esc">{{ $produto->ativo === '1' ? 'Sim' : 'Não' }}</td>

                                <td>
                                    @can('produto.show')
                                        <a href="{{ route('produto.show', $produto->url) }}" title="Ver produto"><i
                                                class="fas fa-list text-dark"></i></a>
                                    @endcan
                                    @can('produto.edit')
                                        <a href="{{ route('produto.edit', $produto->url) }}" title="Editar Dados"><i
                                                class="fa fa-edit text-primary"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop

@section('css')
    <style>
        @media screen and (max-width: 480px) {
            .esc {
                display: none;
            }
        }
    </style>
@stop

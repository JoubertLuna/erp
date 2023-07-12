@extends('adminlte::page')

@section('title', 'AZ ERP')

@section('content_header')
    <a href="{{ route('produtolocalizacao.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Nova Localização
        do Produto</a>
@stop

@section('content')

    @include('erp.painel.includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Localização</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtoLocalizacaos as $produtoLocalizacao)
                        <tr>
                            <td>{{ $produtoLocalizacao->produto }}</td>
                            <td>{{ $produtoLocalizacao->localizacao }}</td>

                            <td>
                                <a href="{{ route('produtolocalizacao.show', $produtoLocalizacao->id) }}"
                                    title="Ver Empresa"><i class="fas fa-list text-dark"></i></a>

                                <a href="{{ route('produtolocalizacao.edit', $produtoLocalizacao->id) }}"
                                    title="Editar Dados"><i class="fa fa-edit text-primary"></i></a>
                            </td>
                        </tr>
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

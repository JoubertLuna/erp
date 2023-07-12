@extends('adminlte::page')

@section('title', 'AZ ERP')

@section('content_header')
    <a href="{{ route('tipomovimento.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Novo Tipo do
        Movimento</a>
@stop

@section('content')

    @include('erp.painel.includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Tipo do Movimento</th>
                        <th class="esc">Entrada / Saída</th>
                        <th class="esc">Movimenta Estoque</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipomovimentos as $tipomovimento)
                        <tr>
                            <td>{{ $tipomovimento->tipo_movimento }}</td>
                            <td class="esc"><b><i>{{ $tipomovimento->ent_sai === 'E' ? 'Entrada' : 'Saída' }}</i></b></td>
                            <td class="esc"><b><i>{{ $tipomovimento->movimenta_estoque === 'S' ? 'Sim' : 'Não' }}</i></b>
                            </td>

                            <td>
                                <a href="{{ route('tipomovimento.show', $tipomovimento->url) }}"
                                    title="Ver Tipo do Movimento"><i class="fas fa-list text-dark"></i></a>

                                <a href="{{ route('tipomovimento.edit', $tipomovimento->url) }}" title="Editar Dados"><i
                                        class="fa fa-edit text-primary"></i></a>
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

@section('css')
    <style>
        @media screen and (max-width: 480px) {
            .esc {
                display: none;
            }
        }
    </style>
@stop

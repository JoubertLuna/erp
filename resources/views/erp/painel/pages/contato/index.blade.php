@extends('adminlte::page')

@section('title', 'AZ ERP')

@section('content_header')
    @can('contato.create')
        <a href="{{ route('contato.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Novo Contato</a>
    @endcan
@stop

@section('content')

    @include('erp.painel.includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome do Contato</th>
                        <th class="esc">E-mail</th>
                        <th class="esc">Contatos</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contatos as $contato)
                        @if ($contato->ativo === '1')
                            <tr>
                                <td>{{ $contato->nome }}</td>
                                <td class="esc">{{ $contato->email }}</td>
                                <td>{{ $contato->fone }} / {{ $contato->celular }}</td>

                                <td>
                                    @can('contato.show')
                                        <a href="{{ route('contato.show', $contato->url) }}" title="Ver Dados"><i
                                                class="fas fa-list text-dark"></i></a>
                                    @endcan
                                    @can('contato.edit')
                                        <a href="{{ route('contato.edit', $contato->url) }}" title="Editar Dados"><i
                                                class="fa fa-edit text-primary"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @else
                            <tr class="text-muted">
                                <td>{{ $contato->nome }}</td>
                                <td class="esc">{{ $contato->email }}</td>
                                <td>{{ $contato->fone }} / {{ $contato->celular }}</td>

                                <td>
                                    @can('contato.show')
                                        <a href="{{ route('contato.show', $contato->url) }}" title="Ver Dados"><i
                                                class="fas fa-list text-dark"></i></a>
                                    @endcan
                                    @can('contato.edit')
                                        <a href="{{ route('contato.edit', $contato->url) }}" title="Editar Dados"><i
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

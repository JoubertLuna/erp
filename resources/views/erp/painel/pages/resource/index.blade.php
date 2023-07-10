@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    @can('resource.create')
        <a href="{{ route('resource.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Nova Permissão</a>
    @endcan
@stop

@section('content')

    @include('erp.painel.includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome da Permissão</th>
                        <th class="esc">Descricão da Permissão</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resources as $resource)
                        <tr>
                            <td>{{ $resource->nome }}</td>
                            <td class="esc"><b><i>{{ $resource->resource }}</i></b></td>

                            <td>
                                @can('role.resources')
                                    <a href="{{ route('resources.role', $resource->id) }}" title="Inserir Permissões"><i
                                            class="fas fa-id-card text-success"></i>
                                        @if ($resource->roles->count() > 0)
                                            <span
                                                class="badge badge-danger"><small>{{ $resource->roles->count() }}</small></span>
                                        @endif
                                    </a>
                                @endcan
                                @can('resource.show')
                                    <a href="{{ route('resource.show', $resource->url) }}" title="Ver Permissão ou deletar"><i
                                            class="fas fa-list text-dark"></i></a>
                                @endcan
                                @can('resource.edit')
                                    <a href="{{ route('resource.edit', $resource->url) }}" title="Editar Dados"><i
                                            class="fa fa-edit text-primary"></i></a>
                                @endcan
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

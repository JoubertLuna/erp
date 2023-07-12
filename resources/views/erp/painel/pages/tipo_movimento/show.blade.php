@extends('adminlte::page')

@section('title', 'Detalhes do Tipo do Movimento')

@section('content_header')
    <div align="left">
        <h1>Detalhes do Tipo do Movimento <b>{{ $tipomovimento->tipo_movimento }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('tipomovimento.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <hr>
                        <li>
                            <strong>Tipo do Movimento: </strong> {{ $tipomovimento->tipo_movimento }}
                        </li>
                        <li>
                            <strong>Entrada / Saída: </strong> {{ $tipomovimento->ent_sai === 'E' ? 'Entrada' : 'Saída' }}
                        </li>
                        <li>
                            <strong>Movimenta Estoque: </strong>
                            {{ $tipomovimento->movimenta_estoque === 'S' ? 'Sim' : 'Não' }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            @include('erp.painel.includes.alerts')
                <div class="form-group">
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-primary"><i
                            class="fa fa-trash text-danger"></i>
                        Deletar Tipo de Movimento - {{ $tipomovimento->tipo_movimento }}</button>
                </div>

                <div class="modal fade" id="modal-primary">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-default">
                            <div class="modal-header">
                                <h4 class="modal-title">Deseja Realmente Excluir?</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div align="center" class="modal-body">
                                <form action="{{ route('tipomovimento.destroy', $tipomovimento->url) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Deletar Tipo de Movimento - {{ $tipomovimento->tipo_movimento }}"
                                        class="btn btn-sm btn-dark" width="150"><i class="fa fa-trash text-danger"></i>
                                        Deletar Tipo de Movimento - {{ $tipomovimento->tipo_movimento }}</button>
                                </form>
                            </div>
                            <div class="modal-footer justify-content-between"></div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@stop

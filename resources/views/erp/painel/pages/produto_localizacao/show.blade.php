@extends('adminlte::page')

@section('title', 'Detalhes da Localização do Produto')

@section('content_header')
    <div align="left">
        <h1>Detalhes da Localização do Produto</h1>
    </div>
    <div align="right">
        <a href="{{ route('produtolocalizacao.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5><b>Dados Gerais</b></h5>
                    <hr>
                    <ul>
                        <li><strong>Produto: </strong>
                            @foreach ($produtos as $produto)
                                {{ $produto->id === $produtoLocalizacao->produto_id ? $produto->produto : '' }}
                            @endforeach
                        </li>
                        <li><strong>Localização: </strong>
                            @foreach ($localizacaos as $localizacao)
                                {{ $localizacao->id === $produtoLocalizacao->localizacao_id ? $localizacao->localizacao : '' }}
                            @endforeach
                        </li>
                        <li>
                            <strong>Estoque: </strong> {{ $produtoLocalizacao->estoque }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            @include('erp.painel.includes.alerts')
            <div class="form-group">
                <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-primary"><i
                        class="fa fa-trash text-danger"></i>
                    Deletar Localização do Produto</button>
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
                            <form action="{{ route('produtolocalizacao.destroy', $produtoLocalizacao->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Deletar Localização do Produto"
                                    class="btn btn-sm btn-dark" width="150"><i class="fa fa-trash text-danger"></i>
                                    Deletar Localização do Produto</button>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

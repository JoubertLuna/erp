@extends('adminlte::page')

@section('title', 'Detalhes do Produto')

@section('content_header')
    <div align="left">
        <h1>Detalhes do Produto <b>{{ $produto->produto }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('produto.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
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
                        <li>
                            <strong>Produto: </strong> {{ $produto->produto }}
                        </li>
                        <li>
                            <strong>É Produto: </strong> {{ $produto->eh_produto === '1' ? 'Sim' : 'Não' }}
                        </li>
                        <li>
                            <strong>É Insumo: </strong> {{ $produto->eh_insumo === '1' ? 'Sim' : 'Não' }}
                        </li>
                        <li>
                            <strong>Preço: </strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}
                        </li>
                        <li>
                            <strong>Ativo: </strong> {{ $produto->ativo === '1' ? 'Sim' : 'Não' }}
                        </li>
                        <li><strong>Categoria: </strong>
                            @foreach ($categorias as $categoria)
                                {{ $categoria->id === $produto->categoria_id ? $categoria->categoria : '' }}
                            @endforeach
                        </li>
                        <li><strong>Unidade: </strong>
                            @foreach ($unidades as $unidade)
                                {{ $unidade->id === $produto->unidade_id ? $unidade->unidade : '' }}
                            @endforeach
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Imagem</b></h5>
                    <hr>
                    <div class="form-group">
                        @if (@$produto->image)
                            <img src="{{ asset('storage/Produto/' . @$produto->image) }}" width="250px"
                                alt="{{ @$produto->produto }}">
                        @else
                            <img src="{{ asset('storage/Produto/default.png') }}" width="250px">
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            @include('erp.painel.includes.alerts')
            @can('produto.destroy')
                <div class="form-group">
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-primary"><i
                            class="fa fa-trash text-danger"></i>
                        Deletar Produto - {{ $produto->produto }}</button>
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
                                <form action="{{ route('produto.destroy', $produto->url) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Deletar Produto - {{ $produto->produto }}"
                                        class="btn btn-sm btn-dark" width="150"><i class="fa fa-trash text-danger"></i>
                                        Deletar Produto - {{ $produto->produto }}</button>
                                </form>
                            </div>
                            <div class="modal-footer justify-content-between"></div>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
@stop

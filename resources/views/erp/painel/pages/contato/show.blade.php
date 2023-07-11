@extends('adminlte::page')

@section('title', 'Detalhes do Contato')

@section('content_header')
    <div align="left">
        <h1>Detalhes do Contato <b>{{ $contato->nome }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('contato.index') }}" class="btn btn-dark">Voltar</a>
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
                            <strong>Cliente / Fornecedor / Transportador: </strong>
                            {{ $contato->eh_cliente === '1' ? 'Cliente' : ($contato->eh_cliente === '2' ? 'Fornecedor' : 'Transportador') }}
                        </li>
                        <li>
                            <strong>Nome: </strong> {{ $contato->nome }}
                        </li>
                        <li>
                            <strong>Nome Fantasia: </strong> {{ $contato->nome_fantasia }}
                        </li>
                        <li>
                            <strong>Ativo: </strong> {{ $contato->ativo === '1' ? 'Sim' : 'Não' }}
                        </li>
                        <li>
                            <strong>CPF: </strong> {{ $contato->cpf }}
                        </li>
                        <li>
                            <strong>RG: </strong> {{ $contato->rg }}
                        </li>
                        <li>
                            <strong>CNPJ: </strong> {{ $contato->cnpj }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Contatos</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Telefone: </strong> {{ $contato->fone }}
                        </li>
                        <li>
                            <strong>Celular: </strong> {{ $contato->celular }}
                        </li>
                        <li>
                            <strong>E-mail: </strong> {{ $contato->email }}
                        </li>
                    </ul>
                    <h5><b>Endereço</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>CEP: </strong> {{ $contato->cep }}
                        </li>
                        <li>
                            <strong>Logradouro: </strong> {{ $contato->logradouro }}
                        </li>
                        <li>
                            <strong>Número: </strong> {{ $contato->numero }}
                        </li>
                        <li>
                            <strong>Bairro: </strong> {{ $contato->bairro }}
                        </li>
                        <li>
                            <strong>Cidade: </strong> {{ $contato->cidade }}
                        </li>
                        <li>
                            <strong>Estado: </strong> {{ $contato->uf }}
                        </li>
                        <li>
                            <strong>Complemento: </strong> {{ $contato->complemento }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            @include('erp.painel.includes.alerts')
            @can('contato.destroy')
                <div class="form-group">
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-primary"><i
                            class="fa fa-trash text-danger"></i>
                        Deletar Contato - {{ $contato->nome }}</button>
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
                                <form action="{{ route('contato.destroy', $contato->url) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Deletar Contato - {{ $contato->nome }}"
                                        class="btn btn-sm btn-dark" width="150"><i class="fa fa-trash text-danger"></i>
                                        Deletar Contato - {{ $contato->nome }}</button>
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

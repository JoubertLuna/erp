@extends('adminlte::page')

@section('title', 'Cadastrar Localização do Produto')

@section('content_header')
    <div align="right">
        <a href="{{ route('produtolocalizacao.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
    <br>
    @include('erp.painel.includes.alerts')
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('produtolocalizacao.store') }}" class="form" method="POST">
                @include('erp.painel.pages.produto_localizacao._partials.form')
            </form>
        </div>
    </div>
@stop

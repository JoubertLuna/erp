@extends('adminlte::page')

@section('title', 'Editar Localização do Produto')

@section('content_header')
    <div align="right">
        <a href="{{ route('produtolocalizacao.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('produtolocalizacao.update', $produtoLocalizacao->id) }}" method="POST" class="form">
                @method('PUT')
                @include('erp.painel.pages.produto_localizacao._partials.form')
            </form>
        </div>
    </div>
@stop

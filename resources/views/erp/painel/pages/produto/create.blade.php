@extends('adminlte::page')

@section('title', 'Cadastrar Produto')

@section('content_header')
    <div align="right">
        <a href="{{ route('produto.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('produto.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @include('erp.painel.pages.produto._partials.form')
            </form>
        </div>
    </div>
@stop

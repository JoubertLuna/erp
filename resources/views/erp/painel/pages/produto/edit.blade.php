@extends('adminlte::page')

@section('title', "Editar Produto {$produto->produto}")

@section('content_header')
    <div align="right">
        <a href="{{ route('produto.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('produto.update', $produto->url) }}" method="POST" class="form" enctype="multipart/form-data">
                @method('PUT')
                @include('erp.painel.pages.produto._partials.form')
            </form>
        </div>
    </div>
@stop

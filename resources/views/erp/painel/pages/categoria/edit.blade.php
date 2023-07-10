@extends('adminlte::page')

@section('title', "Editar {$categoria->categoria}")

@section('content_header')
    <div align="right">
        <a href="{{ route('categoria.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('categoria.update', $categoria->url) }}" method="POST" class="form">
                @method('PUT')
                @include('erp.painel.pages.categoria._partials.form')
            </form>
        </div>
    </div>
@stop

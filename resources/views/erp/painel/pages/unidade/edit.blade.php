@extends('adminlte::page')

@section('title', "Editar {$unidade->unidade}")

@section('content_header')
    <div align="right">
        <a href="{{ route('unidade.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('unidade.update', $unidade->url) }}" method="POST" class="form">
                @method('PUT')
                @include('erp.painel.pages.unidade._partials.form')
            </form>
        </div>
    </div>
@stop

@extends('adminlte::page')

@section('title', "Editar Localização {$localizacao->localizacao}")

@section('content_header')
    <div align="right">
        <a href="{{ route('localizacao.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('localizacao.update', $localizacao->url) }}" method="POST" class="form">
                @method('PUT')
                @include('erp.painel.pages.localizacao._partials.form')
            </form>
        </div>
    </div>
@stop

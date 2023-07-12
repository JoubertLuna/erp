@extends('adminlte::page')

@section('title', "Editar Tipo do Movimento {$tipomovimento->tipo_movimento}")

@section('content_header')
    <div align="right">
        <a href="{{ route('tipomovimento.index') }}" class="btn btn-primary"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('tipomovimento.update', $tipomovimento->url) }}" method="POST" class="form">
                @method('PUT')
                @include('erp.painel.pages.tipo_movimento._partials.form')
            </form>
        </div>
    </div>
@stop

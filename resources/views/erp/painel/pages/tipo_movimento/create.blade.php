@extends('adminlte::page')

@section('title', 'Cadastrar Tipo do Movimento')

@section('content_header')
    <div align="right">
        <a href="{{ route('tipomovimento.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tipomovimento.store') }}" class="form" method="POST">
                @include('erp.painel.pages.tipo_movimento._partials.form')
            </form>
        </div>
    </div>
@stop

@extends('adminlte::page')

@section('title', "Editar Contato {$contato->nome}")

@section('content_header')
    <div align="right">
        <a href="{{ route('contato.index') }}" class="btn btn-dark"><i class="fas fa-backward"></i> Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('contato.update', $contato->url) }}" method="POST" class="form">
                @method('PUT')
                @include('erp.painel.pages.contato._partials.form')
            </form>
        </div>
    </div>
@stop

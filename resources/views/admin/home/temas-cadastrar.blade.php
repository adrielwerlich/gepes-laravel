@extends('adminlte::page')

@section('title', 'Temas das Manchetes')

@section('content_header')
    <h1>Temas das Manchetes</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Cadastro dos Temas</h3>
        </div>
        @include('admin.includes.alerts')
        <div class="box-body">
            <form method="POST" action="{{ route('temas.cadastrar') }}">
                {!! csrf_field () !!}

                <div class="form-group">
                    <input type="text" name="temaAcadastrar" placeholder="Temas das Manchetes" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Cadastrar tema</button>
                </div>
            </form>
        </div>
    </div>
@stop
@extends('adminlte::page')

@section('title', 'Temas das Manchetes')

@section('content_header')
    <h1>Temas das Manchetes</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Painel de exibição</h3>
            <a href="{{ route('temas.cadastro') }}" class="btn btn-primary">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Cadastrar Temas de Manchetes
            </a>
            @if (count($temas) > 0)
                <a href="{{ route('temas.excluir') }}" class="btn btn-danger">
                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                    Excluir
                </a>
            @endif

            @if (count($temas) > 0)
                <a href="{{ route('temas.editar') }}" class="btn btn-info">
                    <i class="fa fa-exchange" aria-hidden="true"></i>
                    Editar
                </a>
            @endif
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            @if(count($temas) > 0)
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Tema</th>
                <tr>
                </thead>
                <tbody>

                    @forelse($temas as $tema)
                        <tr>
                            <td>{{ $tema->id }}</td>
                            <td>{{ $tema->tema }}</td>
                        <tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            @else
                <h2>Sem temas cadastrados</h2>
            @endif
        </div>
    </div>
@stop
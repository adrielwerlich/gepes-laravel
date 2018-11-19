@extends('adminlte::page')

@section('title', 'Cadastro das Manchetes')

@section('content_header')
    <h1>Cadastro das Manchetes</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Painel de cadastro</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <form method="POST" action="{{ route('manchetes.cadastrar') }}"
                enctype="multipart/form-data">
                {!! csrf_field () !!}

                <div class="form-group">
                    <input type="text" name="campoTitulo" placeholder="Título da Manchete" class="form-control"><br>
                    <textarea name="campoDescricao" rows="3" placeholder="Descrição da Manchete" class="form-control"></textarea><br>
                    <input type="text" name="campoLink" placeholder="Link da Manchete" class="form-control"><br>
                    <div class="form-group">
                        <label for="exampleInputFile">Carregue uma imagem</label>
                        <input type="file" name="imagemDaManchete" id="input-imagemDaManchete">

                        <p class="help-block">Escolha uma imagem para a manchete.</p>
                    </div>


                        <div class="form-group">
                            <label>Selecione um tema para a manchete</label>

                            @if(count($temas) > 0)
                            
                            <select name="campoTema" class="form-control">
                                @foreach($temas as $tema)
                                    <option  value="{{$tema->id}}"> {{ $tema->id }} --- {{ $tema->tema }}</option>
                                @endforeach
                            </select>
                            @else
                                <select class="form-control">
                                    <option> nenhum tema ainda cadastrado </option>
                                </select>
                            @endif

                        </div>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Cadastrar manchete</button>
                </div>
            </form>
        </div>
    </div>
@stop
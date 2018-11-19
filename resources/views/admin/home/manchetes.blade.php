@extends('adminlte::page')

@section('title', 'Manchetes')

@section('content_header')
    <h1>Manchetes</h1>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/manchete_admin.css') }}">
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Painel de exibição</h3>
            <a href="{{ route('manchetes.cadastro') }}" class="btn btn-primary">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Cadastrar Manchetes
            </a>
            @if (count($manchetes) > 0)
                <a href="{{ route('manchetes.excluir') }}" class="btn btn-danger">
                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                    Excluir
                </a>
            @endif

            @if (count($manchetes) > 0)
                <a href="{{ route('manchetes.editar') }}" class="btn btn-info">
                    <i class="fa fa-exchange" aria-hidden="true"></i>
                    Editar
                </a>
            @endif
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            @if(count($manchetes) > 0)
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Link</th>
                    <th>Imagem</th>
                    <th>Tema</th>
                    <th>Modificar</th>
                <tr>
                </thead>
                <tbody>

                    @forelse($manchetes as $manchete)
                        <tr>
                            <td class="check-manchete">
                                <input name="ch" value="{{ $manchete->id }}" type="checkbox">
                            </td>
                            <td>{{ $manchete->id }}</td>
                            <td>{{ $manchete->titulo }}</td>
                            <td>{{ $manchete->descricao }}</td>
                            <td>{{ $manchete->link }}</td>
                            <td>
                                <!-- <php -->
                                <a href="{{ asset ('storage/manchetes/'.$manchete->nomeDaImagem) }}">
                                    <img 
                                        src="{{ asset ('storage/manchetes/'.$manchete->nomeDaImagem) }}" 
                                        alt="{{$manchete->nomeDaImagem}}"
                                        style='max-height: 100%; width: 75px'
                                    > 
                                </a>     
                                
                            </td>
                            <td>
                                @foreach($temas as $tema)
                                @if ($manchete->temaId == $tema->id)
                                    {{ $tema->tema }}
                                @endif
                                @endforeach
                                
                            </td>
                            <td>
                                <a  href="{{ route('manchetes.editar') }}" 
                                    class="btn btn-sm btn-info"
                                    data-toggle="modal" 
                                    data-target="#edit"
                                    data-ttle="{{ $manchete->titulo }}"
                                    data-desc="{{ $manchete->descricao }}"
                                    data-link="{{ $manchete->link }}"
                                >
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                    Editar
                                </a>
                                <a href="{{ route('manchetes.excluir') }}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                    Excluir
                                </a>
                            </td>
                        <tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            @else
                <h2>Sem manchetes cadastradas</h2>
            @endif
        </div>
    </div>





<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Manchete</h4>
      </div>
      <form action="{{ route('manchetes.editar') }}" method="post">
      		{{method_field('patch')}}
      		{{csrf_field()}}
	      <div class="modal-body">
	      		<!-- <input type="hidden" name="category_id" id="cat_id" value=""> -->
				@include('admin.home.form_manchete')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	        <button type="submit" class="btn btn btn-success">Editar manchete</button>
	      </div>
      </form>
    </div>
  </div>
</div>    
@stop

@section('js')
<!-- <script src="https://code.jquery.com/jquery.min.js"></script> -->
<script>
$('#edit').on('show.bs.modal', e => {
    console.log('modal')
    debugger
    // let btn = $(e.relatedTarget)
    // let titulo = btn.data('ttle')
    // let desc = btn.data('desc')
    // let link = btn.data('link')
    let modal = $(this)

    let modelTit = document.querySelector('.modal-body #tit') // modal.find('.modal-body #tit')//.val(titulo)
    console.log(modelTit)
    // modal.find('.modal-body #desc').val(desc)
    // modal.find('.modal-body #link').val(link)
    // modal.find('modal-body #tit').val(titulo)
})
    
    
    
</script>
@stop
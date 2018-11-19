<!-- <form method="POST" action="{{ route('manchetes.cadastrar') }}"
    enctype="multipart/form-data">
    {!! csrf_field () !!} -->

    <div class="form-group">
    <!-- placeholder="Título da Manchete" -->
        <input id="tit" type="text" name="campoTitulo"  class="form-control"><br> 
        <textarea id="desc" name="campoDescricao" rows="3" placeholder="Descrição da Manchete" class="form-control"></textarea><br>
        <input id="link" type="text" name="campoLink" placeholder="Link da Manchete" class="form-control"><br>
        <div class="form-group">
            <label for="exampleInputFile">Carregue uma imagem</label>
            <input type="file" name="imagemDaManchete" id="input-imagemDaManchete">

            <p class="help-block">Escolha uma imagem para a manchete.</p>
        </div>


            <div class="form-group">
                <label>Selecione um tema para a manchete</label>

                @if(count($temas) > 0)
                
                <select id="sl-tema" name="campoTema" class="form-control">
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
    <!-- <div class="form-group">
        <button type="submit" class="btn btn-success">Cadastrar manchete</button>
    </div> -->
<!-- </form> -->

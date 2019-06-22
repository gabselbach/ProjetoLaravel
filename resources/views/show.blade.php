@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="meio">        
              <h2> @if($usuario->imagem!='0')
                  <img class="img-raised rounded-circle img-fluid"  style="max-height: 150px; max-width: 200px;" src="{{ asset('storage/'.$usuario->imagem) }}">
               @else
                 <img class="img-raised img-fluid" src="https://via.placeholder.com/150x200">

               @endif
              {{$usuario->nome}}</h2>

                <p><img src="{{ asset('img/email.svg') }}"/> {{$usuario->email}}</p>
                <p> <img src="{{ asset('img/descricao.svg') }}"/>{{$usuario->descricao}}</p>

             
              <a href="{{route('user.edit', $usuario->id)}}"> <img src="{{ asset('img/edit.svg') }}"/>editar informações</a>
                           
              <form method="POST" action="{{route('user.destroy', $usuario->id)}}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button  type="submit"> <img src="{{ asset('img/delete.svg')}}"/></button><span style="color:#9c27b0;"> Deletar Usuario</span>
              </form>
               <h3>Galeria:</h3>
              <div id="galeria">
               @foreach($img as $i)
                 <img class="imagem-post"  style="max-height: 150px; max-width: 200px;" src="{{ asset('storage/'.$i) }}">  
               @endforeach 
             </div>
              <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Adicionar Imagem</button>
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Adicione a sua imagem:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="material-icons">clear</i></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{route('imagem.store')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value={{ $usuario->id }}>
                        <div class="file_input_div">
                          <div class="file_input">
                              <label class="image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--min-fab mdl-js-ripple-effect mdl-button--colored">Upload Imagem</label>
                              <input id="file_input_file" name="imagem" class="none" type="file" required="required" />
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary btn-link">Adicionar</button>
                      <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Fechar</button>
                    </div>
                      </form>
                  </div>
                </div>
              </div>
              <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">Trocar Imagem de Perfil</button>
              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Adicione a sua imagem:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="material-icons">clear</i></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{route('imagemPerfil')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value={{ $usuario->id }}>
                        <div class="file_input_div">
                          <div class="file_input">
                              <label class="image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--min-fab mdl-js-ripple-effect mdl-button--colored">Upload Imagem</label>
                              <input id="file_input_file" name="imagem" class="none" type="file" required="required" />
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary btn-link">Adicionar</button>
                      <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Fechar</button>
                    </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

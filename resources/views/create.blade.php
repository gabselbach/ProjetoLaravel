@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="meio">
              @if (session('Error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('Error') }}
                        </div>
                    @endif
	<h2 style="color: #9C27AE;">Cadastro</h2>
<form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
	 {{csrf_field()}}
	<div class="form-group">
    <label for="exampleInputname">Nome</label>
    <input type="text" name="nome" class="form-control" id="nome" aria-describedby="emailHelp" >

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Endereço de email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >

  </div>
  <div class="form-group">
  	  <label for="exampleInputDescricao">Descricao</label>
   	<div class="wrap-input50 validate-input m-b-4">
        <textarea class="form-control input50" id="descricao" rows="6" name="descricao"></textarea>
  </div>
</div>
 <div class="file_input_div">
    <div class="file_input">
      <label class="image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--min-fab mdl-js-ripple-effect mdl-button--colored">Upload Imagem
        <input id="file_input_file" name="imagem" class="none" type="file" />
      </label>
    </div>
  </div>

  
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
           </div>
        </div>
    </div>
</div>
@endsection

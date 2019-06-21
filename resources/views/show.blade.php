@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="meio">

        
    <h2> @if($usuario->imagem!='0')
   
        <img class="imagem-post"  style="max-height: 150px; max-width: 200px;" src="{{ asset('storage/'.$usuario->imagem) }}">      
      {{$usuario->nome}}</h2>

        <p ><img src="{{ asset('img/email.svg') }}"/> {{$usuario->email}}</p>

         
    <p> <img src="{{ asset('img/descricao.svg') }}"/>{{$usuario->descricao}}</p>

@endif
      <a href="{{route('user.edit', $usuario->id)}}"> <img src="{{ asset('img/edit.svg') }}"/>editar informações</a>
                           
      <form method="POST" action="{{route('user.destroy', $usuario->id)}}">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button  type="submit"> <img src="{{ asset('img/delete.svg')}}"/></button>
        </form>
</div>
        </div>
    </div>
</div>
@endsection

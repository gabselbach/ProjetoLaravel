@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="meio">
            	@if (session('successMsg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('successMsg') }}
                        </div>
                    @endif
<h2>Usuarios</h2>

	@if($usuarios->count())
	<div style="padding:5px; margin: 0 auto; width: 400px">
  <table class="table">
  <thead>
    <tr>
      <th>Nome</th>
		<th >Editar</th>
		<th >Excluir</th>
		
	</tr>
	 </thead>
  <tbody>
 @foreach($usuarios as $usuario) 
 	<tr>

		<td  ><a href="{{route('user.show', $usuario->id)}}">{{$usuario->nome}}</a></td>
		<td >
			<a href="{{route('user.edit', $usuario->id)}}"> <img src="{{ asset('img/edit.svg') }}"/></a>
                           
			<!--<form method="POST" action="{{route('user.edit', $usuario->id)}}">
    			{{ csrf_field() }}
    			{{ method_field('DELETE') }}
    			<button type="submit"><i class="fas fa-user-edit"></i></button>
	
			</form>-->
		</td>

		<td >
			<form method="POST" action="{{route('user.destroy', $usuario->id)}}">
	    		{{ csrf_field() }}
	    		{{ method_field('DELETE') }}
	    		<button style=" width: 100%;" type="submit"> <img src="{{ asset('img/delete.svg')}}"/></button>
	    	</form>
		</td>	
	</tr>
 @endforeach
 	 </tbody>
</table>
</div>
 @else
 <h3>Não Existe usuario cadastrado</h3>
 @endif
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="meio">
                          @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Este é um  Crud Básico de Users </h2>
                    <p>Desenvolvido utilizando:</p>
                    <p>Laravel  5.8</p>
                    <p>MYSQL</p>
                    <p>Material Design</p>
            </div>
        </div>
    </div>
</div>
@endsection

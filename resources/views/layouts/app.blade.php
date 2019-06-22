<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
     <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">-->
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/material-kit.css?v=2.0.5') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />

    <title>{{ config('app.name', 'Laravel') }}</title>
  <style type="text/css">
  #galeria  {
    overflow: auto;
      height: 150px;
  }
    body{
      background-image: url("{{ asset('assets/img/city-profile.jpg')}}");
    

    }
    .meio{
    border-radius: 3px;
    padding: 1rem 15px;
    margin-left: 15px;
    margin-right: 15px;
    margin-top: -30px;
    border: 0;
    background: linear-gradient(60deg, #eee, #bdbdbd);
    }
    .table{
      border: 3px solid black;   border-collapse: collapse;
    }
    td a{
      color:#343a40;
    }

  </style>
</head>
<body>

      <nav class="navbar navbar-inverse navbar-expand-lg bg-dark" role="navigation-demo">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-translate">
                <a class="navbar-brand" href="/">Crud-Laravel</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                   <a class="nav-link" href="{{route('user.create')}}"> Cadastrar Usuário</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{route('user.index')}}">Listar Usuarios</a>
                  </li>
                   @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                           
                        @else
                   <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nome }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ route('trocarSenha') }}">Trocar Senha</a>
                                    
                                </div>
                            </li>
                             @endguest
                </ul>

              </div>
              <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-->
          </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

     <!-- Scripts -->
   
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/popper.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

  <script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/material-kit.js?v=2.0.5') }}" type="text/javascript"></script>
</body>
</html>


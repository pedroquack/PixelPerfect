<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>PixPrft | @yield('titulo')</title>
</head>
<style>
  .is-invalid{
    color: red;
  }
  .invalid-feedback{
    color: red;
  }
</style>
<body>
    <ul id='dropdown1' class='dropdown-content'>
      @can('admin', App\Models\Servico::class)
      <li><a href="{{route('servicos.index')}}">Serviços</a></li>
      <li><a href="{{route('pedido.index')}}">Pedidos</a></li>
      <li><a href="{{route('relatorio')}}">Relatorio</a></li>
      @endcan
      <li class="divider" tabindex="-1"></li>
      <li><a href="{{route('login.logout')}}">Sair <i class="material-icons right">exit_to_app</i></a></li>
    </ul>

    <nav class="indigo darken-3">
        <div class="nav-wrapper container">
          <a href="{{route('site.index')}}" class="left brand-logo">
            PixelPerfect
            </a>
          <ul id="nav-mobile" class="right hide-on-med-and-down" style="height: 100%">
            @auth
            <li><a href="{{route('meus.pedidos')}}">Meus pedidos</a></li>
            <li class="row"><a class='dropdown-trigger' href='#' data-target='dropdown1'>Olá {{auth()->user()->name}} <i class="material-icons right">expand_more</i></a></li>
            @else
            <li><a href="{{route('login')}}">Entrar</a></li>
            <li><a href="{{route('login.create')}}">Registrar</a></li>
            @endauth
          </ul>
        </div>
      </nav>
    @yield('conteudo')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
      var elemDrop = document.querySelectorAll('.dropdown-trigger');
      var instanceDrop = M.Dropdown.init(elemDrop, {
          coverTrigger: false,
          constrainWidth: false
      });
    </script>
    <script>
      var elemsModal = document.querySelectorAll('.modal');
      var instanceModal = M.Modal.init(elemsModal);
    </script>
</body>
</html>
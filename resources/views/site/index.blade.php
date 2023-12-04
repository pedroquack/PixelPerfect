@extends('template.main')
@section('titulo','Home')
@section('conteudo')
<style>
    .card-content{
        word-wrap: break-word;
    }
    .card-image{
      width: 200px;
      max-height: 200px;
    }
    .card-image img{
      height: 200px;
      width: 200px
    }
    .servicos .card{
      padding: 15px;
      height: 500px;
      display: flex;
      flex-direction: column;
      align-items: center
    }
</style>
  @if($mensagem = Session::get('sucesso'))
      <div class="card green">
      <div class="card-content white-text">
        <span class="card-title">Parabéns</span>
        <p>{{$mensagem}}</p>
      </div>
    </div>
  @endif
    <div class="container row center servicos">
        @foreach ($servicos as $serv)
        <div class="col s12 m4">
          <div class="card blue-grey darken-1 center">
              <div div class="card-image center">
                <img style="object-fit: contain" src="{{url("storage/{$serv->imagem}")}}">
              </div>
              <div class="card-content white-text">
                <span class="card-title">{{$serv->nome}}</span>
                <p>{{Str::limit($serv->descricao,100)}}</p>
              </div>
              <div class="center">
                <a href="{{route('servicos.show', $serv->id)}}" class="btn center">Ver serviço</a>
              </div>
          </div>
        </div>
        @endforeach
    </div>
@endsection
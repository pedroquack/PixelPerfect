@extends('template.main')
@section('titulo','Serviços')
@section('conteudo')

<div class="container">
   
    <a href="{{route('servicos.create')}}" class="waves-effect waves-light btn pt-5" style="margin-top: 2rem"><i class="material-icons left">add</i>Criar serviço</a>
    <table>
        <thead>
          <tr>
              <th></th>
              <th>Nome</th>
              <th>Preço</th>
              <th>Descrição</th>
              <th>Editar</th>
              <th>Excluir</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($servicos as $serv)
            <div id="modal{{$serv->id}}" class="modal">
                <div class="modal-content">
                <h4>Descrição do serviço</h4>
                <p style="word-wrap: break-word">{{$serv->descricao}}</p>
                </div>
            </div>
            <div id="modal2" class="modal">
                <div class="modal-content">
                <h4>Deseja mesmo excluir esse serviço?</h4>
                <div class="right" style="padding: 2rem">
                    <form action="{{route('servicos.destroy',$serv)}}" method="post" class="">
                        @csrf
                        @method('DELETE')
                        <a class="modal-close btn waves-effect waves-light">Voltar<i class="large material-icons right">arrow_back</i></button></a>
                        <button type="submit" class="btn waves-effect waves-light red">Excluir <i class="large material-icons right">remove_circle</i></button>
                    </form>
                </div>
                </div>
            </div>
            <tr>
                <td><img src="{{url("storage/{$serv->imagem}")}}" alt="" width="64px"></td>
                <td>{{$serv->nome}}</td>
                <td>R${{number_format($serv->price,2,',','.')}}</td>
                <td>
                    <a  class="btn-floating btn bg-gradient-green modal-trigger" href="#modal{{$serv->id}}">
                        <i class="large material-icons">comment</i>
                    </a>   
                </td>
                <td><a href="{{route('servicos.edit',$serv)}}" class="btn-floating waves-effect waves-light blue"><i class="material-icons">refresh</i></a></td>
                <td>
                    <a  class="btn-floating btn red modal-trigger" href="#modal2">
                        <i class="large material-icons">clear</i>
                    </a>   
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>
</div>
@endsection
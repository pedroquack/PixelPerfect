@extends('template.main')
@section('titulo','Meus Pedidos')
@section('conteudo')
    <div class="container">
        <table>
            <h5>Pedidos:</h5>
            <thead>
            <tr>
                <th>Serviço</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Status</th>
                <td>Ações</td>
            </tr>
            </thead>

            <tbody>
                @foreach ($pedidos as $pedido)
                <div id="modal1" class="modal">
                    <div class="modal-content">
                    <h4>Descrição do pedido</h4>
                    <p style="word-wrap: break-word">{{$pedido->descricao}}</p>
                    </div>
                </div>
                <tr>
                    <td>{{$pedido->servico->nome}}</td>
                    <td>
                        <a  class="btn-floating btn bg-gradient-green modal-trigger" href="#modal1">
                            <i class="large material-icons">comment</i>
                        </a>   
                    </td>
                    <td>R${{number_format($pedido->servico->price,2,',','.')}}</td>
                    @if($pedido->status == 1)
                    <td>Em andamento</td>
                    <td>
                        <form action="{{route('pedido.destroy',$pedido->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                            <button class="btn waves-effect waves-light red" type="submit">Cancelar<i class="material-icons right">clear</i></button>
                        </form>
                    </td>
                    @else
                    <td>Pronto</td>
                    <td><a class="btn waves-effect waves-light green" href="{{$pedido->entrega->arquivos}}" target="_blank">Visualizar<i class="material-icons right">check</i></a></td></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
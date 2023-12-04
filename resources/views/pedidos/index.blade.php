@extends('template.main')
@section('titulo','Pedidos')
@section('conteudo')
    <div class="container">
        @if($mensagem = Session::get('sucesso'))
            <div class="card green">
                <div class="card-content white-text">
                    <span class="card-title">Parabéns</span>
                    <p>{{$mensagem}}</p>
                </div>
            </div>
        @endif
        <div id="modalGraf" class="modal">
            <div class="modal-content center align-items-center">
            <h4>Grafico de pedidos</h4>
            <div class="text-center d-flex justify-content-center align-items-center" id="pizza"></div> 
            </div>
        </div>
        <a  class="btn btn bg-gradient-green modal-trigger" style="margin-top: 2rem" href="#modalGraf">
            Grafico de Pedidos<i class="material-icons left">pie_chart</i>
        </a>   
        <table>
            <h5>Pedidos:</h5>
            <thead>
            <tr>
                <th>Serviço</th>
                <th>Usuario</th>
                <th>Descrição</th>
                <th>Status</th>
            </tr>
            </thead>
    
            <tbody>
                
                @foreach ($pedidos as $pedido)
                <tr>
                    <div id="modal{{$pedido->id}}" class="modal">
                        <div class="modal-content">
                        <h4>Descrição do pedido</h4>
                        <p style="word-wrap: break-word">{{$pedido->descricao}}</p>
                        </div>
                    </div>
                    <td>{{$pedido->servico->nome}}</td>
                    <td>{{$pedido->user->name}}</td>
                    <td>

                        <a  class="btn-floating btn bg-gradient-green modal-trigger" href="#modal{{$pedido->id}}">
                            <i class="large material-icons">comment</i>
                        </a>   
                    </td>
                    @if($pedido->status == 1)
                        <td>Em espera<i class="material-icons left">watch_later</i></td>
                        <td>{{$pedido->id}}</td>
                        <td>
                            <form action="{{route('pedido.destroy',$pedido->id)}}" method="post" class="">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-floating waves-effect waves-light red"><i class="large material-icons right">remove_circle</i></button>
                            </form>
                        </td>
                        <td><a class="btn-floating waves-effect waves-light indigo" href="{{route('entrega.create',$pedido->id)}}"><i class="material-icons">check</i></a></td>
                    @else
                        <td>Entregue<i class="material-icons left">check</i></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    
        let pedidos = <?php echo $total_pedidos ?>;
    
        google.charts.load('current', {'packages':['corechart']})
        google.charts.setOnLoadCallback(drawChart);
    
        function drawChart() {
              
            data = google.visualization.arrayToDataTable(pedidos);
    
            options = {
                title: 'Pedidos',
                is3D: false,
                 width: 650,
                height: 350 
            };
    
            chart = new google.visualization.PieChart(document.getElementById('pizza'));
            chart.draw(data, options);
        }
    
    </script>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório PixelPerfect</title>
</head>
<style>
    th{
        width: 150px
    }
    td{
        border: 1px solid black;
    }
</style>
<body>
    <div style="text-align: center;">
        <h2>Relatório de Pedidos Entregues</h2>
    </div>
        <table>
            <thead>
                <tr style="text-align: center;">
                    <th style="border-style: solid; border-width: 1px; width:25px;">Id</th>
                    <th style="border-style: solid; border-width: 1px;">Serviço</th>
                    <th style="border-style: solid; border-width: 1px;">Usuario</th>
                    <th style="border-style: solid; border-width: 1px;">Feito em</th>
                    <th style="border-style: solid; border-width: 1px;">Entregue em</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $pedido)
                    <tr style="text-align: center;"> 
                        <td style="width: 100%;">{{ $pedido['id'] }}</td>
                        <td style="width: 100%;">{{ $pedido['servico'] }}</td>
                        <td style="width: 100%;">{{ $pedido['usuario'] }}</td>
                        <td style="width: 100%;">{{\Carbon\Carbon::parse($pedido['dataC'])->format('d/m/Y H:i:s') }}</td>
                        <td style="width: 100%;">{{\Carbon\Carbon::parse($pedido['dataF'])->format('d/m/Y H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
</body>
</html>
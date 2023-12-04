<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Relatorio;
use Barryvdh\DomPDF\Facade\Pdf;
class RelatorioController extends Controller
{
    public function createReport($tipo = 0) {

        $this->authorize('index', Pedido::class);
        $data = array();
        $data = $this->getDataPedidos();
        $pdf = Pdf::loadView('relatorios.pedido', compact('data'));
        return $pdf->stream('relatorio-pedido.pdf');

    }
    private function getDataPedidos() {

        $pedidos = Pedido::with('entrega')->get();
        $data = array();
        $cont = 0;
        foreach($pedidos as $pedido) {
            if(isset($pedido->entrega)){
                $data[$cont]['id'] = $pedido->id;
                $data[$cont]['servico'] = $pedido->servico->nome;
                $data[$cont]['usuario'] = $pedido->user->name;
                $data[$cont]['dataC'] = $pedido->created_at;
                $data[$cont]['dataF'] = $pedido->entrega->created_at;
                $cont++;
            }
        }

        return $data;
    }
}



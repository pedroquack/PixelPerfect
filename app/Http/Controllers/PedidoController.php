<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Servico;
use App\Models\User;
use App\Models\Entrega;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Pedido::class);
        $pedidos = Pedido::all();
        $pedidosG = Pedido::with('servico')->get();

        $data = array();
        $cont = 0;
        foreach($pedidosG as $pedido) {
            $data[$cont]['servico'] = $pedido->servico->nome;
            $cont++;
        }
        // return json_encode($data);

        // CALCULA TOTAL / MARCA
        $total_pedidos = array();
        $total_pedidos[0] = ['Pedidos', 'Qtde de Pedidos'];
        $cont = 1;
        foreach (array_count_values(array_column($data, 'servico')) as $key => $value) {
            $total_pedidos[$cont] = [$key, $value];
            $cont++;
        }
        $total_pedidos = json_encode($total_pedidos);

        return view('pedidos.index', compact(['pedidos','data', 'total_pedidos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $servico = Servico::find($id);
        return view('pedidos.create',compact('servico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'descricao' => 'required|max:1000|min:40',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $pedido = new Pedido();
        $pedido->servico_id = $request->servico_id;
        $pedido->user_id = $request->user_id;
        $pedido->descricao = $request->descricao;
        $pedido->status = 1;
        $pedido->entrega_id = null;
        $pedido->save();
        return redirect()->route('site.index')->with('sucesso','Pedido realizado com sucesso!');
    }

    public function meusPedidos(){
        $pedidos = Pedido::where('user_id',auth()->user()->id)->get();
        $entregas = Entrega::where('user_id',auth()->user()->id)->get();
        return view('pedidos.meusPedidos',compact('pedidos','entregas'));
    }

    public function destroy($id){
        $pedido = Pedido::find($id);
        $this->authorize('destroy',$pedido);
        $pedido->delete();
        return redirect()->back()->with('sucesso','Pedido cancelado com sucesso!');
    }
}

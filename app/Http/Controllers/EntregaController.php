<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrega;
use App\Models\Pedido;
class EntregaController extends Controller
{
    public function __construct(){
        
    }

    public function create($id){
        $this->authorize('admin', Entrega::class);
        $pedido = Pedido::find($id);
        return view('entregas.create',compact('pedido'));
    }
    public function store(Request $request){
        $this->authorize('admin', Entrega::class);

        $regras = [
            'arquivos' => 'required|max:1000|min:2',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $entrega = new Entrega();
        $entrega->user_id = $request->user_id;
        $entrega->servico_id = $request->servico_id;
        $entrega->arquivos = $request->arquivos;
        $entrega->save();

        $pedido = Pedido::find($request->pedido_id);
        $pedido->status = 0;
        $pedido->entrega_id = $entrega->id;
        $pedido->save();
        return redirect()->route('pedido.index')->with('sucesso','Pedido entregue com sucesso!');
    }
}

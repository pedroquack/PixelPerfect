<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin', Servico::class);
        $servicos = Servico::all();
        return view('servicos.index', compact('servicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin', Servico::class);
        return view('servicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin', Servico::class);
        $regras = [
            'nome' => 'required|max:60|min:2',
            'descricao' => 'required|max:1000|min:20',
            'price' => 'required',
            'imagem' => 'required',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $servico = new Servico();
        $servico->nome = $request->nome;
        $servico->descricao = $request->descricao;
        $servico->price = $request->price;
        if($request->imagem){
            $servico->imagem = $request->imagem->store('servicos');
        }
        $servico->save();
        return redirect()->route('servicos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servico = Servico::where('id', $id)->first();
        return view('servicos.show',compact('servico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function edit(Servico $servico)
    {
        $this->authorize('admin', Servico::class);
        return view('servicos.edit', compact('servico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servico $servico)
    {
        $this->authorize('admin', Servico::class);

        $regras = [
            'nome' => 'required|max:60|min:2',
            'descricao' => 'required|max:1000|min:20',
            'price' => 'required',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $servico->nome = $request->nome;
        $servico->descricao = $request->descricao;
        $servico->price = $request->price;
        if($request->imagem){
            $servico->imagem = $request->imagem->store('servicos');
        }
        $servico->save();
        return redirect()->route('servicos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servico $servico)
    {
        $this->authorize('admin', Servico::class);
        $servico->delete($servico);
        return redirect()->route('servicos.index');
    }
}

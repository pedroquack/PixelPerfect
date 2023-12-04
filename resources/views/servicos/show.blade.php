@extends('template.main')
@section('titulo', $servico->nome)
@section('conteudo')
<style>
    .elemento{
        height: 100%;
        display: flex;
    }
    .direita{
        background-color: white;
        display: flex;
        flex-direction: column;
        align-items: left;
        justify-content: space-between;
        height:auto;
        text-align: start;
    }
</style>
    <div class="row container center indigo elemento" style="margin-top: 2rem; padding:1rem;">
        <div class="col s12 m6">
            <img class="responsive-img" src="{{url("storage/{$servico->imagem}")}}" alt="" width="450px">
        </div>
        <div class="col s12 m6 direita">
            <div class="nomePrice">
                <h4 class="">{{$servico->nome}}</h4>
                <h6 class="">R${{number_format($servico->price,2,',','.')}}</h6>
                <p class="">{{$servico->descricao}}</p>
            </div>
            <a href="{{route('pedido.create',$servico->id)}}" style="margin-bottom: 2rem" class="btn">Contratar servico</a>
        </div>
    </div>
@endsection
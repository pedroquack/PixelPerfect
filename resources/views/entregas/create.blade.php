@extends('template.main')
@section('titulo','Entrega')
@section('conteudo')
    <div class="container">
        <form action="{{route('entrega.store')}}" method="POST" enctype="multipart/form-data" class="col s12">
          @csrf
          <input type="hidden" value="{{$pedido->id}}" name="pedido_id">
          <input type="hidden"value="{{$pedido->user_id}}" name="user_id">
          <input type="hidden" value="{{$pedido->servico->id}}" name="servico_id">
          <div class="row">
            <h4 class="small left">Entregar serviço</h4>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input disabled value="{{$pedido->servico->nome}}" id="disabled" type="text" class="validate">
              <label for="disabled">Serviço</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input disabled value="R${{number_format($pedido->servico->price,2,',','.')}}" id="disabled" type="text" class="validate">
              <label for="disabled">Valor</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea disabled id="disable" class="materialize-textarea">{{$pedido->descricao}}</textarea>
              <label for="disable">Descrição do pedido</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="arquivos" type="url" class="validate @if($errors->has('arquivos')) is-invalid @endif" name="arquivos">
              <label for="arquivos">Arquivos (URL)</label>
            </div>
            @if($errors->has('arquivos'))
                    <div class='invalid-feedback col s12'>
                        {{ $errors->first('arquivos') }}
                    </div>
            @endif
          </div>
          <div class="row">
            <a href="{{ url()->previous() }}" class="btn waves-effect waves-light red" type="submit">Voltar
              <i class="material-icons right">arrow_back</i>
            </a>
            <button class="btn waves-effect waves-light" type="submit">Fazer entrega
              <i class="material-icons right">check</i>
            </button>
          </div>
      </form>
    </div>
@endsection
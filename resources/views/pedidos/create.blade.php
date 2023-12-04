@extends('template.main')
@section('titulo','Pedido')
@section('conteudo')
    <div class="container">
        <form action="{{route('pedido.store')}}" method="POST" enctype="multipart/form-data" class="col s12">
          @csrf
          <input type="hidden"value="{{auth()->user()->id}}" name="user_id">
          <input type="hidden" value="{{$servico->id}}" name="servico_id">
          <div class="row">
            <h4 class="small left">Contratar serviço</h4>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input disabled value="{{$servico->nome}}" id="disabled" type="text" class="validate">
              <label for="disabled">Serviço</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input disabled value="R${{number_format($servico->price,2,',','.')}}" id="disabled" type="text" class="validate">
              <label for="disabled">Valor</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea id="descricao" name="descricao" class="materialize-textarea @if($errors->has('descricao')) is-invalid @endif"></textarea>
              <label for="descricao">Descrição do pedido</label>
            </div>
            @if($errors->has('descricao'))
                    <div class='invalid-feedback col s12'>
                        {{ $errors->first('descricao') }}
                    </div>
            @endif
          </div>
          <div class="row">
            <a href="{{ url()->previous() }}" class="btn waves-effect waves-light red" type="submit">Voltar
              <i class="material-icons right">arrow_back</i>
            </a>
            <button class="btn waves-effect waves-light" type="submit">Fazer pedido
              <i class="material-icons right">shopping_basket</i>
            </button>
          </div>
      </form>
    </div>
@endsection
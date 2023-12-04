@extends('template.main')
@section('titulo','Editar serviço')
@section('conteudo')
<div class="container center">
    <h4 class="left">Editar serviço</h4>
    <form action="{{route('servicos.update',$servico)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="input-field col s12">
              <input name="nome" id="nome" type="text" class="validate @if($errors->has('nome')) is-invalid @endif" value="{{$servico->nome}}">
              <label for="nome">Nome do serviço</label>
            </div>
            @if($errors->has('nome'))
                    <div class='invalid-feedback col s12'>
                        {{ $errors->first('nome') }}
                    </div>
            @endif
        </div>
        <div class="row">
            <div class="input-field col s12">
              <textarea name="descricao" id="textarea1" class="materialize-textarea @if($errors->has('descricao')) is-invalid @endif">{{$servico->descricao}}</textarea>
              <label for="textarea1">Descrição do serviço</label>
            </div>
            @if($errors->has('descricao'))
                    <div class='invalid-feedback col s12'>
                        {{ $errors->first('descricao') }}
                    </div>
            @endif
        </div>
        <div class="row">
            <div class="input-field col s12">
              <input name="price" id="price" type="number" class="validate @if($errors->has('price')) is-invalid @endif" value="{{$servico->price}}">
              <label for="price">Valor do serviço</label>
            </div>
            @if($errors->has('price'))
                    <div class='invalid-feedback col s12'>
                        {{ $errors->first('price') }}
                    </div>
            @endif
        </div>
        <div class="row">
            <div class="file-field input-field">
                <div class="btn">
                  <span>Imagem</span>
                  <input type="file" name="imagem">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Faça o upload da sua imagem aqui">
                </div>
            </div>
        </div>
        <a href="{{route('servicos.index')}}" class="btn waves-effect waves-light red" type="submit" name="action">Voltar
            <i class="material-icons right">arrow_back</i>
        </a>
        <button class="btn waves-effect waves-light green" type="submit" name="action">Editar serviço
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>
@endsection
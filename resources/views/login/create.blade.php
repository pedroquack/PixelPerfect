@extends('template.main')
@section('titulo','Registrar')
@section('conteudo')
    <div class="container center">
    @if($mensagem = Session::get('erro'))
        <div class="card red">
            <div class="card-content white-text">
                <span class="card-title">Erro</span>
                <p>{{$mensagem}}</p>
            </div>
        </div>
    @endif
        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                  <input name="name" value="" type="text" id="name">
                  <label for="name">Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                  <input name="email" value="" type="email" id="email">
                  <label for="email">E-Mail</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                  <input name="password" value="" type="password" id="password">
                  <label for="password">Senha</label>
                </div>
            </div>
            <div class="row">
                <p class="col">
                    <label>
                      <input value="1" name="admin" type="radio" />
                      <span>Admin</span>
                    </label>
                  </p>
                  <p class="col">
                    <label>
                      <input value="0" name="admin" type="radio" checked />
                      <span>Cliente</span>
                    </label>
                  </p>
            </div>
            <div class="row">
                <button class="btn waves-effect waves-light right" type="submit">Cadastrar
                  <i class="material-icons right">arrow_forward</i>
                </button>
            </div>
        </form>
    </div>
@endsection

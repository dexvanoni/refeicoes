@extends('admin.gestao')

@section('title')
  Eduardo Refeições - Insere Cliente
@endsection

@section('pagina')
  <div class="container">
      <h5>Novo Cliente</h5>
  <hr>
      <form class="col-md-8 mx-auto" action="{{ route('clientes.store') }}" method="post" >
        {{ csrf_field() }}
        <div class="row">
          <div class="form-group col">
            <label for="nome">Nome Completo</label>
            <input type="text" name="nome_completo" class="form-control" id="nome" placeholder="Nome completo do cliente">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-5">
            <label for="rua">Rua</label>
            <input type="text" name="rua" class="form-control" id="rua" placeholder="Logradouro">
          </div>
          <div class="form-group col-3">
            <label for="numero">Número</label>
            <input type="text" name="numero" class="form-control" id="numero" placeholder="Número">
          </div>
          <div class="form-group col">
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Bairro">
          </div>
        </div>
        <div class="row">
          <div class="form-group col">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
          </div>
        </div>
        <div class="row">
          <div class="form-group col">
            <label for="tel">Contato</label>
            <input type="text" name="tel" class="form-control" id="tel" placeholder="Telefone">
          </div>
          <div class="form-group col">
            <label for="empresa">Empresa</label>
            <input type="text" name="empresa" class="form-control" id="empresa" placeholder="Empresa">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
  </div>
@endsection

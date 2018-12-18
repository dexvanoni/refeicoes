@extends('admin.gestao')

@section('title')
  Eduardo Refeições - Insere Produto
@endsection

@section('pagina')
  <div class="container">
    <h5>Novo Produto</h5>
    <hr>
      <form class="col-md-6 mx-auto" action="{{ route('produtos.store') }}" method="post" >
        {{ csrf_field() }}
          <div class="form-group ">
            <label for="nome">Produto</label>
            <input type="text" name="nome" class="form-control" id="nome" placeholder="Produto">
             <small id="valorHelp" class="form-text text-muted">Não utilize espaço</small>
          </div>
          <div class="form-group">
            <label for="valor">Valor</label>
            <input type="text" name="valor" class="form-control" id="rua" placeholder="Valor de venda">
            <small id="valorHelp" class="form-text text-muted">NUNCA use vígula para separação de casas decimais. Utilize "." (ponto)</small>
          </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
  </div>
@endsection

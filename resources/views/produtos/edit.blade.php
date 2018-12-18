@extends('admin.gestao')

@section('title')
  Eduardo Refeições - Edita Produto
@endsection

@section('pagina')
  <div class="container">
    <h5>Edição do Produto: {{ $produtos->nome }}</h5>
    <hr>
      <form class="col-md-6 mx-auto" action="{{ route('produtos.update', ['produto' => $produtos->id]) }}" method="post" >
        {{ csrf_field() }}
        {{ method_field('PUT') }}
          <div class="form-group ">
            <label for="nome">Produto</label>
            <input type="text" name="nome" class="form-control" id="nome" value="{{ $produtos->nome }}" placeholder="Produto">
            <small id="valorHelp" class="form-text text-muted">Não utilize espaço</small>
          </div>
          <div class="form-group">
            <label for="valor">Valor</label>
            <input type="text" name="valor" class="form-control" id="valor" value="{{ $produtos->valor }}" placeholder="Valor de venda">
            <small id="valorHelp" class="form-text text-muted">NUNCA use vígula para separação de casas decimais. Utilize "." (ponto)</small>
          </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
  </div>
@endsection

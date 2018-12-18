@extends('admin.gestao')

@section('title')
Eduardo Refeições - Novo Pedido
@endsection

@section('pagina')
<div class="container">
  <h5>Novo Pedido</h5>
  <hr>
  <form class="col-md-6 mx-auto" action="{{ route('pedidos.store') }}" method="post" >
    {{ csrf_field() }}
    
    <div class="form-group">
      <label for="exampleFormControlSelect1">Selecione o Cliente</label>
      <select class="form-control" id="exampleFormControlSelect1" name="cliente_id">
        <option value="">Selecione</option>
        @foreach ($clientes as $cliente)
        <option value="{{ $cliente->id }}">{{ $cliente->nome_completo }}</option>
        @endforeach
      </select>
    </div>
    
    <h6>Selecione os produtos adquiridos</h6>
    <div class="form-check">
      <script >
          function sum(){
             let total = 0;
             let valor = 0;
             let valor_un = 0;
             $('.fields input').each(function(i) {
                valor =  $(this).val();
                // pega o valor correspondente  
                valor_un =  $('[name="val_un['+i+']"]').val();
                total_un = valor*valor_un;
             
                total += total_un;
             });
             
             // aqui eu substituo o ponto por vírgula para ficar no formato brasileiro
             // e pegando apenas 2 casas decimais com .toFixed(2)
             total = total.toFixed(2);
             
             $('#total').val(total);
          }
      </script>
      @php
      $p = count($produtos);
      $i = 0;
      @endphp
      @foreach ($produtos as $produto)
      <div class="row ">
        <div class="col-8 produto">
          <input class="form-check-input" type="checkbox" id="produto_id[{{ $i }}]" value="{{ $produto->nome }}" name="produto_id[{{ $i }}]" >
          <label class="form-check-label" for="inlineCheckbox1" style="margin-right: 10px">{{ $produto->nome }} - R$ {{ $produto->valor }}</label>
            <div class="valor">
            <input type="hidden" name="val_un[{{ $i }}]" value="{{ $produto->valor }}" id="val_un[{{ $i }}]">
            </div>  
        </div>
        <div class="col fields">
          <input class="form-control" type="text" id="quantidade[{{ $i }}]" name="quantidade[{{ $i }}]" onblur="sum()" placeholder="Quantidade" value="">  
        </div>  
      </div>
      <hr>
      @php
        $i++; 
      @endphp
      @endforeach
    </div>
    <div class="row">
      <div class="col-8">
        <div class="form-group">
          <label for="total">Valor Total</label>
          <input type="total" class="form-control" id="total" name="total" aria-describedby="emailHelp" value="">
        </div>  
      </div>
      <div class="col" style="margin-top: 20px">
        <div class="form-check ">
          <input class="form-check-input" type="radio" name="pago" id="pagoS" value="S" checked>
          <label class="form-check-label" for="pagoS">
            Pago
          </label>
        </div>
        <div class="form-check ">
          <input class="form-check-input" type="radio" name="pago" id="pagoN" value="N">
          <label class="form-check-label" for="pagoN">
            Em débito
          </label>
        </div>       
      </div>
    </div>
    <hr>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </div>
</form>
</div>
@endsection

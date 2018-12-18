@extends('admin.gestao')

@section('title')
Eduardo Refeições - Página do Cliente
@endsection

@section('pagina')
<div class="container">
  <h5>Página do Cliente: Sr.(a) {{ $clientes->nome_completo }} - Telefone: {{ $clientes->tel }} - Gerar Relatório: <a href="{{ route('generate-pdf', ['cliente' => $clientes->id]) }}"><i class="far fa-file-pdf"></i></a></h5>
   
  <hr>
  <table class="display nowrap" id="clientes_index" style="width: 100%;">
    <thead>
      <tr>
        <th style="width: 15px; text-align: center">ID</th>
        <th style="width: 150px; text-align: center">Nome</th>
        <th style="text-align: center">Nº total de Pedidos</th>
        <th style="text-align: center">Nº de pedidos em Débito</th>
        <th style="text-align: center">Valor Pago</th>
        <th style="text-align: center">Valor em débito</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td style="text-align: center" >{{ $clientes->id }}</td>
        <td style="text-align: center" >{{ $clientes->nome_completo }}</td>
        <td style="text-align: center" >{{ $total_pedidos }}</td>
        <td style="text-align: center" >{{ $total_debito }}</td>
        <td style="color: green; text-align: center">R$ {{ $pagou }}</td>
        <td style="color: red; text-align: center">R$ {{ $saldo_devedor }}</td>
      </tr>
    </tbody>
  </table>

  <hr>
  <h5>Lista de pedidos do Cliente</h5>
  <hr>

  <table class="display nowrap" id="clientes_index2" style="width: 100%;">
    <thead>
      <tr>
        <th style="width: 10px; text-align: center">Nº do Pedido</th>
        <th style="width: 10px; text-align: center">Status</th>
        <th style="text-align: center">Produto/Qtn.</th>
        <th style="text-align: center">Valor</th>
        <th style="text-align: center">Data/Hora</th>
        <th style="width: 100px; text-align: center">Ações</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($dados_gerais as $pedido)
      <tr>
        <td style="text-align: center">{{ $pedido->id }}</td>
        <td style="text-align: center">@if ($pedido->pago != 'S')
          <!--Se não pagou-->
          <i title="Esse pedido está em débito" class="fas fa-exclamation-triangle" style="color: #e64980"></i>
          @else
          <i title="PAGO" class="fas fa-check-double" style="color: #40FF00"></i>
          @endif
          <!--Se deve mais que 30 dias-->
          @if ($pedido->created_at->diffInDays($hoje) > '30' && $pedido->pago != 'S')
          <i title="{{ $pedido->created_at->diffInDays($hoje) }} dias devendo" class="fas fa-angry"></i>
          @endif
        </td>
        <td>
          <div class="row">
            <div class="col-8">
              @php
              $data = $pedido->produtos;
              $datas = explode(" ", $data);
              @endphp
              @foreach ($datas as $element)
              {{ $element }}<br> 
              @endforeach      
            </div>
            <div class="col">
              @php
              $data2 = $pedido->quantidade;
              $datas2 = explode(" ", $data2);
              @endphp
              @foreach ($datas2 as $element2)
              {{ $element2 }}<br>
              @endforeach                
            </div>
          </div>
        </td>
        <td style="text-align: center">{{ $pedido->total }}</td>
        <td style="text-align: center">{{ date('d/m/Y H:i', strtotime($pedido->created_at)) }}</td>
        <td style="text-align: center">
          <ul class="list-inline list-small">
            <li>
              @if ($pedido->pago != 'S')
              <li class="list-inline-item">
                <a onclick="return confirm('\nTem certeza que deseja cobrar este cliente?'); return false;" title="Cobrar" href="{{ route('cobrar', ['pedido' => $pedido->id]) }}" class="btn btn-warning   btn-sm">
                  <span class="fas fa-hand-holding-usd"></span>
                </a>
              </li>
              <li class="list-inline-item"><a onclick="return confirm('\nEste cliente pagou o débito?'); return false;" title="Pagar" href="{{ route('pagar', ['pedido' => $pedido->id]) }}" class="btn btn-primary btn-sm"><span class="fas fa-money-bill-alt"></span></a></li>
              @endif
            </li>
            <!--<li class="list-inline-item"><a title="Editar" href="{{ route('pedidos.edit', ['pedido' => $pedido->id]) }}" class="btn btn-warning btn-sm"><span class="fas fa-edit"></span></a></li>-->
            <li title="Excluir" class="list-inline-item">
              <form  action="{{ route('pedidos.destroy', ['pedido' => $pedido->id]) }}" onsubmit="return confirm('\nTem certeza que deseja excluir esta nota?'); return false;" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt "></span></button>
              </form>
            </li>
          </ul>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>


</div>
@endsection

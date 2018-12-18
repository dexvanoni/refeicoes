@extends('admin.gestao')

@section('title')
Eduardo Refeições - Lista de Pedidos
@endsection

@section('pagina')
<div class="container">
  <h5>Lista de Pedidos</h5>     
  <h6>Data de hoje: {{ date('d/m/Y', strtotime($hoje)) }}</h6>
  <hr>
  @if ( count($devedores) > 0)
  <div class="float-right">
    <h6 style="color: red">{{ count($devedores) }} pedido(s) em débito </h6>
  </div>
  @else
  <div class="float-right">
    <h6 style="color: blue">Todos os pedidos foram pagos. </h6>
  </div>
  @endif
  
  <table class="display nowrap" id="pedidos_index" style="width: 100%;">
    <thead>
      <tr>
        <th style="width: 15px">ID</th>
        <th style="width: 15px">Pagp</th>
        <th style="width: 20%">Cliente</th>
        <th style="width: 20%">Entrega</th>
        <th style="width: 15%">Produto</th>
        <th style="width: 10%">A pagar</th>
        <th style="width: 10%">Data</th>
        <th style="width: 100px">Ações</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($pedidos as $pedido)
      <tr>
        <td >{{ $pedido->id }}</td>
        <td >{{ $pedido->pago }}</td>
        <td >@if ($pedido->pago != 'S')
          <!--Se não pagou-->
          <i title="Esse pedido está em débito" class="fas fa-exclamation-triangle" style="color: #e64980"></i>
          @else
          <i title="PAGO" class="fas fa-check-double" style="color: #40FF00"></i>
          @endif
          <!--Se deve mais que 30 dias-->
          @if ($pedido->created_at->diffInDays($hoje) > '30' && $pedido->pago != 'S')
          <i title="{{ $pedido->created_at->diffInDays($hoje) }} dias devendo" class="fas fa-angry"></i>
          @endif
          {{ $pedido->clientes->nome_completo }}
        </td>
        <td >{{ $pedido->clientes->rua }}, {{ $pedido->clientes->numero }} - {{ $pedido->clientes->bairro }} </td>
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
        <td>{{ $pedido->total }}</td>
        <td>{{ date('d/m/Y', strtotime($pedido->created_at)) }}</td>
        <td>
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

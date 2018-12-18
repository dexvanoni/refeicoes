@extends('layouts.app')

@section('title')
Relatório de Pedidos - Mensal
@endsection

@section('css')

@endsection

@section('content')
<div class="container">
	<form class="mx-auto" method="post" action="{{ route('relatorios.pes_mes') }}">
		{{ csrf_field() }}
		<div class="form-row">
			<div class="col-4">
				<select class="form-control" name="mes">
					<option selected>Selecione o mês</option>
					<option value="1">Janeiro</option>
					<option value="2">Fevereiro</option>
					<option value="3">Março</option>
					<option value="4">Abril</option>
					<option value="5">Maio</option>
					<option value="6">Junho</option>
					<option value="7">Julho</option>
					<option value="8">Agosto</option>
					<option value="9">Setembro</option>
					<option value="10">Outubro</option>
					<option value="11">Novembro</option>
					<option value="12">Dezembro</option>
				</select>
			</div>
			<div class="col-2">
				<input type="text" class="form-control" placeholder="Digite o Ano" name="ano">
			</div>
			<div class="col-2">
				<button class="btn btn-primary">Pesquisar</button>
			</div>
		</div>
	</form>
@isset ($total_pedidos)
    <hr>

    <h5>Relatório de pedidos realizados em {{ $mes }}/{{  $ano }}</h5>

	<table class="display nowrap" id="clientes_index" style="width: 100%;">
		<thead>
			<tr>
				<th style="width: 15px">Nº Total de Pedidos</th>
				<th>Nº de Pedidos Pagos</th>
				<th>Nº de Pedidos em Débito</th>
				<th >Créditos</th>
				<th >Em Débito</th>
				<th >Previsão</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td >{{ count($total_pedidos) }}</td>
				<td >{{ count($pedidos_pagos) }}</td>
				<td >{{ count($pedidos_debito) }}</td>
				<td title="Valor recebido referente aos pedidos pagos">{{ $creditos }}</td>
				<td title="Valor referente aos pedidos em débito">{{ $debitos }}</td>
				<td title="Valor total a ser recebido no mês." >{{ $previsao }}</td>
			</tr>
		</tbody>
	</table>

	<hr>

	<h5>Clientes em débito</h5>
	@foreach ($pedidos_debito as $calote)
		<strong>Nº do Pedido:</strong> {{ $calote->id }} <strong>- Cliente: </strong>{{ $calote->clientes->nome_completo }}<br>
	@endforeach

	<hr>

	<h6>Data do relatório: {{ $data_corrente }}</h6>
@endisset
	
</div>
@endsection

@section('scripts')

@endsection

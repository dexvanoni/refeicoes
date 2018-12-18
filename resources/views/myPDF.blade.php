<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
</head>
<body>

	<div class="container">
	<h5>Eduardo Refeições - Relatório</h5>
	<hr>

		<h5>Página do Cliente: Sr.(a) {{ $clientes->nome_completo }} - Telefone: {{ $clientes->tel }}</h5>
		<hr>
		<table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" style="width: 100%;">
			<thead>
				<tr>
					<th style="width: 15px; text-align: center">ID</th>
					<th style="width: 150px; text-align: center">Nome</th>
					<th style="text-align: center">Nº total de Pedidos</th>
					<th style="text-align: center">Nº de pedidos em Débito</th>
					<!--<th style="text-align: center">Valor Pago</th>-->
					<th style="text-align: center">Valor em débito</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td style="text-align: center" >{{ $clientes->id }}</td>
					<td style="text-align: center" >{{ $clientes->nome_completo }}</td>
					<td style="text-align: center" >{{ $total_pedidos }}</td>
					<td style="text-align: center" >{{ $total_debito }}</td>
					<!--<td style="color: green; text-align: center">R$ {{ $pagou }}</td>-->
					<td style="color: red; text-align: center">R$ {{ $saldo_devedor }}</td>
				</tr>
			</tbody>
		</table>

		<hr>
		<h5>Lista de pedidos do Cliente</h5>
		<hr>

		<table border=1 cellspacing=0 cellpadding=2 bordercolor="666633" style="width: 100%;">
			<thead>
				<tr>
					<th >Nº do Pedido</th>
					<th >Status</th>
					<th >Produto/Qtn.</th>
					<th >Valor</th>
					<th >Data/Hora</th>
				</tr>
			</thead>

			<tbody>
				@foreach ($dados_gerais as $pedido)
				<tr>
					<td >{{ $pedido->id }}</td>
					<td >@if ($pedido->pago != 'S')
						<!--Se não pagou-->
						Em débito
						@else
						Pago
						@endif
						<!--Se deve mais que 30 dias-->
						@if ($pedido->created_at->diffInDays($hoje) > '30' && $pedido->pago != 'S')
						Em débito >30 dias
						@endif
					</td>
					<td>
						<div>
							<div>
								@php
								$data = $pedido->produtos;
								$datas = explode(" ", $data);
								@endphp
								@foreach ($datas as $element)
								{{ $element }}<br> 
								@endforeach      
							</div>
							<div >
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
					<td >{{ $pedido->total }}</td>
					<td> {{ date('d/m/Y H:i', strtotime($pedido->created_at)) }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		Relatório criado em {{ date('d/m/Y H:i', strtotime($hoje)) }}
	</div>
</body>
</html>
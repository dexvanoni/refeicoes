<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<h5>Seu pedido nº: {{ $pedido->id }} ainda não foi RECEBIDO! </h5> 
<hr>
Detalhes do pedido:<br><br>
Data do Pedido: {{ date('d/m/Y H:i', strtotime($pedido->created_at)) }}<br><br>
Itens:
@php
	$data = $pedido->produtos;
  $datas = explode(" ", $data);
  $data2 = $pedido->quantidade;
  $datas2 = explode(" ", $data2);
@endphp
<br>
<table style="float:left;">
	<thead>
		<tr>
			<th>Produtos</th>
		</tr>
	</thead>
	<tbody>
			<tr>				
				<td>
					@foreach ($datas as $element)
					{{ $element }} <br>					
					@endforeach
				</td>
			</tr>
	</tbody>
</table>
<table>
	<thead>
		<tr>
			<th>Qtn</th>
		</tr>
	</thead>
	<tbody>
			<tr style="text-align: center">				
				<td>
					@foreach ($datas2 as $element2)
					{{ $element2 }}<br>					
					@endforeach
				</td>
			</tr>
	</tbody>
</table>
<br>
             
Valor a pagar: {{ $pedido->total }}<br>
 Situação: 
              @if ($pedido->pago == 'S')
              	Pago <br><br>
              @else
              	Em débito <br><br>
              @endif
			<h3>SE O VALOR JÁ FOI QUITADO, FAVOR DESCONSIDERAR ESTA MENSAGEM!</h3><br><br>              
              Agradecemos a preferência!<br>
              <h6>Email automático gerado por sistema próprio! Favor não responder.</h6><br>
              Eduardo Refeições! Contato: (67) 99627-9688<br><br>
				
              <h6>Desenvolvido por WEBDev|2018</h6>

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

</body>
</html>

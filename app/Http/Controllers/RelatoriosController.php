<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Pedido;
use App\Cliente;
use App\Produto;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;

class RelatoriosController extends Controller
{
    public function index()
    {

      //$data_cg = Carbon::now('America/Campo_Grande');
      //$mes_corrente = Carbon::now('America/Campo_Grande')->isoFormat('MMMM YYYY');
      //return view('pedidos.relatorio', compact('pedidos', 'mes_corrente', 'data_cg'));
    	return view('pedidos.relatorio');
      
    }

    public function pes_mes(Request $request){
      $ano = $request->ano;
      $mes = $request->mes;
      
      $total_pedidos = Pedido::with('clientes')
      	->whereYear('created_at', $ano)
      	->whereMonth('created_at', $mes)
      	->get();

      $pedidos_pagos = Pedido::with('clientes')
      	->whereYear('created_at', $ano)
      	->whereMonth('created_at', $mes)
      	->where('pago', '=', 'S')
      	->get();

      $pedidos_debito = Pedido::with('clientes')
      	->whereYear('created_at', $ano)
      	->whereMonth('created_at', $mes)
      	->where('pago', '=', 'N')
      	->get();

      $creditos = Pedido::with('clientes')
      	->whereYear('created_at', $ano)
      	->whereMonth('created_at', $mes)
      	->where('pago', '=', 'S')
      	->sum('total');
      	

      $debitos = Pedido::with('clientes')
      	->whereYear('created_at', $ano)
      	->whereMonth('created_at', $mes)
      	->where('pago', '=', 'N')
      	->sum('total');

      	$total = Pedido::with('clientes')
      	->whereYear('created_at', $ano)
      	->whereMonth('created_at', $mes)
      	->sum('total');
      	

      $previsao = $total;

      $data_corrente = Carbon::now('America/Campo_Grande')->isoFormat('DD/MM/YYYY HH:mm');

       return view('pedidos.relatorio', compact('total_pedidos', 'pedidos_pagos', 'pedidos_debito', 'creditos', 'debitos', 'previsao', 'data_corrente', 'mes', 'ano'));
    }
}

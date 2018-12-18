<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
class ClientesController extends Controller
{
    public function __construct(Cliente $clientes)
    {
      $this->clientes = $clientes;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = Cliente::create($request->all());

        return redirect()->action('ClientesController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
      
      $clientes = Cliente::find($cliente->id);
      $dados_gerais = $clientes->pedidos;
      $total_gasto = $dados_gerais->sum('total');

      $clientes_dev = Cliente::find($cliente->id)->pedidos->where('pago', '=', 'N');
      $clientes_pago = Cliente::find($cliente->id)->pedidos->where('pago', '=', 'S');
      $total_pedidos = count($dados_gerais);

      $saldo_devedor = $clientes_dev->sum('total');
      $pagou = $clientes_pago->sum('total');
      $total_debito = count($clientes_dev);
      $hoje = Carbon::now();

      /*echo $clientes->nome_completo;
      dd([
        $dados_gerais,
        $total_gasto,
        $clientes_dev,
        $saldo_devedor,
        $total_pedidos,
        $pagou
      ]);
      exit;
      */
      return view('clientes.show', compact('clientes', 'dados_gerais', 'total_gasto', 'saldo_devedor', 'total_pedidos', 'pagou', 'hoje', 'total_debito'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
      $clientes = Cliente::find($cliente->id);
      return view('clientes.edit', compact('clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
      $clientes = Cliente::find($cliente->id);
      $data = $request->all();
      $clientes->fill($data)->save();
      return redirect()->action('ClientesController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
      $clientes = Cliente::find($cliente->id);
      $clientes->delete();
      return redirect()->action('ClientesController@index');
    }

    public function generatePDF(Cliente $cliente)

    {

      $clientes = Cliente::find($cliente->id);
      $dados_gerais = $clientes->pedidos;
      $total_gasto = $dados_gerais->sum('total');

      $clientes_dev = Cliente::find($cliente->id)->pedidos->where('pago', '=', 'N');
      $clientes_pago = Cliente::find($cliente->id)->pedidos->where('pago', '=', 'S');
      $total_pedidos = count($dados_gerais);

      $saldo_devedor = $clientes_dev->sum('total');
      $pagou = $clientes_pago->sum('total');
      $total_debito = count($clientes_dev);
      $hoje = Carbon::now();

      $titulo = ['title' => 'Carteira do Cliente'];

        //$pdf = PDF::loadView('myPDF', $data);
        $pdf = PDF::loadView('myPDF', compact('clientes', 'dados_gerais', 'total_gasto', 'saldo_devedor', 'total_pedidos', 'pagou', 'hoje', 'total_debito', 'titulo'));
  

        return $pdf->download('Rela_'.$cliente->nome_completo.'.pdf');

    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Pedido;
use App\Cliente;
use App\Produto;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class PedidosController extends Controller
{

  /*public function __construct(Pedidos $pedidos, Produto $produtos, Cliente $clientes)
  {
    $this->pedidos = $pedidos;
    $this->produtos = $produtos;
    $this->clientes = $clientes;
  }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $column = Input::get('orderBy', 'pago');
      $pedidos = Pedido::with('clientes')->orderBy($column)->get();
      $produtos = Produto::all();
      $hoje = Carbon::now();
      $devedores = Pedido::where('pago', '=', 'N')->get();

      return view('pedidos.index', compact('pedidos', 'produtos', 'hoje', 'devedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $clientes = Cliente::all()->sortBy('nome_completo');
      $produtos = Produto::all();

      return view('pedidos.create', compact('clientes', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $pedidos = new Pedido;
      
      $todos_produtos = "";
      foreach($request->produto_id as $item) {
        $todos_produtos.=$item." ";
      }

      $todas_qtns = "";
      foreach($request->quantidade as $qtns) {
        if ($qtns != NULL) {
          $todas_qtns.=$qtns." ";
        }
     }

      $pedidos->produtos = $todos_produtos;
      $pedidos->quantidade = $todas_qtns;
      $pedidos->cliente_id = $request->cliente_id;
      $pedidos->total = $request->total;
      $pedidos->pago = $request->pago;

      //envio de email para cliente confirmando o pedido
      $para = $pedidos->clientes->email;

      Mail::send('mail.new_pedido', ['para' => $para, 'pedido' => $pedidos], function($m) use ($para){
        $m->from('eduardo.refeicao@gmail.com', 'Eduardo Refeições');
        $m->subject('Novo Pedido - Eduardo Refeições');
        $m->to($para);
      });

      $pedidos->save();
      return redirect()->route('pedidos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedidos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedidos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $pedidos = Pedido::find($id);
        $para = $pedidos->clientes->email;

        Mail::send('mail.cancela_pedido', ['para' => $para, 'pedido' => $pedidos], function($m) use ($para){
        $m->from('eduardo.refeicao@gmail.com', 'Eduardo Refeições');
        $m->subject('Pedido CANCELADO - Eduardo Refeições');
        $m->to($para);
      });
        
        Pedido::destroy($id);
        return redirect(url()->previous());

        //return redirect()->route('pedidos.index');
    }
    public function pagar($id)
    {
      
      $pedidos = Pedido::find($id);
      $pedidos->pago = 'S';
      $pedidos->save();

      $para = $pedidos->clientes->email;

      Mail::send('mail.paga_pedido', ['para' => $para, 'pedido' => $pedidos], function($m) use ($para){
        $m->from('eduardo.refeicao@gmail.com', 'Eduardo Refeições');
        $m->subject('Pedido PAGO - Eduardo Refeições');
        $m->to($para);
      });
      return redirect(url()->previous());
      //return redirect()->route('pedidos.index');
    }

        public function cobrar($id)
    {

      $pedidos = Pedido::find($id);
      
      $para = $pedidos->clientes->email;

      Mail::send('mail.cobrar_pedido', ['para' => $para, 'pedido' => $pedidos], function($m) use ($para){
        $m->from('eduardo.refeicao@gmail.com', 'Eduardo Refeições');
        $m->subject('Pedido EM DÉBITO - Eduardo Refeições');
        $m->to($para);
      });

      return redirect(url()->previous());
      //return redirect()->route('pedidos.index');
    }

  }

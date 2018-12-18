<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
  public function __construct(Produto $produtos)
  {
    $this->produtos = $produtos;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $produtos = Produto::all();
      return view('produtos.index', compact('produtos'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('produtos.create', compact('produtos'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $produtos = Produto::create($request->all());

      return redirect()->action('ProdutosController@index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Produto  $produto
   * @return \Illuminate\Http\Response
   */
  public function show(Produto $produto)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Produto  $produto
   * @return \Illuminate\Http\Response
   */
  public function edit(Produto $produto)
  {
    $produtos = Produto::find($produto->id);
    return view('produtos.edit', compact('produtos'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Produto  $produto
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Produto $produto)
  {
    $produtos = Produto::find($produto->id);
    $data = $request->all();
    $produtos->fill($data)->save();
    return redirect()->action('ProdutosController@index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Produto  $produto
   * @return \Illuminate\Http\Response
   */
  public function destroy(Produto $produto)
  {
    $produtos = Produto::find($produto->id);
    $produtos->delete();
    return redirect()->action('ProdutosController@index');
  }
}

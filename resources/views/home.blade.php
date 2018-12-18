@extends('layouts.app')

@section('css')

@endsection

@section('style')

@endsection

@section('content')

  <div class="col-md-6 mx-auto" style="margin-top:50px">
    <a href="{{ route('pedidos.create') }}" class="btn btn-primary btn-lg btn-block">Novo Pedido</a>
  </div>

  <div class="col-md-6 mx-auto" style="margin-top:50px">
    <a href="{{ route('gestao') }}" class="btn btn-success btn-lg btn-block">Gestão</a>
  </div>

@endsection

@section('script')

@endsection

@extends('admin.gestao')

@section('title')
  Eduardo Refeições - Lista de Clientes
@endsection

@section('pagina')
  <div class="container">
  <h5>Lista de Clientes</h5>
  <hr>
    <table class="display nowrap" id="clientes_index" style="width: 100%;">
                <thead>
                  <tr>
                    <th style="width: 15px">ID</th>
                    <th style="width: 150px">Nome</th>
                    <th>Endereço</th>
                    <th>Email</th>
                    <th>Contato</th>
                    <th>Empresa</th>
                    <th style="width: 100px">Ações</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($clientes as $cliente)
                    <tr>
                      <td >{{ $cliente->id }}</td>
                      <td >{{ $cliente->nome_completo }}</td>
                      <td >{{ $cliente->rua }}, {{ $cliente->numero }} - {{ $cliente->bairro }}</td>
                      <td >{{ $cliente->email }}</td>
                      <td >{{ $cliente->tel }}</td>
                      <td >{{ $cliente->empresa }}</td>
                      <td>
                        <ul class="list-inline list-small">
                              <li class="list-inline-item"><a title="Editar" href="{{ route('clientes.edit', ['cliente' => $cliente->id]) }}" class="btn btn-warning btn-sm"><span class="fas fa-edit"></span></a></li>
                              <li class="list-inline-item"><a title="Show" href="{{ route('clientes.show', ['cliente' => $cliente->id]) }}" class="btn btn-primary btn-sm"><span class="fas fa-user-cog"></span></a></li>
                              <li title="Excluir" class="list-inline-item">
                                <form  action="{{ route('clientes.destroy', ['cliente' => $cliente->id]) }}" onsubmit="return confirm('\nTem certeza que deseja excluir esta nota?'); return false;" method="post">
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

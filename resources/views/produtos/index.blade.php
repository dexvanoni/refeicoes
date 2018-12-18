@extends('admin.gestao')

@section('title')
  Eduardo Refeições - Lista de Produtos
@endsection

@section('pagina')
  <div class="container">
  <h5>Lista de Produtos</h5>
  <hr>
    <table class="display nowrap" id="clientes_index" style="width: 100%;">
                <thead>
                  <tr>
                    <th style="width: 15px">ID</th>
                    <th>Produto</th>
                    <th>Valor</th>
                    <th style="width: 100px">Ações</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($produtos as $produto)
                    <tr>
                      <td >{{ $produto->id }}</td>
                      <td >{{ $produto->nome }}</td>
                      <td >R$ {{ $produto->valor }}</td>
                      <td>
                        <ul class="list-inline list-small">
                              <li class="list-inline-item"><a title="Editar" href="{{ route('produtos.edit', ['produto' => $produto->id]) }}" class="btn btn-warning btn-sm"><span class="fas fa-edit"></span></a></li>
                              <li title="Excluir" class="list-inline-item">
                                <form  action="{{ route('produtos.destroy', ['produto' => $produto->id]) }}" onsubmit="return confirm('\nTem certeza que deseja excluir esta nota?'); return false;" method="post">
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

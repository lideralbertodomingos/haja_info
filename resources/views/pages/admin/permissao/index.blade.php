@extends('tema.admin')
@section('titulo','Lista de Permissões')

@section('pagina')

<div class="row">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Link</th>
            <th scope="col">Opção</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($permissaos as $cat )
          <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{ $cat->nome }}</td>
            <td>{{ $cat->descricao }}</td>
            <td>{{ $cat->link }}</td>
            <td class="d-flex justify-content-around">
                <a class="btn btn-primary" href="{{ route('admin.permissao.edit', $cat->link) }}">Editar</a>
                <form action="{{ route('admin.permissao.delete', $cat->link) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection

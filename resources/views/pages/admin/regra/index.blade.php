@extends('tema.admin')
@section('titulo','Lista de Categorias')

@section('pagina')

<div class="row">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Link</th>
            <th scope="col">Opção</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($regras as $cat )
          <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{ $cat->nome }}</td>
            <td>{{ $cat->link }}</td>
            <td>@mdo</td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection

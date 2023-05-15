@extends('tema.admin')
@section('titulo','Lista de Usuarios')

@section('pagina')

<div class="row">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">contacto</th>
            <th scope="col">Opção</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($usuarios as $cat )
          <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{ $cat->name }}</td>
            <td>{{ $cat->email }}</td>
            <td>{{ $cat->contacto }}</td>
            <td><a href="{{ route('admin.usuario',$cat->id) }}">Detalhe</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection

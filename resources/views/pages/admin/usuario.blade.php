@extends('tema.admin')
@section('titulo', 'Adicionar Permissao a' . $usuario->name)

@section('pagina')
    <div class=" container-fluid">
        <!-- START card -->
        <div class="card card-default">
            <div class="card-body no-scroll card-toolbar">
                <div class="row">
                    <div class="col-md-5">
                        <div>
                            <p>Nome: {{ $usuario->name }}</p>
                            <p>Regra: {{ $usuario->email }}</p>

                            <div class="panel alert">
                                @if (!empty($usuario->regra->regra->nome))
                                {{ $usuario->regra->regra->nome }}
                                    @else
                                    Sem regra adicionada
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <form action="{{ route('admin.usuario.add') }}" method="post">
                            @csrf
                            <h3>
                                Atribuir regra a usuário {{ $usuario->name }}
                            </h3>
                            <input type="hidden" name="user_id" value="{{ $usuario->id }}">

                            <select name="regra_id" id="" class="form-control" required>
                                <option>Escolha uma Regra</option>
                                @foreach ($regras as $regra)
                                    @if ($usuario->regra->regra->id === $regra->id)
                                        <option value="{{ $regra->id }}" selected>{{ $regra->nome }}</option>
                                    @else
                                        <option value="{{ $regra->id }}">{{ $regra->nome }}</option>
                                    @endif
                                @endforeach
                            </select>

                            <button class=" mt-2 btn btn-primary" type="submit">Aplicar regra</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END card -->
    </div>
@endsection

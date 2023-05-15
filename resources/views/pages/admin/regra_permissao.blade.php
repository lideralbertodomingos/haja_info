@extends('tema.admin')
@section('titulo', 'Adicionar Permissao a Regra')

@section('pagina')
    <div class=" container-fluid">
        <!-- START card -->
        <div class="card card-default">
            <div class="card-header ">
                <div class="card-title">Adiconando Permissao a Regra
                </div>
            </div>
            <div class="card-body no-scroll card-toolbar">
                <form action="{{ route('admin.permissao.regra.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="nome" class="form-label">Regras</label>
                        <select class="form-control" id="" name="regra_id">
                            <option value="">Selecione uma regra</option>
                            @foreach ($regras as $regra)
                                <option value="{{ $regra->id }}">{{ $regra->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Permissao</label>
                        <select class="form-control" id="" name="permissao_id">
                            <option value="">Selecione uma regra</option>
                            @foreach ($permissaos as $permissao)
                                <option value="{{ $permissao->id }}">{{ $permissao->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>

                </form>
            </div>
        </div>
        <!-- END card -->
    </div>
@endsection

@extends('tema.admin')
@section('titulo', 'Adicionar Permissao')

@section('pagina')
    <div class=" container-fluid">
        <!-- START card -->
        <div class="card card-default">
            <div class="card-header ">
                <div class="card-title">Adiconando Permissão
                </div>
            </div>
            <div class="card-body no-scroll card-toolbar">
                <form action="{{ route('admin.permissao.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="nome" class="form-label">Título</label>
                        <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome"
                            name="nome" value="{{ old('nome') }}">
                        @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nome" class="form-label">Descricao</label>
                        <textarea class="form-control @error('descricao') is-invalid @enderror" id="nome"
                            name="descricao" value="{{ old('nome') }}"></textarea>
                        @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>

                </form>
            </div>
        </div>
        <!-- END card -->
    </div>
@endsection

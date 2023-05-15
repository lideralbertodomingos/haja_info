@extends('tema.admin')
@section('titulo', 'Adicionar Jornal')

@section('pagina')
    <div class=" container-fluid">
        <!-- START card -->
        <div class="card card-default">
            <div class="card-header ">
                <div class="card-title">Editar Jornal
                </div>
            </div>
            <div class="card-body no-scroll card-toolbar">
                <form action="{{ route('admin.jornal.update',$jornal->link) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo"
                            name="titulo" value="{{ $jornal->titulo }}">
                        @error('titulo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao">{{ $jornal->descricao }}</textarea>
                        @error('descricao')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="categoria_id" class="form-label">Categoria</label>
                        <select name="categoria" class="form-control" id="categoria_id">
                            <option disabled> Escolha uma categoria</option>
                            @foreach ($categorias as $c)
                                <option value="{{ $c->id }}">{{ $c->nome }}</option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if (Auth::user()->regra->regra->nome == 'admin')
                    <div class="mb-3">
                        <label for="visi" class="form-label">Visibilidade</label>
                        <select name="visibilidade" class="form-control" id="visi">
                            <option > Escolha Visibilidade</option>
                            <option value="publica">Publica</option>
                            <option value="admin">Admin</option>
                            <option value="oculta">Oculta</option>
                        </select>
                    </div>
                    @endif

                    <div class="mb-3">
                        <label for="preco" class="form-label">Preço</label>
                        <input type="text" class="form-control @error('preco') is-invalid @enderror" id="preco"
                            name="preco" value="{{ $jornal->preco }}">
                        @error('preco')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Editar dados</button>

                </form>
            </div>
        </div>
        <!-- END card -->
    </div>
@endsection

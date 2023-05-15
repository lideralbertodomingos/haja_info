@extends('tema.admin')
@section('titulo', 'Adicionar Jornal')

@section('pagina')
    <div class=" container-fluid">
        <!-- START card -->
        <div class="card card-default">
            <div class="card-header ">
                <div class="card-title">Adiconando Jornal
                </div>
            </div>
            <div class="card-body no-scroll card-toolbar">
                <form action="{{ route('admin.jornal.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="regra" value="{{ Auth::user()->regra->regra->nome }}">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo"
                            name="titulo" value="{{ old('titulo') }}">
                        @error('titulo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao">{{ old('descricao') }}</textarea>
                        @error('descricao')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="imagem" class="form-label">Imagem</label>
                        <input type="file" class="form-control @error('imagem') is-invalid @enderror" id="imagem"
                            name="imagem">
                        @error('imagem')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if ($categorias->count() == 0)
                        <div class="mb-3">
                            <label for="categoria_id" class="form-label">Não possui nem uma Categoria no sistema</label>
                            <a href="{{ route('admin.categoria.create') }}" class="btn btn-primary">Criar a primeira
                                categorias</a>
                        </div>
                    @else
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
                    @endif

                    <div class="mb-3">
                        <label for="preco" class="form-label">Preço</label>
                        <input type="text" class="form-control @error('preco') is-invalid @enderror" id="preco"
                            name="preco" value="{{ old('preco') }}">
                        @error('preco')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if ($categorias->count() == 0)
                        <button type="button" class="btn btn-primary" disabled>Enviar</button>
                    @else
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    @endif


                </form>
            </div>
        </div>
        <!-- END card -->
    </div>
@endsection

@extends('tema.admin')
@section('titulo', 'Adicionar Jornal')

@section('pagina')
    <div class=" container-fluid">
        <!-- START card -->
        <div class="card card-default">
            <div class="card-header ">
                <div class="card-title">
                    {{ $jornal->titulo }}
                </div>
            </div>
            <div class="card-body no-scroll card-toolbar">
                <div class="row">
                    <div class="col-md-7">
                        <div>
                            <img src="{{ $jornal->imagem }}" class="img-responsive" alt="" style="width:100%">
                        </div>
                        <div>
                            <p>Titulo: {{ $jornal->titulo }}</p>
                            <p>Categoria: {{ $jornal->categoria->nome }}</p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="my-4">
                            <h4>Descricao</h4>
                            <div>
                                {!! $jornal->descricao !!}
                            </div>
                            <div class="alert alert-primary">
                                @if ($jornal->visibilidade == 'publica')
                                    Todos os usuários podem ver este conteudo
                                @elseif ($jornal->visibilidade == 'admin')
                                    Apenas O administrador Pode Ver este conteudo
                                @elseif ($jornal->visibilidade == 'oculta')
                                    Apenas O administrador Pode Ver este conteudo
                                @endif

                            </div>
                            <div class="my-5">
                                @if (Auth::user()->regra->regra->nome == 'admin')
                                    <a class="btn btn-primary"
                                        href="{{ route('admin.jornal.edit', $jornal->link) }}">Editar</a>
                                    <form class="mt-2" action="{{ route('admin.jornal.delete', $jornal->link) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Eliminar </button>
                                    </form>
                                @elseif (Auth::user()->regra->regra->nome == 'editor')
                                    <a class="btn btn-primary"
                                        href="{{ route('admin.jornal.edit', $jornal->link) }}">Editar</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END card -->
    </div>
@endsection

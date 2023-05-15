@extends('tema.admin')
@section('titulo', 'Lista de Jornais')

@section('pagina')
    <div class="card">
        <h3 class="text-center">Lista de Jornais</h3>
    </div>
    <div class="row">
        @foreach ($jornais as $jornal)
            <div class="col-md-3">
                <div class="card">
                    <!-- START PREVIEW -->
                    <div class="card">
                        <a href="{{ route('admin.jornal.show', $jornal->link) }}">
                            <img src="{{ $jornal->imagem }}" alt="" class="image-responsive-height">
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('admin.jornal.show', $jornal->link) }}">
                            <p class="text-center bold">{{ $jornal->titulo }}</p>
                        </a>
                        <h5 class="font-montserrat bold text-center">
                            {{ number_format($jornal->preco, 2) }}kz</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>

@endsection

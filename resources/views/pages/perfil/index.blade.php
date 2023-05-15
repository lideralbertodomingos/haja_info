@extends('tema.perfil')
@section('titulo', 'Destaque')

@section('pagina')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4">Olá, {{ Auth::user()->name }}!</h1>
                <p class="lead">Bem vindo a seu perfil</p>
            </div>
        </div>
        <div>
            <div class="col-md-3">
                @if (Auth::user()->voucher)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body alert alert-primary">
                            <h5 class="card-title">{{ number_format(Auth::user()->voucher->saldo, 2) }} Credito</h5>
                            <a href="">Minha Carteira</a>
                        </div>
                    </div>
                    <hr class="my-4">
                @else
                    <div class="card" style="width: 18rem;">
                        <div class="card-body alert alert-primary">
                            <h5 class="card-title">Carteira Voucher</h5>
                            <p class="card-text">Tenha Credito de uso em nossa carteiras.</p>
                            <form id="voucher-form" action="{{ route('perfil.voucher.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="saldo" value="500">
                                <input type="hidden" name="codigo" value="{{ Geral::generateToken($length = 10) }}">
                                <input type="hidden" name="endereco" value="{{ Auth::user()->endereco }}">
                                <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                <input type="hidden" name="validade" value="2023-06-20">
                                <input type="hidden" name="descricao" value="Conta Padrão">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <button class="btn btn-primary">Criar Carteira</button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 my-3"><h3 class="text-center">Historico de Compras</h3></div>
        @if (Auth::user()->pagamentos)
            @foreach (Auth::user()->pagamentos as $compra)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <h4 class="text-muted">{{ $compra->jornal->titulo }}</h4>
                        <div class="card-body alert alert-primary">
                            <h5 class="card-title">{{ number_format($compra->jornal->preco, 2) }} Credito</h5>
                            <a href="">Minha Carteira</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
@section('scripts')

    <script>
        $('#voucher-form').submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var url = form.attr('action');
            var data = form.serialize();

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 'success') {
                        alert(response.message);
                        // Atualizar a página após a criação da carteira
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    alert('Ocorreu um erro ao criar a carteira');
                }
            });
        });
    </script>

@endsection

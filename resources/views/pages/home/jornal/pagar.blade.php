@extends('tema.web')
@section('titulo', 'Pagamento de Jornal')

@section('pagina')

    <!-- News With Sidebar Start -->
    <div class="container-fluid mt-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Comprar Jornal</h4>
                            </div>
                        </div>
                        @foreach ($jornals as $j)
                            <div class="col-lg-4">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{ $j->imagem }}" style="object-fit: cover;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href="{{ route('home.categoria', $j->categoria->link) }}">{{ $j->categoria->nome }}</a>
                                            <a class="text-body"><small>{{ Geral::DataF($j->created_at) }}</small></a>
                                        </div>
                                        <p class="m-0">{{ $j->titulo }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#comprar-modal{{ $j->id }}">Comprar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal" tabindex="-1" role="dialog" id="comprar-modal{{ $j->id }}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Comprar Jornal</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('home.jornal.comprar') }}" method="post"
                                                id="comprar-form">
                                                @csrf
                                                <input type="hidden" name="jornal_id">
                                                @if (Auth::user()->voucher)
                                                    <div class="form-group">
                                                        <div>
                                                            <label for="preco">Preço: {{ $j->preco }}</label>
                                                        </div>
                                                        <div>
                                                            <label for="preco">
                                                                Saldo: {{ number_format(Auth::user()->voucher->saldo, 2) }}
                                                                Creditos
                                                            </label>
                                                        </div>

                                                    </div>
                                                    @if (Auth::user()->voucher->saldo > $j->preco)
                                                        <input type="hidden" name="preco" value="{{ $j->preco }}">
                                                        <input type="hidden" name="jornal_id" value="{{ $j->id }}">
                                                        <input type="hidden" name="user_id"
                                                            value="{{ Auth::user()->id }}">

                                                        <button type="submit" class="btn btn-primary">Comprar</button>
                                                    @else
                                                        <div class="alert alert-danger ">
                                                            <span class="text-center">
                                                                Saldo Insuficiente
                                                            </span>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="">
                                                        <p class="text-muted"> Acesse o Seu perfil e Crie uma carteira
                                                            gratuita</p>
                                                        <p><a href="{{ route('perfil.index') }}">Acessar meu Perfil</a></p>
                                                    </div>
                                                @endif

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->

@endsection

@section('scripts')
    <script>
        $('#comprar-form').submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var url = form.attr('action');
            var data = form.serialize();
            var button = form.find('button[type=submit]');

            // Adiciona a classe 'disabled' para desativar o botão
            button.addClass('disabled');

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 'success') {
                        alert(response.message);
                        $('#comprar-modal').modal('hide');
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                },
                complete: function() {
                    // Remove a classe 'disabled' após 1 minuto
                    setTimeout(function() {
                        button.removeClass('disabled');
                    }, 60000); // 1 minuto = 60000 milissegundos
                }
            });
        });
    </script>
@endsection

<!-- Newsletter Start -->
<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
    </div>
    <div class="bg-white text-center border border-top-0 p-3">
        <p>Subscreva-se para ficar atualizado</p>
        <div class="input-group mb-2" style="width: 100%;">
            <div id="newsletter-message"></div>
            <form id="newsletter-form" method="post">
                @csrf
                <input type="text" name="email" class="form-control form-control-lg" placeholder="Email">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary font-weight-bold px-3">Enviar Email</button>
                </div>
            </form>

            <div id="mensagem"></div>


        </div>
        <small>Informe um Email valido</small>
    </div>
</div>
<!-- Newsletter End -->

<!-- Tags Start -->
<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
    </div>
    <div class="bg-white border border-top-0 p-3">
        <div class="d-flex flex-wrap m-n1">
            @foreach (Geral::Categoria(10) as $c)
                <a href="{{ route('home.categoria', $c->link) }}"
                    class="btn btn-sm btn-outline-secondary m-1">{{ $c->nome }}</a>
            @endforeach
        </div>
    </div>
</div>
<!-- Tags End -->

@section('scripts')
    <script>
        $(document).ready(function() {
    $('#newsletter-form').submit(function(e) {
        e.preventDefault(); // Evita que o formulário seja enviado normalmente

        var form_data = $(this).serialize(); // Serializa os dados do formulário

        $.ajax({
            type: "POST",
            url: "{{ route('home.newsletter') }}", // Insira a rota para o método no seu controller
            data: form_data,
            dataType: 'json',
            success: function(response) {
                if (response.status == 'success') {
                    $('#mensagem').html('<div class="alert alert-success">' + response.message + '</div>');
                } else {
                    $('#mensagem').html('<div class="alert alert-danger">' + response.message + '</div>');
                }
            },
            error: function(response) {
                $('#mensagem').html('<div class="alert alert-danger">Erro ao enviar a requisição</div>');
            }
        });
    });
});

    </script>
@endsection

@extends('tema.web')
@section('titulo', 'Contactos')

@section('pagina')
    <!-- Contact Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Contacte-nos</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">
                        <div class="mb-4">
                            <h6 class="text-uppercase font-weight-bold">Informação de Contacto</h6>
                            <p class="mb-4">HAJA INFORMATION<a href="https://facebook.com/albertodomingos.alberto">Siga-nos</a>.</p>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fa fa-map-marker-alt text-primary mr-2"></i>
                                    <h6 class="font-weight-bold mb-0">Localização</h6>
                                </div>
                                <p class="m-0">Lalula, junto a escola de sargentos</p>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fa fa-envelope-open text-primary mr-2"></i>
                                    <h6 class="font-weight-bold mb-0">Email</h6>
                                </div>
                                <p class="m-0">hajainformation@hotmail.com</p>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fa fa-phone-alt text-primary mr-2"></i>
                                    <h6 class="font-weight-bold mb-0">Call Us</h6>
                                </div>
                                <p class="m-0">+244 932843383</p>
                            </div>
                        </div>
                        <h6 class="text-uppercase font-weight-bold mb-3">Contacte-nos</h6>

                        <form id="contact-form" method="POST" action="{{ route('home.contacto') }}">
                            @csrf
                            <div class="mensagem"></div>


                            @auth
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control p-4" name="nome" value="{{ Auth::user()->name }}"
                                                required="required" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control p-4" name="email" value="{{ Auth::user()->email }}"
                                                required="required" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="tel" class="form-control p-4" name="contacto"
                                            value="{{ Auth::user()->contacto }}" required="required" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control p-4" name="assunto" placeholder="Assunto"
                                                required="required" />
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control p-4" name="nome" placeholder="Nome"
                                                required="required" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control p-4" name="email" placeholder="Email"
                                                required="required" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="tel" class="form-control p-4" name="contacto"
                                                placeholder="Contacto" required="required" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control p-4" name="assunto" placeholder="Assunto"
                                                required="required" />
                                        </div>
                                    </div>
                                </div>
                            @endauth

                            <div class="form-group">
                                <textarea class="form-control" name="mensagem" rows="4" placeholder="Mensagem" required="required"></textarea>
                            </div>
                            <div>
                                <button id="submit-button" class="btn btn-primary font-weight-semi-bold px-4"
                                    style="height: 50px;" type="submit">Enviar Mensagem</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('pages.home.parts.siderbar')
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
@section('scripts')

    <script>
        $('#contact-form').submit(function(event) {
            event.preventDefault();
            var form = $(this);
            var submitButton = $('#submit-button');
            submitButton.prop('disabled', true);

            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                success: function(response) {
                    submitButton.prop('disabled', false);
                    form.trigger('reset');
                    $('.mensagem').html(
                        '<div class="alert alert-success">Mensagem enviada com sucesso!</div>');
                },
                error: function(response) {
                    submitButton.prop('disabled', false);
                    $('.mensagem').html(
                        '<div class="alert alert-danger">Erro ao enviar mensagem. Tente novamente mais tarde.</div>'
                    );
                }
            });
        });
    </script>
@endsection

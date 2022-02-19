@extends('layouts.template')
@section('page-title', 'Reservar')
@section('body')
<div class="general-completarReserva">
    <div class="espaiarContenidors">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Contenidor General Mostrar Dades Reserva -->
        <div class="div-espaiEsquerre"></div>
        <div class="dadesReserva-Stripe">
            <div class="posicionar-dadesReserva">
                <div class="mostrar-dadesReserva">
                    <h1 class="titol-descripcio">Descripció</h1>
                        <p class="nom-casa">{{ $consultaHabitatge->descripcio }}<br></p>
                        <p>La casa  es troba situada al C/{{$consultaHabitatge->adreça}},
                        a {{$consultaHabitatge->ciutat}},amb codi postal {{$consultaHabitatge->codiPostal}} a la província de {{$consultaHabitatge->provincia}}.<br>
                        Té un total de {{$consultaHabitatge->m2}} m² i el seu preu és de {{$consultaHabitatge->preu}}€ per nit.
                        </p>
                </div>
                <div class="mostrarCheckout">
                    <h1 class="titol-descripcio">Dades checkout</h1>
                        <p>
                            Ubicació: {{ $consultaHabitatge->ciutat }}<br>
                            Data d'arribada: {{\Request::get('arribada')}} Data de sortida: {{\Request::get('sortida')}}<br>
                            Número de hostes: {{\Request::get('persones')}}<br>
                            Preu total: {{$consultaHabitatge->preu * $dies}}€
                        </p>
                </div>
            </div>

            <!-- Contenidor General d'Stripe -->
            <div class="posicionar-stripeContainer">
                <div class="stripeContainer">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel panel-default credit-card-box">
                                <div class="panel-heading display-table" id="ajustar-widthTaula">
                                    <div class="row display-tr" id="ajustar-capçaleraStripe">
                                        <h3 class="panel-title display-td" id="posar-imatgesAbaix">Detalls Pagament</h3>
                                    </div>    
                                    <div class="display-td" id="ajustarDisplay"> 
                                            <div class="ajustarImatges">                          
                                                <img class="img-stripe" src="/img/americanExpress.png" alt="">
                                                <img class="img-stripe" src="/img/discover.png" alt="">
                                                <img class="img-stripe" src="/img/masterCard.png" alt="">
                                                <img class="img-stripe" src="/img/visa.png" alt="">
                                            </div>
                                    </div>                
                                </div>

                                <!-- Cos del formulari Stripe -->
                                <div class="panel-body" id="ajustarTamanyPanell">
                
                                    @if (Session::has('success'))
                                        <div class="alert alert-success text-center">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                            <p>{{ Session::get('success') }}</p>
                                        </div>
                                    @endif
                
                                    <form 
                                            role="form" 
                                            action="{{ route('stripe.post') }}" 
                                            method="post" 
                                            class="require-validation"
                                            data-cc-on-file="false"
                                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                            id="payment-form">
                                        @csrf
                
                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group required' id="ajustarCard">
                                                <label class='control-label'>Nom a la tarja</label> <input
                                                    class='form-control' size='4' type='text' id="ajustarposs">
                                            </div>
                                        </div>
                
                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group card required'>
                                                <label class='control-label'>Número de tarjeta</label> <input
                                                    autocomplete='off' class='form-control card-number' size='20'
                                                    type='text'>
                                            </div>
                                        </div>
                
                                        <div class='form-row row' id="ajustar3Camps">
                                            <div class='col-xs-12 col-md-4 form-group cvc required' id="ajustarposs">
                                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                                    class='form-control card-cvc' placeholder='311' size='4'
                                                    type='text' id="centrarsS">
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required' id="ajustarposs">
                                                <label class='control-label'>Mes d'expiració</label> <input
                                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                                    type='text' id="centrartT">
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required' id="ajustarposs">
                                                <label class='control-label'>Any d'expiració</label> <input
                                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                    type='text' id="centrarpP">
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <div class="col-xs-12" id="centrarBoto">
                                                <button class="btn btn-primary btn-lg btn-block" type="submit" id="boto-pagamentStripe">Pagament {{ $consultaHabitatge->preu * $dies }}€</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
            </div>
            <!-- Aquí acaba la part visual d'Stripe -->
            
                <!-- Script's Stripe Laravel 8 -->
                <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
                    <!-- Primera funció -->
                    <script type="text/javascript">
                        $(function() {
                        
                            var $form         = $(".require-validation");
                        
                            $('form.require-validation').bind('submit', function(e) {
                                var $form         = $(".require-validation"),
                                inputSelector = ['input[type=email]', 'input[type=password]',
                                                'input[type=text]', 'input[type=file]',
                                                'textarea'].join(', '),
                                $inputs       = $form.find('.required').find(inputSelector),
                                $errorMessage = $form.find('div.error'),
                                valid         = true;
                                $errorMessage.addClass('hide');
                        
                                $('.has-error').removeClass('has-error');
                                $inputs.each(function(i, el) {
                                var $input = $(el);
                                if ($input.val() === '') {
                                    $input.parent().addClass('has-error');
                                    $errorMessage.removeClass('hide');
                                    e.preventDefault();
                                }
                                });
                        
                                if (!$form.data('cc-on-file')) {
                                e.preventDefault();
                                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                                Stripe.createToken({
                                    number: $('.card-number').val(),
                                    cvc: $('.card-cvc').val(),
                                    exp_month: $('.card-expiry-month').val(),
                                    exp_year: $('.card-expiry-year').val()
                                }, stripeResponseHandler);
                                }
                        });
                        
                        //   Segona funció
                        function stripeResponseHandler(status, response) {
                                if (response.error) {
                                    $('.error')
                                        .removeClass('hide')
                                        .find('.alert')
                                        .text(response.error.message);
                                } else {
                                    /* token contains id, last4, and card type */
                                    var token = response['id'];
                                    
                                    $form.find('input[type=text]').empty();
                                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                                    $form.get(0).submit();
                                }
                            }
                        
                        });
                    </script>
        </div>
    </div>
</div>
@endsection
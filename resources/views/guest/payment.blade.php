<!DOCTYPE html>

<html>

<head>

    <title>Deliveboo checkout</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- for post req --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    {{-- for braintree functionality --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>

    {{-- style --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" name="customer_name" id="name" class="form-control" placeholder="Nome" required="">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="customer_email" id="email" class="form-control" placeholder="Email" required="">
                    </div>

                    <div class="form-group">
                        <label for="telephone">Telefono:</label>
                        <input type="text" name="customer_telephone" id="telephone" class="form-control" placeholder="Telefono" required="">
                    </div>

                    <div class="form-group">
                        <label for="address">Indirizzo di consegna:</label>
                        <input type="text" name="customer_address" id="address" class="form-control" placeholder="Indirizzo di consegna" required="">
                    </div>

                    <div class="form-group">
                        <label for="delivery_date">Data di consegna:</label>
                        <input type="date" name="delivery_date" id="delivery_date" class="form-control" required="">
                    </div>

                    <div class="form-group">
                        <label for="delivery_time">Orario di consegna:</label>
                        <input type="time" name="delivery_time" id="delivery_time" class="form-control" required="">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success btn-submit">Conferma i dati</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6" id="app">
                <cart />
            </div>
        </div>


        {{-- braintree dropin --}}
        <div class="col-md-8 col-md-offset-2">
            <div id="dropin-container"></div>
            <button id="submit-button" class="d-none">Request payment method</button>
        </div>

    </div>

</body>

<script>
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $(".btn-submit").click(function(e) {

        e.preventDefault();

        var name = $("input[name=customer_name]").val();

        var email = $("input[name=customer_email]").val();

        var telephone = $("input[name=customer_telephone]").val();
        // console.log(telephone);

        var address = $("input[name=customer_address]").val();

        var delivery_date = $("input[name=delivery_date]").val();

        var delivery_time = $("input[name=delivery_time]").val();

        let carrellino = JSON.parse(localStorage.getItem('carrello'));
        let risto_id = 0;
        let tot = 0;
        if (localStorage.carrello) {
            carrellino.forEach(item => {
                let subtotal = item.qty * item.price;
                tot += subtotal;
                risto_id = item.risto_id;
            })
        }
        /* console.log(tot, risto_id); */

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({

            type: 'POST',

            url: '/ajaxRequest',

            data: {
                _token: CSRF_TOKEN,
                customer_name: name,
                customer_email: email,
                customer_telephone: telephone,
                customer_address: address,
                delivery_date: delivery_date,
                delivery_time: delivery_time,
                amount: tot,
                user_id: risto_id,
            },

            success: function(response) {
                // entra in gioco braintree
                var button = document.getElementById('submit-button');
                button.classList.remove('d-none');
                braintree.dropin.create({
                    authorization: "{{ Braintree\ClientToken::generate() }}",
                    container: '#dropin-container'
                }, function(createErr, instance) {
                    // let carrellino = JSON.parse(localStorage.getItem('carrello'));
                    // let tot = 0;
                    // if (localStorage.carrello) {
                    //     carrellino.forEach(item => {
                    //         let subtotal = item.qty * item.price;
                    //         tot += subtotal;
                    //     })
                    // }

                    button.addEventListener('click', function() {
                        instance.requestPaymentMethod(function(err, payload) {
                            payload.tot = tot;
                            $.get('{{ route("payment.process") }}', {
                                    payload
                                },
                                function(response) {
                                    console.log(response);
                                    if (response.success) {
                                        alert('Payment successful!');
                                    } else {
                                        alert('Payment failed');
                                    }
                                }, 'json');
                        });
                    });
                });

            },

            error: function(err) {
                // logica errori
                /* VERIONE 1 scommentare e commentare tutto il resto della function per un refactoring da paura*/
                /* console.dir(err); */
                console.log(err.responseText);
                /* VERIONE 2 */

                /*  const errors = err.responseJSON.errors
                 /* console.log(errors); */
                /* console.log(key); */
                /*        for (const key in errors) {
                           if (errors.hasOwnProperty.call(errors, key)) {
                               const element = errors[key];
                               let errorMsg = element.toString();
                               let i = document.getElementsByName(`${key}`);
                               let catchError = i[0].getAttribute('name');
                               if (key == catchError) {
                                   i[0].style.border = '1px solid red';
                                   i.value
                               }
                           }
                       } */
            }
        });
    });
</script>
<script src="{{ asset('js/app.js') }}" defer></script>

</html>
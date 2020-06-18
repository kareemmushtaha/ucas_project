@extends('layout.PageView.app')

@section('style')
    <style>


        .StripeElement {
            box-sizing: border-box;

            height: 40px;

            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
    </style>
@endsection
@section('content')

    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-between">
                <div class="col-lg-12 banner-content">
                    <h1 class="text-white" style="text-align: center;"> قسم الدفع الإلكتروني  </h1>
                    <h5 class="text-white" style="text-align: center;"> بالأسفل
                    </h5>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="mb-4">
                    <p style="padding: 2% 2%;color: #ffffff;background-color: #8b0000;margin-top: 3%;border-radius: 8px 8px;">
                        المجموع الكلي :{{$amount}}$

                    </p>

                    <form action="/charge" method="post" id="payment-form">
                        @csrf
                        <div class="">
                            <input type="hidden" name="amount" value="{{$amount}}">
                            <label for="card-element">
                                الدفع الإلكتروني
                            </label>
                            <div id="card-element" style="background-color: #262626;padding: 6% 4%;">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <button class="btn btn-success mt-3"> ادفع الآن </button>
                        <p id="loading" style="display: none;"> تتم عملية الدفع الان انتظر قليلا .....</p>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        window.onload = function () {
            var stripe = Stripe('pk_test_51GtKCUClUwoWxnDDMLssne8DLO0lsAhYZrGlvN1ldhSofzauJxdjXjJKErwsbiDwhl0w3UmOjT3PkZXpbJS5pNNF006F5RyV9Z');
            var elements = stripe.elements();
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };
            var card = elements.create('card', {style: style});
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.on('change', function (event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                stripe.createToken(card).then(function (result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                var loading = document.getElementById('loading')
                loading.style.display = "block";
                form.submit();

            }
        }
    </script>
@endsection

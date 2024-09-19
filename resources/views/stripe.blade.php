<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 9 - Stripe Payment Gateway Integration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body style="background-color: #fdfff4; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

<div class="container" style="max-width: 600px; margin-top: 50px; padding: 20px;">
    <h1 style="text-align: center; color: #4A4A4A; margin-bottom: 20px;">Your Total Bill: LKR {{$value}}</h1>

    <div class="panel panel-default credit-card-box" style="box-shadow: 0px 10px 20px rgba(0,0,0,0.1); border-radius: 15px; background-color: #ffffff;">
        <div class="panel-heading" style="background-color: #2E8B57; padding: 20px; border-radius: 15px 15px 0 0;">
            <h3 class="panel-title" style="color: #fff; text-align: center; font-size: 20px;">Payment Details</h3>
        </div>
        <div class="panel-body" style="padding: 30px;">

            @if (Session::has('success'))
                <div class="alert alert-success text-center" style="margin-bottom: 20px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="font-size: 20px;">&times;</a>
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif

            <form role="form" action="{{ route('stripe.post', $value) }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                @csrf

                <div class="form-row row" style="margin-bottom: 20px;">
                    <div class="col-xs-12 form-group required">
                        <label class="control-label" style="color: #333; font-size: 16px;">Name on Card</label>
                        <input class="form-control" size="4" type="text" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);">
                    </div>
                </div>

                <div class="form-row row" style="margin-bottom: 20px;">
                    <div class="col-xs-12 form-group required">
                        <label class="control-label" style="color: #333; font-size: 16px;">Card Number</label>
                        <input autocomplete="off" class="form-control card-number" size="20" type="text" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);">
                    </div>
                </div>

                <div class="form-row row" style="margin-bottom: 20px;">
                    <div class="col-xs-12 col-md-4 form-group required">
                        <label class="control-label" style="color: #333; font-size: 16px;">CVC</label>
                        <input autocomplete="off" class="form-control card-cvc" placeholder="ex. 311" size="4" type="text" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);">
                    </div>
                    <div class="col-xs-12 col-md-4 form-group required">
                        <label class="control-label" style="color: #333; font-size: 16px;">Expiration Month</label>
                        <input class="form-control card-expiry-month" placeholder="MM" size="2" type="text" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);">
                    </div>
                    <div class="col-xs-12 col-md-4 form-group required">
                        <label class="control-label" style="color: #333; font-size: 16px;">Expiration Year</label>
                        <input class="form-control card-expiry-year" placeholder="YYYY" size="4" type="text" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);">
                    </div>
                </div>

                <div class="form-row row" style="margin-top: 20px;">
                    <div class="col-md-12 error form-group hide">
                        <div class="alert alert-danger" style="border-radius: 5px; padding: 10px; text-align: center;">Please correct the errors and try again.</div>
                    </div>
                </div>

                <div class="row" style="margin-top: 20px;">
                    <div class="col-xs-12">
                        <button class="btn btn-success btn-lg btn-block" type="submit" style="padding: 15px; border-radius: 5px; background-color: #2E8B57; border-color: #2E8B57; font-size: 18px;">Pay Now</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

</body>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">

    $(function() {

        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
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

        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
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
</html>

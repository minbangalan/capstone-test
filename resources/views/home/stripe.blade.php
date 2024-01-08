<!DOCTYPE html>
<html>
   <head>

    <base href="/public">
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->


      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>The Gizmo Hub</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />

      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />


      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


      <style>

         .checkout-wrapper {
            margin: 0 auto;
            padding: 20px 30px;
            display: flex;
            flex-wrap: wrap;
         
         }

         .h3__text h3 {
            text-align: center;
            font-size: 30px;  
            margin-bottom: 30px;
            margin-top: 50px;
         }


         #right-box {
            width: 450px;
            margin: 0 auto;
            background: rgb(219, 224, 228);
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 50px;
         }
         #card-name{
            width: 400px;
         }
         #card-num {
            width: 400px;
         }
         #card-num-wrap {
            background: rgb(219, 224, 228);
            border: none;
         }
         .row .btn.btn-primary {
            background: rgb(44, 75, 252);
            left: 50px;
         }
         .row .btn.btn-primary:hover {
            background: rgb(73, 99, 243);
         }
         #place-order {
            position: absolute;
            left: 230px;
            width: 150px;
            bottom: -12px;
         }
         .panel-body {
            position: relative;
         }

      </style>

   </head>
   <body>

        <!-- header section strats -->
           @include('home.header')
         <!-- end header section -->

        <div class="h3__text">
         <h3>Payment Details - Total Amount: ${{$subtotalprice}}</h3>
        </div>

    <div class="checkout-page">
        <div class="row" class="checkout-wrapper">

                <div class="panel panel-default credit-card-box" id="right-box">
                    <div class="panel-body">
        
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif
        
                            <form 
                                role="form" 
                                action="{{ route('stripe.post',$subtotalprice) }}" 
                                method="post" 
                                class="require-validation"
                                data-cc-on-file="false"
                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                id="payment-form">
                            @csrf
        
                            <div class='form-row row' >
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label> 
                                    <input
                                        class='form-control' size='4' type='text' id="card-name">
                                </div>
                            </div>
        
                            <div class='form-row row' >
                                <div class='col-xs-12 form-group card required' id="card-num-wrap">
                                    <label class='control-label'>Card Number</label> 
                                    <input
                                        autocomplete='off' class='form-control card-number' size='20'
                                        type='text'
                                        id="card-num">
                                </div>
                            </div>
        
                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label> 
                                    <input autocomplete='off'
                                        class='form-control card-cvc' placeholder='ex. 311' size='4'
                                        type='text'>
                                </div>

                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> <input
                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                        type='text'>
                                </div>

                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> <input
                                        class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                        type='text'>
                                </div>
                            </div>
        

        
                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-md btn-block" type="submit" id="place-order">Place Order</button>
                                </div>
                            </div>
                                
                        </form>
                    </div>
                </div>        
            </div>
  

    </div>





      <!-- footer start -->
            @include('home.footer')   
      <!-- footer end -->


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
                inputSelector = ['input[type=email]', 'input[type=password]',
                                 'input[type=text]', 'input[type=file]',
                                 'textarea'].join(', '),
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

      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>

   </body>
</html>
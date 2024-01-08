<!DOCTYPE html>
<html>
   <head>
    
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

      <style>
            .wrapper {
                width: min(900px, 100% - 3rem);
                margin-inline: auto;
            }
            
            table {
                color: #ffffff;
                background: #f3e8c3;
                width: 100%;
                margin: 0 auto;
                border-collapse: collapse;
            }

            .h2_text {
                text-align: center;
                font-size: 30px;
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .alert.alert-success {
                right: 100px;
                position: absolute;
            }
            .close {
                font-size: medium;
                margin-left: 20px;
            }
             th, td {
                padding: 1rem;
            }
            td {
                color: black;
            }
            th {
                background: hsl(0 0% 0% / 0.5);
            }
            tr:nth-of-type(2n) {
                background: hsl(0 0% 0% / 0.1);
            }
            #cart_img {
                width: 200px;
                height: 200px;
                margin: 0;
                padding: 0;
                
            }
            .summary {
                text-align: center;
                font-size: 20px;
            }
            #delete_button {
                color: white;
                cursor: pointer;
            }
            @media (max-width: 870px) {
                td {
                    display: grid;
                    grid-template-columns: 15ch auto;
                    padding: 0.75rem 1rem;
                }
                td:first-child {
                    padding-top: 1rem;
                }
                td:last-child {
                    padding-bottom: 1rem;
                }
                th {
                    display: none;
                }
                td::before {
                    content: attr(data-cell) ;
                    font-weight: 700;
                }
                #delete_button {
                    width: 90px;
                    position: absolute;
                    bottom: 20px;
                    right: 60px;
                }
                .prod-det {
                    position: relative;
                }
                #cart_img {
                    width: 100%;
                    height: 100%;
                    margin-left: 17px;
                }
            }

      </style>

   </head>
   <body>
         <!-- header section strats -->
            @include('home.header')
         <!-- end header section -->
   




    <div class="wrapper">

        @if(session()->has('message'))

        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
           
        </div>

        @endif

        <div class="h2_text">     
            <h2>
                Order Summary
            </h2>
        </div>

        <div class="table-container">
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th></th>
                    
                </tr>

                <?php $subtotalprice=0; ?>

               @foreach($cart as $cart)

                <tr class="prod-det">
                    <td data-cell="Product Name: ">{{$cart->product_title}}</td>
                    <td data-cell="Image: " id="cart_img"><img src="/product/{{$cart->image}}" alt=""></td>
                    <td data-cell="Price: ">Php {{$cart->price}}</td>
                    <td id="prod-desc" data-cell="Quantity">{{$cart->quantity}}</td>
                    
                    

                    <td><a id="delete_button" class="btn btn-danger" href="{{url('remove_cart',$cart->id)}}">Remove</a></td>
                    
                </tr>

                <?php $subtotalprice=$subtotalprice + $cart->price ?>

              @endforeach

            </table>
        </div>

        <div class="summary">
            Sub Total: Php {{$subtotalprice}}
        <br>
            <a class="btn btn-warning" href="{{url('stripe',$subtotalprice)}}">Proceed to Check Out</a>
        </div>
    </div>


  
      <!-- footer start -->
            @include('home.footer')   
      <!-- footer end -->

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
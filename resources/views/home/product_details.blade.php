<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style>
        #single_prod {
            margin: auto;
            width: 50%;
            padding: 30px;
        }
        .img-box img {
            width: 100%;
            height: auto;
        }
        .img-box_thumbnail img {
            width: 100px;
            height: 100px;
        }
        #buy_button {
            width: 100px;
            padding: 10px;
            justify-content: center;
            margin: 0;
        }
        #item_qty {
            width: 70px;
         }
      </style>
   </head>
   <body>
         <!-- header section strats -->
            @include('home.header')
         <!-- end header section -->

      <div class="col-sm-6 col-md-4 col-lg-4" id="single_prod">
        <div class="box" >
           <div class="img-box">
              <img src="product/{{$product->image_1}}" alt="">
           </div>
           <div class="img-box_thumbnail">
            <img src="product/{{$product->image_2}}" alt="">
            <img src="product/{{$product->image_3}}" alt="">

            @if($product->image_4!=null)
            <img src="product/{{$product->image_4}}" alt="">
            @endif

         </div>
           <div class="detail-box">
              <h5>
                 {{$product->title}}
              </h5>

              @if($product->old_price!=null)
                <h6 style="text-decoration: line-through;">
                   Php {{$product->old_price}}
                </h6>
              @endif

              <h6>
                Price: Php {{$product->new_price}}
             </h6>
             <h6>Type: {{$product->category}}</h6>
             <h6>Description: {{$product->description}}</h6>

             <div class="qty-form"> 
                <form action="{{url('add_cart',$product->id)}}" method="post">
                   @csrf
                   <input type="number" value="1" name="quantity" id="item_qty">
                   <input type="submit" id="buy_button" value="Add to Cart"> 
                </form>
             </div>

           </div>
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
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
      <link rel="shortcut icon" href="images/2.png" type="">
      <title>The Gizmo Hub</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">


<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Noto+Sans:wght@400;500;600;700;800&family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">

      <style>
         #item_qty {
            width: 70px;
         }
         #buy_button {
            width: 100px;
            padding: 10px;
            justify-content: center;
            margin: 0;
         }

      </style>

   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
            @include('home.header')
         <!-- end header section -->

         <!-- hero section -->
            @include('home.hero')
         <!-- end of hero section -->

      </div>
      <!-- features section -->
            @include('home.feature')
      <!-- end features section -->
      
      <!-- arrival section -->
            @include('home.banner')
      <!-- end arrival section -->
      
      <!-- product section -->
            @include('home.homeprod')
      <!-- end product section -->

      <!-- subscribe section -->
            @include('home.subscribe')
      <!-- end subscribe section -->

      <!-- client feedback section -->
            @include('home.feedback')    
      <!-- end client feedback section -->

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
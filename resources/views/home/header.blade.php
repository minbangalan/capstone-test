  <!-- header section strats -->
  <header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{url('/')}}" style="font-family: 'Black Ops One', system-ui; font-size: 25px;">
            <img src="/images/2.png" alt="" style="width: 50px; height: 50px; margin: 0; padding: 0;">Gizmo Hub</a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                   <a class="nav-link" href="product.html">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">About</a>
                </li>


                @if (Route::has('login'))

                @auth

                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Account<span class="caret"></span></a>

                     <ul class="dropdown-menu">

                        <li class="nav-item">
                           <a id="cart-icon" class="nav-link" href="{{url('show_cart')}}">Cart</a>
                        </li>

                        <li class="nav-item">
                           <a id="heart-icon" class="nav-link" href="">Wish</a>
                        </li>

                        <li class="nav-item">
                           <a id="order-icon" class="nav-link" href="{{url('show_order')}}">Orders</a>
                        </li>

                     </ul>
                  </li>

                  <li class="nav-item">
                     <x-app-layout>
                     </x-app-layout>
                  </li>

                @else

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Account<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                       <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                       <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    </ul>
                 </li>

                 @endauth

                 @endif


             </ul>
          </div>
       </nav>
    </div>
 </header>
 <!-- end header section -->
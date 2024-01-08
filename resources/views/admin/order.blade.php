<!DOCTYPE html>
<html lang="en">
  <head>
        @include('admin.css')

        <style>
            .order_h2 h2 {
                text-align: center;
                margin-top: 30px;
                margin-bottom: 20px;
                font-size: 25px;
            }

            .order-wrp {

                margin-inline: auto;
            }
            
            table {
                color: white;
                background: #313641;
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

            th {
                background: hsl(0 0% 0% / 0.5);
            }
            tr:nth-of-type(2n) {
                background: hsl(0 0% 0% / 0.1);
            }
            tr {
                border-bottom: rgba(0, 0, 0, 0.5) solid .5px;
            }
            #order-img {
                width: 180px;
                height: 180px;
                padding: 0;
                margin-bottom: 30px;
            }
            .mdi.mdi-checkbox-marked {
                font-size: large;
                color: rgb(112, 163, 204);
            }
            #tracking-link {
                text-decoration: underline;
                font-weight: 600;

            }

            .order-wrp .order-search {
               text-align: right;
               margin-bottom: 30px;
            }
            #search_bar {
                height: 30px;
                border-radius: 2px;
                color: black;
            }
            .empty-search {
                text-align: center;
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
                #edit_button {
                    width: 80px;
                    position: absolute;
                    bottom: 20px;
                    right: 150px;
                }
                #delete_button {
                    width: 80px;
                    position: absolute;
                    bottom: 20px;
                    right: 60px;
                }
                .order-det {
                    position: relative;
                }

                #order-img {
                width: auto;
                height: auto;
                margin-left: 17px; 
                }

            }
        </style>
  </head>
  <body>
    <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
    <!-- partial -->
        @include('admin.adminnav')
    <!-- partial -->
        
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="order-wrp">
            <div class="order_h2">
                <h2>All Orders</h1>
            </div>

            <div class="order-search">
                <form action="{{url('search')}}" method="get">
                    @csrf
                    <input id="search_bar" type="text" name="search">
                    <input type="submit" value="Search" class="btn btn-warning">
                </form>
            </div>

            <div class="order_tbl">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th id="img-th">Image</th>
                        <th>Print PDF</th>
                    </tr>
 
                    @forelse($order as $order)
            
                    <tr class="order-det">
                        <td data-cell="Name: ">{{$order->name}}</td>
                        <td data-cell="Email">{{$order->email}}</td>
                        <td data-cell="Address: ">{{$order->address}}</td>
                        <td data-cell="Phone: ">{{$order->phone}}</td>
                        <td data-cell="Product Name: ">{{$order->product_title}}</td>
                        <td data-cell="Quantity: ">{{$order->quantity}}</td>
                        <td data-cell="Price: ">{{$order->price}}</td>
                        <td data-cell="Payment Status: ">

                            @if($order->payment_status=='pending')

                            <a type="checkbox" onclick="return confirm('Change status to Paid?')" href="{{url('paid',$order->id)}}"></a>
                        
                            @else 

                            <p><i class="mdi mdi-checkbox-marked"></i></p>

                            @endif
                       
                            {{$order->payment_status}}
                        
                        </td>

                        @if($order->payment_status=='Paid')

                        <td data-cell="Delivery Status: ">
                            
                                @if($order->delivery_status=='processing')

                                <a type="checkbox" onclick="return confirm('Change status to Delivered?')" href="{{url('delivered',$order->id)}}"></a>
                                
                                {{$order->delivery_status}}

                                @else 
    
                                <p><i class="mdi mdi-checkbox-marked"></i></p>

                                @endif
                           
                                
                                @if($order->delivery_status=='Delivered') 

                               <a id="tracking-link" href="https://www.fedex.com/en-us/tracking.html"> {{$order->delivery_status}} </a>

                               @endif

                        
                        </td>

                        @else 

                        <td></td>

                        @endif

                        <td id="order-img" data-cell="Image: "><img src="/product/{{$order->image}}" alt=""></td>

                      

                        <td>
                           <a href="{{url('print_pdf',$order->id)}}" class="btn btn-warning">PDF</a>
                        </td>

                    
                        
                     
                        
            
                       <!-- <td><a id="edit_button" class="btn btn-warning" href="">Update</a></td>
            
                        <td><a id="delete_button" class="btn btn-danger" href="">Delete</a></td>   
                       --> 
                    </tr>


                    @empty

                        <tr>
                            <td colspan="16">
                                <div class="empty-search">
                                    <p>No data found.</p>
                                </div>
                            </td>
                        </tr>
     
                    @endforelse



                </table>
            </div>

        </div>
        </div>
    </div>

    <!-- container-scroller -->

    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->

  </body>
</html>
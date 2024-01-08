<!DOCTYPE html>
<html lang="en">
  <head>
        @include('admin.css')

        <style>
            .wrapper {
                width: min(900px, 100% - 3rem);
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
            .add_new a {
                width: 170px;
                height: 30px;
                margin-bottom: 20px;
                float: right;
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
                .prod-det {
                    position: relative;
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

            @if(session()->has('message'))

            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>

            @endif



            <div class="wrapper">

                <div class="h2_text">     
                    <h2>
                        All Products
                    </h2>
                </div>
                <div class="add_new">
                    <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-toggle="dropdown" aria-expanded="false" href="{{url('/add_product')}}">+ Add New Product</a>
                </div>
            <div class="table-container">
            <table>

                <tr>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Old Price</th>
                    <th>New Price</th>
                    <th>Main Image</th>
                    <th></th>
                    <th></th>
                </tr>

                @foreach($product as $product)

                <tr class="prod-det">
                    <td data-cell="Product Name: ">{{$product->title}}</td>
                    <td id="prod-desc" data-cell="Description">{{$product->description}}</td>
                    <td data-cell="Category: ">{{$product->category}}</td>
                    <td data-cell="Old Price: ">{{$product->old_price}}</td>
                    <td data-cell="New Price: ">{{$product->new_price}}</td>
                    <td data-cell="Main Image: "><img src="/product/{{$product->image_1}}" alt=""></td>

                    <td><a id="edit_button" class="btn btn-warning" href="{{url('update_product',$product->id)}}">Update</a></td>

                    <td><a id="delete_button" onclick="return confirm('Do you wish to remove the Product: {{$product->title}}?')" class="btn btn-danger" href="{{url('delete_product',$product->id)}}">Delete</a></td>
                    
                </tr>

                @endforeach

            </table>
            </div>
        </div>

        </div>
    </div>
    </div>
    <!-- End custom js for this page -->
  </body>
</html>
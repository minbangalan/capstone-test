<!DOCTYPE html>
<html lang="en">
  <head>
        @include('admin.css')

    <style type="text/css">
        .category {
           margin: auto;
           justify-content: center;
        }
        .div_center {
            text-align: center;
            padding-top: 50px;
        }
        .div_center h2 {
            font-size: 30px;
            padding-bottom: 20px;

        }
        .close {
            font-size: 17px;
            align-items: center;
        }
        .alert.alert-success {
            right: 100px;
            position: absolute;
        }
        .wrapper {
            width: min(600px, 100% - 3rem);
            margin-inline: auto;
        }
            
        table {
            color: white;
            background: #313641;
            width: 100%;
            margin: 0 auto;
            border-collapse: collapse;
            text-align: center;
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
        #cate-input {
            height: 30px;
            border-radius: 3px;
            margin-bottom: 20px;
        }
        .center_form {
            text-align: center;
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
                <div class="div_center">
                    <h2>Add Category</h2>
                </div>

                <div class="center_form">
                    <form action="{{url('/add_category')}}" method="post" class="category_form">

                        @csrf

                        <input id="cate-input" type="text" name="category" placeholder="Enter category name">

                        <input type="submit" class="btn btn-success" name="submit" value="Add Category">
                    </form>
                </div>

                <div class="table-container">
                <table>
                    <tr>
                        <td>Product Category</td>
                        <td>Action</td>
                    </tr>

                    @foreach($data as $data)

                    <tr>
                        <td>{{$data->category_name}}</td>
                        <td><a onclick="return confirm('Are you sure to remove {{$data->category_name}} category?')" href="{{url('delete_category',$data->id)}}" class="btn btn-danger">Remove</a></td>
                    </tr>

                    @endforeach
                </table>
                </div>
            </div>
        </div>

    <!-- container-scroller -->
    </div>
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
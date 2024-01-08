<!DOCTYPE html>
<html lang="en">
  <head>
        @include('admin.css')

    <style>
        .add_product h2 {
          text-align: center;
          margin-top: 30px;
          margin-bottom: 20px;
          font-size: 25px;
        }

        form {
            width: 500px;
            margin: 0 auto;
            background-color: #191C24;
            border-radius: 5px;
        }
        .form-group {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
        }
        #exampleFormControlInput1, #exampleFormControlSelect1, #exampleFormControlTextarea1 {
            color: white;
            margin-bottom: 15px;
            background: #2A3038;
        }

        .alert.alert-success {
            right: 100px;
            position: absolute;
        }
        .close {
            font-size: medium;
            margin-left: 20px;
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


        <div class="add_product">
            <h2>Add Product</h2>
        </div>

        <form action="{{url('/new_product')}}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="form-group">

              <label for="exampleFormControlInput1">Product Name:</label>
              <input type="name" name="title" class="form-control" id="exampleFormControlInput1" required="">
            
            
              <label for="exampleFormControlSelect1">Category</label>
              <select class="form-control" id="exampleFormControlSelect1" name="category" required="">

                @foreach($category as $category)

                <option value="{{$category->category_name}}">{{$category->category_name}}</option>

                @endforeach

              </select>
           
           
              <label for="exampleFormControlTextarea1">Description</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" required=""></textarea>

             
                <div class="form-row">
                  <div class="col">
                    <label for="exampleFormControlInput1">Old Price:</label>
                    <input type="number" class="form-control" id="exampleFormControlTextarea1" name="old_price">
                  </div>
                  <div class="col">
                    <label for="exampleFormControlInput1">New Price:</label>
                    <input type="number" class="form-control" id="exampleFormControlTextarea1" name="new_price" required="">
                  </div>
                </div>
             

              <label for="exampleFormControlInput1">Main Image:</label>

             

              <input type="file" class="form-control-file" name="image_1" id="exampleFormControlInput1" required="">

              <label for="exampleFormControlInput1">Image Link 2:</label>
              <input type="file" class="form-control-file" name="image_2" id="exampleFormControlInput1">

              <label for="exampleFormControlInput1">Image Link 3:</label>
              <input type="file" class="form-control-file" name="image_3" id="exampleFormControlInput1">

              <label for="exampleFormControlInput1">Image Link 4:</label>
              <input type="file" class="form-control-file" name="image_4" id="exampleFormControlInput1">

              <button class="btn btn-warning" type="submit">Add Product</button>

            </div>
          </form>
        

        </div>
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
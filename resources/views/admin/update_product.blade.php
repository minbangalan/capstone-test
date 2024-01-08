<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
        @include('admin.css')

    <style>
        .add_product h2 {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 20px;
            font-size: 20px;
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
        .btn.btn-warning {
          position: absolute;
          right: 20px;
          top: 10px;
        }

        .nav.nav-tabs {
          position: relative;
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
            <h2>Update Product</h2>
        </div>

        <form action="{{url('/update_confirm',$product->id)}}" method="post" enctype="multipart/form-data">

          @csrf

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Product Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specifications</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Images</a>
          </li>
          
          <button class="btn btn-warning" value="update">Save</button>

        </ul>

        

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">              

            
            <div class="form-group">
  
            <label for="exampleFormControlInput1">Product Name:</label>
            <input type="name" name="title" class="form-control" id="exampleFormControlInput1" required="" value="{{$product->title}}">
          
          
            <label for="exampleFormControlSelect1">Category</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category" required="">

              <option value="{{$product->category}}">{{$product->category}}</option>

              @foreach($category as $category)
              
              <option value="{{$category->category_name}}">{{$category->category_name}}</option>

              @endforeach

              <label for="exampleFormControlTextarea1">Description</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" value="{{$product->description}}">{{$product->description}}</textarea>

            </select>
          </div>
        </div>

          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            
            <div class="form-group">
              <div class="form-row">
                <div class="col">
                  <label for="exampleFormControlInput1">Old Price:</label>
                  <input type="number" class="form-control" id="exampleFormControlTextarea1" name="old_price" value="{{$product->old_price}}">
                </div>
                <div class="col">
                  <label for="exampleFormControlInput1">New Price:</label>
                  <input type="number" class="form-control" id="exampleFormControlTextarea1" name="new_price" value="{{$product->new_price}}" required="">
                </div>
              </div>
          </div>


          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            
            <div class="form-group">
              <label for="exampleFormControlInput1">Main Image:</label>
              <img src="/product/{{$product->image_1}}" alt="">
              <input type="file" class="form-control-file" name="image_1"  id="exampleFormControlInput1">
  
              <label for="exampleFormControlInput1">Image 2:</label>
              <img src="/product/{{$product->image_2}}" alt="">
              <input type="file" class="form-control" name="image_2" value="{{$product->image_2}}"id="exampleFormControlInput1">
  
              <label for="exampleFormControlInput1">Image 3:</label>
              <img src="/product/{{$product->image_3}}" alt="">
              <input type="file" class="form-control" name="image_3" value="{{$product->image_3}}" id="exampleFormControlInput1">
  
              <label for="exampleFormControlInput1">Image 4:</label>
              <img src="/product/{{$product->image_4}}" alt="">
              <input type="file" class="form-control" name="image_4" value="{{$product->image_4}}" id="exampleFormControlInput1">
  

            </div>

          </div>
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
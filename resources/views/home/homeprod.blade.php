<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>

       <div class="row">
         @foreach($product as $product)

          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{url('product_details',$product->id)}}" class="option1">
                        Product View
                      </a>
                      <a href="" class="option2">
                        Compare
                      </a>
                   </div>
                </div>

                <div class="img-box">
                   <img src="product/{{$product->image_1}}" alt="">
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
                     Php {{$product->new_price}}
                  </h6>
                </div>

             </div>
            <div class="qty-form"> 
               <form action="{{url('add_cart',$product->id)}}" method="post">
                  @csrf
                  <input type="number" value="1" name="quantity" id="item_qty">
                  <input type="submit" value="Buy Now" id="buy_button">
               </form>
            </div>
          </div>
         
          @endforeach

      <!-- <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div> -->
    </div>
 </section>
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\Order;

use PDF;

class AdminController extends Controller
{
    public function view_category() {

        $data=category::all();

        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request) {
        $data=new category;

        $data->category_name=$request->category;

        $data->save();

        return redirect()->back()->with('message', 'Category added successfully');
    }

    public function delete_category($id) {
        $data=category::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Category deleted successfully');
    }

    public function add_product() {

        $category=category::all();

        return view('admin.product',compact('category'));
    }

    public function new_product(Request $request) {

        $product=new product;
    //tablename->columnname=request->name sa input type
        $product->title=$request->title;
        $product->description=$request->description;
        $product->old_price=$request->old_price;
        $product->new_price=$request->new_price;
        $product->category=$request->category;

        $image=$request->image_1;
        $imagename_1=time().'.'.$image->getClientOriginalExtension();
        $request->image_1->move('product',$imagename_1);
        $product->image_1=$imagename_1;

        $image_two=$request->image_2;
        $imagename_2=time().'.'.$image_two->getClientOriginalExtension();
        $request->image_2->move('product',$imagename_2);
        $product->image_2=$imagename_2;

        $image_three=$request->image_3;
        $imagename_3=time().'.'.$image_three->getClientOriginalExtension();
        $request->image_3->move('product',$imagename_3);
        $product->image_3=$imagename_3;



        $product->save();

        return redirect()->back()->with('message','New product added!');
    }

    public function view_product() {
        $product=product::all();
        return view('admin.all_products',compact('product'));
    }

    public function delete_product($id) {

        $product=product::find($id);
        $product->delete();

        return redirect()->back()->with('message', 'A product has been deleted');
    }

    public function update_product($id) {
        
        $product=product::find($id);

        $category=category::all();

        return view('admin.update_product',compact('product','category'));
    }

    public function update_confirm(Request $request,$id) {

        $product=product::find($id);

        $product->title=$request->title;
        $product->description=$request->description;
        $product->category=$request->category;
        $product->old_price=$request->old_price;
        $product->new_price=$request->new_price;


        $image=$request->image_1;
        if($image) {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image_1->move('product',$imagename);
            $product->image_1=$imagename;
        }

        $image_two=$request->image_2;
        if($image_two) {
            $imagename_two=time().'.'.$image_two->getClientOriginalExtension();
            $request->image_2->move('product',$imagename_two);
            $product->image_2=$imagename_two;
        }

        $image_three=$request->image_3;
        if($image_three) {
            $imagename_three=time().'.'.$image_three->getClientOriginalExtension();
            $request->image_3->move('product',$imagename_three);
            $product->image_3=$imagename_three;
        }

        $image_four=$request->image_4;
        if($image_four) {
            $imagename_four=time().'.'.$image_four->getClientOriginalExtension();
            $request->image_4->move('product',$imagename_four);
            $product->image_4=$imagename_four;
        }

        $product->save();

        return redirect()->back()->with('message', 'A product has been updated');

    }
    
    public function order() {

        $order=order::all();

        return view('admin.order',compact('order'));

    }

    public function delivered($id) {

        $order=order::find($id);

        $order->delivery_status="Delivered";

        $order->save();

        return redirect()->back();

    }

    
    public function paid($id) {

        $order=order::find($id);

        $order->payment_status="Paid";

        $order->save();

        return redirect()->back();

    }

    public function print_pdf($id) {

        $order=order::find($id);

        // to make the PDF file from the pdf blade php
        $pdf=PDF::loadView('admin.pdf',compact('order'));

        // to download pdf file :
        return $pdf->download('order_details.pdf');
    }

    public function searchdata(Request $request) {

        $searchText=$request->search;

        $order=order::where('name','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->orWhere('email','LIKE',"%$searchText%")->orWhere('product_title','LIKE',"%$searchText%")->orWhere('payment_status','LIKE',"%$searchText%")->orWhere('delivery_status','LIKE',"%$searchText%")->get();

        return view('admin.order',compact('order'));
    }
}

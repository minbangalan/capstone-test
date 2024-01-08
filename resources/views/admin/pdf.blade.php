<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        h2 {
            text-align: center;
        }
        p {
            margin-left: 100px;
        }

    </style>
</head>
<body>
    
 brand Logo here

<h2>Order Details #{{$order->id}}</h2>

<p>Customer Name: {{$order->name}}</p>

<p>Product: {{$order->product_title}} </p>
<p>Product ID: {{$order->product_id}}</p>

<p>Shipping Address: {{$order->address}}  </p>

<p>Quantity: {{$order->quantity}}</p>

<p>Price: {{$order->price}}</p>

<p>Payment Status: {{$order->payment_status}}</p>

<p>Delivery Status: {{$order->delivery_status}}</p>

</body>
</html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Prepaid Balance</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{asset('css/main.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        @include('header')
        <br>
        <p class="font-label text-center">your order number</p>
        <p class="font-label text-center">{{$data->order_number}}</p>
        <br>
        <br>
        <p class="font-label text-center">Total</p>
        <p class="font-label text-center">{{$data->total_price}}</p>
        <br>
        <p class="font-label text-center">{{$data->product}} that cost {{$data->price}} will be shipped to {{$data->address}}</p>
        <form action="{{url('payment')}}"><input type="submit" value="Pay Here" style="margin-right: 48%;"></form>
    </body>
</html>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{asset('css/main.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        @include('header')
        <div class="flex-center position-ref full-height">  
            <div class="content">
                <div class="title m-b-md">
                    Welcome to<br>Atoz
                </div>

                <div class="links">
                    <a href="prepaid-balance">Prepaid Balance</a>
                    <a href="product">Product</a>
                    <a href="payment">Payment</a>
                    <a href="order">Order</a>
                </div>
            </div>
        </div>
    </body>
</html>

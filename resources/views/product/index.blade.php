<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Product</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="css/main.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    @include('header')
    <h2 class="text-header font-label">Product</h2>

        <form action="product/submit" method="post">
            <div class="container">
                <div class="form-group">
                    <label class="font-label">Product:</label>
                    @if ($errors->any())
                        @if (array_key_exists('product', $errors->getBags()['default']->getMessages()))
                            @foreach ($errors->getBags()['default']->getMessages()['product'] as $message)
                                <span class="text-danger font-error">{{$message}}</span>                                
                            @endforeach
                        @endif
                    @endif
                    <input type="text-area" class="form-control" name="product">
                </div>
                <div class="form-group">
                    <label class="font-label">Shipping Address:</label>
                    @if ($errors->any())
                        @if (array_key_exists('shipping', $errors->getBags()['default']->getMessages()))
                            @foreach ($errors->getBags()['default']->getMessages()['shipping'] as $message)
                                <span class="text-danger font-error">{{$message}}</span>                                
                            @endforeach
                        @endif
                    @endif
                    <input type="text-area" class="form-control" name="shipping">
                </div>
                <div class="form-group">
                        <label class="font-label">Price:</label>
                        @if ($errors->any())
                            @if (array_key_exists('price', $errors->getBags()['default']->getMessages()))
                                @foreach ($errors->getBags()['default']->getMessages()['price'] as $message)
                                    <span class="text-danger font-error">{{$message}}</span>                                
                                @endforeach
                            @endif
                        @endif
                        <input type="text-area" class="form-control" name="price">
                    </div>
                <div class="form-group">
                    <input class="font-label" type="submit" value="submit">
                </div>
        </form> 
    </body>
</html>
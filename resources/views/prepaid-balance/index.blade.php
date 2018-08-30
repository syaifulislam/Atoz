<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Prepaid Balance</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="css/main.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    @include('header')
    <h2 class="text-header font-label">Prepaid Balance</h2>

        <form action="prepaid-balance/submit" method="post">
            <div class="container">
                <div class="form-group">
                    <label class="font-label">Mobile Phone Number:</label>
                    @if ($errors->any())
                        @if (array_key_exists('mobile', $errors->getBags()['default']->getMessages()))
                            @foreach ($errors->getBags()['default']->getMessages()['mobile'] as $message)
                                <span class="text-danger font-error">{{$message}}</span>                                
                            @endforeach
                        @endif
                    @endif
                    <input type="text" class="form-control" name="mobile">
                </div>
                <div class="form-group">
                    <label class="font-label">Value:</label>
                    @if ($errors->any())
                        @if (array_key_exists('value', $errors->getBags()['default']->getMessages()))
                            @foreach ($errors->getBags()['default']->getMessages()['value'] as $message)
                                <span class="text-danger font-error">{{$message}}</span>                                
                            @endforeach
                        @endif
                    @endif
                    <select name="value" class="form-control opt">
                        <option value=""></option>
                        <option value="10000">10000</option>
                        <option value="50000">50000</option>
                        <option value="100000">100000</option>
                    </select>
                </div>
                <div class="form-group">
                    <input class="font-label" type="submit" value="submit">
                </div>
        </form> 
    </body>
</html>
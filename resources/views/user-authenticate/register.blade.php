<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Register</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{asset('css/main.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
            <h2 class="text-header font-label">Register</h2>

            <form action="login/register" method="post">
                <div class="container">
                        <div class="form-group">
                                <label class="font-label">Email:</label>
                                @if ($errors->any())
                                    @if (array_key_exists('email', $errors->getBags()['default']->getMessages()))
                                        @foreach ($errors->getBags()['default']->getMessages()['email'] as $message)
                                            <span class="text-danger font-error">{{$message}}</span>                                
                                        @endforeach
                                    @endif
                                @endif
                                <input type="email" class="form-control" name="email" required>
                            </div>
                    <div class="form-group">
                        <label class="font-label">Username:</label>
                        @if ($errors->any())
                            @if (array_key_exists('username', $errors->getBags()['default']->getMessages()))
                                @foreach ($errors->getBags()['default']->getMessages()['username'] as $message)
                                    <span class="text-danger font-error">{{$message}}</span>                                
                                @endforeach
                            @endif
                        @endif
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label class="font-label">Password:</label>
                        @if ($errors->any())
                            @if (array_key_exists('password', $errors->getBags()['default']->getMessages()))
                                @foreach ($errors->getBags()['default']->getMessages()['password'] as $message)
                                    <span class="text-danger font-error">{{$message}}</span>                                
                                @endforeach
                            @endif
                        @endif
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <input class="font-label btn-login" type="submit" value="Register">
                    </div>
            </form>      
    </body>
</html>
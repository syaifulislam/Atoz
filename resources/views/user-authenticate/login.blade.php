<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{asset('css/main.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
            <h2 class="text-header font-label">Login</h2>
            <form action="login/authenticate" method="post">
                <div class="container">
                    <div class="form-group">
                        <label class="font-label">Username:</label>
                        @if ($errors->any())
                            @if (array_key_exists('username', $errors->getBags()['default']->getMessages()))
                                @foreach ($errors->getBags()['default']->getMessages()['username'] as $message)
                                    <span class="text-danger font-error">{{$message}}</span>                                
                                @endforeach
                            @endif
                        @endif
                        <input type="text" class="form-control" name="username">
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
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <input class="font-label btn-login" type="submit" value="Login">
                    </div>
                    <p class="font-label mid-text">OR</p>
                    <a class="font-label mid-text-regis text-black" href="register">Register</a>
            </form>
            {{-- alert --}}
            @if (session()->has('message'))
                <div class="alert alert-danger alert-red alert-session">
                    <h3 class="alert-col">
                            <span><i class=" white-alert"></i></span>
                            <span class="white-alert">{{ session()->get('message') }}</span><br>
                    </h3>
                </div>
            @endif      
    </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            $('.alert-session').fadeOut('fast');
        }, 3000);
    });
    
</script>
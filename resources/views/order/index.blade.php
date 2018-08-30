<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Order</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{asset('css/main.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        @include('header')
        <div class="container" style="width: 60%;"> 
            <label class="font-label search-label">search</label>
            <input type="text" class="search-box search-order" name="find" value="{{ old('find') }}">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Order no.</th>
                    <th>Description</th>
                    <th>Total</th>
                    <th>Information</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($dataArray as $item)
                        <tr>
                            <td>{{$item['order_no']}}</td>
                            <td>{{$item['description']}}</td>
                            <td>{{$item['total']}}</td>
                            @if ($item['code'] == 'Pay')
                                <td><a href="payment/submit?id={{$item['order_no']}}">{{$item['code']}}</a></td>
                            @else
                                <td>{{$item['code']}}</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $dataArray->links() }}
        </div>
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

    $('.search-order').change(function(){
        window.location.href = '/order?id='+$(this).val();
    });
    
</script>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Stravovaci system')</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" type="text/css" />
    
</head>



<body class=' {{ Request::segment(1) }}'>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href=" {{ URL::route('home') }} " class='logo'>Student FOOD</a></li>
                    <li><a href=" {{ URL::route('home') }} ">Home</a></li>
                    <li><a href="{{ URL::route('menu') }}">Menu</a></li>
                    <li><a href=" {{ URL::route('order') }} ">Orders</a></li>
                    <li><a href=" {{ URL::route('showmeals') }} ">Show all meals</a></li>
                    @if (Auth::check())
                    @if ($user->admin)
                        <li><a href=" {{ URL::route('admin') }} ">Administracia</a></li>
                    @endif
                        <li><a href="#">{{ $user->name }}  ({{ $user->wallet }}€)</a></li>
                        <li><a href="{{ URL::route('logout') }}">Logout</a></li>
                    @else
                        <li><a href="{{ URL::route('login') }}">Login</a></li>
                        <li><a href="{{ URL::route('register') }}">Register</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    
    @yield('content')
    
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/i18n/defaults-*.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>
    
</body>
</html>
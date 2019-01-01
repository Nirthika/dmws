<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <!-- <title> @yield('title') </title> -->
    <title>Dengue Monitoring and Warning System</title>
    <link rel="shortcut icon" href="{!! asset('images/logoNoBackground.png') !!}"/>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" style="overflow: hidden;">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="width: 100%;">
            <div class="container" style="padding-left: 2%; padding-right: 4%;">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="<?= asset('images/logo.png') ?>" alt="logo" height="8%" width="30%">
                </a>                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a></li>
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            <li><a class="nav-link" href="#aboutUs">{{ __('About') }}</a></li>
                            <li><a class="nav-link" href="#contactUs">{{ __('Contact') }}</a></li>
                        @else
                            <li>
                                <a class="nav-link" href="{{ url('/') }}">
                                <img src="/images/home.png" style="width:30px; height:32px; position:relative; border-radius:50%;">
                                </a>
                            </li>
                            <li class="nav-item dropdown" data-animations="fadeInDown fadeInRight fadeInUp fadeInLeft">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hover="dropdown" v-pre>
                                    <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:30px; height:32px; position:relative; border-radius:50%;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width: 5rem;">
                                    <a class="dropdown-item" href="{{ url('/myHome') }}"><i class="fa fa-home"></i>&emsp;{{ __('My Home') }}</a>
                                    <a class="dropdown-item" href="{{ url('/profile') }}"><i class="fa fa-user"></i>&emsp;{{ __('Profile') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i>&emsp;{{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <script>
                // When the user scrolls down 20px from the top of the document, show the button
                window.onscroll = function() {scrollFunction()};

                function scrollFunction() {
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        document.getElementById("return-to-top").style.display = "block";
                    } else {
                        document.getElementById("return-to-top").style.display = "none";
                    }
                }

                // When the user clicks on the button, scroll to the top of the document
                function topFunction() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                }
            </script>
            
            <button onclick="topFunction()" id="return-to-top"><i class="fa fa-chevron-up"></i></button>
            @yield('content')
        </main>

    </div>
</body>
</html>
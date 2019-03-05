
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bitchest') }}</title>   

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-static-top navbar-laravel">
        <!--<nav class="navbar navbar-default navbar-static-top">-->
            <div class="container">
                <div class="navbar-header">

                    <!-- Branding Image -->
                    @if(Auth::id() > 0 && Auth::user()->admin > 0)
                    
                        <a class="navbar-brand" href="{{  route('admin.index') }}">
                            <img src="{{URL('/images', 'bitchest_logo.png')}}" style="width:100px;height:50px";>                       
                        </a>
                    
                    @elseif(Auth::id() > 0 && Auth::user()->admin < 1)
                    
                        <a class="navbar-brand" href="{{  route('user.index') }}">
                            <img src="{{URL('/images', 'bitchest_logo.png')}}" style="width:100px;height:50px";>
                      
                        </a>
                    
                    @else
                        <a class="navbar-brand" href="{{ route('login') }}">
                        <img src="{{URL('/images', 'bitchest_logo.png')}}" style="width:100px;height:50px";>
                    </a>
                    
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                   <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

<!--affichage message succès -->
                    <div class="container py-2">
                        <div id='flash'>
                            @if(session()->has('alert') || session('alert'))
                                <div class="alert alert-{!! session('alert')['class'] !!} alert-dismissible fade show" role="alert">
                                    {!! session('alert')['message'] !!}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

 
v fdbvefkbvjzbl
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>


    
</body>
</html>

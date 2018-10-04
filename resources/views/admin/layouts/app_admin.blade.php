<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/h_4462.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/dist2/jquery.min.js')}}" rel="javascript" type="text/javascript"></script>
    <script src="{{  asset('js/jquery.viewportchecker.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/ajax.js')}}"></script>
    <script src="{{ asset('js/jquery.scrollme.js')}}"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav left-side-navbar">
                              <li class="nav-item">
                                <a class="nav-link" href="">news</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="">categories</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="">support</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="">help</a>
                              </li>
                            </ul>
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                      <a href="{{route('user.profile',Auth::user()->id)}}" class="dropdown-item">Profile</a>
                                        <a href="" class="dropdown-item">Settings</a>
                                        @if(Auth::user()->role === 'admin')
                                        <a href="{{ route('admin.index')}}" class="dropdown-item">Admin panel</a>
                                        @endif
                                        <div class="dropdown-divider"></div>

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
        <div class="container">
        <div class="row">
        @isset($categories_limit)
        <div class="categories-block py-3">

        <ul class="navbar-nav categories-ul categories-ul-display d-none d-md-block">

          @foreach ($categories_limit as $category_limit)

          <a href="{{route('caregory.show',array($category_limit->name))}}"><li class="categories-li">{{ $category_limit->name }}</li></a>

          @endforeach
        </ul>

        <h5 id="arrow" class="categories-menu-title d-md-none">Categories <div class="arrow i-1">
            <span></span>
            <span></span>
          </div></h5>
        <ul id="panel_categories" class="navbar-nav categories-ul-md-down d-md-none">

          @foreach ($categories_limit as $category_limit)

          <li class="categories-li-mobile"><a href="{{route('caregory.show',array($category_limit->name))}}">{{ $category_limit->name }}</a></li>

          @endforeach

        </ul>
      @endisset
        </div>
        </div>

        @isset($categories_limit)
        <div class="row row-shadow px-3">
        @endisset
            <div class="row">

                @hasSection('popular-articles')

                <div class="col-md-12 col-lg-12 row-shadow-pre-content">

                    @yield('popular-articles')

                </div>

                @endif

            </div>
        <div class="row">

          @yield('content')

        </div>
        @isset($categories_limit)
      </div>
        @endisset
    </div>

    @yield('footer')

</body>

</html>

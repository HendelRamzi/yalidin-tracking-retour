<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss'])
    @vite(['resources/js/app.js'])

    @livewireStyles

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark  shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Retour Management
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item dropdown">
                                <a id="BoxManagement" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre 
                                    style="font-weight: bold; font-size: 1rem"
                                >
                                    Boxes
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="BoxManagement">
                                    <a class="dropdown-item" href="{{ route('box.index') }}">
                                        List of Box
                                    </a>
                                    <a class="dropdown-item" href="{{ route('box.create') }}">
                                        Add a box
                                    </a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="BoxManagement" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre 
                                    style="font-weight: bold; font-size: 1rem"
                                >
                                    Stores
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="BoxManagement">
                                    <a class="dropdown-item" href="{{ route('store.index') }}">
                                        List of Stores
                                    </a>
                                    <a class="dropdown-item" href="{{ route('store.create') }}">
                                        Add Store
                                    </a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="BoxManagement" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre 
                                    style="font-weight: bold; font-size: 1rem"
                                >
                                    Trackings
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="BoxManagement">
                                    <a class="dropdown-item" href="{{ route('tracking.index') }}">
                                        List of tracking
                                    </a>
                                </div>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>                              
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>

    @livewireScripts
    @stack('js-plugins')
    @stack('custom-script')
</body>
</html>

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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Movie
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('movies.index')}}">Movies</a></li>
                                <li><a class="dropdown-item" href="{{route('movies.index', ['filter' => 'best'])}}">Best movies</a></li>
                                <li><a class="dropdown-item" href="{{route('movies.index', ['filter' => 'worst'])}}">Worst movies</a></li>
                                <li><a class="dropdown-item" href="{{route('movies.index', ['filter' => 'longest'])}}">Longest movies</a></li>
                                <li><a class="dropdown-item" href="{{route('movies.index', ['filter' => 'shortest'])}}">Shortest movies</a></li>
                                <li><a class="dropdown-item" href="{{route('movies.index', ['filter' => 'oldest'])}}">Oldest movies:</a></li>
                                <li><a class="dropdown-item" href="{{route('movies.index', ['filter' => 'newest'])}}">Newest movies:</a></li>
                                <li><a class="dropdown-item" href="#">Categories</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('movies.create')}}">Add movie</a></li>
                                <li><a class="dropdown-item" href="{{route('categories.create')}}">Add category</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Articles
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('articles.index')}}">Articles</a></li>
                                <li><a class="dropdown-item" href="{{route('tags.index')}}">Tags</a></li>
                                <li><a class="dropdown-item" href="#">Latest</a></li>
                                <li><a class="dropdown-item" href="#">Most viewed</a></li>
                                <li><a class="dropdown-item" href="#">Most answered</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('articles.create')}}">Add article</a></li>
                                <li><a class="dropdown-item" href="{{route('tags.create')}}">Add tag</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                People
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('directors.index')}}">Directors</a></li>
                                <li><a class="dropdown-item" href="#">Actors</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Add director</a></li>
                                <li><a class="dropdown-item" href="#">Add actor</a></li>
                            </ul>
                            </li>

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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<style>
/* Navbar gradasi dengan shadow dan border radius */
.custom-navbar {
    background: linear-gradient(to right, #fbc02d, #ffeb3b, #fff9c4);
    padding: 1rem;
    border-radius: 0 0 10px 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Logo Home */
.navbar-brand {
    font-weight: bold;
    color: #4e342e;
    font-size: 1.2rem;
}

.navbar-brand:hover {
    color: #6d4c41;
}

/* Link navbar */
.navbar .nav-link {
    color: #5d4037 !important;
    font-weight: 500;
    margin: 0 10px;
    transition: 0.3s;
}

.navbar .nav-link:hover,
.navbar .nav-link.active {
    color: white !important;
    background-color: #f57c00;
    border-radius: 5px;
    padding: 6px 12px;
}

/* Dropdown styling */
.dropdown-menu {
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.15);
}

.dropdown-menu a:hover {
    background-color: #fbc02d;
    color: black !important;
}

</style>

    <!-- Font Awesome Free CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <i class="fa-solid fa-house"></i>  Home

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('penghuni') }}">Penghuni</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pembayaran') }}">Pembayaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kamarkos') }}">Kamar Kos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('riwayat_penghuni') }}">Riwayat</a>
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
                                    <i class="fa-solid fa-circle-user"> {{ Auth::user()->name }} </i>
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
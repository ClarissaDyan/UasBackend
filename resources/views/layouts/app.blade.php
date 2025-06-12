<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<style>
/* Navbar background gradasi kuning cerah */
.custom-navbar {
    background: linear-gradient(90deg, #ffc107, #ffecb3); /* kuning ke krem */
    padding: 0.75rem 1rem;
    border-bottom: 3px solid #f0ad4e;
}

/* Hover efek */
.navbar .nav-link:hover {
    text-decoration: underline;
    color: #fffde7 !important;
}

/* Dropdown custom */
.dropdown-menu a:hover {
    background-color: #f0ad4e;
    color: white;
}

/* Shape bulat untuk user dropdown kanan */
.user-bubble {
    position: relative;
}

.user-bubble::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 120%;
    height: 100%;
    background: rgba(255, 193, 7, 0.25);
    border-radius: 30px;
    z-index: -1;
    transform: translateX(10%);
}

/* Responsiveness */
@media (max-width: 768px) {
    .user-bubble::before {
        width: 100%;
        transform: none;
    }
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
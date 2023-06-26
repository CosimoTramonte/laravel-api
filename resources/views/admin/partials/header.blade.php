<header>
    <nav class="navbar navbar-expand-md h-100">
        <div class="container-fluid h-100 d-flex align-content-center">
            <a class="navbar-brand d-flex align-items-center logo-a" href="{{ route('admin.home') }}">
                <div class="logo_laravel">
                    <img src="/img/logo.png" alt="">
                </div>
                {{-- config('app.name', 'Laravel') --}}
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="{{ route('home') }}">Vai al sito</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                            </li>
                        @endif
                    @else
                        <li class="d-flex">

                            <form action="{{route('admin.projects.index')}}" class="d-flex me-3" method="GET">
                                <input
                                    type="text"
                                    class="form-control me-3"
                                    name="search"
                                    placeholder="Cerca il progetto"
                                >
                                <button class="btn btn-primary me-3">Cerca</button>
                            </form>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-light"><i class="fa-solid fa-arrow-right-from-bracket"></i></button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>

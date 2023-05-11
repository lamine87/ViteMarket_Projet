<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="p-2 navbar-brand" href="#">
        <img class="logo-vitmarket" src="{{ asset('icon/Logo2.ico') }}" alt="">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home </a>
            </li>
            <li class="nav-item">
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Mon
                                compte</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">S'identifier</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Je
                                    m'inscris</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>

        {{-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        </form> --}}

        <div class="search-body">
            <div class="search-box">
                <input type="text" name="" class="search-txt" placeholder="Tapez pour rechercher" />
                <a class="search-btn" href="#">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        <div class="btn btn-success ml-4">
            <a href="{{ route('login') }}" class="">Faire une annonce</a>
        </div>

    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Voiture</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Immobilier</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Multimedia</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Emploi</a>
            </li>
        </ul>

    </div>
</nav>

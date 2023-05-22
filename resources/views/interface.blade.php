<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="vente">
    <meta name="author" content="Lamine Diarra">
    <title>VITEMARKET</title>
    <link rel="icon" href="{{ asset('icon/Logo2.png') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts.family.css') }}" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    @vite(['ressources/css/app.css', 'ressources/js/app.js'])



</head>

<body>

    <!--Navbar-->
    <header>
        @include('header.navbar')
    </header>
    <!--Navbar-->
    @if (session('success'))
        <div class="container">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if (session('status'))
        <div class="container">
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="container">
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        </div>
    @endif


    <div class="container">
            @yield('content')
    </div>


    <!-- Footer -->
    <footer>
        @include('footer.footer')
    </footer>
    <!-- Footer -->

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>

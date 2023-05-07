<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="vente">
    <meta name="author" content="Lamine Diarra">
    <title>{{ config('app.name', 'VITEMARKET') }}</title>
    <meta name="description" content="vente">
    <meta name="author" content="Lamine Diarra">

    <link rel="icon" href="{{asset('icon/Logo2.png')}}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('js/app.js') }}" rel="stylesheet"> --}}



</head>

<body>

    <!--Navbar-->
    <header>
        @include('header.navbar')
    </header>
    <!--Navbar-->


    <div class="container">
        @yield('content')
    </div>


    <!-- Footer -->
    <footer>
         @include('footer.footer')
    </footer>
     <!-- Footer -->

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>

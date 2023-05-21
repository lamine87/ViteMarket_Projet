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
    {{-- @yield('content') --}}

    <div class="container">
        <div class="row">
            @if (count($articles) > 0)
                @foreach ($articles as $article)
                    <div class="card col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3" style="max-width: 50%;">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <p class="card-text"><strong>{{ $article->prix }} €</strong></p>
                                </span>
                                <img src="{{ asset('storage/upload/' . $article->image) }}" width="100%"
                                    height="100%" class="img-fluid rounded" alt="...">
                                <div class="">
                                    <span class="translate-middle badge rounded-pill bg-primary">
                                        <p class="card-text">
                                            <strong>
                                                <?php setlocale(LC_TIME, 'FR');?>
                                                {{ strftime('%A, %d %B %Y', strtotime($article->created_at)) }}
                                            </strong>
                                        </p>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title"><strong>{{ $article->nom }}</strong></h5>
                                    <p class="card-text">{{ $article->description }}</p>
                                    {{-- <p class="card-text"><small class="text-muted">Adresse :</small></p> --}}
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            @else
                <div class="bg-white p-6 text-gray-900">
                    <h1>Aucune annonce publiée</h1>
                </div>
            @endif


        </div>
        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
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

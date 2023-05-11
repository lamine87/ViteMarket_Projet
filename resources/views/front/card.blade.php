@extends('interface')
@section('content')
    {{-- <div class="row">
        @if (count($articles) > 0)
        @foreach ($articles as $article)
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">

                    <div class="col-md-4">
                        <img src="{{ asset('storage/upload/' . $article->image) }}" class="img-fluid rounded-start"
                            alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $article->nom }}</strong></h5>
                            <p class="card-text"><strong>{{ $article->prix }} €</strong></p>
                            <p class="card-text">{{ $article->description }}</p>
                            <p class="card-text"><small class="text-muted">Adresse :</small></p>
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
        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    </div> --}}
@endsection

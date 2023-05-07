@extends('interface')
@section('content')
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            @foreach ($articles as $article)
                <div class="col-md-4">
                    <img src="{{ asset('storage/upload/' . $article->image) }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><strong>{{ $article->nom }}</strong></h5>
                        <p class="card-text"><strong>{{ $article->prix }} €</strong></p>
                        <p class="card-text">{{ $article->description }}</p>
                        <p class="card-text"><small class="text-muted">Adresse :</small></p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    </div>
@endsection

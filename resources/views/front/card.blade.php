@extends('interface')
@section('content')
        {{-- <div class="row">
            @if (count($articles) > 0)
                @foreach ($articles as $article)
                    <div class="card col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3 mr-1" style="max-width: 50%;">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <img src="{{ asset('storage/upload/' . $article->image) }}" width="100%" height="100%"
                                    class="mb-0 img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-6">
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

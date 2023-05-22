@extends('interface')
@section('content')
<div class="row">
    @if (count($articles) > 0)
        @foreach ($articles as $article)
            <div class="card col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3 mt-2" style="max-width: 50%;">
              <a href="{{ route('article.detail',['id' => $article->id]) }}" class="card_detail">
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
              </a>
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
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-white text-gray-800 leading-tight">
            {{ __('Mon compte') }}
        </h2>
    </x-slot>
    <div class="bg-white p-6 text-gray-900">

    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('article.edit', ['id' => $article->id]) }}" method="POST"
                    enctype="multipart/form-data" class="">
                    @csrf
                    @method('patch')
                    <div class="text-center">
                        <h2 class="">Mettre à jour votre article</h2>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom"
                                value="{{ $article->nom }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" name="description" id="description">{{ $article->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="prix">Prix</label>
                            <input type="text" class="form-control" id="prix" name="prix"
                                value="{{ $article->prix }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <img class="rounded-lg" style="border: 2px solid #5b64f1 "height="10%" width="10%"
                                src="{{ asset('storage/upload/' . $article->image) }}" alt="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="file" class="form-control mt-2" id="image" name="image"
                                    value="{{ $article->image }}">
                            </div>
                        </div>


                    <x-primary-button type="submit" class="mt-2">{{ __('Envoyer') }}</x-primary-button>
            </div>

        </div>
    </div>

    </form>
    </div>
    </div>
    </div>
</x-app-layout>

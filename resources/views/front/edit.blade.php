<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-white text-gray-800 leading-tight">
            {{ __('Mon compte') }}
        </h2>
    </x-slot>
    <div class="bg-white p-6 text-gray-900">
        <div class="text-center">
            <strong>
                <h1 class="font-semibold text-dark text-gray-800 leading-tigh">Modifié Article</h1>
            </strong>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-4">
                <form action="{{ route('article.edit', ['id' => $article->id]) }}" method="POST"
                    enctype="multipart/form-data" class="">
                    @csrf
                    @method('patch')

                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-md-4 col-lg-4">
                            <label for="nom">Titre</label>
                          <input type="text" class="form-control rounded" placeholder="Titre"
                             name="nom" id="nom" value="{{ $article->nom }}">
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <label for="prix">Prix</label>
                            <input type="text" class="form-control rounded"  name="prix" id="prix" placeholder="Prix"
                               name="prix" value="{{ $article->prix }}">
                        </div>
                        <div class="col-lg-2"></div>
                      </div>


                      <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-md-8 col-lg-8  mt-3">
                            <label for="categories">Categories</label>
                            <select multiple class="form-control rounded" id="categories" name="categories[]">
                                @foreach ($categories as $categorie)
                                    <option {{-- {{old('categorie_id') == $categorie->id ? "selected" : ""}} --}} selected="selected" value="{{ $categorie->id }}">
                                        {{ $categorie->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2"></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-md-8 col-lg-8  mt-3">
                            <label for="nom">Description</label>
                            <textarea type="text" class="form-control rounded" name="description" id="description">{{ $article->description }}</textarea>
                        </div>
                        <div class="col-lg-2"></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-md-8 col-lg-8 mt-3">
                            <label for="image">Image</label>
                            <img class="rounded-lg" style="border: 2px solid #5b64f1 "height="10%" width="10%"
                                src="{{ asset('storage/upload/' . $article->image) }}" alt="">
                        </div>
                        <div class="col-lg-2"></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-md-8 col-lg-8">
                            <input type="file" class="form-control mt-4 " id="image" name="image"
                                value="{{ $article->image }}">
                        </div>
                        <div class="col-lg-2"></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-2">

                        </div>
                        <div class="col-md-8 col-lg-8">
                            <x-primary-button type="submit" class="mt-4">{{ __('Envoyer') }}</x-primary-button>
                        </div>
                        <div class="col-lg-2"></div>
                      </div>

            </div>

        </div>
    </div>

    </form>
    </div>
    </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-white text-gray-800 leading-tight">
            {{ __('Mon compte') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                {{-- @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif --}}

                <div class="bg-white p-6 text-gray-900">

                    <div class="">
                        <x-primary-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-send')">
                            {{ __('Publier vouvelle annonce') }}
                        </x-primary-button>
                        {{-- Modal de creation d'article --}}
                        <x-modal name="confirm-send" :show="$errors->articleStore->isNotEmpty()" focusable>

                            @if ($errors->any())
                                <div class="alert alert-warning">
                                    @foreach ($errors as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif

                            <form method="post" action="{{ route('article.create') }}" enctype="multipart/form-data"
                                class="p-6">
                                @csrf
                                @method('post')

                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Publier de nouveau article') }}
                                </h2>

                                <div class="mt-6">
                                    <x-input-label for="nom" value="{{ __('Titre') }}" class="sr-only" />
                                    <x-text-input id="nom" name="nom" type="text" class="mt-1 block w-3/4"
                                        placeholder="{{ __('Titre') }}" />
                                    <x-input-error :messages="$errors->articleStore->get('nom')" class="mt-2" />
                                </div>
                                <div class="mt-6">
                                    <x-input-label for="description" value="{{ __('Description') }}" class="sr-only" />
                                    <x-text-input id="description" name="description" type="text"
                                        class="mt-1 block w-3/4" placeholder="{{ __('Description') }}" />
                                    <x-input-error :messages="$errors->articleStore->get('description')" class="mt-2" />
                                </div>
                                <div class="mt-6">
                                    <x-input-label for="categories" value="{{ __('Catégorie') }}" class="sr-only" />
                                        <select multiple class="rounded mt-1 block w-3/4" id="categories" name="categories[]">
                                            @foreach($categories as $categorie)
                                                <option
                                                {{old('categorie_id') == $categorie->id ? "selected" : ""}}
                                                 value="{{$categorie->id}}">
                                                {{$categorie->nom}}
                                                </option>
                                            @endforeach
                                        </select>
                                    <x-input-error :messages="$errors->articleStore->get('categorie')" class="mt-2" />
                                </div>

                                <div class="mt-6">
                                    <x-input-label for="prix" value="{{ __('Prix') }}" class="sr-only" />
                                    <x-text-input id="prix" name="prix" type="text" class="mt-1 block w-3/4"
                                        placeholder="{{ __('Prix') }}" />
                                    <x-input-error :messages="$errors->articleStore->get('prix')" class="mt-2" />
                                </div>
                                <div class="mt-6">
                                    <x-input-label for="image" value="{{ __('Image') }}" class="sr-only" />
                                    <x-text-input id="image" name="image" type="file" class="mt-1 block w-3/4"
                                        placeholder="{{ __('Image') }}" />
                                    <x-input-error :messages="$errors->articleStore->get('prix')" class="mt-2" />
                                </div>
                                <div class="mt-3 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')" class="ml-1">
                                        {{ __('Close') }}
                                    </x-secondary-button>

                                    <x-secondary-button type="reset" class="ml-1">
                                        {{ __('Reinitialiser') }}
                                    </x-secondary-button>

                                    <x-primary-button type="submit" class="ml-1">
                                        {{ __('Envoyer') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </x-modal>
                        {{-- Fin du modal de creation d'article --}}
                    </div>
                </div>
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Numero</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Description</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Image</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        @if (count($articles) > 0)
                            @foreach ($articles as $article)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $article->id }}</th>
                                        <td>{{ $article->nom }}</td>
                                        <td class="text_article">{{ $article->description }}</td>
                                        <td>{{ $article->prix }}€</td>
                                        <td class="" width="5%" height="5%">
                                            <img class="rounded-lg" style="border: 1px solid #5b64f1"
                                                src="{{ asset('storage/upload/' .$article->image) }}" alt="">
                                        </td>

                                        <td class="editEndDelete">
                                            <a class="btn btn-outline-primary"
                                                href="{{ route('getArticle.edit', ['id' => $article->id]) }}">
                                                <img class="icon-vitmarket" src="{{ asset('icon/editer.png') }}"
                                                    alt="">
                                            </a>
                                        <td class="editEndDelete">
                                            <form action="{{route('article.destroy',['id'=>$article->id])}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return(confirm('sans regret ?'))" class="btn btn-outline-danger" type="submit">
                                                    <img class="icon-vitmarket" src="{{ asset('icon/supprimer.png') }}"alt="">
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        @else
                            <div class="bg-white p-6 text-gray-900">
                                <h1>Vous n'avez pas encore publier d'annonce</h1>
                            </div>
                        @endif

                    </table>


                    <div class="d-flex justify-content-center">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

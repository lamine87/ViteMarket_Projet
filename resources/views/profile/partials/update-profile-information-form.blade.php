<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informations sur le profil') }}
        </h2>
    <div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Mettez à jour les informations de profil et l'adresse e-mail de votre compte.") }}
        </p>

    </header>
    @if ($errors->any())
        <div class="alert alert-warning">
            @foreach ($errors as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update', ['id' => $user->id]) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="prenom" :value="__('Prenom')" />
            <x-text-input id="prenom" name="prenom" type="text" class="mt-1 block w-full" :value="old('prenom', $user->prenom)" required autofocus autocomplete="prenom" />
            <x-input-error class="mt-2" :messages="$errors->get('prenom')" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        @if ($user->avatar != null)
            <div class="">
                <img class="rounded-lg" style="border: 1px solid #5b64f1" width="10%" height="10%"
                    src="{{ asset('storage/avatar/' .$user->avatar) }}" alt="">
            </div>
        @endif

        <div>
            <x-input-label for="avatar" :value="__('Photo de profil')" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)"/>
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Votre adresse e-mail n\'est pas vérifiée.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Cliquez ici pour renvoyer l\'email de vérification.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>

            @if (session('success') === 'Profil modifié')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Enregistré avec succès.') }}</p>
            @endif
        </div>
    </form>
</section>

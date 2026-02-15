@extends('layout')

@section('title', 'Page d\'inscription')

@section('main')
    <main class="pt-3">
        <div class="gap-0 d-flex justify-content-center">
            <a href="/inscription" class="btn-conInc inscription"><span>Inscription</span></a>
            <a href="/connexion" class="btn-conInc connexion"><span>Connexion</span></a>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Email Address -->
            <div class="input d-flex flex-column align-items-start pt-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input placeholder="Entrer votre email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Name -->
            <div class="input d-flex flex-column align-items-start pt-2">
                <x-input-label for="name" :value="__('Nom')" />
                <x-text-input placeholder="Entrer votre Nom" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Prenom -->
            <div class="input d-flex flex-column align-items-start pt-2">
                <x-input-label for="prenom" :value="__('Prénom')" />
                <x-text-input placeholder="Entrer votre Prénom" id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom" />
                <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="input d-flex flex-column align-items-start pt-2">
                <x-input-label for="password" :value="__('Mot de passe')" />

                <x-text-input placeholder="........"
                              id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="input d-flex flex-column align-items-start pt-3">
                <x-input-label for="password_confirmation" :value="__('Retaper le mot de passe')" />

                <x-text-input placeholder="........"
                              id="password_confirmation"
                              type="password"
                              name="password_confirmation"
                              required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="row-auto d-flex justify-content-center pt-3">
                <x-primary-button class="btn-validConInc inscription">
                    {{ ('Inscription') }}
                </x-primary-button>
            </div>
        </form>
    </main>
@endsection

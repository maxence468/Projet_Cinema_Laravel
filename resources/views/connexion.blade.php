@php
    //use App\Http\Controllers\SeanceController;
@endphp

@extends('layout')

@section('title', 'Page de connexion')

@section('main')
    <main class="pt-5">
        <div class="gap-0 d-flex justify-content-center">
            <a href="/inscription" class="btn-conInc inscription"><span>Inscription</span></a>
            <a href="/connexion" class="btn-conInc connexion"><span>Connexion</span></a>
        </div>
{{--
        <div class="input d-flex flex-column align-items-start pt-4">
            <label for="email">Email</label>
            <input type="text" placeholder="Entrer votre email">
        </div>
        <div class="input d-flex flex-column align-items-start pt-3">
            <label for="email">Mot de passe</label>
            <input placeholder="........">
        </div>
        <div class="row-auto d-flex justify-content-center pt-4">
            <a href="inscription.blade.php" class="btn-validConInc inscription"><span>Connexion</span></a>
        </div>
--}}


        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="input d-flex flex-column align-items-start pt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input placeholder="Entrer votre email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="input d-flex flex-column align-items-start pt-3">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input placeholder="........"
                              id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="row-auto d-flex justify-content-center pt-4">
                <x-primary-button class="btn-validConInc inscription">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </main>
@endsection

@extends('layout')

@section('title', 'Page de connexion')

@section('main')
    <main class="pt-5">
        <div class="gap-0 d-flex justify-content-center">
            <a href="/inscription" class="btn-conInc inscription"><span>Inscription</span></a>
            <a href="/connexion" class="btn-conInc connexion"><span>Connexion</span></a>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="inputConInc d-flex flex-column align-items-start pt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input placeholder="Entrer votre email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="inputConInc d-flex flex-column align-items-start pt-3">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input placeholder="........"
                              id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="inputConInc d-flex flex-column align-items-center pt-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="row-auto d-flex justify-content-center pt-4">
                <x-primary-button class="btn-validConInc">
                    {{ __('Connexion') }}
                </x-primary-button>

            </div>
        </form>
    </main>
@endsection

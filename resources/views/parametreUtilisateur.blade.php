@extends('layout')

@section('title', 'Page paramètres')

@section('main')
    <main class="pt-3">
        <div class="d-flex flex-column align-items-center">
            <div class="gap-0 d-flex justify-content-start pb-2">
                <p class="m-0">Paramètres du compte</p>
            </div>
            @if(session('success'))
                {{session('success')}}
            @endif
            <div class="d-flex flex-column align-items-center pt-3">
                <form method="POST" action="{{ route('userUpdate', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <!-- Email Address -->
                    <div class="input d-flex flex-column align-items-start pt-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input placeholder="Entrer votre email" id="email" class="block mt-1 w-full" type="email" name="email" value="{{old('email', $user->email)}}" required autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Name -->
                    <div class="input d-flex flex-column align-items-start pt-2">
                        <x-input-label for="name" :value="__('Nom')" />
                        <x-text-input placeholder="Entrer votre Nom" id="name" class="block mt-1 w-full" type="text" name="name" value="{{old('name', $user->nomUser)}}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Prenom -->
                    <div class="input d-flex flex-column align-items-start pt-2">
                        <x-input-label for="prenom" :value="__('Prénom')" />
                        <x-text-input placeholder="Entrer votre Prénom" id="prenom" class="block mt-1 w-full" type="text" name="prenom" value="{{old('prenom', $user->preUser)}}" required autofocus autocomplete="prenom" />
                        <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="input d-flex flex-column align-items-start pt-2">
                        <x-input-label for="password" :value="__('Mot de passe')" />

                        <x-text-input placeholder="........"
                                      id="password" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="input d-flex flex-column align-items-start pt-3">
                        <x-input-label for="password_confirmation" :value="__('Confirmer mot de passe')" />

                        <x-text-input placeholder="........"
                                      id="password_confirmation" class="block mt-1 w-full"
                                      type="password"
                                      name="password_confirmation" autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>


                    <div class="row-auto d-flex justify-content-center pt-3">
                        <x-primary-button class="btn-validConInc">
                            {{ __('Modifier') }}
                        </x-primary-button>
                    </div>
                </form>
                <div class="row-auto d-flex justify-content-center pt-3">
                    <form action="{{ route('userDestroy', $user->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                        @csrf
                        @method('DELETE')
                        <x-primary-button class="btn-validConInc">Supprimer</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection

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
    </main>
@endsection

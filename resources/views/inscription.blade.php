@php
    //use App\Http\Controllers\SeanceController;
@endphp

@extends('layout')

@section('title', 'Page d\'inscription')

@section('main')
    <main class="pt-3">
        <div class="gap-0 d-flex justify-content-center">
            <a href="/inscription" class="btn-conInc inscription"><span>Inscription</span></a>
            <a href="/connexion" class="btn-conInc connexion"><span>Connexion</span></a>
        </div>

        <div class="input d-flex flex-column align-items-start pt-3">
            <label class="label" for="email">Email</label>
            <input type="text" placeholder="Entrer votre email">
        </div>

        <div class="input d-flex flex-column align-items-start pt-2">
            <label class="label" for="nom">Nom</label>
            <input type="text" placeholder="Entrer votre nom">
        </div>

        <div class="input d-flex flex-column align-items-start pt-2">
            <label class="label" for="prenom">Prénom</label>
            <input placeholder="Entrer votre prénom">
        </div>

        <div class="input d-flex flex-column align-items-start pt-2">
            <label class="label" for="email">Mot de passe</label>
            <input placeholder="........">
        </div>

        <div class="input d-flex flex-column align-items-start pt-2">
            <label class="label" for="email">Retaper le mot de passe</label>
            <input placeholder="........">
        </div>

        <div class="row-auto d-flex justify-content-center pt-3">
            <a href="inscription.blade.php" class="btn-validConInc inscription"><span>Inscription</span></a>
        </div>
    </main>
@endsection

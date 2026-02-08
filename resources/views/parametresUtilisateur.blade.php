@extends('layout')

@section('title', 'Page paramètres')

@section('main')
    <main class="pt-3">
        <div class="d-flex flex-column align-items-center">
            <div>
                <div class="gap-0 d-flex justify-content-start pb-2">
                    <p class="m-0">Paramètres du compte</p>
                </div>

                <div class="input d-flex flex-column align-items-start pt-2">
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
                    <label class="label" for="password">Mot de passe</label>
                    <input placeholder="........">
                </div>

                <div class="input d-flex flex-column align-items-start pt-2">
                    <label class="label" for="confirm_password">Retaper le mot de passe</label>
                    <input placeholder="........">
                </div>
            </div>
            <div class="d-flex flex-column align-items-center pt-3">
                <form action="" method="POST" class="w-100 d-flex justify-content-center">
                    @csrf @method('PATCH')
                    <button class="btn-validConInc inscription style-equal" type="submit">Modifier</button>
                </form>

                <form action="" method="POST" class="w-100 d-flex justify-content-center pt-3">
                    @csrf @method('DELETE')
                    <button class="btn-validConInc inscription style-equal" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    </main>
@endsection

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function edit($id){
        $user = User::findOrfail($id);

        return view('parametreUtilisateur', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['nullable','confirmed', Rules\Password::defaults()],

        ]);

        $user = User::findOrFail($id);

        $data = [
            'nomUser' => $request->name,
            'preUser' => $request->prenom,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('parametreUtilisateur', $id)
            ->with('success', 'Profil modifié');
    }

    public function destroy($id){
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('accueil')
            ->with('success', 'Utilisateur supprimé avec succès');
    }

}

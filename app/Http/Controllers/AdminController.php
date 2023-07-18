<?php

namespace App\Http\Controllers;

use App\Models\AvisClient;
use App\Models\FormulaireContact;
use App\Models\JourOuverture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login', ['jours' => JourOuverture::all(),]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $credentials[$fieldType] = $request->login;
        unset($credentials['login']);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'login' => 'Mot de passe ou utilisateur incorrect.',
        ]);
    }

    public function dashboard()
    {
        $avisClient = AvisClient::whereNull('approved_by')->get();
        $formulaires = FormulaireContact::whereNull('settledBy')->get();


        // dd($avisClient);

        return view(
            'auth.dashboard',
            [
                'jours' => JourOuverture::all(),
                'formulaires' => $formulaires,
                'avisClient' => $avisClient,
            ]
        );
    }

    public function updateJourOuverture(Request $request)
    {
        $request->validate([
            'Lundi' => 'required',
            'Mardi' => 'required',
            'Mercredi' => 'required',
            'Jeudi' => 'required',
            'Vendredi' => 'required',
            'Samedi' => 'required',
            'Dimanche' => 'required',
        ]);

        $jours = $request->all();

        foreach ($jours as $jour => $horaire) {
            if ($jour !== '_token') {
                JourOuverture::where('jour', $jour)->update(['horaire' => $horaire]);
            }
        }

        return redirect()->back()->with('success', "Heures d'ouverture modifiés avec succès.");
    }


    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
}

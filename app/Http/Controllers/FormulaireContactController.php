<?php

namespace App\Http\Controllers;

use App\Models\FormulaireContact;
use App\Models\JourOuverture;
use Illuminate\Http\Request;

class FormulaireContactController extends Controller
{
    public function index()
    {
        return view('formulaire', ['jours' => JourOuverture::all(),]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'adresse_email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        FormulaireContact::create($validatedData);

        // Redirect or perform additional actions
        return redirect()->back()->with('success', 'Message envoyé avec succès!');
    }
}

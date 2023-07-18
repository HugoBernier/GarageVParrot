<?php

namespace App\Http\Controllers;

use App\Models\AvisClient;
use App\Models\JourOuverture;
use Illuminate\Http\Request;

class AvisClientController extends Controller
{
    public function index()
    {
        $avis = AvisClient::paginate(10);

        return view('avis_client', [
            'avis' => $avis,
            'jours' => JourOuverture::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'rate' => 'required|integer',
            'commentaire' => 'required',
        ]);

        $commentaire = new AvisClient();
        $commentaire->nom = $validatedData['nom'];
        $commentaire->note = $validatedData['rate'];
        $commentaire->commentaire = $validatedData['commentaire'];
        $commentaire->save();

        return redirect()->back()->with('success', 'Avis ajouté avec succès.');
    }


    public function create()
    {
        return view('avis_create', ['jours' => JourOuverture::all()]);
    }
}

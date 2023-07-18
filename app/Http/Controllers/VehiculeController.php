<?php

namespace App\Http\Controllers;

use App\Models\JourOuverture;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function list(Request $request)
    {
        $query = Vehicule::query();

        // Check if any filter values are provided
        if ($request->has('kilometrage_min') && !is_null($request->input('kilometrage_min'))) {
            $query->where('kilometrage', '>=', $request->input('kilometrage_min'));
        }
        if ($request->has('kilometrage_max') && !is_null($request->input('kilometrage_max'))) {
            $query->where('kilometrage', '<=', $request->input('kilometrage_max'));
        }
        if ($request->has('prix_min') && !is_null($request->input('prix_min'))) {
            $query->where('prix', '>=', $request->input('prix_min'));
        }
        if ($request->has('prix_max') && !is_null($request->input('prix_max'))) {
            $query->where('prix', '<=', $request->input('prix_max'));
        }

        $vehicules = $query->paginate(10);


        return view('vehicules_list', [
            'vehicules' => $vehicules,
            'jours' => JourOuverture::all()
        ]);
    }


    public function show(Vehicule $vehicule)
    {
        return view('vehicule', [
            'vehicule' => $vehicule,
            'jours' => JourOuverture::all(),
        ]);
    }

    public function create()
    {
        return view(
            'auth.vehicule_create',
            [
                'jours' => JourOuverture::all(),
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'prix' => 'required',
            'annee' => 'required',
            'kilometrage' => 'required',
            'caracteristiques' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imagePath = $request->file('image')->store('resources/images', 'public');

        $vehicule = new Vehicule();
        $vehicule->image = $imagePath;
        $vehicule->marque = $request->marque;
        $vehicule->modele = $request->modele;
        $vehicule->prix = $request->prix;
        $vehicule->annee = $request->annee;
        $vehicule->kilometrage = $request->kilometrage;
        $vehicule->caracteristiques = $request->caracteristiques;
        $vehicule->admin_id = auth()->user()->id;
        $vehicule->save();

        return redirect()->route('dashboard')->with('success', 'Vehicule créé avec succes.');
    }
}

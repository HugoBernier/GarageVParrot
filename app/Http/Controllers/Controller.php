<?php

namespace App\Http\Controllers;

use App\Models\AvisClient;
use App\Models\JourOuverture;
use App\Models\Vehicule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('index', [
            'vehicules' => Vehicule::inRandomOrder()->limit(4)->get(),
            'avis' => AvisClient::inRandomOrder()->limit(2)->get(),
            'jours' => JourOuverture::all(),
        ]);
    }
}

@extends('layout')

@section('content')
<div class="container mx-auto mt-8 bg-white rounded-lg shadow-md p-8 mb-96">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Détails du véhicule</h2>
        <a href="{{ route('index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
            Retour
        </a>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div class="col-span-1">
            <img src="{{ $vehicule->image }}" alt="{{ $vehicule->marque }} {{ $vehicule->modele }}" class="w-full h-auto">
        </div>
        <div class="col-span-1">
            <h3 class="text-xl font-bold mb-4">{{ $vehicule->marque }} {{ $vehicule->modele }}</h3>
            <h3 class="text-gray-600"> Id du vehicule {{ $vehicule->id }}</h3>
            <p class="text-gray-600">Prix : {{ $vehicule->prix }} €</p>
            <p class="text-gray-600">Année : {{ $vehicule->annee }}</p>
            <p class="text-gray-600">Kilométrage : {{ $vehicule->kilometrage }}</p>
            <h4 class="text-lg font-bold mt-6">Caractéristiques :</h4>
            <p>{{ $vehicule->caracteristiques }}</p>
        </div>
    </div>
</div>
@endsection
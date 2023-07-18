@extends('layout')

@section('content')
<div class="container mx-auto mt-8 bg-white rounded-lg shadow-md p-8 mb-24">
    <h2 class="text-2xl font-bold mb-4">Prendre rendez-vous</h2>
    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nom" class="block font-medium">Nom *</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom') }}" class="border rounded-lg py-2 px-3 w-full" required>
        </div>
        <div class="mb-4">
            <label for="adresse_email" class="block font-medium">Adresse email *</label>
            <input type="email" id="adresse_email" name="adresse_email" value="{{ old('adresse_email') }}" class="border rounded-lg py-2 px-3 w-full" required>
        </div>
        <div class="mb-4">
            <label for="phone" class="block font-medium">Téléphone *</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="border rounded-lg py-2 px-3 w-full" required>
        </div>
        <div class="mb-4">
            <label for="vehicule_id" class="block font-medium">ID du Véhicule (si achat vehicule)</label>
            <input type="text" id="vehicule_id" name="vehicule_id" value="{{ old('vehicule_id') }}" class="border rounded-lg py-2 px-3 w-full">
        </div>
        <div class="mb-4">
            <label for="message" class="block font-medium">Message *</label>
            <textarea id="message" name="message" value="{{ old('message') }}" class="border rounded-lg py-2 px-3 w-full" rows="4" required></textarea>
        </div>
        <div class="flex justify-between items-center mb-4">
            <button type="submit" class="bg-blue-500 text-white rounded-lg py-2 px-4">Envoyer</button>
            <a href="{{ route('index') }}" class="text-blue-500">Retour</a>
        </div>
    </form>
</div>
@endsection
@extends('layout')

@section('content')
<div class="container mx-auto mt-8 bg-white rounded-lg shadow-md p-8 mb-24">
    <h2 class="text-2xl font-bold mb-4">Create Voiture</h2>

    @if ($errors->any())
    <div class="mb-4">
        <ul class="text-red-500">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('voiture.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="marque" class="block mb-2">Marque</label>
            <input type="text" id="marque" name="marque" class="w-full border border-gray-300 rounded px-2 py-1" value="{{ old('marque') }}" required>
        </div>

        <div class="mb-4">
            <label for="modele" class="block mb-2">Modele</label>
            <input type="text" id="modele" name="modele" class="w-full border border-gray-300 rounded px-2 py-1" value="{{ old('modele') }}" required>
        </div>

        <div class="mb-4">
            <label for="prix" class="block mb-2">Prix</label>
            <input type="number" id="prix" name="prix" class="w-full border border-gray-300 rounded px-2 py-1" value="{{ old('prix') }}" required>
        </div>

        <div class="mb-4">
            <label for="annee" class="block mb-2">Annee</label>
            <input type="number" id="annee" name="annee" class="w-full border border-gray-300 rounded px-2 py-1" value="{{ old('annee') }}" required>
        </div>

        <div class="mb-4">
            <label for="kilometrage" class="block mb-2">Kilometrage</label>
            <input type="number" id="kilometrage" name="kilometrage" class="w-full border border-gray-300 rounded px-2 py-1" value="{{ old('kilometrage') }}" required>
        </div>

        <div class="mb-4">
            <label for="caracteristiques" class="block mb-2">Caracteristiques</label>
            <textarea id="caracteristiques" name="caracteristiques" class="w-full border border-gray-300 rounded px-2 py-1" rows="4" required>{{ old('caracteristiques') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
            <input type="file" name="image" id="image" class="form-control-file block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
        </div>

        <div class="flex justify-between items-center mb-4">
            <button type="submit" class="bg-blue-500 text-white rounded-lg py-2 px-4">Create</button>
            <a href="{{ route('dashboard') }}" class="text-blue-500">Back</a>
        </div>
    </form>
</div>
@endsection

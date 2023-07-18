@extends('layout')

@section('content')
<div class="flex justify-center">
    <form action="{{ route('vehicules.list') }}" method="GET" class="mb-8 p-4 bg-gray-200 rounded-lg">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="kilometrage_min" class="block mb-1">Min Kilometrage:</label>
                <input type="number" id="kilometrage_min" name="kilometrage_min" class="w-full border border-gray-300 rounded px-2 py-1" value="{{ old('kilometrage_min') }}">
            </div>
            <div>
                <label for="kilometrage_max" class="block mb-1">Max Kilometrage:</label>
                <input type="number" id="kilometrage_max" name="kilometrage_max" class="w-full border border-gray-300 rounded px-2 py-1" value="{{ old('kilometrage_max') }}">
            </div>
            <div>
                <label for="prix_min" class="block mb-1">Min Prix:</label>
                <input type="number" id="prix_min" name="prix_min" class="w-full border border-gray-300 rounded px-2 py-1" value="{{ old('prix_min') }}">
            </div>
            <div>
                <label for="prix_max" class="block mb-1">Max Prix:</label>
                <input type="number" id="prix_max" name="prix_max" class="w-full border border-gray-300 rounded px-2 py-1" value="{{ old('prix_max') }}">
            </div>
        </div>
        <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Filter</button>
    </form>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 min-h-screen w-10/12 mx-auto">
    @forelse ($vehicules as $vehicule)
    <div class="bg-white rounded-lg shadow-md p-6 flex flex-col">
        <img src="{{ $vehicule['image'] }}" alt="{{ $vehicule['marque'] }} {{ $vehicule['modele'] }}" class="w-full h-80 object-cover mb-4">
        <div class="flex text-left">
            <a href="{{ route('vehicule.show', ['vehicule' => $vehicule['id']]) }}" class="mr-4">
                <h3 class="text-gray-600">{{ $vehicule['marque'] }}</h3>
                <p class="text-xl font-bold">{{ $vehicule['modele'] }}</p>
            </a>
            <div class="flex-grow">
                <p class="text-right font-bold text-lg">{{ $vehicule['prix'] }} €</p>
            </div>
        </div>
    </div>
    @empty
    <p>Pas de véhicule trouvé.</p>
    @endforelse
</div>
<div class="flex justify-center mt-8  mb-8">
    {{ $vehicules->links() }}
</div>

@endsection
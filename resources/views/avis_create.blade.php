@extends('layout')

@section('content')
<div class="container mx-auto mt-8 bg-white rounded-lg shadow-md p-8 mb-24">
    <h2 class="text-2xl font-bold mb-4">Ajouter un Avis</h2>

    <form action="{{ route('store.avis') }}" method="POST" class="flex flex-col">
        @csrf

        <div class="mb-4">
            <label for="nom" class="block mb-2">Nom</label>
            <input type="text" id="nom" name="nom" value="{{old('nom')}}" class="w-full border border-gray-300 rounded px-2 py-1" required>
        </div>

        <div class="mb-4">
            <label for="note" class="block mb-2">Note</label>
            <!-- <input type="number" id="note" name="note" class="w-full border border-gray-300 rounded px-2 py-1" required> -->
            <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
            </div>
        </div>

        <div class="mb-4">
            <label for="commentaire" class="block mb-2">Commentaire</label>
            <textarea id="commentaire" name="commentaire" value="{{old('commentaire')}}" class="w-full border border-gray-300 rounded px-2 py-1" required></textarea>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white w-24 rounded hover:bg-blue-700">Ajouter</button>
    </form>
</div>
@endsection
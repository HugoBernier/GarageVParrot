@extends('layout')

@section('content')
<div class="container mx-auto mt-8 bg-white rounded-lg shadow-md p-8 mb-24">
    <h2 class="text-2xl font-bold mb-4">Dashboard</h2>
    <div class="mb-8">
        <a href="{{ route('voiture.create') }}" class="text-xl font-medium text-blue-600 dark:text-blue-500 hover:underline">Créer Véhicule</a>
    </div>
    @if (Auth::user()->is_admin)
    <div class="mb-8">
        <a href="{{ route('user.create') }}" class="text-xl font-medium text-blue-600 dark:text-blue-500 hover:underline">Créer User</a>
    </div>
    <div class="mb-8">
        <h3 class="text-lg font-bold mb-2">Heures de Connexion</h3>
        <form action="{{ route('jours.update') }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-2">
                @foreach ($jours as $jour)
                <div class="mb-4">
                    <label for="{{ $jour['jour'] }}">{{ $jour['jour'] }}:</label>
                    <input type="text" id="{{ $jour['jour'] }}" name="{{ $jour['jour'] }}" value="{{ $jour['horaire'] }}" class="border border-gray-300 rounded-lg py-2 px-3 w-full">
                </div>
                @endforeach
            </div>

            <button type="submit" class="bg-blue-500 text-white rounded-lg py-2 px-4 ">Modifier</button>
        </form>
    </div>
    @endif

    <div class="grid grid-cols-2 gap-6">
        <div>
            <h3 class="text-xl font-bold mb-2">Formulaire De Contact</h3>
            <div id="contact-forms">
                @if (isset($formulaires))
                @foreach ($formulaires as $formulaire)
                <div class="bg-white rounded-lg shadow-md p-4 mb-4">
                    <div class="mb-2">
                        <p><strong>Name:</strong> {{ $formulaire->nom }}</p>
                        <p><strong>Email:</strong> {{ $formulaire->adresse_email }}</p>
                        <p><strong>Phone:</strong> {{ $formulaire->phone }}</p>
                        <p><strong>Message:</strong> {{ $formulaire->message }}</p>
                    </div>
                    <a href="" class="accept-form-btn bg-green-500 text-white px-4 py-2 rounded">Marqué comme reglé</a>
                    <a href="" class="delete-form-btn bg-red-500 text-white px-4 py-2 rounded">Supprimer</a>
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div>
            <h3 class="text-xl font-bold mb-2">Avis client</h3>
            <div id="client-reviews">
                @if (isset($avisClient))
                @foreach ($avisClient as $avis)
                <div class="bg-white rounded-lg shadow-md p-4 mb-4">
                    <div class="mb-2">
                        <div class="flex items-center mb-4">
                            <h3 class="text-xl font-bold mr-2">{{ $avis['nom'] }}</h3>
                            <div class="flex">
                                @for ($i = 1; $i <= $avis['note']; $i++) <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 text-yellow-500">
                                    <path d="M12 18.4l-5.5 3.3 1.4-6.4L2 9.6l6.2-.5L12 2l3.8 6.1 6.2.5-4.9 5.7 1.4 6.4z" />
                                    </svg>
                                    @endfor
                            </div>
                        </div>
                        <p>{{ $avis['commentaire'] }}</p>
                    </div>
                    <a href="" class="accept-review-btn bg-green-500 text-white px-4 py-2 rounded">Accepter</a>
                    <a href="" class="delete-review-btn bg-red-500 text-white px-4 py-2 rounded">Supprimer</a>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
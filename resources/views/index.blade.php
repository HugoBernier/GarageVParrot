@extends('layout')

@section('content')

<section class="bg-cover bg-center py-16" style="background-image: url('/resources/ImageBienvenue.jpg');">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold text-white mb-8">Bienvenue Chez Garage V. Parrot</h2>
        <div class="flex justify-center">
            <a href="#services" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full mr-4">Nos Services</a>
            <a href="{{route('vehicules.list')}}" class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded-full">Véhicules d'occasion</a>
        </div>
    </div>
</section>

<section class="py-16 bg-gray-200" id="services">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-8">Nos Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <img src="/resources/ReparageAuto.jpg" alt="Service 1" class="w-full h-80 object-cover mb-4">
                <h3 class="text-xl font-bold mb-2">Réparation mécanique</h3>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <img src="/resources/PeintureAuto.jpg" alt="Service 2" class="w-full h-80 object-cover mb-4">
                <h3 class="text-xl font-bold mb-2">Carrosserie et peinture</h3>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <img src="/resources/EntretienAuto.jpg" alt="Service 2" class="w-full h-80 object-cover mb-4">
                <h3 class="text-xl font-bold mb-2">Entretien régulier</h3>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <img src="/resources/ControleAuto.jpg" alt="Service 2" class="w-full h-80 object-cover mb-4">
                <h3 class="text-xl font-bold mb-2">Controle technique</h3>
            </div>
        </div>
        <a href="{{route('contact.index')}}" class="mt-8 inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full">Prendre rendez-vous</a>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-8">Véhicules d'occasion</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($vehicules as $vehicule)
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col">
                <img src="{{ $vehicule['image'] }}" alt="{{ $vehicule['marque'] }} {{ $vehicule['modele'] }}" class="w-full h-80 object-cover mb-4">
                <div class="flex text-left">
                    <a href="{{route('vehicule.show', ['vehicule' => $vehicule['id']]) }}" class="mr-4">
                        <h3 class="text-gray-600">{{ $vehicule['marque'] }}</h3>
                        <p class="text-xl font-bold ">{{ $vehicule['modele'] }}</p>
                    </a>
                    <div class="flex-grow">
                        <p class="text-right font-bold text-lg">{{ $vehicule['prix'] }} €</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-8">
            <a href="/vehicules" class="mt-8 inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full">
                Voir tous nos véhicules
            </a>
        </div>
    </div>

</section>

<section class="py-12 bg-blue-300">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-8">Vos Commentaires</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($avis as $commentaire)
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center mb-4">
                    <h3 class="text-xl font-bold mr-2">{{ $commentaire['nom'] }}</h3>
                    <div class="flex">
                        @for ($i = 1; $i <= $commentaire['note']; $i++) <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 text-yellow-500">
                            <path d="M12 18.4l-5.5 3.3 1.4-6.4L2 9.6l6.2-.5L12 2l3.8 6.1 6.2.5-4.9 5.7 1.4 6.4z" />
                            </svg>
                            @endfor
                    </div>
                </div>
                <p>{{ $commentaire['commentaire'] }}</p>
            </div>
            @endforeach
        </div>
        <a href="{{route('avis.index')}}" class="mt-8 inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full">Plus de commentaire</a>
    </div>
</section>

@endsection
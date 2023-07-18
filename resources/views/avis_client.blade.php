@extends('layout')

@section('content')
<div class="flex justify-center">
    <div class="flex justify-between items-center mb-4 w-6/12">
        <h2 class="text-2xl font-bold">Vos Commentaires</h2>
        <a href="{{ route('create.commentaire') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Ajouter un commentaire</a>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 min-h-screen w-10/12 mx-auto">
    @forelse ($avis as $commentaire)
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
    @empty
    <p>Pas d'avis trouvé.</p>
    @endforelse
</div>

<div class="flex justify-center mt-8 mb-8">
    {{ $avis->links() }}
</div>
@endsection
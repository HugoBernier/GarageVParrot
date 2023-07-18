@extends('layout')

@section('content')
<div class="container mx-auto mt-8 bg-white rounded-lg shadow-md p-8 mb-24">
    <h2 class="text-2xl font-bold mb-4">Connexion</h2>

    <form action="{{ route('login.login') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="login" class="block mb-2">Adresse e-mail ou nom d'utilisateur</label>
            <input type="login" id="login" name="login" class="w-full border border-gray-300 rounded px-2 py-1" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block mb-2">Mot de passe</label>
            <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded px-2 py-1" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Se connecter</button>

        @error('login')
        <p class="text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </form>
</div>
@endsection
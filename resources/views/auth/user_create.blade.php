@extends('layout')

@section('content')
<div class="container mx-auto mt-8 bg-white rounded-lg shadow-md p-8 mb-24">
    <h2 class="text-2xl font-bold mb-4">Create User</h2>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block font-medium">Name *</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="border rounded-lg py-2 px-3 w-full" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block font-medium">Email *</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="border rounded-lg py-2 px-3 w-full" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block font-medium">Password *</label>
            <input type="password" id="password" name="password" class="border rounded-lg py-2 px-3 w-full" required>
        </div>
        <div class="flex justify-between items-center mb-4">
            <button type="submit" class="bg-blue-500 text-white rounded-lg py-2 px-4">Create</button>
            <a href="{{ route('dashboard') }}" class="text-blue-500">Back</a>
        </div>
    </form>
</div>
@endsection

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Other Links -->

    @stack('scripts')
</head>

<body class="antialiased">
    @if (session('success'))
    <div class="fixed top-0 right-0 w-full bg-green-500 text-white py-4 px-6">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    <header>
        <div class="mx-auto px-4 py-6 max-w-7xl flex items-center justify-between">
            <a href="{{route('index')}}" class="text-white text-xl font-bold">
                <img src="/resources/logo.png" alt="Logo Site" style="max-width: 35%;">
            </a>

            <nav class="flex items-center space-x-4">
                <a href="{{route('index')}}" class="text-black hover:text-gray-300">Accueil</a>
                <a href="{{route('vehicules.list')}}" class="text-black hover:text-gray-300">Véhicules d'occasion</a>
                @if (Auth::check())
                <a href="{{ route('dashboard') }}" class="text-black hover:text-gray-300">Dashboard</a>
                <form action="{{ route('logout') }}" class="text-black hover:text-gray-300" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="text-black hover:text-gray-300">Login</a>
                @endif

            </nav>
        </div>
    </header>

    @yield('content')

    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto flex md:flex-wrap items-center justify-between">
            <div class="w-full md:w-1/2 lg:w-1/4">
                <h3 class="text-xl font-bold mb-4">Informations de contact</h3>
                <p class="mb-2">Adresse: 123 Rue du Garage, Ville</p>
                <p class="mb-2">Téléphone: +1 234 567 890</p>
                <p>Email: contact@garageparrot.com</p>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/4">
                <h3 class="text-xl font-bold mb-4">Réseaux Sociaux</h3>
                <div class="flex space-x-4">
                    <a href="#" title="facebook">
                        <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
                    </a>
                    <a href="#" title="twitter">
                        <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i>
                    </a>
                    <a href="#" title="instagram">
                        <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                    </a>
                    <a href="#" title="youtube">
                        <i class="fa fa-youtube-square fa-2x" aria-hidden="true"></i>
                    </a>
                    <a href="#" title="linkedin">
                        <i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="w-full md:w-5/12 justify-center flex flex-col mt-6 text-center mx-auto">
            <h3 class="text-xl font-bold mb-4">Heures d'ouverture</h3>
            <div class="text-gray-300">
                @foreach ($jours as $key => $jour)
                @if ($key % 2 === 0)
                <div class="flex mb-2 justify-between">
                    <span class="mr-4">{{ $jour['jour'] }}: {{ $jour['horaire'] }}</span>
                    @if(isset($jours[$key+1]))
                    <span>{{ $jours[$key+1]['jour'] }}: {{ $jours[$key+1]['horaire'] }}</span>
                    @endif
                </div>
                @endif
                @endforeach
            </div>
        </div>



        <hr class="my-8 border-gray-600">
        <div class="container mx-auto text-gray-500 text-center">
            <p>Copyright &copy; Garage V. Parrot 2023</p>
            <p>
                <a href="#">Mentions Légales</a> |
                <a href="#">Politiques de Confidentialité</a> |
                <a href="#">Conditions d'Utilisation</a>
            </p>
        </div>
    </footer>
</body>

</html>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passaporte</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

    <nav class="bg-blue-600 text-white shadow">

        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between">

            <div>

                <a href="/" class="font-bold text-xl">
                    Passaporte
                </a>

            </div>

            <div class="space-x-4">

                @auth

                    <span>
                        {{ auth()->user()->name }}
                    </span>

                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                        class="inline"
                    >
                        @csrf

                        <button>
                            Sair
                        </button>
                    </form>

                @else

                    <a href="{{ route('login') }}">
                        Login
                    </a>

                    <a href="{{ route('register') }}">
                        Registrar
                    </a>

                @endauth

            </div>

        </div>

    </nav>

    <main class="max-w-7xl mx-auto p-6">

        @if(session('success'))

            <div class="bg-green-100 border border-green-400 text-green-700 p-4 rounded mb-4">

                {{ session('success') }}

            </div>

        @endif

        @if(session('error'))

            <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-4">

                {{ session('error') }}

            </div>

        @endif

        {{ $slot }}

    </main>

</body>

</html>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passaporte</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

    <nav class="bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-500 hover:bg-blue-700 !text-white font-bold shadow">
                🎟️ Passaporte.io
            </a>

            <div class="flex items-center gap-4">
                @auth
                    <span class="text-sm text-gray-700">
                        Olá, {{ auth()->user()->name }}
                    </span>

                    @if (auth()->user()->role === 'organizer')
                        <a href="{{ route('organizer.dashboard') }}"
                            class="inline-flex items-center justify-center bg-gray-600 hover:bg-gray-700 !text-white font-semibold px-4 py-2 rounded shadow">
                            Dashboard
                        </a>

                        <a href="{{ route('events.index') }}"
                            class="inline-flex items-center justify-center bg-gray-600 hover:bg-gray-700 !text-white font-semibold px-4 py-2 rounded shadow">
                            Meus Eventos
                        </a>
                    @endif

                    @if (auth()->user()->role === 'participant')
                        <a href="{{ route('participant.dashboard') }}"
                            class="bg-blue-600 hover:bg-blue-700 !text-white font-semibold px-4 py-2 rounded shadow">
                            Dashboard
                        </a>

                        <a href="{{ route('participant.tickets.index') }}"
                            class="inline-flex items-center justify-center bg-gray-600 hover:bg-gray-700 !text-white font-semibold px-4 py-2 rounded shadow">
                            Meus Ingressos
                        </a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="inline-flex items-center justify-center bg-red-600 hover:bg-red-700 !text-white font-semibold px-4 py-2 rounded shadow">
                            Sair
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-700 !text-white font-semibold px-4 py-2 rounded shadow">
                        Entrar
                    </a>

                    <a href="{{ route('register') }}"
                        class="inline-flex items-center justify-center bg-green-500 hover:bg-green-700 !text-white font-semibold px-4 py-2 rounded shadow">
                        Cadastrar
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto p-6">

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        {{ $slot }}

    </main>

</body>

</html>

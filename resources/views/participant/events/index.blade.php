<x-app-layout>
    @if (session('success'))
        <div class="p-3 mb-4 border">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="p-3 mb-4 border">
            {{ session('error') }}
        </div>
    @endif

    <div class="p-6">

        <h1 class="text-2xl font-bold mb-6">
            Eventos Disponíveis
        </h1>

        @foreach ($events as $event)
            <div class="border rounded p-4 mb-4">

                <h2 class="font-bold">
                    {{ $event->title }}
                </h2>

                <p>
                    Categoria:
                    {{ $event->category->name }}
                </p>

                <p>
                    {{ $event->location }}
                </p>

                <p>
                    {{ $event->date_time->format('d/m/Y H:i') }}
                </p>

                <p>
                    Vagas restantes:
                    {{ $event->capacity - $event->participants_count }}
                </p>

            </div>
            @if ($event->participants_count >= $event->capacity)
                <button disabled class="inline-flex items-center justify-center bg-gray-400 !text-white font-semibold px-4 py-2 rounded shadow cursor-not-allowed">
                    Vagas esgotadas
                </button>
            @else
                <form action="{{ route('participant.events.subscribe', $event) }}" method="POST">
                    @csrf

                    <button type="submit" class="inline-flex items-center justify-center bg-green-500 hover:bg-green-700 !text-white font-semibold px-4 py-2 rounded shadow">
                        Inscrever-se
                    </button>
                </form>
            @endif
        @endforeach

    </div>
</x-app-layout>

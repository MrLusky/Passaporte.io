<x-app-layout>

<div class="p-6">

    <h1 class="text-2xl font-bold mb-6">
        Meus Ingressos
    </h1>

    @forelse($events as $event)

        <div class="border rounded p-4 mb-4">

            <h2 class="font-bold text-lg">
                {{ $event->title }}
            </h2>

            <p>
                Local:
                {{ $event->location }}
            </p>

            <p>
                Data:
                {{ $event->date_time->format('d/m/Y H:i') }}
            </p>

            <p>
                Código:
                {{ $event->pivot->ticket_code }}
            </p>

            <p>
                Status:
                {{ $event->pivot->status }}
            </p>

            <a href="{{ route('participant.tickets.show', $event) }}" class="bg-blue-500 text-white px-3 py-2 rounded inline-block mt-2"> Ver Ingresso </a>

        </div>

    @empty

        <p>
            Nenhum ingresso encontrado.
        </p>

    @endforelse

</div>
</x-app-layout>
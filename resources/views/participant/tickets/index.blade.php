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

                <a href="{{ route('participant.tickets.show', $event) }}"
                    class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-700 !text-white font-semibold px-4 py-2 rounded shadow"> Ver Ingresso </a>

                <form action="{{ route('participant.events.unsubscribe', $event) }}" method="POST" class="mt-3">
                    @csrf
                    @method('DELETE')

                    <button type="submit" onclick="return confirm('Deseja cancelar sua inscrição neste evento?')"
                        class="inline-flex items-center justify-center bg-red-600 hover:bg-red-700 !text-white font-semibold px-4 py-2 rounded shadow">
                        Cancelar inscrição
                    </button>
                </form>

            </div>

        @empty

            <p>
                Nenhum ingresso encontrado.
            </p>
        @endforelse

    </div>
</x-app-layout>

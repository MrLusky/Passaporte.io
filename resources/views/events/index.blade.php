<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Meus Eventos
        </h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('events.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            Novo Evento
        </a>

        <div class="mt-6">
            @forelse($events as $event)
                <div class="border p-4 mb-4 rounded">
                    <img src="{{ asset('storage/' . $event->banner_path) }}" alt="{{ $event->title }}" width="250">

                    <h3 class="font-bold">
                        {{ $event->title }}
                    </h3>

                    <p>
                        {{ $event->date_time->format('d/m/Y H:i') }}
                    </p>

                    <p>
                        {{ $event->location }}
                    </p>

                    <a href="{{ route('events.edit', $event) }}">
                        Editar
                    </a>
                    <form action="{{ route('events.destroy', $event) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            Excluir
                        </button>
                    </form>
                </div>

            @empty

                <p>Nenhum evento cadastrado.</p>
            @endforelse
        </div>

        {{ $events->links() }}
    </div>
</x-app-layout>
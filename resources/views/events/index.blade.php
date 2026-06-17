<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Meus Eventos
        </h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('events.create') }}"
            class="inline-flex items-center justify-center bg-green-500 hover:bg-green-700 !text-white font-semibold px-4 py-2 rounded shadow">
            Novo Evento
        </a>

        <div class="mt-6">
            @forelse($events as $event)
                <div class="border p-4 mb-4 rounded">
                    <img src="{{ str_starts_with($event->banner_path, 'images/')
                        ? asset($event->banner_path)
                        : asset('storage/' . $event->banner_path) }}"
                        alt="{{ $event->title }}" width="250">

                    <h3 class="font-bold">
                        {{ $event->title }}
                    </h3>

                    <p>
                        {{ $event->date_time->format('d/m/Y H:i') }}
                    </p>

                    <p>
                        {{ $event->location }}
                    </p>

                    <div class="flex flex-wrap gap-2 mt-4">
                        <a href="{{ route('events.edit', $event) }}"
                            class="inline-flex items-center justify-center bg-gray-600 hover:bg-gray-700 !text-white font-semibold px-4 py-2 rounded shadow">
                            Editar
                        </a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="inline-flex items-center justify-center bg-red-600 hover:bg-red-700 !text-white font-semibold px-4 py-2 rounded shadow">
                                Excluir
                            </button>
                        </form>
                    </div>
                </div>

            @empty

                <p>Nenhum evento cadastrado.</p>
            @endforelse
        </div>

        {{ $events->links() }}
    </div>
</x-app-layout>

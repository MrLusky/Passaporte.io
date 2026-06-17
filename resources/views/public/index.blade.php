<x-app-layout>

    <div class="mb-10 text-center">

        <h1 class="text-4xl font-bold text-gray-900">
            Descubra eventos no Passaporte.io
        </h1>

        <p class="text-gray-600 mt-2">
            Encontre eventos, garanta sua vaga e receba seu ingresso digital.
        </p>

    </div>

    <div class="mb-10 flex flex-wrap gap-2 justify-center">

        <a href="{{ route('home') }}"
            class="inline-flex items-center justify-center px-4 py-2 rounded-full shadow font-semibold
        {{ request('category') ? 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-100' : 'bg-blue-500 hover:bg-blue-700 !text-white' }}">
            Todas
        </a>

        @foreach ($categories as $category)
            <a href="{{ route('home', ['category' => $category->id]) }}"
                class="inline-flex items-center justify-center px-4 py-2 rounded-full shadow font-semibold
            {{ request('category') == $category->id ? 'bg-blue-500 hover:bg-blue-700 !text-white' : 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-100' }}">
                {{ $category->name }}
            </a>
        @endforeach

    </div>

    <div class="grid md:grid-cols-3 gap-6">

        @forelse($events as $event)
            <div class="bg-white rounded-lg shadow overflow-hidden">

                <div class="bg-gray-100 h-48 flex items-center justify-center overflow-hidden">
                    <img src="{{ str_starts_with($event->banner_path, 'images/')
                        ? asset($event->banner_path)
                        : asset('storage/' . $event->banner_path) }}"
                        alt="{{ $event->title }}" class="max-h-48 max-w-full object-contain">
                </div>

                <div class="p-4">

                    <span class="text-sm text-blue-600 font-semibold">
                        {{ $event->category->name }}
                    </span>

                    <h2 class="text-xl font-bold mt-2">
                        {{ $event->title }}
                    </h2>

                    <p class="text-gray-600 mt-2">
                        {{ $event->location }}
                    </p>

                    <p class="text-gray-600">
                        {{ $event->date_time->format('d/m/Y H:i') }}
                    </p>

                    <p class="text-gray-700 mt-2">
                        Organizador:
                        {{ $event->organizer->name }}
                    </p>

                    <p class="text-gray-700 mt-2">
                        Vagas restantes:
                        {{ $event->capacity - $event->participants_count }}
                    </p>

                    <a href="{{ route('events.show', $event) }}"
                        class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-700 !text-white font-semibold px-4 py-2 rounded shadow mt-2">
                        Ver detalhes
                    </a>

                </div>

            </div>

        @empty

            <p class="text-gray-600">
                Nenhum evento encontrado.
            </p>
        @endforelse

    </div>

    <div class="mt-8">
        {{ $events->links() }}
    </div>

</x-app-layout>

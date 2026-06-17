<x-app-layout>
    <div class="bg-white rounded-lg shadow overflow-hidden max-w-6xl mx-auto">
        <div class="grid md:grid-cols-2 gap-6 p-6 items-start">

            <div class="bg-gray-100 rounded-lg flex items-center justify-center h-72 overflow-hidden">
                <img
                    src="{{ asset('storage/' . $event->banner_path) }}"
                    alt="{{ $event->title }}"
                    class="max-h-72 max-w-full object-contain rounded"
                >
            </div>

            <div>
                <span class="text-blue-600 font-semibold">
                    {{ $event->category->name }}
                </span>

                <h1 class="text-3xl font-bold mt-2">
                    {{ $event->title }}
                </h1>

                <p class="text-gray-700 mt-4">
                    {{ $event->description }}
                </p>

                <div class="space-y-2 mt-6 text-gray-700">
                    <p><strong>Organizador:</strong> {{ $event->organizer->name }}</p>
                    <p><strong>Local:</strong> {{ $event->location }}</p>
                    <p><strong>Data:</strong> {{ $event->date_time->format('d/m/Y H:i') }}</p>
                    <p><strong>Vagas restantes:</strong> {{ $event->capacity - $event->participants_count }}</p>
                </div>

                <div class="mt-6">
                    @auth
                        @if(auth()->user()->role === 'participant')
                            @if($event->participants_count >= $event->capacity)
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
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-700 !text-white font-semibold px-4 py-2 rounded shadow">
                            Entrar para se inscrever
                        </a>
                    @endauth
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
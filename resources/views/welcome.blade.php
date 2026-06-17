<x-app-layout>

    <div class="text-center py-12">

        <h1 class="text-5xl font-bold mb-4">
            Passaporte.io
        </h1>

        <p class="text-gray-600 text-lg">
            Plataforma de Gerenciamento de Eventos
        </p>

    </div>

    <div class="grid md:grid-cols-3 gap-6">

        @foreach($events as $event)

            <div class="bg-white shadow rounded p-4">

                <h2 class="font-bold text-lg">
                    {{ $event->title }}
                </h2>

                <p class="text-gray-500">
                    {{ $event->location }}
                </p>

                <p>
                    {{ $event->date_time->format('d/m/Y H:i') }}
                </p>

            </div>

        @endforeach

    </div>

</x-app-layout>
<x-app-layout>
<div class="p-6">

    <h1 class="text-3xl font-bold mb-6">
        Dashboard do Organizador
    </h1>

    <div class="mb-6">

        <p>
            Eventos Criados:
            {{ $totalEvents }}
        </p>

        <p>
            Participantes:
            {{ $totalParticipants }}
        </p>

        <p>
            Vagas Restantes:
            {{ $remainingSpots }}
        </p>

    </div>

    @foreach($events as $event)

        <div class="border p-4 mb-4 rounded">

            <h2 class="font-bold">
                {{ $event->title }}
            </h2>

            <p>
                Inscritos:
                {{ $event->participants_count }}
            </p>

            <p>
                Capacidade:
                {{ $event->capacity }}
            </p>

        </div>

    @endforeach

</div>
</x-app-layout>
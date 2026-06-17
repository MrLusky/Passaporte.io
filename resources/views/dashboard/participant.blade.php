<x-app-layout>
<div class="p-6">

    <h1 class="text-3xl font-bold mb-6">
        Dashboard do Participante
    </h1>

    <p>
        Eventos Inscritos:
        {{ $totalEvents }}
    </p>

    @if($nextEvent)

        <div class="border rounded p-4 mt-4">

            <h2 class="font-bold">
                Próximo Evento
            </h2>

            <p>
                {{ $nextEvent->title }}
            </p>

            <p>
                {{ $nextEvent->date_time->format('d/m/Y H:i') }}
            </p>

        </div>

    @endif

    <div class="mt-6">

        @foreach($events as $event)

            <div class="border rounded p-4 mb-4">

                <h3 class="font-bold">
                    {{ $event->title }}
                </h3>

                <p>
                    {{ $event->location }}
                </p>

                <p>
                    {{ $event->pivot->ticket_code }}
                </p>

            </div>

        @endforeach

    </div>

</div>
</x-app-layout>
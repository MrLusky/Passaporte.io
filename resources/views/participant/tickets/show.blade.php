<x-app-layout>
<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">
        Ingresso
    </h1>

    <p>
        Evento:
        {{ $ticket->title }}
    </p>

    <p>
        Código:
        {{ $ticket->pivot->ticket_code }}
    </p>

    <div class="mt-6">

        {!! QrCode::size(250)
            ->generate($ticket->pivot->ticket_code) !!}

    </div>

</div>
</x-app-layout>